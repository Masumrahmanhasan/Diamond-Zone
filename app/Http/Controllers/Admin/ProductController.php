<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {

        $sku = 'DP-'.mt_rand( 100000, 999999 );

        $categories = Category::all();
        return view('admin.products.create', compact('categories', 'sku'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'sku' => 'required|unique:products,sku',
            'name' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'thumbnail' => 'required',
            'gallary' => 'required',
        ]);

        $product = new Product;
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->category_id = $request->category_id;

        if($request->subcategory_id != null){
            $product->subcategory_id = $request->subcategory_id;
        }

        $product->gallary = $request->gallary;
        $product->thumbnail = $request->thumbnail;
        $product->certificate = $request->certificate;

        $product->short_description = $request->short_description;
        $product->description = $request->description;
        $product->discount = $request->discount;

        $product->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->name)));

        if(Product::where('slug', $product->slug)->count() > 0){

            return back()->with('error', 'Another product exists with same slug. Please change the slug!');
        }

        $product->save();

        return redirect()->route('products.index');


    }

    public function getSubcategoryById(Request $request)
    {
        $subcategories = SubCategory::where('category_id', $request->category_id)->get();

        return $subcategories;
    }
}
