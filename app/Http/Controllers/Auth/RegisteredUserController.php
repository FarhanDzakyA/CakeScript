<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    public function index() {
        return view('register', [
            'title' => "Sign Up",
        ]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'nama_pelanggan' => 'required|max:255',
            'alamat' => 'required',
            'no_hp' => 'required|max:14',
            'password' => 'required|confirmed|min:6|max:50',
            'password_confirmation' => 'required',
        ]);

        unset($validatedData['password_confirmation']);
        $validatedData['role'] = 'User';
        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        return redirect('/login')->with('success', 'Registration successfully! Please Sign In');
    }
}
