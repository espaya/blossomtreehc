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
        Schema::create('consent_for_services', function (Blueprint $table) {
            $table->id();
            $table->string('medical_record_number');
            $table->string('consent');
            $table->string('client_agent_signature');
            $table->string('client_agent_name');
            $table->string('relationship');
            $table->string('client_date_signed');
            $table->string('agency_rep_signature');
            $table->String('agency_rep_name');
            $table->string('title');
            $table->String('agency_signed_date');
            $table->string('customerID');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consent_for_services');
    }
};
