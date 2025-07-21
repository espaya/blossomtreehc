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
            $table->text('clients_signature')->nullable();
            $table->text('clients_date_signed')->nullable();
            $table->text('agency_rep_name')->nullable();
            $table->text('agency_rep_signture')->nullable();
            $table->text('agency_date_signed')->nullable();
            $table->text('customerID');
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
