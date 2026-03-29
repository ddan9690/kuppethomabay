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
        Schema::create('bbf_memberships', function (Blueprint $table) {
           $table->id();
            
            // Basic member info
            $table->string('full_name');
            $table->string('tsc_number')->unique();
            $table->string('phone_number');
            $table->string('national_id')->nullable();
            $table->string('email')->nullable();
            $table->enum('gender', ['M', 'F']);

            // Employment details
            $table->string('school_name');
            $table->foreignId('sub_county_id')->constrained('sub_counties')->onDelete('cascade');
            $table->string('zone');
            $table->enum('category', ['Tertiary', 'Senior', 'Junior', 'Primary']);
            $table->integer('year_posting');

            // Next of kin
            $table->string('nok_full_name')->nullable();
            $table->string('nok_relationship')->nullable();
            $table->string('nok_phone')->nullable();

            // Spouses & children
            $table->json('spouses')->nullable();
            $table->json('children')->nullable();

            // Biological parents
            $table->string('father_name')->nullable();
            $table->enum('father_status', ['Alive','Deceased'])->nullable();
            $table->string('father_id')->nullable();
            
            $table->string('mother_name')->nullable();
            $table->enum('mother_status', ['Alive','Deceased'])->nullable();
            $table->string('mother_id')->nullable();

            // Status
            $table->enum('status', ['Pending','Approved','Rejected'])->default('Pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bbf_memberships');
    }
};
