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

            <form action="" class="w-full mb-6">
                @csrf

                <div class="mb-4">
                    <label for="full_name" class="text-lg font-sans font-bold">Full Name</label>
                    <div class="relative mt-2">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <i class="fa-solid fa-user" style="color: #4b5563;"></i>
                        </div>
                        <input type="text" id="full_name" name="" class="w-full bg-transparent border-2 border-gray-600 text-gray-600 font-sans text-base rounded-xl focus:ring-2 focus:ring-leaf focus:border-leaf focus:outline-none ps-10 p-2.5" placeholder="Enter the name as it is on the ID card">
                    </div>
                </div>

                <div class="mb-4">
                    <label for="address" class="text-lg font-sans font-bold">Address</label>
                    <div class="relative mt-2 mb-1">
                        <div class="absolute top-0 start-0 flex items-center ps-3.5 pt-3.5 pointer-events-none">
                            <i class="fa-solid fa-location-dot" style="color: #4b5563;"></i>
                        </div>
                        <textarea id="address" rows="2" class="ps-10 p-2.5 w-full text-base text-gray-600 bg-transparent rounded-xl border-2 border-gray-600 focus:ring-2 focus:ring-leaf focus:border-leaf focus:outline-none" placeholder="Enter your address"></textarea>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="phone_number" class="text-lg font-sans font-bold">Phone Number</label>
                    <div class="relative mt-2">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <i class="fa-solid fa-phone" style="color: #4b5563;"></i>
                        </div>
                        <input type="text" id="phone_number" name="" class="w-full bg-transparent border-2 border-gray-600 text-gray-600 font-sans text-base rounded-xl focus:ring-2 focus:ring-leaf focus:border-leaf focus:outline-none ps-10 p-2.5" placeholder="Enter your phone number">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-x-5">
                    <div class="mb-12">
                        <label for="password" class="text-lg font-sans font-bold">Password</label>
                        <div class="relative mt-2 mb-1">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <i class="fa-solid fa-lock" style="color: #4b5563;"></i>
                            </div>
                            <input type="text" id="password" name="" class="w-full bg-transparent border-2 border-gray-600 font-sans text-gray-600 text-base rounded-xl focus:ring-2 focus:ring-leaf focus:border-leaf focus:outline-none ps-10 p-2.5" placeholder="Enter your password">
                        </div>
                    </div>

                    <div class="mb-12">
                        <label for="password" class="text-lg font-sans font-bold">Confirm Password</label>
                        <div class="relative mt-2 mb-1">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <i class="fa-solid fa-lock" style="color: #4b5563;"></i>
                            </div>
                            <input type="text" id="password" name="" class="w-full bg-transparent border-2 border-gray-600 font-sans text-gray-600 text-base rounded-xl focus:ring-2 focus:ring-leaf focus:border-leaf focus:outline-none ps-10 p-2.5" placeholder="Repeat your password">
                        </div>
                    </div>
                </div>


                <div>
                    <button type="submit" class="w-full p-2.5 bg-leaf font-sans font-bold text-base text-white rounded-xl">
                        Sign In
                    </button>
                </div>
            </form>

            <div class="self-center">
                <a href="{{ url('/') }}" class="font-sans font-normal text-base">Already have an account? <span class="text-blue-700">Sign In!</span></a>
            </div>
        </div>

        <!-- Copyright notice positioned at the bottom -->
        <p class="self-center font-sans text-base text-gray-400 mb-4">&copy; 2023 CakeScript</p>
    </div>
</div>
@endsection