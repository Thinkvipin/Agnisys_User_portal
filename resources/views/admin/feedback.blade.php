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
            <li class="breadcrumb-item active">Feedback</li>
          </ol>

          
          
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
                Feedback</div>
            <div class="card-body">
              <div class="table-responsive">
                        <form action="{{URL::to('dashboard')}}/feedback" method="post" enctype="multipart/form-data">
                                @csrf
                                
                                        <input type="hidden" name="cid" value="{{session::get('cid')}}"/>
                                        <input type="hidden" name="uid" value="{{session::get('uid')}}"/>
                                        
                                        <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Topic</label>
                                                <div class="col-sm-10">
                                                <input type="text" class="form-control" name="topic" value="" id="inputEmail3"  required>
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Feedback type</label>
                                                <div class="col-sm-10">
                                                  <select name="ftype">
                                                    <option value="General">General</option>
                                                    <option value="Product">Product</option>
                                                    <option value="Customer Portal">Customer Portal</option>
                                                  </select>
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Message</label>
                                                <div class="col-sm-10">
                                                <textarea class="form-control" name="message" placeholder="Enter your message" id=""> </textarea>
                                                </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                                <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary">Send</button>
                                                </div>
                                        </div>
                                              
                        </form>
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


