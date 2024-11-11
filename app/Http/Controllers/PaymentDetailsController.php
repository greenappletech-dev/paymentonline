<?php

namespace App\Http\Controllers;
use App\Models\IpLog;
use SimpleXMLElement;
use App\Models\payments;
use App\Models\Collector;
use App\Models\Collection;
use App\Models\Beneficiary;
use App\Models\ModePayment;
use App\Models\data_results;

use Illuminate\Http\Request;
use App\Models\OnlinePayment;
use App\Models\PaymentDetail;
use App\Models\SystemParameter;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Crazymeeks\Foundation\PaymentGateway\Dragonpay;
use Illuminate\Support\Facades\Http;

class PaymentDetailsController extends Controller
{


	public function test(){

	
		
		//$user = \DB::connection('sqlsrv')->table('NM_Users')->get();
		
			//$sql="Select * from NM_Users";
			//$query =  \DB::connection('sqlsrv')->select($sql);
			//$res = $query->result();
			 //print_r($query );
		
			  try {
				\DB::connection('sqlsrv')->getPdo();
				if(\DB::connection('sqlsrv')->getDatabaseName()){
					echo "Yes! Successfully connected to the DB: " . \DB::connection('sqlsrv')->getDatabaseName();
				}else{
					die("Could not find the database. Please check your configuration.");
				}
			} catch (\Exception $e) {
				die("Could not open connection to database server.  Please check your configuration.");
			}
		

			
	}



   public function epayment(){
	    
	  //return view('.unavailable');
	  //exit;
	  
	  
      $district = \DB::connection('mysql2')->table('districts')->get();
	  return view('.home',compact('district'));
   }


   public function proj_data($id){
	  $project_data=\DB::connection('mysql2')->table('project_offices')->where('district_id',$id)->get();
	 return response()->json(['data'=>$project_data],200);
   }


	public function checkBIN_id(Request $request){
		
	
		 
		 $select ="t1.*,CONCAT(t2.last_name,', ',t2.first_name, ' ',t2.middle_name ) as full_name";
		 $checkifexist = \DB::connection('mysql2')
				->table('loans as t1')
				->select(\DB::raw($select))
				->leftjoin('beneficiaries as t2','t2.beneficiaries_id','=','t1.beneficiaries_id')	
				->where('t1.beneficiaries_id', $request->account_number)
				->where('t1.district_id', $request->district)
				->where('t1.project_office_id', $request->project_id)
				->first();
				
		if(empty($checkifexist)){
		  
			$output = array("display_mesage" => "Your BIN ID not found in this district and project, Please Check","msg"=>"error");
			return response()->json($output);
		}
		else{
			
			$output = array("data" => $checkifexist,"msg"=>"found");
			return response()->json($output);
			
		}
	}

	public function getcurrentThreshold(Request $request){
			
			
			
			$threshold = \DB::connection('mysql2')
			->table('project_offices as t1')
			->select(\DB::raw("*"))
			->where('t1.id', $request->project_id)
			->first();
			
			
			$number = $threshold->amount_thresholds;
			
			
			$output = array( "threshold" => $number,
							 "decimal" => number_format((float)$number, 2, '.', ''),
						   );
			return response()->json($output);
	}


