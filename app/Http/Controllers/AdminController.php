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
        $request->product_image->move('images/product_image',$imageNewName);

        $data->image = $imageNewName;
        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->desc;
        $data->quantity = $request->quantity;
        $data->save();
        return redirect()->back()->with('message','Product is Uploaded');
    }

    public function showProduct(){
        $data = Product::paginate(8);
        return view('admin.show-product',compact('data'));
    }

    public function deleteProduct($id){

        $data = Product::find($id);
        $data->delete();
        return redirect()->back()->with('message','Product is Deleted');

    }

    public function updateProduct($id){

        $data = Product::find($id);
        return view('admin.update-product',compact('data'));
    }

    public function editProduct(Request $request, $id){

        $data = Product::find($id);

        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->desc;
        $data->quantity = $request->quantity;

        $image = $request->product_image;
        if ($image) {
        $imageNewName = time().'.'.$image->getClientOriginalExtension();
        $request->product_image->move('images/product_image',$imageNewName);

        $data->image = $imageNewName;
        }

        $data->save();
        return redirect()->back()->with('message','Product is Updated');

    }

    public function productPage(){

        $data = Product::all();
        return view('user.product-page',compact('data'));
    }
}
