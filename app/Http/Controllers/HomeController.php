<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
class HomeController extends Controller
{
    public function redirect(){
        
        $usertype = Auth::user()->usertype;
        
        if ($usertype == '1') {

            return view('admin.home');
        }else{
            $data = Product::paginate(6);
            return view('user.home',compact('data'));
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
}
