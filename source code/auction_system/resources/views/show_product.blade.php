@extends('layout.master')
@section('content')
<div class="collapse navbar-collapse" id="navbarCollapse">
    <div class="navbar-nav ms-auto py-4 py-lg-0">
        <a href="http://127.0.0.1:8000/" class="nav-item nav-link ">Home</a>
        <a href="http://127.0.0.1:8000/product" class="nav-item nav-link active">Products</a>      
        <a href="http://127.0.0.1:8000/contact" class="nav-item nav-link">Contact</a>
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">Account</a>
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
                    <h1 class="display-4 mb-3 animated slideInDown">{{ $product->name_product }}</h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            
                            <li class="breadcrumb-item active" aria-current="page">Products</li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $product->name_product}}</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 animated fadeIn">
                    <img class="img-fluid animated pulse infinite" style="animation-duration: 3s;" src="{{asset('img/hero-2.png')}}"
                        alt="">
                </div>
              
            </div>
        </div>
    </div>
    <!-- Header End -->
    <div class="container"> 

    <img src="/images/{{ $product->image }}">
{{-- 
    <p  class="mt-4">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
        </svg>&nbsp;&nbsp;&nbsp;{{ $product->user_id}}
    </p> --}}
    <h6 class="mt-4">{{ $product->description}}</h6>


    </div>


    <div class="container"> 
        
    <div class="bg-light rounded p-5">
       
        <div class="section-title section-title-sm position-relative pb-3 mb-4">
            <h3 class="mb-0">Create Price </h3>
        </div>
        <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input  type="hidden"  class="form-control" name="user_id" value="{{ $product->user_id}}" autofocus> 
            <input  type="hidden"  class="form-control" name="product_id" value="{{ $product->id}}" autofocus> 
            <div class="row g-3">
                <div class="col-12 col-sm-6">
                    <label class="form-label ">Price</label>
                    <input type="text" class="form-control bg-white border-0 pt-2 @error('price') is-invalid @enderror" name="price" autofocus placeholder="Enter Price"
                        style="height: 55px;">
                        @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    
                </div>
                <div class="col-12 col-sm-6 mt-5 pt-4">
                    JOD

                </div>
                
                <div class="col-1">
                    <button class="btn btn-primary w-100 py-3" type="submit" >Submit</button>
                </div>
            </div>
        </form>
    </div>
    <!-- Comment Form End -->
</div>




    @endsection