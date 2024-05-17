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
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Edit User</li>
          </ol>

          
          
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
            Edit </div>
            <div class="card-body">
                <div class="table-responsive">
                        <form action="{{URL::to('dashboard/edit-employee')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                
                                                <input type="hidden" name="id" value="{{@$user[0]->id}}"/>
                                              <div class="form-group row">
                                                  <label for="inputEmail3" class="col-sm-2 col-form-label">Firest name</label>
                                                  <div class="col-sm-10">
                                                  <input type="text" class="form-control" name="fname" id="inputEmail3"  value="{{@$E_data[0]->first_name}}">
                                                  </div>
                                              </div>
                                              <div class="form-group row">
                                                      <label for="inputEmail3" class="col-sm-2 col-form-label">Last name</label>
                                                      <div class="col-sm-10">
                                                              <input type="text" class="form-control" name="lname" id="inputEmail3"  value="{{@$E_data[0]->last_name}}">
                                                      </div>
                                              </div>
                                              <div class="form-group row">
                                                  <label for="inputPassword3" class="col-sm-2 col-form-label">Email</label>
                                                  <div class="col-sm-10">
                                                    <input type="email" class="form-control" name="email" id="inputPassword3" value="{{@$user[0]->email}}" >
                                                  </div>
                                              </div>
                                              <div class="form-group row">
                                                      <label for="inputPassword3" class="col-sm-2 col-form-label">Change Password</label>
                                                      <div class="col-sm-10">
                                                              <input type="password" class="form-control" name="password" id="inputPassword3"  >
                                                      </div>
                                              </div>
                                              <div class="form-group row">
                                                      <label for="inputPassword3" class="col-sm-2 col-form-label">Company</label>
                                                      <div class="col-sm-10">
                                                                <input type="text" value="{{Session::get('company')}}"  disabled/>
                                                                <input type="hidden" value="{{Session::get('cid')}}" name="cid" />
                                                      </div>
                                              </div>
                                              <div class="form-group row">
                                                      <label for="inputPassword3" class="col-sm-2 col-form-label">Employee type</label>
                                                      <div class="col-sm-10">
                                                              <select class="form-control" name="type" id="inputPassword3"  >
                                                                      <option value="e">Employee</option>
                                                                      <option value="m">Manager</option>
                                                                      
                                                              </select>
                                                      </div>
                                              </div>
                                                      
                                              <div class="form-group row">
                                                  <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                  </div>
                                              </div>
                                              
                        </form>
        
                      </div>

            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
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
