<?php

namespace App\Http\Controllers;

use App\DataTables\BlogDataTable;
use App\Models\Blog;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BlogDataTable $dataTable)
    {
        return $dataTable->render('admin.blog.index', [
            'title' => 'Blog'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog.add', [
            'title' => 'Blog'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'img_path' => 'required | image',
            'title' => 'required',
            'body' => 'required',
        ]);

        $validatedData['img_path'] = $request->file('img_path')->store('blog');

        $blog = Blog::create($validatedData);

        $users = User::where('role', '!=', 'admin')->get();

        foreach ($users as $user) {
            Notification::create([
                'title' => 'Blog',
                'content' => 'Ada artikel baru yang ditambahkan silahkan check ya !',
                'url' => "/blog/detail/$blog->id",
                'user_id' => $user->id
            ]);
        }

        return redirect()->intended('manage-blog')->with('success', 'Data Berhasil Diubah !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $manage_blog)
    {
        return view('admin.blog.edit', [
            'title' => 'Blog',
            'blog' => $manage_blog
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $manage_blog)
    {
        $validatedData = $request->validate([
            'img_path' => 'image',
            'title' => 'required',
            'body' => 'required',
        ]);

        if ($request->file('img_path')) {
            if ($request->oldImg) {
                Storage::delete($request->oldImg);
            }
            $validatedData['img_path'] = $request->file('img_path')->store('kategori');
        }

        Blog::where('id', $manage_blog->id)->update($validatedData);
        return redirect()->intended('manage-blog')->with('success', 'Data Berhasil Diubah !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $manage_blog)
    {
        Storage::delete($manage_blog->img_path);
        Blog::destroy($manage_blog->id);
        return redirect()->intended('/manage-blog')->with('success', 'Data Berhasil Dihapus ! ');
    }
}
