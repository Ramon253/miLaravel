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
        Schema::create('songs', static function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('artist');
            $table->string('compositor');
            $table->string('genre');
            $table->integer('duration');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('songs');
    }
};
