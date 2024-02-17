@include('front-layout.header')

 <!--=================================
blog-detail -->
<section class="space-ptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-detail">
                        <div class="blog-post">
                            <div class="blog-post-title">
                                <h2>{{$blogs['title']}}</h2>
                            </div>
                            <div class="blog-post-category ">
                                <a class="mb-3" href="#"><strong>{{$blogs['category']}}</strong></a>
                            </div>
                            <div class="blog-post-footer border-0 justify-content-start">
                                <div class="blog-post-time ms-0">
                                    <a href="#"> <i class="far fa-clock"></i>{{date('d M Y',strtotime($blogs['created_at']))}}</a>
                                </div>
                                <div class="blog-post-author">
                                    <span> By <a href="#"> {{$blogs['add_by']}}</a>
                                    </span>
                                </div>
                            </div>
                            <div class="blog-post-image">
                                <img class="img-fluid mb-4" src="/public/{{$blogs['image_path']}}" alt="">
                            </div>
                            <div class="blog-post-content border-0">
                                <div class="blog-post-description">
                                    {!!$blogs['description']!!}
                                </div>
                            </div>
                            <div class="mt-4">
                                    <h5 class="mb-4">Related Post</h5>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="owl-carousel " data-nav-dots="true" data-items="2"
                                                data-md-items="2" data-sm-items="1" data-xs-items="1" data-xx-items="1"
                                                data-space="15">
                                                @foreach($relatedblogs as $related)
                                                    <div class="item">
                                                        <div class="blog-post">
                                                            <div class="blog-post-image">
                                                                <img class="img-fluid" src="/public/{{$related['image_path']}}" alt="">
                                                            </div>
                                                            <div class="blog-post-content">
                                                                <div class="blog-post-details">
                                                                    <div class="blog-post-category">
                                                                        <a class="mb-3" href="/detail-blog?id={{$related['id']}}"><strong>{{$related['category']}}</strong></a>
                                                                    </div>
                                                                    <div class="blog-post-title">
                                                                        <h5><a href="/detail-blog?id={{$related['id']}}">{{$related['title']}}</a></h5>
                                                                    </div>
                                                                    <div class="blog-post-description">
                                                                        {{strip_tags(substr($related['description'],0,100)).'.....'}}
                                                                    </div>
                                                                </div>
                                                                <div class="blog-post-footer">
                                                                    <div class="blog-post-time">
                                                                        <a href="/detail-blog?id={{$related['id']}}"> <i class="far fa-clock"></i>{{date('d M Y',strtotime($related['created_at']))}}</a>
                                                                    </div>
                                                                    <div class="blog-post-author">
                                                                        <span> By <a href="/detail-blog?id={{$related['id']}}"> <img class="img-fluid"
                                                                                    src="images/avatar/01.jpg" alt="">WafiRealty</a> </span>
                                                                    </div>
                                                                    <div class="blog-post-comment">
                                                                        <a href="#"> <i class="far fa-comment"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>      
                                        </div>
                                    </div>
                                    <hr class="my-5" />
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-5 mt-lg-0">
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
                            @foreach($allblogs as $blog)
                            @if($blog['id']!=$blogs['id'])
                            <div class="d-flex mb-3 align-items-top">
                                <div class="avatar avatar-xl h-auto">
                                    <img class="img-fluid" src="/public/{{$blog['image_path']}}" alt="">
                                </div>
                                <div class="ms-3">
                                    <a class="text-dark" href="/detail-blog?id={{$blog['id']}}"><b>{{$blog['title']}}</b></a>
                                    <a class="d-flex font-sm text-dark" href="/detail-blog?id={{$blog['id']}}">{{date('d M Y',strtotime($blog['created_at']))}}</a>
                                </div>
                            </div>
                            @endif
                            @endforeach
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
    </section>
    <!--=================================
blog-detail -->

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
                            <div class="mb-0">
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
