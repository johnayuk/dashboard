
@extends('layouts.master')


@section('title')
{{ Auth::user()->name }}
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
                  <h4> <a href="##"  data-toggle="modal" data-target="#addDoctor">
                    {{-- <i class="now-ui-icons"></i> --}}
                    <p style="color:#007bff">Add A Doctor</p>
                  </a></h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    
                    <table id="myTable" class="table">
                      <thead class=" text-primary">
                        <th>FirstName</th>
                        <th>LastName</th>
                        <th>Email</th>
                        <th>Department</th>
                        <th>Specialization</th>
                        <th>View Profile</th>
                        <th>Image</th>
                        <th>Edit</th>
                        <th>Delete</th>

                      </thead>

                      <tbody>
                        @foreach ($doctors as $doctor)
                         <tr>
                         {{-- <td><a class="btn " href="{{url('/workersMail/'.$doctor->id)}}> </td> --}}
                         
                         <td>{{ $doctor->user->firstName}}</td>
                         <td>{{ $doctor->user->lastName}}</td>
                         <td>{{ $doctor->user->email}}</td>
                         <td>{{ $doctor->department->name}}</td>
                         <td>{{ $doctor->specialization}}</td>
                       <td><img src="{{asset('uploads/image/'.$doctor->user->image)}}" alt="" width="60px"; height="60px" style="border-radius: 60px"></td>
                       <td><div class="modal fade" id="exampleModal{{$doctor->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                            <form  enctype="multipart/form-data" files=true action="{{url('/updateDoctor/'.$doctor->id)}}" method="post">
                                                @csrf
                                                @method('PUT')
        
                                                <h3>Edit User : {{$doctor->id}}</h3>
                                                <div class="row">
                                                  <div class="col-md-5 pr-1">
                                                    <div class="form-group">
                                                      <label>Age</label>
                                                    <input type="text" class="form-control" name="age"  value="{{$doctor->age}}">
                                                    </div>
                                                  </div>
                                                  <div class="col-md-3 px-1">
                                                    <div class="form-group">
                                                      <label>Salary</label>
                                                    <input type="text" class="form-control" name="salary" value="{{$doctor->salary}}">
                                                    </div>
                                                  </div>

                                                  <div class="col-md-3">
                                                    <div class="form-group">
                                                      <label>Specialization</label>
                                                    <input type="text" class="form-control" name="specialization" value="{{$doctor->specialization}}">
                                                    </div>
                                                  </div>
                                                </div>

                                                <div class="row">
                                                  <div class="col-md-8">
                                                    <div class="form-group">
                                                      <label>Address</label>
                                                    <input type="text" class="form-control" name="address" value="{{$doctor->address}}">
                                                    </div>
                                                  </div>

                                                  <div class="col-md-4">
                                                    <div class="form-group">
                                                      <label>DateEmployed</label>
                                                    <input type="text" class="form-control" name="dateEmployed" value="{{$doctor->dateEmployed}}">
                                                    </div>
                                                  </div>
                                                </div>
   
                                                <div class="row">
                                                  <div class="col-md-4 pr-1">
                                                    <div class="form-group">
                                                      <label>City</label>
                                                    <input type="text" class="form-control"  name="city"  value="{{$doctor->city}}">
                                                    </div>
                                                  </div>
                                                  <div class="col-md-4 px-1">
                                                    <div class="form-group">
                                                      <label>Country</label>
                                                      <input type="text" class="form-control"  name="country" value="{{$doctor->country}}">
                                                    </div>
                                                  </div>
                                                  <div class="col-md-4 pl-1">
                                                    <div class="form-group">
                                                      <label>Postal Code</label>
                                                    <input type="number" class="form-control" name="postal_code" value="{{$doctor->postal_code}}">
                                                    </div>
                                                  </div>
                                                </div>

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
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                              </div>
                                            </form>
                                          </div>
                                          </div>
                                          </div>
                                          <button type="button" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#exampleModal{{$doctor->id}}">Edit</button></td>

                                        <td>
                                          <div class="modal fade" id="staticBackdrop{{$doctor->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                          <div class="modal-dialog">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <div class="modal-body">
                                                <form id="delete_modal" action="{{url('/deleteDoctor/'.$doctor->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                <h3>Are you sure want to delete ?</h3>
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                      <button type="submit" class="btn btn-danger">Delete</button>
                                                    </div>
                                              </form>
                                            </div>
                                          </div>
                                        </div>
                                      <button type='button' class="btn btn-danger btn-sm" data-toggle="modal" data-target="#staticBackdrop{{$doctor->id}}">Delete</button>
                                    </td>

                               <td>
                                  <!-- Button trigger modal -->
                               <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter{{$doctor->id}}">
                                      profile
                                    </button>

                                    <!-- Modal -->
                                  <div class="modal fade" id="exampleModalCenter{{$doctor->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="content">
                                          <div class="row">
                                            <div class="col-md-12">
                                              <div class="card">
                                                {{-- <div class="card-header">
                                                  <h5 class="title">Edit Profile</h5>
                                                </div> --}}
                                                <div class="card-body">
                                                  <div class="author ">
                                                    <a  href="#">
                                                      <img src="{{asset('uploads/image/'.$doctor->user->image)}}" class="mx-auto d-block" alt="" width="60px"; height="60px" style="border-radius: 60px">
                                                    <h5 class="" style="margin-left: 30%">{{$doctor->user->firstName}} {{$doctor->user->lastName}}</h5>
                                                    </a>
                                                    <p class="description">
                                                      michael24
                                                    </p>
                                                  </div>
                                                  <form>
                                                    <div class="row">
                                                      <div class="col-md-5 pr-1">
                                                        <div class="form-group">
                                                          <label>Company</label>
                                                        <input type="text" class="form-control"  disabled placeholder="Company" value="{{$doctor->age}}">
                                                        </div>
                                                      </div>
                                                      <div class="col-md-3 px-1">
                                                        <div class="form-group">
                                                          <label>Salary</label>
                                                        <input type="text" class="form-control" disabled value="{{$doctor->salary}}">
                                                        </div>
                                                      </div>
                                                      <div class="col-md-4 pl-1">
                                                        <div class="form-group">
                                                          <label for="exampleInputEmail1">Email address</label>
                                                          <input type="email" class="form-control" disabled value="{{$doctor->user->email}}">
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="row">
                                                      <div class="col-md-6 pr-1">
                                                        <div class="form-group">
                                                          <label>First Name</label>
                                                        <input type="text" class="form-control" disabled  value="{{$doctor->user->firstName}}">
                                                        </div>
                                                      </div>
                                                      <div class="col-md-6 pl-1">
                                                        <div class="form-group">
                                                          <label>Last Name</label>
                                                        <input type="text" class="form-control" disabled value="{{$doctor->user->lastName}}">
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="row">
                                                      <div class="col-md-12">
                                                        <div class="form-group">
                                                          <label>Address</label>
                                                        <input type="text" class="form-control" disabled value="{{$doctor->address}}">
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="row">
                                                      <div class="col-md-4 pr-1">
                                                        <div class="form-group">
                                                          <label>City</label>
                                                        <input type="text" class="form-control" disabled placeholder="city"  value="{{$doctor->city}}">
                                                        </div>
                                                      </div>
                                                      <div class="col-md-4 px-1">
                                                        <div class="form-group">
                                                          <label>Country</label>
                                                          <input type="text" class="form-control" disabled placeholder="Country" value="{{$doctor->country}}">
                                                        </div>
                                                      </div>
                                                      <div class="col-md-4 pl-1">
                                                        <div class="form-group">
                                                          <label>Postal Code</label>
                                                          <input type="number" class="form-control" disabled placeholder="Postal code" value="{{$doctor->postal_code}}">
                                                        </div>
                                                      </div>
                                                    </div>
                                                   
                                                  </form>
                                                </div>
                                              </div>
                                            </div>
                                      </div>
                                    </div>
                               </td>

                               <td><!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#mail{{$doctor->id}}">
                                  send Mail
                                </button>
                                
                                <!-- Modal -->
                                <div class="modal fade" id="mail{{$doctor->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Emailing</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <form action="{{url('/workersMail/'.$doctor->id)}}" method="POST">
                                          @csrf

                                        <p>Mail to Doctor {{$doctor->user->lastName}}</p>
                                          
                                        <div class="form-group">
                                          <label for="exampleFormControlTextarea1">Type Email</label>
                                          <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3"></textarea>
                                        </div>
                                          <button type="submit" class="btn btn-primary">Send</button>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div></td>
                         </tr>
                         @endforeach
                      </tbody>

                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
         

          
          
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

                          <div class="input-group mb-3">  
                            <label class="input-group-text" for="doctor_id">select doctor if user</label>
                             <select class="custom-select" id="user_id" name="user_id">
                               @foreach ($users as $user)
                               <option value="{{ $user->id }}"> {{$user->firstName}} {{$user->lastName}}  ({{$user->role}}) </option>
                               @endforeach 
                             </select>
                           </div>

                           <div class="input-group mb-3">  
                            <label class="input-group-text" for="doctor_id">Department</label>
                             <select class="custom-select" id="department_id" name="department_id">
                               @foreach ($departments as $department)
                               <option value="{{ $department->id}}"> {{$department->name}} </option>
                               @endforeach 
                             </select>
                           </div>
                      
                        <div class="form-group">
                          <label for="patient_ward">dateEmployed</label>
                          <input  type="text" name="dateEmployed" class="form-control"  required>
                        </div>

                        
                        <div class="form-group">
                          <label for="patient_ward">Salary</label>
                          <input  type="text" name="salary" class="form-control"  required>
                        </div>

                        <div class="form-group">
                          <label for="patient_ward">Age</label>
                          <input  type="text" name="age" class="form-control"  required>
                        </div>

                        <div class="form-group">
                          <label for="patient_ward">Address</label>
                          <input  type="text" name="address" class="form-control"  required>
                        </div>

                        <div class="form-group">
                          <label for="patient_ward">Coutry</label>
                          <input  type="text" name="country" class="form-control"  required>
                        </div>

                        <div class="form-group">
                          <label for="patient_ward">City</label>
                          <input  type="text" name="city" class="form-control"  required>
                        </div>

                        <div class="form-group">
                          <label for="patient_ward">Postal Code</label>
                          <input  type="text" name="postal_code" class="form-control"  required>
                        </div>

                        <div class="form-group">
                          <label for="_specialization">Specialization</label>
                          <select class="form-control" id="Select" name="specialization" required>
                              <option value="surgry" selected>Surgry</option>
                              <option value="dentist">Dentist</option>
                              <option value="optician">Optician</option>
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

  <script>
     

  </script>

@endsection
