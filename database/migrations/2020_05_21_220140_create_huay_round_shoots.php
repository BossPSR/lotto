<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHuayRoundShoots extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('huay_round_shoots', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('huay_category_id');
            $table->bigInteger('user_id');
            $table->bigInteger('huay_id');
            $table->bigInteger('huay_round_id');
            $table->tinyInteger('is_won')->default(0);
            $table->string('secret')->nullable();
            $table->string('user_name_secret')->nullable();
            $table->string('number')->nullable();
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
        Schema::dropIfExists('huay_round_shoots');
    }
}
