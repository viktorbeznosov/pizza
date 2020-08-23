@extends('.layouts.site')

@section('content')
    <section class="home-slider owl-carousel img" style="background-image: url({{ asset('assets/images/bg_1.jpg') }});">

        <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_3.jpg') }});">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">

                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">Read our Blog</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Home</a></span> <span>Blog</span></p>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <h2 class="mb-4">{{ $title }}</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                </div>
            </div>
            <div class="row d-flex">
                @foreach($blogs as $blog)
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="blog-entry align-self-stretch">
                            <a href="{{ route('blog', $blog->id) }}" class="block-20" style="background-image: url('{{ asset($blog->image) }}');">
                            </a>
                            <div class="text py-4 d-block">
                                <div class="meta">
                                    <div><a href="{{ route('blog', $blog->id) }}">{{ $blog->crated_at }}</a></div>
                                    <div><a href="{{ route('blog', $blog->id) }}">{{ $blog->admin->name }}</a></div>
                                    <div><a href="{{ route('blog', $blog->id) }}" class="meta-chat"><i class="mdi mdi-chat"></i> 3</a></div>
                                </div>
                                <p>{{ $blog->text }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="row mt-5">
                <div class="col text-center">

                    <div class="pagination-wrapper">

                    </div>

                    <div class="block-27">
                        <a href="{{ $blogs->previousPageUrl() }}">&lt;</a>
                        {{ $blogs->links() }}
                        <a href="{{ $blogs->nextPageUrl() }}">&gt;</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .pagination{
            display: flex;
            justify-content: center;
        }

        .pagination li:first-child,
        .pagination li:last-child{
            display: none;
        }

        .block-27{
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .block-27 a{
            color: #fac564;
            text-align: center;
            display: inline-block;
            width: 40px;
            height: 40px;
            line-height: 40px;
            border-radius: 50%;
            border: 1px solid #bf7e06;
        }

        .block-27 ul li{
            margin: 0;
        }
    </style>
@endsection