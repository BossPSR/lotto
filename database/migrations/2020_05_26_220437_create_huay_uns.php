<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHuayUns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('huay_uns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('huay_category_id');
            $table->bigInteger('huay_id');
            $table->string('huay_type')->nullable();
            $table->string('number')->nullable();
            $table->decimal('multiple', 22, 2)->default(0);
            $table->decimal('huay_price', 22, 2)->default(0);
            $table->decimal('min_price', 22, 2)->default(0);
            $table->decimal('max_price', 22, 2)->default(0);
            $table->decimal('over_percent', 22, 2)->default(0);
            $table->tinyInteger('is_enable')->default(0);
            $table->tinyInteger('is_won')->default(-1);
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
        Schema::dropIfExists('huay_uns');
    }
}
