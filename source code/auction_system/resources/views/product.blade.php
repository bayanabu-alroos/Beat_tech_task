@extends('layout.master')

@section('content')
<div class="collapse navbar-collapse" id="navbarCollapse">
    <div class="navbar-nav ms-auto py-4 py-lg-0">
        <a href="http://127.0.0.1:8000/" class="nav-item nav-link ">Home</a>
        <a href="http://127.0.0.1:8000/product" class="nav-item nav-link active">Products</a>      
        <a href="http://127.0.0.1:8000/contact" class="nav-item nav-link">Contact</a>
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle " data-bs-toggle="dropdown">Account</a>
        <div class="nav-item dropdown">
            @guest
            <div class="dropdown-menu shadow-sm m-0">
                
                    @if (Route::has('login'))

                    <a class="dropdown-item" href="{{ route('login') }}">{{ __('Login') }}</a>

                    @endif

                    @if (Route::has('register'))

                    <a class="dropdown-item" href="{{ route('register') }}">{{ __('Register') }}</a>

                    @endif
            </div>
                @else
                <div class="dropdown-menu shadow-sm m-0">
                    <a id="navbarDropdown" class="dropdown-item" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
                    @if(\Illuminate\Support\Facades\Auth::user()->type == 'buyer'  )

                    <a id="navbarDropdown" class="dropdown-item" href="http://127.0.0.1:8000/products/create" >
                        Create Products
                    </a>

                    <a id="navbarDropdown" class="dropdown-item" href="http://127.0.0.1:8000/prices" >
                        Price Offer
                    </a>

                    @endif
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
                @endguest
            </div>
            
        </div>
    </div>
    <div class="h-100 d-lg-inline-flex align-items-center d-none">
        <a class="btn btn-square rounded-circle bg-light text-primary me-2" href=""><i
                class="fab fa-facebook-f"></i></a>
        <a class="btn btn-square rounded-circle bg-light text-primary me-2" href=""><i
                class="fab fa-twitter"></i></a>
        <a class="btn btn-square rounded-circle bg-light text-primary me-0" href=""><i
                class="fab fa-linkedin-in"></i></a>
    </div>
</div>
</nav>
<!-- Navbar End -->

    <!-- Header Start -->
    <div class="container-fluid hero-header bg-light py-5 mb-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 mb-3 animated slideInDown">Products</h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Products</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 animated fadeIn">
                    <img class="img-fluid animated pulse infinite" style="animation-duration: 3s;" src="img/hero-2.png"
                        alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="container-sm">
        
            
        <form action="{{ route('product') }}" method="POST">
            @csrf    
                <div class="bg-white shadow" style="padding: 35px;">
                    <div class="row g-2">
                        <div class="col-md-10">
                            <div class="row g-4">
                                <div class="col-md-12">
                                  <input type="text" class="form-control" name="q" placeholder="search by Product  " />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary w-100">Search</button>
                        </div>
    
                    
            
        </form>
       
    </div>
    <!-- Header End -->
    <div class="container mt-4">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        </div>

    <div class="container">
        <div class="row row-cols-4 ">
        @foreach ($products as $product)
        <div class="col-3">
    <div class="card" style="width: 18rem;">
        <img src="/images/{{ $product->image }}" height="300px" class="card-img-top" alt="...">
        <div class="card-body "style="height:200px">
            <p>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                </svg>&nbsp;&nbsp;&nbsp;{{ $product->name}}
            </p>
            <h5 class="card-title">{{ $product->name_product}}</h5>
            <a href="{{ route('show_product', $product->id) }}" class="btn btn-primary mt-4">More Details ...</a>
        </div>
    </div>
        </div>
    @endforeach
    </div>
</div>

</div>
</div>

    @endsection