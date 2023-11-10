<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\ImageProduct;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::with('imageProduct')->where('user_id', '=', 1)->get();
        // dd($product);
        return view('vendor.produk.index', [
            'title' => 'Produk',
            'product' => $product
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('vendor.produk.add', [
            'title' => 'Produk',
            'category' => $category
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_name' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'description' => 'required'
        ]);

        $validatedData['user_id'] = 1;
        try {
            $product = Product::create($validatedData);
            $product_id = $product->id;

            if ($request->hasFile('img_path')) {
                foreach ($request->file('img_path') as $file) {
                    $validatedImage['img_path'] = $file->store('produk');
                    $validatedImage['product_id'] = $product_id;

                    ImageProduct::create($validatedImage);
                }
            }
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->intended('vendor/produk')->with('error', 'Data Gagal Ditambahkan !');
        }

        return redirect()->intended('vendor/produk')->with('success', 'Data Berhasil Ditambahkan !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $produk)
    {
        $category = Category::all();
        return view('vendor.produk.edit', [
            'title' => 'Produk',
            'product' => $produk,
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $produk)
    {
        $validatedData = $request->validate([
            'product_name' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'description' => 'required'
        ]);

        $validatedData['user_id'] = 1;

        try {
            // Temukan produk yang ingin diperbarui berdasarkan ID
            $product = Product::find($produk->id);

            if (!$product) {
                return redirect()->intended('vendor/produk')->with('error', 'Produk tidak ditemukan.');
            }

            // Perbarui atribut produk
            $product->update($validatedData);

            // Cek apakah ada gambar yang baru diunggah
            if ($request->hasFile('img_path')) {
                // Hapus semua gambar yang terkait dengan produk
                $product->imageProduct()->delete();

                // Tambahkan gambar yang baru diunggah
                foreach ($request->file('img_path') as $file) {
                    $validatedImage['img_path'] = $file->store('produk');
                    $validatedImage['product_id'] = $product->id;
                    ImageProduct::create($validatedImage);
                }
            }
        } catch (\Throwable $th) {
            return redirect()->intended('vendor/produk')->with('error', 'Data Gagal Diperbarui !');
        }

        return redirect()->intended('vendor/produk')->with('success', 'Data Berhasil Diperbarui !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $produk)
    {
        Product::destroy($produk->id);
        return redirect()->intended('vendor/produk')->with('success', 'Data Berhasil Dihapus !');
    }
}