   public function add_details(Request $request){
	
	  $trans_date = date("y-m-d h:i:s");
	  
	  
		$select ="t1.*,CONCAT(t2.last_name,', ',t2.first_name, ' ',t2.middle_name ) as full_name";
		$checkifexist = \DB::connection('mysql2')
				->table('loans as t1')
				->select(\DB::raw($select))
				->leftjoin('beneficiaries as t2','t2.beneficiaries_id','=','t1.beneficiaries_id')	
				->where('t1.beneficiaries_id', $request->bin_id)
				->where('t1.district_id', $request->district)
				->where('t1.project_office_id', $request->project)
				->first();
				
		if(empty($checkifexist)){
		  
			$output = array("display_mesage" => "Your BIN ID not found in this district and project, Please Check","msg"=>"error");
			return response()->json($output);
			exit;
		}
		else{
			
			/*
			if($checkifexist->ismatured == 1)
			{	
				$output = array("display_mesage" => "Magandang Araw. Ang iyong account ay nangangaailangan ng  karagdagang pagsusuri mula sa NHA. Mangyari lamang na magpunta sa pinakamalapit na NHA Office upang maayos ang iyong bayarin. Maraming Salamat Po.","msg"=>"ismatured");
				return response()->json($output);
				exit;
			}
			*/

			$is_NHA_payment = \DB::connection('mysql2')->table('beneficiaries')->where('beneficiaries_id', $request->bin_id)->first()->is_NHA_payment;

			$dateToday = $trans_date = date("Y-m-d");
			$matured_date = $checkifexist->matured_date;
			
			
			$today_time = strtotime($dateToday);
			$expire_time = strtotime($matured_date);
			if ($expire_time < $today_time && $expire_time != null) {
				/* do Something */ 
				
				
				\DB::connection('mysql2')
				->table('loans')
				->where('loan_id', $checkifexist->loan_id)
				->update([
					'ismatured' => 1
				]);
				
				
				
				$output = array("display_mesage" => "Magandang Araw. Ang iyong account ay nangangaailangan ng  karagdagang pagsusuri mula sa NHA. Mangyari lamang na magpunta sa pinakamalapit na NHA Office upang maayos ang iyong bayarin. Maraming Salamat Po.","msg"=>"ismatured");
				return response()->json($output);
				exit;
			}
		}
		
	  $select ="t1.*";
	  $getData = \DB::connection('mysql2')
				->table('invoices as t1')
				->select(\DB::raw($select))
				->leftjoin('loans as t2','t2.loan_id','=','t1.loan_number')				
				->whereIn('t1.particulars', ['Principal','Cash','cash','HOUSING AMORTIZATION','Interest on Amortization'])
				->whereNotNull('t1.or_number')
				->where('t2.beneficiaries_id', $request->bin_id)
				->get();

			if($getData && count($getData) == 0 && $is_NHA_payment == false ){
		  
				$display_mesage="Mukhang ito ang unang pagkakataon na kayo ay magbabayad sa amin. Kung ito ang iyong unang pagkakataon na magbayad sa Green Apple Technologies, mangyari lamang na pumunta sa inyong pinakamalapit na NHA Collection Office upang gawin ang inyong unang bayad. Pagkatapos, maaari mo ng gamitin ang channel na ito para sa inyong mga susunod na pagbabayad. Salamat.";
				
				$output = array("msg"=>"no_data","display_mesage"=>$display_mesage);
				return response()->json($output);
				exit;
			}

	  $store = new payments();
	  $store->transaction_id	  = "";
	  $store->district_id 		  = @$request->district;
	  $store->project_office_id   = $request->project;
	  $store->beneficiaries_id    = $request->bin_id;
	  $store->beneficiaries_name  = strtoupper($request->benefeciary);
	  $store->mobile_number	      = '0'.$request->phone_number;
	  $store->email	              = $request->email;
	  $store->amount	 		  = $request->amount;
	  $store->transaction_date	  = $trans_date ;
	  $store->payment_method	  = $request->payment_method;
	  $store->save();

	  $transaction_id = str_pad($store->id, 12,'0', STR_PAD_LEFT);
      $update = payments::where('id',$store->id)->first();
      $update->transaction_id=$transaction_id;
      $update->save();

     
	
	$description = "Payment for NHA monthly bill";
	
	
	if($request->payment_method == "bank_account")
	{
		// LIVE SETUP
		define('MERCHANT_ID', 'GAPPLETECHASI');
		define('MERCHANT_PASSWORD', 'L38XsFRPPcmXmNP'); 
		define('ENV_LIVE', 1); 		
	}
	else if($request->payment_method == "e_wallet")
	{
		define('MERCHANT_ID', 'GAPPLETECHASI2');
		define('MERCHANT_PASSWORD', 'pWhSQuj3V5c6vMx'); 
		define('ENV_LIVE', 1); 
		
	}
	
	
	
	
	
	
	// define('MERCHANT_PASSWORD', 'JVty8Vc5EnmiB8k'); // TESTING SETUP
	// define('ENV_TEST', 1);
	
	
	$environment = ENV_LIVE;
   
    $errors = array();
	$is_link = false;

	  $parameters = array(
		  'merchantid' => MERCHANT_ID,
		  'txnid' => $transaction_id,
		  'amount' => $request->amount,
		  'ccy' => 'PHP',
		  'description' => $description,
		  'email' => $request->email,
	  );
   
   
		$fields = array(
		  'txnid' => array(
			  'label' => 'Transaction ID',
			  'type' => 'text',
			  'attributes' => array(),
			  'filter' => FILTER_SANITIZE_STRING,
			  'filter_flags' => array(FILTER_FLAG_STRIP_LOW),
		  ),
		  'amount' => array(
			  'label' => 'Amount',
			  'type' => 'number',
			  'attributes' => array('step="0.01"'),
			  'filter' => FILTER_SANITIZE_NUMBER_FLOAT,
			  'filter_flags' => array(FILTER_FLAG_ALLOW_THOUSAND, FILTER_FLAG_ALLOW_FRACTION),
		  ),
		  'description' => array(
			  'label' => 'Description',
			  'type' => 'text',
			  'attributes' => array(),
			  'filter' => FILTER_SANITIZE_STRING,
			  'filter_flags' => array(FILTER_FLAG_STRIP_LOW),
		  ),
		  'email' => array(
			  'label' => 'Email',
			  'type' => 'email',
			  'attributes' => array(),
			  'filter' => FILTER_SANITIZE_EMAIL,
			  'filter_flags' => array(),
		  ),
	  );
   
   
		foreach ($fields as $key => $value) {
		  // Sanitize user input. However:
		  // NOTE: this is a sample, user's SHOULD NOT be inputting these values.
		  if (isset($_POST[$key])) {
			  $parameters[$key] = filter_input(INPUT_POST, $key, $value['filter'],
				array_reduce($value['filter_flags'], function ($a, $b) { return $a | $b; }, 0));
		  }
		}
   
   
		$parameters['amount'] = number_format($parameters['amount'], 2, '.', '');
		  // Unset later from parameter after digest.
		  $parameters['key'] = MERCHANT_PASSWORD;
		  $digest_string = implode(':', $parameters);
		  unset($parameters['key']);
		  // NOTE: To check for invalid digest errors,
		  // uncomment this to see the digest string generated for computation.
		  // var_dump($digest_string); $is_link = true;
		  $parameters['digest'] = sha1($digest_string);
		 

		  //TEST URL
		  
		//   if ($environment == ENV_TEST) {
			  
		//     $url = 'http://test.dragonpay.ph/Pay.aspx?';
		//   }
		  
		  
		  //LIVE
		  if ($environment == ENV_LIVE){ 
			  
			  $url = 'https://gw.dragonpay.ph/Pay.aspx?';
		  }

		
		  //echo $url .= http_build_query($parameters, '', '&');


			$urldata = $url .= http_build_query($parameters, '', '&');
			$output = array("url" => $urldata,"msg"=>"success");
			return response()->json($output);

   }
   

