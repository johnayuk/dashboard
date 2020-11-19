
@extends('layouts.master')


@section('title')
{{ Auth::user()->name }}
@endsection


@section('content')

        <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4> <a href="##"  data-toggle="modal" data-target="#addDepartment">
                    {{-- <i class="now-ui-icons"></i> --}}
                    <p style="color:#007bff">Add A Department</p>
                  </a></h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    
                    <table class="table">
                      <thead class=" text-primary">
                        <th>Name</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                      </thead>

                      <tbody>
                        @foreach ($departments as $department)
                         <tr>
                         <td>{{ $department->name}}</td>
                         <td>{{ $department->created_at}}</td>
                         <td>{{ $department->updated_at}}</td>
                         </tr>
                         @endforeach
                      </tbody>

                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          {{-- @foreach($hostel->hostelDetails->attachments()->limit(3)->get() as $photos) --}}
          {{-- @foreach($hostel->hostelDetails->attachments->take(3) as $photos) --}}

          
          
  <div class="modal fade" id="addDepartment" tabindex="-1" aria-labelledby="addDepartment" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addDepartment">Add Department</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
                  <form method="POST"  action="{{ url('/createDepartment') }}">
                          @csrf
                          @method('PUT')
                        <div class="form-group">
                          <label for="_name">Name</label>
                          <input for="name" type="text" name="name" class="form-control"  required>
                        </div>

                      </div>
                      <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
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
