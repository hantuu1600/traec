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
        // Add name column to research_activity_members for external members
        Schema::table('research_activity_members', function (Blueprint $table) {
            $table->string('name', 255)->nullable()->after('user_id');
        });

        // Add name column to community_service_members for external members
        Schema::table('community_service_members', function (Blueprint $table) {
            $table->string('name', 255)->nullable()->after('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('research_activity_members', function (Blueprint $table) {
            $table->dropColumn('name');
        });

        Schema::table('community_service_members', function (Blueprint $table) {
            $table->dropColumn('name');
        });
    }
};
