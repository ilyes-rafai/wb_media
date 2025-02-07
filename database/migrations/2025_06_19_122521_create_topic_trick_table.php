<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopicTrickTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topic_trick', function (Blueprint $table) {
            $table->id();
            $table->BigInteger("topic_id")->unsigned();
            $table->BigInteger("trick_id")->unsigned();
            $table->timestamps();
            $table->foreign("topic_id")->references("id")->on("topics");
            $table->foreign("trick_id")->references("id")->on("tricks");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('topic_trick');
    }
}
