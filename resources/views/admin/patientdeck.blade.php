@extends('layouts.master')


@section('title')
Patient Profiles
@endsection


@section('content')

 <div class="container">
    @if ($errors->any())
      <div class="alert alert-primary alert-dismissible fade show" role="alert">
          @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
          @endforeach
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
    @endif
  </div>


<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4> <a href="##"  data-toggle="modal" data-target="#addpatientmodal">
                  {{-- <i class="now-ui-icons"></i> --}}
                  <p style="color:#007bff">Add patient record</p>
                </a></h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>Name</th>
                      <th>LastName</th>
                      <th>Conditon</th>
                      <th>Doctor Assigned</th>
                      <th>Ward</th>
                      <th>phone</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    <thead class=" text-primary">
                     
                    </thead>
                    <tbody>
                        @foreach ($patients as $patient)
                       <tr>
                
                       <td>{{$patient->name}}</td>
                       <td>{{$patient->last_name}}</td>
                       <td>{{$patient->condition}}</td>
                       <td>{{$patient->doctor->first_name}}</td>
                       <td>{{$patient->ward}}</td>
                       <td>{{$patient->phone}}</td> 
                    <td>
                      {{-- <a href="#" class="btn btn-success">Edit</a> --}}

                <div class="modal fade" id="exampleModal{{$patient->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                                    <form  action="{{url('/update_patient/'.$patient->id)}}" method="post">
                                        @csrf
                                        @method('PUT')

                                        <h3>Edit User : {{$patient->id}}</h3>
                                        <div class="form-group">
                                          <label for="name">Name</label>
                                        <input type="text" name="name" id="name" value="{{$patient->name}}" class="form-control">
                                        </div>

                                        <div class="form-group">
                                          <label for="name">LastName</label>
                                        <input type="text" name="last_name" id="last_name" value="{{$patient->last_name}}" class="form-control">
                                        </div>

                                        <div class="form-group">
                                        <label for="role">Condition</label>
                                        <input type="text" name="condition" id="condition" value="{{$patient->condition}}" class="form-control">
                                        </div>

                                         <div class="form-group">
                                        <label for="role">DoctorAssigned</label>
                                        <input type="text" name="doctor_assigned" id="doctor_assigned" value="{{$patient->doctor_assigned}}" class="form-control">
                                        </div>

                                         <div class="form-group">
                                        <label for="role">Ward</label>
                                        <input type="text" name="ward" id="ward" value="{{$patient->ward}}" class="form-control">
                                        </div>

                                         <div class="form-group">
                                        <label for="role">Phone</label>
                                        <input type="text" name="phone" id="phone" value="{{$patient->phone}}" class="form-control">
                                        </div>
                                        
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                      </div>
                                    </form>
                            </div>
                                </div>
                                  </div>
                                  <button type="button" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#exampleModal{{$patient->id}}">Edit</button>
                            </td>

                          <td>
                       {{-- <form action="" method="get">
                           <button type="submit" class="btn btn-danger">Delete</button>
                        </form> --}}

                         <div class="modal fade" id="staticBackdrop{{$patient->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="staticBackdropLabel">Delete {{$patient->name}}</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form id="delete_modal" action="{{url('/delete_patient/'.$patient->id)}}" method="post">
                                      @csrf
                                      @method('DELETE')
                              <h3>Are you sure want to delete Patient {{$patient->name}} Records ?</h3>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                  </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    <button type='button' class="btn btn-danger btn-sm" data-toggle="modal" data-target="#staticBackdrop{{$patient->id}}">Delete</button>
                     </td>
                
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
          <h5 class="modal-title" id="addpatientmodalLabel">Add New Patient</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
                  <form method="POST" action="{{ url('/create_patient') }}">
                          @csrf
                          @method('PUT')
                        <div class="form-group">
                          <label for="_name">Patient Name</label>
                          <input for="name" type="text" name="name" class="form-control"  required>
                        </div>

                        <div class="form-group">
                          <label for="last_name">Last Name</label>
                          <input for="last_name" type="text" name="last_name" class="form-control"  required>
                        </div>

                        <div class="form-group">
                          <label for="patient_condition">Patient Condition</label>
                          <input id="patient_condition" type="text" name="condition" class="form-control"  required>
                        </div>

                        <div class="form-group">
                          <label for="patient_ward">Patient Ward</label>
                          <input id="patient_ward" type="text" name="ward" class="form-control"  required>
                        </div>

                        {{-- <div class="form-group">
                          <label for="doctor_id">Doctor Assigned</label>
                          <input id="doctor_id" type="text" name="doctor_id"  class="form-control"  required>
                        </div> --}}

                        {{-- <div class="form-group">
                          <label for="doctor_id">Doctor Assigned</label>
                          <select name="doctor_id" id="doctor_id" class="form-control">
                            @foreach ($doctors as $doctor)
                          <option value="{{ $doctor->id }}"> {{$doctor->name}} </option>
                            @endforeach                             
                          </select>
                      </div> --}}

                      <div class="input-group mb-3">
                        
                          <label class="input-group-text" for="doctor_id">Doctor Assigned</label>
                       
                        <select class="custom-select" id="doctor_id" name="doctor_id">
                          @foreach ($doctors as $doctor)
                          <option value="{{ $doctor->id}}"> {{$doctor->first_name}} </option>
                          @endforeach 
                        </select>
                      </div>




                        <div class="form-group">
                          <label for="phone">Phone</label>
                          <input for="phone" type="text" name="phone" class="form-control"  required>
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



{{-- <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="..." alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div> --}}