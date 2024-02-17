  @include('front-layout.header')
    <!--=================================
Breadcrumb -->
    <div class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="index.html"> <i class="fas fa-home"></i> </a></li>
                        <li class="breadcrumb-item"> <i class="fas fa-chevron-right"></i> <a href="#">Property</a></li>
                        <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span>{{$project['project_name']}}</span></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--=================================
Breadcrumb -->

    <div class="wrapper">
        <!--=================================
  Property details -->
        <section class="space-pt">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mb-5 mb-lg-0 order-lg-2">
                        <div class="sticky-top">
                            <div class="sidebar">
                            <div class="mb-4">
                                <h3>{{$project['project_name']}}</h3>
                                <span class="d-block mb-3"><i class="fas fa-map-marker-alt fa-xs pe-2"></i>{{$project['location']}}</span>
                                <span class="price font-xll text-dark d-block">{{$project['price']}}</span>
                                <span class="sub-price font-lg text-dark d-block"><b>{{$project['area']}}</b> </span>
                                <!-- <ul class="property-detail-meta list-unstyled ">
                                    <li><a href="#"> <i class="fas fa-star text-warning pe-2"></i>3.9/5 </a></li>
                                    <li class="share-box">
                                        <a href="#"> <i class="fas fa-share-alt"></i> </a>
                                        <ul class="list-unstyled share-box-social">
                                            <li> <a href="#"><i class="fab fa-facebook-f"></i></a> </li>
                                            <li> <a href="#"><i class="fab fa-twitter"></i></a> </li>
                                            <li> <a href="#"><i class="fab fa-linkedin"></i></a> </li>
                                            <li> <a href="#"><i class="fab fa-instagram"></i></a> </li>
                                            <li> <a href="#"><i class="fab fa-pinterest"></i></a> </li>
                                        </ul>
                                    </li>
                                    <li><a href="#"> <i class="fas fa-heart"></i> </a></li>
                                    <li><a href="#"> <i class="fas fa-exchange-alt"></i> </a></li>
                                    <li><a href="#"> <i class="fas fa-print"></i> </a></li>
                                </ul> -->
                            </div>
                            
                            <div class="agent-contact mb-4">
                <div class="agent-contact-inner bg-dark p-4">
                  <!--<div class="d-flex align-items-center mb-4">-->
                  <!--  <div class="agent-contact-avatar me-3">-->
                  <!--    <img class="img-fluid rounded-circle avatar avatar-lg" src="images/avatar/01.jpg" alt="">-->
                  <!--  </div>-->
                  <!--  <div class="agent-contact-name">-->
                  <!--    <h6 class="text-white">Felica queen</h6>-->
                  <!--    <span>Company Agent</span>-->
                  <!--  </div>-->
                  <!--</div>-->
                  <div class="d-flex mb-4 align-items-center">
                    <h6 class="text-primary border p-2 mb-0"><a href="#"><i class="fas fa-phone-volume text-white pe-2"></i>xx-xxx-xxx</a></h6>
                    <a class="btn btn-link p-0 ms-auto text-white" href="#"><u>View all listing </u></a>
                  </div>
                  <form>
                    <div class="mb-3">
                      <input type="email" class="form-control" placeholder="Your email Adress">
                    </div>
                    <div class="mb-3">
                      <input type="text" class="form-control" placeholder="Your Phone number">
                    </div>
                    <div class="mb-3">
                      <textarea class="form-control" rows="3" placeholder="Write Message"></textarea>
                    </div>
                    <div class="form-check mb-3">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label text-white" for="flexCheckDefault">
                        I here by agree for processing my personal data
                      </label>
                    </div>
                    <a class="btn btn-primary d-grid" href="#">Send Message</a>
                  </form>
                </div>
              </div>
              <div class="widget">
                <div class="widget-title">
                  <h6>Recently listed properties</h6>
                </div>
                @foreach($recentprojects as $recentproject)
                    <div class="recent-list-item">
                    <img class="img-fluid" src="/public/{{$recentproject['images'][0]['image_path']}}" alt="">
                    <div class="recent-list-item-info">
                        <a class="address mb-2" href="/project-details?id={{$recentproject['id']}}">{{$recentproject['project_name']}}</a>
                        <span class="text-dark">{{$recentproject['price']}}</span>
                    </div>
                    </div>
                @endforeach
              </div>
                            <!-- <div class="agent-contact">
                                <div class="d-flex align-items-center p-4 border border-bottom-0">
                                    <div class="agent-contact-avatar me-3">
                                        <img class="img-fluid rounded-circle avatar avatar-xl"
                                            src="{{asset('front/images/avatar/01.jpg')}}" alt="">
                                    </div>
                                    <div class="agent-contact-name">
                                        <h6>Joana williams</h6>
                                        <a href="#">Company Agent</a>
                                        <span class="d-block"><i class="fas fa-phone-volume pe-2 mt-2"></i>(123)
                                            345-6789</span>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <a href="#" class="btn btn-dark col b-radius-none">View listings</a>
                                    <a href="#" class="btn btn-primary col ms-0 b-radius-none">Request info</a>
                                </div>
                            </div> -->
                        </div>
                        </div>
                        
                    </div>
                    <div class="col-lg-8 order-lg-1">
                        <div class="property-detail-img popup-gallery">
                            <div class="owl-carousel" data-animateOut="fadeOut" data-nav-arrow="true" data-items="1"
                                data-md-items="1" data-sm-items="1" data-xs-items="1" data-xx-items="1" data-space="0"
                                data-loop="true">
                                @foreach($images as $img)
                                <div class="item">
                                    <a class="portfolio-img" href="/public{{$img['image_path']}}"><img
                                            class="img-fluid" src="/public{{$img['image_path']}}" alt=""></a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="property-info mt-5">
                            <div class="row">
                                <div class="col-sm-3 mb-3 mb-sm-0">
                                    <h5>Property details</h5>
                                </div>
                                <div class="col-sm-9">
                                    <div class="row mb-3">
                                        <div class="col-sm-6">
                                            <ul class="property-list list-unstyled">
                                                <li><b>Property ID:</b> RV151</li>
                                                <li><b>Price:</b>{{$project['price']}}</li>
                                                <li><b>Property Size:</b>{{$project['area']}}</li>
                                                <li><b>Bedrooms:</b>{{$project['configurations']}}</li>
                                                <!--<li><b>Bathrooms:</b></li>-->
                                            </ul>
                                        </div>
                                        <div class="col-sm-6">
                                            <ul class="property-list list-unstyled">
                                                <!--<li><b>Garage:</b> 1</li>-->
                                                <!--<li><b>Garage Size:</b></li>-->
                                                <!--<li><b>Year Built:</b> 2019-01-09</li>-->
                                                <li><b>Property Type:</b>{{$project['type']}}</li>
                                                <!--<li><b>Property Status:</b> For rent</li>-->
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- <h6 class="text-dark mb-3 mb-sm-0">Additional details</h6> -->
                                    <!--<div class="row">-->
                                    <!--    <div class="col-sm-6">-->
                                    <!--        <ul class="property-list list-unstyled mb-0">-->
                                    <!--            <li><b>Deposit:</b> 30%</li>-->
                                    <!--            <li><b>Pool Size:</b> 457 Sqft</li>-->
                                    <!--            <li><b>Last remodel year:</b> 1956</li>-->
                                    <!--        </ul>-->
                                    <!--    </div>-->
                                    <!--    <div class="col-sm-6">-->
                                    <!--        <ul class="property-list list-unstyled mb-0">-->
                                    <!--            <li><b>Amenities:</b> Clubhouse</li>-->
                                    <!--            <li><b>Additional Rooms:</b> Guest Bat</li>-->
                                    <!--            <li><b>Equipment:</b> Grill - Gas - light</li>-->
                                    <!--        </ul>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                </div>
                            </div>
                        </div>
                        <hr class="mt-4 mb-4 mb-sm-5 mt-sm-5">
                        <div class="property-description">
                            <div class="row">
                                <div class="col-sm-3 mb-3 mb-sm-0">
                                    <h5>Description</h5>
                                </div>
                                <div class="col-sm-9">
                                    {!!$project['about_project']!!}
                                </div>
                            </div>
                        </div>
                        <hr class="mt-4 mb-4 mb-sm-5 mt-sm-5">
                        <div class="property-features">
                            <div class="row">
                                <div class="col-sm-3 mb-3 mb-sm-0">
                                    <h5>Features</h5>
                                </div>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <ul class="property-list-style-2 list-unstyled mb-0">
                                                @foreach($aminities as $am)
                                                <li>{{$am}}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <!-- <div class="col-sm-6">
                                            <ul class="property-list-style-2 list-unstyled mb-0">
                                                <li>Lawn</li>
                                                <li>Refrigerator</li>
                                                <li>Sauna</li>
                                                <li>Washer</li>
                                                <li>Dryer</li>
                                                <li>WiFi</li>
                                                <li>Window Coverings</li>
                                            </ul>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="mt-4 mb-4 mb-sm-5 mt-sm-5">
                        <div class="property-address">
                            <div class="row">
                                <div class="col-sm-3 mb-3 mb-sm-0">
                                    <h5>Address</h5>
                                </div>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <ul class="property-list list-unstyled mb-0">
                                                <li><b>Address:</b>{{$project['location']}}</li>
                                                <!-- <li><b>State/County:</b> San francisco</li>
                                                <li><b>Area:</b> Embarcadero</li> -->
                                            </ul>
                                        </div>
                                        <!-- <div class="col-sm-6">
                                            <ul class="property-list list-unstyled mb-0">
                                                <li><b>City:</b> San francisco</li>
                                                <li><b>Zip:</b> 4848494</li>
                                                <li><b>Country:</b> United States</li>
                                            </ul>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <hr class="mt-4 mb-4 mb-sm-5 mt-sm-5"> -->
                        <!-- <div class="property-floor-plans">
                            <div class="row">
                                <div class="col-sm-3 mb-3 mb-sm-0">
                                    <h5>Floor plans</h5>
                                </div>
                                <div class="col-sm-9">
                                    <div class="accordion-style-2" id="accordion">
                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                                <h5 class="accordion-title mb-0">
                                                    <button class="btn btn-link d-flex ms-auto align-items-center"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                        aria-expanded="true" aria-controls="collapseOne">First Floor
                                                        <i class="fas fa-chevron-down fa-xs"></i></button>
                                                </h5>
                                            </div>
                                            <div id="collapseOne" class="collapse show accordion-content"
                                                aria-labelledby="headingOne" data-bs-parent="#accordion">
                                                <div class="card-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                        Cupiditate labore amet nulla a
                                                        nobis iste consequuntur laudantium natus corporis, eveniet quo
                                                        quidem perferendis sint illo
                                                        autem, aut incidunt enim libero.</p>
                                                    <img class="img-fluid" src="{{asset('front/images/property/floor-plans-01.jpg')}}"
                                                        alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="headingTwo">
                                                <h5 class="accordion-title mb-0">
                                                    <button
                                                        class="btn btn-link d-flex ms-auto align-items-center collapsed"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                        aria-expanded="false" aria-controls="collapseTwo">
                                                        Second Floor <i class="fas fa-chevron-down fa-xs"></i>
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapseTwo" class="collapse accordion-content"
                                                aria-labelledby="headingTwo" data-bs-parent="#accordion">
                                                <div class="card-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit rem
                                                        esse qui voluptatem
                                                        tempore nobis nihil, ex, odit vel exercitationem aperiam
                                                        provident consectetur. Ea, eos,
                                                        blanditiis! Rem quia, doloremque numquam.</p>
                                                    <img class="img-fluid" src="{{asset('front/images/property/floor-plans-01.jpg')}}"
                                                        alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="mt-4 mb-4 mb-sm-5 mt-sm-5"> -->
                        <!-- <div class="property-video">
                            <div class="row">
                                <div class="col-sm-3 mb-3 mb-sm-0">
                                    <h5>Property video</h5>
                                </div>
                                <div class="col-sm-9">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe width="546" height="315" src="https://www.youtube.com/embed/kacyaEXqVhs"
                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <hr class="mt-4 mb-4 mb-sm-5 mt-sm-5">
                        <div class="property-walk-score">
                            <div class="row">
                                <div class="col-sm-3 mb-3 mb-sm-0">
                                    <h5>WalkScore</h5>
                                </div>
                                <div class="col-sm-9">
                                    <div class="walk-score-info d-sm-flex">
                                        <div class="mb-2 mb-sm-0">
                                            <img src="{{asset('front/images/property/walk-score.png')}}" alt="">
                                            <p class="mb-0 d-block mt-2">walkscore96 / Walker's Paradise</p>
                                        </div>
                                        <a class="btn btn-primary btn-sm ms-auto" href="#">More details here</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        @if(isset($project['near_by']) && $project['near_by']!='')
                        <hr class="mt-4 mb-4 mb-sm-5 mt-sm-5">
                        <div class="property-nearby">
                            <div class="row">
                                <div class="col-sm-3 mb-3 mb-sm-0">
                                    <h5>What's nearby</h5>
                                </div>
                                <div class="col-sm-9">
                                    <div class="nearby-info mb-4">
                                        {!!$project['near_by']!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <hr class="mt-4 mb-4 mb-sm-5 mt-sm-5">
                        <div class="property-schedule">
                            <div class="row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <h5>Schedule a tour</h5>
                                    @include('event.layout.alert')
                                </div>
                                <form action="/schedule" method="post">
                                    @csrf
                                    <input type="hidden" value="{{$project['id']}}" name="project_id">
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="mb-3 col-sm-6 datetimepickers">
                                                <div class="input-group date" id="datetimepicker-01"
                                                    data-target-input="nearest">
                                                    <input type="text" name="date" class="form-control datetimepicker-input"
                                                        placeholder="Date" data-target="#datetimepicker-01" required>
                                                    <div class="input-group input-group-box"
                                                        data-target="#datetimepicker-01" data-toggle="datetimepicker">
                                                        <div class="input-group-text rounded-0 rounded-end"><i
                                                                class="far fa-calendar-alt"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 col-sm-6 datetimepickers">
                                                <div class="input-group date" id="datetimepicker-03"
                                                    data-target-input="nearest">
                                                    <input type="text" name="time" class="form-control datetimepicker-input"
                                                        placeholder="Time" data-target="#datetimepicker-03" required />
                                                    <div class="input-group input-group-box"
                                                        data-target="#datetimepicker-03" data-toggle="datetimepicker">
                                                        <div class="input-group-text rounded-0 rounded-end"><i
                                                                class="far fa-clock"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 col-sm-12">
                                                <input type="text" name="name" class="form-control" placeholder="Name" required>
                                            </div>
                                            <div class="mb-3 col-sm-12">
                                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                                            </div>
                                            <div class="mb-3 col-sm-12">
                                                <input type="Text" name="phone" class="form-control" placeholder="Phone" required maxlength="10" minlength="10">
                                            </div>
                                            <div class="mb-3 col-sm-12">
                                                <textarea class="form-control" name="msg" rows="4" placeholder="Message"></textarea>
                                            </div>
                                            <div class="mb-3 col-sm-12">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                            <div class="col-sm-6"></div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr class="mt-4 mb-4 mb-sm-5 mt-sm-5">
                        <!-- <div class="property-statistics">
                            <div class="row">
                                <div class="col-sm-3 mb-3 mb-sm-0">
                                    <h5>Page views statistics</h5>
                                </div>
                                <div class="col-sm-9">
                                    <img class="img-fluid" src="{{asset('front/images/property/views--statistics.jpg')}}" alt="">
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </section>
        <section class="space-pt">
            <div class="container">
                <hr class="mb-5 mt-0">
                <h5 class="mb-4">Similar properties</h5>
                <div class="row">
                    <div class="col-md-4">
                        <div class="property-item">
                            <div class="property-image bg-overlay-gradient-04">
                                <img class="img-fluid" src="{{asset('front/images/property/grid/01.jpg')}}" alt="">
                                <div class="property-lable">
                                    <span class="badge badge-md bg-primary">Bungalow</span>
                                    <span class="badge badge-md bg-info">Sale </span>
                                </div>
                                <span class="property-trending" title="trending"><i class="fas fa-bolt"></i></span>
                                <div class="property-agent">
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
                                </div>
                                <div class="property-agent-popup">
                                    <a href="#"><i class="fas fa-camera"></i> 06</a>
                                </div>
                            </div>
                            <div class="property-details">
                                <div class="property-details-inner">
                                    <h5 class="property-title"><a href="#">Ample apartment
                                            at last floor </a>
                                    </h5>
                                    <span class="property-address"><i class="fas fa-map-marker-alt fa-xs"></i>Virginia
                                        drive temple
                                        hills</span>
                                    <span class="property-agent-date"><i class="far fa-clock fa-md"></i>10 days
                                        ago</span>
                                    <div class="property-price">$150.00<span> / month</span> </div>
                                    <ul class="property-info list-unstyled d-flex">
                                        <li class="flex-fill property-bed"><i class="fas fa-bed"></i>Bed<span>1</span>
                                        </li>
                                        <li class="flex-fill property-bath"><i
                                                class="fas fa-bath"></i>Bath<span>2</span></li>
                                        <li class="flex-fill property-m-sqft"><i
                                                class="far fa-square"></i>sqft<span>145m</span></li>
                                    </ul>
                                </div>
                                <div class="property-btn">
                                    <a class="property-link" href="#">See Details</a>
                                    <ul class="property-listing-actions list-unstyled mb-0">
                                        <li class="property-compare"><a data-bs-toggle="tooltip" data-placement="top"
                                                title="Compare" href="#"><i class="fas fa-exchange-alt"></i></a></li>
                                        <li class="property-favourites"><a data-bs-toggle="tooltip" data-placement="top"
                                                title="Favourite" href="#"><i class="far fa-heart"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="property-item">
                            <div class="property-image bg-overlay-gradient-04">
                                <img class="img-fluid" src="{{asset('front/images/property/grid/02.jpg')}}" alt="">
                                <div class="property-lable">
                                    <span class="badge badge-md bg-primary">Apartment</span>
                                    <span class="badge badge-md bg-info">New </span>
                                </div>
                                <div class="property-agent">
                                    <div class="property-agent-image">
                                        <img class="img-fluid" src="{{asset('front/images/avatar/02.jpg')}}" alt="">
                                    </div>
                                    <div class="property-agent-info">
                                        <a class="property-agent-name" href="#">John doe</a>
                                        <span class="d-block">Company Agent</span>
                                        <ul class="property-agent-contact list-unstyled">
                                            <li><a href="#"><i class="fas fa-mobile-alt"></i> </a></li>
                                            <li><a href="#"><i class="fas fa-envelope"></i> </a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="property-agent-popup">
                                    <a href="#"><i class="fas fa-camera"></i> 12</a>
                                </div>
                            </div>
                            <div class="property-details">
                                <div class="property-details-inner">
                                    <h5 class="property-title"><a href="#">Awesome family
                                            home</a></h5>
                                    <span class="property-address"><i class="fas fa-map-marker-alt fa-xs"></i>Vermont
                                        dr. hephzibah</span>
                                    <span class="property-agent-date"><i class="far fa-clock fa-md"></i>2 months
                                        ago</span>
                                    <div class="property-price">$326.00<span> / month</span> </div>
                                    <ul class="property-info list-unstyled d-flex">
                                        <li class="flex-fill property-bed"><i class="fas fa-bed"></i>Bed<span>2</span>
                                        </li>
                                        <li class="flex-fill property-bath"><i
                                                class="fas fa-bath"></i>Bath<span>3</span></li>
                                        <li class="flex-fill property-m-sqft"><i
                                                class="far fa-square"></i>sqft<span>215m</span></li>
                                    </ul>
                                </div>
                                <div class="property-btn">
                                    <a class="property-link" href="#">See Details</a>
                                    <ul class="property-listing-actions list-unstyled mb-0">
                                        <li class="property-compare"><a data-bs-toggle="tooltip" data-placement="top"
                                                title="Compare" href="#"><i class="fas fa-exchange-alt"></i></a></li>
                                        <li class="property-favourites"><a data-bs-toggle="tooltip" data-placement="top"
                                                title="Favourite" href="#"><i class="far fa-heart"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="property-item">
                            <div class="property-image bg-overlay-gradient-04">
                                <img class="img-fluid" src="{{asset('front/images/property/grid/03.jpg')}}" alt="">
                                <div class="property-lable">
                                    <span class="badge badge-md bg-primary">Summer House</span>
                                    <span class="badge badge-md bg-info">Hot </span>
                                </div>
                                <span class="property-trending" title="trending"><i class="fas fa-bolt"></i></span>
                                <div class="property-agent">
                                    <div class="property-agent-image">
                                        <img class="img-fluid" src="{{asset('front/images/avatar/03.jpg')}}" alt="">
                                    </div>
                                    <div class="property-agent-info">
                                        <a class="property-agent-name" href="#">Felica queen</a>
                                        <span class="d-block">Investment</span>
                                        <ul class="property-agent-contact list-unstyled">
                                            <li><a href="#"><i class="fas fa-mobile-alt"></i> </a></li>
                                            <li><a href="#"><i class="fas fa-envelope"></i> </a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="property-agent-popup">
                                    <a href="#"><i class="fas fa-camera"></i> 03</a>
                                </div>
                            </div>
                            <div class="property-details">
                                <div class="property-details-inner">
                                    <h5 class="property-title"><a href="#">Contemporary
                                            apartment</a></h5>
                                    <span class="property-address"><i class="fas fa-map-marker-alt fa-xs"></i>Newport
                                        st. mebane,
                                        nc</span>
                                    <span class="property-agent-date"><i class="far fa-clock fa-md"></i>6 months
                                        ago</span>
                                    <div class="property-price">$658.00<span> / month</span> </div>
                                    <ul class="property-info list-unstyled d-flex">
                                        <li class="flex-fill property-bed"><i class="fas fa-bed"></i>Bed<span>3</span>
                                        </li>
                                        <li class="flex-fill property-bath"><i
                                                class="fas fa-bath"></i>Bath<span>4</span></li>
                                        <li class="flex-fill property-m-sqft"><i
                                                class="far fa-square"></i>sqft<span>3,189m</span></li>
                                    </ul>
                                </div>
                                <div class="property-btn">
                                    <a class="property-link" href="#">See Details</a>
                                    <ul class="property-listing-actions list-unstyled mb-0">
                                        <li class="property-compare"><a data-bs-toggle="tooltip" data-placement="top"
                                                title="Compare" href="#"><i class="fas fa-exchange-alt"></i></a></li>
                                        <li class="property-favourites"><a data-bs-toggle="tooltip" data-placement="top"
                                                title="Favourite" href="#"><i class="far fa-heart"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=================================
  Property details -->

        <!--=================================
Review -->
        <!-- <section class="space-pb">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h4>Leave a review for joana williams</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="review d-flex">
                            <div class="review-avatar avatar avatar-xl me-3">
                                <img class="img-fluid rounded-circle" src="{{asset('front/images/avatar/01.jpg')}}" alt="">
                            </div>
                            <div class="review-info flex-grow-1">
                                <span class="mb-2 d-block">Rating:</span>
                                <ul class="list-unstyled list-inline">
                                    <li class="list-inline-item m-0 text-warning"><i class="fas fa-star"></i></li>
                                    <li class="list-inline-item m-0 text-warning"><i class="fas fa-star"></i></li>
                                    <li class="list-inline-item m-0 text-warning"><i class="fas fa-star"></i></li>
                                    <li class="list-inline-item m-0 text-warning"><i class="fas fa-star-half-alt"></i>
                                    </li>
                                    <li class="list-inline-item m-0 text-warning"><i class="far fa-star"></i></li>
                                </ul>
                                <div class="mb-3">
                                    <span class="mb-2 d-block">Rating comment:</span>
                                    <div class="mb-3">
                                        <textarea class="form-control" rows="3"></textarea>
                                    </div>
                                </div>
                                <span> <a href="#"> <b>Login</b> </a> to leave a review</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!--=================================
Review -->
    </div>

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

   
