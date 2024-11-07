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
        Schema::create('pre_meds', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->text('notes');
            $table->unsignedBigInteger('pre_id');
            $table->foreign(columns: 'pre_id')->references('id')->on('prescriptions');
            $table->unsignedBigInteger('med_id');
            $table->foreign(columns: 'med_id')->references('id')->on('meds');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pre_meds');
    }
};
