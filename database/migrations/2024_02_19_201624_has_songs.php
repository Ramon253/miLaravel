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
        Schema::create('has_songs', static function (Blueprint $table) {
            $table->unsignedBigInteger('id_vinyl');
            $table->unsignedBigInteger('id_song');

            $table->foreign('id_vinyl')
                ->references('id')
                ->on('vinyls')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreign('id_song')
                ->references('id')
                ->on('songs')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('has_songs');
    }
};
