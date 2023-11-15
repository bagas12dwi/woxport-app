<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index($category_id)
    {
        $vendor = Product::with('imageProduct')->where('category_id', '=', $category_id)->get();
        return view('users.vendor', [
            'title' => 'Vendor Product',
            'vendor' => $vendor
        ]);
    }

    public function detail($product_id)
    {
        $vendor = Product::with('imageProduct')->where('id', '=', $product_id)->first();
        return view('users.vendor-detail', [
            'title' => 'Detail',
            'vendor' => $vendor
        ]);
    }
}
