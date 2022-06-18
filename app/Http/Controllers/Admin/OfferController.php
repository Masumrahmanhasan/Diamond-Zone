<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\Product;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index()
    {
          $offers = Offer::all();
        return view('admin.offer.index', compact('offers'));
    }

    public function create()
    {
        $products = Product::all();
        return view('admin.offer.create', compact('products'));
    }

    public function getSelectedProductsTotal(Request $request){

        $products = Product::whereIn('id', $request->products)->pluck('price');

        $total = 0;
        foreach ($products as $price){
            $total += $price;
        }

        return $total;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $offer = new Offer;
        $offer->name = $request->name;
        $offer->products = implode(',', $request->products);
        $offer->grand_price = $request->grand_price;
        $offer->discount = $request->discount;
        $offer->save();

        return redirect()->route('products.combo_offer');
    }
}
