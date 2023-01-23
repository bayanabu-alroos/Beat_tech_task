@extends('layout.master')

@section('content')
<div class="collapse navbar-collapse" id="navbarCollapse">
    <div class="navbar-nav ms-auto py-4 py-lg-0">
        <a href="index.html" class="nav-item nav-link ">Home</a>
        <a href="about.html" class="nav-item nav-link ">About</a>
        <a href="service.html" class="nav-item nav-link">Service</a>
        <a href="roadmap.html" class="nav-item nav-link">Roadmap</a>
      
        <a href="contact.html" class="nav-item nav-link">Contact</a>
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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

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
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
