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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle the file upload and store the product image
        // $image = $request->file('image');
        // $filename = time() . '.' . $image->getClientOriginalExtension();
        // $path = public_path('images/products/' . $filename);
        // Image::make($image->getRealPath())->resize(500, 500)->save($path);

        // Create a new product object and store it in the database
        $product = new Product();
        $product->name = request('name');
        $product->description = request('description');
        $product->price = request('price');
        // $product->image = $filename;
        $product->status = request('status');
        $product->save();

        // Attach the selected categories to the new product
        $product->categories()->attach(request('category'));

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
    public function update($id)
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
