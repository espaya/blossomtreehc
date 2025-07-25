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
        Schema::create('authorization_agreement', function (Blueprint $table) {
            $table->id();
            $table->text('consumer_signature')->nullable();
            $table->text('consumer_signed_date')->nullable();
            $table->text('agency_rep_name')->nullable();
            $table->text('agency_rep_signature')->nullable();
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
        Schema::dropIfExists('authorization_agreement');
    }
};
