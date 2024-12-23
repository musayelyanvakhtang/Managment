<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable=[
        'name',
        'price',
    ];
    public function order():HasMany
    {
        return $this->hasMany(Order::class);
    }
}
