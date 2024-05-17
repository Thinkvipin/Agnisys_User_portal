@extends('layouts.base')


@section('content')



@include('admin.includes.ag-header')
    
    <div id="wrapper">

        
         @if(Session::get('role') == 'customer' || Session::get('role') == 'Customer' || Session::get('role') == 'Registered' || Session::get('role') == 'registered' )
          @include('admin.includes.sidebar')
        @else
          @include('admin.includes.sidebar1')
        @endif
        <?
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
            <li class="breadcrumb-item active">All Teams</li>
          </ol>

          
          
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
                Teams</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>SNo</th>
                        <th>Name</th>
                        <th>Tag</th>
                        <th>Work</th>
                        <th>Assignees</th>
                        <th>Edit</th>
                        <th>delete</th>
                        <th>Created date</th>
                        
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>SNo</th>
                      <th>Name</th>
                      <th>Tag</th>
                      <th>Work</th>
                      <th>Assignees</th>
                      <th>Edit</th>
                      <th>delete</th>
                      <th>Created date</th>
                    </tr>
                  </tfoot>
                  <tbody>
                     @foreach ($teams as $item)
                        <tr>
                          <td>{{$item->id}}</td>
                          <td>{{$item->name}}</td>
                          <td>{{$item->tag}}</td>
                          <td>{{$item->work}}</td>
                          <td>
                            @if($item->assigned_to != 'N;' && $item->assigned_to != null)
                              <?php $seq = unserialize($item->assigned_to);?> 
                              @foreach($seq as $s)
                                @foreach($users as $u)
                                  @if($u->id == $s)
                                  {{ $u->username.','}}
                                  @endif
                                @endforeach
                                
                              @endforeach
                            @else
                              {{__('')}}
                            @endif
                          </td>
                          <td><a href="{{URL::to('dashboard/edit-team')}}/{{$item->id}}">edit</a></td>
                          <td><a href="{{URL::to('dashboard/delete-team')}}/{{$item->id}}">delete</a></td>

                          <td>{{$item->created_at}}</td>
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
