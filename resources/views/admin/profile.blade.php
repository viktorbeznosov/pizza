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
                                <span>Profile</span>
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
                    <h3 class="page-title"> New User Profile | Account
                        <small>user account page</small>
                    </h3>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN PROFILE SIDEBAR -->
                            <div class="profile-sidebar">
                                <!-- PORTLET MAIN -->
                                <div class="portlet light profile-sidebar-portlet ">
                                    <!-- SIDEBAR USERPIC -->
                                    <div class="profile-userpic">
                                        <img src="{{ asset($admin->image) }}" class="img-responsive" alt=""> </div>
                                    <!-- END SIDEBAR USERPIC -->
                                    <!-- SIDEBAR USER TITLE -->
                                    <div class="profile-usertitle">
                                        <div class="profile-usertitle-name"> {{ $admin->name }} </div>
                                        <div class="profile-usertitle-job"> 
                                            @foreach($admin->roles()->get() as $role)
                                                <span class="label label-sm label-success label-role">
                                                    {{ $role->name }}
                                                </span>    
                                            @endforeach
                                        </div>
                                    </div>
                                    <!-- END SIDEBAR USER TITLE -->
                                    <!-- SIDEBAR BUTTONS -->
                                    <div class="profile-userbuttons">
                                        <button type="button" class="btn btn-circle green btn-sm">Follow</button>
                                        <button type="button" class="btn btn-circle red btn-sm">Message</button>
                                    </div>
                                    <!-- END SIDEBAR BUTTONS -->

                                </div>
                                <!-- END PORTLET MAIN -->

                            </div>
                            <!-- END BEGIN PROFILE SIDEBAR -->
                            <!-- BEGIN PROFILE CONTENT -->
                            <form action="{{ route('admin.profile_update', $admin->id) }}" enctype="multipart/form-data" method="post">
                                {{ csrf_field() }}
                                @if(isset($admin))
                                    {{ method_field('PUT') }}
                                @endif
                                <div class="profile-content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="portlet light ">
                                                <div class="portlet-title tabbable-line">
                                                    <div class="caption caption-md">
                                                        <i class="icon-globe theme-font hide"></i>
                                                        <span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
                                                    </div>
                                                    <ul class="nav nav-tabs">
                                                        <li class="active">
                                                            <a href="#tab_1_1" data-toggle="tab">Personal Info</a>
                                                        </li>
                                                        <li>
                                                            <a href="#tab_1_2" data-toggle="tab">Change Avatar</a>
                                                        </li>
                                                        <li>
                                                            <a href="#tab_1_3" data-toggle="tab">Change Password</a>
                                                        </li>
                                                        <li>
                                                            <a href="#tab_1_4" data-toggle="tab">Privacy Settings</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="portlet-body">
                                                    <div class="tab-content">
                                                        <!-- PERSONAL INFO TAB -->
                                                        <div class="tab-pane active" id="tab_1_1">
                                                            <form role="form" action="#">
                                                                <div class="form-group">
                                                                    <label class="control-label">Name</label>
                                                                    <input type="text" placeholder="John" name="name" class="form-control" value="{{ $admin->name }}" /> </div>
                                                                <div class="form-group">
                                                                    <label class="control-label">Email</label>
                                                                    <input type="text" placeholder="Doe" class="form-control" name="email" value="{{ $admin->email }}" /> </div>

                                                                <div class="margiv-top-10">
                                                                    <!--<a href="javascript:;" class="btn green"> Save Changes </a>-->
                                                                    <button type="submit" class="btn btn-success">Сохранить</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <!-- END PERSONAL INFO TAB -->
                                                        <!-- CHANGE AVATAR TAB -->
                                                        <div class="tab-pane" id="tab_1_2">
                                                            <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                                                eiusmod. </p>
                                                            <form action="#" role="form">
                                                                <div class="form-group">
                                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                                        <div>
                                                                            <span class="btn default btn-file">
                                                                                <span class="fileinput-new"> Select image </span>
                                                                                <span class="fileinput-exists"> Change </span>
                                                                                <input type="file" name="..."> </span>
                                                                            <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="clearfix margin-top-10">
                                                                        <span class="label label-danger">NOTE! </span>
                                                                        <span>Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span>
                                                                    </div>
                                                                </div>
                                                                <div class="margin-top-10">
                                                                    <a href="javascript:;" class="btn green"> Submit </a>
                                                                    <a href="javascript:;" class="btn default"> Cancel </a>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <!-- END CHANGE AVATAR TAB -->
                                                        <!-- CHANGE PASSWORD TAB -->
                                                        <div class="tab-pane" id="tab_1_3">
                                                            <form action="#">
                                                                <div class="form-group">
                                                                    <label class="control-label">Current Password</label>
                                                                    <input type="password" class="form-control" /> </div>
                                                                <div class="form-group">
                                                                    <label class="control-label">New Password</label>
                                                                    <input type="password" class="form-control" /> </div>
                                                                <div class="form-group">
                                                                    <label class="control-label">Re-type New Password</label>
                                                                    <input type="password" class="form-control" /> </div>
                                                                <div class="margin-top-10">
                                                                    <a href="javascript:;" class="btn green"> Change Password </a>
                                                                    <a href="javascript:;" class="btn default"> Cancel </a>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <!-- END CHANGE PASSWORD TAB -->
                                                        <!-- PRIVACY SETTINGS TAB -->
                                                        <div class="tab-pane" id="tab_1_4">
                                                            <form action="#">
                                                                <table class="table table-light table-hover">
                                                                    <tr>
                                                                        <td> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus.. </td>
                                                                        <td>
                                                                            <div class="mt-radio-inline">
                                                                                <label class="mt-radio">
                                                                                    <input type="radio" name="optionsRadios1" value="option1" /> Yes
                                                                                    <span></span>
                                                                                </label>
                                                                                <label class="mt-radio">
                                                                                    <input type="radio" name="optionsRadios1" value="option2" checked/> No
                                                                                    <span></span>
                                                                                </label>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
                                                                        <td>
                                                                            <div class="mt-radio-inline">
                                                                                <label class="mt-radio">
                                                                                    <input type="radio" name="optionsRadios11" value="option1" /> Yes
                                                                                    <span></span>
                                                                                </label>
                                                                                <label class="mt-radio">
                                                                                    <input type="radio" name="optionsRadios11" value="option2" checked/> No
                                                                                    <span></span>
                                                                                </label>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
                                                                        <td>
                                                                            <div class="mt-radio-inline">
                                                                                <label class="mt-radio">
                                                                                    <input type="radio" name="optionsRadios21" value="option1" /> Yes
                                                                                    <span></span>
                                                                                </label>
                                                                                <label class="mt-radio">
                                                                                    <input type="radio" name="optionsRadios21" value="option2" checked/> No
                                                                                    <span></span>
                                                                                </label>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
                                                                        <td>
                                                                            <div class="mt-radio-inline">
                                                                                <label class="mt-radio">
                                                                                    <input type="radio" name="optionsRadios31" value="option1" /> Yes
                                                                                    <span></span>
                                                                                </label>
                                                                                <label class="mt-radio">
                                                                                    <input type="radio" name="optionsRadios31" value="option2" checked/> No
                                                                                    <span></span>
                                                                                </label>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <!--end profile-settings-->
                                                                <div class="margin-top-10">
                                                                    <a href="javascript:;" class="btn red"> Save Changes </a>
                                                                    <a href="javascript:;" class="btn default"> Cancel </a>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <!-- END PRIVACY SETTINGS TAB -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- END PROFILE CONTENT -->
                        </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
@endsection

