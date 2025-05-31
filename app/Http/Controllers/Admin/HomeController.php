<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{    
    
    public function index(){
        
        $categories = Category::all();
        $featuredCategories = Category::has('products')->with('products')->take(3)->get();
        $featuredProducts = Product::orderBy('id', 'desc')->take(8)->get();
        return view('home', compact('categories','featuredCategories','featuredProducts'));
    }
}
