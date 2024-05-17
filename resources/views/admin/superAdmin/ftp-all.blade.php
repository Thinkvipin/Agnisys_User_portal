
@extends('layouts.s_admin')
              
@section('sContent')
    

              <!-- Breadcrumbs-->
          <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                          <a href="{{URL::to('/')}}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">All FTP Request</li>
                      </ol>
            
                      
                      
                      <!-- DataTables Example -->
                      <div class="card mb-3">
                        <div class="card-header">
                          <i class="fas fa-table"></i>
                        All FTP Request</div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                <tr>
                                
                                        <th>Id</th>
                                        <th>Company</th>
                                        <th>user</th>
                                        <th>action</th>

                                </tr>
                              </thead>
                              {{-- <tfoot>
                                <tr>
                                        <th>Id</th>
                                        <th>Company</th>
                                        <th>user</th>
                                        <th>action</th>
                                </tr>
                              </tfoot> --}}
                              <tbody>
                                <?php $i=1;?>
                                        @foreach ($ftpAll as $ftp)
                                                <tr>
                                                        <td>{{$i++}}</td>
                                                        <td>
                                                            @foreach($companies as $c)
                                                              @if($c->id == $ftp->cid)
                                                                {{ucwords($c->name)}}
                                                              @endif
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            @if($ftp->uid != "")
                                                              @foreach($users as $u)
                                                                @if($u->id == $ftp->uid)
                                                                  {{ucwords($u->name)}}
                                                                @endif
                                                              @endforeach
                                                            @else 
                                                              {{__('All users')}}
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a class="btn bg-success" href="{{URL::to('dashboard/s/ftp-request/'.$ftp->id)}}"><i class="fas fa-pencil-alt"></i></a>
                                                            <a class="btn bg-danger" href="{{URL::to('dashboard/s/ftp-delete/'.$ftp->id)}}"><i class="fas fa-trash-alt"></i></a>
                                                            <a class="btn" href="{{URL::to('dashboard/s/ftp-request/'.$ftp->id)}}"><i class="fas fa-eye"></i></a>
                                                        </td>
                                                </tr> 
                                        @endforeach
                                
                                
                                
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
            
            
    
@endsection
        