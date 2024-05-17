@extends('layouts.base')


@section('content')



@include('admin.includes.ag-header')
    
    <div id="wrapper">
        @if(Session::get('role') == 'customer' || Session::get('role') == 'Customer' || Session::get('role') == 'Registered' || Session::get('role') == 'registered' )
          @include('admin.includes.sidebar')
        @else
          @include('admin.includes.sidebar1')
        @endif
        <?php
        // @if(Session::get('role') != 'user' || Session::get('role') != 'User')
        //   @include('admin.includes.sidebar')
        // @else
        //   @include('admin.includes.sidebar1')
        // @endif
        ?>
      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{URL::to('/')}}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">Users</li>
            <li class="breadcrumb-item active">All Users</li>
          </ol>

          
          
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
                All Users</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                     <!--<th>Id</th>-->
                      <th>Name</th>
                      <th>Email</th>
                      {{-- <th>Role</th> --}}
                      
                        
                    </tr>
                  </thead>
                  
                  <tbody>
                      <?php $i = 1;?>
                     @foreach ($employees as $employee)
                        
                        
                            <tr @if($employee->status !=1) class="alert-danger"@endif>
                      
                              <td>{{ucwords($employee->name)}}@if($employee->status !=1) (request pending)@endif</td>
                              <td>{{$employee->email}}</td>
                              {{-- <td>{{$employee->role}}</td> --}}
                              {{-- <td><a href="{{URL::to('dashboard/edit-employee')}}/{{$employee->id}}">edit</a></td>
                              <td><a href="{{URL::to('dashboard/delete-employee')}}/{{$employee->id}}">delete</a></td> --}}
                              {{-- <td>@if($employee->status == true)
                                    <a href="{{URL::to('dashboard/disable-employee')}}/{{$employee->id}}" class="btn btn-success bg-success"><i class="fas fa-eye"></i></a>
                                  @else 
                                    <a href="{{URL::to('dashboard/enable-employee')}}/{{$employee->id}}" class="btn btn-danger bg-danger"><i class="fas fa-eye-slash"></i></a>
                                  @endif
                                </td> --}}
                            </tr>
                        
                     @endforeach

                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

        @include('admin.includes.footer')
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Are you Sure you .</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="{{ route('logout') }}" 
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </div>
        </div>
      </div>
    </div>

@endsection
