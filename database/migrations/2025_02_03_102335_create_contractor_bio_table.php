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
            $table->text('firstname')->nullable();
            $table->text('lastname')->nullable();
            $table->text('date_of_birth')->nullable();
            $table->text('social_security_number')->nullable();
            $table->text('driver_license_number')->nullable();
            $table->text('email')->nullable();
            $table->text('home_address')->nullable();
            $table->text('city')->nullable();
            $table->text('state')->nullable();
            $table->text('zip_code')->nullable();
            $table->text('telephone')->nullable();
            $table->text('date_of_hire')->nullable();
            $table->text('level_of_education')->nullable();
            $table->text('date_of_background_checks')->nullable();
            $table->text('date_of_abuse_registry_check')->nullable();
            $table->text('date_of_misconduct_registry_check')->nullable();
            $table->text('date_of_substance_abuse_check')->nullable();
            $table->text('date_of_evaluation')->nullable();
            $table->text('contractor_signature')->nullable();
            $table->text('contractor_firstname')->nullable();
            $table->text('contractor_lastname')->nullable();
            $table->text('date')->nullable();
            $table->text('hr_representative_signature')->nullable();
            $table->text('hr_firstname')->nullable();
            $table->text('hr_lastname')->nullable();
            $table->text('customerID')->nullable();
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
