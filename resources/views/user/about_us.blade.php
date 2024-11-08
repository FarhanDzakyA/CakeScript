@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 text-center lg:text-left">About Us</h1>
    <div class="flex flex-col lg:flex-row items-start gap-12">
        
        <!-- Text Section -->
        <div class="lg:w-1/2 space-y-6">
            <p class="text-gray-700 leading-relaxed">
                Welcome to our cake shop! We are passionate about creating delightful and delicious cakes for all occasions.
                Our team of expert bakers uses only the finest ingredients to ensure quality and taste in every slice.
            </p>
            <h2 class="text-2xl font-semibold text-gray-800">Our Story</h2>
            <p class="text-gray-700 leading-relaxed">
                Founded in 2022, our shop has grown from a small bakery to a beloved local favorite. We pride ourselves on 
                our commitment to excellence and customer satisfaction.
            </p>
            <h2 class="text-2xl font-semibold text-gray-800">Our Mission</h2>
            <p class="text-gray-700 leading-relaxed">
                To create the best cakes in town, with a focus on freshness, flavor, and artistry. Thank you for being part of our journey!
            </p>
        </div>

        <!-- Image Section with refined styling and centering -->
        <div class="flex justify-center items-center lg:w-1/2">
            <img src="{{ asset('img/about.jpg') }}" alt="Menu Image" 
                 class="w-full h-auto max-w-xs lg:max-w-md rounded-lg shadow-lg object-cover transition-transform transform hover:scale-105">
        </div>
    </div>
</div>
@endsection