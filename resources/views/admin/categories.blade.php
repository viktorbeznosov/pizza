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
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="index.html">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <a href="#">Tables</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Datatables</span>
                    </li>
                </ul>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title"> {{ $title }} </h3>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-body">
                            <div class="table-toolbar">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="btn-group">
                                            <a href="{{ route('admin.cat.create') }}" id="sample_editable_1_new" class="btn sbold green"> Создать новую
                                                <i class="fa fa-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="btn-group pull-right">
                                            <button class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="fa fa-print"></i> Print </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                <thead>
                                <tr>
                                    <th>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                            <span></span>
                                        </label>
                                    </th>
                                    <th class="center"> Фото </th>
                                    <th class="center"> Название </th>
                                    <th class="center hidden-xs"> Описание </th>
                                    <th class="center"> Действия </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td class="center middle">
                                        <a href="{{ route('admin.cat.show', $category->id) }}">
                                            <img alt="" class="img-circle img-category" src="@if($category->image){{ asset($category->image) }}@else{{ asset('assets/images/no-image.png') }}@endif" />
                                        </a>
                                    </td>
                                    <td class="center middle">
                                        <a href="{{ route('admin.cat.show', $category->id) }}">
                                            {{ $category->name }}
                                        </a>
                                    </td>
                                    <td class="hidden-xs center middle">
                                        {{ $category->description }}
                                    </td>
                                    <td class="center middle">
                                        <div class="visible-md visible-lg hidden-sm hidden-xs">
                                            <a
                                                    href="{{ route('admin.cat.edit', $category->id) }}"
                                                    class="btn btn-transparent btn-xs"
                                                    tooltip-placement="top"
                                                    tooltip="Edit"
                                            >
                                                <span class="label label-sm label-success">Редактировать</span>
                                            </a>
                                            <a
                                                    href="#"
                                                    class="btn btn-transparent btn-xs tooltips"
                                                    tooltip-placement="top"
                                                    tooltip="Remove"
                                                    data-toggle="modal"
                                                    data-target="#basic"
                                                    data-category="{{ $category->id }}"
                                            >
                                                <span class="label label-sm label-danger">Удалить</span>
                                            </a>
                                        </div>
                                        <div class="visible-xs visible-sm hidden-md hidden-lg">
                                            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                                <i class="icon-wrench"></i>
                                            </a>
                                            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                                <i class="icon-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->

    <!-- MODAL -->
    <div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Удаление категории</h4>
                </div>
                <div class="modal-body"> Вы действительно хотите удалить категорию в месте со всеми товарами </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Закрыть</button>
                    <form action="" id="category-delete" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                    
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <style>
        .img-category{
            width: 30px ;
        }
        
        .modal-footer{
            display: flex;
            justify-content: flex-end;
        }
        
        #category-delete button[type="submit"]{
            margin-left: 10px;
        }
    </style>
    
    <script>
        $(document).ready(function(){
            $('a[data-toggle="modal"]').on('click', function(){
                var cat_id = $(this).data('category');
                $('#category-delete').attr('action','/admin/cat/' + cat_id);
            });
        });
    </script>    

@endsection
