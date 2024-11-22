<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Orders;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function indexHome() {
        $title = 'Home';
        $top_product = Menu::withSum('orderDetails as total_quantity_sold', 'quantity')
            ->orderBy('total_quantity_sold', 'desc')
            ->take(5)
            ->get();
    
        return view('user.home', compact('title', 'top_product'));
    }

    public function indexMenu() {
        $title = 'Menu';
        $all_menu = Menu::orderBy('menu_name', 'asc')->get();
        $bread_menu = Menu::where('id_category', 1)->orderBy('menu_name', 'asc')->get();
        $cake_menu = Menu::where('id_category', 2)->orderBy('menu_name', 'asc')->get();
        $donuts_menu = Menu::where('id_category', 3)->orderBy('menu_name', 'asc')->get();
        $pastry_menu = Menu::where('id_category', 4)->orderBy('menu_name', 'asc')->get();
    
        return view('user.menu', compact('title', 'all_menu', 'bread_menu', 'cake_menu', 'donuts_menu', 'pastry_menu'));
    }

    public function indexAbout() {
        $data = [
            'title' => "About Us",
        ];
    
        return view('user.about-us', $data);
    }

    public function indexContact() {
        $data = [
            'title' => "Contact",
        ];
        
        return view('user.contact', $data);
    }

    public function indexCart() {
        $title = 'Shopping Cart';

        return view('user.shopping-cart', compact('title'));
    }

    public function indexOrder() {
        $title = 'Order History';
        $orders = Orders::with(['details.menu'])
            ->where('id_user', Auth::id())
            ->orderByRaw("CASE WHEN `status` = 'pending' THEN 1 ELSE 2 END")
            ->orderBy('created_at', 'desc')
            ->get();

        return view('user.order', compact('title', 'orders'));
    }

    public function checkoutProcess(Request $request) {
        $cartData = json_decode($request->cartData, true);

        if(empty($cartData)) {
            return redirect()->back()->with('error', 'Keranjang Kosong!');
        }

        $totalAmount = 0;
        foreach($cartData as $item) {
            $totalAmount += $item['price'] * $item['quantity'];
        }

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $totalAmount,
            ),
            'customer_details' => array(
                'first_name' => Auth::user()->nama,
                'phone' => Auth::user()->no_hp,
                'shipping_address' => Auth::user()->alamat,
            ),
            'items' => $cartData,
        );
        
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $order = Orders::create([
            'id_user' => Auth::id(),
            'total_amount' => $totalAmount,
            'status' => 'pending',
            'snap_token' => $snapToken
        ]);

        foreach($cartData as $item) {
            OrderDetail::create([
                'id_order' => $order->id,
                'id_product' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['price']
            ]);
        }

        return redirect()->route('orders')->with('success', 'Pesanan Berhasil Dibuat');
    }

    public function paymentSuccess($id) {
        $order = Orders::findOrFail($id);

        $order->status = 'processed';
        $order->save();

        return redirect()->route('orders')->with('payment-success', 'Pesanan Berhasil Dibayar');
    }
    
    public function cancelOrder($id) {
        $order = Orders::findOrFail($id);
        $order->delete();

        return redirect()->route('orders')->with('cancel-success', 'Pesanan Berhasil Dibatalkan');
    }
}
