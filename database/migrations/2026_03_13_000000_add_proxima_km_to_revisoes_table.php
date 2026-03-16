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
        Schema::table('revisoes', function (Blueprint $table) {
            $table->integer('proxima_km')->nullable()->after('km');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('revisoes', function (Blueprint $table) {
            $table->dropColumn('proxima_km');
        });
    }
};

