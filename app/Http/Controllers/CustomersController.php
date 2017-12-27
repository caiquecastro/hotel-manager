<?php

namespace App\Http\Controllers;

use App\Customer;
use App\LegalPerson;
use App\NaturalPerson;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::with('person')->paginate();

        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        $data = $request->all();

        $type = $request->input('person_type');

        if ('App\\NaturalPerson' == $type) {
            $person = NaturalPerson::create($data);
        } else {
            $person = LegalPerson::create($data);
        }

        $person->customer()->create($data);

        \Session::flash('message_type', 'success');
        \Session::flash('message', 'Cliente cadastrado com sucesso!');

        return redirect('/customers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Customer::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);

        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $customer = Customer::findOrFail($id);

        $customer->update($data);
        $customer->person->update($data);

        \Session::flash('message_type', 'success');
        \Session::flash('message', 'Cliente atualizado com sucesso!');

        return redirect('/customers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);

        $customer->person->delete();
        $delete_count = $customer->delete();

        if ($delete_count != 1) {
            \Session::flash('message_type', 'danger');
            \Session::flash('message', 'Erro ao excluir cliente!');
        } else {
            \Session::flash('message_type', 'success');
            \Session::flash('message', 'Cliente excluido com sucesso!');
        }

        return redirect('/customers');
    }
}
