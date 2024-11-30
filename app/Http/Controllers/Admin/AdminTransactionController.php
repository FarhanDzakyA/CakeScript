<?php

namespace App\Http\Controllers\Admin;

use App\Models\Orders;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminTransactionController extends Controller
{
    public function index() {
        $title = 'Transactions';
        $processedOrder = Orders::with(['details.menu', 'user'])
                                ->whereNot('status', 'completed')
                                ->latest()
                                ->paginate($perPage = 20, $columns = ['*'], $pageName = 'processed');
        $completedOrder = Orders::with(['details.menu', 'user'])
                                ->where('status', 'completed')
                                ->latest()
                                ->paginate($perPage = 20, $columns = ['*'], $pageName = 'completed');

        return view('admin.transaction-page', compact('title', 'processedOrder', 'completedOrder'));
    }

    public function deliverOrder($id) {
        $order = Orders::findOrFail($id);

        $order->update([
            'status' => 'delivered',
        ]);

        return redirect()->back()->with(['deliver-order' => 'Order is Being Delivered to the Customer']);
    }

    public function completeOrder($id) {
        $order = Orders::findOrFail($id);

        $order->update([
            'status' => 'completed',
        ]);

        return redirect()->back()->with(['completed-order' => 'Order is Completed']);
    }
}
