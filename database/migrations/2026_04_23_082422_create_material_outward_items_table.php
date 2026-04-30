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
        Schema::create('material_outward_items', function (Blueprint $table) {
            $table->id();
            $table->integer('material_outward_id');
            $table->integer('material_id');
            $table->string('material_name');
            $table->decimal('quantity', 12, 2);
            $table->decimal('rate', 12, 2);
            $table->decimal('amount', 12, 2);
            $table->integer('unit_id');
            $table->integer('po_id');
            $table->text('remarks')->nullable();
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material_outward_items');
    }
};
