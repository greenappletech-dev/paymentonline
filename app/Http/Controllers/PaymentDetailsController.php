<?php

namespace App\Http\Controllers;
use SimpleXMLElement;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\PaymentDetail;
use App\Models\data_results;
use App\Models\payments;


use Crazymeeks\Foundation\PaymentGateway\Dragonpay;

class PaymentDetailsController extends Controller
{



   public function epayment(){
      $district = \DB::connection('mysql2')->table('districts')->get();

    return view('.home',compact('district'));
   }


   public function proj_data($id){
      $project_data=\DB::connection('mysql2')->table('project_offices')->where('district_id',$id)->get();
     return response()->json(['data'=>$project_data],200);
   }

   public function add_details(Request $request){

	
	  $trans_date = date("y-m-d h:i:s");
	
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
	  $store->save();

	  $transaction_id = str_pad($store->id, 12,'0', STR_PAD_LEFT);
      $update = payments::where('id',$store->id)->first();
      $update->transaction_id=$transaction_id;
      $update->save();

     
	
	$description = "Payment for NHA monthly bill";
	
	
	define('MERCHANT_ID', 'GAPPLETECHASI');
	define('MERCHANT_PASSWORD', 'JVty8Vc5EnmiB8k');
	define('ENV_TEST', 1);
	define('ENV_LIVE', 0);
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
		  $url = 'https://gw.dragonpay.ph/Pay.aspx?';
		  if ($environment == ENV_TEST) {
			$url = 'http://test.dragonpay.ph/Pay.aspx?';
		  }
		

		
		   echo $url .= http_build_query($parameters, '', '&');


   }
   

	public function callback(Request $request)
    {
	
	
	
	
	
	  $store = new data_results();
      $store->txnid = @$request->txnid;
	  $store->procid = @$request->procid;
      $store->refno = $request->refno;
      $store->status = $request->status;
      $store->message = $request->message;
      $store->digest = $request->digest;
      $store->save();
	
	  $message = $request->message;
	
	 //return view('.home',compact('district','mode_payment'));
		//return redirect('returnPage',compact('message'));
		
		//return view('.returnPage');
		//return view('.returnPage', compact(['message']));
		
		
    }
	
	public function return_url(Request $request){
		
		$message = $request->message;
		$txnid = $request->txnid;
		$status = $request->status;
		$refno = $request->refno;
		
		return view('.returnPage', compact('message','txnid','status','refno'));
	}
	
}
