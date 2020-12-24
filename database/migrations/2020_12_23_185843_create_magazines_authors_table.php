<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMagazinesAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('magazines_authors', function (Blueprint $table) {
            $table->unsignedBigInteger('magazine_id');
            $table->unsignedBigInteger('author_id');
            $table->timestamps();

            $table->unique(['magazine_id', 'author_id']);

            $table->foreign('magazine_id')->on('magazines')->references('id')->cascadeOnDelete();
            $table->foreign('author_id')->on('authors')->references('id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('magazines_authors');
    }
}
