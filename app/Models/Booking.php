<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    protected $fillable = [
        'table_id',
        'customer_name',
        'booking_time',
    ];

    public function table(): BelongsTo
    {
        return $this->belongsTo(Table::class);
    }
}
