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
        Schema::create('opening_hours', function (Blueprint $table) {
            $table->id();
            $table->enum('day',['lundi','mardi','mercredi','jeudi','vendredi','samedi','dimanche']);
            $table->time('morning_opening_hour');
            $table->time('morning_closing_hour')->nullable();
            $table->time('afternoon_opening_hour')->nullable();
            $table->time('afternoon_closing_hour');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opening_hours');
    }
};
