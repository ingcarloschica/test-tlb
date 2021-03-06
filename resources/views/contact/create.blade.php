@extends('layouts.app')


@section('content')


            <div class="card card-outline card-info">
                <div class="card-header">
                    <h4>New Contact</h4>
                </div>

                <div class="card-body">
                   
                  @include('custom.message')

                    
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        
                        <div class="container">

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="firstname">First Name</label>
                                    <input type="text" class="form-control" 
                                      name="firstname" 
                                      id="firstname" required
                                      value={{ old('firstname')}}>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" class="form-control" 
                                      name="lastname" 
                                      id="lastname" required
                                      value={{ old('lastname')}}>
                                </div>
                              </div>

                              <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                <input type="email" class="form-control" 
                                  name="email" 
                                  id="email" required
                                  value={{ old('email')}}>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="contactnumber">Contact Number</label>
                                <input type="text" class="form-control" 
                                  name="contactnumber" 
                                  id="contactnumber" required
                                  value={{ old('contactnumber')}}>
                                </div>
                              </div>

                              
                              
                              <hr>
                              <button class="btn btn-primary" type="submit" value="Save"><i class="fas fa-save"></i> Save</button>
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