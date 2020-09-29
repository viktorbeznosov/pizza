@extends('.layouts.site')

@section('content')
    <section class="home-slider owl-carousel img" style="background-image: url({{ asset('assets/images/bg_1.jpg') }});">

        <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_3.jpg') }});">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">

                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">Our Menu</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Menu</span></p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <h2 class="mb-4">Hot Products Meals</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                </div>
            </div>
        </div>
        <div class="container-wrap">
            <div class="row no-gutters d-flex">
                @foreach($hot as $item)
                    <div class="col-lg-4 d-flex ftco-animate product" data-id="{{ $item->id }}">
                        <div class="services-wrap d-flex">
                            <a href="{{ route('menu', $item->id) }}" class="img" data-image="{{ asset($item->image) }}" style="background-image: url({{ asset($item->image) }});"></a>
                            <div class="text p-4">
                                <h3><a href="{{ route('menu', $item->id) }}" class="name">{{ $item->name }}</a></h3>
                                <p>{{ $item->description }}</p>
                                <p><span class="price">{{ $item->price }} р.</span> <a href="javascript:void(0)" class="ml-2 btn btn-white btn-outline-white order">Order</a></p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

        <div class="container">
            <div class="row justify-content-center mb-5 pb-3 mt-5 pt-5">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <h2 class="mb-4">Our Pizza Pricing</h2>
                    <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
                    <p class="mt-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    @for($i = 0; $i < count($pizza); $i++)
                        @if(($i % 2) == 0) 
                            <div class="pricing-entry d-flex ftco-animate">
                                <a href="{{ route('menu', $pizza[$i]->id) }}"><div class="img" style="background-image: url({{ asset($pizza[$i]->image) }});"></div></a>
                                <div class="desc pl-3">
                                    <div class="d-flex text align-items-center">
                                        <h3><span><a href="{{ route('menu', $pizza[$i]->id) }}">{{ $pizza[$i]->name }}</a></span></h3>
                                        <span class="price">{{ $pizza[$i]->price }}  р.</span>
                                    </div>
                                    <div class="d-block">
                                        <p>{{ $pizza[$i]->description }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endfor
                </div>

                <div class="col-md-6">
                    @for($i = 0; $i < count($pizza); $i++)
                        @if(($i % 2) == 1)                    
                            <div class="pricing-entry d-flex ftco-animate">
                                <a href="{{ route('menu', $pizza[$i]->id) }}"><div class="img" style="background-image: url({{ asset($pizza[$i]->image) }});"></div></a>
                                <div class="desc pl-3">
                                    <div class="d-flex text align-items-center">
                                        <h3><span><a href="{{ route('menu', $pizza[$i]->id) }}">{{ $pizza[$i]->name }}</a></span></h3>
                                        <span class="price">{{ $pizza[$i]->price }} р.</span>
                                    </div>
                                    <div class="d-block">
                                        <p>{{ $pizza[$i]->description }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endfor                        
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-menu">
        <div class="container-fluid">
            <div class="row d-md-flex">
                <div class="col-lg-4 ftco-animate img f-menu-img mb-5 mb-md-0" style="background-image: url({{ asset('assets/images/about.jpg') }});">
                </div>
                <div class="col-lg-8 ftco-animate p-md-5">
                    <div class="row">
                        <div class="col-md-12 nav-link-wrap mb-5">
                            <div class="nav ftco-animate nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                @foreach($categories as $category)
                                    <a class="nav-link @if($category->id == 1) active @endif" id="v-pills-{{ $category->id }}-tab" data-toggle="pill" href="#v-pills-{{ $category->id }}" role="tab" aria-controls="v-pills-{{ $category->id }}" aria-selected="true">{{ $category->name }}</a>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-12 d-flex align-items-center">

                            <div class="tab-content ftco-animate" id="v-pills-tabContent">
                                @foreach($categories as $category)
                                    <div class="tab-pane fade show @if($category->id == 1) active @endif" id="v-pills-{{ $category->id }}" role="tabpanel" aria-labelledby="v-pills-{{ $category->id }}-tab">
                                    <div class="row">
                                        @foreach($category->products()->get() as $product)
                                            <div class="col-md-4 text-center product-item" data-id="{{ $product->id }}">
                                                <div class="menu-wrap">
                                                    <a href="#" class="menu-img img mb-4" data-image="{{ asset($product->image) }}" style="background-image: url({{ asset($product->image) }});"></a>
                                                    <div class="text">
                                                        <h3><a href="#" class="name">{{ $product->name }}</a></h3>
                                                        <p>{{ $product->description }}</p>
                                                        <p><span class="price">{{ $product->price }} р.</span></p>
                                                        <p><a href="javascript:void(0)" class="btn btn-white btn-outline-white btn-order">Add to cart</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .toast-success{
            background: #fac564;
        }
    </style>

<script>
    $(document).ready(function(){
        $('.order').on('click', function(){
            var id = $(this).closest('.product').data('id');
            var name = $(this).closest('.product').find('.name').html();
            var price = floatFormat(priceFormat($(this).closest('.product').find('.price').html()));
            var image = $(this).closest('.product').find('.img').data('image')
            
            var item = {
                'id': id,
                'name': name,
                'price': price,
                'image' : image
            }
            
            addToCart(item);
        });

        $('.btn-order').on('click', function () {
            var id = $(this).closest('.product-item').data('id');
            var name = $(this).closest('.product-item').find('.name').html();
            var price = floatFormat(priceFormat($(this).closest('.product-item').find('.price').html()));
            var image = $(this).closest('.product-item').find('.menu-img').data('image');

            var item = {
                'id': id,
                'name': name,
                'price': price,
                'image' : image
            }

            addToCart(item)
        });
    });
</script>
@endsection