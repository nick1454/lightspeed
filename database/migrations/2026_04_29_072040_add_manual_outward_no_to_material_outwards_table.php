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
        Schema::table('material_outwards', function (Blueprint $table) {
            $table->string('manual_outward_no')->nullable()->after('out_date')->comment('Manual Outward No');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('material_outwards', function (Blueprint $table) {
            $table->dropColumn('manual_outward_no');
        });
    }
};
