<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        $title = 'Sign In';

        return view('auth.login', compact('title'));
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'identifier' => 'required',
            'password' => 'required',
        ]);

        $loginField = filter_var($credentials['identifier'], FILTER_VALIDATE_EMAIL) ? 'email' : 'nama';

        $credentials = [
            $loginField => $credentials['identifier'],
            'password' => $credentials['password'],
        ];

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
        ])->withInput();
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('login');
    }
}
