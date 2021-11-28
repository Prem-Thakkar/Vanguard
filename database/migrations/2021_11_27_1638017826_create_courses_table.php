<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {

            $table->id();
            $table->string('title', 500);
            $table->string('image', 500);
            $table->text('description');
            $table->text('what_learner_learn');
            $table->text('video_url');
            $table->timestamps();
            $table->softDeletes();	
        });
    }

    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
