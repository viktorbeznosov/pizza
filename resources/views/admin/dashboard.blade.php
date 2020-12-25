@inject('GateHelper', 'App\Helpers\GateHelper')
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
                        <span>Dashboard</span>
                    </li>
                </ul>
                <div class="page-toolbar">
                    <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
                        <i class="icon-calendar"></i>&nbsp;
                        <span class="thin uppercase hidden-xs"></span>&nbsp;
                        <i class="fa fa-angle-down"></i>
                    </div>
                </div>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title"> Dashboard
                <small>dashboard & statistics</small>
            </h3>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <!-- BEGIN DASHBOARD STATS 1-->
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                        <div class="visual">
                            <i class="fa fa-comments"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup" data-value="{{ count($orders) }}">0</span>
                            </div>
                            <div class="desc"> Всего заказов </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                        <div class="visual">
                            <i class="fa fa-bar-chart-o"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup" data-value="{{ $total_profit }} ">0</span>р. </div>
                            <div class="desc"> Общая прибыль </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                        <div class="visual">
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup" data-value="{{ $new_orders_count }}">0</span>
                            </div>
                            <div class="desc"> Новых заказов </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
                        <div class="visual">
                            <i class="fa fa-globe"></i>
                        </div>
                        <div class="details">
                            <div class="number"> +
                                <span data-counter="counterup" data-value="{{ $users_count }}"></span>% </div>
                            <div class="desc"> Клиенты </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="clearfix"></div>
            <!-- END DASHBOARD STATS 1-->
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <!-- BEGIN PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-bar-chart font-dark hide"></i>
                                <span class="caption-subject font-dark bold uppercase">ПОЛЬЗОВАТЕЛИ</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div id="site_statistics_loading">
                                <img src="../assets/global/img/loading.gif" alt="loading" /> </div>
                            <div id="site_statistics_content" class="display-none">
                                <div id="site_statistics" class="chart"> </div>
                            </div>
                        </div>
                    </div>
                    <!-- END PORTLET-->
                </div>
                <div class="col-md-6 col-sm-6">
                    <!-- BEGIN PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-share font-red-sunglo hide"></i>
                                <span class="caption-subject font-dark bold uppercase">ЗАКАЗЫ</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div id="site_activities_loading">
                                <img src="../assets/global/img/loading.gif" alt="loading" /> </div>
                            <div id="site_activities_content" class="display-none">
                                <div id="site_activities" style="height: 300px;"> </div>
                            </div>

                        </div>
                    </div>
                    <!-- END PORTLET-->
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="portlet light bordered">
                        <div class="portlet-title tabbable-line">
                            <div class="caption">
                                <i class="icon-bubbles font-dark hide"></i>
                                <span class="caption-subject font-dark bold uppercase">ПОЛЬЗОВАТЕЛИ</span>
                            </div>
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#portlet_comments_1" data-toggle="tab"> Админы </a>
                                </li>
                                <li>
                                    <a href="#portlet_comments_2" data-toggle="tab"> Пользователи </a>
                                </li>
                            </ul>
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="portlet_comments_1">
                                    <!-- BEGIN: Comments -->
                                    <div class="mt-comments">
                                        @foreach($admins as $admin)
                                            <div class="mt-comment">
                                               <div class="mt-comment-img">
                                                   <img src="@if(isset($admin->image)){{ asset($admin->image) }}@else {{ asset('assets/images/no-user.png') }} @endif" /> </div>
                                               <div class="mt-comment-body">
                                                   <div class="mt-comment-info">
                                                       <span class="mt-comment-author">{{ $admin->name }}</span>
                                                       <span class="mt-comment-date">{{ $admin->created_at->format('d.m.Y') }}</span>
                                                   </div>
                                                   <div class="mt-comment-text"> {{ $admin->text }} </div>
                                                   <div class="mt-comment-details">
                                                        @if(count($admin->roles()->get()) > 0)
                                                            @foreach($admin->roles()->get() as $role)
                                                            <span class="mt-comment-status mt-comment-status-pending"> {{ $role->name }}&nbsp;</span>
                                                            @endforeach
                                                        @endif
                                                       
                                                       @if($GateHelper->all('UPDATE_ADMINS','DELETE_ADMINS', array('user' => $admin))) 
                                                            <ul class="mt-comment-actions">
                                                                <li>
                                                                    <a href="{{ route('admin.admins.edit', $admin->id) }}">Редактировать</a>
                                                                </li>
                                                                <li>
                                                                    <a href="#"
                                                                        href="#"
                                                                        class="btn btn-transparent btn-xs tooltips"
                                                                        tooltip-placement="top"
                                                                        tooltip="Remove"
                                                                        data-toggle="modal"
                                                                        data-target="#admins"
                                                                        data-admin="{{ $admin->id }}"   
                                                                    >
                                                                        Удалить
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        @endif
                                                   </div>
                                               </div>
                                           </div>                                           
                                        @endforeach

                                    </div>
                                    <!-- END: Comments -->
                                </div>
                                <div class="tab-pane" id="portlet_comments_2">
                                    <!-- BEGIN: Comments -->
                                    <div class="mt-comments">
                                        @foreach($users as $user)
                                            <div class="mt-comment">
                                                <div class="mt-comment-img">
                                                    <img src="@if(isset($user->image)){{ asset($user->image) }}@else {{ asset('assets/images/no-user.png') }} @endif" /> </div>
                                                <div class="mt-comment-body">
                                                    <div class="mt-comment-info">
                                                        <span class="mt-comment-author">{{ $user->name }}</span>
                                                        <span class="mt-comment-date">{{ $user->created_at->format('d.m.Y') }}</span>
                                                    </div>
                                                    <div class="mt-comment-text"> {{ $user->email }} </div>
                                                    <div class="mt-comment-details">
                                                        <!--<span class="mt-comment-status mt-comment-status-approved">Approved</span>-->
                                                        @if($GateHelper::all('VIEW_USERS','UPDATE_USERS'))
                                                            <ul class="mt-comment-actions">
                                                                <li>
                                                                    <a href="{{ route('admin.users.edit', $user->id) }}">Редактировать</a>
                                                                </li>
                                                                <li>
                                                                    <a href="#"
                                                                        href="javascript:void(0)"
                                                                        class="btn btn-transparent btn-xs tooltips"
                                                                        tooltip-placement="top"
                                                                        tooltip="Remove"
                                                                        data-toggle="modal"
                                                                        data-target="#users"
                                                                        data-user="{{ $user->id }}"                                                                       
                                                                    >
                                                                        Удалить
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <!-- END: Comments -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="col-md-6 col-sm-6">
                    <div class="portlet light portlet-fit bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-directions font-green hide"></i>
                                <span class="caption-subject bold font-dark uppercase"> Events</span>
                                <span class="caption-helper">Horizontal Timeline</span>
                            </div>
                            <div class="actions">
                                <div class="btn-group btn-group-devided" data-toggle="buttons">
                                    <label class="btn green btn-outline btn-circle btn-sm active">
                                        <input type="radio" name="options" class="toggle" id="option1">Actions</label>
                                    <label class="btn  green btn-outline btn-circle btn-sm">
                                        <input type="radio" name="options" class="toggle" id="option2">Tools</label>
                                </div>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="cd-horizontal-timeline mt-timeline-horizontal">
                                <div class="timeline mt-timeline-square">
                                    <div class="events-wrapper">
                                        <div class="events">
                                            <ol>
                                                <li>
                                                    <a href="#0" data-date="16/01/2014" class="border-after-blue bg-after-blue selected">Expo 2016</a>
                                                </li>
                                                <li>
                                                    <a href="#0" data-date="28/02/2014" class="border-after-blue bg-after-blue">New Promo</a>
                                                </li>
                                                <li>
                                                    <a href="#0" data-date="20/04/2014" class="border-after-blue bg-after-blue">Meeting</a>
                                                </li>
                                                <li>
                                                    <a href="#0" data-date="20/05/2014" class="border-after-blue bg-after-blue">Launch</a>
                                                </li>
                                                <li>
                                                    <a href="#0" data-date="09/07/2014" class="border-after-blue bg-after-blue">Party</a>
                                                </li>
                                                <li>
                                                    <a href="#0" data-date="30/08/2014" class="border-after-blue bg-after-blue">Reports</a>
                                                </li>
                                                <li>
                                                    <a href="#0" data-date="15/09/2014" class="border-after-blue bg-after-blue">HR</a>
                                                </li>
                                                <li>
                                                    <a href="#0" data-date="01/11/2014" class="border-after-blue bg-after-blue">IPO</a>
                                                </li>
                                                <li>
                                                    <a href="#0" data-date="10/12/2014" class="border-after-blue bg-after-blue">Board</a>
                                                </li>
                                                <li>
                                                    <a href="#0" data-date="19/01/2015" class="border-after-blue bg-after-blue">Revenue</a>
                                                </li>
                                                <li>
                                                    <a href="#0" data-date="03/03/2015" class="border-after-blue bg-after-blue">Dinner</a>
                                                </li>
                                            </ol>
                                            <span class="filling-line bg-blue" aria-hidden="true"></span>
                                        </div>
                                        <!-- .events -->
                                    </div>
                                    <!-- .events-wrapper -->
                                    <ul class="cd-timeline-navigation mt-ht-nav-icon">
                                        <li>
                                            <a href="#0" class="prev inactive btn blue md-skip">
                                                <i class="fa fa-chevron-left"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#0" class="next btn blue md-skip">
                                                <i class="fa fa-chevron-right"></i>
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- .cd-timeline-navigation -->
                                </div>
                                <!-- .timeline -->
                                <div class="events-content">
                                    <ol>
                                       
                                        <li class="selected" data-date="16/01/2014">
                                            <div class="mt-title">
                                                <h2 class="mt-content-title">Expo 2016 Launch</h2>
                                            </div>
                                            <div class="mt-author">
                                                <div class="mt-avatar">
                                                    <img src="../assets/pages/media/users/avatar80_2.jpg" />
                                                </div>
                                                <div class="mt-author-name">
                                                    <a href="javascript:;" class="font-blue-madison">Lisa Bold</a>
                                                </div>
                                                <div class="mt-author-datetime font-grey-mint">23 February 2014</div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="mt-content border-grey-steel">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod mi felis, aliquam at iaculis eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis mi felis, aliquam at
                                                    iaculis eu, onsectetur adipiscing elit finibus eu ex. Integer efficitur leo eget dolor tincidunt, et dignissim risus lacinia. Nam in egestas onsectetur adipiscing elit nunc. Suspendisse potenti</p>
                                                <a href="javascript:;" class="btn btn-circle dark btn-outline">Read More</a>
                                                <a href="javascript:;" class="btn btn-circle btn-icon-only green pull-right">
                                                    <i class="fa fa-twitter"></i>
                                                </a>
                                            </div>
                                        </li>
                                       
                                        <li data-date="28/02/2014">
                                            <div class="mt-title">
                                                <h2 class="mt-content-title">Sending Shipment</h2>
                                            </div>
                                            <div class="mt-author">
                                                <div class="mt-avatar">
                                                    <img src="../assets/pages/media/users/avatar80_3.jpg" />
                                                </div>
                                                <div class="mt-author-name">
                                                    <a href="javascript:;" class="font-blue-madison">Hugh Grant</a>
                                                </div>
                                                <div class="mt-author-datetime font-grey-mint">28 February 2014 : 10:15 AM</div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="mt-content border-grey-steel">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, finibus eu ex. Integer efficitur leo eget dolor
                                                    tincidunt, et dignissim risus lacinia. Nam in egestas nunc. Suspendisse potenti. Cras ullamcorper tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. Ut consectetur odio non
                                                    est rhoncus volutpat. Nullam interdum, neque quis vehicula ornare, lacus elit dignissim purus, quis ultrices erat tortor eget felis. Cras commodo id massa at condimentum. Praesent dignissim luctus
                                                    risus sed sodales.</p>
                                                <a href="javascript:;" class="btn btn-circle btn-outline green-jungle">Download Shipment List</a>
                                                <div class="btn-group dropup pull-right">
                                                    <button class="btn btn-circle blue-steel dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false"> Actions
                                                        <i class="fa fa-angle-down"></i>
                                                    </button>
                                                    <ul class="dropdown-menu pull-right" role="menu">
                                                        <li>
                                                            <a href="javascript:;">Action </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">Another action </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">Something else here </a>
                                                        </li>
                                                        <li class="divider"> </li>
                                                        <li>
                                                            <a href="javascript:;">Separated link </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-date="20/04/2014">
                                            <div class="mt-title">
                                                <h2 class="mt-content-title">Blue Chambray</h2>
                                            </div>
                                            <div class="mt-author">
                                                <div class="mt-avatar">
                                                    <img src="../assets/pages/media/users/avatar80_1.jpg" />
                                                </div>
                                                <div class="mt-author-name">
                                                    <a href="javascript:;" class="font-blue">Rory Matthew</a>
                                                </div>
                                                <div class="mt-author-datetime font-grey-mint">20 April 2014 : 10:45 PM</div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="mt-content border-grey-steel">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, finibus eu ex. Integer efficitur leo eget dolor
                                                    tincidunt, et dignissim risus lacinia. Nam in egestas nunc. Suspendisse potenti. Cras ullamcorper tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. Ut consectetur odio non
                                                    est rhoncus volutpat. Nullam interdum, neque quis vehicula ornare, lacus elit dignissim purus, quis ultrices erat tortor eget felis. Cras commodo id massa at condimentum. Praesent dignissim luctus
                                                    risus sed sodales.</p>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis
                                                    qui ut. laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut. </p>
                                                <a href="javascript:;" class="btn btn-circle red">Read More</a>
                                            </div>
                                        </li>
                                        <li data-date="20/05/2014">
                                            <div class="mt-title">
                                                <h2 class="mt-content-title">Timeline Received</h2>
                                            </div>
                                            <div class="mt-author">
                                                <div class="mt-avatar">
                                                    <img src="../assets/pages/media/users/avatar80_2.jpg" />
                                                </div>
                                                <div class="mt-author-name">
                                                    <a href="javascript:;" class="font-blue-madison">Andres Iniesta</a>
                                                </div>
                                                <div class="mt-author-datetime font-grey-mint">20 May 2014 : 12:20 PM</div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="mt-content border-grey-steel">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, finibus eu ex. Integer efficitur leo eget dolor
                                                    tincidunt, et dignissim risus lacinia. Nam in egestas nunc. Suspendisse potenti. Cras ullamcorper tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. Ut consectetur odio non
                                                    est rhoncus volutpat. Nullam interdum, neque quis vehicula ornare, lacus elit dignissim purus, quis ultrices erat tortor eget felis. Cras commodo id massa at condimentum. Praesent dignissim luctus
                                                    risus sed sodales.</p>
                                                <a href="javascript:;" class="btn btn-circle green-turquoise">Read More</a>
                                            </div>
                                        </li>
                                        <li data-date="09/07/2014">
                                            <div class="mt-title">
                                                <h2 class="mt-content-title">Event Success</h2>
                                            </div>
                                            <div class="mt-author">
                                                <div class="mt-avatar">
                                                    <img src="../assets/pages/media/users/avatar80_1.jpg" />
                                                </div>
                                                <div class="mt-author-name">
                                                    <a href="javascript:;" class="font-blue-madison">Matt Goldman</a>
                                                </div>
                                                <div class="mt-author-datetime font-grey-mint">9 July 2014 : 8:15 PM</div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="mt-content border-grey-steel">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde.</p>
                                                <a href="javascript:;" class="btn btn-circle btn-outline purple-medium">View Summary</a>
                                                <div class="btn-group dropup pull-right">
                                                    <button class="btn btn-circle green dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false"> Actions
                                                        <i class="fa fa-angle-down"></i>
                                                    </button>
                                                    <ul class="dropdown-menu pull-right" role="menu">
                                                        <li>
                                                            <a href="javascript:;">Action </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">Another action </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">Something else here </a>
                                                        </li>
                                                        <li class="divider"> </li>
                                                        <li>
                                                            <a href="javascript:;">Separated link </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-date="30/08/2014">
                                            <div class="mt-title">
                                                <h2 class="mt-content-title">Conference Call</h2>
                                            </div>
                                            <div class="mt-author">
                                                <div class="mt-avatar">
                                                    <img src="../assets/pages/media/users/avatar80_1.jpg" />
                                                </div>
                                                <div class="mt-author-name">
                                                    <a href="javascript:;" class="font-blue-madison">Rory Matthew</a>
                                                </div>
                                                <div class="mt-author-datetime font-grey-mint">30 August 2014 : 5:45 PM</div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="mt-content border-grey-steel">
                                                <img class="timeline-body-img pull-left" src="../assets/pages/media/blog/5.jpg" alt="">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis
                                                    qui ut. laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut. </p>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis
                                                    qui ut. laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut. </p>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis
                                                    qui ut. laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut. </p>
                                                <a href="javascript:;" class="btn btn-circle red">Read More</a>
                                            </div>
                                        </li>
                                        <li data-date="15/09/2014">
                                            <div class="mt-title">
                                                <h2 class="mt-content-title">Conference Decision</h2>
                                            </div>
                                            <div class="mt-author">
                                                <div class="mt-avatar">
                                                    <img src="../assets/pages/media/users/avatar80_5.jpg" />
                                                </div>
                                                <div class="mt-author-name">
                                                    <a href="javascript:;" class="font-blue-madison">Jessica Wolf</a>
                                                </div>
                                                <div class="mt-author-datetime font-grey-mint">15 September 2014 : 8:30 PM</div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="mt-content border-grey-steel">
                                                <img class="timeline-body-img pull-right" src="../assets/pages/media/blog/6.jpg" alt="">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis
                                                    qui ut.</p>
                                                <a href="javascript:;" class="btn btn-circle green-sharp">Read More</a>
                                            </div>
                                        </li>
                                        <li data-date="01/11/2014">
                                            <div class="mt-title">
                                                <h2 class="mt-content-title">Timeline Received</h2>
                                            </div>
                                            <div class="mt-author">
                                                <div class="mt-avatar">
                                                    <img src="../assets/pages/media/users/avatar80_2.jpg" />
                                                </div>
                                                <div class="mt-author-name">
                                                    <a href="javascript:;" class="font-blue-madison">Andres Iniesta</a>
                                                </div>
                                                <div class="mt-author-datetime font-grey-mint">1 November 2014 : 12:20 PM</div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="mt-content border-grey-steel">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, finibus eu ex. Integer efficitur leo eget dolor
                                                    tincidunt, et dignissim risus lacinia. Nam in egestas nunc. Suspendisse potenti. Cras ullamcorper tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. Ut consectetur odio non
                                                    est rhoncus volutpat. Nullam interdum, neque quis vehicula ornare, lacus elit dignissim purus, quis ultrices erat tortor eget felis. Cras commodo id massa at condimentum. Praesent dignissim luctus
                                                    risus sed sodales.</p>
                                                <a href="javascript:;" class="btn btn-circle green-turquoise">Read More</a>
                                            </div>
                                        </li>
                                        <li data-date="10/12/2014">
                                            <div class="mt-title">
                                                <h2 class="mt-content-title">Timeline Received</h2>
                                            </div>
                                            <div class="mt-author">
                                                <div class="mt-avatar">
                                                    <img src="../assets/pages/media/users/avatar80_2.jpg" />
                                                </div>
                                                <div class="mt-author-name">
                                                    <a href="javascript:;" class="font-blue-madison">Andres Iniesta</a>
                                                </div>
                                                <div class="mt-author-datetime font-grey-mint">10 December 2014 : 12:20 PM</div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="mt-content border-grey-steel">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, finibus eu ex. Integer efficitur leo eget dolor
                                                    tincidunt, et dignissim risus lacinia. Nam in egestas nunc. Suspendisse potenti. Cras ullamcorper tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. Ut consectetur odio non
                                                    est rhoncus volutpat. Nullam interdum, neque quis vehicula ornare, lacus elit dignissim purus, quis ultrices erat tortor eget felis. Cras commodo id massa at condimentum. Praesent dignissim luctus
                                                    risus sed sodales.</p>
                                                <a href="javascript:;" class="btn btn-circle green-turquoise">Read More</a>
                                            </div>
                                        </li>
                                        <li data-date="19/01/2015">
                                            <div class="mt-title">
                                                <h2 class="mt-content-title">Timeline Received</h2>
                                            </div>
                                            <div class="mt-author">
                                                <div class="mt-avatar">
                                                    <img src="../assets/pages/media/users/avatar80_2.jpg" />
                                                </div>
                                                <div class="mt-author-name">
                                                    <a href="javascript:;" class="font-blue-madison">Andres Iniesta</a>
                                                </div>
                                                <div class="mt-author-datetime font-grey-mint">19 January 2015 : 12:20 PM</div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="mt-content border-grey-steel">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, finibus eu ex. Integer efficitur leo eget dolor
                                                    tincidunt, et dignissim risus lacinia. Nam in egestas nunc. Suspendisse potenti. Cras ullamcorper tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. Ut consectetur odio non
                                                    est rhoncus volutpat. Nullam interdum, neque quis vehicula ornare, lacus elit dignissim purus, quis ultrices erat tortor eget felis. Cras commodo id massa at condimentum. Praesent dignissim luctus
                                                    risus sed sodales.</p>
                                                <a href="javascript:;" class="btn btn-circle green-turquoise">Read More</a>
                                            </div>
                                        </li>
                                        <li data-date="03/03/2015">
                                            <div class="mt-title">
                                                <h2 class="mt-content-title">Timeline Received</h2>
                                            </div>
                                            <div class="mt-author">
                                                <div class="mt-avatar">
                                                    <img src="../assets/pages/media/users/avatar80_2.jpg" />
                                                </div>
                                                <div class="mt-author-name">
                                                    <a href="javascript:;" class="font-blue-madison">Andres Iniesta</a>
                                                </div>
                                                <div class="mt-author-datetime font-grey-mint">3 March 2015 : 12:20 PM</div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="mt-content border-grey-steel">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, finibus eu ex. Integer efficitur leo eget dolor
                                                    tincidunt, et dignissim risus lacinia. Nam in egestas nunc. Suspendisse potenti. Cras ullamcorper tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. Ut consectetur odio non
                                                    est rhoncus volutpat. Nullam interdum, neque quis vehicula ornare, lacus elit dignissim purus, quis ultrices erat tortor eget felis. Cras commodo id massa at condimentum. Praesent dignissim luctus
                                                    risus sed sodales.</p>
                                                <a href="javascript:;" class="btn btn-circle green-turquoise">Read More</a>
                                            </div>
                                        </li>
                                    </ol>
                                </div>
                                <!-- .events-content -->
                            </div>
                        </div>
                    </div>
                </div>               
            </div>
            <div class="row">
            </div>

        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
    
    <!-- MODAL -->
    <div class="modal fade" id="admins" tabindex="-1" role="admins" aria-hidden="true">
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
    
    <!-- MODAL -->
    <div class="modal fade" id="users" tabindex="-1" role="users" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Modal Title</h4>
                </div>
                <div class="modal-body"> Modal body goes here </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Закрыть</button>
                    <form action="" id="user-delete" method="post">
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

        #user-delete button[type="submit"]{
            margin-left: 10px;
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
