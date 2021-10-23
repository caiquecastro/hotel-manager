<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\OrderRequest;
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
        $search = $request->query('q');
        $displayMode = 'grid';
        $orderStatus = 'open';

        if ($request->has('closed')) {
            $orderStatus = 'paid';
            $displayMode = 'table';
        }

        $ordersQuery = \App\Order::where('status', $orderStatus)
            ->with('items');

        if ($search) {
            $ordersQuery->where('number', 'like', "%$search%");
        }

        $orders = $ordersQuery->get();

        if ($request->wantsJson()) {
            return $orders;
        }

        return view('orders.index', compact('orders', 'displayMode'));
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
    public function store(OrderRequest $request)
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
