<?php

namespace App\Http\Livewire;

use App\Product;
use Livewire\Component;

class ProductList extends Component
{
    public $search = '';

    public function render()
    {
        $productsQuery = Product::query();

        if ($this->search) {
            $productsQuery->where('barcode', 'ilike', "%$this->search%")
                ->orWhere('name', 'ilike', "%$this->search%");
        }

        $products = $productsQuery->paginate();

        return view('livewire.product-list', compact('products'));
    }
}
