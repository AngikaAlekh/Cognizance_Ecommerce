<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view ('admin.category.index', compact('categories'));
    }

    public function create(){
        return view ('admin.category.create');
    }
}
