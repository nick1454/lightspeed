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
        Schema::create('po_job_work_items', function (Blueprint $table) {
            $table->id();
            $table->string('job_work_id');
            $table->string('material_id');
            $table->string('material_name');
            $table->string('quantity');
            $table->string('rate');
            $table->string('amount');
            $table->string('created_by_id');
            $table->string('updated_by_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('po_job_work_items');
    }
};
