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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('auth/login', 'api\AuthApi@login');

Route::middleware(['checkAuthApi'])->group(function(){
    // API TES
    Route::get("tes", 'api\TesApi@index');
    Route::get("tes/{any}", 'api\TesApi@detail');
    Route::post("tes", 'api\TesApi@store');
    Route::put("tes", 'api\TesApi@update');
    Route::delete("tes", 'api\TesApi@delete');

    // API PRESENCE
    Route::get("presence", 'api\PresenceApi@index');
    Route::get("presence/{any}", 'api\PresenceApi@detail');
    Route::post("presence", 'api\PresenceApi@store');

    // API PRODUCT
    Route::get("product", 'api\ProductApi@index');
    
    // API DISTRICT
    Route::get("district", 'api\DistrictApi@index');
    
    // API PICKUP
    Route::post("pickup", 'api\PickupApi@store');

    //API SHOP
    Route::post("shop", 'api\ShopApi@store');
    Route::get("shop", 'api\ShopApi@list_store');
});