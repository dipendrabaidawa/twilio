<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
use Twilio\Rest\Client;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/twilio', function (Request $request) {
    $account_sid = getenv("TWILIO_SID");
    $auth_token = getenv("TWILIO_AUTH_TOKEN");
    $twilio_number = getenv("TWILIO_NUMBER");
    $recipients = $request->input('number');
    $message = $request->input('message');
    $client = new Client($account_sid, $auth_token);
    $message = $client->messages->create($recipients, ['from' => $twilio_number, 'body' => $message]);
    return $message->sid; 
});