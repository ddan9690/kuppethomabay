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
        Schema::create('chronic_illness_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sub_county_id')->constrained('sub_counties')->onDelete('cascade');
            $table->string('affected_party'); // e.g., Self, Dependant, Both
            $table->text('experience_description'); // Detailed experience/challenges accessing SHA chronic illness services
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chronic_illness_infos');
    }
};
