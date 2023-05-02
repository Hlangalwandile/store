@extends('layouts.album')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="/storage/{{ $product->image ?? '' }}" alt="Product Image" class="img-fluid" alt="{{ $product['name'] }}">
           
        </div>
        <div class="col-md-6">
            <h1>{{ $product['name'] }}</h1>
            <p>{{ $product['description'] }}</p>
            <p><strong>Price:</strong> R{{ $product['price'] }}</p>
            <p><strong>Category:</strong> {{ $product['category_name'] }}</p>
            <p><strong>Status:</strong> {{ $product['status'] }}</p>
            <p><strong>Created at:</strong> {{ $product['created_at'] }}</p>
            <p><strong>Updated at:</strong> {{ $product['updated_at'] }}</p>
            <a href="#" class="btn btn-primary">Add to Cart</a>
        </div>
    </div>
</div>

@endsection