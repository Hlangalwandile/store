<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Category::all();
        return view('category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('category.create',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        // Create new category with form data
        $category = new Category();
        $category->name = request('name');
        $category->parent_id = request('parent_id');
        $category->save();
        $message = 'Category '.request('name').' created successfully.';
        return redirect(route('categories'))->with('success', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
        return view('category.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::find($id);
        $categories = Category::all();
        return view('category.edit',['category'=>$category,'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        $id = request('category_id');
        $category = Category::find($id);
        $category->name = request('name');
        $category->parent_id = request('parent_id');
        $category->save();
        $message = 'Category '.request('name').' updated successfully.';
        return redirect(route('categories'))->with('success', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        $id = request('category_id');
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('categories');
    }
}