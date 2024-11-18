<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function indexHome() {
        $data = [
            'title' => "Home",
        ];
    
        return view('user.home', $data);
    }

    public function indexMenu() {
        $data = [
            'title' => "Menu",
        ];
    
        return view('user.menu', $data);
    }

    public function indexAbout() {
        $data = [
            'title' => "About Us",
        ];
    
        return view('user.about-us', $data);
    }

    public function indexContact() {
        $data = [
            'title' => "Contact",
        ];
        
        return view('user.contact', $data);
    }

    public function processPayment(Request $request) {
        
    }
}
