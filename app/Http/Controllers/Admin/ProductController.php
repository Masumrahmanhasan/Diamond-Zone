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
        return view('admin.products.index');
    }

    public function create()
    {

        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
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

        dd($request->all());
        Product::create($request->all());


    }

    public function getSubcategoryById(Request $request)
    {
        $subcategories = SubCategory::where('category_id', $request->category_id)->get();

        return $subcategories;
    }
}
