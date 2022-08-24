<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartitems = Cart::where('user_id',Auth::id())->get();
        return view('frontend.checkout',compact('cartitems'));
    }

    public function placeorder(Request $request)
        {
            $order = new Order();
            $order->user_id = Auth::id();
            $order->name = $request->input('name');
            $order->email = $request->input('email');
            $order->phone = $request->input('phone');
            $order->address = $request->input('address');


            $total =0;
            $cartitems_total = Cart::where('user_id',Auth::id())->get();
            foreach($cartitems_total as $prod)
            {
                $total += $prod->products->price;
            }
            $order->total_price=$total;

            $order->tracking_no = 'nabil'.rand(1111,9999);
            $order->save();

            $cartitems = Cart::where('user_id',Auth::id())->get();

            foreach($cartitems as $item)
            {
                OrderItem::create([

                    'order_id'=>$order->id,
                    'prod_id'=> $item->prod_id,
                    'qty'=> $item->prod_qty,
                    'price'=>$item->products->price,

                ]);
            }

            if(Auth::user()->address == NULL)
            {
                $user = User::where('id', Auth::id())->first();
                $user->name = $request->input('name');

                $user->phone = $request->input('phone');
                $user->address = $request->input('address');
                $user->update();
            }

            $cartitems = Cart::where('user_id',Auth::id())->get();
            Cart::destroy($cartitems);
            return redirect('/')->with('status',"Order Placed Successfully");


        }

}
