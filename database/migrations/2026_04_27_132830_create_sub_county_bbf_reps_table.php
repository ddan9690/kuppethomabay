<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sub_county_bbf_reps', function (Blueprint $table) {
            $table->id();

            // 🔗 Relations
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('sub_county_id')
                ->constrained()
                ->cascadeOnDelete();

            // 🔥 Flexible structure (future-proof)
            $table->string('level')->nullable();
            // examples: junior, senior, tertiary, or null if structure changes

            // 🔥 Lifecycle management
            $table->enum('status', ['active', 'inactive'])
                ->default('active');

            $table->timestamp('assigned_at')->nullable();
            $table->timestamp('ended_at')->nullable();

            $table->timestamps();

            // 🔐 Prevent duplicate active assignments in same context
            $table->unique(
                ['user_id', 'sub_county_id', 'level', 'status'],
                'unique_active_subcounty_bbf_rep'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sub_county_bbf_reps');
    }
};
