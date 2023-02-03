<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentDetailsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('payment_callback',[PaymentDetailsController::class,'callback']);
Route::get('return_url',[PaymentDetailsController::class,'return_url']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
