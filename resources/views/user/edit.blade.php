@extends('layouts.app')


@section('content')


            <div class="card card-outline card-info">
                <div class="card-header">
                    <h4>Edit Contact</h4>
                </div>

                <div class="card-body">
                   
                    @include('custom.message')
                    
                    <form action="{{ route('user.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="container">

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" 
                                      name="name" 
                                      id="name" required
                                      value="{{ old('name', $user->name) }}">
                                </div>
                              
                              </div>

                              <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" 
                                    name="email" 
                                    id="email" required
                                    value="{{ old('email', $user->email) }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" 
                                    name="password" 
                                    id="password" required
                                    value="{{ old('password')}}">
                                </div>
                              </div>

                              
                              
                              <hr>
                              
                              <button class="btn btn-primary" type="submit" value="save"><i class="fas fa-save"> </i> Save</button>
                              | <a class="btn btn-success" href="{{route('home')}}"><i class="fas fa-arrow-circle-left"> </i> Back</a>

                        </div>

                    </form>
                </div>
            </div>


@endsection

@section('AddScript')

$(document).ready(function() {
    
        //Initialize Select2 Elements
        $('.select2').select2()
    
});

@endsection
@section('addscript')
  <script src="{{ asset('js/select2.full.min.js') }}"></script>
@endsection