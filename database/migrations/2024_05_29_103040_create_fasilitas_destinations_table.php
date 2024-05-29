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
        Schema::create('fasilitas_destinations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_destinations')->constrained('destinations')->onDelete('cascade');

            $table->boolean('wifi');
            $table->boolean('parkir_destination');
            $table->boolean('ac_destination');
            $table->boolean('kolam_destination');
            $table->boolean('rated_wisata');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fasilitas_destinations');
    }
};
