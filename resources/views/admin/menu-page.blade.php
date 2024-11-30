@extends('layouts.admin-app')

@section('breadcrumbs')
<span class="text-xl font-bold text-leaf">Menu</span>
@endsection

@php
    $startingNumber = ($menus->currentPage() - 1) * $menus->perPage();
@endphp

@section('content')
<div class="py-2 px-4">
    <h3 class="text-3xl font-bold text-center text-leaf mb-6">Menu List</h3>
    <div class="bg-white shadow-md rounded-lg p-6">
        <div class="flex justify-end">
            <a href="{{ route('admin.menu-add') }}" class="bg-leaf hover:bg-darkleaf text-white font-semibold py-2 px-4 rounded-md mb-4 inline-flex items-center">
                <i class="fas fa-plus mr-2"></i> Add Menu
            </a>    
        </div>
        <div>
            <table class="table-fixed overflow-x-auto w-full mb-4">
                <thead>
                    <tr class="bg-leaf text-white">
                        <th class="py-3 px-4 rounded-tl-md w-16">No</th>
                        <th class="py-3 px-4 text-start w-1/6">Name</th>
                        <th class="py-3 px-4 text-start w-[30%]">Description</th>
                        <th class="py-3 px-4 w-28">Price</th>
                        <th class="py-3 px-4 w-28">Category</th>
                        <th class="py-3 px-4 w-28">Image</th>
                        <th class="py-3 px-4 w-28">Availability</th>
                        <th class="py-3 px-4 rounded-tr-md w-40">Action</th>
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
                                <div class="text-center text-3xl">
                                    @if($menu->availability == '1')
                                        <i class="fa-solid fa-circle-check text-green-500 "></i>
                                    @else
                                        <i class="fa-regular fa-circle-xmark text-red-600"></i>
                                    @endif
                                </div>
                            </td>
                            <td class="py-3 px-4">
                                <div class="flex justify-center items-center gap-x-2">
                                    @if($menu->availability == '1')
                                        <form action="{{ route('admin.menu-disable', $menu->id_menu) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="w-8 h-8 flex items-center justify-center bg-yellow-500 hover:bg-yellow-600 text-white rounded-full" title="Disable Menu">
                                                <i class="fa-solid fa-ban"></i>
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('admin.menu-enable', $menu->id_menu) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="w-8 h-8 flex items-center justify-center bg-green-500 hover:bg-green-600 text-white rounded-full" title="Enable Menu">
                                                <i class="fa-solid fa-check"></i>
                                            </button>
                                        </form>
                                    @endif
                                    <a href="{{ route('admin.menu-edit', $menu->id_menu) }}" class="w-8 h-8 flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white rounded-full" title="Edit Menu">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <form id="delete-menu-{{ $menu->id_menu }}" action="{{ route('admin.menu-destroy', $menu->id_menu) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="confirmDelete({{ $menu->id_menu }})" class="w-8 h-8 flex items-center justify-center bg-red-600 hover:bg-red-700 text-white rounded-full" title="Delete Menu">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-red-600 font-semibold">
                                Menu is not available yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $menus->onEachSide(1)->links('vendor.pagination.tailwind') }}
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: "Apakah Anda Yakin?",
                text: "Tindakan ini tidak dapat dibatalkan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#105341",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Hapus!",
                cancelButtonText: "Batal",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`delete-menu-${id}`).submit();
                }
            });
        }
    </script>
    @if(session()->has('add-success'))
        <script>
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr.success("{{ session('add-success') }}");
        </script>
    @elseif(session()->has('edit-success'))
        <script>
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr.success("{{ session('edit-success') }}");
        </script>
    @elseif(session()->has('delete-success'))
        <script>
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr.success("{{ session('delete-success') }}");
        </script>
    @elseif(session()->has('disable-success'))
        <script>
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr.success("{{ session('disable-success') }}");
        </script>
    @elseif(session()->has('enable-success'))
        <script>
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr.success("{{ session('enable-success') }}");
        </script>
    @endif
@endsection