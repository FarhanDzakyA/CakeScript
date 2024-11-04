@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="grid grid-cols-2 min-h-[calc(100vh-64px)] justify-items-stretch">
    <div class="p-16">
        <div class="flex flex-col h-full justify-center items-start">
            <p class="mb-6 text-brown font-sans text-5xl font-bold">Celebrate Life's Sweet Moments With The<br>Perfect Cake</p>
            <p class="mb-10 text-black font-sans text-base">Boost your productivity and elevate your mood with a delightful treat <br> from our bakery. Whether it's a rich slice of cake or a scrumptious <br> pastry, take a moment to enjoy the most comforting flavors. Because <br> every sweet bite is a step toward a happier day!</p>
            <a href="" class="p-3 bg-leaf w-36 text-center text-white rounded-md">SHOP NOW</a>
        </div>
    </div>

    <div class="flex justify-center items-center"> <!-- Added flex properties to center the image -->
        <img src="{{ asset('img/HeroImage.png') }}" alt="Hero Image" class="w-3/5">
    </div>
</div>
<!-- End of Hero Section -->
@endsection