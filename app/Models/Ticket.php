<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'qr_code',
        'booking'
    ];

    public function booking() : BelongsTo
    {
        return $this->belongsTo(Booking::class);
    }
}
