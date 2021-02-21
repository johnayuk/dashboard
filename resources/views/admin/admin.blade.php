
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
                    <p style="color:#007bff">Add Admin</p>
                  </a></h4>
            </div>

            <div class="card-body">

                <div class="table-responsive">
                    
                    <table id="myTable" class="table">
                    <thead class=" text-primary">
                        <th>FirstName</th>
                        <th>LastName</th>
                        <th>Email</th>
                        {{-- <th>Department</th>
                        <th>Specialization</th> --}}
                        <th>Image</th>
                        <th>Edit</th>
                        <th>Delete</th>

                    </thead>

                    <tbody>
                        @foreach ($admins as $admin)
                        <tr>
                            <td>{{$admin->user->firstName}}</td>
                            <td>{{$admin->user->lastName}}</td>
                            <td>{{$admin->user->email}}</td>
                            <td><img src="{{asset('uploads/image/admin/'.$admin->image)}}" alt="" width="60px"; height="60px" style="border-radius: 60px"></td>
                            <td>
                                <div class="modal fade" id="editAdmin{{$admin->id}}" tabindex="-1" role="dialog" aria-labelledby="editAdmin" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          


                                            <form  enctype="multipart/form-data" files=true action="{{url('/updateAdmin/'.$admin->id)}}" method="post">
                                                @csrf
                                                @method('PUT')
        
                                                <h3>Edit User : {{$admin->id}}</h3>
                                               
                        
                                              
                        
                                               
                                                <div class="file-group mt-2" >
                                                    <label for="file-upload" class="custom-file-upload">choose file</label>
                                                    <input id="file-upload" type="file" name="image"  id="image"/>
                                                </div>
                        

                                         
                                                
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                              </div>
                                            </form>

                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editAdmin{{$admin->id}}">
                                Edit Admin
                              </button>
                            </td>

                            <td>                                      <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#delete{{$admin->id}}">
                                    Delete
                                </button>
                                
                                <!-- Modal -->
                            <div class="modal fade" id="delete{{$admin->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="delete_modal" action="{{url('/deleteAdmin/'.$admin->id)}}" method="post">
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
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>


                </div>
            </div>
        </div>
    </div>            
</div>            

      {{-- model for creating admins --}}
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
                  <form method="POST"  enctype="multipart/form-data" files=true action="{{ url('/createAdmin') }}">
                          @csrf
                          @method('PUT')
                      
                        

                  <div class="input-group mb-3">  
                    <label class="input-group-text" for="doctor_id">select doctor if user</label>
                     <select class="custom-select" id="user_id" name="user_id">
                       @foreach ($users as $user)
                       <option value="{{ $user->id }}"> {{$user->firstName}} {{$user->lastName}} ({{$user->role}}) </option>
                       @endforeach 
                     </select>
                   </div>

                  <div class="file-group mt-2" >
                    <label for="file-upload" class="custom-file-upload">choose file</label>
                    <input id="file-upload" type="file" name="image"  id="image"/>
                  </div>

                      </div>
                      <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                  </form>
            </div>
         </div>
        </div>
  
  

        <!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
  </button> --}}
  
  <!-- Modal for editing admins-->
{{-- <div class="modal fade" id="editAdmin{{$admin->id}}" tabindex="-1" role="dialog" aria-labelledby="editAdmin" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{$admin->user->firstName}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div> --}}
 

@endsection


@section('script')

  <script>
     

  </script>

@endsection
