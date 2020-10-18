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
            <form action="{{ route('admin.orders.update', $order->id) }}" enctype="multipart/form-data" method="post">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
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
                                <label>Дата</label>
                                <div class="input-icon">
                                    <i class="fa fa-clock-o font-green"></i>
                                    <span name="name" type="text" class="form-control">{{ $order->created_at->format('d.m.Y') }}</span>
                                </div>
                            </div>

                            <table class="table table-striped table-bordered table-hover table-checkable order-column table-products">
                                <thead>
                                <tr>
                                    <th>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                            <span></span>
                                        </label>
                                    </th>
                                    <th class="center"> Фото </th>
                                    <th class="center hidden-xs"> Название </th>
                                    <th class="center"> Количество </th>
                                    <th class="center"> </th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->products as $product)
                                        <tr class="odd gradeX">
                                            <td>
                                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                    <input type="checkbox" class="checkboxes" value="1" />
                                                    <span></span>
                                                </label>
                                            </td>
                                            <td class="center middle">
                                                <img alt="" class="img-circle img-category" src="@if(isset($product->image)){{ asset($product->image) }}@else{{ asset('assets/images/no-image.png') }}@endif" />
                                            </td>
                                            <td class="center middle">
                                                <input name="productId[]" type="hidden" value="{{ $product->id }}" data-cat_id="{{ $product->cat_id }}">
                                                <span class="product-name">{{ $product->name }}</span>
                                            </td>
                                            <td class="center middle">
                                                <div class="dec-inc d-flex">
                                                    <div class="basket_num_buttons minus">-</div>
                                                    <span class="product-qty">{{ $product->pivot->quantity }}</span>
                                                    <div class="basket_num_buttons plus">+</div>
                                                </div>
                                                <input name="productQty[]" type="hidden" value="{{ $product->pivot->quantity }}">
                                            </td>
                                            <td class="center middle">
                                                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:void(0);" tooltip-placement="top" tooltip="Remove">
                                                    <i class="icon-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="form-group">
                                <label for="single" class="control-label">Выберите продукт</label>
                                <select id="single" class="form-control select2">
                                    <option></option>
                                    @foreach($categories as $category)
                                        <optgroup label="{{ $category->name }}" data-id="{{ $category->id }}">
                                            @foreach($category->products()->get() as $product)
                                                <option value="{{ $product->id }}" data-image="{{ asset($product->image) }}">{{ $product->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
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
                                    <span class="caption-subject font-dark sbold uppercase">Данные о пользователе</span>
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
                                    @if(isset($order->user->image))
                                        <img src="{{ asset($order->user->image) }}" alt="" />
                                    @else
                                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Имя</label>
                                <div class="input-icon">
                                    <i class="fa fa-user font-green"></i>
                                    <span name="name" type="text" class="form-control">{{ $order->user->name }}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <div class="input-icon">
                                    <i class="fa fa-envelope-o font-green"></i>
                                    <span name="name" type="text" class="form-control">{{ $order->user->email }}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Телефон</label>
                                <div class="input-icon">
                                    <i class="fa fa-phone font-green"></i>
                                    <span name="name" type="text" class="form-control">{{ $order->user->phone }}"</span>
                                </div>
                            </div>

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

    <style>
        .select2-container--bootstrap .select2-results__group {
            display: block;
            font-size: 18px;
            white-space: nowrap;
            font-weight: 800;
        }

        .basket_num_buttons {
            cursor: pointer;
            width: 30px;
            height: 30px;
            font-weight: 600;
            border: 1px solid #c0c0c0;
            margin: 0 5px;
            display: inline-block;
            color: #000;
            background: #FFF;
            text-align: center;
            cursor: pointer;
            font-size: 19px;
        }
    </style>

    <script>
        $(document).ready(function () {
            var productsIds = [];
            $('input[name="productId[]"]').each(function (index, item) {
                productsIds.push($(item).val());
            });
//
            $('#single').find('option').each(function (index, item) {
                if(productsIds.indexOf($(item).val()) != -1){
                    $(item).remove();
                }
            });

            $('a[tooltip="Remove"]').on('click', function () {
                var image = $(this).closest('tr').find('img').attr('src');
                var product_id = $(this).closest('tr').find('input[name="productId[]"]').val();
                var cat_id = $(this).closest('tr').find('input[name="productId[]"]').data('cat_id');
                var name = $(this).closest('tr').find('.product-name').html();

                $('#single').find('optgroup[data-id="'+cat_id+'"]').append('<option value="'+product_id+'" data-image="'+image+'">'+name+'</option>');
                $('#single').select2();

                $(this).closest('tr').remove();
            });

            $('.minus').on('click', function () {
                var qty = $(this).closest('td').find('input').val();
                if (qty > 1){
                    qty--;
                    $(this).closest('td').find('input').val(qty)
                    $(this).closest('td').find('.product-qty').html(qty)
                }
            });

            $('.plus').on('click', function () {
                var qty = $(this).closest('td').find('input').val();
                qty++;
                $(this).closest('td').find('input').val(qty)
                $(this).closest('td').find('.product-qty').html(qty)
            });

            $('#single').on('change', function () {
                var product_id = $(this).val();
                var name = $(this).find('option:selected').html();
                var image = $(this).find('option:selected').data('image');
                var cat_id = $(this).find('option:selected').closest('optgroup').data('id');

                var tpl = `
                <tr class="gradeX odd" role="row">
                    <td>
                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                            <input type="checkbox" class="checkboxes" value="1">
                            <span></span>
                        </label>
                    </td>
                    <td class="center middle sorting_1">
                        <img alt="" class="img-circle img-category" src="`+image+`">
                    </td>
                    <td class="center middle">
                        <input name="productId[]" type="hidden" value="`+product_id+`" data-cat_id="`+cat_id+`" wfd-invisible="true">
                        <span class="product-name">`+name+`</span>
                    </td>
                    <td class="center middle">
                        <div class="dec-inc d-flex">
                            <div class="basket_num_buttons minus">-</div>
                            <span class="product-qty">1</span>
                            <div class="basket_num_buttons plus">+</div>
                        </div>
                        <input name="productQty[]" type="hidden" value="1" wfd-invisible="true">
                    </td>
                    <td class="center middle">
                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:void(0);" tooltip-placement="top" tooltip="Remove">
                            <i class="icon-trash"></i>
                        </a>
                    </td>
                </tr>
                `;

                $('.table-products tbody').append(tpl);
                $('.table-products tbody tr:last-child').find('a[tooltip="Remove"]').on('click', function () {
                    var image = $(this).closest('tr').find('img').attr('src');
                    var product_id = $(this).closest('tr').find('input[name="productId[]"]').val();
                    var cat_id = $(this).closest('tr').find('input[name="productId[]"]').data('cat_id');
                    var name = $(this).closest('tr').find('.product-name').html();

                    $('#single').find('optgroup[data-id="'+cat_id+'"]').append('<option value="'+product_id+'" data-image="'+image+'">'+name+'</option>');
                    $('#single').select2();

                    $(this).closest('tr').remove();
                });

                $('.table-products tbody tr:last-child').find('.plus').on('click', function () {
                    var qty = $(this).closest('td').find('input').val();
                    qty++;
                    $(this).closest('td').find('input').val(qty);
                    $(this).closest('td').find('.product-qty').html(qty)
                });

                $('.table-products tbody tr:last-child').find('.minus').on('click', function () {
                    var qty = $(this).closest('td').find('input').val();
                    if (qty > 1){
                        qty--;
                        $(this).closest('td').find('input').val(qty);
                        $(this).closest('td').find('.product-qty').html(qty)
                    }
                });

                $(this).find('option:selected').remove();
                $('#single').select2();
             });

        });
    </script>

@endsection