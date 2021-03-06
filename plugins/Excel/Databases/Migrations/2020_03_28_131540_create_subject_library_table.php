<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectLibraryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public static function up()
    {
        Schema::create('subject_library', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger('library_id');
            $table->unsignedBigInteger('standard_id');

            $table->foreign('library_id')->references('id')->on('libraries');
            $table->foreign('standard_id')->references('id')->on('standards');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public static function down()
    {
        Schema::dropIfExists('subject_library');

    }
}
