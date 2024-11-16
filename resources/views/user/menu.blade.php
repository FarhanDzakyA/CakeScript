@extends('layouts.app')

@section('content')
<div class="bg-gray-100 py-16 px-32">
    <div class="flex flex-col items-center mb-20" data-aos="fade-up">
        <p class="font-bold text-6xl text-brown mb-6">Our Menu</p>
        <p class="w-2/3 text-center">Discover our delightful selection at CakeScript! From classic favorites to innovative flavors, each product is crafted with precision and passion to bring you the finest in the bakery industry. Find the perfect treat to satisfy every craving!</p>
    </div>

    <div>
        <div class="">
            <ul class="flex flex-wrap items-center justify-center gap-x-4 text-sm font-medium text-center mb-10" id="default-tab" data-tabs-toggle="#default-tab-content" data-tabs-active-classes="bg-leaf text-white" data-tabs-inactive-classes="border border-gray-300 text-black hover:bg-leaf hover:text-white hover:border-0" role="tablist">
                <li role="presentation">
                    <button class="inline-block w-32 h-12 rounded-full" id="all-tab" data-tabs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="false">All</button>
                </li>
                <li role="presentation">
                    <button class="inline-block w-32 h-12 rounded-full" id="breads-tab" data-tabs-target="#breads" type="button" role="tab" aria-controls="breads" aria-selected="false">Breads</button>
                </li>
                <li role="presentation">
                    <button class="inline-block w-32 h-12 rounded-full" id="cakes-tab" data-tabs-target="#cakes" type="button" role="tab" aria-controls="cakes" aria-selected="false">Cakes</button>
                </li>
                <li role="presentation">
                    <button class="inline-block w-32 h-12 rounded-full" id="donuts-tab" data-tabs-target="#donuts" type="button" role="tab" aria-controls="donuts" aria-selected="false">Donuts</button>
                </li>
                <li role="presentation">
                    <button class="inline-block w-32 h-12 rounded-full" id="pastrydenish-tab" data-tabs-target="#pastrydenish" type="button" role="tab" aria-controls="pastrydenish" aria-selected="false">Pastry & Denish</button>
                </li>
            </ul>
        </div>

        <div id="default-tab-content">
            <div class="hidden grid grid-cols-4 gap-6" id="all" role="tabpanel" aria-labelledby="all-tab">
                <p>sdjnjnf</p>
            </div>
            <div class="hidden grid grid-cols-4 gap-6" id="breads" role="tabpanel" aria-labelledby="breads-tab">
                <p>fsf</p>
            </div>
            <div class="hidden grid grid-cols-4 gap-6" id="cakes" role="tabpanel" aria-labelledby="cakes-tab">
                <p>sdsfb</p>
            </div>
            <div class="hidden grid grid-cols-4 gap-6" id="donuts" role="tabpanel" aria-labelledby="donuts-tab">
                <p>sd</p>
            </div>
            <div class="hidden grid grid-cols-4 gap-6" id="pastrydenish" role="tabpanel" aria-labelledby="all-tab">
                <p>sd</p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
<script type="text/javascript">
    @if(isset($snapToken))
        document.getElementById('pay-button').onclick = function(){
            // SnapToken acquired from previous step
            snap.pay('{{ $snapToken }}', {
    onSuccess: function(result) {
        console.log('Success:', result);
        document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
    },
    onPending: function(result) {
        console.log('Pending:', result);
        document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
    },
    onError: function(result) {
        console.error('Error:', result);
        document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
    }
});
        };
    @endif
</script>
@endsection