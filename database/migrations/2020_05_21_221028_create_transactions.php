<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('deposit_id')->nullable();
            $table->bigInteger('withdraw_id')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('admin_id')->nullable();
            $table->longText('proof_image')->nullable();
            $table->enum('status', ['pending','confirm','reject']);
            $table->enum('direction', ['IN','OUT']);
            $table->enum('type', ['CREDIT','BONUS', 'CREDIT_WITHDRAW']);
            $table->string('bank_name')->nullable();
            $table->string('account_no')->nullable();
            $table->string('account_name')->nullable();
            $table->string('remark', 500)->nullable();
            $table->decimal('amount', 22, 2)->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('transactions');
    }
}
