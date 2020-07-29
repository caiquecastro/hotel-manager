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
            $productsQuery->where('barcode', 'like', "%$this->search%")
                ->orWhere('name', 'like', "%$this->search%");
        }

        $products = $productsQuery->paginate();

        return view('livewire.product-list', compact('products'));
    }
}
