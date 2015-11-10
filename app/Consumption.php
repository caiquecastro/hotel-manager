<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consumption extends Model
{
    protected $fillable = ['booking_id', 'product_id', 'price', 'amount'];
}
