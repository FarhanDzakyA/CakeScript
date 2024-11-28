@extends('layouts.app')

@section('content')
<div class="grid grid-cols-2 min-h-screen justify-items-stretch">
    <div class="p-8">
        <div class="bg-leaf w-full h-full rounded-3xl flex justify-center items-center">
            <img src="{{ asset('img/Sign up-amico.png') }}" alt="" class="w-4/5">
        </div>
    </div>
    <div class="flex flex-col justify-between h-screen w-full px-28 pt-8">
        <div class="flex flex-col items-start justify-center flex-grow">
            <img src="{{ asset('img/Brand Logo.png') }}" alt="" class="h-12 mb-6">
            <p class="mb-4 text-4xl font-sans font-bold">Create your Account</p>

            <form action="{{ route('regist.store') }}" method="post" class="w-full mb-6">
                @csrf

                <div class="mb-3">
                    <label for="full_name" class="text-lg font-sans font-bold">Full Name</label>
                    <div class="relative mt-2 flex items-center">
                        <div class="absolute left-3 flex items-center h-full pointer-events-none">
                            <i class="fa-solid fa-user" style="color: #4b5563;"></i>
                        </div>
                        <input type="text" id="full_name" name="nama" class="w-full bg-transparent border-2 border-gray-600 text-gray-600 font-sans text-base rounded-xl focus:ring-2 focus:ring-leaf focus:border-leaf focus:outline-none ps-10 p-2.5" placeholder="John Doe" value="{{ old('nama_pelanggan') }}">
                    </div>
                    <p class="text-sm font-medium text-red-600 h-2">
                        @error('nama_pelanggan')
                            {{ $message }}
                        @enderror
                    </p>
                </div>

                <div class="grid grid-cols-2 gap-x-5 mb-3">
                    <div>
                        <label for="email" class="text-lg font-sans font-bold">Email Address</label>
                        <div class="relative mt-2 flex items-center">
                            <div class="absolute left-3 flex items-center h-full pointer-events-none">
                                <i class="fa-solid fa-envelope" style="color: #4b5563;"></i>
                            </div>
                            <input type="email" id="email" name="email" class="w-full bg-transparent border-2 border-gray-600 text-gray-600 font-sans text-base rounded-xl focus:ring-2 focus:ring-leaf focus:border-leaf focus:outline-none ps-10 p-2.5" placeholder="johndoe@gmail.com" value="{{ old('email') }}">
                        </div>
                        <p class="text-sm font-medium text-red-600 h-2">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </p>
                    </div>

                    <div>
                        <label for="phone_number" class="text-lg font-sans font-bold">Phone Number</label>
                        <div class="relative mt-2 flex items-center">
                            <div class="absolute left-3 flex items-center h-full pointer-events-none">
                                <i class="fa-solid fa-phone" style="color: #4b5563;"></i>
                            </div>
                            <input type="text" id="phone_number" name="no_hp" class="w-full bg-transparent border-2 border-gray-600 text-gray-600 font-sans text-base rounded-xl focus:ring-2 focus:ring-leaf focus:border-leaf focus:outline-none ps-10 p-2.5" placeholder="08XXXXXXXXXX" value="{{ old('no_hp') }}">
                        </div>
                        <p class="text-sm font-medium text-red-600 h-2">
                            @error('no_hp')
                                {{ $message }}
                            @enderror
                        </p>
                    </div>

                </div>

                <div class="mb-3">
                    <label for="address" class="text-lg font-sans font-bold">Address</label>
                    <div class="relative mt-2 flex items-center">
                        <div class="absolute left-3 flex items-center h-full pointer-events-none">
                            <i class="fa-solid fa-location-dot" style="color: #4b5563;"></i>
                        </div>
                        <textarea id="address" name="alamat" rows="2" class="ps-10 p-2.5 w-full text-base text-gray-600 bg-transparent rounded-xl border-2 border-gray-600 focus:ring-2 focus:ring-leaf focus:border-leaf focus:outline-none" placeholder="Enter your address">{{ old('alamat') }}</textarea>
                    </div>
                    <p class="text-sm font-medium text-red-600 h-2">
                        @error('alamat')
                            {{ $message }}
                        @enderror
                    </p>
                </div>

                <div class="grid grid-cols-2 gap-x-5">
                    <div>
                        <label for="password" class="text-lg font-sans font-bold">Password</label>
                        <div class="relative mt-2 flex items-center">
                            <div class="absolute left-3 flex items-center h-full pointer-events-none">
                                <i class="fa-solid fa-lock" style="color: #4b5563;"></i>
                            </div>
                            <input type="password" id="password" name="password" class="w-full bg-transparent border-2 border-gray-600 font-sans text-gray-600 text-base rounded-xl focus:ring-2 focus:ring-leaf focus:border-leaf focus:outline-none ps-10 p-2.5" placeholder="Enter your password">
                        </div>
                    </div>

                    <div>
                        <label for="confirm_password" class="text-lg font-sans font-bold">Confirm Password</label>
                        <div class="relative mt-2 flex items-center">
                            <div class="absolute left-3 flex items-center h-full pointer-events-none">
                                <i class="fa-solid fa-lock" style="color: #4b5563;"></i>
                            </div>
                            <input type="password" id="confirm_password" name="password_confirmation" class="w-full bg-transparent border-2 border-gray-600 font-sans text-gray-600 text-base rounded-xl focus:ring-2 focus:ring-leaf focus:border-leaf focus:outline-none ps-10 p-2.5" placeholder="Repeat your password">
                        </div>
                    </div>
                </div>

                <p class="text-sm font-medium text-red-600 h-2 mb-10">
                    @error('password')
                        {{ $message }}
                    @enderror
                </p>

                <div>
                    <button type="submit" class="w-full p-2.5 bg-leaf font-sans font-bold text-base text-white rounded-xl">
                        Sign Up
                    </button>
                </div>
            </form>

            <div class="self-center">
            <span class="font-sans font-normal text-base">Already have an account? <a href="{{ route('login') }}" class="text-blue-700">Sign In!</a></span>
            </div>
        </div>
    </div>
</div>
@endsection