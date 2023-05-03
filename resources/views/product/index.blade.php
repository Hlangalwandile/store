@extends('layouts.dashboard')
@section('content')

<div class="card w-100 mt-3">
    <div class="card-header">
        <h2 class="card-title">Products</h2>
        <a href="{{route('product.create')}}" class="btn btn-primary">add new</a>
      </div>
    <div class="card-body">
        <table id="products-table" class="table display">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Image</th>
                <th>Category</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($products as $product)
                <tr>
                  <td>{{ $product['id'] }}</td>
                  <td>{{ $product['name'] }}</td>
                  <td>{{ $product['description'] ?? '' }}</td>
                  <td>R {{ $product['price'] }}</td>
                  <td><img src="{{asset('//storage/'.$product->image)}}" alt="Product Image" height="100px"></td>
                  {{-- <td><img src="/storage/{{ $product->image ?? '' }}" alt="Product Image" height="100px"></td> --}}
                  <td>
                    @isset($product->categories)
                      @php
                          $cat_list = json_decode($product['categories']);
                        @endphp
                        @foreach ($categories as $cat)
                            @isset($cat_list)
                            @if (in_array($cat->id,$cat_list))
                              {{$cat->name}}
                              @else
                            @endisset
                            @endif
                        @endforeach
                    @endisset
                   
                  </td>
                  <td>{{ $product['status'] ?? '' }}</td>
                  <td>{{ $product['created_at'] ?? '' }}</td>
                  <td>{{ $product['updated_at'] ?? '' }}</td>
                  <td>
                      <a href="{{route('product.edit',$product->id)}}" class="btn btn-sm btn-primary">Edit</a>
                      {{-- <a href="#" class="btn btn-sm btn-danger">Delete</a> --}}
                  </td>
              </tr>
              @endforeach
              <!-- Add more rows for additional products -->
            </tbody>
          </table>
   
    </div>
</div>
@endsection