<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePharmcyFavoritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pharmcy_favorites', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pharamcyId')->unsigned();
            $table->foreign('pharamcyId')->references('id')->on('pharamcies');
            $table->integer('userId')->unsigned();
            $table->foreign('userId')->references('id')->on('users');
            $table->boolean('isFavorite');
            $table->enum('rating',['1','2','3','4','5']);
            $table->string('unique')->unique();
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
        Schema::dropIfExists('pharmcy_favorites');
    }
}
