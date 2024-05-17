
@extends('layouts.s_admin')
              
@section('sContent')
    

              <!-- Breadcrumbs-->
          <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                          <a href="{{URL::to('/')}}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">All licenses</li>
                      </ol>
            
                      
                      
                      <!-- DataTables Example -->
                      <div class="card mb-3">
                        <div class="card-header">
                          <i class="fas fa-table"></i>
                        All licenses</div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                <tr>
                                
                                        <th>Id</th>
                                        <th>Company</th>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Valid Till</th>
                                        <th>Action</th>

                                </tr>
                              </thead>
                              {{-- <tfoot>
                                <tr>
                                        <th>Id</th>
                                        <th>Company</th>
                                        <th>user</th>
                                        <th>Product</th>
                                        <th>Expiry</th>
                                        <th>action</th>
                                </tr>
                              </tfoot> --}}
                              <tbody>
                                  <?php $i=1;?>
                                        @foreach ($licensesAll as $license)
                                                <tr>
                                                        <td>{{$i++}}</td>
                                                        <td>
                                                            @foreach($companies as $p)
                                                                @if($license->cid == $p->id)
                                                                  {{ucwords($p->name)}}
                                                                @endif
                                                            @endforeach
                                                        </td>

                                                        <td>
                                                            <?php 
                                                                
                                                                if($license->pid != null && $license->pid != ""){
                                                                    $pods = unserialize($license->pid);
                                                                    foreach($pods as $p){
                                                                        foreach($products as $product){
                                                                            if($product->id == $p)
                                                                                echo $product->name.', ';
                                                                        }
                                                                        
                                                                    }
                                                                }
                                                            ?>
                                                                
                                                        </td>
                                                        <td>
                                                            <!--{{$license->quantity}}-->
                                                            <?php 
                                                                if($license->quantity != null && $license->quantity != ""){
                                                                    $quantities = unserialize($license->quantity);
                                                                    foreach($quantities as $quantity){
                                                                        echo $quantity.', '; 
                                                                    }
                                                                }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <!--{{$license->validity_date}}-->
                                                            <?php 
                                                                if($license->validity_date != null && $license->validity_date != ""){
                                                                    $expireDate = unserialize($license->validity_date);
                                                                    foreach($expireDate as $date){
                                                                        $date = date('d-F-Y', strtotime($date)); 
                                                                        echo $date . ", ";
                                                                    }
                                                                }
                                                            ?>
                                                        </td>
                                                <td><a class="btn " href="{{URL::to('dashboard/s/license-request/'.$license->id)}}">view</a>
                                                    <a class="btn bg-danger" href="{{URL::to('dashboard/s/license-delete/'.$license->id)}}"><i class="fas fa-trash-alt"></i></a>
                                                </td>
                                                </tr>
                                        @endforeach
                                
                                
                                
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
            
            
    
@endsection
        