<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentDetailsController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('information',[PaymentDetailsController::class,'epayment'])->name('information');
Route::get('pay_type/{id}',[PaymentDetailsController::class,'convie']);
Route::get('project/{id}',[PaymentDetailsController::class,'proj_data']);
Route::post('add',[PaymentDetailsController::class,'add_details']);
Route::get('payment_redirect/{data}',[PaymentDetailsController::class,'redirect']);
Route::get('returnPage',[PaymentDetailsController::class,'returnPage'])->name('returnPage');
Route::post('checkBIN_id',[PaymentDetailsController::class,'checkBIN_id']);


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
