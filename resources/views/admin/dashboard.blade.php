@extends('layouts.admin-app')

@section('breadcrumbs')
<span class="text-xl font-bold text-leaf">Dashboard</span>
@endsection


@section('content')
<div>
    <!-- Card Section -->
    <div class="grid grid-cols-4 gap-6 p-6 bg-gray-100">
        <!-- Card 1 -->
        <div class="bg-white shadow rounded-lg p-4 flex justify-between items-center transform transition-transform duration-200 hover:scale-105 hover:shadow-lg">
            <div>
                <h2 class="text-sm font-medium text-red-500">MENU</h2>
                <p class="text-2xl font-bold text-gray-900">{{ $menuCount }}</p>
            </div>
            <i class="fa-solid fa-utensils text-red-500 fa-2x"></i>
        </div>

        <!-- Card 2 -->
        <div class="bg-white shadow rounded-lg p-4 flex justify-between items-center transform transition-transform duration-200 hover:scale-105 hover:shadow-lg">
            <div>
                <h2 class="text-sm font-medium text-teal-500 uppercase">TRANSACTION ({{ date('F') }})</h2>
                <p class="text-2xl font-bold text-gray-900">{{ $orderCount }}</p>
            </div>
            <i class="fa-solid fa-receipt text-teal-500 fa-2x"></i>
        </div>

        <!-- Card 3 -->
        <div class="bg-white shadow rounded-lg p-4 flex justify-between items-center transform transition-transform duration-200 hover:scale-105 hover:shadow-lg">
            <div>
                <h2 class="text-sm font-medium text-blue-600 uppercase">INCOME ({{ date('F') }})</h2>
                <p class="text-2xl font-bold text-gray-900">Rp {{ number_format($income, 0 , ',', '.') }}</p>
            </div>
            <i class="fa-solid fa-money-bill-wave text-blue-600 fa-2x"></i>
        </div>


        <!-- Card 4 -->
        <div class="bg-white shadow rounded-lg p-4 flex justify-between items-center transform transition-transform duration-200 hover:scale-105 hover:shadow-lg">
            <div>
                <h2 class="text-sm font-medium text-yellow-500">USER</h2>
                <p class="text-2xl font-bold text-gray-900">{{ $userCount }}</p>
            </div>
            <i class="fa-solid fa-users text-yellow-500 fa-2x"></i>
        </div>
    </div>
    <!-- End of Card Section -->

    <!-- Tabel Section -->
    <div class="grid grid-cols-2 gap-6 p-6 bg-gray-100">
        <!-- Tabel 1 -->
        <div class="bg-white shadow rounded-lg p-2">
            <h2 class="text-xl font-bold mb-2 text-center text-leaf">Recent Menu</h2>
            <div class="flex justify-end">
                <a href="{{ route('admin.menu') }}" class="bg-leaf hover:bg-darkleaf text-white font-semibold text-xs py-2 px-4 rounded-md mb-4 inline-flex items-center">
                    See More <i class="fa-solid fa-angle-right text-xs ml-1"></i>
                </a>
            </div>
            <table class="table-auto overflow-x-auto w-full mb-4">
                <thead>
                    <tr class="bg-leaf text-white">
                        <th class="py-3 px-4 rounded-tl-md w-16">No</th>
                        <th class="py-3 px-4 text-start w-1/6">Name</th>
                        <th class="py-3 px-4 w-28">Price</th>
                        <th class="py-3 px-4 w-28">Image</th>
                        <th class="py-3 px-4 rounded-tr-md w-32">Category</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentMenu as $item)
                        <tr class="odd:bg-gray-50 even:bg-gray-200">
                            <td class="py-3 px-4 text-center">{{ $loop->iteration }}</td>
                            <td class="py-3 px-4">{{ $item->menu_name }}</td>
                            <td class="py-3 px-4 text-center">Rp {{ number_format($item->menu_price, 0, ',', '.') }}</td>
                            <td class="py-3 px-4">
                                <img src="{{ asset('storage/uploads/' . $item->photo_url) }}" alt="Menu Image" class="w-20 h-auto mx-auto rounded">
                            </td>
                            <td class="py-3 px-4 text-center">{{ $item->category->category_name }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-red-600 font-semibold">
                                Menu is not available yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Tabel 2 -->
        <div class="bg-white shadow rounded-lg p-2">
            <h2 class="text-xl font-bold mb-2 text-center text-leaf">Recent Transactions</h2>
            <div class="flex justify-end">
                <a href="{{ route('admin.transactions') }}" class="bg-leaf hover:bg-darkleaf text-white font-semibold text-xs py-2 px-4 rounded-md mb-4 inline-flex items-center">
                    See More <i class="fa-solid fa-angle-right text-xs ml-1"></i>
                </a>
            </div>
            <table class="table-auto overflow-x-auto w-full mb-4">
                <thead>
                    <tr class="bg-leaf text-white">
                        <th class="py-3 px-4 text-start rounded-tl-md">Name</th>
                        <th class="py-3 px-4 text-start">Order</th>
                        <th class="py-3 px-4">Total Amount</th>
                        <th class="py-3 px-4 rounded-tr-md">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentOrder as $item)
                        <tr class="odd:bg-gray-50 even:bg-gray-200">
                            <td class="py-3 px-4 start-start">{{ $item->user->nama }}</td>
                            <td class="py-3 px-4 text-start">
                                @foreach($item->details as $detail)
                                    <p>{{ $detail->menu->menu_name }} (x{{ $detail->quantity }})</p>
                                @endforeach
                            </td>
                            <td class="py-3 px-4 text-center">Rp {{ number_format($item->total_amount, 0, ',', '.') }}</td>
                            <td class="py-3 px-4 text-center">
                                @if($item->status === 'pending')
                                    <p class="text-white font-medium capitalize py-1.5 px-4 bg-yellow-500 rounded-full inline">{{ $item->status }}</p>
                                @else    
                                    <p class="text-white font-medium capitalize py-1.5 px-4 bg-green-600 rounded-full inline">{{ $item->status }}</p>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-red-600 font-semibold">
                                Menu is not available yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection