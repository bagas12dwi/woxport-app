<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::where('id', auth()->user()->id)->first();
        return view('users.profile', [
            'title' => "Profile",
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);

        if ($request->file('img_path')) {
            if ($request->oldImg != null) {
                Storage::delete($request->oldImg);
            }
            $validatedData['img_path'] = $request->file('img_path')->store('profil');
        }

        User::where('id', $user->id)->update($validatedData);

        return redirect()->intended('/');
    }
}
