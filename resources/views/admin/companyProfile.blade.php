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
              <a href="{{URL::to('/')}}">Dashboard </a>
            </li>
            <li class="breadcrumb-item active">Company profile</li>
          </ol>

          
          
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Company profile</div>
            <div class="card-body">
              <div class="row">
                  <div class="col-12 col-md-6">
                        <form action="{{URL::to('dashboard/s/edit')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                
                                        <input type="hidden" name="refId" value="{{session::get('refId')}}"/>
                                        <input type="hidden" name="id" value="{{$company[0]->id}}"/>
                                        <input type="hidden" name="name" value="{{$company[0]->name}}"/>
                                        <input type="hidden" name="address" value="a"/>
                                        <input type="hidden" name="phone" value="99"/>
                                        <div class="form-group ">
                                                <label for="inputEmail3" class="">Company name</label>
                                                <div class="col-sm-12">
                                                <input type="text" class="form-control" name="" value="{{$company[0]->name}}" id="inputEmail3" style="text-transform: capitalize;" disabled>
                                                </div>
                                        </div>
                                        <div class="form-group ">
                                                <label for="inputEmail3" class="">Finance Contact</label>
                                                <div class="col-sm-12">
                                                <input type="text" class="form-control" name="fContact" value="{{$company[0]->finance_contact}}" id="inputEmail3"  >
                                                </div>
                                        </div>
                                        <div class="form-group ">
                                                <label for="inputPassword3" >Technical Contact</label>
                                                <div class="col-sm-12">
                                                <input type="text" class="form-control" name="techContact" value="{{$company[0]->technical_contact}}" id="inputPassword3" >
                                                </div>
                                        </div>
                                        <div class="form-group ">
                                                <label for="inputPassword3" class="">License SW Contact</label>
                                                <div class="col-sm-12">
                                                <input type="text" class="form-control" name="swContact" value="{{$company[0]->license_sw_contact}}" id="inputPassword3" >
                                                </div>
                                        </div>
                                        <div class="form-group">
                                                <label for="inputPassword3" class="">Current Logo</label>
                                                <div class="col-sm-12">
                                                  @if($company[0]->logo != null && $company[0]->logo != '')
                                                    <img src="{{asset('public/logo_files')}}/{{$company[0]->logo}}" style="width:auto;height:100px;"/>
                                                  @else
                                                    No logo selected
                                                  @endif
                                                  </div>
                                        </div>
                                        <div class="form-group">
                                                <label for="inputPassword3" class="">Upload Logo</label>
                                                <div class="col-sm-12">
                                                        <input type="file" class="form-control" name="logo" id="inputPassword3"  >
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                                <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                        </div>
                                              
                        </form>
                  </div>
                  <div class="col-12 col-md-6">
                      <h3>Users</h3>
                      <!-- <a class="btn btn-primary" href="{{ URL::to('dashboard')}}/add-employee">Add user request </a> -->
                      <div style="max-height:300px;overflow-y:auto;margin-top:1em;">
                          <ul class="list-group">
                              @foreach ($users as $user)
                          <li class="list-group-item">{{$user->email}}</li>
                              @endforeach
                          </ul>
                      </div>
                      <h3>Products</h3>
                      <div style="max-height:300px;overflow-y:auto;">
                          <ul class="list-group">
                              @foreach($licenses as $l) 
                                <li class="list-group-item">
                                    <?php
                                    $pods = unserialize($l->pid);
                                    foreach($pods as $p){
                                        foreach($products as $product){
                                            if($product->id == $p)
                                                echo $product->name.', ';
                                        }
                                        
                                    }
                                    ?>
                                </li>
                              @endforeach
                          </ul>
                          
                      </div>
                      <h3>Licenses</h3>
                      <div style="max-height:300px;overflow-y:auto;">
                          <ul class="list-group">
                              @foreach($licenses as $l) 
                          <li class="list-group-item">
                              <?php
                              $pods = unserialize($l->pid);
                              $expiryDate = unserialize($l->validity_date);
                              $quantity = unserialize($l->quantity);
                              $i = 0;
                              foreach($pods as $p){
                                    foreach($products as $product){
                                        if($product->id == $p)
                                            echo $product->name.', ';
                                    }
                                    echo " Qty - ".$quantity[$i].", ";
                                    echo " ".$expiryDate[$i]."<br>";
                                   $i++; 
                                }
                              ?>
                              <!--{{$l->pid.' | '.$l->validity_date.' | Quantity - '.$l->quantity }}-->
                              
                          </li>
                          @endforeach
                          </ul>
                      </div>
                  </div>
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


