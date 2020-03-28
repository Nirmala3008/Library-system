<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStandardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public static function up()
    {
        Schema::create('standards', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger('library_id');
            $table->string('standard');

            $table->foreign('library_id')->references('id')->on('libraries');

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
        Schema::dropIfExists('standards');
    }
}
