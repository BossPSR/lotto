<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SampleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\User::class, 100)->create()->each(function ($user){
            $data = array(
                'affiliate_code' => md5('afc_'.$user->id.'_'.$user->username.'_'.$user->created_at),
            );
            $affected = DB::table('users')
                ->where('id', $user->id)
                ->update($data);
        });

        factory(App\Models\Contents::class, 50)->create()->each(function ($content) {

            //สร้างแล้วใส่ ORDER id
            $data = array(
                'sort_order_id' => $content->id,
            );
            $affected = DB::table('contents')
                ->where('id', $content->id)
                ->update($data);
        });

        factory(App\Models\Deposits::class, 50)->create()->each(function ($content) {

            //สร้างแล้วใส่ ORDER id
            $data = array(
                'sort_order_id' => $content->id,
            );
            $affected = DB::table('deposits')
                ->where('id', $content->id)
                ->update($data);
        });

        factory(App\Models\Withdraws::class, 50)->create()->each(function ($content) {

            //สร้างแล้วใส่ ORDER id
            $data = array(
                'sort_order_id' => $content->id,
            );
            $affected = DB::table('deposits')
                ->where('id', $content->id)
                ->update($data);
        });

        // User
        DB::table('users')->insert([
            'username' => 'sanyaluck',
            'first_name' => 'f',
            'last_name' => 'f',
            'password' => Hash::make('f'),
            'tel' => '0954869064',
            'email' => Str::random(10).'@gmail.com',
            'status' => 'อนุมัติ',
            'affiliate_code' => md5('afc_101_sanyaluck_'.date('Y-m-d H:i:s')),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        // HUAY
        DB::table('huay_categorys')->insert([
            'name' => 'หวยทั่วไป',
            'sort_order_id' => 1,
            'created_at' => now(),
        ]);

        $general_huay = array(
            'หุ้นเกาหลี',
            'นิเคอิรอบเช้า',
            'นิเคอิรอบบ่าย',
            'ฮั่งเส็งรอบเช้า',
            'ฮั่งเส็งรอบบ่าย',
            'จีนรอบเช้า',
            'จีนรอบบ่าย',
            'หุ้นไต้หวัน',
            'หุ้นสิงคโปร์',
            'หุ้นอิยิปต์',
            'หุ้นเยอรมัน',
            'หุ้นอังกฤษ',
            'หุ้นรัสเซีย',
            'หุ้นอินเดีย',
            'หุ้นดาวน์โจน',
            'หวยมาเลย์',
            'หวยลาว',
            'หวยเวียดนาม / ฮานอย',
            'ฮานอยพิเศษ'
        );

        
        foreach ($general_huay as $name)
        {
            DB::table('huays')->insert([
                'name' => $name,
                'huay_category_id' => 1,
                'price_tree_up' => 900,
                'price_tree_tod' => 150,
                'price_tree_front' => 450,
                'price_tree_down' => 450,
                'price_two_up' => 90,
                'price_two_down' => 90,
                'price_run_up' => 3.5,
                'price_run_down' => 4.5,
                'created_at' => now(),
            ]);

        }

        DB::table('huay_categorys')->insert([
            'name' => 'หวยยี่กี',
            'sort_order_id' => 2,
            'created_at' => now(),
        ]);

        for ($i = 1; $i <= 1; $i++) {
            DB::table('huays')->insert([
                'name' => 'หวยยี่กี ',
                'huay_category_id' => 2,
                'price_tree_up' => 900,
                'can_shoot' => 1,
                // 'price_tree_tod' => 150,
                // 'price_tree_front' => 450,
                // 'price_tree_down' => 450,
                // 'price_two_up' => 90,
                'price_two_down' => 90,
                // 'price_run_up' => 3.5,
                // 'price_run_down' => 4.5,
                'created_at' => now(),
            ]);
        }

        DB::table('huay_categorys')->insert([
            'name' => 'หวยยี่กี Big Money',
            'sort_order_id' => 3,
            'created_at' => now(),
        ]);

        for ($i = 1; $i <= 1; $i++) {
            DB::table('huays')->insert([
                'name' => 'หวยยี่กี Big Money ',
                'huay_category_id' => 3,
                'price_tree_up' => 900,
                'can_shoot' => 1,

                // 'price_tree_tod' => 150,
                // 'price_tree_front' => 450,
                // 'price_tree_down' => 450,
                // 'price_two_up' => 90,
                'price_two_down' => 90,
                // 'price_run_up' => 3.5,
                // 'price_run_down' => 4.5,
                'created_at' => now(),
            ]);
        }
    }
}
