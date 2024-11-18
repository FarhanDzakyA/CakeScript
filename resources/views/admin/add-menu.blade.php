@extends('layouts.admin-app')

@section('content')
<div class="container mx-auto mt-10 mb-10">
    <div class="flex justify-center">
        <div class="w-full max-w-3xl">
            <div class="bg-white shadow-lg rounded-lg">
                <div class="p-6">
                    <form action="{{ route('admin.menu-store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Nama Menu -->
                        <div class="mb-4">
                            <label class="block text-sm font-bold text-gray-700 mb-2">NAMA MENU</label>
                            <input type="text" class="block w-full px-3 py-2 border rounded-lg focus:ring-leaf focus:border-leaf @error('menu_name') border-red-500 @enderror" name="menu_name" value="{{ old('menu_name') }}" placeholder="Masukkan Nama Menu">
                            @error('menu_name')
                                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Kategori -->
                        <div class="mb-4">
                            <label class="block text-sm font-bold text-gray-700 mb-2">KATEGORI</label>
                            <select name="id_category" id="" class="block w-full px-3 py-2 border rounded-lg focus:ring-leaf focus:border-leaf @error('id_category') border-red-500 @enderror">
                                <option value="" selected disabled>-- Pilih Kategori --</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id_category }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                            @error('id_category')
                                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Deskripsi -->
                        <div class="mb-4">
                            <label class="block text-sm font-bold text-gray-700 mb-2">DESKRIPSI</label>
                            <textarea class="block w-full px-3 py-2 border rounded-lg focus:ring-leaf focus:border-leaf @error('menu_description') border-red-500 @enderror" name="menu_description" rows="5" placeholder="Masukkan Deskripsi Menu">{{ old('menu_description') }}</textarea>
                            @error('menu_description')
                                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Harga -->
                        <div class="mb-4">
                            <label class="block text-sm font-bold text-gray-700 mb-2">HARGA</label>
                            <input type="number" class="block w-full px-3 py-2 border rounded-lg focus:ring-leaf focus:border-leaf @error('menu_price') border-red-500 @enderror" name="menu_price" value="{{ old('menu_price') }}" placeholder="Masukkan Harga Menu">
                            @error('menu_price')
                                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Gambar -->
                        <div class="mb-4">
                            <label class="block text-sm font-bold text-gray-700 mb-2">GAMBAR</label>
                            <input type="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-leaf focus:border-leaf @error('photo_url') border-red-500 @enderror" name="photo_url">
                            @error('photo_url')
                                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between">
                            <button type="submit" class="px-4 py-2 bg-leaf text-white rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-1">SIMPAN</button>
                            <button type="reset" class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-offset-1">RESET</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection