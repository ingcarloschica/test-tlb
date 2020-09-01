@extends('layouts.app')


@section('content')


            <div class="card card-outline card-info">
                <div class="card-header">
                    <h4>View Contact</h4>
                </div>

                <div class="card-body">
                   
                    {{--  @include('custom.message')  --}}

                    
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        
                        <div class="container">

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="firstname">First Name</label>
                                    <input type="text" class="form-control" 
                                      name="firstname" 
                                      id="firstname"
                                      value="{{ $contact->firstname }}"
                                      disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" class="form-control" 
                                      name="lastname" 
                                      id="lastname"
                                      value="{{ $contact->lastname }}"
                                      disabled>
                                </div>
                              </div>

                              <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                <input type="email" class="form-control" 
                                  name="email" 
                                  id="email"
                                  value="{{ $contact->email }}"
                                  disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="contactnumber">Contact Number</label>
                                <input type="text" class="form-control" 
                                  name="contactnumber" 
                                  id="contactnumber"
                                  value="{{ $contact->contactnumber }}"
                                  disabled>
                                </div>
                              </div>

                              
                              
                              <hr>
                              
                               <a class="btn btn-primary" href="{{route('contact.edit',$contact->id)}}"><i class="fas fa-arrow-circle-left"> </i> Edit</a>
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