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
                        <a href="#">General</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Search</span>
                    </li>
                </ul>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title"> Search Results {{ $result['total'] }}
                <small>search results</small>
            </h3>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <div class="search-page search-content-2">
                <div class="search-bar ">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="sidebar-search" name="search" action="{{ route('admin.search') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" name="q" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                                        <button class="btn blue uppercase bold" type="submit">Search</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="search-container ">
                            <ul class="search-container">
                                @if($result)
                                    @foreach($result['items'] as $item)
                                        <li class="search-item clearfix">
                                            <div class="search-content text-left">
                                                <h2 class="search-title">
                                                    <a href="{{ $item->link }}">{{ $item->title }}</a>
                                                </h2>
                                                <p class="search-desc"> {{ $item->text }} </p>
                                            </div>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>

                            @if ($result && $result['total'] > count($result['items']))
                                <div class="search-pagination">
                                    <ul class="pagination">
                                        @for($i = 1; $i <= $result['pages_count']; $i++)
                                            <li class="@if($i == $result['page']) page-active @endif">
                                                <a
                                                    @if($i == $result['page'])
                                                        href="javascript:void(0)"
                                                    @else
                                                        href="{{ route('admin.search', array('q' => $_GET['q'], 'page' => $i)) }}"
                                                    @endif
                                                >
                                                    {{ $i }}
                                                </a>
                                            </li>
                                        @endfor
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>                   
                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
@endsection