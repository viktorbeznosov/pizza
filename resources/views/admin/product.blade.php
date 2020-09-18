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
            <form action="@if(isset($category)){{ route('admin.products.update', $product->id) }}@else{{ route('admin.products.store') }}@endif" enctype="multipart/form-data" method="post">
                <input type="hidden" name="cat_id" value="@if(isset($category)){{ $category->id }}@else{{ $catId }}@endif">
                {{ csrf_field() }}
                @if(isset($category))
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
                                    <input name="name" type="text" class="form-control" placeholder="название" value="@if(isset($product)){{ $product->name }}@endif">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Цена</label>
                                <div class="input-icon">
                                    <i class="fa fa-usd font-green" aria-hidden="true"></i>
                                    <input name="price" type="text" class="form-control" placeholder="цена" value="@if(isset($product)){{ $product->price }}@endif">
                                </div>
                            </div>                            
                            <div class="form-group">
                                <label>Описание</label>
                                <textarea name="description" class="form-control" rows="3" placeholder="описание">@if(isset($product)){{ $product->description }}@endif</textarea>
                            </div>
                            
                            <div class="form-group form-md-checkboxes">
                                <label for="form_control_1">Варианты</label>
                                <div class="md-checkbox-inline">
                                    <div class="md-checkbox">
                                        <input 
                                            type="checkbox" 
                                            id="checkbox2_4" 
                                            name="hot" 
                                            value="@if(isset($product)){{ $product->hot }}@endif" 
                                            class="md-check" 
                                            @if(isset($product) && $product->hot == 1) checked @endif
                                        >
                                        <label for="checkbox2_4">
                                            <span class="inc"></span>
                                            <span class="check"></span>
                                            <span class="box"></span> Hot </label>
                                    </div> 
                                </div>
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
                                    @if(isset($product->image))
                                        <img src="{{ asset($product->image) }}" alt="" />
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
                <button type="submit" class="btn btn-success">Сохранить</button>
            </form>
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
    
    <script>
        $(document).ready(function(){
            $('input[type="checkbox"]').on('change', function(){
                var val = $(this).val() == 0 ? 1 : 0; 
                $(this).val(val);
            })
        })
    </script>
    
@endsection
