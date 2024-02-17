  @include('front-layout.header')
  <!--=================================
banner -->
  <section class="banner bg-holder bg-overlay-black-30" style="background-image: url({{asset('front/images/banner-01.jpg')}});">
    <div class="container">
      <div class="row">
        <div class="col-12 position-relative">
          <h1 class="text-white text-center mb-2">Create lasting wealth through WafiReality</h1>
          <p class="lead text-center text-white mb-4 fw-normal">Take a step to realizing your dream. #TimeToMove</p>
          <div class="property-search-field bg-white">
            <div class="property-search-item">
              <form class="row basic-select-wrapper" action="/search-propert" method="post">
                <div class="form-group col-lg-3 col-md-6">
                  <label class="form-label">Property type</label>
                  @csrf
                  <select class="form-control basic-select" name="type">
                   {!!$categoryoption!!}
                  </select>
                </div>
                <div class="form-group col-lg-3 col-md-6">
                  <label class="form-label">Status</label>
                  <select class="form-control basic-select" name="status">
                    <option value="Ready to move">Ready To Move</option>
                    <option value="Under construction">Under construction</option>
                  </select>
                </div>
                <div class="form-group d-flex col-lg-6">
                  <div class="form-group-search">
                    <label class="form-label">Location</label>
                    <div class="d-flex align-items-center"><i class="far fa-compass me-1"></i><input
                        class="form-control" type="search" name="location" placeholder="Search Location"></div>
                  </div>
                  <span class="align-items-center ms-3 d-none d-lg-block"><button
                      class="btn btn-primary d-flex align-items-center" type="submit"><i
                        class="fas fa-search me-1"></i><span>Search</span></button></span>
                </div>
                <!-- <div class="form-group text-center col-lg-2">
                  <div class="d-flex justify-content-center d-md-inline-block">
                    <a class="more-search p-0" data-bs-toggle="collapse" href="#advanced-search" role="button"
                      aria-expanded="false" aria-controls="advanced-search"> <span class="d-block pe-2 mb-1">Advanced
                        search</span>
                      <i class="fas fa-angle-double-down"></i></a>
                  </div>
                </div> -->
                <div class="collapse advanced-search p-0" id="advanced-search">
                  <div class="card card-body">
                    <div class="row">
                      <div class="form-group col-md-3">
                        <label class="form-label">Distance from location</label>
                        <select class="form-control basic-select">
                          <option>This area only</option>
                          <option>Within 1 mile</option>
                          <option>Within 3 miles</option>
                          <option>Within 5 miles</option>
                          <option>Within 10 miles</option>
                          <option>Within 15 miles</option>
                          <option>Within 30 miles</option>
                        </select>
                      </div>
                      <div class="form-group col-md-3">
                        <label class="form-label">Bedrooms</label>
                        <select class="form-control basic-select">
                          <option>No max</option>
                          <option>01</option>
                          <option>02</option>
                          <option>03</option>
                        </select>
                      </div>
                      <div class="form-group col-md-3">
                        <label class="form-label">Sort by</label>
                        <select class="form-control basic-select">
                          <option>Most popular</option>
                          <option>Highest price</option>
                          <option>Lowest price</option>
                          <option>Most reduced</option>
                        </select>
                      </div>
                      <div class="form-group col-md-3">
                        <label class="form-label">Floor</label>
                        <select class="form-control basic-select">
                          <option>Select Floor</option>
                          <option>01</option>
                          <option>02</option>
                          <option>03</option>
                        </select>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-3">
                        <label class="form-label">Min Area (sq ft)</label>
                        <input class="form-control" placeholder="Type (sq ft)">
                      </div>
                      <div class="form-group col-md-3">
                        <label class="form-label">Max Area (sq ft)</label>
                        <input class="form-control" placeholder="Type (sq ft)">
                      </div>
                      <div class="form-group col-md-6 property-price-slider ">
                        <label class="form-label">Select Price Range</label>
                        <input type="text" id="property-price-slider" name="example_name" value="" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="d-lg-none btn-mobile p-3 d-grid">
                  <button class="btn btn-primary align-items-center" type="submit"><i
                      class="fas fa-search me-1"></i><span>Search</span></button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--=================================
