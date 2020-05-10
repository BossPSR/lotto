<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username');
            $table->date('birthday')->nullable();
            $table->string('tel');
            $table->string('line_id')->nullable();
            $table->enum('status',['รอการตรวจสอบ','อนุมัติ','ไม่อนุมัติ','แบนสมาชิก','บัญชีดำ'])->default('รอการตรวจสอบ');
            $table->string('cover_name',100)->nullable();
            $table->string('path_cover',100)->nullable();
            $table->string('cover_extension',50)->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
