
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

   

<div class="card text-center">
  <div class="card-header">
    Featured
  </div>
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    @foreach($about as $about)
    <p> {{$about->statement}}</p>


    <div class="modal fade" id="exampleModal{{ $about->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                    <form  action="{{url('/updateAbout/'.$about->id)}}" method="post">
                                        @csrf
                                        @method('PUT')

                                        <h3>Edit User : {{ $about->id}}</h3>

                                    <textarea name="statement" value="$about->statement" id="" cols="30" rows="10">
                                    
                                    </textarea>

                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                            </div>
                            </div>
                            </div>
                            <button type="button" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#exampleModal{{ $about->id}}">Edit</button>



  @endforeach


  </div>
  
  <div class="card-footer text-muted">
  </div>
</div>




@endsection


@section('script')

@endsection
