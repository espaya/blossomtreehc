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
        Schema::create('advanced_directive', function (Blueprint $table) {
            $table->id();
            $table->string('medical_record_number');
            $table->string('living_will')->nullable();
            $table->string('statutory_power')->nullable();
            $table->string('confirm')->nullable();
            $table->string('clients_signature');
            $table->string('clients_signed_date');

            $table->string('agency_witness_name')->nullable();
            $table->string('agency_witness_signature')->nullable();
            $table->string('agency_signed_date')->nullable();
            $table->string('customerID');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advanced_directive');
    }
};
