<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function indexRegister()
    {
        return view('auth.register');
    }

    public function indexLogin()
    {
        if (auth()->user() != null) {
            if (auth()->user()->role == 'admin') {
                return redirect()->intended('/dashboard');
            } else {
                return redirect()->intended('/');
            }
        } else {
            return view('auth.login', [
                'title' => 'Login'
            ]);
        }
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|max:255',
            'phone' => 'required',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:6'
        ]);

        $nama = $validated['nama'];
        $phone = $validated['phone'];
        $email = $validated['email'];
        $password = bcrypt($validated['password']);


        $user = new User();
        $user->name = $nama;
        $user->email = $email;
        $user->phone = $phone;
        $user->password = $password;
        $user->role = "user";
        $user->save();

        $inputan = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($inputan)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
    }

    public function login(Request $request)
    {
        $inputan = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        $level = DB::table('users')->where('email', $inputan['email'])->value('role');

        if ($level == 'admin') {
            if (Auth::attempt($inputan)) {
                $request->session()->regenerate();
                return redirect()->intended('/dashboard');
            }
            return back()->with('errorLogin', 'Login Gagal !');
        } elseif ($level == 'user' || $level == 'vendor') {
            if (Auth::attempt($inputan)) {
                $request->session()->regenerate();
                return redirect()->intended('/');
            }
            return back()->with('errorLogin', 'Login Gagal !');
        } else {
            return back()->with('errorLogin', 'Login Gagal !');
        }

        return back()->with('errorLogin', 'Login Gagal !');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
