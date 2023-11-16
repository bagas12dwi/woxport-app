<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
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
        $user_id = auth()->user()->id;

        $wishlist = Wishlist::where('user_id', $user_id)
            ->whereHas('product', function ($query) use ($product_id) {
                $query->where('product_id', $product_id);
            })
            ->first();

        $isInWishlist = $wishlist !== null;

        $vendor = Product::with('imageProduct')->find($product_id);
        return view('users.vendor-detail', [
            'title' => 'Detail',
            'vendor' => $vendor,
            'isInWishlist' => $isInWishlist,
            'wishlist_id' => $wishlist ? $wishlist->id : 0
        ]);
    }
}
