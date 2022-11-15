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
        Schema::create('user_payment_method', function (Blueprint $table) {
            $table->increments('id');
            $table->string('provider',100)->nullable();
            $table->string('account_number',20)->nullable();
            $table->boolean('is_default')->nullable();
            $table->foreignId('user_id')->constrained('user','id');
            $table->integer('payment_type')->unsigned();
            $table->foreign('payment_type')->references('id')->on('payment_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_payment_method');
    }
};
