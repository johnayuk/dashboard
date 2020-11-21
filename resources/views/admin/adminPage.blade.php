@extends('layouts.master')


@section('title')
Admin
@endsection


@section('content')

{{-- 
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Simple Table</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>Name</th>
                      <th>country</th>
                      <th>city</th>
                    <thead class=" text-primary">
                     
                    </thead>
                    <tbody>
                       <tr>

                    <td>nig</td>
                    <td>aks</td>
                    <td>wer</td>
                    <td>dd</td>

                       </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div> --}}

        

        <div class="card bg-light col-md-6 col-lg-3" >
          <div class="card-body">
            <h5 class="card-title"> Users <i class="fa fa-users fa-2x text-info" aria-hidden="true"></i></h5>
          <h6 class="card-subtitle mb-2 ">This App has {{$users->count()-1}} user(s)</h6>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>

        <div class="card bg-light col-md-6 col-lg-3" >
          <div class="card-body">
            <h5 class="card-title">Doctor(s) <i class="fa fa-user-md fa-2x text-info" aria-hidden="true" ></i> </h5>
            <h6 class="card-subtitle mb-2 ">Number of Doctor(s)  {{$doctors->count()}}</h6>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>

        <div class="card bg-light col-md-6 col-lg-3" >
          <div class="card-body">
            <h5 class="card-title"> Patient(s) <i class="fa fa-users fa-2x text-success" aria-hidden="true"></i></h5>
            {{-- <h5 class="card-title">Total number of Patient <i class="fa fa-users fa-2x text-info" aria-hidden="true"></i> </h5> --}}
            <h6 class="card-subtitle mb-2 ">Number of Patient(s)  {{$patients->count()}}</h6>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>

        <div class="card bg-light col-md-6 col-lg-3" >
          <div class="card-body">
            <h5 class="card-title">Appointment(s)<i class="fas fa-calendar-alt fa-2x text-warning" aria-hidden="true"></i></h5>
            <h6 class="card-subtitle mb-2 ">Number of Appointments(s)  {{$appointments->count()}}</h6>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>

        <div class="card bg-light col-md-6 col-lg-3" >
          <div class="card-body">
            <h5 class="card-title">Department(s) <i class="fa fa-building fa-2x" aria-hidden="true"></i></h5>
            <h6 class="card-subtitle mb-2 ">Number of Departments(s)  {{$departments->count()}}</h6>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>

        <div class="card bg-light col-md-6 col-lg-3" >
          <div class="card-body">
            <h5 class="card-title">Nurse(s) <i class="fas fa-user-nurse fa-2x text-info"></i></h5>
            <h6 class="card-subtitle mb-2 ">Number of Nurse(s) {{$nurses->count()}}</h6>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
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



