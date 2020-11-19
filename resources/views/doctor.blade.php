
@extends('layouts.master')


@section('title')
{{ Auth::user()->name }}
@endsection


@section('content')

        <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4> <a href="##"  data-toggle="modal" data-target="#addDoctor">
                    {{-- <i class="now-ui-icons"></i> --}}
                    <p style="color:#007bff">Add A Doctor</p>
                  </a></h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    
                    <table class="table">
                      <thead class=" text-primary">
                        <th>FirstName</th>
                        <th>LastName</th>
                        <th>Email</th>
                        <th>Department</th>
                        <th>Specialization</th>
                        <th>Image</th>

                      </thead>

                      <tbody>
                        @foreach ($doctors as $doctor)
                         <tr>
                         <td>{{ $doctor->first_name}}</td>
                         <td>{{ $doctor->last_name}}</td>
                         <td>{{ $doctor->email}}</td>
                         <td>{{ $doctor->department->name}}</td>
                         <td>{{ $doctor->specialization}}</td>
                       <td><img src="{{asset('uploads/image/'.$doctor->image)}}" alt="" width="60px"; height="60px" style="border-radius: 60px"></td>

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

          
          
  <div class="modal fade" id="addDoctor" tabindex="-1" aria-labelledby="addDoctor" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addDoctor">Add Doctor</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
                  <form method="POST"  enctype="multipart/form-data" files=true action="{{ url('/createDoctor') }}">
                          @csrf
                          @method('PUT')
                        <div class="form-group">
                          <label for="_name">FirstName</label>
                          <input for="name" type="text" name="first_name" class="form-control"  required>
                        </div>

                        <div class="form-group">
                          <label for="last_name">LastName</label>
                          <input for="last_name" type="text" name="last_name" class="form-control"  required>
                        </div>

                        <div class="form-group">
                          <label for="patient_condition">Email</label>
                          <input id="patient_condition" type="text" name="email" class="form-control"  required>
                        </div>

                        <div class="form-group">
                          <label for="patient_ward">Specialization</label>
                          <input  type="text" name="specialization" class="form-control"  required>
                        </div>

                       
                        <div class="file-group mt-2" >
                            <label for="file-upload" class="custom-file-upload">choose file</label>
                            <input id="file-upload" type="file" name="image"  id="image"/>
                        </div>

                    {{-- <label for="file-upload" class="custom-file-upload">
                      Custom Upload
                  </label>
                  <input id="file-upload" type="file"/> --}}

                   

                    <div class="input-group mb-3">  
                   <label class="input-group-text" for="doctor_id">Department</label>
                    <select class="custom-select" id="department_id" name="department_id">
                      @foreach ($departments as $department)
                      <option value="{{ $department->id}}"> {{$department->name}} </option>
                      @endforeach 
                    </select>
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
