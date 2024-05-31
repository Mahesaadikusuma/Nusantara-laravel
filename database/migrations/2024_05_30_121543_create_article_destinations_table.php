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
        Schema::create('article_destinations', function (Blueprint $table) {
            $table->id();
            $table->string('judul_article');
            $table->string('slug');
            $table->string('image')->nullable();
            $table->text('body');
            $table->integer('ratting_article_acc');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_destinations');
    }
};
