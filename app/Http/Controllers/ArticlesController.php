<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function show()
    { 
        return view('articles')->with('products', $this->fetchProducts());
    }
}
