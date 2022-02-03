<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
class HomeController extends Controller
{
    public function redirect(){
        
        $usertype = Auth::user()->usertype;
        
        if ($usertype == '1') {

            return view('admin.home');
        }else{
            $data = Product::paginate(6);
            $user = auth()->user();
            $count = cart::where('phone',$user->phone)->count();
            return view('user.home',compact('data','count'));
        }
    }

    public function index(){
        if (Auth::id()) {
            return redirect('redirect');
        }else{
        $data = Product::paginate(6);
        return view('user.home',compact('data'));
        }
    }

    public function searchProduct(Request $request){

        $search = $request->search;

        if ($search == '') {
             $data = Product::all();
        return view('user.product-page',compact('data'));
        }
        $data = Product::where('title','like','%'.$search.'%')->get();
        return view('user.product-page',compact('data'));
    }

    public function addCart(Request $request, $id){

        if (Auth::id()) {

            $user = auth()->user();
            $product = product::find($id);

            $cart = new Cart;
            $cart->name = $user->name;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->product_title = $product->title;
            $cart->price = $product->price;
            $cart->quantity = $request->quantity;
            $cart->save();

            return redirect()->back()->with('message','Product Added To Cart');
        }else{
            return redirect('login');
        }
    }

    public function showCart(){
        $user = auth()->user();
        $cart = Cart::where('phone',$user->phone)->get();
        $count = cart::where('phone',$user->phone)->count();
        return view('user.show-cart',compact('count','cart'));
    }

    public function deleteCartItem($id){

        $data = Cart::find($id);
        $data->delete();
        return redirect()->back()->with('message','Product is Removed From Cart');
    }

    public function confirmOrder(Request $request){

        $user = auth()->user();

        $name = $user->name;
        $phone = $user->phone;
        $address = $user->address;

        foreach($request->productname as $key=>$productname){

            $order = new Order;

            $order->product_name = $request->productname[$key];
            $order->quantity = $request->quantity[$key];
            $order->price = $request->price[$key];

            $order->name = $name;
            $order->phone = $phone;
            $order->address = $address;
            $order->status = 'proccessing';
            $order->save();
        }
        DB::table('carts')->where('phone',$phone)->delete();
        return redirect()->back()->with('message','Order Successful');
    }
}
