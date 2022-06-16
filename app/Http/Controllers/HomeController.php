<?php

namespace App\Http\Controllers;

use App\Models\Category;
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

}
