<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SampleSeeder::class,
        ]);
        // $this->call(UsersTableSeeder::class);

        DB::table('admins')->insert([
            'username' => 'admin_1',
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('123456'),
            'status' => 'คนออกผลห่วย',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('admins')->insert([
            'username' => 'admin_2',
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('123456'),
            'status' => 'ผู้ดูแลสมาชิก',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('admins')->insert([
            'username' => 'admin_3',
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('123456'),
            'status' => 'ผู้ดูแลฝากถอน',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('admins')->insert([
            'username' => 'admin_4',
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('123456'),
            'status' => 'ผู้ดูแลระบบใหญ่',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
