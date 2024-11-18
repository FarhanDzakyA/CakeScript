@extends('layouts.admin-app')

@section('content')
<div class="container mx-auto mt-10">
    <div class="max-w-4xl mx-auto">
        <h3 class="text-2xl font-bold text-center mb-6">Data Menu</h3>
        <hr class="mb-4">
        <div class="bg-white shadow-md rounded-lg p-6">
            <a href="{{ url('admin/menu/add') }}" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded mb-4 inline-flex items-center">
                <i class="fas fa-plus mr-2"></i> TAMBAH MENU
            </a>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr class="text-center bg-gray-100">
                            <th class="py-3 px-4 border">GAMBAR</th>
                            <th class="py-3 px-4 border">NAMA</th>
                            <th class="py-3 px-4 border">DESKRIPSI</th>
                            <th class="py-3 px-4 border">HARGA</th>
                            <th class="py-3 px-4 border">STOK</th>
                            <th class="py-3 px-4 border">KATEGORI</th>
                            <th class="py-3 px-4 border">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($menus as $menu)
                            <tr class="text-center">
                                <td class="py-3 px-4 border">
                                    <img src="{{ asset('storage/uploads/' . $menu->photo_url) }}" alt="Gambar Menu" class="w-20 h-auto mx-auto rounded">
                                </td>
                                <td class="py-3 px-4 border">{{ $menu->menu_name }}</td>
                                <td class="py-3 px-4 border">{{ $menu->menu_description }}</td>
                                <td class="py-3 px-4 border">{{ number_format($menu->menu_price, 2) }}</td>
                                <td class="py-3 px-4 border">{{ $menu->stok }}</td>
                                <td class="py-3 px-4 border">{{ $menu->id_category }}</td>
                                <td class="py-3 px-4 border">
                                    <a href="" class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-1 px-2 rounded inline-flex items-center">
                                        <i class="fas fa-receipt mr-1"></i> SHOW
                                    </a>
                                    <a href="{{ route('admin.edit', $menu->id_menu) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-2 rounded inline-flex items-center">
                                        <i class="fas fa-edit mr-1"></i> EDIT
                                    </a>
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('admin.destroy', $menu->id_menu) }}" method="POST" class="inline-flex space-x-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-2 rounded inline-flex items-center">
                                            <i class="fas fa-trash mr-1"></i> HAPUS
                                        </button>
                                    </form>
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
                {{ $menus->links() }}
            </div>
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