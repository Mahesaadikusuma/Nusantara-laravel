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
        Schema::create('event_destinations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_destinations')->constrained('destinations')->onDelete('cascade');
            
            $table->string('name_event');
            $table->string('slug');
            
            $table->string('location_event');
            $table->integer('ratting_event_destination_acc');
            $table->string('image_event')->nullable();
            $table->text('description_event_destination');
            $table->timestamp('date_event');

            $table->integer('price_event');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_destinations');
    }
};
