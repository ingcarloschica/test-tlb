@extends('layouts.app')


@section('content')


            <div class="card card-outline card-info">
                <div class="card-header">
                    <h4>Edit Contact</h4>
                </div>

                <div class="card-body">
                   
                    @include('custom.message')

                    
                    <form action="{{ route('contact.update', $contact->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="container">

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="firstname">First Name</label>
                                    <input type="text" class="form-control" 
                                      name="firstname" 
                                      id="firstname"
                                      value="{{ old('firstname', $contact->firstname) }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" class="form-control" 
                                      name="lastname" 
                                      id="lastname"
                                      value="{{ old('lastname', $contact->lastname) }}">
                                </div>
                              </div>

                              <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" 
                                    name="email" 
                                    id="email"
                                    value="{{ old('email', $contact->email) }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="contactnumber">Contact Number</label>
                                    <input type="text" class="form-control" 
                                    name="contactnumber" 
                                    id="contactnumber"
                                    value="{{ old('contactnumber', $contact->contactnumber) }}">
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