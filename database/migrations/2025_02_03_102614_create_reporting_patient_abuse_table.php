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
        Schema::create('reporting_patient_abuse', function (Blueprint $table) {
            $table->id();
            $table->string('clients_signature')->nullable();
            $table->string('clients_date_signed')->nullable();
            $table->string('agency_rep_name')->nullable();
            $table->string('agency_rep_signture')->nullable();
            $table->string('agency_date_signed')->nullable();
            $table->string('customerID');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reporting_patient_abuse');
    }
};
