@extends('layouts.site')

@section('content')

    <section class="home-slider owl-carousel img" style="background-image: url({{ asset('assets/images/bg_1.jpg') }});">

        <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_1.jpg') }});">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">

                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">{{ $title }}</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Home</a></span> <span class="mr-2"><a href="{{ route('blog') }}">Blog</a></span> <span>Blog Single</span></p>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ftco-animate">

                    {!! $blog->body !!}

                    <div class="tag-widget post-tag-container mb-5 mt-5">
                        <div class="tagcloud">
                            <a href="#" class="tag-cloud-link">Life</a>
                            <a href="#" class="tag-cloud-link">Sport</a>
                            <a href="#" class="tag-cloud-link">Tech</a>
                            <a href="#" class="tag-cloud-link">Travel</a>
                        </div>
                    </div>

                    <div class="about-author d-flex">
                        <div class="bio align-self-md-center mr-5">
                            <img src="{{ asset($blog->admin->image) }}" alt="Image placeholder" class="img-fluid mb-4">
                        </div>
                        <div class="desc align-self-md-center">
                            <h3>{{ $blog->admin->name }}</h3>
                            <p>{{ $blog->admin->description }}</p>
                        </div>
                    </div>

                    <div class="pt-5 mt-5">
                        @if($comments_count > 0)
                            <h3 class="mb-5">{{ $comments_count }} Comments</h3>
                        @endif
                        <ul class="comment-list">
                            @include('comments', ['comments' => $comments,'blog' => $blog])
                        </ul>
                        <!-- END comment-list -->
                    </div>

                    <div class="blog-reply">
                        <a href="javascript:void(0)" class="reply">Reply</a>
                    </div>

                    <div class="comment-form-wrap blog-reply-form">
                        <h3>Leave a comment</h3>
                        <form action="{{ route('comment') }}" name="comments" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="parent" value="0">
                            <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                            @if(!Auth::user())
                                <div class="form-group">
                                    <label for="name">Name *</label>
                                    <input type="text" name="name" class="form-control" id="name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email *</label>
                                    <input type="email" name="email" class="form-control" id="email">
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea name="text" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
                            </div>

                        </form>
                    </div>

                </div> <!-- .col-md-8 -->
                <div class="col-md-4 sidebar ftco-animate">
                    <div class="sidebar-box">
                        <form action="" class="search-form">
                            <div class="form-group">
                                <div class="icon">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </div>
                                <input type="text" class="form-control" placeholder="Search...">
                            </div>
                        </form>
                    </div>
                    <div class="sidebar-box ftco-animate">
                        <div class="categories">
                            <h3>Categories</h3>
                            <li><a href="#">Tour <span>(12)</span></a></li>
                            <li><a href="#">Hotel <span>(22)</span></a></li>
                            <li><a href="#">Coffee <span>(37)</span></a></li>
                            <li><a href="#">Drinks <span>(42)</span></a></li>
                            <li><a href="#">Foods <span>(14)</span></a></li>
                            <li><a href="#">Travel <span>(140)</span></a></li>
                        </div>
                    </div>

                    <div class="sidebar-box ftco-animate">
                        <h3>Recent Blog</h3>
                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4" style="background-image: url({{ asset('assets/images/image_1.jpg') }});"></a>
                            <div class="text">
                                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                                <div class="meta">
                                    <div><a href="#"><span class="icon-calendar"></span> July 12, 2018</a></div>
                                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4" style="background-image: url({{ asset('assets/images/image_2.jpg') }});"></a>
                            <div class="text">
                                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                                <div class="meta">
                                    <div><a href="#"><span class="icon-calendar"></span> July 12, 2018</a></div>
                                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4" style="background-image: url({{ asset('assets/images/image_3.jpg') }});"></a>
                            <div class="text">
                                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                                <div class="meta">
                                    <div><a href="#"><span class="icon-calendar"></span> July 12, 2018</a></div>
                                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="sidebar-box ftco-animate">
                        <h3>Tag Cloud</h3>
                        <div class="tagcloud">
                            <a href="#" class="tag-cloud-link">dish</a>
                            <a href="#" class="tag-cloud-link">menu</a>
                            <a href="#" class="tag-cloud-link">food</a>
                            <a href="#" class="tag-cloud-link">sweet</a>
                            <a href="#" class="tag-cloud-link">tasty</a>
                            <a href="#" class="tag-cloud-link">delicious</a>
                            <a href="#" class="tag-cloud-link">desserts</a>
                            <a href="#" class="tag-cloud-link">drinks</a>
                        </div>
                    </div>

                    <div class="sidebar-box ftco-animate">
                        <h3>Paragraph</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
                    </div>
                </div>

            </div>
        </div>
    </section> <!-- .section -->
    
    <style>
        .about-author img{
            max-width: 200px;
        }

        .comment-body .comment-form-wrap{
            display: none;
        }

        .blog-reply{
            margin-bottom: 20px;
        }

        .blog-reply a{
            display: none;
            padding: 5px 10px;
            background: #141414;
            color: #fff;
            text-transform: uppercase;
            font-size: 11px;
            letter-spacing: .1em;
            font-weight: 400;
            border-radius: 4px;
        }
        
        .toast-warning,
        .toast-info{
            background: #fac564;
        }
    </style>
    
    <script>
        $(document).ready(function(){
            $('.blog-reply a').on('click', function (){
                $('.comment-form-wrap').fadeOut(200);
                $('.blog-reply-form').fadeIn(200);
                $('.blog-reply a').fadeOut(200);
            });

            $('.comment-body .reply').on('click', function(){
                $('.comment-form-wrap').fadeOut(200);
                $(this).closest('.comment-body').find('.comment-form-wrap').fadeIn(200);
                $('.blog-reply a').fadeIn(200);
            });
            
            $('form[name="comments"]').on('submit', function(event){
                event.preventDefault();
                var error = false;

                var inputName = $(this).find('input[name="name"]');
                var inputEmail = $(this).find('input[name="email"]');
                var inputText = $(this).find('textarea[name="text"]');
                var token = $(this).find('input[name="_token"]').val();
                var parent = $(this).find('input[name="parent"]').val();
                var blog_id = $(this).find('input[name="blog_id"]').val();
                var url = $(this).attr('action');

                if (inputName.length > 0 && inputEmail.length >0){
                    if (!inputName.val() || inputName.val() == ''){
                        toastr.warning('Введите ваше имя');
                        error = 1;
                    }
                    if (!inputEmail.val() || inputEmail.val() == ''){
                        toastr.warning('Введите ваш email');
                        error = 1;
                    }
                }
                if (!$(this).find('textarea[name="text"]').val() || $(this).find('textarea[name="text"]').val() == ''){
                    toastr.warning('Введите текст');
                    error = 1;
                }
                
                if(error){
                    return false;
                }
                
                data = {
                    name: inputName.val(),
                    email: inputEmail.val(),
                    text: inputText.val(),
                    parent: parent,
                    blog_id: blog_id,
                    _token: token
                }               
                
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: data,
                    dataType: 'JSON',
                    success: (response) => {
                        if (response.auth == 0){
                            var authTpl = `
                                <div class="form-group">
                                    <label for="name">Name *</label>
                                    <input type="text" name="name" class="form-control" id="name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email *</label>
                                    <input type="email" name="email" class="form-control" id="email">
                                </div>
                            `;
                        } else {
                            authTpl = '';
                        }

                        
                        var commentTpl = `
                            <li class="comment">
                               <div class="vcard bio">
                                   <img src="/`+response.image+`" alt="Image placeholder">
                               </div>
                               <div class="comment-body">
                                   <h3>`+response.name+`</h3>
                                   <div class="meta"> `+response.created_at+` </div>
                                   <p>`+response.text+`</p>
                                   <p><a href="javascript:void(0)" class="reply reply-added">Reply</a></p>

                                   <div class="comment-form-wrap">
                                       <h3>Leave a comment</h3>
                                       <form action="http://pizza.loc/comment" name="comments" method="post">
                                           <input type="hidden" name="_token" value="`+response.token+`">
                                           <input type="hidden" name="parent" value="`+response.parent+`">
                                           <input type="hidden" name="blog_id" value="`+response.blog_id+`">
                                           ` + authTpl + `
                                           <div class="form-group">
                                               <label for="message">Message</label>
                                               <textarea name="text" class="form-control"></textarea>
                                           </div>
                                           <div class="form-group">
                                               <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
                                           </div>

                                       </form>
                                   </div>

                               </div>

                           </li>                       
                        `;
                        
                        console.log(response);
                        $(this).hide(200);
                        toastr.info('Коментарий добавлен');
                        if(response.parent == 0){
                            $('.comment-list').append(commentTpl);
                        } else {
                            if ($(this).closest('.comment').find('.children').length == 0) {
                                $(this).closest('.comment').append('<ul class="children">' + commentTpl + '</ul>');
                            } else {
                                $(this).closest('.comment').find('.children').append(commentTpl);
                            }
                        }
                        $('.reply-added').on('click', function(){
                            $('.comment-form-wrap').fadeOut(200);
                            $(this).closest('.comment-body').find('.comment-form-wrap').fadeIn(200);
                            $('.blog-reply a').fadeIn(200);
                        });  
                        $('.reply-added').removeClass('reply-added')
                    }
                  });
            });
           
        });
    </script>

@endsection