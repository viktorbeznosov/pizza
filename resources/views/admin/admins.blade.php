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
                <div class="page-toolbar">
                    <div class="btn-group pull-right">
                        <button type="button" class="btn green btn-sm btn-outline dropdown-toggle" data-toggle="dropdown"> Actions
                            <i class="fa fa-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu pull-right" role="menu">
                            <li>
                                <a href="#">
                                    <i class="icon-bell"></i> Action</a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icon-shield"></i> Another action</a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icon-user"></i> Something else here</a>
                            </li>
                            <li class="divider"> </li>
                            <li>
                                <a href="#">
                                    <i class="icon-bag"></i> Separated link</a>
                            </li>
                        </ul>
                    </div>
                </div>
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
                                            <a href="{{ route('admin.admins.create') }}" id="sample_editable_1_new" class="btn sbold green"> Создать нового
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
                            <table class="table table-striped table-bordered table-hover table-checkable order-column table-admins" id="sample_1">
                                <thead>
                                <tr>
                                    <th>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                            <span></span>
                                        </label>
                                    </th>
                                    <th class="center"> Photo </th>
                                    <th class="center"> Username </th>
                                    <th class="center"> Email </th>
                                    <th class="center"> Role </th>
                                    <th class="center"> Joined </th>
                                    <th class="center"> Actions </th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($admins as $admin)
                                        <tr class="odd gradeX">
                                    <td class="center middle">
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td class="center middle">
                                        <img alt="" class="img-circle" src="@if($admin->image){{ asset($admin->image) }}@else{{ asset('assets/images/no-image.png') }}@endif" />
                                    </td>
                                    <td class="center middle"> {{ $admin->name }} </td>
                                    <td class="center middle">
                                        <a href="{{ $admin->email }}"> {{ $admin->email }} </a>
                                    </td>
                                    <td class="center middle">
                                        @if(count($admin->roles()->get()) > 0)
                                            @foreach($admin->roles()->get() as $role)
                                                <span class="label label-sm label-success label-role">
                                                    {{ $role->name }}
                                                </span>    
                                            @endforeach
                                            
                                        @endif
                                    </td>
                                    <td class="center middle"> @if(isset($admin->created_at)){{ $admin->created_at->format('d.m.Y') }}@endif </td>
                                    <td class="center middle">
                                        @if($GateHelper->all('UPDATE_ADMINS','DELETE_ADMINS', array('user' => $admin)))
                                        <div class="visible-md visible-lg hidden-sm hidden-xs">
                                            <a
                                                    href="{{ route('admin.admins.edit', $admin->id) }}"
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
                                                    data-admin="{{ $admin->id }}"
                                            >
                                                <span class="label label-sm label-danger">Удалить</span>
                                            </a>
                                        </div>

                                        <div class="visible-xs visible-sm hidden-md hidden-lg">
                                            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                                <i class="icon-wrench"></i>
                                            </a>
                                            <a
                                               class="btn btn-circle btn-icon-only btn-default"
                                               href="javascript:;"
                                               tooltip-placement="top"
                                               tooltip="Remove"
                                               data-toggle="modal"
                                               data-target="#basic"
                                               data-admin="{{ $admin->id }}"
                                            >
                                                <i class="icon-trash"></i>
                                            </a>
                                        </div>
                                        @endif
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
                    <h4 class="modal-title">Modal Title</h4>
                </div>
                <div class="modal-body"> Modal body goes here </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                    <form action="" id="admin-delete" method="post">
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
        .modal-footer{
            display: flex;
            justify-content: flex-end;
        }

        #admin-delete button[type="submit"]{
            margin-left: 10px;
        }
        
        .label-role{
            margin: 3px;
        }
    </style>

    <script>
        $(document).ready(function(){
            $('a[data-toggle="modal"]').on('click', function(){
                var admin_id = $(this).data('admin');
                $('#admin-delete').attr('action','/admin/admins/' + admin_id);
            });
        });
    </script>

@endsection