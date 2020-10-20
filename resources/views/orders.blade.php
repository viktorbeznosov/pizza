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
                @foreach($orders as $order)
                    <a href="{{ route('orders', ['user_id' => Auth::user()->id, 'order_id' => $order->id]) }}">
                        <div class="order-item d-flex">
                            <p>{{ $order->created_at->format('d.m.Y H:i') }}</p>
                            <p>{{ $order->getTotalPrice() }} руб.</p>
                            <p>{{ $order->status->Name }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <style>
        .order-item{
            margin-top:5px;
            border: 2px solid gray;
            align-items: center;
        }

        .order-item p{
            margin: 10px;
        }

        .order-item p:first-child{
            width: 30%;
        }

        .order-item p:nth-child(2){
            flex-grow: 1;
        }
    </style>
@endsection