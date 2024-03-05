<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="utf-8">
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Wafireality</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="{{asset('front/images/favicon.png')}}" />

  <!-- Google Font -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Barlow+Semi+Condensed:300,500,600,700%7CRoboto:300,400,500,700">

  <!-- CSS Global Compulsory (Do not remove)-->
  <link rel="stylesheet" href="{{asset('front/css/font-awesome/all.min.css')}}" />
  <link rel="stylesheet" href="{{asset('front/css/flaticon/flaticon.css')}}" />
  <link rel="stylesheet" href="{{asset('front/css/bootstrap/bootstrap.min.css')}}" />

  <!-- Page CSS Implementing Plugins (Remove the plugin CSS here if site does not use that feature)-->
  <link rel="stylesheet" href="{{asset('front/css/select2/select2.css')}}" />
  <link rel="stylesheet" href="{{asset('front/css/range-slider/ion.rangeSlider.css')}}" />
  <link rel="stylesheet" href="{{asset('front/css/owl-carousel/owl.carousel.min.css')}}" />
  <link rel="stylesheet" href="{{asset('front/css/magnific-popup/magnific-popup.css')}}" />
  <link rel="stylesheet" href="{{asset('front/css/slick/slick-theme.css')}}" />
  <link rel="stylesheet" href="{{asset('front/css/datetimepicker/datetimepicker.min.css')}}" />

  <!-- Template Style -->
  <link rel="stylesheet" href="{{asset('front/css/style.css')}}" />

</head>

<body>

  <!--=================================
