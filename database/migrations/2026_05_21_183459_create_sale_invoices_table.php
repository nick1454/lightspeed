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
        Schema::create('sale_invoices', function (Blueprint $table) {

    $table->id();

    $table->string('client');

    $table->date('invoice_date');

    $table->string('invoice_no')->unique();

    $table->decimal('total_amount', 10, 2)->default(0);

    $table->unsignedBigInteger('created_by_id')->nullable();

    $table->unsignedBigInteger('updated_by_id')->nullable();

    $table->timestamps();

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_invoices');
    }
};
