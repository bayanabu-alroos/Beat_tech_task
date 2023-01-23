@extends('layout.master')

@section('content')

<div class="collapse navbar-collapse" id="navbarCollapse">
    <div class="navbar-nav ms-auto py-4 py-lg-0">
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
                <h1 class="display-4 mb-3 animated slideInDown">STATE-OF-ART SOLUTIONS</h1>
                <p class="animated slideInDown">TO YOUR BUSINESS NEEDS </p>
            </div>
            <div class="col-lg-6 animated fadeIn">
                <img class="img-fluid animated pulse infinite" style="animation-duration: 3s;" src="img/hero-1.png"
                    alt="">
            </div>
        </div>
    </div>
</div>
<!-- Header End -->


<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <img class="img-fluid" src="img/about.png" alt="">
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="h-100">
                    <h1 class="display-6">About Us</h1>
                    <p class="text-primary fs-5 mb-4">Our Ethos</p>
                    {{-- <p>Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos.
                        Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet
                    </p>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet
                        diam et eos. Clita erat ipsum et lorem et sit.</p> --}}
                    <div class="d-flex align-items-center mb-2">
                        <i class="fa fa-check bg-light text-primary btn-sm-square rounded-circle me-3 fw-bold"></i>
                        <span>Mission</span>
                    </div>
                    <p class="mb-2">To passionately empower traders & investors by providing better & more impeccable trading services.</p>

                    <div class="d-flex align-items-center mb-2">
                        <i class="fa fa-check bg-light text-primary btn-sm-square rounded-circle me-3 fw-bold"></i>
                        <span>Vision</span>
                    </div>
                    <p class="mb-2">To be the brand for all things investing and trading. </p>

                    <div class="d-flex align-items-center mb-4">
                        <i class="fa fa-check bg-light text-primary btn-sm-square rounded-circle me-3 fw-bold"></i>
                        <span>Values</span>
                    </div>
                    <ul>
                        <li> Integrity and honesty above all – our long-standing reputation is our main asset.</li>
                        <li>Strive continuously towards excellence with discipline and dedication.</li>
                        <li>Professionalism together with a personal connection.</li>
                        <li>Support and empowerment for our clients, staff and associates.</li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Facts Start -->
<div class="container-xxl bg-light py-5 my-5">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-4 col-md-6 text-center wow fadeIn" data-wow-delay="0.1s">
                <img class="img-fluid mb-4" src="img/icon-9.png" alt="">
                <h1 class="display-4" data-toggle="counter-up">123456</h1>
                <p class="fs-5 text-primary mb-0">Today Transactions</p>
            </div>
            <div class="col-lg-4 col-md-6 text-center wow fadeIn" data-wow-delay="0.3s">
                <img class="img-fluid mb-4" src="img/icon-10.png" alt="">
                <h1 class="display-4" data-toggle="counter-up">123456</h1>
                <p class="fs-5 text-primary mb-0">Monthly Transactions</p>
            </div>
            <div class="col-lg-4 col-md-6 text-center wow fadeIn" data-wow-delay="0.5s">
                <img class="img-fluid mb-4" src="img/icon-2.png" alt="">
                <h1 class="display-4" data-toggle="counter-up">123456</h1>
                <p class="fs-5 text-primary mb-0">Total Transactions</p>
            </div>
        </div>
    </div>
</div>
<!-- Facts End -->


