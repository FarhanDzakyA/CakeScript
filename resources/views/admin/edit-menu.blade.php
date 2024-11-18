@extends('layouts.admin-app')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <form action="{{ route('admin.update', $menu->id_menu) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-6">
                            <label class="font-semibold text-lg">NAMA</label>
                            <input type="text" class="form-input mt-2 w-full @error('menu_name') border-red-500 @enderror" name="menu_name" value="{{ old('menu_name', $menu->menu_name) }}" placeholder="Masukkan Nama Menu">
                            @error('menu_name')
                                <div class="text-red-500 text-sm mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label class="font-semibold text-lg">KATEGORI</label>
                            <select name="id_category" id="" class="block w-full px-3 py-2 border rounded-lg focus:ring-leaf focus:border-leaf @error('id_category') border-red-500 @enderror">
                                <option value="" selected disabled>-- Pilih Kategori --</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id_category }}" {{ $category->id_category == $menu->id_category ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                            @error('id_category')
                                <div class="text-red-500 text-sm mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label class="font-semibold text-lg">DESKRIPSI</label>
                            <textarea class="form-textarea mt-2 w-full @error('menu_description') border-red-500 @enderror" name="menu_description" rows="5" placeholder="Masukkan Deskripsi Menu">{{ old('menu_description', $menu->menu_description) }}</textarea>
                            @error('menu_description')
                                <div class="text-red-500 text-sm mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label class="font-semibold text-lg">HARGA</label>
                            <input type="number" class="form-input mt-2 w-full @error('menu_price') border-red-500 @enderror" name="menu_price" value="{{ old('menu_price', $menu->menu_price) }}" placeholder="Masukkan Harga Menu">
                            @error('menu_price')
                                <div class="text-red-500 text-sm mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label class="font-semibold text-lg">GAMBAR</label>
                            <input type="file" class="form-input mt-2 w-full" name="photo_url">
                            <!-- Tampilkan gambar lama -->
                            <div class="mt-2">
                                <img src="{{ asset('storage/uploads/' . $menu->photo_url) }}" alt="Gambar Menu" width="150">
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <button type="submit" class="btn bg-blue-500 text-white py-2 px-6 rounded hover:bg-blue-600">UPDATE</button>
                            <button type="reset" class="btn bg-yellow-500 text-white py-2 px-6 rounded hover:bg-yellow-600">RESET</button>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection