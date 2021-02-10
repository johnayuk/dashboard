@extends('layouts.welcomeapp')

@section('content')



  <!--::header part start::-->
  <header class="main_menu">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-12">
          <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="index.html"> <img src="img/logo.png" alt="logo"> </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse main-menu-item justify-content-center" id="navbarSupportedContent">
              <ul class="navbar-nav align-items-center">
                <li class="nav-item active">
                  <a class="nav-link" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.html">about</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Doctor.html">Doctors</a>
                </li>

                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Pages
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="services.html">services</a>
                    <a class="dropdown-item" href="dep.html">depertments</a>
                    <a class="dropdown-item" href="elements.html">Elements</a>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_1" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    blog
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                    <a class="dropdown-item" href="blog.html">blog</a>
                    <a class="dropdown-item" href="single-blog.html">Single blog</a>
                  </div>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="contact.html">Contact</a>
                </li>
              </ul>
            </div>
            <a class="btn_2 d-none d-lg-block" href="#">HOT LINE- 09856</a>
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- Header part end-->

  <!-- breadcrumb start-->
  <section class="breadcrumb_part breadcrumb_bg">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="breadcrumb_iner">
            <div class="breadcrumb_iner_item">
              <h2>contact</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb start-->

  <!-- ================ contact section start ================= -->
  <section class="contact-section section_padding">
    <div class="container">
      <div class="d-none d-sm-block mb-5 pb-4">
        <div id="map" style="height: 480px;"></div>
        <script>
          function initMap() {
            var uluru = {
              lat: -25.363,
              lng: 131.044
            };
            var grayStyles = [{
                featureType: "all",
                stylers: [{
                    saturation: -90
                  },
                  {
                    lightness: 50
                  }
                ]
              },
              {
                elementType: 'labels.text.fill',
                stylers: [{
                  color: '#ccdee9'
                }]
              }
            ];
            var map = new google.maps.Map(document.getElementById('map'), {
              center: {
                lat: -31.197,
                lng: 150.744
              },
              zoom: 9,
              styles: grayStyles,
              scrollwheel: false
            });
          }
        </script>
        <script
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I&callback=initMap">
        </script>

      </div>


      <div class="row">
        <div class="col-12">
          <h2 class="contact-title">Get in Touch</h2>
        </div>
        <div class="col-lg-8">
          <form class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm"
            novalidate="novalidate">
            <div class="row">
              <div class="col-12">
                <div class="form-group">

                  <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9"
                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'"
                    placeholder='Enter Message'></textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="name" id="name" type="text" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Enter your name'" placeholder='Enter your name'>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="email" id="email" type="email" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Enter email address'" placeholder='Enter email address'>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Enter Subject'" placeholder='Enter Subject'>
                </div>
              </div>
            </div>
            <div class="form-group mt-3">
              <button type="submit" class="button button-contactForm btn_1">Send Message</button>
            </div>
          </form>
        </div>
        <div class="col-lg-4">
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-home"></i></span>
            <div class="media-body">
              <h3>Buttonwood, California.</h3>
              <p>Rosemead, CA 91770</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
            <div class="media-body">
              <h3>00 (440) 9865 562</h3>
              <p>Mon to Fri 9am to 6pm</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-email"></i></span>
            <div class="media-body">
              <h3>support@colorlib.com</h3>
              <p>Send us your query anytime!</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ================ contact section end ================= -->

  <!-- footer part start-->
  <footer class="footer-area">
    <div class="footer section_padding">
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-xl-2 col-md-4 col-sm-6 single-footer-widget">
            <a href="#" class="footer_logo"> <img src="img/logo.png" alt="#"> </a>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor </p>
            <div class="social_logo">
              <a href="#"><i class="ti-facebook"></i></a>
              <a href="#"> <i class="ti-twitter"></i> </a>
              <a href="#"><i class="ti-instagram"></i></a>
              <a href="#"><i class="ti-skype"></i></a>
            </div>
          </div>
          <div class="col-xl-2 col-sm-6 col-md-4 single-footer-widget">
            <h4>Quick Links</h4>
            <ul>
              <li><a href="#">About us</a></li>
              <li><a href="#">Department</a></li>
              <li><a href="#"> Online payment</a></li>
              <li><a href="#">Careers</a></li>
              <li><a href="#">Department</a></li>
            </ul>
          </div>
          <div class="col-xl-2 col-sm-6 col-md-4 single-footer-widget">
            <h4>Explore</h4>
            <ul>
              <li><a href="#">In the community</a></li>
              <li><a href="#">IU health foundation</a></li>
              <li><a href="#">Family support </a></li>
              <li><a href="#">Business solution</a></li>
              <li><a href="#">Community clinic</a></li>
            </ul>
          </div>
          <div class="col-xl-2 col-sm-6 col-md-6 single-footer-widget">
            <h4>Resources</h4>
            <ul>
              <li><a href="#">Lights were season</a></li>
              <li><a href="#"> Their is let wherein</a></li>
              <li><a href="#">which given over</a></li>
              <li><a href="#">Without given She</a></li>
              <li><a href="#">Isn two signs think</a></li>
            </ul>
          </div>
          <div class="col-xl-3 col-sm-6 col-md-6 single-footer-widget">
            <h4>Newsletter</h4>
            <p>Seed good winged wherein which night multiply
              midst does not fruitful</p>
            <div class="form-wrap" id="mc_embed_signup">
              <form target="_blank"
                action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                method="get" class="form-inline">
                <input class="form-control" name="EMAIL" placeholder="Your Email Address"
                  onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '" required=""
                  type="email">
                <button class="click-btn btn btn-default text-uppercase"> <i class="ti-angle-right"></i>
                </button>
                <div style="position: absolute; left: -5000px;">
                  <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                </div>

                <div class="info"></div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="copyright_part">
      <div class="container">
        <div class="row align-items-center">
          <p class="footer-text m-0 col-lg-8 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</p>
          <div class="col-lg-4 col-md-12 text-center text-lg-right footer-social">
            <a href="#"><i class="ti-facebook"></i></a>
            <a href="#"> <i class="ti-twitter"></i> </a>
            <a href="#"><i class="ti-instagram"></i></a>
            <a href="#"><i class="ti-skype"></i></a>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- footer part end-->

  <!-- jquery plugins here-->
  @endsection