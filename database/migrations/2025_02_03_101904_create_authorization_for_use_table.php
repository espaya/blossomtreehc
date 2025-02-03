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
        Schema::create('authorization_for_use', function (Blueprint $table) {
            $table->id();
            $table->string('consent')->nullable();
            $table->string('disclose_to')->nullable();
            $table->string('hiv')->nullable();
            $table->string('alcohol_substance')->nullable();
            $table->string('psychotherapy')->nullable();
            $table->string('other')->nullable();
            $table->string('specify')->nullable();

            $table->string('consumer_signature')->nullable();
            $table->string('consumer_date_signed')->nullable();

            $table->string('consumer_rep_signature')->nullable();
            $table->String('consumer_rep_date_signed')->nullable();
            $table->string('consumer_name_authority')->nullable();

            $table->string('agency_rep_signature')->nullable();
            $table->string('agency_rep_title')->nullable();
            $table->String('agency_signed_date')->nullable();
            $table('customerID')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authorization_for_use');
    }
};
