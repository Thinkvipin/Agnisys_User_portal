
@extends('layouts.s_admin')
              
@section('sContent')
    

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{URL::to('/')}}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">All Groups</li>
          </ol>

          
          
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
                All groups</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>SNo</th>
                        <th>Name</th>
                        <th>Companies</th>
                        <th>Action</th>
                        <th>Created date</th>
                        
                    </tr>
                  </thead>
                  {{-- <tfoot>
                    <tr>
                      <th>SNo</th>
                      <th>Name</th>
                      <th>Companies</th>
                      <th>Action</th>
                      <th>Created date</th>
                    </tr>
                  </tfoot> --}}
                  <tbody>
                      <?php $i=1;?>
                     @foreach ($groups as $item)
                        <tr>
                          <td>{{$i++}}</td>
                          <td>{{$item->name}}</td>
                          
                          <td>
                            @if($item->companies != 'N;' && $item->companies != null)
                              <?php $seq = unserialize($item->companies);?> 
                              @foreach($seq as $s)
                                @foreach($companies as $u)
                                  @if($u->id == $s)
                                  {{ ucwords($u->name).','}}
                                  @endif
                                @endforeach
                                
                              @endforeach
                            @else
                              {{__('')}}
                            @endif
                          </td>

                          <td>
                            <a class="btn bg-danger" href="{{URL::to('dashboard/s/delete-group')}}/{{$item->id}}"><i class="fas fa-trash-alt"></i></a>
                            <a class="btn bg-success" href="{{URL::to('dashboard/s/edit-group')}}/{{$item->id}}"><i class="fas fa-pencil-alt"></i></a>
                          </td>

                          <td>{{ date("d-M-Y",strtotime($item->created_at))}}</td>
                        </tr>
                     @endforeach
                    
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>

@endsection