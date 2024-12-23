<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Table extends Model
{
    protected $fillable = [
        "status",
        "capacity",
    ];
    public function booking():hasMany
    {
        return $this->hasMany(Booking::class);
    }
    public function order():hasMany
    {
        return $this->hasMany(Order::class);
    }

}
