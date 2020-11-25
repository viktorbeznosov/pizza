@extends('layouts.site')

@section('content')
    <section class="ftco-section ftco-degree-bg">
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

            <form action="{{ route('account_update') }}" class="contact-form" enctype="multipart/form-data" method="POST">
                <div class="row">
                    <div class="col-md-4 sidebar ftco-animate">
                        <div class="product d-flex">
                            <div class="bio align-self-md-center mr-5">
                                @if(isset($user->image))
                                    sdgfasdf
                                    <img src="{{ asset($user->image) }}" alt="Image placeholder" class="img-fluid mb-4">
                                @else
                                    <img src="{{ asset('assets/images/no-image.png') }}" alt="Image placeholder" class="img-fluid mb-4">
                                @endif
                            </div>
                        </div>
                        <label>
                            <input type="file" name="image" onchange="inputChange(this)">
                            <span class="btn btn-primary change-img"> Изменить </span>
                            <span class="btn btn-primary reset-img"> Сбросить </span>
                        </label>

                    </div>
                    <div class="col-md-8 ftco-animate">


                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input name="name" type="text" class="form-control" value="{{ $user->name }}" placeholder="Your Name">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input name="email" type="text" class="form-control" value="{{ $user->email }}" placeholder="Your Email">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input name="phone" type="text" class="form-control" value="{{ $user->phone }}" placeholder="Your Phone">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input name="password" type="password" class="form-control" value="" placeholder="Your Password">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input name="confirm_pass" type="password" class="form-control" value="" placeholder="Confirm Password">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Submit" class="btn btn-primary py-3 px-5">
                        </div>

                    </div> <!-- .col-md-8 -->
                </div>
            </form>
        </div>
    </section> <!-- .section -->

    <style>
        .ftco-section{
            padding: 0;
        }

        .alert-danger{
            color: #000;
            background-color: #fac564;
            border-color: #fac564;
        }

        .reset-img{
            display: none;
        }

        input[type="file"]{
            display: none;
        }
    </style>

    <script>
        function inputChange(el) {
            $(el).closest('.sidebar').find('img').attr('src', window.URL.createObjectURL($(el)[0].files[0]));
            $('.reset-img').show();
        }

        $(document).ready(function () {
            $('.reset-img').on('click', function (event) {
                event.preventDefault();
                $(this).closest('.sidebar').find('img').attr('src', '{{ $user->image }}' );
                $(this).closest('.sidebar').find('input[type="file"]').val('');
                $('.reset-img').hide();
            });
        });
    </script>
@endsection