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
        Schema::table('consumer_emergency', function (Blueprint $table) {
            $table->renameColumn('frient_relative_relationship', 'friend_relative_relationship');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('consumer_emergency', function (Blueprint $table) {
            $table->renameColumn('friend_relative_relationship', 'frient_relative_relationship');
        });
    }
};
