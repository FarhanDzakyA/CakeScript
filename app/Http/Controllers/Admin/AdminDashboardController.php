<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Menu;
use App\Models\User;
use App\Models\Orders;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    public function index() {
        $thisMonth = Carbon::now()->month;
        $thisYear = Carbon::now()->year;

        $title = 'Dashboard';
        $menuCount = Menu::count();
        $orderCount = Orders::whereMonth('created_at', $thisMonth)
                            ->whereYear('created_at', $thisYear)
                            ->count();
        $income = Orders::whereMonth('created_at', $thisMonth)
                        ->whereYear('created_at', $thisYear)
                        ->sum('total_amount');
        $userCount = User::where('role', 'User')
                        ->count();
        $recentMenu = Menu::with(['category'])
                        ->latest()
                        ->limit(5)
                        ->get();
        $recentOrder = Orders::with(['details.menu', 'user'])
                            ->latest()
                            ->limit(5)
                            ->get();

        return view('admin.dashboard', compact('title', 'menuCount', 'orderCount', 'income', 'userCount', 'recentMenu', 'recentOrder'));
    }
}
