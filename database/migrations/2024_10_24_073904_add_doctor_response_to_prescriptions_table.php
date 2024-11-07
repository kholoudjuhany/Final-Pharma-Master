<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('prescriptions', function (Blueprint $table) {
        $table->text('doctor_response')->nullable(); // Add the doctor's response field
    });
}

public function down()
{
    Schema::table('prescriptions', function (Blueprint $table) {
        $table->dropColumn('doctor_response');
    });
}
};
