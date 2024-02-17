  @include('front-layout.header')
  <!--=================================
breadcrumb -->
  <div class="bg-light">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="index.html"> <i class="fas fa-home"></i> </a></li>
            <li class="breadcrumb-item"> <i class="fas fa-chevron-right"></i> <a href="#">Library</a></li>
            <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span> Property List </span></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!--=================================
breadcrumb -->

  <!--=================================
Listing – grid view -->
  <section class="space-ptb">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="section-title mb-3 mb-lg-4">
            <h2><span class="text-primary">156</span> Results</h2>
          </div>
        </div>
        <div class="col-md-6">
          <div class="property-filter-tag">
            <ul class="list-unstyled">
              <li><a href="#">Summer House <i class="fas fa-times-circle"></i> </a></li>
              <li><a class="filter-clear" href="#">Reset Search <i class="fas fa-redo-alt"></i> </a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- <div class="col-lg-3 mb-5 mb-lg-0">
          <div class="sidebar">
            <div class="widget">
              <div class="widget-title widget-collapse">
                <h6>Advanced filter</h6>
                <a class="ms-auto" data-bs-toggle="collapse" href="#filter-property" role="button" aria-expanded="false"
                  aria-controls="filter-property"> <i class="fas fa-chevron-down"></i> </a>
              </div>
              <div class="collapse show" id="filter-property">
                <form class="mt-3">
                  <div class="mb-2 select-border">
                    <select class="form-control basic-select">
                      <option>All Type</option>
                      <option>Villa</option>
                      <option>Apartment Building</option>
                      <option>Commercial</option>
                      <option>Office</option>
                      <option>Residential</option>
                      <option>Shop</option>
                      <option>Apartment</option>
                    </select>
                  </div>
                  <div class="mb-2 select-border">
                    <select class="form-control basic-select">
                      <option>For Rent</option>
                      <option>For Sale</option>
                    </select>
                  </div>
                  <div class="mb-2 select-border">
                    <select class="form-control basic-select">
                      <option>Distance from location</option>
                      <option>Within 1 mile</option>
                      <option>Within 3 miles</option>
                      <option>Within 5 miles</option>
                      <option>Within 10 miles</option>
                      <option>Within 15 miles</option>
                      <option>Within 30 miles</option>
                    </select>
                  </div>
                  <div class="mb-2 select-border">
                    <select class="form-control basic-select">
                      <option>Bedrooms</option>
                      <option>01</option>
                      <option>02</option>
                      <option>03</option>
                    </select>
                  </div>
                  <div class="mb-2 select-border">
                    <select class="form-control basic-select">
                      <option>Sort by</option>
                      <option>Most popular</option>
                      <option>Highest price</option>
                      <option>Lowest price</option>
                      <option>Most reduced</option>
                    </select>
                  </div>
                  <div class="mb-2 select-border">
                    <select class="form-control basic-select">
                      <option>Select Floor</option>
                      <option>01</option>
                      <option>02</option>
                      <option>03</option>
                    </select>
                  </div>
                  <div class="mb-2">
                    <input class="form-control" placeholder="Type (sq ft)">
                  </div>
                  <div class="mb-2">
                    <input class="form-control" placeholder="Type (sq ft)">
                  </div>
                  <div class="mb-3 property-price-slider mt-3">
                    <label class="form-label">Select Price Range</label>
                    <input type="text" id="property-price-slider" name="example_name" value="" />
                  </div>
                  <div class="d-grid mb-2">
                    <button class="btn btn-primary align-items-center" type="submit"><i
                        class="fas fa-filter me-1"></i><span>Filter</span></button>
                  </div>
                </form>
              </div>
            </div>
            <div class="widget">
              <div class="widget-title widget-collapse">
                <h6>Status of property</h6>
                <a class="ms-auto" data-bs-toggle="collapse" href="#status-property" role="button" aria-expanded="false"
                  aria-controls="status-property"> <i class="fas fa-chevron-down"></i> </a>
              </div>
              <div class="collapse show" id="status-property">
                <ul class="list-unstyled mb-0 pt-3">
                  <li><a href="#">For rent<span class="ms-auto">(500)</span></a></li>
                  <li><a href="#">For Sale<span class="ms-auto">(1200)</span></a></li>
                </ul>
              </div>
            </div>
            <div class="widget">
              <div class="widget-title widget-collapse">
                <h6>Type of property</h6>
                <a class="ms-auto" data-bs-toggle="collapse" href="#type-property" role="button" aria-expanded="false"
                  aria-controls="type-property"> <i class="fas fa-chevron-down"></i> </a>
              </div>
              <div class="collapse show" id="type-property">
                <ul class="list-unstyled mb-0 pt-3">
                  <li><a href="#">Residential<span class="ms-auto">(12)</span></a></li>
                  <li><a href="#">Commercial<span class="ms-auto">(45)</span></a></li>
                  <li><a href="#">Industrial<span class="ms-auto">(23)</span></a></li>
                  <li><a href="#">Apartment<span class="ms-auto">(05)</span></a></li>
                  <li><a href="#">Building code<span class="ms-auto">(10)</span></a></li>
                  <li><a href="#">Communal land<span class="ms-auto">(47)</span></a></li>
                  <li><a href="#">Insurability<span class="ms-auto">(32)</span></a></li>
                </ul>
              </div>
            </div>
            <div class="widget">
              <div class="widget-title">
                <h6>Mortgage calculator</h6>
              </div>
              <form>
                <div class="mb-2">
                  <div class="input-group input-group-box">
                    <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                    <input type="text" class="form-control" placeholder="Total Amount">
                  </div>
                </div>
                <div class="mb-2">
                  <div class="input-group input-group-box">
                    <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Down Payment">
                  </div>
                </div>
                <div class="mb-2">
                  <div class="input-group input-group-box">
                    <span class="input-group-text"><i class="fas fa-percent"></i></span>
                    <input type="text" class="form-control" placeholder="Interest Rate">
                  </div>
                </div>
                <div class="mb-2">
                  <div class="input-group input-group-box">
                    <span class="input-group-text"><i class="far fa-clock"></i></span>
                    <input type="text" class="form-control" placeholder="Loan Term (Years)">
                  </div>
                </div>
                <div class="mb-3 select-border">
                  <select class="form-control basic-select">
                    <option>Monthly</option>
                    <option>Weekly</option>
                    <option>Yearly</option>
                  </select>
                </div>
                <a class="btn btn-primary d-grid" href="#">Calculate</a>
              </form>
            </div>
          </div>
        </div> -->
        <div class="col-lg-12">
          <div class="property-filter d-sm-flex">
            <ul class="property-short list-unstyled d-sm-flex mb-0">
              <li>
                <form class="form-inline">
                  <div class="form-group d-lg-flex d-block mb-sm-0 mb-3">
                    <label class="justify-content-start mb-2 mb-sm-0">Short by:</label>
                    <div class="short-by">
                      <select class="form-control basic-select">
                        <option>Date new to old</option>
                        <option>Price Low to High</option>
                        <option>Price High to Low</option>
                        <option>Date Old to New</option>
                        <option>Date New to Old</option>
                      </select>
                    </div>
                  </div>
                </form>
              </li>
            </ul>
            <ul class="property-view-list list-unstyled d-flex mb-0">
              <li>
                <form class="form-inline">
                  <div class="form-group d-lg-flex d-block mb-3 mb-sm-0">
                    <label class="justify-content-start pe-2 mb-2 mb-sm-0">Sort by: </label>
                    <div class="short-by">
                      <select class="form-control basic-select">
                        <option>12</option>
                        <option>18 </option>
                        <option>24 </option>
                        <option>64 </option>
                        <option>128</option>
                      </select>
                    </div>
                  </div>
                </form>
              </li>
              <li><a href="#"><i class="fas fa-map-marker-alt fa-lg"></i></a></li>
              <li><a class="property-list-icon active" href="#">
                  <span></span>
                  <span></span>
                  <span></span>
                </a></li>
              <li><a class="property-grid-icon" href="#">
                  <span></span>
                  <span></span>
                  <span></span>
                </a></li>
            </ul>
          </div>
          @foreach($project as $pro)
          <div class="property-item property-col-list mt-4">
            <div class="row g-0">
              <div class="col-lg-4 col-md-5">
                <div class="property-image bg-overlay-gradient-04">
                  <img class="img-fluid" src="{{end($pro['images'])['image_path']}}" alt="">
                  <div class="property-lable">
                    <span class="badge badge-md bg-primary">{{$pro['type']}}</span>
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
                    <a href="#"><i class="fas fa-camera"></i>{{count($pro['images'])}}</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-8 col-md-7">
                <div class="property-details">
                  <div class="property-details-inner">
                    <div class="property-details-inner-box">
                      <div class="property-details-inner-box-left">
                        <h5 class="property-title"><a href="/project-details?id={{$pro['id']}}">{{$pro['project_name']}}</a></h5>
                        <span class="property-address"><i class="fas fa-map-marker-alt fa-xs"></i>{{$pro['location']}}</span>
                        <span class="property-agent-date"><i class="far fa-clock fa-md"></i>{{$pro['days']}} days ago</span>
                      </div>
                      <div class="property-price">{{$pro['price']}}<span class="d-block"></span> </div>
                    </div>
                    <ul class="property-info list-unstyled d-flex">
                      <li class="flex-fill property-bed"><i class="fas fa-bed"></i>{{$pro['configurations']}}</li>
                      <!-- <li class="flex-fill property-bath"><i class="fas fa-bath"></i>Bath<span>2</span></li>
                      <li class="flex-fill property-m-sqft"><i class="far fa-square"></i>sqft<span>145m</span></li> -->
                    </ul>
                    <p class="mb-0 mt-3">{!!substr($pro['about_project'],0,150)!!}</p>
                  </div>
                  <div class="property-btn">
                    <a class="property-link" href="/project-details?id={{$pro['id']}}">See Details</a>
                    <!-- <ul class="property-listing-actions list-unstyled mb-0">
                      <li class="property-compare"><a data-bs-toggle="tooltip" data-bs-placement="top" title="Compare"
                          href="#"><i class="fas fa-exchange-alt"></i></a></li>
                      <li class="property-favourites"><a data-bs-toggle="tooltip" data-bs-placement="top"
                          title="Favourite" href="#"><i class="far fa-heart"></i></a></li>
                    </ul> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
          {!!$project->links('pagination::bootstrap-4')!!}
          <!-- <div class="row">
            <div class="col-12">
              <ul class="pagination mt-3">
                <li class="page-item disabled me-auto">
                  <span class="page-link b-radius-none">Prev</span>
                </li>
                <li class="page-item active" aria-current="page"><span class="page-link">1 </span> <span
                    class="sr-only">(current)</span></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item ms-auto">
                  <a class="page-link b-radius-none" href="#">Next</a>
                </li>
              </ul>
            </div>
          </div> -->
        </div>
      </div>
    </div>
  </section>
  <!--=================================
Listing – grid view -->

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