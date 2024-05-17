
@extends('layouts.s_admin')
              
@section('sContent')
    

              <!-- Breadcrumbs-->
          <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                          <a href="{{URL::to('/')}}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">All companies</li>
                      </ol>
            
                      
                      
                      <!-- DataTables Example -->
                      <div class="card mb-3">
                        <div class="card-header">
                          <i class="fas fa-table"></i>
                        All companies</div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>email</th>
                                    <th>type</th>
                                    <th>Edit</th>
                                    <th>Remove</th>
                                    
                                </tr>
                              </thead>
                              
                              <tbody>
                                
                               @foreach ($employeesAll as $item)
                                    <tr>
                                      
                                      <td>{{$item->id}}</td>
                                      <td>{{$item->name}}</td>
                                      <td>{{$item->email}}</td>
                                      <td>@if($item->type == 'm')
                                          {{'Manager'}}
                                          @else
                                          {{'Employee'}}
                                          @endif
                                      </td>
                                      <td><a href="{{URL::to('dashboard/s/edit-employee')}}/{{$item->id}}">edit</a></td>
                                      <td><a href="{{URL::to('dashboard/s/delete-employee')}}/{{$item->id}}">remove</a></td>
                                    </tr>
                                   
                               @endforeach
                                
                                
                                
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
            
            
    
@endsection
        