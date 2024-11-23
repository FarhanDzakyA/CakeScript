@extends('layouts.admin-app')

@section('breadcrumbs')
<span class="text-xl font-bold text-black">Menu</span>
@endsection

@php
    $startingNumber = ($menus->currentPage() - 1) * $menus->perPage();
@endphp

@section('content')
<div class="py-2 px-4">
    <h3 class="text-3xl font-bold text-center text-brown mb-6">Data Menu</h3>
    <div class="bg-white shadow-md rounded-lg p-6">
        <div class="flex justify-end">
            <a href="{{ route('admin.menu-add') }}" class="bg-leaf hover:bg-darkleaf text-white font-semibold py-2 px-4 rounded-md mb-4 inline-flex items-center">
                <i class="fas fa-plus mr-2"></i> TAMBAH MENU
            </a>    
        </div>
        <div>
            <table class="table-fixed overflow-x-auto w-full mb-4">
                <thead>
                    <tr class="bg-leaf text-white">
                        <th class="py-3 px-4 rounded-tl-md w-16">No</th>
                        <th class="py-3 px-4 text-start w-1/6">Nama</th>
                        <th class="py-3 px-4 text-start w-[30%]">Deskripsi</th>
                        <th class="py-3 px-4 w-28">Harga</th>
                        <th class="py-3 px-4 w-28">Kategori</th>
                        <th class="py-3 px-4 w-28">Gambar</th>
                        <th class="py-3 px-4 rounded-tr-md w-32">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($menus as $menu)
                        <tr class="odd:bg-gray-50 even:bg-gray-200">
                            <td class="py-3 px-4 text-center">{{ $startingNumber + $loop->iteration }}</td>
                            <td class="py-3 px-4 text-start">{{ $menu->menu_name }}</td>
                            <td class="py-3 px-4 text-justify">{{ $menu->menu_description }}</td>
                            <td class="py-3 px-4 text-center">Rp {{ number_format($menu->menu_price, 0 , ',', '.') }}</td>
                            <td class="py-3 px-4 text-center">{{ $menu->category->category_name }}</td>
                            <td class="py-3 px-4">
                                <img src="{{ asset('storage/uploads/' . $menu->photo_url) }}" alt="Gambar Menu" class="w-20 h-auto mx-auto rounded">
                            </td>
                            <td class="py-3 px-4">
                                <div class="flex justify-center items-center gap-x-2">
                                    <a href="{{ route('admin.menu-edit', $menu->id_menu) }}" class="w-8 h-8 flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white rounded-full">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('admin.menu-destroy', $menu->id_menu) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-8 h-8 flex items-center justify-center bg-red-600 hover:bg-red-700 text-white rounded-full">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-red-600 font-semibold">
                                Data Menu belum tersedia.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $menus->onEachSide(1)->links('vendor.pagination.tailwind') }}
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    @if(session()->has('success'))
        toastr.success('{{ session('success') }}', 'BERHASIL!'); 
    @elseif(session()->has('error'))
        toastr.error('{{ session('error') }}', 'GAGAL!'); 
    @endif
</script>
@endsection