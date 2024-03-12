<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view("admin.product.index", compact('products'));
    }
    public function create(){
        $categories = Category::all();
        return view("admin.product.create", compact('categories'));
    }
    public function store(Request $request){
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'long_description' => 'required',
            'slug' => 'required|unique:products',
        ]);

        $product = new Product;
        $product->category_id = $request->category_id;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->long_description = $request->long_description;
        $product->video = $request->video;
        $product->slug = Str::slug($request->slug);

        if($request->hasfile('image')){
            $file = $request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/product/', $filename);
            $product->image = $filename;
        }

        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;
        $product->price = $request->price;
        $product->save();
        return redirect('/admin/products')->with('success', 'product created successfully');
    }
    public function edit($id){
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.product.edit', compact('product', 'categories'));
    }
    public function update(Request $request, $id){
        $product = product::find($id);
        if($product){
            $product->category_id = $request->category_id;
            $product->title = $request->title;
            $product->description = $request->description;
            $product->long_description = $request->long_description;
            $product->video = $request->video;
            $product->slug = Str::slug($request->slug);
    
            if($request->hasfile('image')){
                $destination = 'uploads/product/'.$product->image;
                if(File::exists($destination)){
                    File::delete($destination);
                }
    
                $file = $request->file('image');
                $filename = time().'.'.$file->getClientOriginalExtension();
                $file->move('uploads/product/', $filename);
                $product->image = $filename;
            }
    
            $product->meta_title = $request->meta_title;
            $product->meta_description = $request->meta_description;
            $product->price = $request->price;
            $product->update();
            return redirect('/admin/products')->with('success', 'product created successfully');
        }
        else{
            return redirect('/admin/products')->with('error', 'product not found!');
        }
        
    }
    public function destroy($id){
        $product =Product::find($id);
        if($product){
            $destination = 'uploads/product/'.$product->image;
            if(File::exists($destination)){
                File::delete($destination);
            }

            $product->delete();
            return redirect('/admin/products')->with('success', 'Product deleted successfully');
        }
        else{
            return redirect('/admin/products')->with('error', 'Product not found!');
        }
    }
}
