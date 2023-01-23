@extends('layout.master')

@section('content')

<div class="collapse navbar-collapse" id="navbarCollapse">
    <div class="navbar-nav ms-auto py-4 py-lg-0">
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-4 py-lg-0">
                <a href="http://127.0.0.1:8000/" class="nav-item nav-link ">Home</a>
                <a href="http://127.0.0.1:8000/product" class="nav-item nav-link ">Products</a>      
                <a href="http://127.0.0.1:8000/contact" class="nav-item nav-link active">Contact</a>
                
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
<!-- Header Start -->
<div class="container-fluid hero-header bg-light py-5 mb-5">
<div class="container py-5">
    <div class="row g-5 align-items-center">
        <div class="col-lg-6">
            <h1 class="display-4 mb-3 animated slideInDown">Contact Us</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                </ol>
            </nav>
        </div>
        <div class="col-lg-6 animated fadeIn">
            <img class="img-fluid animated pulse infinite" style="animation-duration: 3s;" src="img/hero-2.png" alt="">
        </div>
    </div>
</div>
</div>
<!-- Header End -->


<!-- Contact Start -->
<div class="container-xxl py-5">
<div class="container">
    <div class="row g-5 mb-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="col-lg-6">
            <h1 class="display-6">Contact Us</h1>
            <p class="text-primary fs-5 mb-0">If You Have Any Query, Please Contact Us</p>
        </div>
        <div class="col-lg-6 text-lg-end">
        </div>
    </div>
    <div class="row g-5">
        <div class="col-lg-5 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <p class="mb-2">Our office:</p>
            <h4>Amman -Jordan </h4>
            <hr class="w-100">
            <p class="mb-2">Call us:</p>
            <h4>+962 78 874 2654</h4>
            <hr class="w-100">
            <p class="mb-2">Mail us:</p>
            <h4>info@example.com</h4>
            <hr class="w-100">
            <p class="mb-2">Follow us:</p>
            <div class="d-flex pt-2">
                <a class="btn btn-square btn-primary rounded-circle me-2" href=""><i class="fab fa-twitter"></i></a>
                <a class="btn btn-square btn-primary rounded-circle me-2" href=""><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-square btn-primary rounded-circle me-2" href=""><i class="fab fa-youtube"></i></a>
                <a class="btn btn-square btn-primary rounded-circle me-2" href=""><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
        <div class="col-lg-7 col-md-6 wow fadeInUp mt-4" data-wow-delay="0.5s">
            @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
            @endif
            <form class="mt-5 pt-4" method="post" action="{{ route('contact.store') }}">
                <!-- CROSS Site Request Forgery Protection -->
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="form-floating">
                            <label for="name">Your Name</label>
                            <input type="text" class="form-control {{ $errors->has('name') ? 'error' : '' }}" name="name" id="name" placeholder="Your Name">
                            @if ($errors->has('name'))
                            <div class="error text-danger">
                                {{ $errors->first('name') }}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <label for="email">Your Email</label>

                            <input type="email" class="form-control {{ $errors->has('email') ? 'error' : '' }}" name="email" id="email" placeholder="Your Email">
                            @if ($errors->has('email'))
                            <div class="error text-danger">
                                {{ $errors->first('email') }}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating">
                            <label for="subject">Number Phone</label>
                            <input type="text" class="form-control {{ $errors->has('phone') ? 'error' : '' }}" name="phone" id="phone" placeholder="Number Phone">
                            @if ($errors->has('phone'))
                            <div class="error text-danger">
                                {{ $errors->first('phone') }}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating">
                            <label for="subject">Subject</label>
                            <input type="text" class="form-control {{ $errors->has('subject') ? 'error' : '' }}" name="subject" id="subject" placeholder="Subject">
                            @if ($errors->has('subject'))
                            <div class="error text-danger">
                                {{ $errors->first('subject') }}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <label for="message">Message</label>
                            <textarea class="form-control {{ $errors->has('message') ? 'error' : '' }}" placeholder="Leave a message here" name="message" id="message" rows="4"></textarea>
                            @if ($errors->has('message'))
                            <div class="error text-danger">
                                {{ $errors->first('message') }}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary py-3 px-4" type="submit" name="send" value="Submit" >Send Message</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<!-- Contact End -->


<!-- Google Map Start -->

<!-- Google Map End -->

@endsection