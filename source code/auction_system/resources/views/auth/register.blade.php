@extends('layout.master')

@section('content')
@extends('layout.master')

@section('content')
<div class="collapse navbar-collapse" id="navbarCollapse">
    <div class="navbar-nav ms-auto py-4 py-lg-0">
        <a href="http://127.0.0.1:8000/" class="nav-item nav-link active">Home</a>
        <a href="http://127.0.0.1:8000/product" class="nav-item nav-link ">Products</a>      
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
                    <h1 class="display-4 mb-3 animated slideInDown">Register</h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Register</li>
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
    <!-- Header End -->
<section class="h-100 h-custom">
    <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-8 col-xl-6">
                <div class="card rounded-3">
                    <img src="https://static.zawya.com/version/c:ZTlmMDIzOTktNGU0MC00:YTcwNjEz/180412120921jbvd-jpg.jpg?f=187:100&q=0.75&w=1080"
                    class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;height:220px"
                    alt="Sample photo">
                    <div class="card-body p-4 p-md-5">
                    <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Register</h3>
        
                    <form class="px-md-2"method="POST" action="{{ route('register') }}">
                        @csrf
        
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example1q">Name</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example1q">Email Address</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example1q">Type User</label>
                            <select class="select form-control @error('type') is-invalid @enderror" name="type">
                                <option >Select Type User</option>
                                <option value="seller">seller</option>
                                <option value="buyer">buyer</option>
                            </select>
                            @error('type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>



                        
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example1q">Phone Number</label>
                            <input type="tel" class="form-control @error('phone') is-invalid @enderror"  name="phone">

                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example1q">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example1q">Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"autocomplete="new-password">
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg mb-1">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>


{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Type Role') }}</label>

                            <div class="col-md-6">
                                <select class="form-control @error('type') is-invalid @enderror" name="type">
                                    <option >Select Type User</option>
                                    <option value="seller">seller</option>
                                    <option value="buyer">buyer</option>
                                </select>

                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                                <input type="tel" class="form-control @error('phone') is-invalid @enderror"  name="phone">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
