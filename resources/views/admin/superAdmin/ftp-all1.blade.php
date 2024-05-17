
@extends('layouts.s_admin')
              
@section('sContent')
    

              <!-- Breadcrumbs-->
          <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                          <a href="{{URL::to('/')}}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">All FTP/SFTP</li>
                      </ol>
            
                      
                      
                      <!-- DataTables Example -->
                      <div class="card mb-3">
                        <div class="card-header">
                          <i class="fas fa-table"></i>
                        All FTP/SFTP</div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                <tr>
                                
                                        <th>Id</th>
                                        <th>Company</th>
                                        <th>Username</th>
                                        <th>password</th>
                                        <th>port</th>
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
                                                        <td>{{$ftp->ftp_username}}</td>
                                                        <td>{{$ftp->ftp_pass}}</td>
                                                        <td>{{$ftp->ftp_port}}</td>
                                                        <td>
                                                            <a class="btn bg-success" href="{{URL::to('dashboard/s/ftp-view/'.$ftp->id)}}"><i class="fas fa-pencil-alt"></i></a>
                                                            <a class="btn bg-danger" href="{{URL::to('dashboard/s/ftp-delete/'.$ftp->id)}}"><i class="fas fa-trash-alt"></i></a>
                                                            {{-- <a class="btn" href="{{URL::to('dashboard/s/ftp-view/'.$ftp->id)}}"><i class="fas fa-eye"></i></a> --}}
                                                        </td>

                                                </tr>
                                        @endforeach
                                
                                
                                
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
            
            
    
@endsection
        