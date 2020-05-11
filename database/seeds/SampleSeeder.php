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
                'sort_order_id' => $content->id ,
            );
            $affected = DB::table('contents')
              ->where('id', $content->id)
              ->update($data);
        });

        factory(App\Models\Deposits::class, 50)->create()->each(function ($content) {
            
            //สร้างแล้วใส่ ORDER id
            $data = array(
                'sort_order_id' => $content->id ,
            );
            $affected = DB::table('deposits')
              ->where('id', $content->id)
              ->update($data);
        });

        factory(App\Models\Withdraws::class, 50)->create()->each(function ($content) {
            
            //สร้างแล้วใส่ ORDER id
            $data = array(
                'sort_order_id' => $content->id ,
            );
            $affected = DB::table('deposits')
              ->where('id', $content->id)
              ->update($data);
        });
    }
}
