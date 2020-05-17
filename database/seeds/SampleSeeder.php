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
        factory(App\Models\User::class, 100)->create();

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

        // HUAY
        DB::table('huay_categorys')->insert([
            'name' => 'หวยทั่วไป',
            'sort_order_id' => 1,
            'created_at' => now(),
        ]);


        for ($i = 1; $i <= 10; $i++) {
            DB::table('huays')->insert([
                'name' => 'หวยทั่วไป ' . $i,
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

        for ($i = 1; $i <= 10; $i++) {
            DB::table('huays')->insert([
                'name' => 'หวยยี่กี ' . $i,
                'huay_category_id' => 2,
                'price_tree_up' => 900,
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
            'name' => 'หวยยี่กี CF',
            'sort_order_id' => 3,
            'created_at' => now(),
        ]);

        for ($i = 1; $i <= 10; $i++) {
            DB::table('huays')->insert([
                'name' => 'หวยยี่กี CF ' . $i,
                'huay_category_id' => 3,
                'price_tree_up' => 900,
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
