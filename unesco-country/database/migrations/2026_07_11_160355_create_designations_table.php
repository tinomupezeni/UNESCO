<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('designations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type', ['world_heritage', 'biosphere_reserve', 'creative_city', 'intangible_heritage', 'memory_of_world']);
            $table->foreignId('country_id')->constrained()->onDelete('cascade');
            $table->text('description')->nullable();
            $table->string('external_url')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('designations');
    }
};
