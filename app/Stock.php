<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = ['product_id', 'amount'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
