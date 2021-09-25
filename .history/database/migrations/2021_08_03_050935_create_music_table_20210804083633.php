<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMusicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('music', function (Blueprint $table) {
            $table->id();
            $table->string('artiste');
            $table->string('titre');
            $table->string('album')->nullable();
            $table->string('duree_total');
            $table->string('duree_total_seconde');
            $table->text('illustration')->nullable();
            $table->string('genre');
            $table->string('compositeur')->nullable();
            $table->string('numero_album');
            $table->string('copyright')->nullable();
            $table->string('format');
            $table->string('image');
            $table->string('src');
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
        Schema::dropIfExists('music');
    }
}
