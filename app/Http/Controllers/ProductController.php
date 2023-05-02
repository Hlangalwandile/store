<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('product.index');
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
         // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category.*' => 'exists:categories,id',
            'status' => 'required|in:1,0',
        ]);

        // Handle the file upload and store the product image
        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $path = public_path('images/products/' . $filename);
        Image::make($image->getRealPath())->resize(500, 500)->save($path);

        // Create a new product object and store it in the database
        $product = new Product();
        $product->name = $validatedData['name'];
        $product->description = $validatedData['description'];
        $product->price = $validatedData['price'];
        $product->image = $filename;
        $product->status = $validatedData['status'];
        $product->save();

        // Attach the selected categories to the new product
        $product->categories()->attach($validatedData['category']);

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
    public function edit(Product $product)
    {
        return view('product.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $message = 'Product successfully updated.';
        return redirect(route('product.edit'))->with('success',$message);
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