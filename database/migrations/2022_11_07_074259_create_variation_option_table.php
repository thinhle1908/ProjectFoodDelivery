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
        Schema::create('variation_option', function (Blueprint $table) {
            $table->increments('id');
            $table->string('value',50)->nullable();
            $table->integer('variation_id')->unsigned();
            $table->foreign('variation_id')->references('id')->on('variation');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('variation_option');
    }
};
