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
        Schema::table('po_job_work_items', function (Blueprint $table) {
            $table->unsignedBigInteger('estimate_id')->nullable()->after('job_work_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('po_job_work_items', function (Blueprint $table) {
            $table->dropColumn('estimate_id');
        });
    }
};
