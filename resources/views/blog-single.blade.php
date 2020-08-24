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
                        <h3 class="mb-5">6 Comments</h3>
                        <ul class="comment-list">
                            <li class="comment">
                                <div class="vcard bio">
                                    <img src="{{ asset('assets/images/person_1.jpg') }}" alt="Image placeholder">
                                </div>
                                <div class="comment-body">
                                    <h3>John Doe 1</h3>
                                    <div class="meta">June 27, 2018 at 2:21pm</div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                    <p><a href="javascript:void(0)" class="reply">Reply</a></p>
                                    
                                    <div class="comment-form-wrap">
                                        <h3>Leave a comment</h3>
                                        <form action="{{ route('comment') }}" method="post">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <label for="name">Name *</label>
                                                <input type="text" name="name" class="form-control" id="name">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email *</label>
                                                <input type="email" name="email" class="form-control" id="email">
                                            </div>

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

                            <li class="comment">
                                <div class="vcard bio">
                                    <img src="{{ asset('assets/images/person_1.jpg') }}" alt="Image placeholder">
                                </div>
                                <div class="comment-body">
                                    <h3>John Doe 2</h3>
                                    <div class="meta">June 27, 2018 at 2:21pm</div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                    <p><a href="javascript:void(0)" class="reply">Reply</a></p>
                                    
                                    <div class="comment-form-wrap">
                                        <h3>Leave a comment</h3>
                                        <form action="{{ route('comment') }}" method="post">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <label for="name">Name *</label>
                                                <input type="text" name="name" class="form-control" id="name">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email *</label>
                                                <input type="email" name="email" class="form-control" id="email">
                                            </div>

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

                                <ul class="children">
                                    <li class="comment">
                                        <div class="vcard bio">
                                            <img src="{{ asset('assets/images/person_1.jpg') }}" alt="Image placeholder">
                                        </div>
                                        <div class="comment-body">
                                            <h3>John Doe 3</h3>
                                            <div class="meta">June 27, 2018 at 2:21pm</div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                            <p><a href="javascript:void(0)" class="reply">Reply</a></p>
                                            
                                            <div class="comment-form-wrap">
                                                <h3>Leave a comment</h3>
                                                <form action="{{ route('comment') }}" method="post">
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <label for="name">Name *</label>
                                                        <input type="text" name="name" class="form-control" id="name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Email *</label>
                                                        <input type="email" name="email" class="form-control" id="email">
                                                    </div>

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


                                        <ul class="children">
                                            <li class="comment">
                                                <div class="vcard bio">
                                                    <img src="{{ asset('assets/images/person_1.jpg') }}" alt="Image placeholder">
                                                </div>
                                                <div class="comment-body">
                                                    <h3>John Doe 4</h3>
                                                    <div class="meta">June 27, 2018 at 2:21pm</div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                                    <p><a href="javascript:void(0)" class="reply">Reply</a></p>
                                                    
                                                    <div class="comment-form-wrap">
                                                        <h3>Leave a comment</h3>
                                                        <form action="{{ route('comment') }}" method="post">
                                                            {{ csrf_field() }}
                                                            <div class="form-group">
                                                                <label for="name">Name *</label>
                                                                <input type="text" name="name" class="form-control" id="name">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="email">Email *</label>
                                                                <input type="email" name="email" class="form-control" id="email">
                                                            </div>
 
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

                                                <ul class="children">
                                                    <li class="comment">
                                                        <div class="vcard bio">
                                                            <img src="{{ asset('assets/images/person_1.jpg') }}" alt="Image placeholder">
                                                        </div>
                                                        <div class="comment-body">
                                                            <h3>John Doe 5</h3>
                                                            <div class="meta">June 27, 2018 at 2:21pm</div>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                                            <p><a href="javascript:void(0)" class="reply">Reply</a></p>
                                                            
                                                            <div class="comment-form-wrap">
                                                                <h3>Leave a comment</h3>
                                                                <form action="{{ route('comment') }}" method="post">
                                                                    {{ csrf_field() }}
                                                                    <div class="form-group">
                                                                        <label for="name">Name *</label>
                                                                        <input type="text" name="name" class="form-control" id="name">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="email">Email *</label>
                                                                        <input type="email" name="email" class="form-control" id="email">
                                                                    </div>

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
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li class="comment">
                                <div class="vcard bio">
                                    <img src="{{ asset('assets/images/person_1.jpg') }}" alt="Image placeholder">
                                </div>
                                <div class="comment-body">
                                    <h3>John Doe 6</h3>
                                    <div class="meta">June 27, 2018 at 2:21pm</div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                    <p><a href="javascript:void(0)" class="reply">Reply</a></p>
                                    
                                    <div class="comment-form-wrap">
                                        <h3>Leave a comment</h3>
                                        <form action="{{ route('comment') }}" method="post">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <label for="name">Name *</label>
                                                <input type="text" name="name" class="form-control" id="name">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email *</label>
                                                <input type="email" name="email" class="form-control" id="email">
                                            </div>

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
                        </ul>
                        <!-- END comment-list -->
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
        
        .comment-form-wrap{
            display: none;
        }
    </style>
    
    <script>
        $(document).ready(function(){
            $('.comment-body .reply').on('click', function(){
                $('.comment-body .comment-form-wrap').fadeOut(200);
                $(this).closest('.comment-body').find('.comment-form-wrap').fadeIn(200);
            });
        });
    </script>

@endsection