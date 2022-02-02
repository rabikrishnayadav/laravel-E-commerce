<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AdminController extends Controller
{
    public function product(){
        return view('admin.product');
    }

    public function uploadProduct(Request $request){
        
        $data = new Product;
        
        $image = $request->product_image;
        $imageNewName = time().'.'.$image->getClientOriginalExtension();
        $request->product_image->move('images.product_image',$imageNewName);

        $data->image = $imageNewName;
        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->desc;
        $data->quantity = $request->quantity;
        $data->save();
        return redirect()->back()->with('message','Product is Uploaded');
    }
}
