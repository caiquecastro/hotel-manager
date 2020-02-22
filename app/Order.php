<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'status',
        'number',
        'customer_id',
    ];

    protected $appends = ['total'];

    public function getTotalAttribute()
    {
        return $this->items->sum('total');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class)->orderBy('created_at');
    }
}
