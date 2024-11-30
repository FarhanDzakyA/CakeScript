@extends('layouts.auth-layout')

@section('content')
<div class="flex flex-col items-center justify-start">
    <img src="{{ asset('img/verification.png') }}" alt="Verification Image" class="w-32 mb-8">
    <p class="text-3xl mb-4">Verify your email address</p>
    <p class="text-center mb-4 text-gray-700">A verification email has been sent to your email address. Please check your email and click the link provided in the email to complete your account registration.</p>
    <p class="text-center mb-4 text-gray-700">If you don't receive an email within the next 5 minutes, use the button below to resend verification email.</p>
    @if(session()->has('message'))
        <p class="text-center text-green-500 mb-4">A new verification link has been sent to the email address you provided during registration.</p>
    @endif
    <form action="{{ route('verification.send') }}" method="POST" class="mb-4">
        @csrf
        <button type="submit" class="w-full bg-leaf text-white font-semibold py-2 px-4 rounded-full hover:bg-darkleaf">
            Resend Verification Email
        </button>
    </form>
    <form action="{{ route('email.logout') }}" method="POST">
        @csrf
        <button type="submit" class="underline text-gray-700">Logout</button>
    </form>
</div>
@endsection