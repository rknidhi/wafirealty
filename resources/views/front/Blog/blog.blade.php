@include('front-layout.header')

    <section class="space-ptb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>WAFI Realty: Your Key to Real Estate Success Through Digital Marketing Excellence.</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    @foreach($blogs as $blog)
                        <div class="blog-post mt-4">
                            <div class="blog-post-image">
                                <img class="img-fluid" src="/public/{{$blog['image_path']}}" alt="">
                            </div>
                            <div class="blog-post-content">
                                <div class="blog-post-details">
                                    <div class="blog-post-category mb-1">
                                        <a class="mb-3" href="#"><strong>{{$blog['category']}}</strong></a>
                                    </div>
                                    <div class="blog-post-title">
                                        <h5><a href="#">{{$blog['title']}}</a></h5>
                                    </div>
                                    <div class="blog-post-description">
                                        <!-- <p class="mb-0">{!!substr($blog['description'],0,200).'....'!!}</p> -->
                                    </div>
                                    <div class="blog-post-link mt-4">
                                        <a class="btn btn-link p-0" href="/detail-blog?id={{$blog['id']}}"> Continue read</a>
                                    </div>
                                </div>
                                <div class="blog-post-footer">
                                    <div class="blog-post-time">
                                        <a href="#"> <i class="far fa-clock"></i>{{date('d M Y',strtotime($blog['created_at']))}}</a>
                                    </div>
                                    <div class="blog-post-author">
                                        <span> By <a href="#"> <img class="img-fluid" src="{{asset('front/images/avatar/01.jpg')}}"
                                                    alt="">WafiRealty</a> </span>
                                    </div>
                                    <div class="blog-post-comment">
                                        <a href="#"> <i class="far fa-comment"></i> </a>
                                    </div>
                                    <div class="share-box">
                                        <a href="#"> <i class="fas fa-share-alt"></i> </a>
                                        <ul class="list-unstyled share-box-social">
                                            <li> <a href="#"><i class="fab fa-facebook-f"></i></a> </li>
                                            <li> <a href="#"><i class="fab fa-twitter"></i></a> </li>
                                            <li> <a href="#"><i class="fab fa-linkedin"></i></a> </li>
                                            <li> <a href="#"><i class="fab fa-instagram"></i></a> </li>
                                            <li> <a href="#"><i class="fab fa-pinterest"></i></a> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @if(count($blogs)==0)
                                <div class="d-flex mb-3 align-items-top">
                                    <div class="ms-3">
                                        <h3>No Data Found</h3>
                                    </div>
                                </div>
                            @endif
                </div><br>
                {!!$blogs->links('pagination::bootstrap-4')!!}  
                <div class="col-lg-4 mt-4 mt-lg-0">
                    <div class="blog-sidebar">
                        <div class="widget">
                            <div class="widget-title">
                                <h6>Search</h6>
                            </div>
                            <div class="search">
                                <i class="fas fa-search"></i>
                                <input type="text" class="form-control" placeholder="Search....">
                            </div>
                        </div>
                        <div class="widget">
                            <div class="widget-title">
                                <h6>Recent Posts</h6>
                            </div>
                            @foreach($blogs as $blog)
                            <div class="d-flex mb-3 align-items-top">
                                <div class="avatar avatar-xl h-auto">
                                    <img class="img-fluid" src="/public/{{$blog['image_path']}}" alt="">
                                </div>
                                <div class="ms-3">
                                    <a class="text-dark" href="/detail-blog?id={{$blog['id']}}"><b>{{$blog['title']}}</b></a>
                                    <a class="d-flex font-sm text-dark" href="/detail-blog?id={{$blog['id']}}">{{date('d M Y',strtotime($blog['created_at']))}}</a>
                                </div>
                            </div>
                            @endforeach
                            @if(count($blogs)==0)
                                <div class="d-flex mb-3 align-items-top">
                                    <div class="ms-3">
                                        <h3>No Data Found</h3>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="widget">
                            <div class="widget-title">
                                <h6>Category</h6>
                            </div>
                            @foreach($blogcategory as $category)
                            <div class="d-flex mb-3 align-items-top">
                                <div class="ms-3">
                                    <a class="text-dark" href="/blog?category={{$category['category']}}"><b>{{$category['category']}}</b></a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>



                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>
    <!--=================================
Blog -->

    <!--=================================
newsletter -->
    <section class="py-5 bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <h3 class="text-white mb-0">Sign up to our newsletter to get the latest news and offers.</h3>
                </div>
                <div class="col-md-7 mt-3 mt-md-0">
                    <div class="newsletter">
                        <form>
                            <div class="form-group mb-0">
                                <input type="email" class="form-control" placeholder="Enter email">
                            </div>
                            <button type="submit" class="btn btn-dark b-radius-left-none">Get notified</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
newsletter -->


@include('front-layout.footer')
