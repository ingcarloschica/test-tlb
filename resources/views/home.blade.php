@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-secondary mb-3">
                <div class="card-header">Contact List</div>
                <div class="card-body text-secondary">
                   <a href="{{ route('contact.create') }}"><span class="btn btn-success">Create</span></a>
                </div>


                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h4>Lista de Categorías</h4>
                    </div>
    
                    <div class="card-body">
                        <a class="btn btn-outline-primary float-right" href="{{ route('contact.create') }}">Create</a>
                    </br> 
                  </br> 
                       <hr>
                        
                      {{--   @include('custom.message')  --}}
    
                            <table id="ListTable" class="table table-striped table-bordered table-hover table-responsive-sm" data-page-length='10' style="width:100%">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th data-class-name="priority">First Name</th>
                                  <th>Last Name</th>
                                  <th>Email</th>
                                  <th>Contact Number</th>
                                  <th class="text-center"></th>
                                  <th class="text-center"></th>
                                  <th class="text-center"></th>
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
                                    <a class="btn btn-primary btn-sm" href="{{ route('contact.show', $contact->id) }}">View</a>
                                  </td>
                                  <td class="text-center">
                                    <a class="btn btn-success btn-sm" href="{{ route('contact.edit', $contact->id) }}">Edit</a>
                                  </td>
                                  <td class="text-center">
                                    
                                      <a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#modal-elim"
                                      onclick="data({{ $contact->id }}, '{{ $contact->firstname }}')">Del</a>
                                  
                                 
                                  </td>
                                  
                                </tr>
           
                                @endforeach
                              </tbody>
                            </table>
    
                    </div>
                </div>
    
    
        <!-- Modal --!>
          <!-- Modal -->
    <div class="modal fade" id="modal-elim" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-blue">
            <h5 class="modal-title font-weight-bold" id="staticBackdropLabel">Delete</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h5 class="font-weight-bold">Are your sure to delete this contact?</h5>
            <span class="font-weight-bold">Contact:</span> <span id="contact"> </span>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal"><i class="fas fa-times-circle"></i> Cancelar</button>
            
            
            <form action="#" method="POST" id="formdestroy">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Eliminar</button>
            </form>
            
          </div>
        </div>
      </div>
    </div>


              </div>
        </div>
    </div>
</div>
@endsection
