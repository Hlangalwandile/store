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
              <tr>
                <td>1</td>
                <td>Product 1</td>
                <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
                <td>$9.99</td>
                <td><img src="/path/to/image.jpg" alt="Product Image"></td>
                <td>Category 1</td>
                <td>Active</td>
                <td>2022-01-01 12:00:00</td>
                <td>2022-01-01 12:00:00</td>
                <td>
                  <a href="#" class="btn btn-sm btn-primary">Edit</a>
                  <a href="#" class="btn btn-sm btn-danger">Delete</a>
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td>Product 2</td>
                <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
                <td>$19.99</td>
                <td><img src="/path/to/image.jpg" alt="Product Image"></td>
                <td>Category 2</td>
                <td>Inactive</td>
                <td>2022-01-02 12:00:00</td>
                <td>2022-01-03 12:00:00</td>
                <td>
                  <a href="#" class="btn btn-sm btn-primary">Edit</a>
                  <a href="#" class="btn btn-sm btn-danger">Delete</a>
                </td>
              </tr>
              <!-- Add more rows for additional products -->
            </tbody>
          </table>
   
    </div>
</div>
@endsection