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
        Schema::create('material_transfers', function (Blueprint $table) {
            $table->id();
            $table->date('transfer_date');
            $table->string('transfer_no')->unique();
            $table->string('manual_transfer_no')->nullable();
            $table->integer('warehouse_from_id');
            $table->integer('warehouse_to_id');
            $table->text('remarks')->nullable();
            $table->integer('created_by_id');
            $table->integer('updated_by_id')->nullable();
            $table->integer('is_draft')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material_transfers');
    }
};