header -->
  <header class="header">
    <div class="topbar">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="d-block d-md-flex align-items-center text-center">
             <div class="me-3 d-inline-block">
                <a href="tel:+91 – 9582106227"><i class="fa fa-phone me-2 fa fa-flip-horizontal"></i>+91 – 9582106227
                </a>&nbsp;&nbsp;
                <a href="mailto:shyam@wmmsols.com"><i
                    class="fa fa-envelope me-2 fa fa-flip-horizontal"></i>shyam@wmmsols.com
                </a>
              </div>
              <div class="me-auto d-inline-block">

              </div>

              <div class="social d-inline-block">
                <ul class="list-unstyled">
                  <li><a href="https://www.facebook.com/wafirealty" target="_blank"> <i class="fab fa-facebook-f"></i> </a></li>
                 
                  <li><a href="https://www.instagram.com/wafirealty/" target="_blank"> <i class="fab fa-instagram"></i> </a></li>
                   <li><a href="#"> <i class="fab fa-twitter"></i> </a></li>
                </ul>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
    <nav class="navbar navbar-light bg-white navbar-static-top navbar-expand-lg header-sticky">
      <div class="container-fluid">
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target=".navbar-collapse"><i
            class="fas fa-align-left"></i></button>
        <a class="navbar-brand" href="https://www.wafirealty.com/">
          <img class="img-fluid" src="{{asset('front/images/wafireality.jpg')}}" alt="logo">
        </a>
        <div class="navbar-collapse collapse justify-content-end">
          <ul class="nav navbar-nav">
            <li class="nav-item dropdown active">
              <a class="nav-link" href="https://www.wafirealty.com/" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">Home</a>

            </li>
            <li class="dropdown nav-item">
              <a href="/about" class="nav-link" data-bs-toggle="dropdown">About us</a>

            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                Property
              </a>
              <!-- <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Property list</a></li>
                <li><a class="dropdown-item" href="#">Property list with map</a></li>
                <li><a class="dropdown-item" href="#">Property grid</a></li>
                <li><a class="dropdown-item" href="#">Property grid with map</a></li>
                <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Dropdown <i
                      class="fas fa-chevron-right fa-xs"></i></a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Submenu</a></li>
                    <li><a class="dropdown-item" href="#">Submenu</a></li>
                    <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Submenu 01 <i
                          class="fas fa-chevron-right fa-xs"></i></a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Subsubmenu 01</a></li>
                        <li><a class="dropdown-item" href="#">Subsubmenu 01</a></li>
                      </ul>
                    </li>
                    <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Submenu 02 <i
                          class="fas fa-chevron-right fa-xs"></i></a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Subsubmenu 02</a></li>
                        <li><a class="dropdown-item" href="#">Subsubmenu 02</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
              </ul> -->
            </li>



            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="/blog" >
                Blog
              </a>

            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="/contactus" data-bs-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                Contact Us
              </a>

            </li>
          </ul>
        </div>
        <!-- <div class="add-listing d-none d-sm-block">
          <a class="btn btn-primary btn-md" href="#"> <i class="fa fa-plus-circle"></i>Add listing
          </a>
        </div> -->
      </div>
    </nav>
  </header>
  <!--=================================
 header -->

  <!--=================================
 Modal login -->
  <div class="modal login fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header border-0">
          <h5 class="modal-title" id="loginModalLabel">Log in & Register</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <ul class="nav nav-tabs nav-tabs-02 justify-content-center" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="login-tab" data-bs-toggle="tab" href="#login" role="tab"
                aria-controls="login" aria-selected="false">Log in</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="register-tab" data-bs-toggle="tab" href="#register" role="tab"
                aria-controls="register" aria-selected="true">Register</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
              <form class="row my-4 align-items-center">
                <div class="mb-3 col-sm-12">
                  <input type="text" class="form-control" placeholder="Username">
                </div>
                <div class="mb-3 col-sm-12">
                  <input type="Password" class="form-control" placeholder="Password">
                </div>
                <div class="col-sm-6 d-grid">
                  <button type="submit" class="btn btn-primary">Sign up</button>
                </div>
                <div class="col-sm-6">
                  <ul class="list-unstyled d-flex mb-1 mt-sm-0 mt-3">
                    <li class="me-1"><a href="#"><b>Already Registered User? Click here to login</b></a></li>
                  </ul>
                </div>
              </form>
              <div class="login-social-media border ps-4 pe-4 pb-4 pt-0 rounded">
                <div class="mb-4 d-block text-center"><b class="bg-white ps-2 pe-2 mt-3 d-block">Login or Sign in
                    with</b></div>
                <form class="row">
                  <div class="col-sm-6">
                    <a class="btn facebook-bg social-bg-hover d-block mb-3" href="#"><span><i
                          class="fab fa-facebook-f"></i>Login with Facebook</span></a>
                  </div>
                  <div class="col-sm-6">
                    <a class="btn twitter-bg social-bg-hover d-block mb-3" href="#"><span><i
                          class="fab fa-twitter"></i>Login with Twitter</span></a>
                  </div>
                  <div class="col-sm-6">
                    <a class="btn google-bg social-bg-hover d-block mb-3 mb-sm-0" href="#"><span><i
                          class="fab fa-google"></i>Login with Google</span></a>
                  </div>
                  <div class="col-sm-6">
                    <a class="btn linkedin-bg social-bg-hover d-block" href="#"><span><i
                          class="fab fa-linkedin-in"></i>Login with Linkedin</span></a>
                  </div>
                </form>
              </div>
            </div>
            <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
              <form class="row mt-4 mb-5 align-items-center">
                <div class="mb-3 col-sm-12">
                  <input type="text" class="form-control" placeholder="Username">
                </div>
                <div class="mb-3 col-sm-12">
                  <input type="email" class="form-control" placeholder="Email Address">
                </div>
                <div class="mb-3 col-sm-12">
                  <input type="Password" class="form-control" placeholder="Password">
                </div>
                <div class="mb-3 col-sm-12">
                  <input type="Password" class="form-control" placeholder="Confirm Password">
                </div>
                <div class="col-sm-6 d-grid">
                  <button type="submit" class="btn btn-primary">Sign up</button>
                </div>
                <div class="col-sm-6">
                  <ul class="list-unstyled d-flex mb-1 mt-sm-0 mt-3">
                    <li class="me-1"><a href="#"><b>Already Registered User? Click here to login</b></a></li>
                  </ul>
                </div>
              </form>
              <div class="login-social-media border ps-4 pe-4 pb-4 pt-0 rounded">
                <div class="mb-4 d-block text-center"><b class="bg-white ps-2 pe-2 mt-3 d-block">Login or Sign in
                    with</b></div>
                <form class="row">
                  <div class="col-sm-6">
                    <a class="btn facebook-bg social-bg-hover d-block mb-3" href="#"><span><i
                          class="fab fa-facebook-f"></i>Login with Facebook</span></a>
                  </div>
                  <div class="col-sm-6">
                    <a class="btn twitter-bg social-bg-hover d-block mb-3" href="#"><span><i
                          class="fab fa-twitter"></i>Login with Twitter</span></a>
                  </div>
                  <div class="col-sm-6">
                    <a class="btn google-bg social-bg-hover d-block mb-3 mb-sm-0" href="#"><span><i
                          class="fab fa-google"></i>Login with Google</span></a>
                  </div>
                  <div class="col-sm-6">
                    <a class="btn linkedin-bg social-bg-hover d-block" href="#"><span><i
                          class="fab fa-linkedin-in"></i>Login with Linkedin</span></a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--=================================
  Modal login -->
