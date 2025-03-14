<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('topic_id')->constrained('topics')->onDelete('cascade');
            $table->string('title_en');
            $table->string('title_ar');
            $table->string('title_fr');
            $table->longText('description_en');
            $table->longText('description_ar');
            $table->longText('description_fr');
            $table->enum('difficulty', [1, 2, 3]);
            $table->boolean('is_published')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quizzes');
    }
};