banner -->

  <!--=================================
Browse properties -->
  <section class="space-ptb">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="section-title text-center">
            <h2>Browse by category</h2>
            <p>To browse and buy in your areas of interest, look for properties by category.</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="category">
            <ul class="list-unstyled mb-0">
              @foreach($category as $cat)
              <li class="category-item">
                <a href="/project-list?category={{$cat['id']}}">
                  <div class="category-icon">
                    <i class="flaticon-building-2"></i>
                  </div>
                  <h6 class="mb-0">{{$cat['type']}}</h6>
                  <!-- <span>(457)</span> -->
                </a>
              </li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--=================================
 Browse properties -->

  <!--=================================
  Featured properties-->
  <section class="space-pb">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="section-title text-center">
            <h2>Newly listed properties</h2>
            <p>Find your dream home from our Newly added properties</p>
          </div>
        </div>
      </div>
      <div class="row">
          @foreach($projects as $project)
            <div class="col-sm-6 col-md-4">
              <div class="property-item">
                <div class="property-image bg-overlay-gradient-04">
                  <img class="img-fluid" src="{{end($project['images'])['image_path']}}" alt="">
                  <div class="property-lable">
                    <span class="badge badge-md bg-primary">{{$project['type']}}</span>
                    <span class="badge badge-md bg-info">Sale</span>
                  </div>
                  <span class="property-trending" title="trending"><i class="fas fa-bolt"></i></span>
                  <!-- <div class="property-agent">
                    <div class="property-agent-image">
                      <img class="img-fluid" src="{{asset('front/images/avatar/01.jpg')}}" alt="">
                    </div>
                    <div class="property-agent-info">
                      <a class="property-agent-name" href="#">Alice Williams</a>
                      <span class="d-block">Company Agent</span>
                      <ul class="property-agent-contact list-unstyled">
                        <li><a href="#"><i class="fas fa-mobile-alt"></i> </a></li>
                        <li><a href="#"><i class="fas fa-envelope"></i> </a></li>
                      </ul>
                    </div>
                  </div> -->
                  <div class="property-agent-popup">
                    <a href="#"><i class="fas fa-camera"></i>{{count($project['images'])}}</a>
                  </div>
                </div>
                <div class="property-details">
                  <div class="property-details-inner">
                    <h5 class="property-title"><a href="#">{{$project['project_name']}}</a>
                    </h5>
                    <span class="property-address"><i class="fas fa-map-marker-alt fa-xs"></i>{{$project['location']}}</span>
                    <span class="property-agent-date"><i class="far fa-clock fa-md"></i>{{$project['days']}} days ago</span>
                    <div class="property-price">{{$project['price']}}<span></span> </div>
                    <ul class="property-info list-unstyled d-flex">
                      <li class="flex-fill property-bed"><i class="fas fa-bed"></i>{{$project['configurations']}}</li>
                      <!-- <li class="flex-fill property-bath"><i class="fas fa-bath"></i>Bath<span>2</span></li> -->
                      <li class="flex-fill property-m-sqft"><i class="far fa-square"></i>{{$project['area']}}</li>
                    </ul>
                  </div>
                  <div class="property-btn">
                    <a class="property-link" href="/project-details?id={{$project['id']}}">See Details</a>
                    <ul class="property-listing-actions list-unstyled mb-0">
                      <li class="property-compare">
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Compare" href="#"><i
                            class="fas fa-exchange-alt"></i></a>
                      </li>
                      <li class="property-favourites">
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Favourite" href="#"><i
                            class="far fa-heart"></i></a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        <div class="col-12 text-center">
          <a class="btn btn-link" href="/project-list"><i class="fas fa-plus"></i>View All Listings</a>
        </div>
      </div>
    </div>
  </section>
  <!--=================================
