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
        Schema::create('youthful_teachers', function (Blueprint $table) {
            $table->id();
            
            // Basic Info
            $table->string('full_name');
            $table->string('email');
            $table->string('tsc_number');
            $table->string('phone_number');
            
            // Linked Data
            $table->unsignedBigInteger('sub_county_id');
            
            // Professional & Demographic Details
            $table->string('age_bracket');
            $table->string('teaching_level');
            $table->string('teaching_subject_1');
            $table->string('teaching_subject_2');
            $table->string('employment_status');
            $table->string('years_in_service');
            $table->boolean('has_undertaken_training');
            
            // Arrays stored as JSON
            $table->json('interested_activities')->nullable();
            $table->json('beneficial_trainings')->nullable();
            
            // Consent
            $table->boolean('consent')->default(false);
            
            $table->timestamps();

            // Foreign Key Constraint
            $table->foreign('sub_county_id')->references('id')->on('sub_counties')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('youthful_teachers');
    }
};