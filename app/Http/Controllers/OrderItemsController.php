<?php

namespace App\Http\Controllers;

class OrderItemsController extends Controller
{
    public function create()
    {
        return view('order-items.create');
    }
}
