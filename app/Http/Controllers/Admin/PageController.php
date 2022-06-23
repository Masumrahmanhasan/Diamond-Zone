<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pages;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function index()
    {

        $pages = Pages::all();
        return view('admin.website.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.website.pages.create');
    }


    public function store(Request $request)
    {
        $page = new Pages;
        $page->title = $request->title;
        if (Pages::where('slug', preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug)))->first() == null) {
            $page->slug             = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug));
            $page->type             = "custom_page";
            $page->content          = $request->content;

            $page->save();
            return redirect()->route('pages.index');
        }
        return redirect()->route('pages.index');
    }
}
