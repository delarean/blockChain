<?php

use App\Http\Requests\CardsInfoRequest;

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

Route::prefix('card')->group( function () {

    Route::post('issue','Api\CardsProController@issueNewWallet');

    Route::post('activate','Api\CardsProController@activateCard');

    Route::post('info','Api\CardsProController@getCardInfo');

    Route::post('write_off','Api\CardsProController@cardWriteOff');

    Route::post('calculate/discount','Api\CardsProController@cardCalculateDiscount');

    Route::post('purchase','Api\CardsProController@cardCalculateDiscount');

    Route::post('search','Api\CardsProController@searchCard');

});

Route::prefix('operation')->group(function (){

    Route::post('info','Api\CardsProController@getOperationInfo');

    Route::post('refund','Api\CardsProController@refundOperation');

});
