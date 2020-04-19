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

Route::get('/','Frontend\IndexController@index');
Route::get('/index','Frontend\IndexController@index');
Route::get('/index_member','Frontend\IndexController@index_member');
Route::get('/plus_story','Frontend\IndexController@plus_story');
Route::get('/lottery_request_deposit','Frontend\IndexController@lottery_request_deposit');
Route::get('/lottery_withdraw','Frontend\IndexController@lottery_withdraw');
Route::get('/lottery_play','Frontend\LotteryPlayController@index');
Route::get('/lottery_transaction','Frontend\LotteryTransactionController@index');
Route::get('/lottery_result','Frontend\LotteryResultController@index');
Route::get('/lottery_credit','Frontend\LotteryCreditController@index');
Route::get('/lottery_number_set','Frontend\LotteryNumberSetController@index');
Route::get('/lottery_news','Frontend\LotteryNewsController@index');
Route::get('/lottery_bonus','Frontend\LotteryBonusController@index');
Route::get('/help','Frontend\HelpController@index');
Route::get('/contact','Frontend\ContactController@index');
