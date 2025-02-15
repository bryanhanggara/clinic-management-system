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
        Schema::create('profile_clinics', function (Blueprint $table) {
            $table->id();
            $table->string('name_clinic');
            $table->string('doctor'); 
            $table->string('address');
            $table->string('email');
            $table->string('logo')->nullable();
            $table->string('description')->nullable();
            $table->string('unique_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_clinics');
    }
};
