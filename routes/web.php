<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/bank/request', function () {
    try {
        $user = auth()->user();
        $transactions = $user->transactions();
        $gateway = \Gateway::make('payir');
        $gateway->setCallback(url('http://localhost:8000/'));
        $gateway->price(1000)->ready();

        $refId = $gateway->refId();

        $transID = $gateway->transactionId();

        return $gateway->redirect();
    } catch (\Exception $e) {

        echo $e->getMessage();
    }
});

Route::post('/', function () {
    try {
        $gateway = \Gateway::verify();
        $trackingCode = $gateway->trackingCode();
        $refId = $gateway->refId();
        $cardNumber = $gateway->cardNumber();
    } catch (\Larabookir\Gateway\Exceptions\RetryException $e) {
        echo $e->getMessage()."<br>";
    } catch (\Exception $e) {

        // نمایش خطای بانک
        echo $e->getMessage();
    }
});
