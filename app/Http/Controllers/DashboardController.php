<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $category = Category::skip(0)->take(5)->orderBy('id', 'Desc')->get();
        $user = User::skip(0)->take(5)->orderBy('id', 'Desc')->get();
        return view('admin.dashboard', [
            'title' => "Dashboard",
            'category' => $category,
            'user' => $user
        ]);
    }
}
