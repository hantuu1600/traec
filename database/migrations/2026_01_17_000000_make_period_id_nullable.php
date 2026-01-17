<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasColumn('teaching_activities', 'period_id')) {
            Schema::table('teaching_activities', function (Blueprint $table) {
                $table->unsignedBigInteger('period_id')->nullable()->change();
            });
        }

        if (Schema::hasColumn('research_activities', 'period_id')) {
            Schema::table('research_activities', function (Blueprint $table) {
                $table->unsignedBigInteger('period_id')->nullable()->change();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No safe reverse without knowing previous state, but theoretically nullable is safe.
    }
};
