@extends('layouts.dashboard')
@section('content')
<div class="card">
    <div class="card-header">
      <h2 class="card-title">Product Edit</h2>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('product.update') }}">
            @csrf
            <input type="hidden" name="product_id" value="{{$product->id}}">
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
              <label for="category">Categories</label>
              <select class="form-control" id="category" name="category[]" multiple>
                @foreach ($categories as $category)
                  @if(isset($product->categories))
                  @php
                       $selected = '';
                       $product_categories = json_decode($product->categories);
                      if(in_array($category->id,$product_categories)){
                        $selected = 'selected';
                      } else {
                        $selected = '';
                      }
                  @endphp
                  <option value="{{ $category->id }}" {{$selected}} >{{ $category->name }}</option>     
                  @else
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endif
                @endforeach
              </select>
            </div>
          
            <div class="form-group mb-3">
              <label for="status">Status</label>
              <select class="form-control" id="status" name="status" required>
                <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Draft</option>
                <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Published</option>
              </select>
            </div>
          
            <button type="submit" class="btn btn-primary">Update Product</button>
          </form>
          
    </div>
</div>
@endsection