<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all()->where('status',1);
        $categories = Category::all();
        return view('home',['products'=>$products,'categories'=>$categories]);

    }

    public function show($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('product.show',['product'=>$product,'categories'=>$categories]);
    }
}
