<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusinessSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

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
}
