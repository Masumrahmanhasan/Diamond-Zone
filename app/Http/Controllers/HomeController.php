<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {
        return view('home');
    }

    public function getProductByCategory($slug)
    {
        $category = Category::with('products')->where('slug', $slug)->first();

        return view('theme.product_category', compact('category'));
    }

    public function getProductDetailsBySlug($slug)
    {
        $product = Product::with('category', 'subcategory')->where('slug', $slug)->first();

        return view('theme.product_details', compact('product'));
    }

    public function checkout(Request $request)
    {
        $product = Product::with('category')->find($request->id);
        $quantity = $request->quantity;

        $subtotal = 0;
        if($product->discount != 0){
            $subtotal = ($product->price - $product->discount) * $quantity;
        } else {
            $subtotal = ($product->price) * $quantity;
        }

        return view('theme.includes.checkout_modal', compact('product', 'quantity', 'subtotal'));
    }


    public function checkout_done(Request $request)
    {

        $order = new Order;
        $order->user_id = auth()->user()->id;
        $order->order_code = 'DZ-'. mt_rand(10000, 99999);
        $order->quantity = $request->quantity;
        $order->grand_total = $request->total;
        $order->billing_name = $request->name;
        $order->billing_phone = $request->phone;
        $order->billing_email = $request->email;
        $order->billing_address = $request->address;
        $order->save();

        foreach($request->product_id as $item){

            $orderItem = new OrderItem;
            $orderItem->product_id = $item;
            $orderItem->order_id = $order->id;
            $orderItem->save();

        }

        return redirect()->route('user.orders');

    }


}
