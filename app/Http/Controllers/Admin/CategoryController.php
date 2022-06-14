<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name',
            'featured_image' => 'required|mimes:png,jpg|max:1024',
        ]);

        $extenstion = $request->file('featured_image')->getClientOriginalExtension();
        $name       = $request->name . '-'. Carbon::now()->format('dmY').'.'.$extenstion;

        $storeFile  = $request->file('featured_image')->storeAs('/categories', $name, 'custom');


        Category::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'featured_image' => $storeFile,
        ]);
        return redirect()->route('categories.index');

    }

    public function show($id)
    {

    }


    public function edit($id)
    {
        # code...
    }

    public function destroy($id)
    {
        $category = Category::find($id)->delete();
        return redirect()->back();
    }
}
