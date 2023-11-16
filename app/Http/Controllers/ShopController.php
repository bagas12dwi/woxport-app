<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Vendor;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $vendor = Vendor::where('user_id', auth()->user()->id)->first();
        $product = Product::with('imageProduct')->where('vendor_id', '=', $vendor->id)->orderBy('created_at', 'Desc')->limit(3)->get();
        return view('vendor.toko.index', [
            'title' => 'Toko',
            'products' => $product,
            'jmlProduk' => count($product)
        ]);
    }
}
