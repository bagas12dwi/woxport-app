<?php

namespace App\Http\Controllers;

use App\DataTables\CategoryDataTable;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.kategori.index', [
            'title' => 'Kategori'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategori.add', [
            'title' => 'Kategori'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'img_path' => 'required | image',
            'category_name' => 'required'
        ]);

        $validatedData['img_path'] = $request->file('img_path')->store('kategori');

        Category::create($validatedData);

        session()->flash('success', 'Data Berhasil Ditambahkan !');

        return redirect()->intended('kategori');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $kategori)
    {
        return view('admin.kategori.edit', [
            'title' => 'Kategori',
            'category' => $kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $kategori)
    {
        $validatedData = $request->validate([
            'img_path' => 'image',
            'category_name' => 'required'
        ]);

        if ($request->file('img_path')) {
            if ($request->oldImg) {
                Storage::delete($request->oldImg);
            }
            $validatedData['img_path'] = $request->file('img_path')->store('kategori');
        }

        Category::where('id', $kategori->id)->update($validatedData);
        return redirect()->intended('kategori')->with('success', 'Data Berhasil Diubah !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $kategori)
    {
        Storage::delete($kategori->img_path);
        Category::destroy($kategori->id);
        return redirect()->intended('/kategori')->with('success', 'Data Berhasil Dihapus ! ');
    }
}
