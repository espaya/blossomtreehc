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
        Schema::create('list_of_services', function (Blueprint $table) {
            $table->id();
            $table->string('client_legal_signature')->nullable();
            $table->string('client_legal_date')->nullable();
            $table->string('clients_rep_name')->nullable();
            $table->string('relation_to_client')->nullable();
            $table->string('agency_rep_name')->nullable();
            $table->string('agency_rep_signature')->nullable();
            $table->string('agency_signed_date')->nullable();
            $table->string('customerID')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_of_services');
    }
};
