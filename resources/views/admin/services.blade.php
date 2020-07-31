@extends('layouts.admin')

@section('content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN THEME PANEL -->
            <div class="theme-panel hidden-xs hidden-sm">
                <div class="toggler"> </div>
                <div class="toggler-close"> </div>
                <div class="theme-options">
                    <div class="theme-option theme-colors clearfix">
                        <span> THEME COLOR </span>
                        <ul>
                            <li class="color-default current tooltips" data-style="default" data-container="body" data-original-title="Default"> </li>
                            <li class="color-darkblue tooltips" data-style="darkblue" data-container="body" data-original-title="Dark Blue"> </li>
                            <li class="color-blue tooltips" data-style="blue" data-container="body" data-original-title="Blue"> </li>
                            <li class="color-grey tooltips" data-style="grey" data-container="body" data-original-title="Grey"> </li>
                            <li class="color-light tooltips" data-style="light" data-container="body" data-original-title="Light"> </li>
                            <li class="color-light2 tooltips" data-style="light2" data-container="body" data-html="true" data-original-title="Light 2"> </li>
                        </ul>
                    </div>
                    <div class="theme-option">
                        <span> Theme Style </span>
                        <select class="layout-style-option form-control input-sm">
                            <option value="square" selected="selected">Square corners</option>
                            <option value="rounded">Rounded corners</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span> Layout </span>
                        <select class="layout-option form-control input-sm">
                            <option value="fluid" selected="selected">Fluid</option>
                            <option value="boxed">Boxed</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span> Header </span>
                        <select class="page-header-option form-control input-sm">
                            <option value="fixed" selected="selected">Fixed</option>
                            <option value="default">Default</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span> Top Menu Dropdown</span>
                        <select class="page-header-top-dropdown-style-option form-control input-sm">
                            <option value="light" selected="selected">Light</option>
                            <option value="dark">Dark</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span> Sidebar Mode</span>
                        <select class="sidebar-option form-control input-sm">
                            <option value="fixed">Fixed</option>
                            <option value="default" selected="selected">Default</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span> Sidebar Menu </span>
                        <select class="sidebar-menu-option form-control input-sm">
                            <option value="accordion" selected="selected">Accordion</option>
                            <option value="hover">Hover</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span> Sidebar Style </span>
                        <select class="sidebar-style-option form-control input-sm">
                            <option value="default" selected="selected">Default</option>
                            <option value="light">Light</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span> Sidebar Position </span>
                        <select class="sidebar-pos-option form-control input-sm">
                            <option value="left" selected="selected">Left</option>
                            <option value="right">Right</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span> Footer </span>
                        <select class="page-footer-option form-control input-sm">
                            <option value="fixed">Fixed</option>
                            <option value="default" selected="selected">Default</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- END THEME PANEL -->
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
            <h3 class="page-title"> Managed Datatables
                <small>managed datatable samples</small>
            </h3>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-dark">
                                <i class="icon-settings font-dark"></i>
                                <span class="caption-subject bold uppercase"> Managed Table</span>
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
                        <div class="portlet-body">
                            <div class="table-toolbar">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="btn-group">
                                            <button id="sample_editable_1_new" class="btn sbold green"> Add New
                                                <i class="fa fa-plus"></i>
                                            </button>
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
                                    <th> Username </th>
                                    <th> Email </th>
                                    <th> Status </th>
                                    <th> Joined </th>
                                    <th> Actions </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> shuxer </td>
                                    <td>
                                        <a href="mailto:shuxer@gmail.com"> shuxer@gmail.com </a>
                                    </td>
                                    <td>
                                        <span class="label label-sm label-success"> Approved </span>
                                    </td>
                                    <td class="center"> 12 Jan 2012 </td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-docs"></i> New Post </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-tag"></i> New Comment </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-user"></i> New User </a>
                                                </li>
                                                <li class="divider"> </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-flag"></i> Comments
                                                        <span class="badge badge-success">4</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> looper </td>
                                    <td>
                                        <a href="mailto:looper90@gmail.com"> looper90@gmail.com </a>
                                    </td>
                                    <td>
                                        <span class="label label-sm label-warning"> Suspended </span>
                                    </td>
                                    <td class="center"> 12.12.2011 </td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-docs"></i> New Post </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-tag"></i> New Comment </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-user"></i> New User </a>
                                                </li>
                                                <li class="divider"> </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-flag"></i> Comments
                                                        <span class="badge badge-success">4</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> userwow </td>
                                    <td>
                                        <a href="mailto:userwow@yahoo.com"> userwow@yahoo.com </a>
                                    </td>
                                    <td>
                                        <span class="label label-sm label-success"> Approved </span>
                                    </td>
                                    <td class="center"> 12.12.2011 </td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-docs"></i> New Post </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-tag"></i> New Comment </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-user"></i> New User </a>
                                                </li>
                                                <li class="divider"> </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-flag"></i> Comments
                                                        <span class="badge badge-success">4</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> user1wow </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> userwow@gmail.com </a>
                                    </td>
                                    <td>
                                        <span class="label label-sm label-danger"> Blocked </span>
                                    </td>
                                    <td class="center"> 12.12.2011 </td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-docs"></i> New Post </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-tag"></i> New Comment </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-user"></i> New User </a>
                                                </li>
                                                <li class="divider"> </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-flag"></i> Comments
                                                        <span class="badge badge-success">4</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> restest </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> test@gmail.com </a>
                                    </td>
                                    <td>
                                        <span class="label label-sm label-success"> Approved </span>
                                    </td>
                                    <td class="center"> 12.12.2011 </td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-docs"></i> New Post </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-tag"></i> New Comment </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-user"></i> New User </a>
                                                </li>
                                                <li class="divider"> </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-flag"></i> Comments
                                                        <span class="badge badge-success">4</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> foopl </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                    </td>
                                    <td>
                                        <span class="label label-sm label-info"> Info </span>
                                    </td>
                                    <td class="center"> 12.12.2011 </td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-docs"></i> New Post </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-tag"></i> New Comment </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-user"></i> New User </a>
                                                </li>
                                                <li class="divider"> </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-flag"></i> Comments
                                                        <span class="badge badge-success">4</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> weep </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                    </td>
                                    <td>
                                        <span class="label label-sm label-danger"> Rejected </span>
                                    </td>
                                    <td class="center"> 12.12.2011 </td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-docs"></i> New Post </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-tag"></i> New Comment </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-user"></i> New User </a>
                                                </li>
                                                <li class="divider"> </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-flag"></i> Comments
                                                        <span class="badge badge-success">4</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> coop </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                    </td>
                                    <td>
                                        <span class="label label-sm label-info"> Info </span>
                                    </td>
                                    <td class="center"> 12.12.2011 </td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-docs"></i> New Post </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-tag"></i> New Comment </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-user"></i> New User </a>
                                                </li>
                                                <li class="divider"> </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-flag"></i> Comments
                                                        <span class="badge badge-success">4</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> pppol </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                    </td>
                                    <td>
                                        <span class="label label-sm label-danger"> Suspended </span>
                                    </td>
                                    <td class="center"> 12.12.2011 </td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-docs"></i> New Post </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-tag"></i> New Comment </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-user"></i> New User </a>
                                                </li>
                                                <li class="divider"> </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-flag"></i> Comments
                                                        <span class="badge badge-success">4</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> test </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                    </td>
                                    <td>
                                        <span class="label label-sm label-warning"> Suspended </span>
                                    </td>
                                    <td class="center"> 12.12.2011 </td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-docs"></i> New Post </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-tag"></i> New Comment </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-user"></i> New User </a>
                                                </li>
                                                <li class="divider"> </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-flag"></i> Comments
                                                        <span class="badge badge-success">4</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> userwow </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> userwow@gmail.com </a>
                                    </td>
                                    <td>
                                        <span class="label label-sm label-warning"> Suspended </span>
                                    </td>
                                    <td class="center"> 12.12.2011 </td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-docs"></i> New Post </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-tag"></i> New Comment </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-user"></i> New User </a>
                                                </li>
                                                <li class="divider"> </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-flag"></i> Comments
                                                        <span class="badge badge-success">4</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> test </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> test@gmail.com </a>
                                    </td>
                                    <td>
                                        <span class="label label-sm label-warning"> Suspended </span>
                                    </td>
                                    <td class="center"> 12.12.2011 </td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-docs"></i> New Post </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-tag"></i> New Comment </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-user"></i> New User </a>
                                                </li>
                                                <li class="divider"> </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-flag"></i> Comments
                                                        <span class="badge badge-success">4</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> goop </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                    </td>
                                    <td>
                                        <span class="label label-sm label-warning"> Suspended </span>
                                    </td>
                                    <td class="center"> 12.12.2011 </td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-docs"></i> New Post </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-tag"></i> New Comment </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-user"></i> New User </a>
                                                </li>
                                                <li class="divider"> </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-flag"></i> Comments
                                                        <span class="badge badge-success">4</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> weep </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                    </td>
                                    <td>
                                        <span class="label label-sm label-warning"> Suspended </span>
                                    </td>
                                    <td class="center"> 12.12.2011 </td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-docs"></i> New Post </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-tag"></i> New Comment </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-user"></i> New User </a>
                                                </li>
                                                <li class="divider"> </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-flag"></i> Comments
                                                        <span class="badge badge-success">4</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> toopl </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                    </td>
                                    <td>
                                        <span class="label label-sm label-warning"> Suspended </span>
                                    </td>
                                    <td class="center"> 12.12.2011 </td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-docs"></i> New Post </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-tag"></i> New Comment </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-user"></i> New User </a>
                                                </li>
                                                <li class="divider"> </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-flag"></i> Comments
                                                        <span class="badge badge-success">4</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> userwow </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> userwow@gmail.com </a>
                                    </td>
                                    <td>
                                        <span class="label label-sm label-warning"> Suspended </span>
                                    </td>
                                    <td class="center"> 12.12.2011 </td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-docs"></i> New Post </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-tag"></i> New Comment </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-user"></i> New User </a>
                                                </li>
                                                <li class="divider"> </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-flag"></i> Comments
                                                        <span class="badge badge-success">4</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> tes21t </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> test@gmail.com </a>
                                    </td>
                                    <td>
                                        <span class="label label-sm label-warning"> Suspended </span>
                                    </td>
                                    <td class="center"> 12.12.2011 </td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-docs"></i> New Post </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-tag"></i> New Comment </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-user"></i> New User </a>
                                                </li>
                                                <li class="divider"> </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-flag"></i> Comments
                                                        <span class="badge badge-success">4</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> fop </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                    </td>
                                    <td>
                                        <span class="label label-sm label-warning"> Suspended </span>
                                    </td>
                                    <td class="center"> 12.12.2011 </td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-docs"></i> New Post </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-tag"></i> New Comment </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-user"></i> New User </a>
                                                </li>
                                                <li class="divider"> </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-flag"></i> Comments
                                                        <span class="badge badge-success">4</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> kop </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                    </td>
                                    <td>
                                        <span class="label label-sm label-warning"> Suspended </span>
                                    </td>
                                    <td class="center"> 12.12.2011 </td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-docs"></i> New Post </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-tag"></i> New Comment </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-user"></i> New User </a>
                                                </li>
                                                <li class="divider"> </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-flag"></i> Comments
                                                        <span class="badge badge-success">4</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> vopl </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                    </td>
                                    <td>
                                        <span class="label label-sm label-warning"> Suspended </span>
                                    </td>
                                    <td class="center"> 12.12.2011 </td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-docs"></i> New Post </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-tag"></i> New Comment </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-user"></i> New User </a>
                                                </li>
                                                <li class="divider"> </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-flag"></i> Comments
                                                        <span class="badge badge-success">4</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> userwow </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> userwow@gmail.com </a>
                                    </td>
                                    <td>
                                        <span class="label label-sm label-warning"> Suspended </span>
                                    </td>
                                    <td class="center"> 12.12.2011 </td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-docs"></i> New Post </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-tag"></i> New Comment </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-user"></i> New User </a>
                                                </li>
                                                <li class="divider"> </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-flag"></i> Comments
                                                        <span class="badge badge-success">4</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> wap </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> test@gmail.com </a>
                                    </td>
                                    <td>
                                        <span class="label label-sm label-warning"> Suspended </span>
                                    </td>
                                    <td class="center"> 12.12.2011 </td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-docs"></i> New Post </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-tag"></i> New Comment </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-user"></i> New User </a>
                                                </li>
                                                <li class="divider"> </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-flag"></i> Comments
                                                        <span class="badge badge-success">4</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> test </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                    </td>
                                    <td>
                                        <span class="label label-sm label-warning"> Suspended </span>
                                    </td>
                                    <td class="center"> 12.12.2011 </td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-docs"></i> New Post </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-tag"></i> New Comment </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-user"></i> New User </a>
                                                </li>
                                                <li class="divider"> </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-flag"></i> Comments
                                                        <span class="badge badge-success">4</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> toop </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                    </td>
                                    <td>
                                        <span class="label label-sm label-warning"> Suspended </span>
                                    </td>
                                    <td class="center"> 12.12.2011 </td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-docs"></i> New Post </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-tag"></i> New Comment </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-user"></i> New User </a>
                                                </li>
                                                <li class="divider"> </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-flag"></i> Comments
                                                        <span class="badge badge-success">4</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> weep </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                    </td>
                                    <td>
                                        <span class="label label-sm label-warning"> Suspended </span>
                                    </td>
                                    <td class="center"> 12.12.2011 </td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-docs"></i> New Post </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-tag"></i> New Comment </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-user"></i> New User </a>
                                                </li>
                                                <li class="divider"> </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-flag"></i> Comments
                                                        <span class="badge badge-success">4</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light portlet-fit portlet-datatable bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class=" icon-layers font-green"></i>
                                <span class="caption-subject font-green sbold uppercase">Sample Datatable</span>
                            </div>
                            <div class="actions">
                                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                    <i class="icon-cloud-upload"></i>
                                </a>
                                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                    <i class="icon-wrench"></i>
                                </a>
                                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                    <i class="icon-trash"></i>
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_2">
                                <thead>
                                <tr>
                                    <th class="table-checkbox">
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="group-checkable" data-set="#sample_2 .checkboxes" />
                                            <span></span>
                                        </label>
                                    </th>
                                    <th> Username </th>
                                    <th> Email </th>
                                    <th> Status </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> shuxer </td>
                                    <td>
                                        <a href="mailto:shuxer@gmail.com"> shuxer@gmail.com </a>
                                    </td>
                                    <td>
                                        <span class="label label-sm label-success"> Approved </span>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> looper </td>
                                    <td>
                                        <a href="mailto:looper90@gmail.com"> looper90@gmail.com </a>
                                    </td>
                                    <td>
                                        <span class="label label-sm label-warning"> Suspended </span>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> userwow </td>
                                    <td>
                                        <a href="mailto:userwow@yahoo.com"> userwow@yahoo.com </a>
                                    </td>
                                    <td>
                                        <span class="label label-sm label-success"> Approved </span>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> user1wow </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> userwow@gmail.com </a>
                                    </td>
                                    <td>
                                        <span class="label label-sm label-default"> Blocked </span>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> restest </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> test@gmail.com </a>
                                    </td>
                                    <td>
                                        <span class="label label-sm label-success"> Approved </span>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> foopl </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                    </td>
                                    <td>
                                        <span class="label label-sm label-success"> Approved </span>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> weep </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                    </td>
                                    <td>
                                        <span class="label label-sm label-success"> Approved </span>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> coop </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                    </td>
                                    <td>
                                        <span class="label label-sm label-success"> Approved </span>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> pppol </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                    </td>
                                    <td>
                                        <span class="label label-sm label-success"> Approved </span>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> test </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                    </td>
                                    <td>
                                        <span class="label label-sm label-success"> Approved </span>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> userwow </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> userwow@gmail.com </a>
                                    </td>
                                    <td>
                                        <span class="label label-sm label-default"> Blocked </span>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> test </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> test@gmail.com </a>
                                    </td>
                                    <td>
                                        <span class="label label-sm label-success"> Approved </span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
                <div class="col-md-6 col-sm-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet box red">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-cogs"></i>Table </div>
                            <div class="actions">
                                <a href="javascript:;" class="btn btn-default btn-sm">
                                    <i class="fa fa-plus"></i> Add </a>
                                <a href="javascript:;" class="btn btn-default btn-sm">
                                    <i class="fa fa-print"></i> Print </a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_3">
                                <thead>
                                <tr>
                                    <th class="table-checkbox">
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes" />
                                            <span></span>
                                        </label>
                                    </th>
                                    <th> Username </th>
                                    <th> Email </th>
                                    <th> Status </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> shuxer </td>
                                    <td>
                                        <a href="mailto:shuxer@gmail.com"> shuxer@gmail.com </a>
                                    </td>
                                    <td>
                                        <span class="label label-sm label-success"> Approved </span>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> looper </td>
                                    <td>
                                        <a href="mailto:looper90@gmail.com"> looper90@gmail.com </a>
                                    </td>
                                    <td>
                                        <span class="label label-sm label-warning"> Suspended </span>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> userwow </td>
                                    <td>
                                        <a href="mailto:userwow@yahoo.com"> userwow@yahoo.com </a>
                                    </td>
                                    <td>
                                        <span class="label label-sm label-success"> Approved </span>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> user1wow </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> userwow@gmail.com </a>
                                    </td>
                                    <td>
                                        <span class="label label-sm label-default"> Blocked </span>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> restest </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> test@gmail.com </a>
                                    </td>
                                    <td>
                                        <span class="label label-sm label-success"> Approved </span>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> foopl </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                    </td>
                                    <td>
                                        <span class="label label-sm label-success"> Approved </span>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> weep </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                    </td>
                                    <td>
                                        <span class="label label-sm label-success"> Approved </span>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> coop </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                    </td>
                                    <td>
                                        <span class="label label-sm label-success"> Approved </span>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> pppol </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                    </td>
                                    <td>
                                        <span class="label label-sm label-success"> Approved </span>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> test </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                    </td>
                                    <td>
                                        <span class="label label-sm label-success"> Approved </span>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> userwow </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> userwow@gmail.com </a>
                                    </td>
                                    <td>
                                        <span class="label label-sm label-default"> Blocked </span>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> test </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> test@gmail.com </a>
                                    </td>
                                    <td>
                                        <span class="label label-sm label-success"> Approved </span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light portlet-fit portlet-datatable bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class=" icon-layers font-dark"></i>
                                <span class="caption-subject font-dark sbold uppercase">Table Footer</span>
                            </div>
                            <div class="actions">
                                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                    <i class="icon-cloud-upload"></i>
                                </a>
                                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                    <i class="icon-wrench"></i>
                                </a>
                                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                    <i class="icon-trash"></i>
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_4">
                                <thead>
                                <tr>
                                    <th class="table-checkbox">
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="group-checkable" data-set="#sample_4 .checkboxes" />
                                            <span></span>
                                        </label>
                                    </th>
                                    <th> Username </th>
                                    <th> Email </th>
                                    <th> Salary </th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th class="table-checkbox"> </th>
                                    <th> Username </th>
                                    <th> Email </th>
                                    <th> Salary </th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> shuxer </td>
                                    <td>
                                        <a href="mailto:shuxer@gmail.com"> shuxer@gmail.com </a>
                                    </td>
                                    <td> $1240 </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> looper </td>
                                    <td>
                                        <a href="mailto:looper90@gmail.com"> looper90@gmail.com </a>
                                    </td>
                                    <td> $2122 </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> userwow </td>
                                    <td>
                                        <a href="mailto:userwow@yahoo.com"> userwow@yahoo.com </a>
                                    </td>
                                    <td> $2324 </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> user1wow </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> userwow@gmail.com </a>
                                    </td>
                                    <td> $1234 </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> restest </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> test@gmail.com </a>
                                    </td>
                                    <td> $1233 </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> foopl </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                    </td>
                                    <td> $4321 </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> weep </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                    </td>
                                    <td> $1244 </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> coop </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                    </td>
                                    <td> $5422 </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> pppol </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                    </td>
                                    <td> $1234 </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> test </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                    </td>
                                    <td> $6321 </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> userwow </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> userwow@gmail.com </a>
                                    </td>
                                    <td> $1235 </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> test </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> test@gmail.com </a>
                                    </td>
                                    <td> $2323 </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
                <div class="col-md-6 col-sm-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light portlet-fit portlet-datatable bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class=" icon-layers font-red"></i>
                                <span class="caption-subject font-red sbold uppercase">Table Footer Feedback</span>
                            </div>
                            <div class="actions">
                                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                    <i class="icon-cloud-upload"></i>
                                </a>
                                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                    <i class="icon-wrench"></i>
                                </a>
                                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                    <i class="icon-trash"></i>
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_5">
                                <thead>
                                <tr>
                                    <th class="table-checkbox">
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="group-checkable" data-set="#sample_5 .checkboxes" />
                                            <span></span>
                                        </label>
                                    </th>
                                    <th> Username </th>
                                    <th> Email </th>
                                    <th> Salary </th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th colspan="3" style="text-align:right">Total:&nbsp;&nbsp;</th>
                                    <th></th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> shuxer </td>
                                    <td>
                                        <a href="mailto:shuxer@gmail.com"> shuxer@gmail.com </a>
                                    </td>
                                    <td> $1240 </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> looper </td>
                                    <td>
                                        <a href="mailto:looper90@gmail.com"> looper90@gmail.com </a>
                                    </td>
                                    <td> $2122 </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> userwow </td>
                                    <td>
                                        <a href="mailto:userwow@yahoo.com"> userwow@yahoo.com </a>
                                    </td>
                                    <td> $2324 </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> user1wow </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> userwow@gmail.com </a>
                                    </td>
                                    <td> $1234 </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> restest </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> test@gmail.com </a>
                                    </td>
                                    <td> $1233 </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> foopl </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                    </td>
                                    <td> $4321 </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> weep </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                    </td>
                                    <td> $1244 </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> coop </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                    </td>
                                    <td> $5422 </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> pppol </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                    </td>
                                    <td> $1234 </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> test </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                    </td>
                                    <td> $6321 </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> userwow </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> userwow@gmail.com </a>
                                    </td>
                                    <td> $1235 </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td> test </td>
                                    <td>
                                        <a href="mailto:userwow@gmail.com"> test@gmail.com </a>
                                    </td>
                                    <td> $2323 </td>
                                </tr>
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
@endsection