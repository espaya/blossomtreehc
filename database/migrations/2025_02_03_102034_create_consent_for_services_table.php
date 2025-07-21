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
            $table->text('medical_record_number');
            $table->text('consent');
            $table->text('client_agent_signature');
            $table->text('client_agent_name');
            $table->text('relationship');
            $table->text('client_date_signed');
            $table->text('agency_rep_signature');
            $table->String('agency_rep_name');
            $table->text('title');
            $table->String('agency_signed_date');
            $table->text('customerID');
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
