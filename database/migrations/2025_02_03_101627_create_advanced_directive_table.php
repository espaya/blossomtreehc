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
            $table->text('medical_record_number');
            $table->text('living_will')->nullable();
            $table->text('statutory_power')->nullable();
            $table->text('confirm')->nullable();
            $table->text('clients_signature');
            $table->text('clients_signed_date');

            $table->text('agency_witness_name')->nullable();
            $table->text('agency_witness_signature')->nullable();
            $table->text('agency_signed_date')->nullable();
            $table->text('customerID');
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
