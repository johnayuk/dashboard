<!--

=========================================================
* Now UI Dashboard - v1.5.0
=========================================================

* Product Page: https://www.creative-tim.com/product/now-ui-dashboard
* Copyright 2019 Creative Tim (http://www.creative-tim.com)

* Designed by www.invisionapp.com Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  {{-- <link rel="icon" type="image/png" href="../assets/img/favicon.png"> --}}
  <link rel="icon" href="uploads/medicine.png">

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
@yield('title')
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="blue">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        
        <a href="/adminPage"  class="simple-text logo-normal">
          welcome {{ Auth::user()->name }}
          <img src="{{asset('uploads/image/'.Auth::user()->image)}}"  width="30px"; height="30px" style="border-radius: 60px" alt="">
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          @if(Auth::check() && Auth::user()->role  == "admin")
          <li>
            <a href="/adminPage">
              <i class="fas fa-house-damage"></i>
              <i class=" design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>
          @endif


          @if(Auth::check() && Auth::user()->role == "admin")
          <li>

            <a href="/department">
            <i class="fa fa-building"></i>

              {{-- <i class="now-ui-icons design_app"></i> --}}
              <p>Departments </p>
            </a>
          </li>
          @endif


          @if(Auth::check() && Auth::user()->role  == "admin")
          <li>
            <a href="./user_patient">
              <i class="fas fa-file"></i>
              <i class="education_atom"></i>
              <p>Patients ProFiles</p>
            </a>
          </li>
            @endif

            
          {{-- @if(Auth::check() && Auth::user()->role  == "admin") --}}
          <li>
            <a href="./profile">
              <i class="fa fa-address-book" aria-hidden="true"></i>
              <p>View Profile</p>
            </a>
          </li>
            {{-- @endif --}}

            @if(Auth::check() && Auth::user()->role  == "admin")
            <li>
              <a href="./doctor">
                <i class="fa fa-user-md fa-2x " aria-hidden="true" ></i>
                <p>Doctors</p>
              </a>
            </li>
              @endif


              @if(Auth::check() && Auth::user()->role  == "admin")
            <li>
              <a href="./aboutUs">
                <i class="fa fa-user-md fa-2x " aria-hidden="true" ></i>
                <p>AboutUs</p>
              </a>
            </li>
              @endif
          
          <li>
            <a href="./view_bookings">
              <i class="fas fa-calendar-alt fa-2x " aria-hidden="true"></i>
              <p>view appointment</p>
            </a>
          </li>
          {{-- <li>
            <a href="./notifications.html">
              <i class="now-ui-icons ui-1_bell-53"></i>
              <p>Notifications</p>
            </a>
          </li> --}}

          @if(Auth::check() && Auth::user()->role  == "admin")
          <li>
            <a href="/registered">
              <i class="fa fa-users fa-2x " aria-hidden="true"></i>
              <p>Registered Users</p>
            </a>
          </li>
          @endif


          @if(Auth::check() && Auth::user()->role  == "admin")
          <li>
            <a href="/nurse">
              <i class="fas fa-user-nurse fa-3x"></i>
              <p>Nurses</p>
            </a>
          </li>
          @endif
        </ul>
      </div>
    </div>

    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">Table List</a>
          </div>
          <button class="navbar-toggler" type="button"  data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="now-ui-icons media-2_sound-wave"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
              </div>
            </li>
              {{-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="now-ui-icons location_world"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li> --}}
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->

      
      <div class="panel-header panel-header-sm">
      </div>


      <div class="content">
          
      @yield('content')
        
      </div>

      {{-- <footer class="footer">
          <div class=" container-fluid ">
          <nav>
            <ul>
              <li>
                <a href="https://www.creative-tim.com">
                  Creative Tim
                </a>
              </li>
              <li>
                <a href="http://presentation.creative-tim.com">
                  About Us
                </a>
              </li>
              <li>
                <a href="http://blog.creative-tim.com">
                  Blog
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright" id="copyright">
            &copy; <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Designed by <a href="https://www.invisionapp.com" target="_blank">Invision</a>. Coded by <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
          </div>
        </div>
      </footer> --}}
    </div>
  </div>
  

  @yield('script')
</body>

</html>