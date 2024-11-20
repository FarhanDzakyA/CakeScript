@extends('layouts.app')

@section('content')
<div class="bg-gray-100 min-h-[calc(100vh-64px-220px)] py-12 px-32">
    <p class="font-bold text-6xl text-center text-brown mb-6">Order History</p>
    <p class="text-center mb-8">Welcome to your Order History page, where you can track and relive the moments of joy brought by CakeScript. Whether it's a classic indulgence or an adventurous flavor, your orders tell a story of satisfaction and celebration.</p>

    <div class="bg-white rounded-lg shadow-md border border-gray-300 p-8">
        <div>
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th>Pesanan</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Waktu</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                        @forelse($orders as $order)
                            <tr>
                                <td>
                                    @foreach($order->details as $detail)
                                        {{ $detail->menu->menu_name }} (x {{ $detail->quantity }}) <br>
                                    @endforeach
                                </td>

                                <td>{{ $order->total_amount }}</td>

                                <td>{{ $order->status }}</td>

                                <td>{{ $order->created_at }}</td>

                                <td>
                                    <button type="button" data-snap-token="{{ $order->snap_token }}" data-id="{{ $order->id }}" class="pay-button bg-green-500 px-4">Bayar</button>
                                </td>
                            </tr>
                        @empty
                            <p class="text-black text-center font-semibold text-xl">Anda tidak memiliki riwayat transaksi</p>
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
    @endif
@endsection