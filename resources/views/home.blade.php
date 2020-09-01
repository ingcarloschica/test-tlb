@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-12">
          <div class="card border-secondary mb-3">
            <div class="card-header"><h4>Contact List</h4></div>
            <div class="card-body text-secondary">
              <a href="{{ route('contact.create') }}"><span class="btn btn-success"><i class="fas fa-user-plus"></i> Add New</span></a>
              <hr>
                  
                @include('custom.message')

                      <table id="ListTable" class="table table-striped table-bordered table-hover table-responsive-sm" data-page-length='10' style="width:100%">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Contact Number</th>
                            <th class="text-center">View</th>
                            <th class="text-center">Edit</th>
                            <th class="text-center">Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($contacts as $contact)
                          <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $contact->firstname }}</td>
                            <td>{{ $contact->lastname }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->contactnumber }}</td>
                            <td class="text-center">
                              <a class="btn btn-primary btn-sm" href="{{ route('contact.show', $contact->id) }}"><i class="far fa-eye"></i></a>
                            </td>
                            <td class="text-center">
                              <a class="btn btn-success btn-sm" href="{{ route('contact.edit', $contact->id) }}"><i class="far fa-edit"></i></a>
                            </td>
                            <td class="text-center" href="#" data-toggle="modal" data-target="#modal-elim"
                            onclick="data({{ $contact->id }}, '{{ $contact->firstname }}','{{ $contact->lastname }}')">
                              
                                <a class="btn btn-danger btn-sm" href="#"><i class="far fa-trash-alt"></i></a>
                          
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


  {{--  Modal  --}}
  <div class="modal fade" id="modal-elim" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger text-light">
          <h4 class="modal-title font-weight-bold" id="staticBackdropLabel"><i class="fas fa-times-circle"></i> Caution</h4>
          <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <h5 class="font-weight-bold">Are you sure you want to delete this contact?</h5>
            <span class="font-weight-bold">Contact:</span> <span id="contact"> </span>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal"><i class="fas fa-times-circle"></i> Cancel</button>
            
            
            <form action="#" method="POST" id="formdestroy">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</button>
            </form>
            
        </div>
      </div>
    </div>
  </div>
  {{--  // Modal  --}}

@endsection

@section('addscript')

        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    
        <script>
            $(document).ready(function() {
                $('#ListTable').DataTable();
            } );
        </script>

        <script>
        data = function(id, firstname, lastname){
          $('#contact').text(firstname + ' ' + lastname);
          var route = '/contacts/' + id;
          $('#formdestroy').attr("action", route);
        
        };
      </script>
   

    

    
@endsection
