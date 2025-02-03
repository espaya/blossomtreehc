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
        Schema::create('contractor_bio', function (Blueprint $table) {
            $table->id();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('social_security_number')->nullable();
            $table->string('driver_license_number')->nullable();
            $table->string('email')->nullable();
            $table->string('home_address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('telephone')->nullable();
            $table->string('date_of_hire')->nullable();
            $table->string('level_of_education')->nullable();
            $table->string('date_of_background_checks')->nullable();
            $table->string('date_of_abuse_registry_check')->nullable();
            $table->string('date_of_misconduct_registry_check')->nullable();
            $table->string('date_of_substance_abuse_check')->nullable();
            $table->string('date_of_evaluation')->nullable();
            $table->string('contractor_signature')->nullable();
            $table->string('contractor_firstname')->nullable();
            $table->string('contractor_lastname')->nullable();
            $table->string('date')->nullable();
            $table->string('hr_representative_signature')->nullable();
            $table->string('hr_firstname')->nullable();
            $table->string('hr_lastname')->nullable();
            $table->string('customerID')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contractor_bio');
    }
};
