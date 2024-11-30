@extends('layouts.admin-app')

@section('breadcrumbs')
<span class="text-xl font-bold text-leaf">Transactions</span>
@endsection

@section('content')
<div class="bg-white p-5 rounded shadow">
    <div class="mb-5">
        <h1 class="text-lg font-semibold">🛒 Sales Transaction Data</h1>
    </div>

    <div class="overflow-x-auto">
        <div class="text-center font-medium text-gray-500 border-b border-gray-300 mb-4">
            <ul class="flex flex-wrap -mb-px" id="default-tab" data-tabs-toggle="#default-tab-content" data-tabs-active-classes="border-b-2 border-leaf text-leaf" data-tabs-inactive-classes="hover:border-b-2 hover:border-leaf hover:text-leaf" role="tablist">
                <li role="presentation" class="me-2">
                    <button class="inline-block p-4" id="process-order" data-tabs-target="#process" type="button" role="tab" aria-controls="process" aria-selected="false">Process</button>
                </li>
                <li role="presentation" class="me-2">
                    <button class="inline-block p-4" id="completed-order" data-tabs-target="#completed" type="button" role="tab" aria-controls="completed" aria-selected="false">Completed</button>
                </li>
            </ul>
        </div>

        <div id="default-tab-content">
            <div class="hidden" id="process" role="tabpanel" aria-labelledby="process-order">
                <table class="min-w-full overflow-x-auto mb-4">
                    <thead>
                        <tr class="bg-leaf text-white">
                            <th class="py-3 px-4 rounded-tl-md w-32 text-start">Name</th>
                            <th class="py-3 px-4 w-40 text-start">Orders</th>
                            <th class="py-3 px-4 w-32">Phone Number</th>
                            <th class="py-3 px-4 text-start">Address</th>
                            <th class="py-3 px-4 w-32">Total Price</th>
                            <th class="py-3 px-4 w-32">Order Time</th>
                            <th class="py-3 px-4 w-28">Status</th>
                            <th class="py-3 px-4 rounded-tr-md">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($processedOrder as $order)
                            <tr class="odd:bg-gray-50 even:bg-gray-200">
                                <td class="py-3 px-4 text-start">{{ $order->user->nama }}</td>
                                <td class="py-3 px-4 text-start">
                                    @foreach($order->details as $detail)
                                        <p>{{ $detail->menu->menu_name }} (x{{ $detail->quantity }})</p>
                                    @endforeach
                                </td>
                                <td class="py-3 px-4 text-center">{{ $order->user->no_hp }}</td>
                                <td class="py-3 px-4 text-start">{{ $order->user->alamat }}</td>
                                <td class="py-3 px-4 text-center">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</td>
                                <td class="py-3 px-4 text-center">{{ \Carbon\Carbon::parse($order->created_at)->translatedFormat('H:i - l, d M Y') }}</td>
                                <td class="py-3 px-4 text-center">
                                    <p class="text-white font-medium capitalize py-1.5 px-4 bg-green-600 rounded-full inline">{{ $order->status }}</p>
                                </td>
                                <td class="py-3 px-4">
                                    <div class="flex justify-center items-center">
                                        @if($order->status == 'processed')
                                            <form id="deliver-order-{{ $order->id }}" action="{{ route('admin.transactions-deliver', $order->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="button" onclick="confirmDeliver({{ $order->id }}, '{{ $order->user->nama }}', '{{ \Carbon\Carbon::parse($order->created_at)->translatedFormat('H:i - l, d M Y') }}')" class="py-1.5 px-4 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">
                                                    Deliver
                                                </button>
                                            </form>
                                        @else
                                            <form id="complete-order-{{ $order->id }}" action="{{ route('admin.transactions-complete', $order->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="button" onclick="confirmComplete({{ $order->id }}, '{{ $order->user->nama }}', '{{ \Carbon\Carbon::parse($order->created_at)->translatedFormat('H:i - l, d M Y') }}')" class="py-1.5 px-4 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">
                                                    Complete
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-4 text-red-600 font-semibold">
                                    There are no orders that need to be processed.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $processedOrder->onEachSide(1)->links('vendor.pagination.tailwind') }}
            </div>
            <div class="hidden" id="completed" role="tabpanel" aria-labelledby="completed-order">
                <table class="min-w-full overflow-x-auto mb-4">
                    <thead>
                        <tr class="bg-leaf text-white">
                            <th class="py-3 px-4 rounded-tl-md w-32 text-start">Name</th>
                            <th class="py-3 px-4 w-40 text-start">Orders</th>
                            <th class="py-3 px-4 w-32">Phone Number</th>
                            <th class="py-3 px-4 text-start">Address</th>
                            <th class="py-3 px-4 w-32">Total Price</th>
                            <th class="py-3 px-4 w-32">Order Time</th>
                            <th class="py-3 px-4 rounded-tr-md w-28">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($completedOrder as $order)
                            <tr class="odd:bg-gray-50 even:bg-gray-200">
                                <td class="py-3 px-4 text-start">{{ $order->user->nama }}</td>
                                <td class="py-3 px-4 text-start">
                                    @foreach($order->details as $detail)
                                        <p>{{ $detail->menu->menu_name }} (x{{ $detail->quantity }})</p>
                                    @endforeach
                                </td>
                                <td class="py-3 px-4 text-center">{{ $order->user->no_hp }}</td>
                                <td class="py-3 px-4 text-start">{{ $order->user->alamat }}</td>
                                <td class="py-3 px-4 text-center">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</td>
                                <td class="py-3 px-4 text-center">{{ \Carbon\Carbon::parse($order->created_at)->translatedFormat('H:i - l, d M Y') }}</td>
                                <td class="py-3 px-4 text-center">
                                    <p class="text-white font-medium capitalize py-1.5 px-4 bg-green-600 rounded-full inline">{{ $order->status }}</p>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4 text-red-600 font-semibold">
                                    There is no corresponding order data.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $completedOrder->onEachSide(1)->links('vendor.pagination.tailwind') }}
            </div>
        </div>

    </div>
