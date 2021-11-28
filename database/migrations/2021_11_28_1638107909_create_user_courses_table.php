<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCoursesTable extends Migration
{
    public function up()
    {
        Schema::create('user_courses', function (Blueprint $table) {

            $table->id();
            $table->mediumInteger('user_id');
            $table->mediumInteger('course_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_courses');
    }
}
