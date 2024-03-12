<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'client',
        'the_event',
        'number_of_tickets',
        'total_price',
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
