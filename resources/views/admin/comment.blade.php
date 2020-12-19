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
            <form name="comment-update" action="{{ route('admin.comments.update', $comment->id) }}" enctype="multipart/form-data" method="post">
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
                                @if(isset($comment->created_at))
                                    <div class="form-group">
                                        <label>Дата</label>
                                        <div class="input-icon">
                                            <i class="fa fa-calendar font-green" aria-hidden="true"></i>
                                            <span class="form-control"> {{ $comment->created_at->format('d.m.Y') }} </span>
                                        </div>
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label>Автор</label>
                                    <div class="input-icon">
                                        <i class="fa fa-user font-green"></i>
                                        <span class="form-control">
                                            @if(isset($comment->user))
                                                <a href="{{ route('admin.users.edit', $comment->user->id) }}">{{ $comment->user->name }}</a>
                                            @else
                                                {{ $comment->name }}
                                            @endif
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Блог</label>
                                    <div class="input-icon">
                                        <i class="fa fa-comment font-green" aria-hidden="true"></i>
                                        <span class="form-control"> {{ $comment->blog->title }} </span>
                                    </div>
                                </div>
                            @endif

                            <div class="form-group">
                                <label>Текст</label>
                                <textarea @if(!$GateHelper->any('UPDATE_COMMENTS', 'DELETE_COMMENTS')) disabled @endif name="text" class="form-control" rows="3" placeholder="описание">@if(isset($comment)){{ $comment->text }}@endif</textarea>
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
                                    <span class="caption-subject font-dark sbold uppercase">Еще какие-то данные</span>
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
                                    @if(isset($comment->user))
                                        <img src="{{ asset($comment->user->image) }}" alt="" />
                                    @else
                                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                    @endif
                                </div>
                            </div>

                        </div>
                        <!-- END SAMPLE FORM PORTLET-->
                    </div>
                </div>

                @if($GateHelper->all('UPDATE_COMMENTS', 'DELETE_COMMENTS'))
                    <button type="submit" class="btn btn-success">Сохранить</button>
                    <span
                        id="comment-delete-button"
                        class="btn btn-danger"
                        data-toggle="modal"
                        data-target="#basic"
                        data-comment="{{ $comment->id }}"
                    >
                        Удалить
                    </span>
                @endif
            </form>
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
                    <form action="{{ route('admin.comments.destroy', $comment->id) }}" name="comment-delete" method="post">
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
        textarea[name="text"]{
            min-height: 110px;
        }

        .modal-footer{
            display: flex;
            justify-content: flex-end;
        }

        form[name="comment-delete"] button[type="submit"]{
            margin-left: 10px;
        }
    </style>

    <script>
        $(document).ready(function(){

        })
    </script>
@endsection
