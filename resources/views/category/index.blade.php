@extends('layouts.dashboard')
@section('content')
    <div class="card w-100 mt-3">
        <div class="card-header">
            <h2 class="card-title">Categories</h2>
            <a href="{{route('category.create')}}" class="btn btn-primary">add new</a>
          </div>
        <div class="card-body">
            <table id="categories-table" class="table display">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Parent Category</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->parent_id}}</td>
                        <td>
                        <a href="{{route('product.edit',$category->id)}}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('category.destroy',$category->id) }}" method="POST">
                            @csrf
                            
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?')"><i class="lnr lnr-trash"></i> Delete</button>
                        </form>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              
        </div>
    </div>
      
@endsection