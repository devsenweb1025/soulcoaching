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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->text('short_description')->nullable();
            $table->string('image')->nullable();
            $table->decimal('price', 10, 2);
            $table->string('duration')->nullable();
            $table->string('location')->nullable();
            $table->string('method')->nullable(); // online, in-person, hybrid
            $table->json('features')->nullable(); // Array of features/benefits
            $table->json('included_items')->nullable(); // What's included in the service
            $table->json('requirements')->nullable(); // Prerequisites or requirements
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
