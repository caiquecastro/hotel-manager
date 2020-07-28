<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductsController extends Controller
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

        $orderBy = $request->get('sort', 'name');

        $orderByField = Str::startsWith($orderBy, '-') ? Str::substr($orderBy, 1) : $orderBy;
        $orderBySort = Str::startsWith($orderBy, '-') ? 'desc' : 'asc';

        $productsQuery = Product::query();

        if ($search) {
            $productsQuery->where('barcode', 'like', "%$search%")
                ->orWhere('name', 'like', "%$search%");
        }

        $productsQuery->orderBy($orderByField, $orderBySort);

        $products = $productsQuery->paginate();

        if ($request->wantsJson()) {
            return $products;
        }

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data = $request->all();
        $data['saleable'] = isset($data['saleable']) ? $data['saleable'] : false;

        $room = Product::create($data);

        \Session::flash('message_type', 'success');
        \Session::flash('message', 'Produto cadastrado com sucesso!');

        return redirect('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Product::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('products.edit', compact('product'));
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

        $product = Product::findOrFail($id);
        $product->update($data);

        \Session::flash('message_type', 'success');
        \Session::flash('message', 'Produto atualizado com sucesso!');

        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_count = Product::destroy($id);

        if ($delete_count != 1) {
            \Session::flash('message_type', 'danger');
            \Session::flash('message', 'Erro ao excluir produto!');
        } else {
            \Session::flash('message_type', 'success');
            \Session::flash('message', 'Produto excluido com sucesso!');
        }

        return redirect('products');
    }
}
