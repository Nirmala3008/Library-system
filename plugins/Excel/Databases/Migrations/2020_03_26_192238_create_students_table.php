<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public static function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->longText('address')->nullable();
            $table->integer('roll_number');
            $table->string('email');

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
        Schema::dropIfExists('students');
    }
}
