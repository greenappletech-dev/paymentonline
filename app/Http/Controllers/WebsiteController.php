<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\districts;
use Carbon\Carbon;
use DB;


class WebsiteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }
	
	public function index($type)
	{		 
		 \DB::statement("SET sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));");
	
		 $data = array(
			//'districts'=>districts::All(),
			'districts'=>\DB::connection('mysql2')->table('districts')->get(),
			'type' => $type
		 );

        return view('.portal',$data);
		 
	} 

	public function website()
	{
		 
		 \DB::statement("SET sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));");
	
		 $data = array(

		 );

        return view('website',$data);
		 
	} 
	public function getprojectofficeRelated(Request $request)
	{
		//re-able ONLY_FULL_GROUP_BY
		\DB::statement("SET sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));");
		$select ="t1.id,t1.name";
		$getdata = \DB::connection('mysql2')->table('project_offices as t1')
		->select(\DB::raw($select))
		->where('t1.district_id', '=',$request->district)
		->get();
		$data = array("data" => $getdata);
		return response()->json($data);
		
	}
	
	public function checkIFvalidDetails(Request $request){
			
			
			if( 
				\DB::connection('mysql2')->table('beneficiaries as t1')
				->leftJoin('loans AS t2','t2.beneficiaries_id','=','t1.beneficiaries_id')	
				->where('t2.beneficiaries_id', $request->beneficiaries_id)	
				->where('t2.district_id', $request->district)	
				->where('t2.project_office_id', $request->project_office)	
				->where('t1.last_name', $request->last_name)	
				->exists()
			)
			{
				
				echo "exist";
			}
			else{
				
				echo "notexist";
			}

			
			
	}
	
	
	public function searchByDetails(Request $request)
	{	
		// dd($request);

			$total_bcs = 0;

			$selectQuery ="
					t1.beneficiaries_id as BIN,
					CONCAT(t1.last_name,' ',t1.first_name,' ',t1.middle_name) as Name, 
					reg.name as region,
					dis.name as district,
					ofc.name as project_office,
					phase.name as phase,
					block.name as block,
					lot.name as lot
					";
				$getCus = \DB::connection('mysql2')->table('beneficiaries as t1')
				->select(\DB::raw($selectQuery))
				->leftJoin('loans AS t2','t2.beneficiaries_id','=','t1.beneficiaries_id')				
				->leftJoin('districts as dis','dis.id','=','t2.district_id')
				->leftJoin('regions as reg','reg.id','=','dis.region_id')
				->leftJoin('project_offices as ofc','ofc.id','=','t2.project_office_id')
				->leftJoin('phases as phase','phase.id','=','t2.phase_id')
				->leftJoin('blocks as block','block.id','=','t2.block_id')
				->leftJoin('lots as lot','lot.id','=','t2.lot_id')
				->where('t1.beneficiaries_id', $request->beneficiaries_id)	
				->first(); 	

		if($request->trxn_type == 'notice'){
			$last_payment = \DB::connection('mysql2')->table('invoices')->orderBy('id','Desc')->first();


			$get_project_office = \DB::connection('mysql2')->table('project_offices as p1')
						->where('p1.id', $request->project_office)
						->first();


			$get_project_bcs_housing = \DB::connection('mysql2')->table('project_bcs0030 as proj_bcs')
			->where('proj_bcs.project_office_id', $request->project_office)
			->where('proj_bcs.bin', $request->beneficiaries_id)
			->where('proj_bcs.acct_type', $get_project_office->housing_material_code)
			->first();

			$get_bcs_due_housing = \DB::connection('mysql2')->table('project_bcsdue as bcs_due')
			->where('bcs_due.project_office_id', $request->project_office)
			->where('bcs_due.bin', $request->beneficiaries_id)
			->where('bcs_due.acct_type', $get_project_office->housing_material_code)
			->orderBy('bcs_due.tx_date', 'DESC')
			->get();

			
			if($get_bcs_due_housing->count() > 0){
				$firstIteration = true;
				$get_project_bcs_housing_nakaraan = 0;
				$get_project_bcs_housing_kasalukuyan = 0;
				$get_project_bcs_housing_multa = 0;
				$get_project_bcs_housing_tubo = 0;
				foreach($get_bcs_due_housing as $item){
					if (!$firstIteration) {
						$get_project_bcs_housing_nakaraan += $item->deb_amt;
					} else {
						// Skip adding deb_amt during the first iteration
						$get_project_bcs_housing_kasalukuyan = $item->deb_amt;
						$get_project_bcs_housing_to_date = $item->tx_date;
						$firstIteration = false; // Set the flag to false after the first iteration
					}
					
					$get_project_bcs_housing_multa = $item->deb_del;
					$get_project_bcs_housing_tubo = $item->deb_int;
				}
	
				$get_project_bcs_housing_kabuuan = $get_project_bcs_housing_nakaraan + $get_project_bcs_housing_kasalukuyan + $get_project_bcs_housing_multa + $get_project_bcs_housing_tubo;
	
	
				$housing_data = [
					'get_project_bcs_housing_nakaraan' => $get_project_bcs_housing_nakaraan,
					'get_project_bcs_housing_kasalukuyan' => $get_project_bcs_housing_kasalukuyan,
					'get_project_bcs_housing_multa' => $get_project_bcs_housing_multa,
					'get_project_bcs_housing_tubo' => $get_project_bcs_housing_tubo,
					'get_project_bcs_housing_kasalukuyan' => $get_project_bcs_housing_kasalukuyan,
					'get_project_bcs_housing_to_date' => $get_project_bcs_housing_to_date,
					'get_project_bcs_housing_kabuuan' => $get_project_bcs_housing_kabuuan,
				];

				$total_bcs = $get_bcs_due_housing->count();  

			}
			else{
				$housing_data = [];
				$total_bcs = 0;
			}

		


			////////////////////////// LOT CODE /////////////////////

			$get_project_bcs_lot = \DB::connection('mysql2')->table('project_bcs0030 as proj_bcs')
			->where('proj_bcs.project_office_id', $request->project_office)
			->where('proj_bcs.bin', $request->beneficiaries_id)
			->where('proj_bcs.acct_type', $get_project_office->lot_code)
			->first();

			$get_bcs_due_housing_lot = \DB::connection('mysql2')->table('project_bcsdue as bcs_due')
			->where('bcs_due.project_office_id', $request->project_office)
			->where('bcs_due.bin', $request->beneficiaries_id)
			->where('bcs_due.acct_type', $get_project_office->lot_code)
			->orderBy('bcs_due.tx_date', 'DESC')
			->get();

			if($get_bcs_due_housing_lot->count() > 0){
				$firstIteration = true;
				$get_project_bcs_lot_nakaraan = 0;
				$get_project_bcs_lot_kasalukuyan = 0;
				$get_project_bcs_lot_multa = 0;
				$get_project_bcs_lot_tubo = 0;
				foreach($get_bcs_due_housing_lot as $item){
					if (!$firstIteration) {
						$get_project_bcs_lot_nakaraan += $item->deb_amt;
					} else {
						// Skip adding deb_amt during the first iteration
						$get_project_bcs_lot_kasalukuyan = $item->deb_amt;
						$get_project_bcs_lot_to_date = $item->tx_date;
	
						$firstIteration = false; // Set the flag to false after the first iteration
					}
					
					$get_project_bcs_lot_multa = $item->deb_del;
					$get_project_bcs_lot_tubo = $item->deb_int;
				}
	
				$get_project_bcs_lot_kabuuan = $get_project_bcs_lot_nakaraan + $get_project_bcs_lot_kasalukuyan + $get_project_bcs_lot_multa + $get_project_bcs_lot_tubo;
	
				$lot_data = [
					'get_project_bcs_lot_nakaraan' => $get_project_bcs_lot_nakaraan,
					'get_project_bcs_lot_kasalukuyan' => $get_project_bcs_lot_kasalukuyan,
					'get_project_bcs_lot_multa' => $get_project_bcs_lot_multa,
					'get_project_bcs_lot_tubo' => $get_project_bcs_lot_tubo,
					'get_project_bcs_lot_to_date' => $get_project_bcs_lot_to_date,
					'get_project_bcs_lot_kabuuan' => $get_project_bcs_lot_kabuuan,
				];

				$total_bcs += $get_bcs_due_housing_lot->count();  

			}
			else{
				$lot_data = [];
				$total_bcs = 0;
			}

	
			
			return view('.billingnotice',array('data' => $request->all(),'customer'=>$getCus, 'last_payed' => $last_payment, 'get_project_office' => $get_project_office, 'get_project_bcs_housing' => $get_project_bcs_housing, 'housing_data' => $housing_data, 'lot_data' => $lot_data, 'get_project_bcs_lot' => $get_project_bcs_lot, 'lot_data' => $lot_data, 'total_bcs' => $total_bcs));
			
		}
		else{
			return view('.website',array('data' => $request->all(),'customer'=>$getCus));
		}
		
		
	}
	public function getData(Request $request)
	{

		
	
			$select ="
						t1.id,
						t1.invoice_number,
						t1.date as DayofPayment,
						t1.created_at as TimeofPayment,
						t1.amount_paid as PaymentAmount,
						t1.or_number as ORNumber,
						CONCAT(employee.first_name, ' ',employee.middle_name, ' ',employee.last_name ) as CollectorName
					";
					
					
			$getallData = DB::connection('mysql2')->table('invoices as t1')
			->select(\DB::raw($select))
			->leftJoin('users AS emp','emp.id','=','t1.user')
			->leftJoin('loans AS t2','t2.loan_id','=','t1.loan_number')
			->leftJoin('beneficiaries as t3','t3.beneficiaries_id','=','t2.beneficiaries_id')
			->leftJoin('employees as employee','employee.id','=','t1.collector_id')
			->where('t2.district_id', $request->district)
			->where('t2.project_office_id', $request->project_office)
			->where('t2.beneficiaries_id', $request->beneficiaries_id)					
			->orderBy('t1.date', 'desc')
			->orderBy('t1.created_at', 'desc')
			->get(); 	
			

			
			$databaseName = DB::connection('mysql2')->getDatabaseName();
			
			
			$select2 ="
					t2.*,
					dis.name as district,
					p.name as project_office,
					t1.transaction_date,
					t1.amount,
					t1.transaction_id
				";
				
	
			$onlinepayment = \DB::table('payments as t1')
						->select(\DB::raw($select2))
						
						//->leftJoin('data_results AS t2','t2.txnid','=','t1.transaction_id')
					

						
						 ->leftJoin('data_results as t2', function ($join) {
							$join->on('t2.txnid', '=', 't1.transaction_id')
							->whereRaw('t2.id IN (select MAX(a2.id) from data_results as a2 join payments as u2 on u2.transaction_id = a2.txnid group by a2.txnid)');
						})
						
						
						->leftJoin($databaseName.'.districts as dis','dis.id','=','t1.district_id')
						->leftJoin($databaseName.'.project_offices as p','p.id','=','t1.project_office_id')
						->where('t1.district_id', $request->district)
						->where('t1.project_office_id', $request->project_office)
						->where('t1.beneficiaries_id', $request->beneficiaries_id)
						->whereNotNull('t2.txnid')
						->get();

			
			
	
			
	
			
			
			
	
			
			### COLLECT ALL PAYMENT
			$collection =array();
			$totalamount = 0;
			
			if(!empty($getallData)){
				
				foreach ($getallData as $dd){
						
					$row = array();
					$row['DayofPayment'] =  $dd->DayofPayment;
					$row['TimeofPayment'] = \Carbon\Carbon::parse($dd->TimeofPayment)->format('h:i:s A');
					$row['ORNumber'] =  $dd->ORNumber;
					$row['PaymentAmount'] =  number_format($dd->PaymentAmount,2);
					
					
					$row['Transaction_number'] =  $dd->invoice_number;
					$row['Mop'] =  'Cash';
					$row['Reference_number'] =  "" ;//$dd->invoice_number;
					$row['Satus'] =  'PAID';
					$row['Remarks'] =  'Paid by cash';	
					$row['CollectorName'] =  $dd->CollectorName;
					$collection[] = $row;
					
					$totalamount = $totalamount  + $dd->PaymentAmount;
				}
			}
			
			
			
			$status = array('S'=>"SUCCESSFUL",'P'=>"PENDING", "F" => "FAILED");
			if(!empty($onlinepayment)){
				
				foreach ($onlinepayment as $dd){
						
					$row = array();
					$row['DayofPayment'] = \Carbon\Carbon::parse($dd->transaction_date)->format('Y-m-d');
					$row['TimeofPayment'] = \Carbon\Carbon::parse($dd->transaction_date)->format('h:i:s A');
					$row['ORNumber'] =  "";
					$row['PaymentAmount'] =  number_format($dd->amount,2);
					
					
					$row['Transaction_number'] =  $dd->transaction_id;
					$row['Mop'] =  $dd->procid;
					$row['Reference_number'] =  $dd->refno;
					$row['Satus'] =  $status[@$dd->status];
					$row['Remarks'] =   $dd->message;
					$row['CollectorName'] =  "";
					$collection[] = $row;
					
					$totalamount = $totalamount  + $dd->amount;
				}
			}
		
			
				/*
				$data = array();
				if(!empty($getallData)){
				
					foreach ($getallData as $dd){
							
						$row = array();
						$row['DayofPayment'] =  $dd->DayofPayment;
						$row['TimeofPayment'] = \Carbon\Carbon::parse($dd->TimeofPayment)->format('h:i:s A');
						$row['PaymentAmount'] =  number_format($dd->PaymentAmount,2);
						$row['ORNumber'] =  $dd->ORNumber;
						$row['CollectorName'] =  $dd->CollectorName;
						$data[] = $row;
						
						$totalamount = $totalamount  + $dd->PaymentAmount;
					}
				}
				else{
					
					$data = [];
				}
				*/
				
				
				$output = array("data" => $collection , 'totalamount' => number_format($totalamount,2)   );
				return response()->json($output);
				
	}	
		
	
}
