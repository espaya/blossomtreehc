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
        Schema::create('charges_for_services', function (Blueprint $table) {
            $table->id();
            $table->string('clients_signature')->nullable();
            $table->string('clients_signed_date')->nullable();
            $table->string('clients_rep_signature')->nullable();
            $table->string('clients_rep_firstname')->nullable();
            $table->string('clients_rep_lastname')->nullable();
            $table->string('clients_rep_date_signed')->nullable();
            $table->string('agency_rep_signature')->nullable();
            $table->string('agency_rep_name')->nullable();
            $table->string('agency_date_signed')->nullable();
            $table->string('agency_date_signed')->nullable();
            $table->string('customerID')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('charges_for_services');
    }
};