<!-- Features Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-6">Why Us!</h1>
            <p class="text-primary fs-5 mb-5">The Best In The crypto Industry</p>
        </div>
        <div class="row g-5">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="d-flex align-items-start">
                    <img class="img-fluid flex-shrink-0" src="img/icon-7.png" alt="">
                    <div class="ps-4">
                        <h5 class="mb-3">Easy To Start</h5>
                        <span>Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit
                            clita duo justo</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="d-flex align-items-start">
                    <img class="img-fluid flex-shrink-0" src="img/icon-6.png" alt="">
                    <div class="ps-4">
                        <h5 class="mb-3">Safe & Secure</h5>
                        <span>Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit
                            clita duo justo</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="d-flex align-items-start">
                    <img class="img-fluid flex-shrink-0" src="img/icon-5.png" alt="">
                    <div class="ps-4">
                        <h5 class="mb-3">Affordable Plans</h5>
                        <span>Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit
                            clita duo justo</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="d-flex align-items-start">
                    <img class="img-fluid flex-shrink-0" src="img/icon-4.png" alt="">
                    <div class="ps-4">
                        <h5 class="mb-3">Secure Storage</h5>
                        <span>Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit
                            clita duo justo</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="d-flex align-items-start">
                    <img class="img-fluid flex-shrink-0" src="img/icon-3.png" alt="">
                    <div class="ps-4">
                        <h5 class="mb-3">Protected By Insurance</h5>
                        <span>Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit
                            clita duo justo</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="d-flex align-items-start">
                    <img class="img-fluid flex-shrink-0" src="img/icon-8.png" alt="">
                    <div class="ps-4">
                        <h5 class="mb-3">24/7 Support</h5>
                        <span>Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit
                            clita duo justo</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Features End -->


<!-- Service Start -->
<div class="container-xxl bg-light py-5 my-5">
    <div class="container py-5">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-6">Services</h1>
            <p class="text-primary fs-5 mb-5">Buy, Sell And Exchange Cryptocurrency</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item bg-white p-5">
                    <img class="img-fluid mb-4" src="img/icon-7.png" alt="">
                    <h5 class="mb-3">Currency Wallet</h5>
                    <p>Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo
                        justo</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item bg-white p-5">
                    <img class="img-fluid mb-4" src="img/icon-3.png" alt="">
                    <h5 class="mb-3">Currency Transaction</h5>
                    <p>Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo
                        justo</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item bg-white p-5">
                    <img class="img-fluid mb-4" src="img/icon-9.png" alt="">
                    <h5 class="mb-3">Bitcoin Investment</h5>
                    <p>Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo
                        justo</p>
                    <a href="">Read More <i class="fa fa-arrow-right ms-2"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item bg-white p-5">
                    <img class="img-fluid mb-4" src="img/icon-5.png" alt="">
                    <h5 class="mb-3">Currency Exchange</h5>
                    <p>Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo
                        justo</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item bg-white p-5">
                    <img class="img-fluid mb-4" src="img/icon-2.png" alt="">
                    <h5 class="mb-3">Bitcoin Escrow</h5>
                    <p>Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo
                        justo</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item bg-white p-5">
                    <img class="img-fluid mb-4" src="img/icon-8.png" alt="">
                    <h5 class="mb-3">Token Sale</h5>
                    <p>Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo
                        justo</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->


<!-- Roadmap Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-6">Roadmap</h1>
            <p class="text-primary fs-5 mb-5">We Translate Your Dream Into Reality</p>
        </div>
        <div class="owl-carousel roadmap-carousel wow fadeInUp" data-wow-delay="0.1s">
            <div class="roadmap-item">
                <div class="roadmap-point"><span></span></div>
                <h5>January 2045</h5>
                <span>Diam dolor ipsum sit amet erat ipsum lorem sit</span>
            </div>
            <div class="roadmap-item">
                <div class="roadmap-point"><span></span></div>
                <h5>March 2045</h5>
                <span>Diam dolor ipsum sit amet erat ipsum lorem sit</span>
            </div>
            <div class="roadmap-item">
                <div class="roadmap-point"><span></span></div>
                <h5>May 2045</h5>
                <span>Diam dolor ipsum sit amet erat ipsum lorem sit</span>
            </div>
            <div class="roadmap-item">
                <div class="roadmap-point"><span></span></div>
                <h5>July 2045</h5>
                <span>Diam dolor ipsum sit amet erat ipsum lorem sit</span>
            </div>
            <div class="roadmap-item">
                <div class="roadmap-point"><span></span></div>
                <h5>September 2045</h5>
                <span>Diam dolor ipsum sit amet erat ipsum lorem sit</span>
            </div>
            <div class="roadmap-item">
                <div class="roadmap-point"><span></span></div>
                <h5>November 2045</h5>
                <span>Diam dolor ipsum sit amet erat ipsum lorem sit</span>
            </div>
        </div>
    </div>
