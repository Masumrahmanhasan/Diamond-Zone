<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Offer;
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

    public function home()
    {

        $combo_offers = Offer::all();
        return view('theme.home', compact('combo_offers'));
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

    public function getOfferDetailsBySlug($slug)
    {

        $offer = Offer::where('slug', $slug)->first();
        return view('theme.offer_products', compact('offer'));
    }

    public function checkout(Request $request)
    {
        $subtotal = 0;
        $quantity = 1;

        $offer = $request->offer;

        if($request->offer == 1){

            $offer = Offer::find($request->id);

            $subtotal = $offer->grand_price - $offer->discount;

            $products = Product::whereIn('id', json_decode($offer->products))->get();

            $product = array();

            foreach($products as $item){
                array_push($product, $item->id = $item->name);
            }



        } else {


            $product = Product::with('category')->find($request->id);
            $quantity = $request->quantity;


            if($product->discount != 0){
                $subtotal = ($product->price - $product->discount) * $quantity;
            } else {
                $subtotal = ($product->price) * $quantity;
            }

        }

        return view('theme.includes.checkout_modal', compact('product', 'quantity', 'subtotal', 'offer'));
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

        if($request->offer == 1){
            $order->order_type = 'offer';
        }
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
