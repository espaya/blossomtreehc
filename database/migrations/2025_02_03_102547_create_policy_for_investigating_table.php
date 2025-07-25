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
        Schema::create('policy_for_investigating', function (Blueprint $table) {
            $table->id();
            $table->text('customerID')->nullable();
            $table->text('clients_rep_name')->nullable();
            $table->text('clients_rep_date')->nullable();
            $table->text('agency_rep_name')->nullable();
            $table->text('agency_rep_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('policy_for_investigating');
    }
};
