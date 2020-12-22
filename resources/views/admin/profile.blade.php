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
                                </div>
                                <!-- END PORTLET MAIN -->

                            </div>
                            <!-- END BEGIN PROFILE SIDEBAR -->
                            <!-- BEGIN PROFILE CONTENT -->
                            <form name="profile" action="{{ route('admin.profile_update', $admin->id) }}" enctype="multipart/form-data" method="post">
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
                                                    </ul>
                                                </div>
                                                <div class="portlet-body">
                                                    <div class="tab-content">
                                                        <!-- PERSONAL INFO TAB -->
                                                        <div class="tab-pane active" id="tab_1_1">
                                                            <div class="form-group">
                                                                <label class="control-label">Name</label>
                                                                <input type="text" placeholder="John" name="name" class="form-control" value="{{ $admin->name }}" />
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Email</label>
                                                                <input type="text" placeholder="Doe" class="form-control" name="email" value="{{ $admin->email }}" />
                                                            </div>
                                                        </div>
                                                        <!-- END PERSONAL INFO TAB -->
                                                        <!-- CHANGE AVATAR TAB -->
                                                        <div class="tab-pane" id="tab_1_2">


                                                            <div class="form-group">
                                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                        @if(isset($admin->image))
                                                                            <img src="{{ asset($admin->image) }}" alt="" /> </div>
                                                                        @else
                                                                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                                                        @endif
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

                                                        </div>
                                                        <!-- END CHANGE AVATAR TAB -->
                                                        <!-- CHANGE PASSWORD TAB -->
                                                        <div class="tab-pane" id="tab_1_3">
                                                            <div class="form-group">
                                                                <label class="control-label">Password</label>
                                                                <input type="password" name="password" class="form-control" />
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Confirm Password</label>
                                                                <input type="password" name="confirm_password" class="form-control" />
                                                            </div>
                                                        </div>
                                                        <!-- END CHANGE PASSWORD TAB -->
                                                    </div>
                                                </div>
                                                <div class="margiv-top-10">
                                                    <!--<a href="javascript:;" class="btn green"> Save Changes </a>-->
                                                    <button type="submit" class="btn btn-success">Сохранить</button>
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
            
<script>
    $(document).ready(function(){
        $('form[name="profile"]').on('submit', function(){
            var error = false;
            
            var password = $('input[name="password"]').val();
            var confirm_password = $('input[name="confirm_password"]').val();
            if ((password != '' || confirm_password != '') && password != confirm_password){
                toastr.warning('Пароли не совпадают');
                error = 1;
            }
            var name = $('input[name="name"]').val();
            var email = $('input[name="email"]').val();
            if (!name || name == ''){
                toastr.warning('Введите ваше имя!');
                error = 1;
            }
            if (!email || email == ''){
                toastr.warning('Введите ваше email!');
                error = 1;
            }            
            
            if (error){
                return false;
            }
        });
    })
</script>
            
@endsection

