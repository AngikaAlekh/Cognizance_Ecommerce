<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
