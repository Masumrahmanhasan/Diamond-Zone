<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusinessSetting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function index()
    {
        return view('admin.website.header');
    }

    public function pages()
    {
        return view('admin.website.pages.index');
    }

    public function pageCreate()
    {
        return view('admin.website.pages.create');
    }

    public function update(Request $request)
    {

        foreach ($request->types as $key => $type) {

            $lang = null;
            if(gettype($type) == 'array'){
                $lang = array_key_first($type);
                $type = $type[$lang];
                $business_settings = BusinessSetting::where('type', $type)->first();
            }else{
                $business_settings = BusinessSetting::where('type', $type)->first();
            }

            if($business_settings!=null){
                if(gettype($request[$type]) == 'array'){
                    $business_settings->value = json_encode($request[$type]);
                }
                else {
                    $business_settings->value = $request[$type];
                }
                $business_settings->save();
            }
            else{
                $business_settings = new BusinessSetting;
                $business_settings->type = $type;
                if(gettype($request[$type]) == 'array'){
                    $business_settings->value = json_encode($request[$type]);
                }
                else {
                    $business_settings->value = $request[$type];
                }
                $business_settings->save();
            }
        }

        Artisan::call('cache:clear');

        return back();
    }

    public function settings()
    {
        return view('admin.settings.password_change');
    }

    public function update_settings(Request $request)
    {

        $user = User::find(auth()->user()->id);
        if($request->name) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
        }

        $user->save();
        return back();
    }

    public function update_password(Request $request)
    {

        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);
        $user = User::find(auth()->user()->id);

        if($request->old_password){

            $old_password = Hash::make($request->old_password);
            if($old_password == $user->password){

                $user->password = Hash::make($request->new_password);
                $user->save();
                return back();

            } else {
                return back()->with('error', 'Old Password did not match!');
            }
        } else {
            return redirect()->back()->with('error', 'Something went Wrong!');
        }
    }

}
