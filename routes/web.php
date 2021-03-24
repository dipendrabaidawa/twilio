<?php

use Illuminate\Support\Facades\Route;

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
// use Twilio\Rest\Client;

// Route::get('/', function () {
//     // return view('welcome');
//     $sid = getenv("TWILIO_SID");
//     $token = getenv("TWILIO_AUTH_TOKEN");
//     $twilio = new Client($sid, $token);
    
//     $message = $twilio->messages->create("+17023089151", // to
//         [
//             "body" => "This is the ship that made the Kessel Run in fourteen parsecs?",
//             "from" => "+18649528100"
//         ]
//     );
//     print($message->status);
//     var_dump($message->sid);
// });
Route::get('/', 'HomeController@show');
Route::post('/', 'HomeController@storePhoneNumber');
Route::post('/custom', 'HomeController@sendCustomMessage');