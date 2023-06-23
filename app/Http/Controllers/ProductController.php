<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){

        $products = Product::all();
        return view('admin.products.index',compact('products'));
    }
    public function create(){
        $product= new Product();
        return view('admin.products.create',compact('product'));
    }
    public function store(Request $request){
        //validate
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'description'=>'required',
            'image'=>'image|required',
        ]);
        // Upload the Image
        if($request->hasFile('image')){
            $image= $request->image;
            $image->move('uploads',$image->getClientOriginalName());

        }
        // Save to database
        Product::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'description'=>$request->description,
            'image'=>$request->image->getClientOriginalName(),
        ]);
        // Session Message
        
        // Redirect
        return redirect('products/create')->with('msg','product Added');
        
    }
    public function destroy($id) {
        Product::destroy($id);

        return redirect()->back()->with('msg','product Deleted');
    }
    public function show($id) {
        $product=Product::find($id);
        return view('admin.products.details',compact('product'));
    }
    public function edit($id) {
        $product=Product::find($id);
        return view('admin.products.edit',compact('product'));
    }
    public function update(Request $request,$id) {
        //Find the product
        $product= Product::find($id);
        //validate the form
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'description'=>'required'
        ]);

        // Check if there is any image
        if($request->hasFile('image')){
            if(file_exists(public_path('uploads/').$product->image)){
                unlink(public_path('uploads/').$product->image);
            }
            //upload new image
            $image=$request->image;
            $image->move('uploads',$image->getClientOriginalName());

            $product->image=$request->image->getClientOriginalName();

        }
        //update the product
        $product->update([
            'name'=>$request->name,
            'price'=>$request->price,
            'description'=>$request->description,
            'image'=>$product->image
        ]);

        return redirect("/products")->with('msg','Product Updated');

    }
}
