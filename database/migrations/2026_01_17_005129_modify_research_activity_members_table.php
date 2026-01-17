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
        Schema::table('research_activity_members', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->change();
            $table->string('name')->nullable()->after('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('research_activity_members', function (Blueprint $table) {
            // Warning: Converting nullable to not-null will fail if there are null values.
            // For now, we assume this is safe or we truncate/delete invalid records if verified.
            $table->unsignedBigInteger('user_id')->nullable(false)->change();
            $table->dropColumn('name');
        });
    }
};
