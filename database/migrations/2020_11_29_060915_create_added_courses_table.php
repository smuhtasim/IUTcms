<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddedCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('added_courses', function (Blueprint $table) {
            $table->id();
            $table->string('CourseCode')->nullable();
            $table->string('CourseTitle')->unique();
            $table->string('Dept');
            $table->string('Sem');
            $table->string('CourseType');
            $table->string('Comp_Mand');
            $table->string('Credit');
            $table->string('ContactHour');
            $table->string('E_ContactHour');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('added_courses');
    }
}
