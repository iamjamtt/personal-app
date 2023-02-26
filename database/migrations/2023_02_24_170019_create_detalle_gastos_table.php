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
        Schema::create('detalle_gastos', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->decimal('monto', 8, 2);
            $table->boolean('status')->default(1);
            $table->foreignId('gastos_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_gastos');
    }
};
