<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('seance_id')->constrained()->onDelete('cascade');
            $table->foreignId('price_id')->constrained()->onDelete('cascade')->default(null);
            $table->foreignId('discount_id')->nullable()->constrained()->onDelete('cascade');
            $table->decimal('price', 6, 2)->default(0);
            $table->string('name');
            $table->string('surname');
            $table->string('email');
            $table->integer('phone_number')->nullable();
            $table->integer('seat_row');
            $table->integer('seat_column');
            $table->boolean('paid')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
};
