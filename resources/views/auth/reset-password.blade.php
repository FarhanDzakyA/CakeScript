@extends('layouts.auth-layout')

@section('content')
<div class="w-[544px]">
    <form action="{{ route('password.update') }}" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

        <div class="mb-2">
            <label for="email" class="font-semibold text-leaf">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', request('email')) }}" class="w-full mt-1 bg-transparent border-2 border-gray-600 text-gray-600 font-sans text-base rounded-xl focus:ring-2 focus:ring-leaf focus:border-leaf focus:outline-none p-2.5" placeholder="johndoe@gmail.com">
            <p class="text-sm font-medium text-red-600 h-2">
                @error('email')
                    {{ $message }}
                @enderror
            </p>
        </div>
        <div class="mb-2">
            <label for="password" class="font-semibold text-leaf">Password</label>
            <input type="password" id="email" name="password" class="w-full mt-1 bg-transparent border-2 border-gray-600 text-gray-600 font-sans text-base rounded-xl focus:ring-2 focus:ring-leaf focus:border-leaf focus:outline-none p-2.5" placeholder="Enter your password">
            <p class="text-sm font-medium text-red-600 h-2">
                @error('password')
                    {{ $message }}
                @enderror
            </p>
        </div>
        <div class="mb-4">
            <label for="password-confirmation" class="font-semibold text-leaf">Confirm Password</label>
            <input type="password" id="password-confirmation" name="password_confirmation" class="w-full mt-1 bg-transparent border-2 border-gray-600 text-gray-600 font-sans text-base rounded-xl focus:ring-2 focus:ring-leaf focus:border-leaf focus:outline-none p-2.5" placeholder="Repeat your password">
        </div>
        <div class="flex justify-end">
            <button type="submit" class="py-2 px-4 bg-leaf font-sans font-bold text-base text-white rounded-xl">RESET PASSWORD</button>
        </div>
    </form>
</div>
@endsection