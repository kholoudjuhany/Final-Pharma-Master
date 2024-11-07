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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('Fname');
            $table->string('Lname');
            $table->date('DoB');
            $table->enum('gender', ['Female', 'Male']);
            $table->string('personal_id');
            $table->string('email')->unique();
            $table->string('user_mobile');
            $table->string('password');
            $table->enum('user_role', ['customer', 'doctor']);
            $table->string('address');
            $table->unsignedBigInteger('HIC_id');  // This should be unsignedBigInteger
            $table->foreign('HIC_id')->references('id')->on('h_i_c_s')->onDelete('cascade');
            
            $table->timestamps();
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
