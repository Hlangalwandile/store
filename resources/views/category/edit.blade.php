@extends('layouts.dashboard')
@section('content')
    <div class="card col-md-6">
        <div class="card-body">
            <form method="POST" action="{{ route('category.update') }}">
                @csrf
                <input type="hidden" name="category_id" value="{{$category->id}}">
                
                <div class="form-group mb-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $category->name) }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="form-group mb-3">
                    <label for="parent_id">Parent Category</label>
                    <select class="form-control" id="parent_id" name="parent_id">
                        <option value="">None</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ $cat->id == $category->parent_id ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
            
                <button type="submit" class="btn btn-primary">Update Category</button>
            </form>
            
        </div>
    </div>
@endsection