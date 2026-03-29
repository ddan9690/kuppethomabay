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
        Schema::create('sub_county_bbf_reps', function (Blueprint $table) {
            $table->id();
            $table->string('name');                   
            $table->string('phone');               
            $table->string('tsc_number')->nullable(); 
            $table->foreignId('sub_county_id')->constrained('sub_counties')->onDelete('cascade');
             $table->enum('status', ['active', 'suspended'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_county_bbf_reps');
    }
};
