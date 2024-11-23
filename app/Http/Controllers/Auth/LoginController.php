<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('login', [
            'title' => "Sign In",
        ]);
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'nama' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $role = Auth::user()->role;

            if($role === 'User') {
                return redirect()->route('home');
            } elseif($role === 'Admin') {
                return redirect()->route('admin.dashboard');
            }
        }

        return back()->withErrors([
            'password' => 'The provided credentials do not match our records',
        ]);
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('login');
    }
}
