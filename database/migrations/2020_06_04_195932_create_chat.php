<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fingerprint')->nullable();
            $table->string('text')->nullable();
            $table->string('image')->nullable();
            $table->tinyInteger('is_admin')->default(0);
            $table->tinyInteger('is_admin_read')->default(0);
            $table->tinyInteger('is_member_read')->default(0);
            $table->tinyInteger('member_delete')->default(0);
            $table->tinyInteger('admin_delete')->default(0);
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
        Schema::dropIfExists('chat');
    }
}
