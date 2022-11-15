<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('user_id')->constrained('user','id');
            $table->float('total');
            $table->integer('quantity');
            $table->timestamp('create_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('status_id')->unsigned();
            $table->integer('discount_id')->unsigned();
            $table->foreign('status_id')->references('id')->on('status');
            $table->foreign('discount_id')->references('id')->on('discount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
};
