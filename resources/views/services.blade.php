@extends('.layouts.site')

@section('content')
    <section class="home-slider owl-carousel img" style="background-image: url({{ asset('assets/images/bg_1.jpg') }});">

        <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_3.jpg') }});">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">

                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">Services</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Home</a></span> <span>{{ $title }}</span></p>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <section class="ftco-section ftco-services">
        <div class="overlay"></div>
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <h2 class="mb-4">Our Services</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                </div>
            </div>
            <div class="row">
                @foreach($services as $service)
                <div class="col-md-4 ftco-animate">
                    <div class="media d-block text-center block-6 services">
                        <div class="icon d-flex justify-content-center align-items-center mb-5">
                            <i class="{{ $service->icon }}"></i>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">{{ $service->name }}</h3>
                            <p>{{ $service->description }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <h2 class="mb-4">Hot Meals</h2>
                    <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
                    <p class="mt-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 text-center ftco-animate">
                    <div class="menu-wrap">
                        <a href="#" class="menu-img img mb-4" style="background-image: url({{ asset('assets/images/pizza-1.jpg') }});"></a>
                        <div class="text">
                            <h3><a href="#">Itallian Pizza</a></h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
                            <p class="price"><span>$2.90</span></p>
                            <p><a href="#" class="btn btn-white btn-outline-white">Add to cart</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center ftco-animate">
                    <div class="menu-wrap">
                        <a href="#" class="menu-img img mb-4" style="background-image: url({{ asset('assets/images/pizza-2.jpg') }});"></a>
                        <div class="text">
                            <h3><a href="#">Itallian Pizza</a></h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
                            <p class="price"><span>$2.90</span></p>
                            <p><a href="#" class="btn btn-white btn-outline-white">Add to cart</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center ftco-animate">
                    <div class="menu-wrap">
                        <a href="#" class="menu-img img mb-4" style="background-image: url({{ asset('assets/images/pizza-3.jpg') }});"></a>
                        <div class="text">
                            <h3><a href="#">Itallian Pizza</a></h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
                            <p class="price"><span>$2.90</span></p>
                            <p><a href="#" class="btn btn-white btn-outline-white">Add to cart</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center ftco-animate">
                    <div class="menu-wrap">
                        <a href="#" class="menu-img img mb-4" style="background-image: url({{ asset('assets/images/pizza-4.jpg') }});"></a>
                        <div class="text">
                            <h3><a href="#">Itallian Pizza</a></h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
                            <p class="price"><span>$2.90</span></p>
                            <p><a href="#" class="btn btn-white btn-outline-white">Add to cart</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection