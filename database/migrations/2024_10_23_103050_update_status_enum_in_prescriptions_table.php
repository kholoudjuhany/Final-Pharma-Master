<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateStatusEnumInPrescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('prescriptions', function (Blueprint $table) {
            // Change the 'status' enum field to remove the 'approved' option
            $table->enum('status', ['pending', 'completed', 'cancelled'])
                  ->default('pending')
                  ->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('prescriptions', function (Blueprint $table) {
            // Revert the changes and add 'approved' back to the enum
            $table->enum('status', ['pending', 'approved', 'completed', 'cancelled'])
                  ->default('pending')
                  ->change();
        });
    }
}
