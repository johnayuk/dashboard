
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
                    <p style="color:#007bff">Add A Nurse</p>
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
                        <th>Image</th>
                      </thead>

                      <tbody>
                        @foreach ($nurses as $nurse)
                         <tr>
                         <td>{{ $nurse->first_name}}</td>
                         <td>{{ $nurse->last_name}}</td>
                         <td>{{ $nurse->email}}</td>
                         <td>{{ $nurse->department->name}}</td>
                         {{-- <td><img src="{{asset('uploads/image/'.$doctor->image)}}" alt="" width="60px"; height="60px" style="border-radius: 60px"></td> --}}
                         <td><img src="{{asset('uploads/image/nurse/'.$nurse->image)}}" alt="" width="60px"; height="60px" style="border-radius: 60px"></td>

                         <td><div class="modal fade" id="exampleModal{{$nurse->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                              <form enctype="multipart/form-data" files=true  action="{{url('/updateNurse/'.$nurse->id)}}" method="post">
                                                  @csrf
                                                  @method('PUT')
          
                                                  <h3>Edit User : {{$nurse->id}}</h3>
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
                          
                                                 
                                                  <div class="file-group mt-2" >
                                                      <label for="file-upload" class="custom-file-upload">choose file</label>
                                                      <input id="file-upload" type="file" name="image"  id="image"/>
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
                                            <button type="button" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#exampleModal{{$nurse->id}}">Edit</button>
                                          </td>

                                        <td>
                                          <div class="modal fade" id="staticBackdrop{{$nurse->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                              <div class="modal-dialog">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                    <form id="delete_modal" action="{{url('/deleteNurse/'.$nurse->id)}}" method="post">
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
                                          <button type='button' class="btn btn-danger" data-toggle="modal" data-target="#staticBackdrop{{$nurse->id}}">Delete</button>
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
                  <form method="POST"  enctype="multipart/form-data" files=true action="{{ url('/createNurse') }}">
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
                          <button type="submit" class="btn btn-info">Submit</button>
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
