
@extends('layouts.s_admin')
              
@section('sContent')
    

              <!-- Breadcrumbs-->
          <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                          <a href="{{URL::to('/')}}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">All feedbacks</li>
                      </ol>
            
                      
                      
                      <!-- DataTables Example -->
                      <div class="card mb-3">
                        <div class="card-header">
                          <i class="fas fa-table"></i>
                        All feedbacks</div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                <tr>
                                        <th>id</th>
                                        <th>title</th>
                                        <th>type</th>
                                        <th>message</th>
                                        <th>company</th>
                                        <th>user</th>
                                        

                                </tr>
                              </thead>
                              {{-- <tfoot>
                                <tr>
                                        <th>id</th>
                                        <th>title</th>
                                        <th>message</th>
                                        <th>company</th>
                                        <th>user</th>

                                </tr>
                              </tfoot> --}}
                              <tbody>
                                        <?php $i=1;?>
                                        @foreach ($feeds as $f)
                                                <tr>
                                                        <td>{{$i++}}</td>
                                                        <td>{{$f->topic}}</td>
                                                        <td>{{$f->type}}</td>
                                                        <td>{{$f->message}}</td>
                                                        <td>
                                                          @foreach($companies as $company)
                                                            @if($company->id == $f->cid)
                                                              {{ucwords($company->name)}}
                                                            @endif
                                                          @endforeach
                                                        </td>
                                                        <td>
                                                          @foreach($users as $u)
                                                            @if($u->id == $f->uid)
                                                              {{ucwords($u->name)}}
                                                            @endif
                                                          @endforeach
                                                        </td>
                                                </tr>
                                        @endforeach
                                
                                
                                
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
            
            
    
@endsection
        