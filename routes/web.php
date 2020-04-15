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
Route::get('/lottery_play','Frontend\LotteryPlayController@index');
Route::get('/lottery_transaction','Frontend\LotteryTransactionController@index');
Route::get('/lottery_result','Frontend\LotteryResultController@index');
Route::get('/help','Frontend\HelpController@index');
Route::get('/contact','Frontend\ContactController@index');
