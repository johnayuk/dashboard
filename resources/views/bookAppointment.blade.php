
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
                  <h4> <a href="##"  data-toggle="modal" data-target="#addpatientmodal">
                    {{-- <i class="now-ui-icons"></i> --}}
                    <p style="color:#007bff">Book Appointment</p>
                  </a></h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    
                    <table id="myTable" class="table">
                      <thead class=" text-primary">
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Time</th>
                        <th>Service</th>
                        <th>Who booked</th>
                        <th>Doctor booked</th>
                      </thead>

                      <tbody>
                        @foreach ($appointments as $appointment)
                         <tr>
                         <td><input type="checkbox" name="phone[]" id="" class="checkbox" value="{{ $appointment->phone}}"></td>
                         <td>{{ $appointment->name}}</td>
                         <td>{{ $appointment->email}}</td>
                         <td>{{ $appointment->phone}}</td>
                         <td>{{ $appointment->time}}</td>
                         <td>{{ $appointment->service}}</td>
                         <td>{{ $appointment->user->name}}</td>
                         <td>{{ $appointment->doctor->user->name}}</td>
                         <td><div class="modal fade" id="exampleModal{{ $appointment->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                              <form  action="{{url('/updateAppointment/'.$appointment->id)}}" method="post">
                                                  @csrf
                                                  @method('PUT')
          
                                                  <h3>Edit User : {{ $appointment->id}}</h3>
                                                  <div class="form-group">
                                                    <label for="_name">Name</label>
                                                    <input for="name" type="text" name="name"  value="{{ $appointment->name}}" class="form-control"  required>
                                                  </div>
                          
                                                 
                          
                                                  <div class="form-group">
                                                    <label for="patient_condition">Email</label>
                                                    <input id="patient_condition" type="text" value="{{ $appointment->email}}" name="email" class="form-control"  required>
                                                  </div>
                          
                                                  <div class="form-group col-md-6">
                                                    <label for="_Service">Service</label>
                                                    <select class="form-control" id="Select" name="service">
                                                        <option value="pharmcy" selected>Pharmacy</option>
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
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                  <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                              </form>
                                            </div>
                                            </div>
                                            </div>
                                            <button type="button" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#exampleModal{{ $appointment->id}}">Edit</button></td>
                 

                        <td>
                              <div class="modal fade" id="staticBackdrop{{$appointment->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Delete {{$appointment->name}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <form id="delete_modal" action="{{url('/deleteAppointment/'.$appointment->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                    <h3>Are you sure want to delete {{$appointment->name}} Records ?</h3>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                          <button type="submit" class="btn btn-danger">Delete</button>
                                        </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          <button type='button' class="btn btn-danger btn-sm" data-toggle="modal" data-target="#staticBackdrop{{$appointment->id}}">Delete</button>
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
                        <label for="_Phone">Phone</label>
                        <input type="text" name="phone" class="form-control" id="inputPassword4">
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

                      <div class="input-group mb-3">  
                        <label class="input-group-text" for="doctor_id">select doctor</label>
                         <select class="custom-select" id="doctor_id" name="doctor_id">
                           @foreach ($doctors as $doctor)
                           <option value="{{ $doctor->id}}"> {{$doctor->user->name}} </option>
                           @endforeach 
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
<script>
      $(document).ready( function () {
          $('#myTable').DataTable();
      } );

  </script>

@endsection
