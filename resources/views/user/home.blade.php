@extends('layouts.app')

@section('content')
<div>
    <!-- Hero Section 1 -->
    <div class="grid grid-cols-2 min-h-[calc(100vh-64px)] justify-items-stretch">
        <div class="p-32" data-aos="fade-right">
            <div class="flex flex-col h-full justify-center items-start">
                <p class="mb-6 text-brown font-sans text-5xl font-bold">Celebrate Life's Sweet Moments With The Perfect Cake</p>
                <p class="mb-10 text-black font-sans text-base">Boost your productivity and elevate your mood with a delightful treat from our bakery. Whether it's a rich slice of cake or a scrumptious pastry, take a moment to enjoy the most comforting flavors. Because every sweet bite is a step toward a happier day!</p>
                <a href="{{ route('menu') }}" class="p-3 bg-leaf w-36 text-center text-white rounded-md">SHOP NOW</a>
            </div>
        </div>
    
        <div class="flex justify-center items-center" data-aos="fade-left">
            <img src="{{ asset('img/HeroImage.png') }}" alt="Hero Image" class="w-3/5">
        </div>
    </div>
    <!-- End of Hero Section 1 -->

    <!-- Categories Section -->
    <div class="py-24 bg-gray-50">
        <h1 class="mb-12 text-center text-5xl font-sans font-bold text-brown" data-aos="fade-up">Our Categories</h1>

        <div class="px-16 w-full">
            <div class="flex justify-between gap gap-x-10" data-aos="fade-up">
                <!-- Bread Category -->
                <div class="flex flex-col items-center justify-center bg-white rounded-lg shadow-lg p-6 w-1/4">
                    <img src="{{ asset('img/bread.png') }}" alt="Bread Icon" class="w-32 h-32 mb-4">
                    <h3 class="text-center text-xl font-bold mb-2">Breads</h3>
                    <p class="text-center text-gray-700 mb-4">Freshly baked with quality ingredients, these treats are soft, flavorful, and perfect for any meal or snack.</p>
                </div>
                <!-- End of Bread Category -->

                <!-- Cake Category -->
                <div class="flex flex-col items-center justify-center bg-white rounded-lg shadow-lg p-6 w-1/4">
                    <img src="{{ asset('img/cake.png') }}" alt="Cake Icon" class="w-32 h-32 mb-4">
                    <h3 class="text-center text-xl font-bold mb-2">Cakes</h3>
                    <p class="text-center text-gray-700 mb-4">Delicious cakes made with the finest ingredients, perfect for any celebration or sweet craving. Each cake is crafted to be moist, flavorful, and visually stunning.</p>
                </div>
                <!-- End of Cake Category -->

                <!-- Donuts Category -->
                <div class="flex flex-col items-center justify-center bg-white rounded-lg shadow-lg p-6 w-1/4">
                    <img src="{{ asset('img/donut.png') }}" alt="Donut Icon" class="w-32 h-32 mb-4">
                    <h3 class="text-center text-xl font-bold mb-2">Donuts</h3>
                    <p class="text-center text-gray-700 mb-4">Freshly made donuts, soft and fluffy, with a variety of sweet glazes and toppings. Perfect for a tasty treat or snack any time of day.</p>
                </div>
                <!-- End of Donuts Category -->

                <!-- Pastry & Denish Category -->
                <div class="flex flex-col items-center justify-center bg-white rounded-lg shadow-lg p-6 w-1/4">
                    <img src="{{ asset('img/pretzel.png') }}" alt="Pastry & Denish Icon" class="w-32 h-32 mb-4">
                    <h3 class="text-center text-xl font-bold mb-2">Pastry & Denish</h3>
                    <p class="text-center text-gray-700 mb-4">Flaky and buttery pastries and danishes, filled with a variety of sweet and savory options. Perfect for a light snack or a delightful breakfast treat.</p>
                </div>
                <!-- End of Pastry & Denis Category -->
            </div>
        </div>
    </div>
    <!-- End of Categories Section -->

    <!-- Hero Section 2 -->
     <div class="grid grid-cols-2 min-h-screen justify-stretch">
        <div class="flex justify-end items-center" data-aos="fade-right">
            <img src="{{ asset('img/HeroImage2.jpg') }}" alt="Hero Image 2" class="w-3/4 rounded-2xl">
        </div>

        <div class="p-32" data-aos="fade-left">
            <div class="flex flex-col h-full justify-center items-start pr-7">
                <p class="mb-5 text-brown font-sans text-5xl font-bold">Fastest Cake Delivery in City</p>
                <p class="mb-12 text-black font-sans text-base">Get your favorite cakes delivered fresh and fast, right to your door. Order now for the quickest delivery in town!</p>
                
                <div class="flex items-center gap-x-5 mb-5">
                    <div class="relative flex items-center justify-center w-8 h-8 bg-leaf rounded-full">
                        <i class="fa-regular fa-clock" style="color: #ffffff;"></i>
                    </div>
                    <p class="font-sans text-base">Deliver Within 30 Minutes</p>
                </div>

                <div class="flex items-center gap-x-5 mb-5">
                    <div class="relative flex items-center justify-center w-8 h-8 bg-leaf rounded-full">
                        <i class="fa-solid fa-tags" style="color: #ffffff;"></i>
                    </div>
                    <p class="font-sans text-base">Best Offers & Prices</p>
                </div>

                <div class="flex items-center gap-x-5">
                    <div class="relative flex items-center justify-center w-8 h-8 bg-leaf rounded-full">
                        <i class="fa-solid fa-bell-concierge" style="color: #ffffff;"></i>
                    </div>
                    <p class="font-sans text-base">Online Service Available</p>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Hero Section 2 -->

    <!-- Categories Section -->
    <div class="py-24 bg-gray-50">
        <h1 class="mb-12 text-center text-5xl font-sans font-bold text-brown" data-aos="fade-up">Our Top Product</h1>

        <div class="px-16 w-full">
            <div class="flex justify-between gap gap-x-10" data-aos="fade-up">
                <!-- Bread Category -->
                <div class="flex flex-col items-start justify-center bg-white rounded-lg shadow-lg p-6 w-1/4">
                    <img src="{{ asset('img/kue.jpg') }}" alt="Bread Icon" class="w-full h-52 mb-4 rounded-md">
                    <h3 class="text-xl font-bold mb-2">Breads</h3>
                    <p class="text-gray-700 mb-4">Freshly baked with quality ingredients, these treats are soft, flavorful, and perfect for any meal or snack.</p>
                    <p class="text-gray-900 font-semibold mb-4">Price: $10.99</p>
                </div>
                <!-- End of Bread Category -->

                <!-- Bread Category -->
                <div class="flex flex-col items-start justify-center bg-white rounded-lg shadow-lg p-6 w-1/4">
                    <img src="{{ asset('img/kue.jpg') }}" alt="Bread Icon" class="w-full h-52 mb-4 rounded-md">
                    <h3 class="text-xl font-bold mb-2">Breads</h3>
                    <p class="text-gray-700 mb-4">Freshly baked with quality ingredients, these treats are soft, flavorful, and perfect for any meal or snack.</p>
                    <p class="text-gray-900 font-semibold mb-4">Price: $10.99</p>
                </div>
                <!-- End of Bread Category -->

                <!-- Bread Category -->
                <div class="flex flex-col items-start justify-center bg-white rounded-lg shadow-lg p-6 w-1/4">
                    <img src="{{ asset('img/kue.jpg') }}" alt="Bread Icon" class="w-full h-52 mb-4 rounded-md">
                    <h3 class="text-xl font-bold mb-2">Breads</h3>
                    <p class="text-gray-700 mb-4">Freshly baked with quality ingredients, these treats are soft, flavorful, and perfect for any meal or snack.</p>
                    <p class="text-gray-900 font-semibold mb-4">Price: $10.99</p>
                </div>
                <!-- End of Bread Category -->

                <!-- Bread Category -->
                <div class="flex flex-col items-start justify-center bg-white rounded-lg shadow-lg p-6 w-1/4">
                    <img src="{{ asset('img/kue.jpg') }}" alt="Bread Icon" class="w-full h-52 mb-4 rounded-md">
                    <h3 class="text-xl font-bold mb-2">Breads</h3>
                    <p class="text-gray-700 mb-4">Freshly baked with quality ingredients, these treats are soft, flavorful, and perfect for any meal or snack.</p>
                    <p class="text-gray-900 font-semibold mb-4">Price: $10.99</p>
                </div>
                <!-- End of Bread Category -->
            </div>
        </div>
    </div>
    <!-- End of Categories Section -->
</div>
@endsection