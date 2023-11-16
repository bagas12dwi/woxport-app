<?php

namespace App\Http\Controllers\User;

use App\Models\Wishlist;
use App\Http\Requests\StoreWishlistRequest;
use App\Http\Requests\UpdateWishlistRequest;
use App\Http\Controllers\Controller;
use App\Models\ImageProduct;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wishlists = Wishlist::with('product')->where('user_id', auth()->user()->id)->get();
        return view('users.wishlist', [
            'title' => 'Wishlist',
            'wishlists' => $wishlists
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required'
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        try {
            Wishlist::create($validatedData);
        } catch (\Throwable $th) {
            return redirect()->intended("vendor/detail/$request->product_id")->with('error', $th);
        }

        return redirect()->intended("vendor/detail/$request->product_id")->with('success', 'Data Berhasil Ditambahkan !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Wishlist $wishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWishlistRequest $request, Wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wishlist $wishlist)
    {
        WishList::destroy($wishlist->id);
        return redirect()->intended("/wishlist")->with('success', 'Data Berhasil Dihapus !');
    }

    public function unlike(Wishlist $wishlist)
    {
        $produkId = $wishlist->product_id;
        WishList::destroy($wishlist->id);
        return redirect()->intended("vendor/detail/$produkId")->with('success', 'Data Berhasil Dihapus !');
    }
}
