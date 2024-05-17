
@extends('layouts.s_admin')
              
@section('sContent')
    

              <!-- Breadcrumbs-->
          <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                          <a href="{{URL::to('/')}}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">All users</li>
                      </ol>
            
                      
                      
                      <!-- DataTables Example -->
                      <div class="card mb-3">
                        <div class="card-header">
                            <i class="fas fa-table"></i>
                            All users
                        </div>
                            <div class="card-body">
                              <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                      <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>email</th>
                                            <th>Registered Date</th>
                                            <th>Role</th>
                                            <th>Action</th>
        
                                        </tr>
                                      </thead>
                                      <tbody>
                                          <?php $i=1;?>
                                          @foreach ($employeesAll as $employee)
                                          <tr>
                                             
                                             <td>{{ucwords($employee->name)}}</td>
                                             <td>{{$employee->email}}</td>
                                             <td>
                                                <?php
                                                     $created_at = $employee->created_at;
                                                     
                                                     $newDate = date("d-M-Y", strtotime($created_at));
                                                     echo "Start - ".$newDate;
                                                     if($employee->role == 'Registered'){
                                                         $date = strtotime("+30 days",strtotime($newDate));
                                                         echo "<br>End - ".date('d-M-Y', $date);
                                                     }
                                                ?>
                                             </td>
                                             <td>{{$employee->role}}</td>
                                             <td>
                                                <a class="btn bg-success" href="{{URL::to('dashboard/edit-employee')}}/{{$employee->id}}"><i class="fas fa-pencil-alt"></i></a>
                                                <a class="btn bg-danger" href="{{URL::to('dashboard/delete-employee')}}/{{$employee->id}}"><i class="fas fa-trash-alt"></i></a>
                                                @if($employee->status == true)
                                                  <a href="{{URL::to('dashboard/disable-employee')}}/{{$employee->id}}" class="btn btn-success bg-success"><i class="fas fa-user-alt"></i></a></td>
                                                @else 
                                                  <a href="{{URL::to('dashboard/enable-employee')}}/{{$employee->id}}" class="btn btn-danger bg-danger"><i class="fas fa-user-alt-slash"></i></a></td>
                                                @endif
                                           </tr>
                                          @endforeach
                                      </tbody>
                                    </table>
                              </div>
                            </div>
                      </div>
            
            
    
@endsection
        