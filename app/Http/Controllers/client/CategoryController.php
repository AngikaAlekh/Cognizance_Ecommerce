<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($slug){
        $category = Category::where("slug", $slug)->first();
        $courses = Course::where('category_id', $category->id)->paginate(10);
        return view ('client.category.index', compact('category', 'courses'));
    }

}
