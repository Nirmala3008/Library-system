<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public static function up()
    {
        Schema::create('book_issues', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('library_id');
            $table->unsignedBigInteger('book_id');
            $table->date('isuue_date');
            $table->date('due_date');

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
        Schema::dropIfExists('book_issues');
    }
}
