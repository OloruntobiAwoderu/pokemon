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
        Schema::create('pokemon', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name');
			$table->string('type1');
			$table->string('type2')->nullable();
			$table->integer('total');
			$table->integer('hp');
			$table->integer('attack');
			$table->integer('defense');
			$table->integer('sp-attack');
			$table->integer('sp-defense');
			$table->integer('speed');
			$table->integer('generation');
			$table->boolean('legendary');
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
        Schema::dropIfExists('pokemon');
    }
};
