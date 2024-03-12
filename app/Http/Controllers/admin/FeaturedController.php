<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\FeaturedCategory;

use App\Models\Product;
use App\Models\FeaturedProduct;

class FeaturedController extends Controller
{
    public function view_featured_categories(){
        $categories = Category::all();
        $featured_categories = FeaturedCategory::all();
        return view ('admin.featured.category', compact('categories', 'featured_categories'));
    }

    public function store_featured_category(Request $request){
        $category = FeaturedCategory::find($request->category_id);
        if ($category){
            return redirect('/admin/featured/categories')->with('error', 'Category already added to the Featured List!');
        }
        else{
            $featuredCategory = new FeaturedCategory;
            $featuredCategory->category_id = $request->category_id;
            $featuredCategory->save();
    
            return redirect('/admin/featured/categories')->with('success', 'Category successfully added to Featured List!');
        }
    }

    public function remove_featured_category($id){
        $featuredCategory = FeaturedCategory::find($id);
        if ($featuredCategory){
            $featuredCategory->delete();
            return redirect('/admin/featured/categories')->with('success', 'Category successfully removed from the Featured List!');
        }
        else{
            return redirect('/admin/featured/categories')->with('error', 'Category not found!');
        }
    }

    public function view_featured_products(){
        $products = Product::all();
        $featured_products = FeaturedProduct::all();
        return view ('admin.featured.product', compact('products', 'featured_products'));
    }

    public function store_featured_product(Request $request){
        $product = FeaturedProduct::find($request->product_id);
        if ($product){
            return redirect('/admin/featured/products')->with('error', 'Product already added to the Featured List!');
        }
        else{
            $featuredProduct = new FeaturedProduct;
            $featuredProduct->product_id = $request->product_id;
            $featuredProduct->save();
    
            return redirect('/admin/featured/products')->with('success', 'product successfully added to Featured List!');
        }
    }

    public function remove_featured_product($id){
        $featuredProduct = FeaturedProduct::find($id);
        if ($featuredProduct){
            $featuredProduct->delete();
            return redirect('/admin/featured/products')->with('success', 'Product successfully removed from the Featured List!');
        }
        else{
            return redirect('/admin/featured/products')->with('error', 'Product not found!');
        }
    }
   
}
