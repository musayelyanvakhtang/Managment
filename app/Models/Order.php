<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
    public function table(): BelongsTo
    {
        return $this->belongsTo(Table::class);
    }
}
