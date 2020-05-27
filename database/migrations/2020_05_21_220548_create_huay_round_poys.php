<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHuayRoundPoys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('huay_round_poys', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->enum('poy_status', ['pending','complete','cancel'])->default('pending');
            $table->tinyInteger('is_my_poy')->default(0);
            $table->bigInteger('huay_category_id');
            $table->bigInteger('user_id');
            $table->bigInteger('huay_id');
            $table->bigInteger('huay_round_id');
            $table->string('secret')->nullable();
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
        Schema::dropIfExists('huay_round_poys');
    }
}
