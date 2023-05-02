@extends('layouts.album')
@section('content')
<section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Store example</h1>
        <p class="lead text-muted">
            Discover the future of technology at Store! From smartphones to laptops, our collection is carefully curated to bring you the latest and greatest. Shop now for the best in tech!</p>
        <p>
          {{-- <a href="#" class="btn btn-primary my-2">Main call to action</a>
          <a href="#" class="btn btn-secondary my-2">Secondary action</a> --}}
        </p>
      </div>
    </div>
  </section>

  <div class="Store py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

        @foreach ($products as $product)
        <div class="col">
          <div class="card shadow-sm">
            @if (isset($product->image))
              <img src="/storage/{{ $product->image ?? '' }}" alt="Product Image" class="card-img-top" preserveAspectRatio="xMidYMid slice">
            @else
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
            @endif
  
              
            <div class="card-body">
              <p class="card-title"> {{$product->name ?? ''}}</p>
              <p class="card-text"> {{$product->description ?? ''}}</p>
              <div class="d-flex justify-content-between align-items-center">
                <a href="{{route('item.show',$product->id)}}" class="btn">open</a>
                <small class="text-muted">R{{$product->price ?? ''}}</small>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        

        
      </div>
    </div>
  </div>
@endsection