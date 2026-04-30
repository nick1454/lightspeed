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
        Schema::create('po_job_works', function (Blueprint $table) {
            $table->id();
            $table->string('po_no');
            $table->string('description');
            $table->string('location');
            $table->string('client');
            $table->string('contact');
            $table->string('type');
            $table->string('status');
            $table->string('remarks');
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
        Schema::dropIfExists('po_job_works');
    }
};
