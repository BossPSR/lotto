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

Route::get('/','Frontend\IndexController@index')->name('index');
Route::get('/index','Frontend\IndexController@index')->name('index');
Route::get('/register','Frontend\IndexController@register')->name('register');
Route::post('/register_process','Frontend\IndexController@register_process')->name('register_process');
Route::post('/login_process','Auth\LoginController@login')->name('login_process');
Route::get('/profile_user','Frontend\IndexController@profile_user')->name('profile_user');
Route::get('/logout','Auth\LoginController@logout')->name('logout');

Route::get('/index_member','Frontend\IndexController@index_member')->name('index_member');
Route::get('/plus_story','Frontend\IndexController@plus_story')->name('plus_story');
Route::get('/lottery_request_deposit','Frontend\IndexController@lottery_request_deposit')->name('lottery_request_deposit');
Route::get('/lottery_withdraw','Frontend\IndexController@lottery_withdraw')->name('lottery_withdraw');
Route::get('/lottery_play','Frontend\LotteryPlayController@index')->name('lottery_play');
Route::get('/lottery_transaction','Frontend\LotteryTransactionController@index')->name('lottery_transaction');
Route::get('/lottery_result','Frontend\LotteryResultController@index')->name('lottery_result');
Route::get('/lottery_credit','Frontend\LotteryCreditController@index')->name('lottery_credit');
Route::get('/lottery_affiliate','Frontend\LotteryAffiliateController@index')->name('lottery_affiliate');
Route::get('/lottery_number_set','Frontend\LotteryNumberSetController@index')->name('lottery_number_set');
Route::get('/lottery_news','Frontend\LotteryNewsController@index')->name('lottery_news');
Route::get('/lottery_bonus','Frontend\LotteryBonusController@index')->name('lottery_bonus');
Route::get('/help','Frontend\HelpController@index')->name('help');
Route::get('/contact','Frontend\ContactController@index')->name('contact');

//admin
Route::prefix('/admin')->name('admin.')->group(function () {
    Route::get('/login','Auth\LoginController@showAdminLoginForm')->name('login'); // Login Admin
    Route::post('/login_process','Auth\LoginController@adminLogin')->name('login_process');
    Route::get('/index_admin','Backend\IndexController@index')->name('index'); //Dashboard
    Route::get('/manage_huay','Backend\ManageHuayController@index')->name('manage_huay'); //จัดการหวย
    Route::get('/manage_huay_yeekee','Backend\ManageHuayController@manage_huay_yeekee')->name('manage_huay_yeekee'); //จัดการหวยยี่กี
    Route::get('/manage_huay_yeekee_cf','Backend\ManageHuayController@manage_huay_yeekee_cf')->name('manage_huay_yeekee_cf'); //จัดการหวยยี่กี CF
    Route::get('/reward_huay','Backend\RewardHuayController@index')->name('reward_huay'); //ออกผลหวย
    Route::get('/reward_huay_yeekee','Backend\RewardHuayController@reward_huay_yeekee')->name('reward_huay_yeekee'); //ออกผลหวยยี่กี
    Route::get('/reward_huay_yeekee_cf','Backend\RewardHuayController@reward_huay_yeekee_cf')->name('reward_huay_yeekee_cf'); //ออกผลหวยยี่กี CF
});