Featured properties-->

  <!--=================================
 offering the Best Real Estate-->
  <!-- <section class="clearfix">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="section-title text-center">
            <h2>Discover our best deals</h2>
            <p>Check the listings of the best dealer on WafiReality and contact the agency or its agent by phone or
              contact form.</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="owl-carousel owl-nav-top-right" data-animateOut="fadeOut" data-nav-arrow="true" data-items="1"
            data-md-items="1" data-sm-items="1" data-xs-items="1" data-xx-items="1" data-space="0">
            <div class="item">
              <div class="property-offer">
                <div class="property-offer-item">
                  <div class="property-offer-image bg-holder"
                    style="background: url('images/property/big-img-01.jpg');">
                    <div class="row">
                      <div class="col-lg-6 col-md-10 col-sm-12">
                        <div class="property-details">
                          <div class="property-details-inner">
                            <h5 class="property-title"><a href="#">Ample apartment at last
                                floor </a></h5>
                            <span class="property-address"><i class="fas fa-map-marker-alt fa-xs"></i>Virginia drive
                              temple hills</span>
                            <span class="property-agent-date"><i class="far fa-clock fa-md"></i>10 days ago</span>
                            <p class="mb-0 d-block mt-3">Use a past defeat as a motivator. Remind yourself you have
                              nowhere to go except up as you.</p>
                            <div class="property-price">$150.00<span> / month</span> </div>
                            <ul class="property-info list-unstyled d-flex">
                              <li class="flex-fill property-bed"><i class="fas fa-bed"></i>Bed<span>1</span></li>
                              <li class="flex-fill property-bath"><i class="fas fa-bath"></i>Bath<span>2</span></li>
                              <li class="flex-fill property-m-sqft"><i class="far fa-square"></i>sqft<span>145m</span>
                              </li>
                            </ul>
                          </div>
                          <div class="property-btn">
                            <a class="property-link" href="#">See Details</a>
                            <ul class="property-listing-actions list-unstyled mb-0">
                              <li class="property-compare"><a data-bs-toggle="tooltip" data-bs-placement="top"
                                  title="Compare" href="#"><i class="fas fa-exchange-alt"></i></a></li>
                              <li class="property-favourites"><a data-bs-toggle="tooltip" data-bs-placement="top"
                                  title="Favourite" href="#"><i class="far fa-heart"></i></a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="property-offer">
                <div class="property-offer-item">
                  <div class="property-offer-image bg-holder"
                    style="background: url('images/property/big-img-02.jpg');">
                    <div class="row">
                      <div class="col-lg-6 col-md-10 col-sm-12">
                        <div class="property-details">
                          <div class="property-details-inner">
                            <h5 class="property-title"><a href="#">Luxury villa with
                                pool</a></h5>
                            <span class="property-address"><i class="fas fa-map-marker-alt fa-xs"></i>West Indian St.
                              Missoula</span>
                            <span class="property-agent-date"><i class="far fa-clock fa-md"></i>2 years ago</span>
                            <p class="mb-0 d-block mt-3">For those of you who are serious about having more, doing more,
                              giving more and being more.</p>
                            <div class="property-price">$698.00<span> / month</span> </div>
                            <ul class="property-info list-unstyled d-flex">
                              <li class="flex-fill property-bed"><i class="fas fa-bed"></i>Bed<span>5</span></li>
                              <li class="flex-fill property-bath"><i class="fas fa-bath"></i>Bath<span>4</span></li>
                              <li class="flex-fill property-m-sqft"><i class="far fa-square"></i>sqft<span>1,658m</span>
                              </li>
                            </ul>
                          </div>
                          <div class="property-btn">
                            <a class="property-link" href="#">See Details</a>
                            <ul class="property-listing-actions list-unstyled mb-0">
                              <li class="property-compare"><a data-bs-toggle="tooltip" data-bs-placement="top"
                                  title="Compare" href="#"><i class="fas fa-exchange-alt"></i></a></li>
                              <li class="property-favourites"><a data-bs-toggle="tooltip" data-bs-placement="top"
                                  title="Favourite" href="#"><i class="far fa-heart"></i></a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->
  <!--=================================
  offering the Best Real Estate-->

  <!--=================================
  Feature -->
  <section class="space-ptb bg-holder-bottom building-space" style="background-image: url(images/building-bg.png);">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-9">
          <div class="section-title mb-0">
            <h2>Plenty of reasons to choose us</h2>
            <p>Our agency has many specialized areas, but our CUSTOMERS are our real specialty.</p>
          </div>
        </div>
        <div class="col-lg-3 text-lg-end">
          <a class="btn btn-primary" href="#">More about us </a>
        </div>
      </div>
      <div class="row g-0 mt-4">
        <div class="col-lg-3 col-sm-6">
          <div class="feature-info h-100">
            <div class="feature-info-icon">
              <i class="flaticon-like"></i>
            </div>
            <div class="feature-info-content">
              <h6 class="mb-3 feature-info-title">Excellent reputation</h6>
              <p class="mb-0">Our comprehensive database of listings and market info give the most accurate view of the
                market and your home value.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="feature-info h-100">
            <div class="feature-info-icon">
              <i class="flaticon-agent"></i>
            </div>
            <div class="feature-info-content">
              <h6 class="mb-3 feature-info-title">Best local agents</h6>
              <p class="mb-0">You are just minutes from joining with the best agents who are fired up about helping you
                Buy or sell.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="feature-info h-100">
            <div class="feature-info-icon">
              <i class="flaticon-like-1"></i>
            </div>
            <div class="feature-info-content">
              <h6 class="mb-3 feature-info-title">Peace of mind</h6>
              <p class="mb-0">Rest guaranteed that your agent and their expert team are handling every detail of your
                transaction from start to end.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="feature-info h-100">
            <div class="feature-info-icon">
              <i class="flaticon-house-1"></i>
            </div>
            <div class="feature-info-content">
              <h6 class="mb-3 feature-info-title">Tons of options</h6>
              <p class="mb-0">Discover a place you’ll love to live in. Choose from our vast inventory and choose your
                desired house.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row justify-content-center mt-5">
        <div class="col-lg-7 text-center">
          <p class="mb-4">Ten years and thousands of home buyers have turned to WafiReality to find their dream home. We
            offer a comprehensive list of for-sale properties, as well as the knowledge and tools to make informed real
            estate decisions. Today, more than ever, WafiReality is the home of home Search.</p>
          <div class="popup-video">
            <a class="popup-icon popup-youtube" href="#"> <i class="flaticon-play-button"></i> </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--=================================
  Feature -->

  <!--=================================
