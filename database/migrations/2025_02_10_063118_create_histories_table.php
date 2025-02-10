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
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('status');
            $table->foreignId('row_material_id')->constrained('row_materials')->onDelete('cascade');
            $table->integer('quantity');
            $table->integer('pass');
            $table->integer('now');
            $table->foreignId('from_id')->constrained('warehouse_values')->onDelete('cascade');
            $table->foreignId('to_id')->constrained('warehouse_values')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histories');
    }
};
