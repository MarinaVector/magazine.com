<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorMagazineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('author_magazine', function (Blueprint $table) {
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('magazine_id');
            $table->timestamps();

            $table->unique([ 'author_id', 'magazine_id']);

            $table->foreign('author_id')->on('authors')->references('id')->cascadeOnDelete();
            $table->foreign('magazine_id')->on('magazines')->references('id')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('author_magazine');
    }
}
