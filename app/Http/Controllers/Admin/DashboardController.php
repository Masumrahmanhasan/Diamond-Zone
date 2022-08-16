<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $category = Category::count();
        $order = Order::count();
        $product = Product::with('category')->get();

        return view('admin.dashboard', compact('category', 'order', 'product'));
    }
}
