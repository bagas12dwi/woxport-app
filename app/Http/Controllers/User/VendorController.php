<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Wishlist;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index($category_id)
    {
        $vendor = Product::with('imageProduct')->where('category_id', '=', $category_id)->get();
        $client = new Client();

        $response = $client->get('https://bagas12dwi.github.io/api-wilayah-indonesia/api/provinces.json');

        $province = json_decode($response->getBody(), true);
        return view('users.vendor', [
            'title' => 'Vendor Product',
            'vendor' => $vendor,
            'provinces' => $province,
            'category_id' => $category_id
        ]);
    }

    public function detail($product_id)
    {
        $wishlist = '';
        $isInWishlist = '';
        if (auth()->user() != null) {
            $user_id = auth()->user()->id;

            $wishlist = Wishlist::where('user_id', $user_id)
                ->whereHas('product', function ($query) use ($product_id) {
                    $query->where('product_id', $product_id);
                })
                ->first();

            $isInWishlist = $wishlist !== null;
        }


        $vendor = Product::with('imageProduct')->find($product_id);
        $comment = Comment::with('user')->where('product_id', $vendor->id)->get();
        return view('users.vendor-detail', [
            'title' => 'Detail',
            'vendor' => $vendor,
            'isInWishlist' => $isInWishlist ? $isInWishlist : false,
            'wishlist_id' => $wishlist ? $wishlist->id : 0,
            'comments' => $comment
        ]);
    }
}
