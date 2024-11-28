<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerifyEmailController extends Controller
{
    public function verifyIndex() {
        $title = 'Verify Email';

        return view('auth.verify-email', compact('title'));
    }

    public function verifyEmail(EmailVerificationRequest $request) {
        $request->fulfill();
     
        return redirect('/');
    }

    public function resendEmail(Request $request) {
        $request->user()->sendEmailVerificationNotification();
     
        return back()->with('message', 'Verification link sent!');
    }
}