</div>
<!-- Roadmap End -->





<!-- FAQs Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-6">FAQs</h1>
            <p class="text-primary fs-5 mb-5">Frequently Asked Questions</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item wow fadeInUp" data-wow-delay="0.1s">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Who is CFI?

                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                The CFI Financial Group is an award-winning global financial markets provider with over 24+ years of experience, and regulated entities in London, Larnaca, Dubai, Amman, Beirut, and Port Louis. The group is focused on providing an unrivaled and superior trading experience to private and institutional investors with multi-asset access, personalized and dedicated support, powerful analytics and daily market analysis, and highly advanced trading infrastructure with an expansive suite of trading platforms.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item wow fadeInUp" data-wow-delay="0.2s">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Where does CFI operate?

                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                The CFI Financial Group caters to clients across most of the countries in the world and includes regulated entities in London, Larnaca, Dubai, Amman, Beirut, and Port Louis. Each jurisdiction and regulated entity offers its services within that same country as well as potentially nearby countries or on a global scale.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item wow fadeInUp" data-wow-delay="0.3s">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                How long has CFI been regulated for?

                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                CFI started over 24+ years ago and since then, has been regulated. Each entity established under the CFI Financial Group is regulated by the top regulatory authority of the jurisdiction where it's present.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item wow fadeInUp" data-wow-delay="0.4s">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                Who are your regulators?

                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                • CFI London is authorized and regulated by the Financial Conduct Authority (FCA)M in the United Kingdom - FRN 828955. Company Registration Number 11634673.<br>
                                • CFI Dubai is regulated by the DFSA under license number F003933.<br>
                                • CFI Cyprus is authorized by the Cyprus Securities and Exchange Commission with CIF license No. 179/12.<br>
                                • CFI Jordan is regulated by the Jordan Securities Commission.<br>
                                • CFI Lebanon is regulated by the Banque du Liban (#40) and the Capital Markets Authority (#26).<br>
                                • CFI Mauritius is regulated by the Financial Services Commission.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item wow fadeInUp" data-wow-delay="0.5s">
                        <h2 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                How does CFI Make money?

                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                CFI generates revenue through the spread which is the difference between the bid and ask prices. On accounts with commissions, CFI makes money from the spread as well as an added charge to every trade.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item wow fadeInUp" data-wow-delay="0.6s">
                        <h2 class="accordion-header" id="headingSix">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                How long has CFI been regulated for?

                            </button>
                        </h2>
                        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                CFI started over 24+ years ago and since then, has been regulated. Each entity established under the CFI Financial Group is regulated by the top regulatory authority of the jurisdiction where it's present.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item wow fadeInUp" data-wow-delay="0.7s">
                        <h2 class="accordion-header" id="headingSeven">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                What are the deposit and withdrawal methods available?

                            </button>
                        </h2>
                        <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                The methods available differ according to jurisdiction and location but they include the most commonly used ones such as Wire transfers and credit cards. For more information, please log into your client portal.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item wow fadeInUp" data-wow-delay="0.8s">
                        <h2 class="accordion-header" id="headingEight">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                How do I deposit funds into my account?

                            </button>
                        </h2>
                        <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                1) Login into your account<br>
                                2) Click on "Deposit funds"<br>
                                3) Select your preferred deposit method<br>
                                4) Enter the amount and select the currency
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- FAQs Start -->

@endsection