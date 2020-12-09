@extends('layouts.master')


@section('title')
Registered Roles
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
                  <p style="color:#007bff">Add Users</p>
                </a></h4>
                @if (session('status'))
                  <div class="alert alert-success" role="alert">
                      {{ session('status') }}
                  </div>
                @endif
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>Name</th>
                      <th>phone</th>
                      <th>Image</th>
                      <th>email</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    <thead class=" text-primary">
                     
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                       <tr>
                
                       <td>{{$user->name}}</td>
                       <td>{{$user->phone}}</td>
                       <td><img src="{{asset('uploads/image/'.$user->image)}}" alt="" width="60px"; height="60px" style="border-radius: 60px"></td>
                       <td>{{$user->email}}</td>
                    <td>
                    

                    <div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                                    <form  enctype="multipart/form-data" files=true  action="{{url('/update-users/'.$user->id)}}" method="post">
                                        @csrf
                                        @method('PUT')

                                        <h3>Edit User : {{$user->name}}</h3>
                                        <div class="form-group">
                                          <label for="name">Name</label>
                                        <input type="text" name="name" id="name" value="{{$user->name}}" class="form-control">
                                        </div>

                                        <div class="form-group">
                                          <label for="email">Email</label>
                                        <input type="email" name="email" id="email" value="{{$user->email}}" class="form-control">
                                        </div>

                                        <div class="form-group">
                                        <label for="role">phone</label>
                                        <input type="text" name="phone" id="role" value="{{$user->phone}}" class="form-control">
                                        </div>


                                        <div class="form-group">
                                          <label for="role">Role</label>
                                          <input type="text" name="role" id="role" value="{{$user->role}}" class="form-control">
                                          </div>

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
                                </div>
                                  </div>
                                  <button type="button" class="btn btn-success"  data-toggle="modal" data-target="#exampleModal{{$user->id}}">Edit</button>

                    </td>
                    <td>
                      <div class="modal fade" id="staticBackdrop{{$user->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form id="delete_modal" action="{{url('/delete_user/'.$user->id)}}" method="post">
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
                    <button type='button' class="btn btn-danger" data-toggle="modal" data-target="#staticBackdrop{{$user->id}}">Delete</button>

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
                <h5 class="modal-title" id="addpatientmodalLabel">Add Record</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                        <form method="POST" enctype="multipart/form-data" files=true action="{{ url('/createUser') }}">
                                @csrf
                                @method('PUT')
                              <div class="form-group">
                                <label for="_name">Name</label>
                                <input for="name" type="text" name="name" class="form-control"  required>
                              </div>
      
                              <div class="form-group">
                                <label for="last_name">Phone</label>
                                <input for="last_name" type="text" name="phone" class="form-control"  required>
                              </div>
      

                              <div class="form-group">
                                <label for="phone">Email</label>
                                <input for="phone" type="text" name="email" class="form-control"  required>
                              </div>

                                <div class="form-group">
                                <label for="phone">Password</label>
                                <input for="password" type="text" name="password" class="form-control"  required>
                              </div>

                              <div class="form-group">
                                <label for="role">Role</label>
                                <input type="text" name="role"  class="form-control">
                                </div>

                                <div class="form-group">
                                  <label class="contol-label">choose file</label>
                                  <input type="file" name="image" class="form-control" id="image">
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



