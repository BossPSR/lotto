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

Route::get('/','IndexController@index');
Route::get('/index','IndexController@index');
Route::get('/index_member','IndexController@index_member');
Route::get('/lottery_play','LotteryPlayController@index');
Route::get('/contact','LotteryPlayController@contact');