testimonial -->
  <section class="testimonial-main bg-holder" style="background-image: url(images/bg/02.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="owl-carousel owl-dots-bottom-left" data-nav-dots="true" data-items="1" data-md-items="1"
            data-sm-items="1" data-xs-items="1" data-xx-items="1" data-space="0">
            <div class="item">
              <div class="testimonial">
                <div class="testimonial-content">
                  <p><i class="quotes">"</i>Thank you Martin for selling our apartment. We are delighted with the
                    result. I can highly recommend Martin to anyone seeking a truly professional Realtor.</p>
                </div>
                <div class="testimonial-name">
                  <h6 class="text-primary mb-1">Lisa & Graeme</h6>
                  <span>Hamilton Rd. Willoughby</span>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimonial">
                <div class="testimonial-content">
                  <p><i class="quotes">"</i>Oliver always had a smile and was so quick to answer and get the job done.
                    I'll definitely suggest you to anyone we know who is selling or wanting to purchase a home. He is
                    the best!</p>
                </div>
                <div class="testimonial-name">
                  <h6 class="text-primary mb-1">Jessica Alex</h6>
                  <span>West Division Street</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--=================================
testimonial -->

  <!--=================================
Meet our agent -->
  <!-- <section class="space-ptb">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="section-title text-center">
            <h2>Meet our agents</h2>
            <p>WafiReality Agents are customer advocates. We are accountable for helping clients buy and sell the right
              home, at the right price.</p>
          </div>
        </div>
      </div>
      <div class="row g-0">
        <div class="col-lg-3 col-sm-6 mb-4 mb-sm-0">
          <div class="agent text-center">
            <div class="agent-detail">
              <div class="agent-avatar avatar avatar-xllll">
                <img class="img-fluid rounded-circle" src="{{asset('front/images/agent/01.jpg')}}" alt="">
              </div>
              <div class="agent-info">
                <h6 class="mb-0"> <a href="#">Alice Williams </a></h6>
                <span class="text-primary font-sm">Founder & CEO </span>
                <p class="mt-3 mb-0">The first thing to remember about success is that it is a process – nothing more,
                  nothing less.</p>
              </div>
            </div>
            <div class="agent-button">
              <a class="btn btn-light d-grid" href="#">View Profile</a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-4 mb-sm-0">
          <div class="agent text-center">
            <div class="agent-detail">
              <div class="agent-avatar avatar avatar-xllll">
                <img class="img-fluid rounded-circle" src="{{asset('front/images/agent/02.jpg')}}" alt="">
              </div>
              <div class="agent-info">
                <h6 class="mb-0"> <a href="#">Felica queen </a></h6>
                <span class="text-primary font-sm">Construction</span>
                <p class="mt-3 mb-0">There are basically six key areas to higher achievement. Some people will tell you
                  there are four.</p>
              </div>
            </div>
            <div class="agent-button">
              <a class="btn btn-light d-grid" href="#">View Profile</a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-4 mb-sm-0">
          <div class="agent text-center">
            <div class="agent-detail">
              <div class="agent-avatar avatar avatar-xllll">
                <img class="img-fluid rounded-circle" src="{{asset('front/images/agent/03.jpg')}}" alt="">
              </div>
              <div class="agent-info">
                <h6 class="mb-0"> <a href="#">Paul flavius </a></h6>
                <span class="text-primary font-sm">Investment</span>
                <p class="mt-3 mb-0">While others may tell you there are eight. One thing for certain though, is that
                  irrespective of the.</p>
              </div>
            </div>
            <div class="agent-button">
              <a class="btn btn-light d-grid" href="#">View Profile</a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="agent text-center">
            <div class="agent-detail">
              <div class="agent-avatar avatar avatar-xllll">
                <img class="img-fluid rounded-circle" src="{{asset('front/images/agent/04.jpg')}}" alt="">
              </div>
              <div class="agent-info">
                <h6 class="mb-0"> <a href="#">Sara lisbon </a></h6>
                <span class="text-primary font-sm">Land development</span>
                <p class="mt-3 mb-0">If success is a process with a number of defined steps, then it is just like any
                  other process.</p>
              </div>
            </div>
            <div class="agent-button">
              <a class="btn btn-light d-grid" href="#">View Profile</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->
  <!--=================================
