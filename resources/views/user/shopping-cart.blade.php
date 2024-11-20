@extends('layouts.app')

@section('content')
<div class="bg-gray-100 min-h-[calc(100vh-64px-220px)] py-12 px-32">
    <div class="w-full flex justify-between items-center mb-8">
        <p class="text-xl font-bold">Shopping Cart</p>
        <a href="{{ route('menu') }}" class="flex items-center text-leaf gap-x-2">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <path fill="#105341" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/>
            </svg>   
            Back To Shop
        </a>
    </div>

    <div class="grid grid-cols-3 gap-x-12">
        <div class="col-span-2 bg-white rounded-lg shadow-md border border-gray-300 p-4 cart-list">
            
        </div>

        <!-- Detail Orders -->
        <form action="{{ route('checkout') }}" method="POST" id="checkout-form">
            @csrf

            <input type="hidden" name="cartData" id="cartData">


            <div class="h-custome bg-white rounded-lg shadow-md border border-gray-300 p-8 divide-y-2 divide-black">
                <div>
                    <h3 class="text-center text-xl font-bold mb-6">Order Summary</h3>
                    <div class="flex justify-between items-start gap-x-4 mb-2">
                        <p class="text-lg font-bold">Nama:</p>
                        <p class="text-lg text-end font-semibold">{{ auth()->user()->nama }}</p>
                    </div>
                    <div class="flex justify-between items-start gap-x-4 mb-2">
                        <p class="text-lg font-bold">No Telp:</p>
                        <p class="text-lg text-end font-semibold">{{ auth()->user()->no_hp }}</p>
                    </div>
                    <div class="flex justify-between items-start gap-x-4 mb-2">
                        <p class="text-lg font-bold">Alamat:</p>
                        <p class="text-lg text-end font-semibold">{{ auth()->user()->alamat }}</p>
                    </div>
                </div>
                <div class="pt-2">
                    <div class="flex justify-between items-start gap-x-4 mb-5">
                        <p class="text-lg font-bold">Total:</p>
                        <p id="total-price" class="text-lg text-end font-semibold">Rp 0</p>
                    </div>
                    <button type="submit" id="order-button" class="w-full py-2 bg-leaf text-white font-semibold rounded-md hover:bg-darkleaf disabled:cursor-no-drop" disabled>
                        Pesan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection