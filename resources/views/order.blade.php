@extends('.layouts.site')

@section('content')
    <section class="ftco-section">
        <div class="container">

            <!-- ALERTS -->
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
        @endif
        <!-- END ALERTS -->

            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center fadeInUp ftco-animated">
                    <h2 class="mb-4">{{ $title }}</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>

            <div class="container items">
                @foreach($order->products()->get() as $product)
                    <div class="order-goods-item d-flex">
                        <img src="{{ asset($product->image) }}" class="img" alt="">
                        <div class="text description">
                            <h3>{{ $product->name }}</h3>
                            <p>{{ $product->description }}</p>
                            <span>{{ $product->price }} р.</span>
                        </div>
                        <div class="dec-inc d-flex">
                            <input type="text" value="{{ $product->pivot->quantity }}" disabled="">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <style>
        .order-goods-item {
            margin-top: 10px;
        }

        .order-goods-item .img {
            height: 200px;
            width: 200px;
            object-fit: cover;
        }

        .order-goods-item .text {
            padding: 0 20px;
        }

        .description {
            flex-basis: 60%;
        }

        .dec-inc {
            height: 35px;
            align-self: center;
        }

        .dec-inc input {
            background: #fff;
            text-align: center;
            font-weight: 600;
            width: 35px;
            margin: 0 5px;
        }
    </style>
@endsection