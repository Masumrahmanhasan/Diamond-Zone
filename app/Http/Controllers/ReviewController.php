<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Carbon\Carbon;
use Session;
use Image;
use Auth;
use Illuminate\Support\Facades\Redirect;

class ReviewController extends Controller
{
    public function index(){
        $getAll = Review::with('user','product')->orderBy('id','DESC')->get();
        return view('admin.products.review',compact('getAll'));
    }

    public function approve($id){
        Review::where('id',$id)->update([
            'status' => 1,
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->back();
    }


    public function delete($id){
        Review::where('id',$id)->delete();
        return redirect()->back();
    }


    public function store(Request $request)
    {
      $request->validate([
        'rating' => 'required',
        'body' => 'required',
      ]);

      $reviewId = Review::insertGetId([
        'product_id' => $request->product_id,
        'user_id' => Auth::user()->id,
        'rating' => $request->rating,
        'body' => $request->body,
        'created_at' => Carbon::now(),
      ]);

      if($request->file('attachment')){

        $image = $request->file('attachment');
        $imageName = 'review'.'-'.uniqid().'-'.$image->getClientOriginalExtension();
        Image::make($image)->resize(702,400)->save('uploads/attachment/'.$imageName);
        $saveUrl = 'uploads/attachment/'.$imageName;

        Review::where('id',$reviewId)->update([
          'attachment' => $saveUrl,
          'updated_at' => Carbon::now(),
        ]);
      }

      Session::flash('message', 'Successfully Send your Review!');
      return redirect()->back();

    }
}
