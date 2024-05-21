<div>
    <form class="form-inline" action="/products" method="GET">
        <div class="form-group mb-2">
            <label for="query">Name</label>
            <input
                type="search"
                class="form-control ml-2"
                id="query"
                name="q"
                placeholder="Água"
                value="{{ request()->query('q') }}"
                wire:model="search"
            >
        </div>
        {{-- <button class="btn btn-primary ml-2 mb-2">
            Buscar
        </button> --}}
    </form>
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Produto</th>
            <th>Preço</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->barcode }}</td>
                    <td>{{ $product->name }}</td>
                    <td>R$ {{ number_format($product->price, 2, ',', '.') }}</td>
                    <td>
                        <a
                            href="{{ route('products.edit', ['product' => $product->id]) }}"
                            class="btn btn-secondary btn-sm"
                            aria-label="Editar"
                            data-balloon-pos="up"
                        >
                            <span class="fa fa-pencil"></span>
                        </a>
                        {!! Form::open(['method'=>'DELETE', 'action'=>['ProductsController@destroy', $product->id], 'class' => 'display-inline-block']) !!}
                            <button
                                class="btn btn-danger btn-sm"
                                type="submit"
                                aria-label="Excluir"
                                data-balloon-pos="up"
                            >
                                <span class="fa fa-trash"></span>
                            </button>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
