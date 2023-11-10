<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $product = Product::with('imageProduct')->where('user_id', '=', 1)->orderBy('created_at', 'Desc')->limit(3)->get();
        return view('vendor.toko.index', [
            'title' => 'Toko',
            'products' => $product,
            'jmlProduk' => count($product)
        ]);
    }
}
