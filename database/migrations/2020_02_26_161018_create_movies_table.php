<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->double('price')->nullable();
            $table->text('description')->nullable();
            $table->string('poster')->nullable();
            $table->string('image')->nullable();
            $table->string('path')->nullable();
            $table->string('year')->nullable();
            $table->double('rating')->nullable();
            $table->integer('percent')->default(0);
            $table->integer('views')->default(0);

            $table->unsignedBigInteger('director_id')->nullable();
            $table->foreign('director_id')->references('id')->on('director')->onDelete('cascade');



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
        Schema::dropIfExists('movies');
    }
}
