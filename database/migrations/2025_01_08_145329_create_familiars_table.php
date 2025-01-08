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
        Schema::create('familiars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('clients_id')->constrained()->onDelete('cascade');
            $table->string('name_family')->nullable();
            $table->string('phone_family')->nullable();
            $table->string('address_family')->nullable();
            $table->string('receive_family')->nullable();
            $table->enum('tipo_transaccion', ['efectivo', 'transferencia']);
            $table->enum('efectivo', ['cup', 'usd'])->nullable();
            $table->enum('transferencia', ['mlc', 'cup'])->nullable();
            $table->string('card')->nullable();
            $table->boolean('entregado')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('familiars');
    }
};
