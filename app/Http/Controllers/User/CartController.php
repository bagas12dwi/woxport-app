<?php

namespace App\Http\Controllers\User;

use App\Models\Cart;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart = Cart::with('product')->where('user_id', auth()->user()->id)->get();
        $groupedCarts = $cart->groupBy('product.vendor.id');
        return view('users.cart', [
            'title' => 'Keranjang',
            'groupedCarts' => $groupedCarts
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
            'product_id' => 'required',
            'qty' => 'required'
        ]);

        $product = Product::where('id', $request->product_id)->first();

        $validatedData['vendor_id'] = $product->vendor_id;
        $validatedData['user_id'] = auth()->user()->id;

        Cart::create($validatedData);

        return redirect()->intended('/cart');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCartRequest $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        Cart::destroy($cart->id);
        return redirect()->intended('/cart')->with('success', 'Data Berhasil Dihapus ! ');
    }
}
