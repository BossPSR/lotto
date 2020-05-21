<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHuayRoundPoyNumbers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('huay_round_poy_numbers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('huay_category_id');
            $table->bigInteger('user_id');
            $table->bigInteger('huay_id');
            $table->bigInteger('huay_round_id');
            $table->bigInteger('huay_round_poy_id');
            $table->string('secret')->nullable();
            $table->string('huay_type')->nullable();
            $table->string('number')->nullable();
            $table->decimal('multiple', 22, 2)->default(0);
            $table->decimal('huay_price', 22, 2)->default(0);
            $table->decimal('total_price', 22, 2)->default(0);
            $table->tinyInteger('is_won')->default(0);
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
        Schema::dropIfExists('huay_round_poy_numbers');
    }
}
