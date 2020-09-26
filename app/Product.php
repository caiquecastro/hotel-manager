<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'display_name',
        'barcode',
        'price',
        'saleable',
        'uom',
        'minimum_stock',
    ];
}
