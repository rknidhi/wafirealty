@include('front-layout.header')
  <!--=================================
Contact -->
  <section class="space-ptb">
    <div class="container">
      <div class="row">
      @include('event.layout.alert')
        <div class="col-12">
          <div class="section-title">
            <h2>Contact Us</h2>
          </div>
        </div>
      </div>
      <div class="row align-items-center">
        <div class="col-lg-5">
          <div class="contact-address bg-light p-4">
            <div class="d-flex mb-3">
              <div class="contact-address-icon">
                <i class="flaticon-map text-primary font-xlll"></i>
              </div>
              <div class="ms-3">
                <h6>Address</h6>
                <p>D-156, Sector-7, 3rd Floor, Noida (U.P).</p>
              </div>
            </div>
            <div class="d-flex mb-3">
              <div class="contact-address-icon">
                <i class="flaticon-email text-primary font-xlll"></i>
              </div>
              <div class="ms-3">
                <h6>Email</h6>
                <p>wafirealty@gmail.com</p>
              </div>
            </div>
            <div class="d-flex mb-3">
              <div class="contact-address-icon">
                <i class="flaticon-call text-primary font-xlll"></i>
              </div>
              <div class="ms-3">
                <h6>Phone Number</h6>
                <p>+91-958210227</p>
              </div>
            </div>

            <div class="social-icon-02">
              <div class="d-flex align-items-center">
                <h6 class="me-3">Social:</h6>
                <ul class="list-unstyled mb-0 list-inline">
                  <li><a href="https://www.facebook.com/wafirealty" target="_blank"><i class="fab fa-facebook-f"></i>
                    </a></li>

                  <li><a href="https://www.instagram.com/wafirealty/" target="_blank"><i class="fab fa-linkedin"></i>
                    </a></li>

                  <li><a href="#"> <i class="fab fa-twitter"></i> </a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-7 mt-4 mt-lg-0">
          <div class="contact-form">
            <h4 class="mb-4">Get In Touch</h4>
            <form method="post" action="/submitcontact">
              @csrf
              <div class="row">
                <div class="mb-3 col-md-6">
                  <input type="text" class="form-control" name="name" id="name" placeholder="Your name">
                </div>
                <div class="mb-3 col-md-6">
                  <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Your email">
                </div>
                <div class="mb-3 col-md-6">
                  <input type="text" class="form-control" name="phone" id="phone" placeholder="Your phone">
                </div>
                <div class="mb-3 col-md-6">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                </div>
                <div class="mb-3 col-md-12">
                  <textarea class="form-control" rows="4" name="msg" placeholder="Your message"></textarea>
                </div>

                <div class="col-md-12">
                  <button type="submit" class="btn btn-primary">Send message</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

    </div>
  </section>
  <!--=================================
Contact -->
@include('front-layout.footer')