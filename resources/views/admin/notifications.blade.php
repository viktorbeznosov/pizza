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
                    @if ($notification->type == 'orders')
                        <li data-id = "{{ $notification->id }}">
                            <a href="{{ $notification->getRoute() }}">
                                <span class="time">{{ $notification->created_at->format('d.m.Y G:i') }}</span>
                                <span class="details">

                                <span class="label label-sm label-icon label-success">
                                    <i class="fa fa-plus"></i>
                                </span> {{ $notification->message }}</span>
                            </a>
                        </li>
                    @elseif ($notification->type == 'users')
                        <li data-id = "{{ $notification->id }}">
                            <a href="{{ $notification->getRoute() }}">
                                <span class="time">{{ $notification->created_at->format('d.m.Y G:i') }}</span>
                                <span class="details">

                                <span class="label label-sm label-icon label-warning">
                                    <i class="fa fa-bell-o"></i>
                                </span> {{ $notification->message }} </span>
                            </a>
                        </li>
                    @endif


                @endforeach
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
        var socket_order = io.connect('http://localhost:3000/order');
        var socket_user = io.connect('http://localhost:3010/user');

        socket_order.on('orderAdmin', function(result){
            console.log(result);
            
            var notifications_count = parseInt($('#header_notification_bar').find('.badge.badge-default').html());
            notifications_count++;
            $('#header_notification_bar').find('.badge.badge-default').html(notifications_count);
            
            var orderId = result.order.id;
            var notificationRoot = '/admin/orders/'+orderId+'/edit';
            var notitficationDate = result.order.date;
            var notificationMessage = 'Поступил новый заказ';
            var notificationId = result.notification.id;
            
            var notificationTpl = `
                <li data-id="`+notificationId+`">
                    <a href="`+notificationRoot+`">
                        <span class="time">`+notitficationDate+`</span>
                        <span class="details">

                        <span class="label label-sm label-icon label-success">
                            <i class="fa fa-plus"></i>
                        </span>`+notificationMessage+`</span>
                    </a>
                </li>
            `;

            $('.slimScrollDiv').find('.dropdown-menu-list').append(notificationTpl);
            $('#header_notification_bar .dropdown-menu-list li[data-id="'+notificationId+'"]').on('click', function () {
                notification_read($(this));
                return false;
            });
            toastr.info(notificationMessage);
        });

        socket_user.on('registerAdmin', function(result){
           console.log(result);

            var notifications_count = parseInt($('#header_notification_bar').find('.badge.badge-default').html());
            notifications_count++;
            $('#header_notification_bar').find('.badge.badge-default').html(notifications_count);

            var userId = result.user.id;
            var notificationRoot = '/admin/users/'+userId+'/edit';
            var notitficationDate = result.notification.date;
            var notificationMessage = 'Зарегистрировался новый пользователь';
            var notificationId = result.notification.id;

            var notificationTpl = `
                <li data-id="`+notificationId+`">
                    <a href="`+notificationRoot+`">
                        <span class="time">`+notitficationDate+`</span>
                        <span class="details">

                        <span class="label label-sm label-icon label-warning">
                            <i class="fa fa-bell-o"></i>
                        </span>`+notificationMessage+`</span>
                    </a>
                </li>
            `;
            $('.slimScrollDiv').find('.dropdown-menu-list').append(notificationTpl);
            $('#header_notification_bar .dropdown-menu-list li[data-id="'+notificationId+'"]').on('click', function () {
                notification_read($(this));
                return false;
            });
            toastr.info(notificationMessage);

        });
        
        $('#header_notification_bar .dropdown-menu-list li').on('click', function(){
            notification_read($(this));
            return false;
        });
    });

    function notification_read(elem) {
        var notitficationRoot = elem.find('a').attr('href');
        var notificationId = elem.data('id');
        var data = {
            'id': notificationId
        }
        $.ajax({
            url: '/admin/notifications/read',
            method: 'post',
            data: data,
            success: (response) => {
                var result = JSON.parse(response);
                if (result.success){
                    var notifications_count = parseInt($('#header_notification_bar').find('.badge.badge-default').html());
                    notifications_count--;
                    $('#header_notification_bar').find('.badge.badge-default').html(notifications_count);

                    elem.fadeOut(200, function(){
                        window.location.href = notitficationRoot;
                    });
                }
            }
        });
    }
</script>