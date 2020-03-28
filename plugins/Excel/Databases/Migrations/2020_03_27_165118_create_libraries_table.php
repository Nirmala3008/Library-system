<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLibrariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public static function up()
    {
        Schema::create('libraries', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger('student_id');
            $table->string('library_name');

            $table->foreign('student_id')->references('id')->on('students');

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
        Schema::dropIfExists('libraries');
    }
}
