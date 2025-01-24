<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectTopicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_topic', function (Blueprint $table) {
            $table->id();
            $table->BigInteger("project_id")->unsigned();
            $table->BigInteger("topic_id")->unsigned();
            $table->timestamps();
            $table->foreign("project_id")->references("id")->on("projects");
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
        Schema::dropIfExists('project_topic');
    }
}
