@extends('layouts.site')

@section('content')
    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-4 sidebar ftco-animate">
                    <div class="product d-flex">
                        <div class="bio align-self-md-center mr-5">
                            <img src="{{ asset($user->image) }}" alt="Image placeholder" class="img-fluid mb-4">
                        </div>
                    </div>
                </div>                
                <div class="col-md-8 ftco-animate">

                    <form action="{{ route('account_update') }}" class="contact-form" method="POST">
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
                    </form>
  
                </div> <!-- .col-md-8 -->
            </div>
        </div>
    </section> <!-- .section -->
@endsection