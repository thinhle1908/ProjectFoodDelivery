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
            $table->string('firstname',30)->nullable();
            $table->string('lastname',50)->nullable();
            $table->string('email',100)->nullable();
            $table->string('mobile',15)->nullable();
            $table->string('address',255)->nullable();
            $table->foreignId('user_id')->constrained('user','id');
            $table->float('total');
            $table->integer('quantity');
            $table->timestamp('created_at')->nullable();
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
