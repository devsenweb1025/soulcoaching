<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->boolean('hotline_active')->default(false)->after('is_active');
            $table->enum('image_direction', ['left', 'right'])->default('left')->after('image');
            $table->enum('service_option', ['payment', 'booking', 'hotline'])->default('payment')->after('method');
            $table->enum('benefit_option', ['month', 'hour', 'min', 'per call'])->default('month')->after('service_option');
        });
    }

    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['hotline_active', 'image_direction', 'service_option', 'benefit_option']);
        });
    }
};
