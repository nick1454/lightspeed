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
        Schema::create('material_inwards', function (Blueprint $table) {
            $table->id();
            $table->date('in_date');
            $table->string('inward_no');
            $table->string('vendor_inward_no')->nullable();
            $table->integer('vendor_id');
            $table->integer('warehouse_id');
            $table->decimal('total_amount', 12, 2)->default(0);
            $table->text('remarks')->nullable();
            $table->integer('created_by_id');
            $table->integer('updated_by_id')->nullable();
            $table->integer('is_draft')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material_inwards');
    }
};
