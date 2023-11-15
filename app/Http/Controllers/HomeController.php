<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $kategori = Category::orderBy('created_at', 'desc')->limit(3)->get();
        $produk = Product::with('imageProduct')->orderBy('created_at', 'desc')->limit(4)->get();
        return view('users.welcome', [
            'categories' => $kategori,
            'products' => $produk
        ]);
    }
}
