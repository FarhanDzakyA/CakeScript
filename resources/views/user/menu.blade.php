@extends('layouts.app')

@section('content')
<!-- Menu Items Section -->
<div id="menu-items" class="p-16 bg-gray-100">
    <h2 class="text-3xl font-bold text-brown mb-8 text-center">Our Product</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Menu Item 1 -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <img src="{{ asset('img/coklat.jpg') }}" alt="Cake 1" class="w-full h-48 object-cover rounded-md mb-4">
            <h3 class="text-xl font-bold mb-2">Classic Chocolate Cake</h3>
            <p class="text-gray-700 mb-4">A rich and moist chocolate cake topped with smooth chocolate ganache.</p>
            <p class="text-gray-900 font-semibold mb-4">Price: $10.99</p>
            <a href="#" class="text-leaf font-semibold">Order Now</a>
        </div>
        <!-- Menu Item 2 -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <img src="{{ asset('img/straw.jpg') }}" alt="Cake 2" class="w-full h-48 object-cover rounded-md mb-4">
            <h3 class="text-xl font-bold mb-2">Strawberry Delight</h3>
            <p class="text-gray-700 mb-4">Light and fluffy with layers of fresh strawberries and cream.</p>
            <p class="text-gray-900 font-semibold mb-4">Price: $9.99</p>
            <a href="#" class="text-leaf font-semibold">Order Now</a>
        </div>
         
        <!-- Menu Item 1 -->
<div class="bg-white rounded-lg shadow-lg p-6">
    <img src="{{ asset('img/kue3.jpg') }}" alt="Chocolate Delight" class="w-full h-48 object-cover rounded-md mb-4">
    <h3 class="text-xl font-bold mb-2">Chocolate Delight</h3>
    <p class="text-gray-700 mb-2">Rich, creamy chocolate cake with a touch of hazelnut.</p>
    <p class="text-gray-900 font-semibold mb-4">Price: $12.99</p>
    <a href="#" class="text-leaf font-semibold">Order Now</a>
</div>

<!-- Menu Item 2 -->
<div class="bg-white rounded-lg shadow-lg p-6">
    <img src="{{ asset('img/kue4.jpg') }}" alt="Strawberry Dream" class="w-full h-48 object-cover rounded-md mb-4">
    <h3 class="text-xl font-bold mb-2">Strawberry Dream</h3>
    <p class="text-gray-700 mb-2">Light and fluffy with layers of fresh strawberries and cream.</p>
    <p class="text-gray-900 font-semibold mb-4">Price: $10.99</p>
    <a href="#" class="text-leaf font-semibold">Order Now</a>
</div>

<!-- Menu Item 3 -->
<div class="bg-white rounded-lg shadow-lg p-6">
    <img src="{{ asset('img/kue5.jpg') }}" alt="Classic Vanilla" class="w-full h-48 object-cover rounded-md mb-4">
    <h3 class="text-xl font-bold mb-2">Classic Vanilla</h3>
    <p class="text-gray-700 mb-2">A simple yet elegant vanilla cake with smooth buttercream.</p>
    <p class="text-gray-900 font-semibold mb-4">Price: $9.99</p>
    <a href="#" class="text-leaf font-semibold">Order Now</a>
</div>

<!-- Menu Item 4 -->
<div class="bg-white rounded-lg shadow-lg p-6">
    <img src="{{ asset('img/kue6.jpg') }}" alt="Lemon Twist" class="w-full h-48 object-cover rounded-md mb-4">
    <h3 class="text-xl font-bold mb-2">Lemon Twist</h3>
    <p class="text-gray-700 mb-2">Zesty lemon flavor with a hint of sweetness and light glaze.</p>
    <p class="text-gray-900 font-semibold mb-4">Price: $11.99</p>
    <a href="#" class="text-leaf font-semibold">Order Now</a>
</div>

<!-- Menu Item 5 -->
<div class="bg-white rounded-lg shadow-lg p-6">
    <img src="{{ asset('img/kue7.jpg') }}" alt="Red Velvet Indulgence" class="w-full h-48 object-cover rounded-md mb-4">
    <h3 class="text-xl font-bold mb-2">Red Velvet Indulgence</h3>
    <p class="text-gray-700 mb-2">Moist red velvet with layers of cream cheese frosting.</p>
    <p class="text-gray-900 font-semibold mb-4">Price: $13.99</p>
    <a href="#" class="text-leaf font-semibold">Order Now</a>
</div>

<!-- Menu Item 6 -->
<div class="bg-white rounded-lg shadow-lg p-6">
    <img src="{{ asset('img/kue8.jpg') }}" alt="Caramel Pecan" class="w-full h-48 object-cover rounded-md mb-4">
    <h3 class="text-xl font-bold mb-2">Caramel Pecan</h3>
    <p class="text-gray-700 mb-2">A delightful caramel cake topped with crunchy pecans.</p>
    <p class="text-gray-900 font-semibold mb-4">Price: $14.99</p>
    <a href="#" class="text-leaf font-semibold">Order Now</a>
</div>

<!-- Menu Item 7 -->
<div class="bg-white rounded-lg shadow-lg p-6">
    <img src="{{ asset('img/kue9.jpg') }}" alt="Coffee Crumble" class="w-full h-48 object-cover rounded-md mb-4">
    <h3 class="text-xl font-bold mb-2">Coffee Crumble</h3>
    <p class="text-gray-700 mb-2">For coffee lovers, a perfect blend of coffee and vanilla.</p>
    <p class="text-gray-900 font-semibold mb-4">Price: $12.49</p>
    <a href="#" class="text-leaf font-semibold">Order Now</a>
</div>

        <!-- Add more items as needed -->
    </div>
</div>
<!-- End of Menu Section -->
@endsection