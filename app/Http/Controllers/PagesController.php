<?php

namespace App\Http\Controllers;

class PagesController extends Controller
{
    public function menu()
    {
        return redirect('/assets/pdf/cardapio.pdf');
    }
}
