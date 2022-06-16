<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('theme.user.dashboard');
    }

    public function orders()
    {

        $orders = Order::where('user_id', auth()->user()->id)->get();
        return view('theme.user.orders', compact('orders'));
    }
}
