
@extends('layouts.s_admin')
              
@section('sContent')
    
          <style type="text/css">
            input[type="checkbox"], input[type="radio"]{
              width: 19px;
            }
          </style>
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
                                    <!-- <th>ID</th> -->
                                    <th><input type="checkbox" id="checkBoxAll"></th>
                                    <th>Company Name</th>
                                    <th>Domain</th>
                                    <th>Tech contact</th>
                                    <th>Software contact</th>
                                    <th>Finance contact</th>
                                    <th>Action</th>
                                    
                                </tr>
                              </thead>
                              {{-- <tfoot>
                                <tr>
                                    <!-- <th>ID</th> -->
                                    <th>Name</th>
                                    <th>contact</th>
                                    <th>Tech contact</th>
                                    <th>SW contact</th>
                                    <th>Action</th>
                                </tr>
                              </tfoot> --}}
                              <tbody>
                                <?php $i = 1;?>
                                 @foreach ($company as $item)
                                    @if(isset($item->finance_contact) || isset($item->technical_contact) || isset($item->finance_contact))  
                                    <tr>
                                      <!-- <td>{{$i++}}</td> -->
                                      <td><input type="checkbox" name="ids" class="checkBoxClass" value="{{$item->id}}"></td>
                                      <td>{{ucwords($item->name)}}</td>
                                      <td>{{ucwords($item->domain)}}</td>
                                       <!--<td>{{$item->address}}</td> -->
                                      <td><?php $fcs = explode(',',$item->technical_contact);?>
                                          @foreach($fcs as $fc)
                                            {{$fc}}
                                          @endforeach
                                      </td>
                                      <td><?php $fcs = explode(',',$item->license_sw_contact);?>
                                          @foreach($fcs as $fc)
                                            {{$fc}} 
                                          @endforeach
                                      </td>
                                      <td>
                                        <?php $fcs = explode(',',$item->finance_contact);?>
                                          @foreach($fcs as $fc)
                                            {{$fc}}
                                          @endforeach
                                      </td>
                                      <td>
                                        <a class="btn bg-success" href="{{URL::to('dashboard/s/edit')}}/{{$item->id}}"><i class="fas fa-pencil-alt"></i></a>
                                        @if($item->id != 2204)<a class="btn bg-danger" href="{{URL::to('dashboard/s/delete')}}/{{$item->id}}"><i class="fas fa-trash-alt"></i></a>@endif
                                        
                                      </td>
                                    </tr>
                                   @else
                                   <tr>
                                      <!-- <td>{{$i++}}</td> -->
                                      <td><input type="checkbox" name="ids" class="checkBoxClass" value="{{$item->id}}"></td>
                                      <td>{{ucwords($item->name)}}</td>
                                      <td>{{ucwords($item->domain)}}</td>
                                       <!--<td>{{$item->address}}</td> -->
                                      <td>{{ $item->technical_contact}}
                                         
                                      </td>
                                      <td>{{ $item->license_sw_contact}}
                                          
                                      </td>
                                      <td>
                                        {{ $item->finance_contact}}
                                          
                                      </td>
                                      <td>
                                        <a class="btn bg-success" href="{{URL::to('dashboard/s/edit')}}/{{$item->id}}"><i class="fas fa-pencil-alt"></i></a>
                                        @if($item->id != 2204)<a class="btn bg-danger" href="{{URL::to('dashboard/s/delete')}}/{{$item->id}}"><i class="fas fa-trash-alt"></i></a>@endif
                                        
                                      </td>
                                    </tr>
                                   @endif
                               @endforeach
                                
                                
                                
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
            
            
                      
@endsection

        