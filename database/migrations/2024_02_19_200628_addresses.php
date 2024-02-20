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
        Schema::create('addresses', static function (Blueprint $table) {
            $table->id();
            $table->integer('postal_code');
            $table->string('street');
            $table->string('number');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            $table->foreignId('id_user')
                ->constrained(table: 'users', indexName: 'id')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('addresses');
    }
};
