<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $category = Category::skip(0)->take(5)->orderBy('id', 'Desc')->get();
        $user = User::skip(0)->take(5)->orderBy('id', 'Desc')->get();
        $pengguna = User::where('role', 'user')->get();
        $toko = User::where('role', 'vendor')->get();
        $blog = Blog::all();
        return view('admin.dashboard', [
            'title' => "Dashboard",
            'category' => $category,
            'user' => $user,
            'pengguna' => count($pengguna),
            'toko' => count($toko),
            'blog' => count($blog)
        ]);
    }
}
