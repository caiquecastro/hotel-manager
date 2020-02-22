<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $openOrders = \App\Order::where('status', 'open')
            ->with('items')
            ->get();

        if ($request->wantsJson()) {
            return $openOrders;
        }

        $orderItems = \App\OrderItem::with('order')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('orders.index', [
            'openOrders' => $openOrders,
            'orderItems' => $orderItems,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::orderBy('name')->get();

        return view('orders.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $orderNumber = $request->input('number');
        $customerId = $request->input('customer_id');

        Order::create([
            'customer_id' => $customerId,
            'number' => $orderNumber,
            'status' => 'open',
        ]);

        return redirect('/orders');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order, Request $request)
    {
        if ($request->wantsJson()) {
            return $order->load('items.product');
        }

        return view('orders.show', [
            'order' => $order,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $order->update($request->all());

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
