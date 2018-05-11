<?php

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

Route::get('/',"Landing\LandingController@showLanding");

Route::group(['prefix' => 'lk'],function () {

    Route::get('/',"LK\LKController@showMainPage")->name('wallet');
    Route::get('/wallet/add',"LK\LKController@showAddWallet")->name('addWallet');
    Route::get('/wallet/new',"LK\LKController@showNewWallet")->name('newWallet');
    Route::get('/wallet/settings',"LK\LKController@showWalletSettings")->name('walletSettings');
    Route::get('/wallet/settings/identification',"LK\LKController@showWalletIdentification")->name('walletIdent');

    Route::post('/wallet/settings/identification',"LK\LKController@saveIdentSettings");
    Route::post('/wallet/personal/new',"LK\LKController@makePersonalWallet")->name('newPersonalWallet');
    Route::post('/wallet/shared/new',"LK\LKController@makeSharedlWallet")->name('newSharedWallet');

});

Route::prefix('user')->group(function (){

    Route::post('register',"Landing\AuthController@registerUser");

    Route::post('login',"Landing\AuthController@loginUser");

});

Route::prefix('partner')->group(function () {

    Route::post('register',"Landing\AuthController@registerPartner");

});


