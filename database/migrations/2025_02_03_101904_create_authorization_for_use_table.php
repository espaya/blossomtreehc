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
            $table->text('consent')->nullable();
            $table->text('disclose_to')->nullable();
            $table->text('hiv')->nullable();
            $table->text('alcohol_substance')->nullable();
            $table->text('psychotherapy')->nullable();
            $table->text('other')->nullable();
            $table->text('specify')->nullable();

            $table->text('consumer_signature')->nullable();
            $table->text('consumer_date_signed')->nullable();

            $table->text('consumer_rep_signature')->nullable();
            $table->String('consumer_rep_date_signed')->nullable();
            $table->text('consumer_name_authority')->nullable();

            $table->text('agency_rep_signature')->nullable();
            $table->text('agency_rep_title')->nullable();
            $table->String('agency_signed_date')->nullable();
            $table->text('customerID')->nullable();
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
