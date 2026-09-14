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
        Schema::create('seo_districts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seo_city_id')->constrained('seo_cities')->cascadeOnDelete();
            $table->string('name');
            $table->string('slug');
            $table->string('zip_code')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('landmark_name')->nullable();
            $table->text('lsi_keywords')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->unique(['seo_city_id', 'slug']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seo_districts');
    }
};
