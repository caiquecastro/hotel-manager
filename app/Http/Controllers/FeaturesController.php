<?php

namespace App\Http\Controllers;

use App\Feature;
use Illuminate\Http\Request;

class FeaturesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $features = \App\Feature::paginate();

        return view('features.index', compact('features'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('features.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        \App\Feature::create($data);

        \Session::flash('message_type', 'success');
        \Session::flash('message', 'Característica cadastrada com sucesso!');

        return redirect('features');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Feature::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $feature = Feature::findOrFail($id);

        return view('features.edit', compact('feature'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $feature = Feature::findOrFail($id);
        $feature->update($data);

        \Session::flash('message_type', 'success');
        \Session::flash('message', 'Característica atualizada com sucesso!');

        return redirect('/features');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_count = Feature::destroy($id);

        if ($delete_count != 1) {
            \Session::flash('message_type', 'danger');
            \Session::flash('message', 'Erro ao excluir característica!');
        } else {
            \Session::flash('message_type', 'success');
            \Session::flash('message', 'Característica excluida com sucesso!');
        }

        return redirect('features');
    }
}
