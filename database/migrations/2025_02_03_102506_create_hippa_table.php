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
        Schema::create('hippa', function (Blueprint $table) {
            $table->id();
            $table->text('clients_signature')->nullable();
            $table->text('clients_signed_date')->nullable();
            $table->text('clients_rep_firstname')->nullable();
            $table->text('clients_rep_lastname')->nullable();
            $table->text('clients_rep_signature')->nullable();
            $table->text('clients_rep_date_signed')->nullable();
            $table->text('agency_rep_name')->nullable();
            $table->text('agency_signature')->nullable();
            $table->text('agency_signed_date')->nullable();
            $table->text('customerID')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hippa');
    }
};
