<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'client',
        'the_event',
        'number_of_tickets',
        'total_price',
        'is_valid',
    ];

    public function event() : BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tickets() : HasMany
    {
        return $this->hasMany(Ticket::class);
    }
}
