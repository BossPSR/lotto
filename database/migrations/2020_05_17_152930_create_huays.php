<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHuays extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('huays', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('huay_category_id');
            $table->bigInteger('sort_order_id')->nullable();
            $table->string('name');
            $table->tinyInteger('can_shoot')->default(0);
            $table->tinyInteger('is_yee_kee')->default(0);
            $table->decimal('price_tree_up', 12, 2)->default(0);
            $table->decimal('price_tree_tod', 12, 2)->default(0);
            $table->decimal('price_tree_front', 12, 2)->default(0);
            $table->decimal('price_tree_down', 12, 2)->default(0);
            $table->decimal('price_two_up', 12, 2)->default(0);
            $table->decimal('price_two_down', 12, 2)->default(0);
            $table->decimal('price_run_up', 12, 2)->default(0);
            $table->decimal('price_run_down', 12, 2)->default(0);
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
        Schema::table('huays', function (Blueprint $table) {
            //
        });
    }
}
