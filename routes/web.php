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

Route::post('/get_chat_list','Frontend\ChatController@get_chat_list');
Route::post('/add_chat_list','Frontend\ChatController@add_chat_list');
Route::post('/get_fingerprint','Frontend\ChatController@get_fingerprint');

Route::get('/index','Frontend\IndexController@index')->name('index');
Route::get('/otp','Frontend\IndexController@otp')->name('otp');
Route::get('/otp_confirm','Frontend\IndexController@otp_confirm')->name('otp_confirm');
Route::get('/register_info','Frontend\IndexController@register')->name('register');

Route::post('/register_process','Frontend\IndexController@register_process')->name('register_process');
Route::post('/login_process','Auth\LoginController@login')->name('login_process');
Route::get('/profile_user','Frontend\IndexController@profile_user')->name('profile_user');
Route::get('/logout','Auth\LoginController@logout')->name('logout');
Route::get('/edit_profile','Frontend\IndexController@edit_profile')->name('edit_profile');
Route::post('/edit_profile','Frontend\IndexController@edit_profile_post');

Route::get('/index_member','Frontend\IndexController@index_member')->name('index_member');
Route::get('/plus_story','Frontend\IndexController@plus_story')->name('plus_story');

Route::get('/lottery_request_deposit','Frontend\IndexController@lottery_request_deposit')->name('lottery_request_deposit');
Route::post('/lottery_request_deposit','Frontend\IndexController@lottery_request_deposit_post');

Route::get('/lottery_withdraw','Frontend\IndexController@lottery_withdraw')->name('lottery_withdraw');
Route::post('/lottery_withdraw','Frontend\IndexController@lottery_withdraw_post');

Route::get('/lottery_play','Frontend\LotteryPlayController@index')->name('lottery_play');

Route::get('/lottery_government','Frontend\LotteryPlayController@lottery_government')->name('lottery_government');
Route::post('/lottery_government','Frontend\LotteryPlayController@lottery_government_post');// ข้อมูลหวย
Route::get('/lottery_yeekee','Frontend\LotteryPlayController@lottery_yeekee')->name('lottery_yeekee');

Route::get('/lottery_transaction','Frontend\LotteryTransactionController@index')->name('lottery_transaction');
Route::POST('/lottery_transaction','Frontend\LotteryTransactionController@post');

Route::get('/lottery_result','Frontend\LotteryResultController@index')->name('lottery_result');
Route::get('/lottery_credit','Frontend\LotteryCreditController@index')->name('lottery_credit');
Route::get('/lottery_money','Frontend\LotteryMoneyController@index')->name('lottery_money');
Route::get('/lottery_affiliate','Frontend\LotteryAffiliateController@index')->name('lottery_affiliate');
Route::post('/lottery_affiliate','Frontend\LotteryAffiliateController@post');
Route::get('/lottery_number_set','Frontend\LotteryNumberSetController@index')->name('lottery_number_set');
Route::post('/lottery_number_set','Frontend\LotteryNumberSetController@post');

Route::get('/lottery_news','Frontend\LotteryNewsController@index')->name('lottery_news');
Route::get('/lottery_bonus','Frontend\LotteryBonusController@index')->name('lottery_bonus');
Route::get('/bonus_normal','Frontend\LotteryBonusController@bonus_normal')->name('bonus_normal');
Route::post('/bonus_normal_process','Frontend\LotteryBonusController@bonus_normal_process')->name('bonus_normal_process');
Route::get('/bonus_vip','Frontend\LotteryBonusController@bonus_vip')->name('bonus_vip');
Route::post('/bonus_vip_process','Frontend\LotteryBonusController@bonus_vip_process')->name('bonus_vip_process');
Route::get('/help','Frontend\HelpController@index')->name('help');
Route::get('/help_visitor','Frontend\HelpController@index_visitor')->name('help_visitor');
Route::get('/contact','Frontend\ContactController@index')->name('contact');
Route::get('/contact_visitor','Frontend\ContactController@index_visitor')->name('contact_visitor');
Route::get('/lottery_result_yeekee','Frontend\LotteryResultController@result_yeekee')->name('lottery_result_yeekee');
Route::get('/message','Frontend\MessageController@index')->name('message');

