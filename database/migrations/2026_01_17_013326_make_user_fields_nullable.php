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
        Schema::table('users', function (Blueprint $table) {
            $table->string('prodi')->nullable()->change();
            $table->string('faculty')->nullable()->change();
            $table->string('position')->nullable()->change();
            $table->string('phonenumber')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('prodi')->nullable(false)->change();
            $table->string('faculty')->nullable(false)->change();
            $table->string('position')->nullable(false)->change();
            $table->string('phonenumber')->nullable(false)->change();
        });
    }
};
