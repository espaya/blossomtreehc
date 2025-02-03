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
        Schema::create('contract_form_amended', function (Blueprint $table) {
            $table->id();
            $table->string('clients_signature')->nullable();
            $table->string('client_signed_date')->nullable();
            $table->string('agency_rep_name')->nullable();
            $table->string('agency_rep_signature')->nullable();
            $table->string('agency_rep_date')->nullable();
            $table->string('customerID')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contract_form_amended');
    }
};
