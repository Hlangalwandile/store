@extends('layouts.dashboard')
@section('content')
<div class="card my-5 col-md-6">
    <div class="card-header">
        <h2 class="card-title">Add new Category</h2>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('category.store') }}">
            @csrf
          
            <div class="form-group mb-3">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>
          
            <div class="form-group mb-3">
              <label for="parent_id">Parent Category</label>
              <select class="form-control" id="parent_id" name="parent_id">
                <option value="0">-- None --</option>
                @foreach ($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
              </select>
            </div>
          
            <button type="submit" class="btn btn-primary">Create Category</button>
          </form>
    </div>
</div>
  
@endsection