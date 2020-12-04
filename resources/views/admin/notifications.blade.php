<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
<li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
        <i class="icon-bell"></i>
        <span class="badge badge-default"> {{ count($notifications) }} </span>
    </a>
    <ul class="dropdown-menu">
        <li class="external">
            <h3>
                <span class="bold">{{ count($notifications) }} pending</span> notifications</h3>
            <a href="page_user_profile_1.html">view all</a>
        </li>
        <li>
            <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                @foreach($notifications as $notification)
                    <li>
                        <a href="javascript:;">
                            <span class="time">{{ $notification->created_at->format('d.m.Y G:i') }}</span>
                            <span class="details">
                            @if ($notification->type == 'orders')
                                <span class="label label-sm label-icon label-success">
                                    <i class="fa fa-plus"></i>
                                </span> {{ $notification->message }} </span>
                            @elseif ($notification->type == 'users')
                                <span class="label label-sm label-icon label-warning">
                                    <i class="fa fa-bell-o"></i>
                                </span> {{ $notification->message }} </span>
                            @endif
                        </a>
                    </li>
                @endforeach
                {{--<li>--}}
                    {{--<a href="javascript:;">--}}
                        {{--<span class="time">10 mins</span>--}}
                        {{--<span class="details">--}}
                                    {{--<span class="label label-sm label-icon label-warning">--}}
                                        {{--<i class="fa fa-bell-o"></i>--}}
                                    {{--</span> Server #2 not responding. </span>--}}
                    {{--</a>--}}
                {{--</li>--}}
            </ul>
        </li>
    </ul>
</li>

<style>
    .page-header.navbar .top-menu .navbar-nav > li.dropdown-extended .dropdown-menu{
        min-width: 430px;
    }

    .page-header.navbar .top-menu .navbar-nav > li.dropdown-notification .dropdown-menu .dropdown-menu-list > li a .time{
        max-width: 110px;
    }
</style>

<script>
    $(document).ready(function(){
        var socket = io.connect('http://localhost:3000/order');

        socket.on('orderAdmin', function(result){
            // console.log(result);
            var info = JSON.stringify(result);
            var data = {
                type: 'orders',
                message: 'Поступил новый заказ',
                info: info,
                read: 0
            }

            $.ajax({
                url: '/admin/notifications/create',
                method: 'post',
                data: data,
                success: function(response){
                    var result = JSON.parse(response);
                    var info = JSON.parse(result.info);
                    console.log(info);
                }
            });
        });
    })
</script>