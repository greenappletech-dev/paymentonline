<?php

namespace App\Http\Controllers;
use SimpleXMLElement;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\ModePayment;
use App\Models\PaymentDetail;
use App\Models\data_results;
use Crazymeeks\Foundation\PaymentGateway\Dragonpay;

class PaymentDetailsController extends Controller
{



   public function epayment(){
      $district = \DB::connection('mysql2')->table('districts')->get();

      $mode_payment = ModePayment::get();
      // dd($district);
    return view('.home',compact('district','mode_payment'));
   }


   public function proj_data($id){
      $project_data=\DB::connection('mysql2')->table('project_offices')->where('district_id',$id)->get();
     return response()->json(['data'=>$project_data],200);
   }

   public function add_details(Request $request){

	
	
	define('MERCHANT_ID', 'GAPPLETECHASI');
	define('MERCHANT_PASSWORD', 'JVty8Vc5EnmiB8k');

	define('ENV_TEST', 1);
	define('ENV_LIVE', 0);

	$environment = ENV_TEST;
   
    $errors = array();
	$is_link = false;

	  $parameters = array(
		  'merchantid' => MERCHANT_ID,
		  'txnid' => '5555555',
		  'amount' => 5,
		  'ccy' => 'PHP',
		  'description' => 'My order description.',
		  'email' => 'jaysonpulga22@gmail.com',
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
		return view('.returnPage', compact(['message']));
		
		
    }
}
