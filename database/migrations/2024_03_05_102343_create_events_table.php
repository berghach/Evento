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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->dateTime('start_at');
            $table->dateTime('end_at');
            $table->string('location');
            $table->unsignedBigInteger('available_tickets')->nullable();
            $table->float('price', 8, 2, true)->nullable();
            $table->enum('event_is', ['open', 'booked', 'passed'])->default('open');
            $table->boolean('is_valid')->default(false);
            $table->boolean('auto_accept')->default(true);
            $table->foreignId('organiser')->constrained('users', 'id', 'event_user_id')->onDelete('cascade');
            $table->foreignId('category')->constrained('categories', 'id', 'event_category_id')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
