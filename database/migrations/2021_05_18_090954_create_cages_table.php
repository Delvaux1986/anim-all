<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cages', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('area')->nullable(); 
            $table->time('lunchtimeFirst')->nullable();
            $table->boolean('checkFirstLunchtime')->nullable();
            $table->time('lunchtimeTwo')->nullable();
            $table->boolean('checkSecondLunchtime')->nullable();
            $table->boolean('occuped')->default(0);
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
        Schema::dropIfExists('cages');
    }
}
