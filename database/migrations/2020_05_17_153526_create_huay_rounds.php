<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHuayRounds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('huay_rounds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('huay_category_id');
            $table->bigInteger('huay_id');
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->dateTime('start_datetime');
            $table->dateTime('end_datetime');
            $table->tinyInteger('is_active');
            $table->string('name');
            $table->string('secret')->nullable();
            $table->tinyInteger('can_shoot')->default(0);

            $table->decimal('price_tree_up', 22, 2)->default(0);
            $table->decimal('price_tree_tod', 22, 2)->default(0);
            $table->decimal('price_tree_front', 22, 2)->default(0);
            $table->decimal('price_tree_down', 22, 2)->default(0);
            $table->decimal('price_two_up', 22, 2)->default(0);
            $table->decimal('price_two_down', 22, 2)->default(0);
            $table->decimal('price_run_up', 22, 2)->default(0);
            $table->decimal('price_run_down', 22, 2)->default(0);

            $table->decimal('result_tree_up', 22, 2)->default(0);
            $table->decimal('result_tree_tod', 22, 2)->default(0);
            $table->decimal('result_tree_front', 22, 2)->default(0);
            $table->decimal('result_tree_down', 22, 2)->default(0);
            $table->decimal('result_two_up', 22, 2)->default(0);
            $table->decimal('result_two_down', 22, 2)->default(0);
            $table->decimal('result_run_up', 22, 2)->default(0);
            $table->decimal('result_run_down', 22, 2)->default(0);

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
        Schema::table('huay_rounds', function (Blueprint $table) {
            //
        });
    }
}
