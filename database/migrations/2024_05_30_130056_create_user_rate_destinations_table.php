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
        Schema::create('user_rate_destinations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('id_destinations')->nullable()->constrained('destinations')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->integer('rating_destination')->nullable();
            $table->text('comment_destination')->nullable();
            $table->foreignId('id_artikel_destinations')->nullable()->constrained('article_destinations')->onDelete('cascade');
            $table->integer('rating_artikel_destination')->nullable();
            $table->text('comment_artikel_destination')->nullable();
            $table->foreignId('id_event_destinations')->nullable()->constrained('event_destinations')->onDelete('cascade');
            $table->integer('rating_event_destination')->nullable();
            $table->text('comment_event_destination')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_rate_destinations');
    }
};
