<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->string('slug')->unique();
            $table->json('description')->nullable();
            $table->json('content')->nullable();
            $table->date('event_date');
            $table->date('event_end_date')->nullable();
            $table->string('location')->nullable();
            $table->enum('event_type', ['conference', 'workshop', 'webinar', 'meeting'])->default('conference');
            $table->string('registration_url')->nullable();
            $table->enum('status', ['upcoming', 'ongoing', 'past'])->default('upcoming');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
