<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('country_article', function (Blueprint $table) {
            $table->foreignId('country_id')->constrained()->onDelete('cascade');
            $table->foreignId('article_id')->constrained()->onDelete('cascade');
            $table->primary(['country_id', 'article_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('country_article');
    }
};
