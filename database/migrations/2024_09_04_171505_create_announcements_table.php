<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('slug', 300)->unique()->nullable();
            $table->enum('status',['1','0'])->default('1');
            $table->string('country', 50)->nullable();
            $table->string('language', 3)->nullable();
            $table->enum('type', ['roommate', 'rent'])->nullable();
            $table->enum('home', ['yes_home', 'no_home'])->nullable();
            $table->string('title')->nullable();
            $table->string('address', 555)->nullable();
            $table->enum('home_type', ['repair_old', 'repair_new', 'courtyard_house'])->nullable();
            $table->unsignedTinyInteger('floor')->nullable();
            $table->unsignedInteger('area')->nullable();
            $table->enum('repair', ['repaired', 'unrepaired'])->nullable();
            $table->unsignedTinyInteger('room_count')->nullable();
            $table->integer('price')->nullable();
            $table->string('currency', 4)->nullable();
            $table->enum('duration', ['diary', 'weekly', 'monthly', 'yearly'])->nullable();
            $table->unsignedTinyInteger('age_min')->nullable();
            $table->unsignedTinyInteger('age_max')->nullable();
            $table->unsignedTinyInteger('number_people')->nullable();
            $table->unsignedTinyInteger('number_inhabitants')->nullable();
            $table->string('country_phone_code', 5)->nullable();
            $table->string('phone', 20);
            $table->string('email')->nullable();
            $table->text('comment')->nullable();
            $table->unsignedBigInteger('views')->default(0);

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('announcements');
    }
};
