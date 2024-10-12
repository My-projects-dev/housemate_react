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
        Schema::create('languages', function (Blueprint $table) {
            $table->id();
            $table->string('language', 40);
            $table->string('country', 40)->unique();
            $table->string('lang_code', 5);
            $table->string('country_phone_code', 7);
            $table->string('currency', 4);
            $table->string('flag_class', 20);
            $table->bigInteger('view')->default(0)->nullable();
            $table->enum('status', ['1', '0'])->default('1');
            $table->timestamps();

//            $table->unique(['language', 'country', 'lang_code', 'country_phone_code', 'currency'], 'language_country_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('languages');
    }
};
