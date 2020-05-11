<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Withdraws::class, function (Faker $faker) {
    $banks_array = array(
        'ธนาคารกรุงเทพ',
        'ธนาคารกสิกรไทย',
        'ธนาคารกรุงไทย',
        'ธนาคารทหารไทย',
        'ธนาคารไทยพาณิชย์',
        'ธนาคารกรุงศรีอยุธยา',
        'ธนาคารเกียรตินาคิน',
        'ธนาคารซีไอเอ็มบีไทย',
        'ธนาคารทิสโก้',
        'ธนาคารธนชาต',
        'ธนาคารยูโอบี',
        'ธนาคารไทยเครดิตเพื่อรายย่อย',
        'ธนาคารแลนด์ แอนด์ เฮาส์',
        'ธนาคารไอซีบีซี (ไทย)',
        'ธนาคารพัฒนาวิสาหกิจขนาดกลางและขนาดย่อมแห่งประเทศไทย',
        'ธนาคารเพื่อการเกษตรและสหกรณ์การเกษตร',
        'ธนาคารเพื่อการส่งออกและนำเข้าแห่งประเทศไทย',
        'ธนาคารออมสิน',
        'ธนาคารอาคารสงเคราะห์',
        'ธนาคารอิสลามแห่งประเทศไทย',
        'ธนาคารแห่งประเทศไทย',
        'ธนาคารเมกะ สากลพาณิชย์',
        'ธนาคารแห่งประเทศจีน (ไทย)',
        'ธนาคารเอเอ็นแซด (ไทย)',
        'ธนาคารซูมิโตโม มิตซุย ทรัสต์ (ไทย)',
        'ธนาคารซิตี้แบงค์',
        'ธนาคารสแตนดาร์ด ชารเตอรด (ไทย)',
    );
    return [
        'user_id' => rand(1, 100),
        'status' => 'pending',
        'amount' => rand(500, 1000000),
        'bank_name' => $banks_array[rand(0, (count($banks_array)-1))],
        'account_no' => 'XXXXX-XXXXX-XXXXX',
        'account_name' => 'ABCD EDFG',

    ];
});
