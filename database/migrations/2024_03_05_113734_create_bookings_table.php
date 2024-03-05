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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client')->constrained('users', 'id', 'booking_user_id')->cascadeOnDelete();
            $table->foreignId('the_event')->constrained('events', 'id', 'booking_event_id')->cascadeOnDelete();
            $table->unsignedBigInteger('number_of_tickets')->default(1);
            $table->float('total_price', 10, 2);
            $table->boolean('is_valid')->default(false);
            $table->softDeletes('canceled_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