   public function callback(Request $request)
   {
	    // Get Ip
		$ip = $request->ip();
		// Seperate by dot(.)
		$explode = explode(".",$ip);
		// concat index 0 - 2
		$check_value = $explode[0].'.'.$explode[1].'.'.$explode[2];
		// default value
		$result = false;
		// check IP format
		if($check_value == '119.81.124'){
			// check the range of IP
			for($last_ip_digits = 1; $last_ip_digits < 239; $last_ip_digits++){
				// convert to string
				$convert = (string) $last_ip_digits;
				// check if the result is true
				if($ip == $check_value.'.'.$convert){
					$result = true;
				}
				
			}
		}
		else if($check_value == '20.44.220'){
			// check the range of IP
			for($last_ip_digits = 80; $last_ip_digits < 95; $last_ip_digits++){
				// convert to string
				$convert = (string) $last_ip_digits;
				// check if the result is true
				if($ip == $check_value.'.'.$convert){
					$result = true;
				}
				
			}
		}
		else if($ip == '40.119.209.232' || $ip == '13.67.93.149'){
			$result = true;
		}
		
	   if($result){
		   Log::info('true');
		   Log::info($ip);

		   $store = new data_results();
		   $store->txnid = @$request->txnid;
		   $store->procid = @$request->procid;
		   $store->refno = $request->refno;
		   $store->status = $request->status;
		   $store->message = $request->message;
		   $store->digest = $request->digest;
		   $store->save();

		   $trnx = @$request->txnid;
			   $separate = explode("-", $trnx);
			   if($separate[0]=='R3'){
					//this is for region III callback
				   // $reg3 = DB::connection('mysql3')->table('online_payments')->where('transaction_no',@$request->txnid)->first();
				   $payment_mode = ModePayment::where('online_channel_code', $request->procid)->first();
				   if(empty($payment_mode)){
					   $payment_mode = new ModePayment();
					   $payment_mode->name = $request->procid;
					   $payment_mode->is_online_channel = 1;
					   $payment_mode->online_channel_code = $request->procid;
					   $payment_mode->save();

				   }
				   $result = OnlinePayment::where('transaction_no',$request->txnid)->first();
				   $result->payment_status = $request->status;
				   $result->references = $request->refno;
				   $result->payment_type = $payment_mode->id;
				   $result->save();

				   if($result->payment_status == 'S'){
					   $check_collection = Collection::where('online_channel_reference', $result->references)->exists();
					   $beneficiary = Beneficiary::where('bin', $result->account_number)->first();
					   $collector = Collector::where('user_id',1)->first();
					   $system_parameter = SystemParameter::first();
					   $current_date = date('Y-m-d');

						if(!$check_collection){
							$collection = new Collection();
							$collection->transact_date = $current_date;
							$collection->beneficiary_id = $beneficiary->id;
							$collection->name = $beneficiary->name;
							$collection->mode_of_payment_id = $result->payment_type;
							$collection->collector_id = $collector->id;
							$collection->amount_paid = $result->amount;
							$collection->online_channel_reference = $result->references;
							$collection->collection_item_id = $system_parameter->default_collection_item_id;
							$collection->user_id = 1;
							$collection->mobile_number = $result->phone_number;
							$collection->email = $result->email;
							$collection->remarks = 'Online Transaction';
							$collection->save();
						}
				   }
			   }
			   else if($separate[0]=='EB'){
					$txnid = @$request->txnid;
					$procid = @$request->procid;
					$refno = $request->refno;
					$status = $request->status;
					$message = $request->message;
					$digest = $request->digest;

					if($status == 'S'){
						//make a API call to pass the data to Bais 
					$response = Http::post(env('API_URL'), [
							'txnid'  => $txnid,
							'procid'  => $procid,
							'refno'  => $refno,
							'status'  => $status,
							'message'  => $message,
							'digest '  => $digest, 
						]);
					}

					return response()->json(['messsage', 'SUCCESS']);
			   }
			   else{
					//this is for region IV callback
				   $databaseName = \DB::connection('mysql2')->getDatabaseName();
					   
					   
					   $select = "t1.*,t2.loan_id as loan_number, t2.id as  loan_id,t3.procid,t3.procid,t3.refno,t3.created_at as createdAT,t3.updated_at as updatedAT,t1.payment_method ";
					   $getallData = \DB::table('payments as t1')
							   ->select(\DB::raw($select))
							   ->leftJoin($databaseName.'.loans as t2','t2.beneficiaries_id','=','t1.beneficiaries_id')
							   ->leftJoin('data_results AS t3','t3.txnid','=','t1.transaction_id')
							   ->where('t1.transaction_id',$request->txnid)
							   ->first(); 

					   
				   // SAVE IN COLLECTION PAYMENT (invoices table)	
				   if($request->status == "S" ){
					   
							$check_invoice = \DB::connection('mysql2')->table('invoices')->where('refno', $request->refno)->exists();

							if(!$check_invoice){
								\DB::connection('mysql2')->table('invoices')->insert(
									[
									
										'loan_id' => @$getallData->loan_id, 
										'loan_number' => @$getallData->loan_number,
										'invoice_number' => @$getallData->transaction_id,
										'particulars' => 'Principal',
										'particulars_id' => '1',
										'modeofpayment_id' => 0,
										'modeofpayment' => @$getallData->procid,
										'date' => null,
										'amount_paid' => @$getallData->amount,
										'user' => 3,
										'or_number' => null,
										'or_number_series' => 0,
										'orseries_id' => 0,
										'came_from' => null,
										'collection_by' => @$getallData->procid,
										'collector_id' => 0,
										'remarks' => null,
										'old_loan_number' => null,
										'old_beneficiaries_id' => null,
										'payment_month_from' => null,
										'payment_year_from' => null,
										'payment_month_to' => null,
										'payment_year_to' => null,
										'refno' => $request->refno,
										'updated_by' => null,
										
										'payment_method' => @$getallData->payment_method,
										
										'created_at' => @$getallData->createdAT,
										'updated_at' => @$getallData->updatedAT,
										
									
									]
								);
							}
					   
						
				   }
			   }
		   }
		   else{
			   Log::info('invalid IP ');
			   Log::info($ip);
			   $unreg_ip = new IpLog();
			   $unreg_ip->ip = $ip;
			   $unreg_ip->txnid = @$request->txnid;
			   $unreg_ip->refno = $request->refno;
			   $unreg_ip->status = $request->status;
			   $unreg_ip->save();

		   }	
   }
	
	public function return_url(Request $request){
		
		
		$trnx = @$request->txnid;
		$separate = explode("-", $trnx);
		if($separate[0]=='R3'){
			// sleep(5);
			// $retrieve = data_results::where('txnid',$request->txnid)->first();
			$dataArr = [
				'message' => $request->message,
				'txnid' => $request->txnid,
				'status' => $request->status,
				'refno' => $request->refno,
				'proid' => $request->procid,
			];
			$url = 'https://nhar3-payment.greenappletechph.com/api/return_url?'.http_build_query($dataArr);
			return Redirect::to($url);
		}
		else if($separate[0]=='EB'){
			$dataArr = [
				'message' => $request->message,
				'txnid' => $request->txnid,
				'status' => $request->status,
				'refno' => $request->refno,
				'proid' => $request->procid,
			];
			$url = env('BAIS_SERVER').'?'.http_build_query($dataArr);
			return Redirect::to($url);
		}
		else{
		// Test
		$message = $request->message;
		$txnid = $request->txnid;
		$status = $request->status;
		$refno = $request->refno;
	
		return view('.returnPage', compact('message','txnid','status','refno'));
		}
	}
	
}
