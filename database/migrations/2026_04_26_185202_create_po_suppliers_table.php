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
        Schema::create('po_suppliers', function (Blueprint $table) {
            $table->id();
            $table->integer('vendor_id');
            $table->integer('warehouse_id');
            $table->string('po_no');
            $table->date('po_date');
            $table->decimal('total_amount', 12, 2)->default(0);
            $table->string('status')->default('open');
            $table->string('remarks')->nullable();
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */

    public function down(): void
    {
        Schema::dropIfExists('po_suppliers');
    }
};
