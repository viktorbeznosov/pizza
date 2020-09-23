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
                <div class="col-md-8 ftco-animate">

                    <div class="about-author d-flex">
                        <div class="bio align-self-md-center mr-5">
                            <img src="{{ asset($product->image) }}" alt="Image placeholder" class="img-fluid mb-4">
                        </div>
                        <div class="desc align-self-md-center">
                            <h3>{{ $product->name }}</h3>
                            <p>{{ $product->description }}</p>
                        </div>
                    </div>



                    <div class="blog-reply">
                        <a href="javascript:void(0)" class="reply">Reply</a>
                    </div>



                </div> <!-- .col-md-8 -->
                <div class="col-md-4 sidebar ftco-animate">
                    <div class="sidebar-box">
                        <form action="" class="search-form">
                            <div class="form-group">
                                <div class="icon">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </div>
                                <input type="text" class="form-control" placeholder="Search...">
                            </div>
                        </form>
                    </div>
                    <div class="sidebar-box ftco-animate">
                        <div class="categories">
                            <h3>Categories</h3>
                            <li><a href="#">Tour <span>(12)</span></a></li>
                            <li><a href="#">Hotel <span>(22)</span></a></li>
                            <li><a href="#">Coffee <span>(37)</span></a></li>
                            <li><a href="#">Drinks <span>(42)</span></a></li>
                            <li><a href="#">Foods <span>(14)</span></a></li>
                            <li><a href="#">Travel <span>(140)</span></a></li>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section> <!-- .section -->
    
    <style>
        .about-author img{
            max-width: 200px;
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