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
        Schema::create('consumer_emergency', function (Blueprint $table) {
            $table->id();
            $table->string('soc')->nullable();
            $table->string('telephone')->nullable();
            $table->string('cell_phone')->nullable();

            $table->string('responsible_persons_name')->nullable();
            $table->string('relationship')->nullable();
            $table->string('responsible_person_home_telephone')->nullable();
            $table->string('responsible_person_work_phone')->nullable();
            $table->string('responsible_person_cell_phone')->nullable();

            $table->string('friend_relative_name')->nullable();
            $table->string('relationship')->nullable();
            $table->string('friend_relative_home_telephone')->nullable();
            $table->string('friend_relative_work_phone')->nullable();
            $table->string('friend_relative_cell_phone')->nullable();

            $table->string('primary_physician')->nullable();
            $table->string('physician_telephone')->nullable();

            $table->string('customerID')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consumer_emergency');
    }
};
