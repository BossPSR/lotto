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
            $table->bigInteger('upline_id')->nullable();
            $table->bigInteger('admin_id')->nullable();
            $table->enum('status',['รอการตรวจสอบ','อนุมัติ','ไม่อนุมัติ','แบนสมาชิก','บัญชีดำ'])->default('รอการตรวจสอบ');
            $table->string('cover_name',100)->nullable();
            $table->string('affiliate_code',100)->nullable();
            $table->string('path_cover',100)->nullable();
            $table->string('cover_extension',50)->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('bank_name')->nullable();
            $table->string('account_no')->nullable();
            $table->string('account_name')->nullable();
            $table->decimal('money', 22, 2)->default(0);
            $table->decimal('credit', 22, 2)->default(0);
            $table->string('session_id')->nullable();
            $table->bigInteger('last_content_id')->nullable();
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
