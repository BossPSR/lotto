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
            $table->enum('round_status', ['pending','complete','cancel', 'close']);


            $table->decimal('price_tree_up', 22, 2)->default(0);
            $table->decimal('price_tree_tod', 22, 2)->default(0);
            $table->decimal('price_tree_front', 22, 2)->default(0);
            $table->decimal('price_tree_down', 22, 2)->default(0);
            $table->decimal('price_two_up', 22, 2)->default(0);
            $table->decimal('price_two_down', 22, 2)->default(0);
            $table->decimal('price_run_up', 22, 2)->default(0);
            $table->decimal('price_run_down', 22, 2)->default(0);
            $table->decimal('price_shoot', 22, 2)->default(0);

            $table->string('result_tree_up', 6, 0)->default("");
            $table->string('result_tree_tod', 6, 0)->default("");
            $table->string('result_tree_front', 6, 0)->default("");
            $table->string('result_tree_down', 6, 0)->default("");
            $table->string('result_two_up', 6, 0)->default("");
            $table->string('result_two_down', 6, 0)->default("");
            $table->string('result_run_up', 6, 0)->default("");
            $table->string('result_run_down', 6, 0)->default("");

            $table->string('result_shoot')->default("");
            $table->string('result_total_shoot')->default("");
            $table->string('result_row_sixteen')->default("");
            $table->string('result_user_firt')->default("");
            $table->string('result_user_sixteen')->default("");

            $table->decimal('total_play', 22, 2)->default(0);
            $table->decimal('total_won', 22, 2)->default(0);
            $table->decimal('total_won_shoot', 22, 2)->default(0);

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
