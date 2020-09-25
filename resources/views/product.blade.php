@extends('layouts.site')

@section('content')

    <section class="home-slider owl-carousel img" style="background-image: url({{ asset('assets/images/bg_1.jpg') }});">

        <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_1.jpg') }});">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">

                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">{{ $title }}</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Home</a></span> <span class="mr-2"><a href="{{ route('blog') }}">Blog</a></span> <span>Blog Single</span></p>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-4 sidebar ftco-animate">
                    <div class="product d-flex">
                        <div class="bio align-self-md-center mr-5">
                            <img src="{{ asset($product->image) }}" alt="Image placeholder" class="img-fluid mb-4">
                        </div>
                    </div>
                </div>                
                <div class="col-md-8 ftco-animate">

                    <div class="about-author d-flex">
                        <div class="desc align-self-md-center">
                            <h3>{{ $product->name }}</h3>
                            <p>{{ $product->description }}</p>
                        </div>
                    </div>
                    <div class="d-flex text align-items-center product-order">
                        <p class="price"><span>{{ $product->price }} р.</span> </p>
                        <a href="#" class="ml-2 btn btn-white btn-outline-white">Order</a>
                    </div>
                </div> <!-- .col-md-8 -->
            </div>
        </div>
    </section> <!-- .section -->
    
    <style>
        .product-order{
            justify-content: space-between;
        }
        
        .product img{
            max-width: 350px;
        }

        .comment-body .comment-form-wrap{
            display: none;
        }

        .blog-reply{
            margin-bottom: 20px;
        }

        .blog-reply a{
            display: none;
            padding: 5px 10px;
            background: #141414;
            color: #fff;
            text-transform: uppercase;
            font-size: 11px;
            letter-spacing: .1em;
            font-weight: 400;
            border-radius: 4px;
        }
        
        .toast-warning,
        .toast-info{
            background: #fac564;
        }
    </style>
    
    <script>

    </script>

@endsection