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
        Schema::table('authorization_for_use', function (Blueprint $table) {
            $table->longText('disclose_to')->change(); // Change from text to longText
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('authorization_for_use', function (Blueprint $table) {
            $table->text('disclose_to', 255)->change(); // Rollback to the original type
        });
    }
};
