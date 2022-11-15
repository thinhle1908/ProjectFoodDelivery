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
        Schema::create('item_configuration', function (Blueprint $table) {
            $table->foreignId('item_id')->constrained('item','id');
            $table->integer('variation_option_id')->unsigned();
            $table->foreign('variation_option_id')->references('id')->on('variation_option');
            $table->primary(['item_id','variation_option_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_configuration');
    }
};
