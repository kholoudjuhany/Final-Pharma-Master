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
        Schema::create('h_i_c_s', function (Blueprint $table) {
            $table->id();  // Creates a bigIncrements (unsignedBigInteger)
            $table->string('HIC_name');
            $table->float('HIC_disscount');
            $table->string('HIC_email');
            $table->string('HIC_mobile');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('h_i_c_s');
    }
};
