
@extends('layouts.master')


@section('title')
{{ Auth::user()->name }}
@endsection


@section('content')

        <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4> <a href="##"  data-toggle="modal" data-target="#addpatientmodal">
                    {{-- <i class="now-ui-icons"></i> --}}
                    <p style="color:#007bff">Book Appointment</p>
                  </a></h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    
                    <table class="table">
                      <thead class=" text-primary">
                        <th>Name</th>
                        <th>Email</th>
                        <th>Time</th>
                        <th>Service</th>
                        <th>Who booked</th>

                      </thead>

                      <tbody>
                        @foreach ($appointments as $appointment)
                         <tr>
                         <td>{{ $appointment->name}}</td>
                         <td>{{ $appointment->email}}</td>
                         <td>{{ $appointment->time}}</td>
                         <td>{{ $appointment->service}}</td>
                         <td>{{ $appointment->user->name}}</td>

                         </tr>
                         @endforeach
                      </tbody>

                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>


          
        <div class="modal fade" id="addpatientmodal" tabindex="-1" aria-labelledby="addpatientmodalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="addpatientmodalLabel">Add Record</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="POST" action="{{ url('/createAppointment') }}">
                  @csrf
                  @method('PUT')

                  <h2>Make an Appointment</h2>
                  <div class="form-row">
                      <div class="form-group col-md-6">
                          <label for="_name">Name</label>
                          <input type="name" name="name" class="form-control" id="inputEmail4">
                      </div>

                      <div class="form-group col-md-6">
                          <label for="_Email">Email</label>
                          <input type="email" name="email" class="form-control" id="inputPassword4">
                      </div>
                      <div class="form-group col-md-6">
                          <label for="_Service">Service</label>
                          <select class="form-control" id="Select" name="service">
                              <option value="1" selected>Select service</option>
                              <option value="Eye Care">Eye Care</option>
                              <option value="Maternity">Maternity</option>
                              <option value="Dental">Dental</option>
                              <option value="Family Planing">Family Planing</option>
                          </select>
                      </div>

                      

                      <div class="form-group time_icon col-md-6">
                          <label for="_Time">Time</label>
                          <select class="form-control" id="Select2" name="time">
                              <option value="" selected>Time</option>
                              <option value="8 AM TO 10AM">8 AM TO 10AM</option>
                              <option value="10 AM TO 12PM">10 AM TO 12PM</option>
                              <option value="10 AM TO 12PM">12PM TO 2PM</option>
                              <option value="2PM TO 4PM">2PM TO 4PM</option>
                              <option value="4PM TO 6PM">4PM TO 6PM</option>
                              <option value="6PM TO 8PM">6PM TO 8PM</option>
                              <option value="4PM TO 10PM">4PM TO 10PM</option>
                              <option value="10PM TO 12PM">10PM TO 12PM</option>
                          </select>
                      </div>
                  </div>
                  <button type="submit" data-color="blue" class="btn">Primary</button>
              </form>
                  </div>
               </div>
              </div>

@endsection


@section('script')
<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
@endsection
