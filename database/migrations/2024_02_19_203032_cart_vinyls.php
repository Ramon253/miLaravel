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
        Schema::create( 'cart_vinyls' , static function(Blueprint $table){
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_vinyl');
            $table->integer('quantity');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');

            $table->foreign('id_user')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreign('id_vinyl')
                ->references('id')
                ->on('vinyls')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('cart_vinyls');
    }
};
