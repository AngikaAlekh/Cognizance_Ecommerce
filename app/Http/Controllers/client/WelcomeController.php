<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\FeaturedCategory;
use App\Models\FeaturedProduct;

class WelcomeController extends Controller
{
    public function index(?string $category_slug = null){
        $featured_categories = FeaturedCategory::all();
        $featured_products = FeaturedProduct::all();
        return view("welcome", compact('featured_categories', 'featured_products'));
    }
}
