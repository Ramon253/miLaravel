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
        Schema::create('vinyls_ordered', static function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_vinyl');
            $table->unsignedBigInteger('id_order');
            $table->integer('quantity');

            $table->foreign('id_vinyl')
                ->references('id')
                ->on('vinyls')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreign('id_order')
                ->references('id')
                ->on('orders')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('vinyls_created');
    }
};
