@extends('layouts.admin')

@section('content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN PAGE BAR -->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="index.html">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>System</span>
                    </li>
                </ul>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title"> 404 Страница не найдена</h3>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <div class="row">
                <div class="col-md-12 page-404">
                    <div class="details">
                        <h3>404 Страница не найдена</h3>
                            <p> Страница не найдена либо у вас нет на нее прав
                                <br/><br/>
                                <a href="{{ route('admin.dashboard') }}"> Домашняя страница </a>
                            </p>
                            <form name="search" action="{{ route('admin.search') }}" method="GET">
                                <div class="input-group input-medium">
                                    <input type="text" name="q" class="form-control" placeholder="keyword...">
                                    <span class="input-group-btn">
                                                <button type="submit" class="btn green">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </span>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
@endsection