//admin
Route::prefix('/admin')->name('admin.')->group(function () {
    Route::get('/login','Auth\LoginController@showAdminLoginForm')->name('login'); // Login Admin
    Route::post('/login_process','Auth\LoginController@adminLogin')->name('login_process');

    Route::get('/index_admin','Backend\IndexController@index')->name('index'); //Dashboard
    Route::get('/dashboard','Backend\IndexController@dashboard')->name('dashboard'); //Dashboard
    Route::get('/manage_admin','Backend\IndexController@manage_admin')->name('manage_admin'); //ระบบจัดการผู้ดูแล

    Route::get('/manage_huay','Backend\ManageHuayController@index')->name('manage_huay'); //จัดการหวย
    Route::get('/manage_huay_round','Backend\ManageHuayController@manage_huay_round')->name('manage_huay_round'); //จัดการหวย

    Route::get('/manage_huay_yeekee','Backend\ManageHuayController@manage_huay_yeekee')->name('manage_huay_yeekee'); //จัดการหวยยี่กี
    Route::get('/manage_huay_yeekee_cf','Backend\ManageHuayController@manage_huay_yeekee_cf')->name('manage_huay_yeekee_cf'); //จัดการหวยยี่กี CF

    Route::get('/reward_huay','Backend\RewardHuayController@index')->name('reward_huay'); //ออกผลหวย
    Route::post('/reward_huay','Backend\RewardHuayController@post'); //ออกผลหวย

    Route::get('/reward_huay_yeekee','Backend\RewardHuayController@reward_huay_yeekee')->name('reward_huay_yeekee'); //ออกผลหวยยี่กี
    Route::get('/reward_huay_yeekee_cf','Backend\RewardHuayController@reward_huay_yeekee_cf')->name('reward_huay_yeekee_cf'); //ออกผลหวยยี่กี CF

    Route::get('/un_huay','Backend\UnHuayController@index')->name('un_huay'); //อั้นหวย
    Route::post('/un_huay','Backend\UnHuayController@post'); //อั้นหวย

    Route::get('/un_huay_yeekee','Backend\UnHuayController@un_huay_yeekee')->name('un_huay_yeekee'); //จัดการหวยยี่กี
    Route::get('/un_huay_yeekee_cf','Backend\UnHuayController@un_huay_yeekee_cf')->name('un_huay_yeekee_cf'); //จัดการหวยยี่กี CF

    Route::get('/chit_huay','Backend\ChitHuayController@index')->name('chit_huay'); //โพยหวยทั่วไป
    Route::post('/chit_huay','Backend\ChitHuayController@post'); //โพยหวยทั่วไป

    Route::get('/approve_user','Backend\UserController@approve_user')->name('approve_user'); //อนุมัติสมัครสมาชิก
    Route::get('/list_user','Backend\UserController@list_user')->name('list_user'); //รายการผู้เล่น
    Route::get('/blacklist_user','Backend\UserController@blacklist_user')->name('blacklist_user'); //บัญชีดำ

    Route::get('/news_huay','Backend\NewsHuayController@index')->name('news_huay'); //จัดการข่าวสาร
    Route::get('/content_modal_huay','Backend\ContentModalController@index')->name('content_modal_huay'); //จัดการข่าวสาร
    Route::get('/chat','Backend\chatController@index')->name('chat'); //chat

    Route::get('/rule_huay','Backend\RuleHuayController@index')->name('rule_huay'); //จัดการกฏติกา

    Route::get('/contact_huay','Backend\ContactHuayController@index')->name('contact_huay'); //จัดการข้อมูลติดต่อ

    Route::get('/deposit_approve','Backend\DepositHuayController@deposit_approve')->name('deposit_approve'); //อนุมัติแจ้งฝาก
    Route::get('/deposit_list','Backend\DepositHuayController@deposit_list')->name('deposit_list'); //รายการแจ้งฝากเงิน

    Route::get('/withdraw_approve','Backend\WithdrawHuayController@withdraw_approve')->name('withdraw_approve'); //อนุมัติแจ้งถอน
    Route::get('/withdraw_list','Backend\WithdrawHuayController@withdraw_list')->name('withdraw_list'); //รายการแจ้งถอนเงิน

    Route::get('/bank_huay','Backend\BankHuayController@index')->name('bank_huay'); //อนุมัติแจ้งถอน

    Route::get('/commission_manage','Backend\CommissionController@commission_manage')->name('commission_manage'); //อนุมัติสมัครสมาชิก
    Route::post('/commission_manage','Backend\CommissionController@post'); //อนุมัติสมัครสมาชิก

    Route::get('/commission_credit','Backend\CommissionController@commission_credit')->name('commission_credit'); //รายการผู้เล่น
    Route::get('/commission_approve','Backend\CommissionController@commission_approve')->name('commission_approve'); //บัญชีดำ
    Route::post('/commission_approve','Backend\CommissionController@post'); // อนุมัติการถอน Credit


    Route::post('/get-data','Backend\DefaultController@get_data')->name('get_data'); //ดึงข้อมูลเข้า Modal

    Route::post('/news_huay','Backend\NewsHuayController@post')->name('post'); //จัดการข่าวสาร
    Route::post('/rule_huay','Backend\RuleHuayController@post'); //จัดการกฏกติกา
    Route::post('/bank_huay','Backend\BankHuayController@post'); //จัดการธนาคาร
    Route::post('/contact_huay','Backend\ContactHuayController@post'); //จัดการข้อมูลติดต่อ
    Route::post('/deposit_approve','Backend\DepositHuayController@post'); //จัดการฝาก
    Route::post('/withdraw_approve','Backend\WithdrawHuayController@post'); //จัดการถอน
    Route::post('/manage_admin','Backend\indexController@post_admin'); //จัดการ admin
    Route::post('/approve_user','Backend\UserController@post'); //อนุมัติสมัครสมาชิก

    Route::POST('/manage_huay','Backend\ManageHuayController@huay_manage_post');//จัดการราคาหวย
    Route::POST('/manage_huay_round','Backend\ManageHuayController@manage_huay_round_post');//จัดการรอบหวย

    Route::post('/index_admin','Backend\IndexController@post'); //Dashboard
    Route::post('/content_modal_huay','Backend\ContentModalController@post'); //จัดการข่าวสาร


});
