<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consumption extends Model
{
    protected $fillable = ['booking_id', 'product_id', 'price', 'amount'];

    public function getTotalPriceAttribute()
    {
        return $this->price * $this->amount;
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
