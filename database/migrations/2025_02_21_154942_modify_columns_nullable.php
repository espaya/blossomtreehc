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
        Schema::table('consent_for_services', function (Blueprint $table) {
            $table->string('title', 255)->nullable()->change();
            $table->string('agency_signed_date', 255)->nullable()->change();
            $table->string('agency_rep_signature', 255)->nullable()->change();
            $table->string('agency_rep_name', 255)->nullable()->change();
            $table->text('consent')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('consent_for_services', function (Blueprint $table) {
            $table->string('title', 255)->nullable(false)->change();
            $table->string('agency_signed_date', 255)->nullable(false)->change();
            $table->string('agency_rep_signature', 255)->nullable(false)->change();
            $table->string('agency_rep_name', 255)->nullable()->change();
            $table->text('consent')->nullable()->change();
        });
    }
};
