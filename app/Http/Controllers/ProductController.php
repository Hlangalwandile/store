<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

use Auth;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('product.index',['products'=>$products,'categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('product.create',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product();
        $request->validate([
            'image'=>['nullable','mimes:jpg,jpeg,png,gif','max:2048']
        ]);

        $product->name = request('name');
        $product->description = request('description');
        $product->price = request('price');
        $product->status = request('status');
        $product->categories = json_encode(request('category'));
        
        if($request->file('image')){
            $imageLink = $request->file('image')->store('images','public');
            $product->image = $imageLink;
        }

        $product->save();

        // Redirect to the products index page with a success message
        $message = 'Product created successfully.';
        return redirect(route('products'))->with('success',$message);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('product.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('product.edit',['product'=>$product,'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
       
        $id =  request('product_id');
        $product = Product::find($id);
        $request->validate([
            'image'=>['nullable','mimes:jpg,jpeg,png,gif','max:2048']
        ]);

        $product->name = request('name');
        $product->description = request('description');
        $product->price = request('price');
        $product->status = request('status');
        $product->categories = json_encode(request('category'));
        
        if($request->file('image')){
            $imageLink = $request->file('image')->store('images','public');
            $product->image = $imageLink;
        }

        $product->save();

        $message = 'Product successfully updated.';
        return redirect(route('product.edit',$id))->with('success',$message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $message = 'Product deleted successfully.';
        return redirect(route('products'))->with('success',$message);
    }

}
