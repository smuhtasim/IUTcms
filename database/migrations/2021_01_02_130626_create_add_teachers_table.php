<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_teachers', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->string('Initials')->unique();
            $table->string('Designations');
            $table->string('IsActive')->default('No');
            $table->timestamps();
        });

        Schema::table('add_teachers', function (Blueprint $table) {
            $table->foreign('Designations')->references('Designation')->on('designation_loads');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('add_teachers');
    }
}
