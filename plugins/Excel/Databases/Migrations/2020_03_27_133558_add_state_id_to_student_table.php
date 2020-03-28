<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStateIdToStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public static function up()
    {
            Schema::table('students', function (Blueprint $table) {
                $table->unsignedBigInteger('state_id')->nullable();

                $table->foreign('state_id')->references('id')->on('states');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public static function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn('state_id');
        });

    }
}
