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
                  @if (Auth::check() && Auth::user()->role == 'admin')
                  <p style="color:#007bff">Add patient record</p>
                  @endif
                </a></h4>
              </div>
              <div class="card-body">
                <div id="myTable" class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>Name</th>
                      <th>LastName</th>                                       
                      <th>Doctor Assigned</th>  
                        
                      @if (Auth::check() && Auth::user()->role == 'admin')
                      <th>Edit</th>
                      <th>Delete</th>
                      @endif 

                      <th>View Patient Profile</th>
                      <th>Print PDF</th>  

                    <thead class=" text-primary">
                     
                    </thead>
                    <tbody>
                        @foreach ($patients as $patient)
                       <tr>
                      <td>{{$patient->name}}</td>
                      <td>{{$patient->last_name}}</td>
                      <td> Doctor {{$patient->doctor->user->name}}</td> 
                                                           
                       @if (Auth::check() && Auth::user()->role == 'admin')
                      <td>
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

                                                  <div class="input-group mb-3">
                                  
                                                    <label class="input-group-text" for="doctor_id">Doctor Assigned</label>
                                                
                                                  <select class="custom-select" id="doctor_id" name="doctor_id">
                                                    @foreach ($doctors as $doctor)
                                                    <option value="{{ $doctor->id}}"> {{$doctor->first_name}} </option>
                                                    @endforeach 
                                                  </select>
                                                </div>

                                                  <div class="form-group">
                                                  <label for="role">Ward</label>
                                                  <input type="text" name="ward"  value="{{$patient->ward}}" class="form-control">
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
                      @endif

                      @if (Auth::check() && Auth::user()->role == 'admin')
                      <td>
                       
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
                      @endif
                      
                      <td>    
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter{{$patient->id}}">
                                    View Patient Profile
                                    </button>
                                    
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter{{$patient->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered" role="document">
                            

                                        <div class="content">
                                          <div class="row">
                                            <div class="col-md-12">
                                              <div class="card">
                                                <div class="card-header">
                                                  <h5 class="title">Edit Profile</h5>
                                                </div>
                                                <div class="card-body">
                                                  <form>
                                                    <div class="row">
                                                      <div class="col-md-5 pr-1">
                                                        <div class="form-group">
                                                          <label>Company (disabled)</label>
                                                          <input type="text" class="form-control" disabled="" placeholder="Company" value="Creative Code Inc.">
                                                        </div>
                                                      </div>
                                                      <div class="col-md-3 px-1">
                                                        <div class="form-group">
                                                          <label>Username</label>
                                                          <input type="text" class="form-control" placeholder="Username" value="michael23">
                                                        </div>
                                                      </div>
                                                      
                                                      <div class="col-md-3 px-1">
                                                        <div class="form-group">
                                                          <label>Previous_med_record</label>
                                                          <input type="text" class="form-control"  value={{$patient->previous_med_record}}>
                                                        </div>
                                                      </div>
                                                    </div>


                                                    <div class="row">
                                                      <div class="col-md-3pr-1">
                                                        <div class="form-group">
                                                          <label>First Name</label>
                                                          <input type="text" class="form-control" placeholder="Company" value="{{$patient->name}}">
                                                        </div>
                                                      </div>


                                                      <div class="col-md-6 pl-1">
                                                        <div class="form-group">
                                                          <label>Last Name</label>
                                                          <input type="text" class="form-control" placeholder="Last Name" value="{{$patient->last_name}}">
                                                        </div>
                                                      </div>

                                                      <div class="col-md-4 pl-1">
                                                        <div class="form-group">
                                                          <label>Doctor Incharge</label>
                                                          <input type="text" class="form-control" placeholder="Last Name" value="{{$patient->doctor->user->name}}">
                                                        </div>
                                                      </div>
                                                    </div>


                                                    <div class="row">
                                                      <div class="col-md-4">
                                                        <div class="form-group">
                                                          <label>Address</label>
                                                          <input type="text" class="form-control"  value="{{$patient->address}}">
                                                        </div>
                                                      </div>

                                                      <div class="col-md-4">
                                                        <div class="form-group">
                                                          <label>OverAll Physical Exams</label>
                                                          <input type="text" class="form-control"  value="{{$patient->overall_physical_status}}">
                                                        </div>
                                                      </div>

                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label>X-ray</label>
                                                          <input type="text" class="form-control"  value="  {{$patient->x_ray}}">
                                                        </div>
                                                      </div>
                                                      
                                                    </div>


                                                    <div class="row">
                                                      <div class="col-md-4 pr-1">
                                                        <div class="form-group">
                                                          <label>Phone</label>
                                                          <input type="text" class="form-control" value="{{$patient->phone}}">
                                                        </div>
                                                      </div>
                                                      <div class="col-md-4 px-1">
                                                        <div class="form-group">
                                                          <label>Ward</label>
                                                          <input type="text" class="form-control" placeholder="Country" value="{{$patient->ward}}">
                                                        </div>
                                                      </div>
                                                      <div class="col-md-4 pl-1">
                                                        <div class="form-group">
                                                          <label>Next of Kin</label>
                                                          <input type="text" class="form-control" value="{{$patient->next_of_kin}}">
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="row">
                                                      <div class="col-md-12">
                                                        <div class="form-group">
                                                          <label>Patient Report</label>
                                                        <textarea rows="4" cols="80" class="form-control" placeholder="Here can be your description" value="{{$patient->condition}}">{{$patient->condition}}</textarea>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </form>
                                                </div>
                                              </div>
                                            </div>
                                            
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                      </td>



                      <td><a class="btn " href="{{url('/patientpdf/'.$patient->id)}}">Print Pdf</a></td>

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
                          <label for="address">Address</label>
                          <input for="address" type="text" name="address" class="form-control"  required>
                        </div>

                        <div class="form-group">
                          <label for="x_ray">x_ray</label>
                          <input for="x_ray" type="text" name="x_ray" class="form-control"  required>
                        </div>

                        <div class="form-group">
                          <label for="next_of_kin">Next of Kin</label>
                          <input for="next_of_kin" type="text" name="next_of_kin" class="form-control"  required>
                        </div>

                        <div class="form-group">
                          <label for="overall_physical_status">Overall Physical Status</label>
                          <input for="loverall_physical_status" type="text" name="overall_physical_status" class="form-control"  required>
                        </div>



                        <div class="form-group">
                          <label for="previous_med_record">Previous Med Record</label>
                          <input for="previous_med_record" type="text" name="previous_med_record" class="form-control"  required>
                        </div>

                        <div class="form-group">
                          <label for="family_med_record">family_med_record</label>
                          <input for="family_med_record" type="text" name="family_med_record" class="form-control"  required>
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
                        <label class="input-group-text" for="doctor_id">select doctor</label>
                         <select class="custom-select" id="doctor_id" name="doctor_id">
                           @foreach ($doctors as $doctor)
                           <option value="{{ $doctor->id}}"> {{$doctor->user->name}} </option>
                           @endforeach 
                         </select>
                       </div>

                      <div class="form-group">
                          <label for="phone">Phone</label>
                          <input for="phone" type="text" value="+234  " name="phone" class="form-control"  required>
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
<script>
      $(document).ready( function () {
          $('#myTable').DataTable();
      } );

  </script>
@endsection



{{-- <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="..." alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div> --}}