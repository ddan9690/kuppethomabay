<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('knec_reimbursement_announcements', function (Blueprint $table) {
            $table->id();
            $table->year('year');
            $table->enum('level', ['primary', 'junior_school', 'senior_school', 'tertiary']);
            $table->string('title');
            $table->string('slug')->unique();
            $table->date('announced_on')->nullable();
            $table->boolean('is_active')->default(false);
            $table->enum('status', ['open', 'closed'])->default('open');
            $table->timestamps();
            $table->unique(['year', 'level']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('knec_reimbursement_announcements');
    }
};