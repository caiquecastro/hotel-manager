<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Order;
use App\Product;

class OrderItemsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('order-items.create');
    }

    public function store(Order $order, OrderRequest $request)
    {
        $product = Product::findOrFail($request->input('product_id'));
        $amount = $request->input('amount');

        return $order->items()->create([
            'product_id' => $product->id,
            'price' => $product->price,
            'amount' => $amount,
        ]);
    }
}
