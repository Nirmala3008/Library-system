<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRegionIdToStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public static function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->unsignedBigInteger('region_id')->nullable();

            $table->foreign('region_id')->references('id')->on('regions');

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
            $table->dropColumn('region_id');
        });
    }
}
