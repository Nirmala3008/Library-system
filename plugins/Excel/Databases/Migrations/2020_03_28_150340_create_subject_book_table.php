<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public static function up()
    {
        Schema::create('subject_book', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger('library_id');
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('book_id');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('library_id')->references('id')->on('libraries');
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->foreign('book_id')->references('id')->on('books');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public static function down()
    {
        Schema::dropIfExists('subject_book');
    }
}