Meet our agent -->

  <!--=================================
Most popular places -->
  <!-- <section class="space-pb">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="section-title text-center">
            <h2>Most popular places</h2>
            <p>Discover homes in WafiReality Most Popular Cities</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="row">
            <div class="col-md-6 mb-4 mb-lg-0">
              <a href="#">
                <div class="location-item bg-overlay-gradient bg-holder"
                  style="background-image: url(images/location/01.jpg);">
                  <div class="location-item-info">
                    <h5 class="location-item-title">Mumbai</h5>
                    <span class="location-item-list">10 Properties</span>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-md-6 mb-4 mb-md-0">
              <a href="#">
                <div class="location-item bg-overlay-gradient bg-holder"
                  style="background-image: url(images/location/02.jpg);">
                  <div class="location-item-info">
                    <h5 class="location-item-title">Los angeles</h5>
                    <span class="location-item-list">14 Properties</span>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-12 mt-0 mt-lg-4">
              <a href="#">
                <div class="location-item bg-overlay-gradient bg-holder"
                  style="background-image: url(images/location/04.jpg);">
                  <div class="location-item-info">
                    <h5 class="location-item-title">Miami</h5>
                    <span class="location-item-list">22 Properties</span>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 mt-4 mt-lg-0">
          <a href="#">
            <div class="location-item location-item-big bg-overlay-gradient bg-holder" data-jarallax='{"speed": 0.6}'
              data-jarallax-video="#">
              <div class="location-item-info">
                <h5 class="location-item-title">San francisco </h5>
                <span class="location-item-list">29 Properties</span>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section> -->
  <!--=================================
