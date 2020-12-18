@inject('GateHelper', 'App\Helpers\GateHelper')
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
            <form action="@if(isset($blog)){{ route('admin.blogs.update', $blog->id) }}@else{{ route('admin.blogs.store') }}@endif" enctype="multipart/form-data" method="post">
                {{ csrf_field() }}
                @if(isset($blog))
                    {{ method_field('PUT') }}
                @endif
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
                            <div class="form-group">
                                <label>Название</label>
                                <div class="input-icon">
                                    <i class="fa fa-bell-o font-green"></i>
                                    <input name="title" type="text" class="form-control" placeholder="название" value="@if(isset($blog)){{ $blog->title }}@endif">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Описание</label>
                                <textarea name="text" class="form-control" rows="3" placeholder="описание">@if(isset($blog)){{ $blog->text }}@endif</textarea>
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

                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                    @if(isset($blog->image))
                                        <img src="{{ asset($blog->image) }}" alt="" />
                                    @else
                                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                    @endif
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                <div>
                                    <span class="btn default btn-file">
                                    <span class="fileinput-new"> Select image </span>
                                    <span class="fileinput-exists"> Change </span>
                                    <input type="file" name="image"> </span>
                                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                </div>
                            </div>

                        </div>
                        <!-- END SAMPLE FORM PORTLET-->

                    </div>
                </div>
                <div class="row">
                    <div class="portlet light bordered min-height-300" style="width: 98%;margin: 0 auto;">
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label">Default Editor</label>
                                <div class="">
                                    <textarea name="body" id="summernote_1">
                                        @if(isset($blog)){!! $blog->body !!}@endif
                                    </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Сохранить</button>
            </form>
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
@endsection