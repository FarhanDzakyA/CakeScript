<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class RegisteredUserController extends Controller
{
    public function index() {
        return view('auth.register', [
            'title' => "Sign Up",
        ]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'email' =>'required|email:dns|unique:users,email',
            'alamat' => 'required',
            'no_hp' => 'required|min:10|max:13|unique:users,no_hp',
            'password' => 'required|confirmed|min:6|max:50',
            'password_confirmation' => 'required',
        ]);

        unset($validatedData['password_confirmation']);
        $validatedData['role'] = 'User';
        $validatedData['password'] = bcrypt($validatedData['password']);

        $user = User::create($validatedData);
        event(new Registered($user));

        Auth::login($user);

        return redirect('/email/verify');
    }
}
