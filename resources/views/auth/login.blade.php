@extends('layouts.app')

@section('content')
<div class="grid grid-cols-2 min-h-screen justify-items-stretch">
    <div class="p-8">
        <div class="bg-leaf w-full h-full rounded-3xl flex justify-center items-center">
            <img src="{{ asset('img/cake shop-bro.png') }}" alt="" class="w-4/5">
        </div>
    </div>
    <div class="flex flex-col justify-between h-screen w-full px-28">
        <div class="flex flex-col items-start justify-center flex-grow">
            <img src="{{ asset('img/Brand Logo.png') }}" alt="" class="h-12 mb-6">
            <p class="mb-4 text-4xl font-sans font-bold">Sign In to your Account</p>
            <p class="text-lg font-sans font-normal mb-6">Ready to treat yourself? Sign in to explore <br> delicious cakes made just for you.</p>

            @if(session('status'))
                <p class="w-full p-2.5 mb-4 bg-green-100 text-start text-green-500 rounded-md">{{ session('status') }}</p>
            @endif

            <form action="{{ route('login.process') }}" method="POST" class="w-full mb-6">
                @csrf

                <div class="mb-3">
                    <label for="username" class="text-lg font-sans font-bold">Username</label>
                    <div class="relative mt-2 flex items-center">
                        <div class="absolute left-3 flex items-center h-full pointer-events-none">
                            <i class="fa-solid fa-user" style="color: #4b5563;"></i>
                        </div>
                        <input type="text" id="username" name="identifier" class="w-full bg-transparent border-2 border-gray-600 text-gray-600 font-sans text-base rounded-xl focus:ring-2 focus:ring-leaf focus:border-leaf focus:outline-none ps-10 p-2.5" placeholder="Enter your registered name or email" value="{{ old('identifier') }}" autofocus>
                    </div>
                    <p class="text-sm font-medium text-red-600 h-2">
                        @error('identifier')
                            {{ $message }}
                        @enderror
                    </p>
                </div>

                <div class="mb-8">
                    <label for="password" class="text-lg font-sans font-bold">Password</label>
                    <div class="relative mt-2 mb-1 flex items-center">
                        <div class="absolute left-3 flex items-center h-full pointer-events-none">
                            <i class="fa-solid fa-lock" style="color: #4b5563;"></i>
                        </div>
                        <input type="password" id="password" name="password" class="w-full bg-transparent border-2 border-gray-600 font-sans text-gray-600 text-base rounded-xl focus:ring-2 focus:ring-leaf focus:border-leaf focus:outline-none ps-10 p-2.5" placeholder="Enter your password">
                    </div>
                    <p class="flex justify-start text-sm font-medium text-red-600 h-2">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </p>
                    <div class="flex justify-end">
                        <a href="{{ route('password.request') }}" class="text-blue-700 font-sans text-base">Forgot Password?</a>
                    </div>
                </div>

                <div>
                    <button type="submit" class="w-full p-2.5 bg-leaf font-sans font-bold text-base text-white rounded-xl">
                        Sign In
                    </button>
                </div>
            </form>

            <div class="self-center">
                <span class="font-sans font-normal text-base">Don't you have an account? <a href="{{ route('regist') }}" class="text-blue-700">Sign Up!</a></span>
            </div>
        </div>
    </div>
</div>
@endsection