Most popular places -->

  <!--=================================
mobile app -->
  <section class="space-pt bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <div class="section-title">
            <h2>Download our android and iOS app to get exciting features prime content</h2>
            <p>Our Real Estate app simplifies your home search. Spontaneously see nearby homes for sale, apartments for
              rent.</p>
          </div>
          <div class="row">
            <div class="col-md-4 mb-5">
              <div class="d-flex">
                <div class="me-3">
                  <i class="flaticon-rent font-xlll"></i>
                </div>
                <h6 class="text-primary">Real time property listing</h6>
              </div>
            </div>
            <div class="col-md-4 mb-5">
              <div class="d-flex">
                <div class="me-3">
                  <i class="flaticon-contract font-xlll"></i>
                </div>
                <h6 class="text-primary">Budget filter for budget</h6>
              </div>
            </div>
            <div class="col-md-4 mb-5">
              <div class="d-flex">
                <div class="me-3">
                  <i class="flaticon-notification font-xlll"></i>
                </div>
                <h6 class="text-primary">Notification price reduction</h6>
              </div>
            </div>
          </div>
          <div class="d-block d-sm-flex">
            <a class="btn btn-dark btn-sm btn-app me-0 me-sm-2 mb-2 mb-sm-0" href="#">
              <i class="fab fa-apple"></i>
              <div class="btn-text text-start">
                <small class="small-text">Download on the </small>
                <span class="mb-0 text-white d-block">App store</span>
              </div>
            </a>
            <a class="btn btn-dark btn-sm btn-app mb-2 mb-sm-0" href="#">
              <i class="fab fa-google-play"></i>
              <div class="btn-text text-start">
                <small class="small-text">Get in on </small>
                <span class="mb-0 text-white d-block">google play</span>
              </div>
            </a>
          </div>
        </div>
        <div class="col-lg-5 mt-5 mt-lg-0 text-center">
          <img class="img-fluid" src="{{asset('front/images/mobile-app.png')}}" alt="">
        </div>
      </div>
    </div>
  </section>
  <!--=================================
mobile app -->

  <!--=================================
News, tips & articles -->
  <section class="space-ptb">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="section-title text-center">
            <h2>News, tips & articles</h2>
            <p>Grow your appraisal and real estate career with tips, trends, insights and learn more about our expert's
              advice.</p>
          </div>
        </div>
      </div>
      <div class="row">
        @foreach($news as $new)
        <div class="col-lg-4">
          <div class="blog-post">
            <div class="blog-post-image">
              <img class="img-fluid" src="{{$new['image_path']}}" alt="">
            </div>
            <div class="blog-post-content">
              <div class="blog-post-details">
                <div class="blog-post-category">
                  <a class="mb-3" href="#"><strong>Home improvement</strong></a>
                </div>
                <div class="blog-post-title">
                  <h5><a href="#">{{$new['title']}}</a></h5>
                </div>
                <div class="blog-post-description">
                  <p class="mb-0">{!!substr($new['description'],0,80)!!}...</p>
                </div>
              </div>
              <div class="blog-post-footer">
                <div class="blog-post-time">
                  <a href="#"> <i class="far fa-clock"></i>{{date('d M Y',strtotime($new['created_at']))}}</a>
                </div>
                <div class="blog-post-author">
                  <span> By <a href="#"> {{$new['add_by']}}</a>
                  </span>
                </div>
                <!-- <div class="blog-post-comment">
                  <a href="#"> <i class="far fa-comment"></i>(12) </a>
                </div> -->
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  <!--=================================
News, tips & articles -->

  <!--=================================
call to action -->
  <section class="py-5 bg-primary">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-9">
          <h2 class="text-white mb-0">Looking to sell or rent your property?</h2>
        </div>
        <div class="col-lg-3 text-lg-end mt-3 mt-lg-0">
          <a class="btn btn-white" href="#">Get a free quote</a>
        </div>
      </div>
    </div>
  </section>
  <!--=================================
call to action -->

@include('front-layout.footer');