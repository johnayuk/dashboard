{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }} hy</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.master')


@section('title')
{{ Auth::user()->name }}
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

                       <td>{{Auth::user()->name}}</td>
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


        {{-- <div class="card">
          <div class="card-body">
            <div class="card" style="width: 18rem;">
              <img src="..." class="card-img-top" alt="...">
              <div class="card-body">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">{{Auth::user()->name}}</li>
                  <li class="list-group-item">{{Auth::user()->email}}</li>
                  <li class="list-group-item">{{Auth::user()->phone}}</li>
                </ul>
              </div>
            </div>
          </div>
        </div> --}}

        <div class="card bg-light col-md-3" >
          <div class="card-body">
            <div class="text-center">
            <img src="{{asset('uploads/image/'.Auth::user()->image)}}"  width="80px"; height="80px" style="border-radius: 60px" alt="">
            </div>
            <h5 class="card-title">{{Auth::user()->name}}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{Auth::user()->email}}</h6>
            <p class="card-text">
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam, nisi earum! 
              Minima quod est reiciendis in beatae magni ex incidunt 
              necessitatibus aperiam quas odio, nisi iste omnis, porro, vel saepe.
            </p>
          </div>
        </div>

         <div class="card bg-light col-md-4" >
          <div class="card-body">
            <h5 class="card-title">More About you</h5>
            <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
            <form>
              <div class="form-group row">
                <label  class="col-sm-2 col-form-label">Full Name</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{Auth::user()->name}}">
                </div>
              </div>
              <div class="form-group row">
                <label  class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input  readonly class="form-control-plaintext border border-0"  value="{{Auth::user()->email}}">
                </div>
              </div>

              <div class="form-group row">
                <label  class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-10">
                  <input  readonly class="form-control-plaintext border border-0"  value="{{Auth::user()->phone}}">
                </div>
              </div>

              <div class="form-group row">
                <label  class="col-sm-2 col-form-label">Age</label>
                <div class="col-sm-10">
                  <input  readonly class="form-control-plaintext border border-0"  value="{{Auth::user()->phone}}">
                </div>
              </div>
            </form>
           
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




