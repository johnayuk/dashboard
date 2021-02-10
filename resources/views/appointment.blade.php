
@extends('layouts.welcomeapp')

@section('content')

<header class="main_menu home_menu bg-light">
  <div class="container">
      <div class="row align-items-center">
          <div class="col-lg-12">
              <nav class="navbar navbar-expand-lg navbar-light mt-4">
                <h3 class="text-primary">Welcome {{ Auth::user()->name }}</h3>
                <a class="navbar-brand" href="/"> <img class="rounded-circle" src="uploads/medicine.png" alt="logo" style="height: 60px" > </a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse"
                      data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                      aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                  </button>

                  <div class="collapse navbar-collapse main-menu-item justify-content-center"
                      id="navbarSupportedContent">


                      <ul class="navbar-nav ml-auto">
                        <!-- <li class="nav-item active">
                            <a class="nav-link" href="index.html">Home</a>
                        </li> -->
                        <li class="nav-item">
                          <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                          </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            {{-- <a class="nav-link" href="{{ url('login') }}"><h5 class="p-0 m-0 ml-5" style="Color:#0080ff; margin:0%;">Login or Register</h5></a> --}}
                        </li>
                      
                     
                  </div>
                  {{-- <a class="btn_2 d-none d-lg-block"  href="#">HOT LINE- 09856</a> --}}
              </nav>
          </div>
      </div>
  </div>
</header>

<section class="regervation_part section_padding">
  <div class="container">
      <div class="row align-items-center regervation_content">
          <div class="col-lg-7">
              <div class="regervation_part_iner">
                  <form>
                      <h2>Make an Appointment</h2>
                      <div class="form-row">
                          <div class="form-group col-md-6">
                              <input type="email" class="form-control" id="inputEmail4" placeholder="Name">
                          </div>
                          <div class="form-group col-md-6">
                              <input type="password" class="form-control" id="inputPassword4"
                                  placeholder="Email address">
                          </div>
                          <div class="form-group col-md-6">
                              <select class="form-control" id="Select">
                                  <option value="1" selected>Select service</option>
                                  <option value="2">Name of service</option>
                                  <option value="3">Name of service</option>
                                  <option value="4">Name of service</option>
                                  <option value="5">Name of service</option>
                              </select>
                          </div>
                          <div class="form-group time_icon col-md-6">
                              <select class="form-control" id="Select2">
                                  <option value="" selected>Time</option>
                                  <option value="1">8 AM TO 10AM</option>
                                  <option value="1">10 AM TO 12PM</option>
                                  <option value="1">12PM TO 2PM</option>
                                  <option value="1">2PM TO 4PM</option>
                                  <option value="1">4PM TO 6PM</option>
                                  <option value="1">6PM TO 8PM</option>
                                  <option value="1">4PM TO 10PM</option>
                                  <option value="1">10PM TO 12PM</option>
                              </select>
                          </div>
                          <div class="form-group col-md-12">
                              <textarea class="form-control" id="Textarea" rows="4"
                                  placeholder="Your Note "></textarea>
                          </div>
                      </div>
                      <div class="regerv_btn">
                          <a href="#" class="btn_2">Make an Appointment</a>
                      </div>
                  </form>
              </div>
          </div>
          <div class="col-lg-5 col-md-6">
              <div class="reservation_img">
                  <img src="img/reservation.png" alt="" class="reservation_img_iner">
              </div>
          </div>
      </div>
  </div>
</section>


<section class="regervation_part section_padding">
  <div class="container">
      <div class="row align-items-center regervation_content">
          <div class="col-lg-7">
              <div class="regervation_part_iner">
                  <form>
                      <h2>Make an Appointment</h2>
                      <div class="form-row">
                          <div class="form-group col-md-6">
                              <input type="email" class="form-control" id="inputEmail4" placeholder="Name">
                          </div>
                          <div class="form-group col-md-6">
                              <input type="password" class="form-control" id="inputPassword4"
                                  placeholder="Email address">
                          </div>
                          <div class="form-group col-md-6">
                              <select class="form-control" id="Select">
                                  <option value="1" selected>Select service</option>
                                  <option value="2">Name of service</option>
                                  <option value="3">Name of service</option>
                                  <option value="4">Name of service</option>
                                  <option value="5">Name of service</option>
                              </select>
                          </div>
                          <div class="form-group time_icon col-md-6">
                              <select class="form-control" id="Select2">
                                  <option value="" selected>Time</option>
                                  <option value="1">8 AM TO 10AM</option>
                                  <option value="1">10 AM TO 12PM</option>
                                  <option value="1">12PM TO 2PM</option>
                                  <option value="1">2PM TO 4PM</option>
                                  <option value="1">4PM TO 6PM</option>
                                  <option value="1">6PM TO 8PM</option>
                                  <option value="1">4PM TO 10PM</option>
                                  <option value="1">10PM TO 12PM</option>
                              </select>
                          </div>
                          <div class="form-group col-md-12">
                              <textarea class="form-control" id="Textarea" rows="4"
                                  placeholder="Your Note "></textarea>
                          </div>
                      </div>
                      <div class="regerv_btn">
                          <a href="#" class="btn_2">Make an Appointment</a>
                      </div>
                  </form>
              </div>
          </div>
          <div class="col-lg-5 col-md-6">
              <div class="reservation_img">
                  <img src="img/reservation.png" alt="" class="reservation_img_iner">
              </div>
          </div>
      </div>
  </div>
</section>

@endsection