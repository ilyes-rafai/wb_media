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
        Schema::create('instructions', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_ar');
            $table->string('title_fr');
            $table->longText('description_en')->nullable();
            $table->longText('description_ar')->nullable();
            $table->longText('description_fr')->nullable();
            $table->longText('code')->nullable();
            $table->string('language')->nullable();
            $table->boolean('premium')->default(false);
            $table->foreignId('user_id')->constrained();
            $table->foreignId('trick_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instructions');
    }
};
