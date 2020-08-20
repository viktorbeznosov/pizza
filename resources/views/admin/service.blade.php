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
            <form action="@if(isset($service)){{ route('admin.services.update', $service->id) }}@else{{ route('admin.services.store') }}@endif" method="post">
                {{ csrf_field() }}
                @if(isset($service))
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
                                    <input name="name" type="text" class="form-control" placeholder="название" value="@if(isset($service)){{ $service->name }}@endif">
                                </div>
                            </div>
                         
                            <div class="form-group">
                                <label>Описание</label>
                                <textarea name="description" class="form-control" rows="3" placeholder="описание">@if(isset($service)){{ $service->description }}@endif</textarea>
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
                                    <span class="caption-subject font-dark sbold uppercase">Иконка</span>
                                </div>
                                <div class="actions">
                                    <div class="btn-group btn-group-devided" data-toggle="buttons">
<!--                                        <label class="btn btn-transparent dark btn-outline btn-circle btn-sm active">
                                            <input type="radio" name="options" class="toggle" id="option1">Actions</label>
                                        <label class="btn btn-transparent dark btn-outline btn-circle btn-sm">
                                            <input type="radio" name="options" class="toggle" id="option2">Settings</label>-->
                                        <a class="btn btn-success" data-toggle="modal" href="#large">Управление</a>
                                    </div>
                                </div>
                            </div>
                            
                            <label for="icons-select" class="control-label">Fontawesome Icons</label>
                            
                                <select id="icons-select" class="bs-select form-control" data-show-subtext="true">
                                    @foreach($icons as $icon)
                                        <option data-icon="{{ $icon }}" @if($icon == $service->icon) selected @endif>{{ $icon }}</option>
                                    @endforeach
                                </select>
                                                    

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
    
    <!-- /.modal -->
    <div class="modal fade bs-modal-lg" id="large" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Modal Title</h4>
                </div>
                <div class="modal-body"> 
                    <div class="form-group">
                        <label>Имеющиеся иконки</label>
                        <div class="input-group">
                            <div class="icheck-list">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <label>
                                            <input type="checkbox" class="icheck">  
                                            <span class="mdi mdi-food" style="font-size: 30px;"></span>
                                            mdi mdi-food                                            
                                        </label>
                                        <label>
                                            <input type="checkbox" class="icheck">  
                                            <span class="mdi mdi-bike" style="font-size: 30px;"></span>
                                            mdi mdi-bike                                           
                                        </label>
                                        <label>
                                            <input type="checkbox" class="icheck">  
                                            <span class="mdi mdi-pizza" style="font-size: 30px;"></span>
                                            mdi mdi-pizza                                           
                                        </label>
                                        <label>
                                            <input type="checkbox" class="icheck">  
                                            <span class="mdi mdi-briefcase-variant" style="font-size: 30px;"></span>
                                            mdi mdi-briefcase-variant                                          
                                        </label>
                                        <label>
                                            <input type="checkbox" class="icheck">  
                                            <span class="mdi mdi-rocket-launch" style="font-size: 30px;"></span>
                                            mdi mdi-rocket-launch                                         
                                        </label> 
                                        <label>
                                            <input type="checkbox" class="icheck">  
                                            <span class="mdi mdi-cart" style="font-size: 30px;"></span>
                                            mdi mdi-cart                                         
                                        </label>                                          

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>  
                    <div class="form-group">
                        <label>Добавить новую иконку</label>
                         <input name="name" type="text" class="form-control" placeholder="" value="">
                    </div>                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Закрыть</button>
                    <button type="button" class="btn green">Добавить</button>
                    <button type="button" class="btn btn-danger">Удалить</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    
    <script> 
        $(document).ready(function(){
      
        });
    </script>    
    
@endsection
