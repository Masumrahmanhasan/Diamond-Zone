<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Offer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use function MongoDB\BSON\toJSON;

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
        $best_sales = Order::with('order_items','order_items.product')->where('status', 3)->get();
        $combo_offers = Offer::all();
        $reviews = Review::with('user')->inRandomOrder()->where('status', 1)->limit(3)->get();
        $reviewsImage = Review::inRandomOrder()->where('status', 1)->whereNotNull('attachment')->limit(12)->get();
        return view('theme.home', compact('combo_offers', 'reviews', 'reviewsImage', 'best_sales'));
    }

    public function shop(Request $request)
    {
        if($request->q !== null){
            $shop_products = Product::with('category')->where('name', 'like', '%' . $request->q . '%');
        } else {
            $shop_products = Product::with('category');
        }
        $sort_by = $request->sort_by;
        switch ($sort_by) {
            case 'oldest':
                $shop_products->orderBy('created_at', 'asc');
                break;
            case 'price-asc':
                $shop_products->orderBy('price', 'asc');
                break;
            case 'price-desc':
                $shop_products->orderBy('price', 'desc');
                break;
            default:
                $shop_products->orderBy('created_at', 'desc');
                break;
        }

        $shop_products = $shop_products->get();

        return view('theme.product_listing', compact('shop_products'));
    }

    public function getProductByCategory($slug)
    {
        $category = Category::with('products')->where('slug', $slug)->first();

        return view('theme.product_category', compact('category'));
    }

    public function getProductDetailsBySlug($slug)
    {
        $data = Product::with('category', 'subcategory')->where('slug', $slug)->first();

        $product = collect(new ProductResource($data));

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

        if(!$request->has('quantity')){
            $quantity = 1;
        } else {
            $quantity = $request->quantity;
        }


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

            if($product->discount != 0){
                $subtotal = ($product->price - ( $product->price * ( $product->discount / 100))) * $quantity;
            } else {
                $subtotal = ($product->price) * $quantity;
            }

        }


        return view('theme.includes.checkout_modal', compact('product', 'quantity', 'subtotal', 'offer'));
    }


    public function checkout_done(Request $request)
    {

        $order = new Order;
        $order->user_id = auth()->user()->id ?? null;
        $order->order_code = 'DZ-'. mt_rand(10000, 99999);
        $order->quantity = $request->quantity;
        $order->grand_total = $request->total;
        $order->billing_name = $request->name;
        $order->billing_phone = $request->phone;
        $order->billing_email = $request->email;
        $order->billing_address = $request->address;
        $order->payment_type = $request->payment_type;
        $order->payment_phone = $request->payment_phone;
        $order->trans_id = $request->trans_id;
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

        return redirect()->back()->with('success' , 'Order Placed SuccessFully');
    }

}
