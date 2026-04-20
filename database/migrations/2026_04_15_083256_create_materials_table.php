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
        Schema::create('materials', function (Blueprint $table) {
            $table->id();

            // RELATIONS
            $table->integer('category_id')->nullable();
            $table->integer('subcategory_id')->nullable();
            $table->integer('brand_id')->nullable();
            $table->integer('unit_id')->nullable();
            $table->integer('size_id')->nullable();

            // CORE FIELDS
            $table->string('name');

            // STOCK
            $table->decimal('opening_stock', 12, 2)->default(0);

            // OPTIONAL (HIGHLY USEFUL)
            $table->decimal('min_stock', 12, 2)->nullable();
            $table->decimal('rate', 12, 2)->nullable();

            $table->text('description')->nullable();

            $table->timestamps();

            // INDEXES (IMPORTANT FOR PERFORMANCE)
            $table->index(['category_id', 'subcategory_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materials');
    }
};
