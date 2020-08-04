<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class GuestsController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guests.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Customer::create($request->all());

        return redirect('/register/success');
    }

    public function registerSuccess()
    {
        return view('guests.success_feedback');
    }
}
