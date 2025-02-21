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
        Schema::table('consumer_emergency', function (Blueprint $table) {
            $table->text('soc')->nullable()->change();
            $table->text('telephone')->nullable()->change();
            $table->text('cell_phone')->nullable()->change();
            $table->text('responsible_persons_name')->nullable()->change();
            $table->text('relationship')->nullable()->change();
            $table->text('responsible_person_home_telephone')->nullable()->change();
            $table->text('responsible_person_work_phone')->nullable()->change();
            $table->text('responsible_person_cell_phone')->nullable()->change();
            $table->text('friend_relative_name')->nullable()->change();
            $table->text('frient_relative_relationship')->nullable()->change();
            $table->text('friend_relative_home_telephone')->nullable()->change();
            $table->text('friend_relative_work_phone')->nullable()->change();
            $table->text('friend_relative_cell_phone')->nullable()->change();
            $table->text('primary_physician')->nullable()->change();
            $table->text('physician_telephone')->nullable()->change();
            $table->text('customerID')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('consumer_emergency', function (Blueprint $table) {
            $table->string('soc')->nullable()->change();
            $table->string('telephone')->nullable()->change();
            $table->string('cell_phone')->nullable()->change();
            $table->string('responsible_persons_name')->nullable()->change();
            $table->string('relationship')->nullable()->change();
            $table->string('responsible_person_home_telephone')->nullable()->change();
            $table->string('responsible_person_work_phone')->nullable()->change();
            $table->string('responsible_person_cell_phone')->nullable()->change();
            $table->string('friend_relative_name')->nullable()->change();
            $table->string('frient_relative_relationship')->nullable()->change();
            $table->string('friend_relative_home_telephone')->nullable()->change();
            $table->string('friend_relative_work_phone')->nullable()->change();
            $table->string('friend_relative_cell_phone')->nullable()->change();
            $table->string('primary_physician')->nullable()->change();
            $table->string('physician_telephone')->nullable()->change();
            $table->string('customerID')->nullable()->change();
        });
    }
};
