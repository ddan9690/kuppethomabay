<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('knec_reimbursement_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('announcement_id')
                  ->constrained('knec_reimbursement_announcements')
                  ->cascadeOnDelete();
            $table->string('full_name');
            $table->enum('gender', ['Male', 'Female']);
            $table->string('id_number');
            $table->string('tsc_number');
            $table->string('phone_number');
            $table->foreignId('sub_county_id')->constrained('sub_counties')->cascadeOnDelete();
            $table->string('school');
            $table->string('level'); 
            $table->date('date_of_training');
            $table->string('training_center');
            $table->string('subject');
            $table->string('paper');
            $table->string('status')->default('pending');
            $table->text('remarks')->nullable();
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('knec_reimbursement_applications');
    }
};