</div>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Menyimpan tab aktif saat ini
            let activeTab = localStorage.getItem('activeTab') || '#process'; // Default to 'process' tab

            // Menampilkan tab berdasarkan penyimpanan lokal
            document.querySelector(activeTab).classList.remove('hidden');
            document.querySelector(activeTab + '-order').setAttribute('aria-selected', 'true');

            // Menyimpan tab yang aktif setiap kali pengguna mengklik tab
            document.querySelectorAll('[data-tabs-target]').forEach(tabButton => {
                tabButton.addEventListener('click', function () {
                    localStorage.setItem('activeTab', this.getAttribute('data-tabs-target'));
                });
            });
        });

        function confirmDeliver(id, customerName, formattedTime) {
            Swal.fire({
                title: "Apakah Anda Yakin untuk Mengirim Pesanan ini?",
                text: `Pesanan untuk ${customerName} - Dibuat pada ${formattedTime}. Tindakan ini tidak dapat dibatalkan!`,
                icon: "info",
                showCancelButton: true,
                confirmButtonColor: "#105341",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Kirim!",
                cancelButtonText: "Batal",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`deliver-order-${id}`).submit();
                }
            });
        }

        function confirmComplete(id, customerName, formattedTime) {
            Swal.fire({
                title: "Apakah Anda Yakin untuk Menyelesaikan Pesanan ini?",
                text: `Pesanan untuk ${customerName} - Dibuat pada ${formattedTime}. Tindakan ini tidak dapat dibatalkan!`,
                icon: "info",
                showCancelButton: true,
                confirmButtonColor: "#105341",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya!",
                cancelButtonText: "Batal",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`complete-order-${id}`).submit();
                }
            });
        }
    </script>

    @if(session()->has('deliver-order'))
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
            toastr.success("{{ session('deliver-order') }}");
        </script>
    @elseif(session()->has('completed-order'))
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
            toastr.success("{{ session('completed-order') }}");
        </script>
    @endif
@endsection