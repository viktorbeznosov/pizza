@extends('layouts.admin')

@section('content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">

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

            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN PAGE BAR -->

            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title"> {{ $title }} </h3>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <form action="{{ route('admin.comments.update', $comment->id) }}" enctype="multipart/form-data" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                <div class="row">
                    <div class="col-md-6 ">
                        <!-- BEGIN SAMPLE FORM PORTLET-->
                        <div class="portlet light bordered min-height-300">
                            <div class="portlet-title">
                                <div class="caption font-red-sunglo">
                                    <i class="icon-settings font-red-sunglo"></i>
                                    <span class="caption-subject bold uppercase"> Данные</span>
                                </div>
                                <div class="actions">
                                    <div class="btn-group">
                                        <a class="btn btn-sm green dropdown-toggle" href="javascript:;" data-toggle="dropdown"> Actions
                                            <i class="fa fa-angle-down"></i>
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li>
                                                <a href="javascript:;">
                                                    <i class="fa fa-pencil"></i> Edit </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <i class="fa fa-trash-o"></i> Delete </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <i class="fa fa-ban"></i> Ban </a>
                                            </li>
                                            <li class="divider"> </li>
                                            <li>
                                                <a href="javascript:;"> Make admin </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @if(isset($comment))
                                <div class="form-group">
                                    <label>Автор</label>
                                    <div class="input-icon">
                                        <i class="fa fa-user font-green"></i>
                                        <span class="form-control">@if(isset($comment->user)) {{ $comment->user->name }} @else {{ $comment->name }} @endif</span>
                                    </div>
                                </div>
                            @endif

                            <div class="form-group">
                                <label>Описание</label>
                                <textarea name="text" class="form-control" rows="3" placeholder="описание">@if(isset($comment)){{ $comment->text }}@endif</textarea>
                            </div>
                        </div>
                        <!-- END SAMPLE FORM PORTLET-->

                    </div>
                    <div class="col-md-6 ">
                        <!-- BEGIN SAMPLE FORM PORTLET-->
                        <div class="portlet light bordered min-height-300">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-settings font-dark"></i>
                                    <span class="caption-subject font-dark sbold uppercase">Фото</span>
                                </div>
                                <div class="actions">
                                    <div class="btn-group btn-group-devided" data-toggle="buttons">
                                        <label class="btn btn-transparent dark btn-outline btn-circle btn-sm active">
                                            <input type="radio" name="options" class="toggle" id="option1">Actions</label>
                                        <label class="btn btn-transparent dark btn-outline btn-circle btn-sm">
                                            <input type="radio" name="options" class="toggle" id="option2">Settings</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END SAMPLE FORM PORTLET-->

                    </div>
                </div>
                <button type="submit" class="btn btn-success">Сохранить</button>
            </form>
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->

    <style>
        textarea[name="text"]{
            min-height: 110px;
        }
    </style>
@endsection