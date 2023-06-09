<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Store</title>



    


    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
  </head>
  <body>
    
<header>
  <div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white">About Store</h4>
          <p class="text-muted">
            Welcome to our online tech store named Store! We offer a wide range of cutting-edge technology products, from the latest smartphones to high-performance laptops, and everything in between. Our collection is carefully curated to bring you the best in the market, and our knowledgeable team is always here to help you find what you need. Shop now and experience the future of technology!</p>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
            @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                @auth
                    <h6><a href="{{ url('/products') }}" class="text-white">Dashboard</a></h6>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-outline-light text-white" type="submit">Logout</button>
                    </form>
                @else
                    <a class="nav-link text-white" href="{{ route('login') }}">Log in</a>

                    @if (Route::has('register'))
                        <a class="nav-link text-white" href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
        <strong>Store</strong>
      </a>
      
      <div class="rightSide d-flex align-items-center">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      </div>
      
    </div>
  </div>
</header>

<main>
  @if(session()->has('success'))
  @php
      $message = session('success');
  @endphp
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> {{$message}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif 
  @if (session()->has('error'))
      @php
          $message = session('error');
      @endphp
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> {{$message}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
@endif
  @yield('content')

</main>

<footer class="text-muted py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
  
  </div>
</footer>


    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('DataTables/datatables.min.js')}}"></script>
    
  </body>
</html>
