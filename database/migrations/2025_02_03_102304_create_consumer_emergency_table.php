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
            $table->text('soc')->nullable();
            $table->text('telephone')->nullable();
            $table->text('cell_phone')->nullable();

            $table->text('responsible_persons_name')->nullable();
            $table->text('relationship')->nullable();
            $table->text('responsible_person_home_telephone')->nullable();
            $table->text('responsible_person_work_phone')->nullable();
            $table->text('responsible_person_cell_phone')->nullable();

            $table->text('friend_relative_name')->nullable();
            $table->text('frient_relative_relationship')->nullable();
            $table->text('friend_relative_home_telephone')->nullable();
            $table->text('friend_relative_work_phone')->nullable();
            $table->text('friend_relative_cell_phone')->nullable();

            $table->text('primary_physician')->nullable();
            $table->text('physician_telephone')->nullable();

            $table->text('customerID')->nullable();

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
