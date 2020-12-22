@extends('layouts.admin')

@section('content')
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content" style="background-color: #465568!important;">
                    <div class="page-lock">
                        <div class="page-logo">
                            <a class="brand" href="index.html">
                                <img src="../assets/pages/img/logo-big.png" alt="logo" /> </a>
                        </div>
                        <div class="page-body">
                            <div class="lock-head"> Locked </div>
                            <div class="lock-body">
                                <div class="pull-left lock-avatar-block">
                                    <img src="../assets/pages/media/profile/photo3.jpg" class="lock-avatar"> </div>
                                <form class="lock-form pull-left" action="index.html" method="post">
                                    <h4>Amanda Smith</h4>
                                    <div class="form-group">
                                        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" /> </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn red uppercase">Login</button>
                                    </div>
                                </form>
                            </div>
                            <div class="lock-bottom">
                                <a href="">Not Amanda Smith?</a>
                            </div>
                        </div>
                        <div class="page-footer-custom"> 2014 &copy; Metronic. Admin Dashboard Template. </div>
                    </div>

                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
@endsection
