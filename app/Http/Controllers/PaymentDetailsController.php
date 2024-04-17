<?php

namespace App\Http\Controllers;
use SimpleXMLElement;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\PaymentDetail;
use App\Models\data_results;
use App\Models\payments;
use Illuminate\Support\Facades\DB;

use Crazymeeks\Foundation\PaymentGateway\Dragonpay;

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
			
			// update today 05/19/2023
			/*
			if($checkifexist->ismatured == 1)
			{	
				$output = array("display_mesage" => "Magandang Araw. Ang iyong account ay nangangaailangan ng  karagdagang pagsusuri mula sa NHA. Mangyari lamang na magpunta sa pinakamalapit na NHA Office upang maayos ang iyong bayarin. Maraming Salamat Po.","msg"=>"ismatured");
				return response()->json($output);
				exit;
			}
			*/
			
			$dateToday = $trans_date = date("Y-m-d");
			$matured_date = $checkifexist->matured_date;
			
			
			$today_time = strtotime($dateToday);
			$expire_time = strtotime($matured_date);

			if ($expire_time < $today_time) {
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
				
		

		
		if($getData && count($getData) == 0){
		  
		  
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
		// define('MERCHANT_PASSWORD', 'L38XsFRPPcmXmNP'); 
		// define('ENV_LIVE', 1); 		
	}
	else if($request->payment_method == "e_wallet")
	{
		// define('MERCHANT_ID', 'GAPPLETECHASI2');
		// define('MERCHANT_PASSWORD', 'pWhSQuj3V5c6vMx'); 
		// define('ENV_LIVE', 1); 
		
	}
	
	
	
	
	
	
	define('MERCHANT_PASSWORD', 'JVty8Vc5EnmiB8k'); // TESTING SETUP
	define('ENV_TEST', 1);
	
	
	$environment = ENV_TEST;
   
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
		  if ($environment == ENV_TEST) {
			  
		    $url = 'http://test.dragonpay.ph/Pay.aspx?';
		  }
		  
		  //LIVE
		//   if ($environment == ENV_LIVE){ 
			  
		// 	  $url = 'https://gw.dragonpay.ph/Pay.aspx?';
		//   }

		
		  //echo $url .= http_build_query($parameters, '', '&');


			$urldata = $url .= http_build_query($parameters, '', '&');
			$output = array("url" => $urldata,"msg"=>"success");
			return response()->json($output);

   }
   

	public function callback(Request $request)
    {
	
	//   $store = new data_results();
    //   $store->txnid = @$request->txnid;
	//   $store->procid = @$request->procid;
    //   $store->refno = $request->refno;
    //   $store->status = $request->status;
    //   $store->message = $request->message;
    //   $store->digest = $request->digest;
    //   $store->save();
		
		
	// 	$databaseName = \DB::connection('mysql2')->getDatabaseName();
		
		
	// 	$select = "t1.*,t2.loan_id as loan_number, t2.id as  loan_id,t3.procid,t3.procid,t3.refno,t3.created_at as createdAT,t3.updated_at as updatedAT,t1.payment_method ";
	// 	$getallData = \DB::table('payments as t1')
	// 			->select(\DB::raw($select))
	// 			->leftJoin($databaseName.'.loans as t2','t2.beneficiaries_id','=','t1.beneficiaries_id')
	// 			->leftJoin('data_results AS t3','t3.txnid','=','t1.transaction_id')
	// 			->where('t1.transaction_id',$request->txnid)
	// 			->first(); 

		
	//   // SAVE IN COLLECTION PAYMENT (invoices table)	
	//   if($request->status == "S" ){
		  
		  
		  
	// 	 	\DB::connection('mysql2')->table('invoices')->insert(
	// 		[
			
	// 			'loan_id' => @$getallData->loan_id, 
	// 			'loan_number' => @$getallData->loan_number,
	// 			'invoice_number' => @$getallData->transaction_id,
	// 			'particulars' => 'Principal',
	// 			'particulars_id' => '1',
	// 			'modeofpayment_id' => 0,
	// 			'modeofpayment' => @$getallData->procid,
	// 			'date' => null,
	// 			'amount_paid' => @$getallData->amount,
	// 			'user' => 3,
	// 			'or_number' => null,
	// 			'or_number_series' => 0,
	// 			'orseries_id' => 0,
	// 			'came_from' => null,
	// 			'collection_by' => @$getallData->procid,
	// 			'collector_id' => 0,
	// 			'remarks' => null,
	// 			'old_loan_number' => null,
	// 			'old_beneficiaries_id' => null,
	// 			'payment_month_from' => null,
	// 			'payment_year_from' => null,
	// 			'payment_month_to' => null,
	// 			'payment_year_to' => null,
	// 			'refno' => $request->refno,
	// 			'updated_by' => null,
				
	// 			'payment_method' => @$getallData->payment_method,
				
	// 			'created_at' => @$getallData->createdAT,
	// 			'updated_at' => @$getallData->updatedAT,
				
			
	// 		]
	// 	);
		  
		  
		  
		  
	//   }
	
	
		
		
    }
	
	public function return_url(Request $request){
		
		$dataArr = [
			'message' => $request->message,
			'txnid' => $request->txnid,
			'status' => $request->status,
			'refno' => $request->refno,
		];
		return redirect('https://56ee-161-49-94-151.ngrok-free.app/api/return_url')->with('data', $dataArr);
		// $message = $request->message;
		// $txnid = $request->txnid;
		// $status = $request->status;
		// $refno = $request->refno;
	
	
	
		// return view('.returnPage', compact('message','txnid','status','refno'));
	}
	
}
