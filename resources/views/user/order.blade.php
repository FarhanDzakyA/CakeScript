@extends('layouts.app')

@section('content')
<div class="bg-gray-100 min-h-[calc(100vh-64px-220px)] py-12 px-32">
    <div data-aos="fade-up">
        <p class="font-bold text-6xl text-center text-brown mb-6">Order History</p>
        <p class="text-center mb-8">Welcome to your Order History page, where you can track and relive the moments of joy brought by CakeScript. Whether it's a classic indulgence or an adventurous flavor, your orders tell a story of satisfaction and celebration.</p>
    </div>

    <div class="bg-white rounded-lg shadow-md border border-gray-300 p-8" data-aos="zoom-in">
        <div>
            <table class="table-fixed w-full overflow-x-auto">
                <thead>
                    <tr class="bg-leaf text-white">
                        <th class="py-2 px-4 text-start rounded-tl-lg">Pesanan</th>
                        <th class="py-2 px-4 text-start">Harga</th>
                        <th class="py-2 px-4 text-center">Status</th>
                        <th class="py-2 px-4 text-start">Waktu</th>
                        <th class="py-2 text-center rounded-tr-lg">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                        @forelse($orders as $order)
                            <tr>
                                <td class="py-4 px-4 border-b border-gray-200">
                                    @foreach($order->details as $detail)
                                        <p class="font-medium">{{ $detail->menu->menu_name }} (x{{ $detail->quantity }})</p>
                                    @endforeach
                                </td>

                                <td class="py-4 px-4 border-b border-gray-200"> 
                                    <p class="font-medium">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</p>
                                </td>

                                <td class="py-4 px-4 border-b border-gray-200 text-center">
                                    @if($order->status === 'pending')
                                        <p class="text-white font-medium capitalize py-1.5 px-4 bg-yellow-500 rounded-full inline">{{ $order->status }}</p>
                                    @else    
                                        <p class="text-white font-medium capitalize py-1.5 px-4 bg-green-600 rounded-full inline">{{ $order->status }}</p>
                                    @endif
                                </td>

                                <td class="py-4 px-4 border-b border-gray-200">
                                    <p class="font-medium">{{ \Carbon\Carbon::parse($order->created_at)->translatedFormat('H:i - l, d M Y') }}</p>
                                </td>

                                <td class="py-4 border-b border-gray-200">
                                    @if($order->status === 'pending')
                                        <div class="flex justify-center gap-x-3">
                                            <form id="delete-form-{{ $order->id }}" action="{{ route('cancel.order', $order->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" onclick="confirmDelete({{ $order->id }})" class="py-1.5 px-4 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700">
                                                    Cancel
                                                </button>
                                            </form>
                                            <button type="button" data-snap-token="{{ $order->snap_token }}" data-id="{{ $order->id }}" class="pay-button bg-green-600 py-1.5 px-4 text-white font-semibold rounded-lg hover:bg-green-700">Bayar</button>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="pt-10 text-black text-center font-semibold text-xl">Anda tidak memiliki riwayat transaksi</td>
                            </tr>
                        @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    <script type="text/javascript">
        document.querySelectorAll('.pay-button').forEach(button => {
            button.addEventListener('click', function() {
                // Ambil snapToken dari atribut data-snap-token
                const snapToken = this.getAttribute('data-snap-token');
                const orderId = this.getAttribute('data-id');
                
                // Panggil Midtrans Snap API dengan snapToken yang sesuai
                snap.pay(snapToken, {
                    onSuccess: function(result) {
                        // Optional: Handle success response
                        console.log('Payment Success:', result);
                        window.location.href = "{{ route('payment.success', ['id' => '__orderId__']) }}".replace('__orderId__', orderId);
                    },
                    onPending: function(result) {
                        // Optional: Handle pending response
                        console.log('Payment Pending:', result);
                    },
                    onError: function(result) {
                        // Optional: Handle error response
                        console.log('Payment Error:', result);
                    }
                });
            });
        });
    </script>
    @if(session()->has('success'))
        <script>
            console.log("SweetAlert akan ditampilkan");
            Swal.fire({
                title: "Pesanan Telah Dibuat",
                text: "Mohon lanjutkan proses pembayaran!",
                icon: "success"
            });
        </script>
    @elseif(session()->has('payment-success'))
        <script>
            console.log("SweetAlert akan ditampilkan");
            Swal.fire({
                title: "Pesanan Berhasil Dibayar",
                text: "Pesanan akan diproses oleh tim kami!",
                icon: "success"
            });
        </script>
    @elseif(session()->has('cancel-success'))
        <script>
            console.log("SweetAlert akan ditampilkan");
            Swal.fire({
                title: "Pesanan Berhasil Dibatalkan",
                text: "Kami telah membatalkan pesanan Anda. Terima kasih telah menggunakan layanan kami.",
                icon: "success"
            });
        </script>
    @endif
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
                    document.getElementById(`delete-form-${id}`).submit();
                }
            });
        }
    </script>
@endsection