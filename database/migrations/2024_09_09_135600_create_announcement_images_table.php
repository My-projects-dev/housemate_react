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
        Schema::create('announcement_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('announcement_id')->constrained('announcements')->onDelete('cascade');
            $table->string('image',255)->nullable();
            $table->enum('main', ['1','0'])->default('0');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('announcement_images');
    }
};