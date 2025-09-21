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
        Schema::create('deceaseds', function (Blueprint $table) {
            $table->id();
            $table->integer('district_id');
            $table->integer('subdistrict_id');
            $table->string('name');
            $table->string('ktp');
            $table->integer('gender');
            $table->string('place_of_birth');
            $table->string('date_of_birth');
            $table->string('date_of_death');
            $table->string('burial_date');
            $table->text('address');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deceaseds');
    }
};
