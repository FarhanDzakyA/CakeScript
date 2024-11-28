@extends('layouts.auth-layout')

@section('content')
<div>
    <p class="text-justify text-gray-700 mb-4">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one</p>
    @if(session('status') || $errors->has('email'))
        <p class="mb-4 {{ session('status') ? 'text-green-500' : 'text-red-500' }}">
            @if(session('status'))
                {{ session('status') }}
            @else
                {{ $errors->first('email') }}
            @endif
        </p>
    @endif
    <form action="{{ route('password.email') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="email" class="font-semibold text-leaf">Email Address</label>
            <input type="email" id="email" name="email" class="w-full mt-1 bg-transparent border-2 border-gray-600 text-gray-600 font-sans text-base rounded-xl focus:ring-2 focus:ring-leaf focus:border-leaf focus:outline-none p-2.5" placeholder="johndoe@gmail.com">
            <p class="text-sm font-medium text-red-600 h-2">
                @error('email')
                    {{ $message }}
                @enderror
            </p>
        </div>
        <div class="flex justify-end">
            <button type="submit" class="py-2 px-4 bg-leaf font-sans font-bold text-base text-white rounded-xl">EMAIL PASSWORD RESET LINK</button>
        </div>
    </form>
</div>
@endsection