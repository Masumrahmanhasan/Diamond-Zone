<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('theme.user.dashboard');
    }

    public function orders()
    {

        $orders = Order::where('user_id', auth()->user()->id)->get();
        return view('theme.user.orders', compact('orders'));
    }

    public function orderDetails($id)
    {
        $order = Order::with('user', 'order_items', 'order_items.product')->where('user_id', $id)->first();

        return view('theme.user.order_details', compact('order'));
    }

    public function account()
    {
        return view('theme.user.account');
    }

    public function updateInfo(Request $request)
    {
        $user = User::find(auth()->user()->id);

        $user->name = $request->name;
        $user->save();

        return back();
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed',
        ]);
        $user = User::find(auth()->user()->id);

        if($request->current_password){

            $old_password = Hash::make($request->current_password);
            if($old_password == $user->password){

                $user->password = Hash::make($request->new_password);
                $user->save();
                return back();

            } else {
                return back()->with('error', 'Current password Password did not match!');
            }
        } else {
            return redirect()->back()->with('error', 'Something went Wrong!');
        }
    }
}
