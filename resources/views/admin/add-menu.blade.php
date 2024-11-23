@extends('layouts.admin-app')

@section('breadcrumbs')
<a href="{{ route('admin.menu') }}" class="text-xl font-bold text-black hover:text-blue-600">Menu</a>
<span class="text-xl font-bold text-black select-none">></span>
<span class="text-xl font-bold text-black">Tambah Menu</span>
@endsection

@section('content')
<div class="py-2 px-4">
    <h3 class="text-3xl font-bold text-center text-brown mb-6">Tambah Menu</h3>
    <div class="bg-white shadow-lg rounded-lg">
        <div class="p-6">
            <form action="{{ route('admin.menu-store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Nama Menu -->
                <div class="mb-4">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Nama Menu</label>
                    <input type="text" class="block w-full px-3 py-2 border border-gray-400 rounded-lg focus:ring-1 focus:ring-leaf focus:border-2 focus:border-leaf focus:outline-none placeholder:text-slate-400 @error('menu_name') border-red-500 @enderror" name="menu_name" value="{{ old('menu_name') }}" placeholder="Masukkan Nama Menu">
                    @error('menu_name')
                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Kategori -->
                <div class="mb-4">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Kategori</label>
                    <select name="id_category" id="" class="block w-full px-3 py-2 border border-gray-400 rounded-lg focus:ring-1 focus:ring-leaf focus:border-2 focus:border-leaf focus:outline-none placeholder:text-slate-400 @error('id_category') border-red-500 @enderror">
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
                    <label class="block text-sm font-bold text-gray-700 mb-2">Deskripsi</label>
                    <textarea class="block w-full px-3 py-2 border border-gray-400 rounded-lg focus:ring-1 focus:ring-leaf focus:border-2 focus:border-leaf focus:outline-none placeholder:text-slate-400 @error('menu_description') border-red-500 @enderror" name="menu_description" rows="5" placeholder="Masukkan Deskripsi Menu">{{ old('menu_description') }}</textarea>
                    @error('menu_description')
                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Harga -->
                <div class="mb-4">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Harga</label>
                    <input type="number" class="block w-full px-3 py-2 border border-gray-400 rounded-lg focus:ring-1 focus:ring-leaf focus:border-2 focus:border-leaf focus:outline-none placeholder:text-slate-400 @error('menu_price') border-red-500 @enderror" name="menu_price" value="{{ old('menu_price') }}" placeholder="Masukkan Harga Menu">
                    @error('menu_price')
                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Gambar -->
                <div class="mb-8">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Gambar</label>
                    <input type="file" class="block w-full text-slate-400 border border-gray-400 rounded-lg focus:ring-1 focus:ring-leaf focus:border-2 focus:border-leaf focus:outline-none focus:text-black file:px-3 file:py-2 file:border-0 file:bg-leaf file:text-white file:font-semibold file:mr-3 @error('photo_url') border-red-500 @enderror" name="photo_url">
                    @if($errors->has('photo_url'))
                        <div class="text-red-500 text-sm mt-2">{{ $errors->first('photo_url') }}</div>
                    @else
                        <div class="text-black text-sm mt-2">Format: JPEG, JPG, atau PNG (Maks: 2 MB). Gunakan rasio 1:1 untuk hasil optimal.</div>
                    @endif
                </div>

                <div class="flex items-center justify-between">
                    <a href="{{ route('admin.menu') }}" class="px-4 py-2 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700">Batal</a>
                    <div class="flex items-center gap-x-3">
                        <button type="reset" class="px-4 py-2 bg-yellow-500 text-white font-semibold rounded-lg hover:bg-yellow-600">Reset</button>
                        <button type="submit" class="px-4 py-2 bg-leaf text-white font-semibold rounded-lg hover:bg-darkleaf">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection