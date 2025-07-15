<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Only run for MySQL, since ENUM and MODIFY are not supported in SQLite
        if (DB::getDriverName() === 'mysql') {
            DB::statement("ALTER TABLE services MODIFY benefit_option ENUM('month', 'hour', 'min', 'per call', 'one time') DEFAULT 'month'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Only run for MySQL, since ENUM and MODIFY are not supported in SQLite
        if (DB::getDriverName() === 'mysql') {
            DB::statement("ALTER TABLE services MODIFY benefit_option ENUM('month', 'hour', 'min', 'per call') DEFAULT 'month'");
        }
    }
};
