<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseTopicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_topic', function (Blueprint $table) {
            $table->id();
            $table->BigInteger("course_id")->unsigned();
            $table->BigInteger("topic_id")->unsigned();
            $table->timestamps();
            $table->foreign("course_id")->references("id")->on("courses");
            $table->foreign("topic_id")->references("id")->on("topics");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_topic');
    }
}
