<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pizza - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nothing+You+Could+Do" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.timepicker.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/materialdesignicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.css') }}">
    <link href="{{ asset('assets/metronic/global/plugins/bootstrap-toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />
    
    <script src="{{ asset('assets/metronic/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/metronic/global/plugins/bootstrap-toastr/toastr.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/metronic/pages/scripts/ui-toastr.min.js') }}" type="text/javascript"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <i class="mdi mdi-pizza"></i>Pizza<br>
            <small>Delicous</small></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item @if(Route::current()->getName() == 'home') active @endif"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                <li class="nav-item @if(Route::current()->getName() == 'menu') active @endif"><a href="{{ route('menu') }}" class="nav-link">Menu</a></li>
                <li class="nav-item @if(Route::current()->getName() == 'services') active @endif"><a href="{{ route('services') }}" class="nav-link">Services</a></li>
                <li class="nav-item @if(Route::current()->getName() == 'blog') active @endif"><a href="{{ route('blog') }}" class="nav-link">Blog</a></li>
                <li class="nav-item @if(Route::current()->getName() == 'about') active @endif"><a href="{{ route('about') }}" class="nav-link">About</a></li>
                <li class="nav-item @if(Route::current()->getName() == 'contact') active @endif"><a href="{{ route('contact') }}" class="nav-link">Contact</a></li>
                <li class="nav-item nav-account">
                    @if(Auth::user())
                    <a href="javascript:void(0)" class="nav-link">
                        {{ Auth::user()->email }}
                    </a>
                        <ul class="nav-account-dropdown">
                            <li>
                                <a href="{{ route('account') }}">Account</a>
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="post" class="nav-link form-logout">
                                    {{ csrf_field() }}
                                    <input type="submit" value="Logout">
                                </form>
                            </li>
                        </ul>
                    @else
                        <a href="{{ route('login') }}" class="nav-link">
                            Login
                        </a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
    <div class="cart">
        <a href="javascript:void(0)">
            <i class="mdi mdi-cart"></i>
            <span class="cart-count" class="count">2</span>
        </a>

    </div>
</nav>
<!-- END nav -->

@yield('content')

<footer class="ftco-footer ftco-section img">
    <div class="overlay"></div>
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">About Us</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                        <li class="ftco-animate"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li class="ftco-animate"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li class="ftco-animate"><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5 mb-md-5">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Recent Blog</h2>
                    <div class="block-21 mb-4 d-flex">
                        <a class="blog-img mr-4" style="background-image: url({{ asset('assets/images/image_1.jpg') }});"></a>
                        <div class="text">
                            <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                            <div class="meta">
                                <div><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> Sept 15, 2018</a></div>
                                <div><a href="#"><i class="fa fa-user" aria-hidden="true"></i> Admin</a></div>
                                <div><a href="#"><i class="fa fa-comment" aria-hidden="true"></i> 19</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="block-21 mb-4 d-flex">
                        <a class="blog-img mr-4" style="background-image: url({{ asset('assets/images/image_2.jpg') }});"></a>
                        <div class="text">
                            <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                            <div class="meta">
                                <div><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> Sept 15, 2018</a></div>
                                <div><a href="#"><i class="fa fa-user" aria-hidden="true"></i> Admin</a></div>
                                <div><a href="#"><i class="fa fa-comment" aria-hidden="true"></i> 19</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 mb-5 mb-md-5">
                <div class="ftco-footer-widget mb-4 ml-md-4">
                    <h2 class="ftco-heading-2">Services</h2>
                    <ul class="list-unstyled">
                        <li><a href="#" class="py-2 d-block">Cooked</a></li>
                        <li><a href="#" class="py-2 d-block">Deliver</a></li>
                        <li><a href="#" class="py-2 d-block">Quality Foods</a></li>
                        <li><a href="#" class="py-2 d-block">Mixed</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Have a Questions?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><i class="fa fa-map-marker" aria-hidden="true"></i><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                            <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i></span><span class="text">+2 392 3929 210</span></a></li>
                            <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i><span class="text">info@yourdomain.com</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">

                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>
        </div>
    </div>
</footer>



<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('assets/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/js/aos.js') }}"></script>
<script src="{{ asset('assets/js/jquery.animateNumber.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('assets/js/jquery.timepicker.min.js') }}"></script>
<script src="{{ asset('assets/js/scrollax.min.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="{{ asset('assets/js/google-map.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script>
    $(document).ready(function (){
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });          
        
        $('.nav-account').on('mouseover', function(){
            $(this).find('.nav-account-dropdown').slideDown(200);
        }).on('mouseleave', function (){
            $(this).find('.nav-account-dropdown').slideUp(200);
        });
    });
</script>

</body>
</html>