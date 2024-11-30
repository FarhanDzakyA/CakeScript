@extends('layouts.app')

@section('content')
<div class="bg-gray-100 py-16 px-32">
    <div class="flex flex-col items-center mb-20" data-aos="fade-up">
        <p class="font-bold text-6xl text-brown mb-6">Our Menu</p>
        <p class="w-2/3 text-center">Discover our delightful selection at CakeScript! From classic favorites to innovative flavors, each product is crafted with precision and passion to bring you the finest in the bakery industry. Find the perfect treat to satisfy every craving!</p>
    </div>

    <div data-aos="fade-up">
        <div class="">
            <ul class="flex flex-wrap items-center justify-center gap-x-4 text-sm font-medium text-center mb-10" id="default-tab" data-tabs-toggle="#default-tab-content" data-tabs-active-classes="bg-leaf text-white" data-tabs-inactive-classes="border border-gray-300 text-black hover:bg-leaf hover:text-white hover:border-0" role="tablist">
                <li role="presentation">
                    <button class="inline-block w-32 h-12 rounded-full" id="all-tab" data-tabs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="false">All</button>
                </li>
                <li role="presentation">
                    <button class="inline-block w-32 h-12 rounded-full" id="breads-tab" data-tabs-target="#breads" type="button" role="tab" aria-controls="breads" aria-selected="false">Breads</button>
                </li>
                <li role="presentation">
                    <button class="inline-block w-32 h-12 rounded-full" id="cakes-tab" data-tabs-target="#cakes" type="button" role="tab" aria-controls="cakes" aria-selected="false">Cakes</button>
                </li>
                <li role="presentation">
                    <button class="inline-block w-32 h-12 rounded-full" id="donuts-tab" data-tabs-target="#donuts" type="button" role="tab" aria-controls="donuts" aria-selected="false">Donuts</button>
                </li>
                <li role="presentation">
                    <button class="inline-block w-32 h-12 rounded-full" id="pastrydenish-tab" data-tabs-target="#pastrydenish" type="button" role="tab" aria-controls="pastrydenish" aria-selected="false">Pastry & Denish</button>
                </li>
            </ul>
        </div>

        <div id="default-tab-content">
            <div class="hidden grid grid-cols-4 gap-6" id="all" role="tabpanel" aria-labelledby="all-tab">
                @forelse($all_menu as $menu)
                    <div class="flex flex-col bg-white rounded-lg shadow-lg">
                        <img src="{{ asset('storage/uploads/' . $menu->photo_url) }}" alt="Menu Photo" class="w-full object-cover object-center rounded-t-lg aspect-[1/1]">
                        <div class="flex flex-col items-center justify-start px-4 pb-4 pt-8 rounded-b-lg">
                            <h3 class="text-xl text-center font-bold mb-2">{{ $menu->menu_name }}</h3>
                            <p class="grow text-gray-700 text-center mb-4 h-24">{{ $menu->menu_description }}</p>
                            <div class="flex justify-between items-center w-full">
                                <p class="text-gray-900 font-semibold">Price: Rp {{ number_format($menu->menu_price, 0, ',', '.') }}</p>
                                <button type="button" class="px-8 py-2 bg-leaf text-white font-semibold rounded-lg hover:bg-darkleaf add-to-cart"
                                    data-id="{{ $menu->id_menu }}"
                                    data-name="{{ $menu->menu_name }}"
                                    data-price="{{ $menu->menu_price }}"
                                    data-image="{{ asset('storage/uploads/' . $menu->photo_url) }}">
                                        <i class="fa-solid fa-cart-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="col-span-4 mt-4 text-center text-brown font-semibold text-5xl">Mohon Maaf Menu Belum Tersedia</p>
                @endforelse
            </div>
            <div class="hidden grid grid-cols-4 gap-6" id="breads" role="tabpanel" aria-labelledby="breads-tab">
                @forelse($bread_menu as $menu)
                    <div class="flex flex-col bg-white rounded-lg shadow-lg">
                        <img src="{{ asset('storage/uploads/' . $menu->photo_url) }}" alt="Menu Photo" class="w-full object-cover object-center rounded-t-lg">
                        <div class="flex flex-col items-center justify-start px-4 pb-4 pt-8 rounded-b-lg">
                            <h3 class="text-xl text-center font-bold mb-2">{{ $menu->menu_name }}</h3>
                            <p class="grow text-gray-700 text-center mb-4 h-24">{{ $menu->menu_description }}</p>
                            <div class="flex justify-between items-center w-full">
                                <p class="text-gray-900 font-semibold">Price: Rp {{ number_format($menu->menu_price, 0, ',', '.') }}</p>
                                <button type="button" class="px-8 py-2 bg-leaf text-white font-semibold rounded-lg hover:bg-darkleaf add-to-cart"
                                    data-id="{{ $menu->id_menu }}"
                                    data-name="{{ $menu->menu_name }}"
                                    data-price="{{ $menu->menu_price }}"
                                    data-image="{{ asset('storage/uploads/' . $menu->photo_url) }}">
                                        <i class="fa-solid fa-cart-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="col-span-4 mt-4 text-center text-brown font-semibold text-5xl">Mohon Maaf Menu Belum Tersedia</p>
                @endforelse
            </div>
            <div class="hidden grid grid-cols-4 gap-6" id="cakes" role="tabpanel" aria-labelledby="cakes-tab">
                @forelse($cake_menu as $menu)
                    <div class="flex flex-col bg-white rounded-lg shadow-lg">
                        <img src="{{ asset('storage/uploads/' . $menu->photo_url) }}" alt="Menu Photo" class="w-full object-cover object-center rounded-t-lg">
                        <div class="flex flex-col items-center justify-start px-4 pb-4 pt-8 rounded-b-lg">
                            <h3 class="text-xl text-center font-bold mb-2">{{ $menu->menu_name }}</h3>
                            <p class="grow text-gray-700 text-center mb-4 h-24">{{ $menu->menu_description }}</p>
                            <div class="flex justify-between items-center w-full">
                                <p class="text-gray-900 font-semibold">Price: Rp {{ number_format($menu->menu_price, 0, ',', '.') }}</p>
                                <button type="button" class="px-8 py-2 bg-leaf text-white font-semibold rounded-lg hover:bg-darkleaf add-to-cart"
                                    data-id="{{ $menu->id_menu }}"
                                    data-name="{{ $menu->menu_name }}"
                                    data-price="{{ $menu->menu_price }}"
                                    data-image="{{ asset('storage/uploads/' . $menu->photo_url) }}">
                                        <i class="fa-solid fa-cart-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="col-span-4 mt-4 text-center text-brown font-semibold text-5xl">Mohon Maaf Menu Belum Tersedia</p>
                @endforelse
            </div>
            <div class="hidden grid grid-cols-4 gap-6" id="donuts" role="tabpanel" aria-labelledby="donuts-tab">
                @forelse($donuts_menu as $menu)
                    <div class="flex flex-col bg-white rounded-lg shadow-lg">
                        <img src="{{ asset('storage/uploads/' . $menu->photo_url) }}" alt="Menu Photo" class="w-full object-cover object-center rounded-t-lg">
                        <div class="flex flex-col items-center justify-start px-4 pb-4 pt-8 rounded-b-lg">
                            <h3 class="text-xl text-center font-bold mb-2">{{ $menu->menu_name }}</h3>
                            <p class="grow text-gray-700 text-center mb-4 h-24">{{ $menu->menu_description }}</p>
                            <div class="flex justify-between items-center w-full">
                                <p class="text-gray-900 font-semibold">Price: Rp {{ number_format($menu->menu_price, 0, ',', '.') }}</p>
                                <button type="button" class="px-8 py-2 bg-leaf text-white font-semibold rounded-lg hover:bg-darkleaf add-to-cart"
                                    data-id="{{ $menu->id_menu }}"
                                    data-name="{{ $menu->menu_name }}"
                                    data-price="{{ $menu->menu_price }}"
                                    data-image="{{ asset('storage/uploads/' . $menu->photo_url) }}">
                                        <i class="fa-solid fa-cart-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="col-span-4 mt-4 text-center text-brown font-semibold text-5xl">Mohon Maaf Menu Belum Tersedia</p>
                @endforelse
            </div>
            <div class="hidden grid grid-cols-4 gap-6" id="pastrydenish" role="tabpanel" aria-labelledby="all-tab">
                @forelse($pastry_menu as $menu)
                    <div class="flex flex-col bg-white rounded-lg shadow-lg">
                        <img src="{{ asset('storage/uploads/' . $menu->photo_url) }}" alt="Menu Photo" class="w-full object-cover object-center rounded-t-lg">
                        <div class="flex flex-col items-center justify-start px-4 pb-4 pt-8 rounded-b-lg">
                            <h3 class="text-xl text-center font-bold mb-2">{{ $menu->menu_name }}</h3>
                            <p class="grow text-gray-700 text-center mb-4 h-24">{{ $menu->menu_description }}</p>
                            <div class="flex justify-between items-center w-full">
                                <p class="text-gray-900 font-semibold">Price: Rp {{ number_format($menu->menu_price, 0, ',', '.') }}</p>
                                <button type="button" class="px-8 py-2 bg-leaf text-white font-semibold rounded-lg hover:bg-darkleaf add-to-cart"
                                    data-id="{{ $menu->id_menu }}"
                                    data-name="{{ $menu->menu_name }}"
                                    data-price="{{ $menu->menu_price }}"
                                    data-image="{{ asset('storage/uploads/' . $menu->photo_url) }}">
                                        <i class="fa-solid fa-cart-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="col-span-4 mt-4 text-center text-brown font-semibold text-5xl">Mohon Maaf Menu Belum Tersedia</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection