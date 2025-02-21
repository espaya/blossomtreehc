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
        Schema::table('consumer_bill_of_right', function (Blueprint $table) {
            $table->renameColumn('clients_signed_date', 'clients_rep_signed_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('consumer_bill_of_right', function (Blueprint $table) {
            $table->renameColumn('clients_rep_signed_date', 'clients_signed_date');
        });
    }
};
