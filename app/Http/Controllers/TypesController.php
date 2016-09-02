<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeRequest;
use App\Type;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::paginate();

        return view('types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeRequest $request)
    {
        $data = $request->all();

        \App\Type::create($data);

        \Session::flash('message_type', 'success');
        \Session::flash('message', 'Tipo de Quarto cadastrada com sucesso!');

        return redirect('types');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Type::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = Type::findOrFail($id);

        return view('types.edit', compact('type'));
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

        $type = Type::findOrFail($id);
        $type->update($data);

        \Session::flash('message_type', 'success');
        \Session::flash('message', 'Tipo de Quarto atualizado com sucesso!');

        return redirect('types');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_count = Type::destroy($id);

        if($delete_count != 1) {
            \Session::flash('message_type', 'danger');
            \Session::flash('message', 'Erro ao excluir tipo de quarto!');
        } else {
            \Session::flash('message_type', 'success');
            \Session::flash('message', 'Tipo de quarto excluido com sucesso!');
        }

        return redirect('types');
    }
}
