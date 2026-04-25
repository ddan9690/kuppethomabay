<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('bbf_memberships', function (Blueprint $table) {

            // 🔐 fields to encrypt must become TEXT
           $table->dropUnique(['tsc_number']);
            $table->text('phone_number')->change();
            $table->text('national_id')->nullable()->change();
            $table->text('email')->nullable()->change();
            $table->text('nok_full_name')->nullable()->change();
            $table->text('nok_phone')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('bbf_memberships', function (Blueprint $table) {

            $table->string('tsc_number')->change();
            $table->string('phone_number')->change();
            $table->string('national_id')->nullable()->change();
            $table->string('email')->nullable()->change();
            $table->string('nok_full_name')->nullable()->change();
            $table->string('nok_phone')->nullable()->change();
            $table->unique('tsc_number');
        });
    }
};