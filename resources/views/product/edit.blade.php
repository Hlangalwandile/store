@extends('layouts.dashboard')
@section('content')
<div class="card">
    <div class="card-header"></div>
    <div class="card-body">
        <form method="POST" action="{{ route('product.update') }}">
            @csrf
        
            <div class="form-group mb-3">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
            </div>
          
            <div class="form-group mb-3">
              <label for="description">Description</label>
              <textarea class="form-control" id="description" name="description" required>{{ $product->description }}</textarea>
            </div>
          
            <div class="form-group mb-3">
              <label for="price">Price</label>
              <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
            </div>
          
            <div class="form-group mb-3">
              <label for="image">Image</label>
              <input type="file" class="form-control" id="image" name="image">
            </div>
          
            <div class="form-group mb-3">
              <label for="categories">Categories</label>
              <select class="form-control" id="categories" name="categories[]" multiple>
                @foreach ($categories as $category)
                  <option value="{{ $category->id }}" {{ in_array($category->id, $product->categories->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
              </select>
            </div>
          
            <div class="form-group mb-3">
              <label for="status">Status</label>
              <select class="form-control" id="status" name="status" required>
                <option value="draft" {{ $product->status == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ $product->status == 'published' ? 'selected' : '' }}>Published</option>
              </select>
            </div>
          
            <button type="submit" class="btn btn-primary">Update Product</button>
          </form>
          
    </div>
</div>
@endsection