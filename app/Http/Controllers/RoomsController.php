<?php

namespace App\Http\Controllers;

use App\Feature;
use App\Http\Requests\RoomRequest;
use App\Room;
use Illuminate\Http\Request;

class RoomsController extends Controller
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
        $rooms = Room::orderBy('number')->paginate();

        if ($request->wantsJson()) {
            return $rooms;
        }

        return view('rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $features = Feature::all();
        $types = \App\Type::pluck('name', 'id');

        return view('rooms.create', compact('features', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoomRequest $request)
    {
        $data = $request->all();
        $data['status'] = 'available';

        $features = $data['features'] ?? [];

        $room = Room::create($data);
        $room->features()->attach($features);

        \Session::flash('message_type', 'success');
        \Session::flash('message', 'Quarto cadastrado com sucesso!');

        return redirect('rooms');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        return view('rooms.show', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $room = Room::findOrFail($id);
        $features = Feature::all('name', 'id');
        $types = \App\Type::pluck('name', 'id');

        return view('rooms.edit', compact('room', 'features', 'types'));
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
        $features = $data['features'] ?? [];

        $room = Room::findOrFail($id);
        $room->update($data);

        $room->features()->sync($features);

        \Session::flash('message_type', 'success');
        \Session::flash('message', 'Quarto atualizado com sucesso!');

        return redirect('/rooms');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_count = Room::destroy($id);

        if ($delete_count != 1) {
            \Session::flash('message_type', 'danger');
            \Session::flash('message', 'Erro ao excluir quarto!');
        } else {
            \Session::flash('message_type', 'success');
            \Session::flash('message', 'Quarto excluida com sucesso!');
        }

        return redirect('/rooms');
    }

    public function putMaintenance($id)
    {
        $room = Room::findOrFail($id);

        if ($room->status == 'occupied') {
            \Session::flash('message_type', 'warning');
            \Session::flash('message', 'Não foi possível definir manutenção para quarto ocupado!');
        } elseif ($room->status == 'available') {
            \Session::flash('message_type', 'success');
            \Session::flash('message', 'Quarto em manutenção definido com sucesso!');
            $room->status = 'maintenance';
        } else {
            \Session::flash('message_type', 'success');
            \Session::flash('message', 'Quarto disponível definido com sucesso!');
            $room->status = 'available';
        }
        $room->save();

        return redirect('/rooms');
    }
}
