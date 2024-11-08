@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-4">Contact Us</h1>
    <p class="text-gray-700 mb-6">
        Have any questions or need assistance? Feel free to reach out to us!
    </p>
    <div class="bg-white p-4 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Our Contact Information</h2>
        <p class="text-gray-700 mb-2"><strong>Email:</strong> support@cakeshop.com</p>
        <p class="text-gray-700 mb-2"><strong>Phone:</strong> +1 234 567 890</p>
        <p class="text-gray-700 mb-6"><strong>Address:</strong> 123 Cake Street, Sweet City, SC 12345</p>
        
        <h2 class="text-2xl font-semibold mb-4">Send Us a Message</h2>
        <form action="#" method="post" class="space-y-4">
            <div>
                <label class="block text-gray-700">Your Name</label>
                <input type="text" class="w-full p-2 border rounded-md" placeholder="Enter your name">
            </div>
            <div>
                <label class="block text-gray-700">Your Email</label>
                <input type="email" class="w-full p-2 border rounded-md" placeholder="Enter your email">
            </div>
            <div>
                <label class="block text-gray-700">Your Message</label>
                <textarea class="w-full p-2 border rounded-md" placeholder="Enter your message"></textarea>
            </div>
            <button type="submit" class="px-4 py-2 bg-leaf text-white rounded-md">Send Message</button>
        </form>
    </div>
</div>
@endsection