<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Product;

use App\Models\Cart;

use App\Models\Order;

use Session;
use Stripe;

class HomeController extends Controller
{
    public function index() {
        $product=Product::all();
        return view('home.userpage',compact('product'));
    }


    public function redirect() {
        $usertype=Auth::user()->usertype;

        if($usertype=='1') {

            $total_product=product::all()->count();

            $total_order=order::all()->count();

            $total_user=user::all()->count();

            //call out muna lahat ng orders then declare ng 0 value bago icompute:
            $order=order::all();
            $total_revenue=0;
            foreach($order as $order) {
                $total_revenue=$total_revenue + $order->price;
            }

            $total_delivered=order::where('delivery_status','=','Delivered')->get()->count();

            $total_processing=order::where('delivery_status','=','processing')->get()->count();

            $total_cancelled=order::where('delivery_status','=','Cancelled')->get()->count();

            return view('admin.home',compact('total_product','total_order','total_user','total_revenue', 'total_delivered','total_processing', 'total_cancelled'));
        }
        else {
            $product=Product::all();
            return view('home.userpage',compact('product'));
        }
    }

    public function product_details($id) {

        $product=product::find($id);

        return view('home.product_details',compact('product'));
    }

    public function add_cart(Request $request,$id) {
        // need to require login or register before purchasing
        if(Auth::id()) {
            $user=Auth::user();

            $product=product::find($id);

            $cart=new cart;

            //fetch user data to save to cart table on mysql
            $cart->name=$user->name;
            $cart->email=$user->email;
            $cart->phone=$user->phone;
            $cart->address=$user->address;
            $cart->user_id=$user->id;

            //table name->column name=other table name->column name of that table;
            $cart->product_title=$product->title;
            $cart->price=$product->new_price * $request->quantity;
            $cart->image=$product->image_1;
            $cart->product_id=$product->id;

            $cart->quantity=$request->quantity;

            $cart->save();

            return redirect()->back();
        }
        else {
            return redirect('login');
        }
    }

    public function show_cart() {

        if(Auth::id()) {

            $id=Auth::user()->id;

            $cart=cart::where('user_id','=',$id)->get();
    
            return view('home.showcart',compact('cart'));

        }
        else {
            return redirect('login');
        }
    }

    public function remove_cart($id) {

        $cart=cart::find($id);

        $cart->delete();

        return redirect()->back();

    }

    public function stripe($subtotalprice) {
        return view('home.stripe',compact('subtotalprice'));
    }

    public function stripePost(Request $request,$subtotalprice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $subtotalprice * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thank you for purchasing." 
        ]);
      

        $user=Auth::user();

        $userid=$user->id;

        $data=cart::where('user_id','=',$userid)->get();

        foreach($data as $data) {
            $order=new order;
            //order table->column name = cart table->column name;
            $order->name=$data->name;
            $order->email=$data->email;
            $order->address=$data->address;
            $order->phone=$data->phone;
            $order->user_id=$data->user_id;

            $order->product_title=$data->product_title;
            $order->price=$data->price;
            $order->quantity=$data->quantity;
            $order->image=$data->image;
            $order->product_id=$data->product_id;

            $order->payment_status='Paid';
            $order->delivery_status='processing';

            $order->save();

            //after saving data to order table, we will now remove the items from cart

            $cart_id=$data->id;

            $cart=cart::find($cart_id);

            $cart->delete();
        }

        Session::flash('success', 'Payment successful!');
              
    return back();
    }

    public function show_order() {

        if(Auth::id()) {

            $user=Auth::user();

            $userid=$user->id;

            $order=order::where('user_id','=',$userid)->get();

            return view('home.order',compact('order'));
        }
        else {

            return redirect('login');
        }

    }

    public function cancel_order($id) {

        $order=order::find($id);

        $order->delivery_status='Order Cancelled';

        $order->payment_status='Order Cancelled';

        $order->save();

        return redirect()->back();

    }

}
