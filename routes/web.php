<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentDetailsController;
use App\Http\Controllers\WebsiteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/





//COMMAND 
Route::get('/clear_cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
	$exitCode = Artisan::call('route:clear');
    return 'DONE';
});


Route::get('/', function () {
    return view('welcome');
});


/*
Route::get('/test', function () {
    return view('welcome2');
});
*/

Route::get('test',[PaymentDetailsController::class,'test'])->name('test');


Route::get('information',[PaymentDetailsController::class,'epayment'])->name('information');
Route::get('pay_type/{id}',[PaymentDetailsController::class,'convie']);
Route::get('project/{id}',[PaymentDetailsController::class,'proj_data']);
Route::post('add',[PaymentDetailsController::class,'add_details']);
Route::get('payment_redirect/{data}',[PaymentDetailsController::class,'redirect']);
Route::get('returnPage',[PaymentDetailsController::class,'returnPage'])->name('returnPage');
Route::post('checkBIN_id',[PaymentDetailsController::class,'checkBIN_id']);
Route::post('getcurrentThreshold',[PaymentDetailsController::class,'getcurrentThreshold']);

// PORTAL
//Route::get('/portal', 'WebsiteController@index');

Route::get('/portal/{type}',[WebsiteController::class,'index']);
// Route::get('/billing_portal',[WebsiteController::class, 'notice']);
Route::post('/checkIFvalidDetails',[WebsiteController::class,'checkIFvalidDetails']);


Route::get('/website',[WebsiteController::class,'website']);
Route::post('/getprojectofficeRelated',[WebsiteController::class,'getprojectofficeRelated']);
Route::post('/searchByDetails',[WebsiteController::class,'searchByDetails']);
Route::post('/getData',[WebsiteController::class,'getData']);





// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
