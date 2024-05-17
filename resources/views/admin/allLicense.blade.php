@extends('layouts.base')


@section('content')



@include('admin.includes.ag-header')
<style type="text/css">
	.license-tabel.dataTable tr.bg-danger{
		color: #e3342f!important;
		background-color: transparent !important;
	}
	.license-tabel.dataTable tr.alert-info{
		color: #385d7a!important;
		background-color: transparent !important;
	}
	.license-tabel.dataTable tr.alert-danger{
		color: #f9d6d5!important;
		background-color: transparent !important;
	}
</style>   
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
              <a href="{{URL::to('/')}}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">Licenses</li>

            <li class="breadcrumb-item active">All Licenses</li>
          </ol>
          <div class="row">
              <div class="col-md-5">
                
                      <div class="alert-danger" style="margin-top:8px;height:10px;width:10px;float:left;background-color: #079c46;border-color: #079c46;"></div> 
                        <p style="float:left;">&nbsp;&nbsp;Working</p>
                        <div class="alert-danger" style="margin-top:8px;height:10px;width:10px;float:left;background-color: #ff9800;border-color: #ff9800;margin-left: 15px;"></div> 
                        <p style="float:left;">&nbsp;&nbsp;Expire soon</p>
                        <div class="bg-danger" style="margin-top:8px;height:10px;width:10px;float:left;background-color: #e0241f;border-color: #e0241f;margin-left: 15px;"></div> 
                        <p style="float:left;">&nbsp;&nbsp;Expired&nbsp;&nbsp;</p>
                      <div class="alert-info" style="margin-top:8px;height:10px;width:10px;float:left;margin-left: 15px;"></div> 
                      <p style="float:left;">&nbsp;&nbsp;Pending request</p>
                   
              </div>
              <div class="col-sm-5">
              </div>
        </div>
          
          
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
                All Licenses</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered license-tabel" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>Id</th>
                        <th>Key</th>
                        <!--<th>Start date</th>-->
                        <!--<th>Duration</th>-->
                        <th>Quantity</th>
                        <th>Expire</th>
                        <th>Product</th>
                        <th>File</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php $i=1;?>
                     @foreach ($licenses as $license)
                     <?php 

                     try {  
                                
                                $expireDate = unserialize($license->validity_date);
                                $date_arr=$expireDate;
                                
                                usort($date_arr, function($a, $b) {
                                    $dateTimestamp1 = strtotime($a);
                                    $dateTimestamp2 = strtotime($b);
                                
                                    return $dateTimestamp1 < $dateTimestamp2 ? -1: 1;
                                });
                                $maxDate = $date_arr[count($date_arr) - 1];
                                
                                
                                $k = 0;
                                
                                foreach($expireDate as $date){
                                    $k++;
                                    
                                }
                         
                                $datetime = new DateTime($maxDate);
                                $datetime->add(new DateInterval('P'.$license->duration.'W'));//M,W,D,Y
                                // echo $datetime->format('Y-m-d');
                                $days =  strtotime($datetime->format('Y-m-d')) - strtotime(date("Y-m-d"));
                                $days = round($days / 86400);
                                
                                
                                ?>
                        @if($license->status == 1)
                            
                                @if($days <= 31 && $days >0)
                                <!--alert-danger-->
                                  <tr class="{{__('')}}">
                                      
                                          <td>{{$i++}}</td>
                                          <td>{{$license->license_key}}</td>
                                          <!--<td>{{date("d-m-Y",strtotime($license->start_date))}}</td>-->
                                          <!--<td>{{$license->duration}} months</td>-->
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
                                              <!--{{$datetime->format('Y-m-d')}}-->
                                                <?php 
                                                    if($license->validity_date != null && $license->validity_date != ""){
                                                        $expireDate = unserialize($license->validity_date);
                                                        foreach($expireDate as $date){
                                                            $date = date('d-F-Y', strtotime($date)); 
                                                            // echo $date . ", ";
                                                            $currentDate = date('d-F-Y');
                                                                
                                                        $date1=date_create($date);
                                                        $date2=date_create($currentDate);
                                                        $diff=date_diff($date2,$date1);
                                                        $Days =  $diff->format("%R%a");
                                                        if($Days > 15 ){
                                                            // echo "Green";
                                                            echo "<span style='color:#079c46;'>".$date .", <span>";
                                                        }
                                                        else if($Days <= 15 && $Days > 0){
                                                            // echo "Yellow";
                                                            echo "<span style='color:#ff9800;'>".$date .", <span>";
                                                        }
                                                        else{
                                                            // echo "red";
                                                            echo "<span style='color:#e0241f;'>".$date .", <span>";
                                                        }
                                                        }
                                                    }
                                                ?>
                                          </td>
                                          <td>
                                              <?php 
                                                    if($license->pid != null && $license->pid != "" && strlen($license->pid) > 4){
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
                                                  @if($license->file !='')
                                              <a class="btn" download href="{{asset('/public/license_files')}}/{{$license->file}}">Download</a>
                                              @endif
                                          <!--&nbsp;<br>Expire soon-->
                                          </td>
                                  </tr>
                                @elseif($days<0)
                                <!--bg-danger-->
                                  <tr class="{{__('')}}">
                                      <td>{{$i++}}</td>
                                      <td>{{$license->license_key}}</td>
                                      <!--<td>{{date("d-m-Y",strtotime($license->start_date))}}</td>-->
                                      <!--<td>{{$license->duration}} months</td>-->
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
                                          <!--{{$datetime->format('Y-m-d')}}-->
                                            <?php 
                                                if($license->validity_date != null && $license->validity_date != ""){
                                                    $expireDate = unserialize($license->validity_date);
                                                    foreach($expireDate as $date){
                                                        $date = date('d-F-Y', strtotime($date)); 
                                                        
                                                        $currentDate = date('d-F-Y');
                                                                
                                                        $date1=date_create($date);
                                                        $date2=date_create($currentDate);
                                                        $diff=date_diff($date2,$date1);
                                                        $Days =  $diff->format("%R%a");
                                                        if($Days > 15 ){
                                                            // echo "Green";
                                                            echo "<span style='color:#079c46;'>".$date .", <span>";
                                                        }
                                                        else if($Days <= 15 && $Days > 0){
                                                            // echo "Yellow";
                                                            echo "<span style='color:#ff9800;'>".$date .", <span>";
                                                        }
                                                        else{
                                                            // echo "red";
                                                            echo "<span style='color:#e0241f;'>".$date .", <span>";
                                                        }
                                                        
                                                        
                                                        // echo $date . ", ";
                                                    }
                                                }
                                            ?>
                                      </td>
                                      <td>
                                          <?php 
                                                if($license->pid != null && $license->pid != "" && strlen($license->pid) > 4){
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
                                          <!--<a class="btn" download href="{{asset('/public/license_files')}}">Expired</a>-->
                                          @if($license->file !='')
                                              <a class="btn" download href="{{asset('/public/license_files')}}/{{$license->file}}">Download</a>
                                              @endif
                                      </td>
                                  </tr>
                                @else
                                  <tr >
                                      <td>{{$i++}}</td>
                                      <td>{{$license->license_key}}</td>
                                      <!--<td>{{date("d-M-Y",strtotime($license->start_date))}}</td>-->
                                      <!--<td>{{$license->duration}} months</td>-->
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
                                          <!--{{$datetime->format('d-M-Y')}}-->
                                          <?php 
                                                if($license->validity_date != null && $license->validity_date != ""){
                                                    $expireDate = unserialize($license->validity_date);
                                                    foreach($expireDate as $date){
                                                        $date = date('d-F-Y', strtotime($date)); 
                                                        // echo $date . ", ";
                                                        $currentDate = date('d-F-Y');
                                                                
                                                        $date1=date_create($date);
                                                        $date2=date_create($currentDate);
                                                        $diff=date_diff($date2,$date1);
                                                        $Days =  $diff->format("%R%a");
                                                        if($Days > 15 ){
                                                            // echo "Green";
                                                            echo "<span style='color:#079c46;'>".$date .", <span>";
                                                        }
                                                        else if($Days <= 15 && $Days > 0){
                                                            // echo "Yellow";
                                                            echo "<span style='color:#ff9800;'>".$date .", <span>";
                                                        }
                                                        else{
                                                            // echo "red";
                                                            echo "<span style='color:#e0241f;'>".$date .", <span>";
                                                        }
                                                    }
                                                }
                                            ?>
                                      </td>
                                      <td>
                                          <?php 
                                                if($license->pid != null && $license->pid != "" && strlen($license->pid) > 4){
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
                                      <td>@if($license->file !='')
                                              <a class="btn" download href="{{asset('/public/license_files')}}/{{$license->file}}">Download</a>
                                              @endif
                                      </td>
                                  </tr>
                                @endif
                          @else
                          
                            <tr class="alert-info">
                                <td>{{$i++}}</td>
                                <td>{{__('Request pending')}}</td>
                                <!--<td>{{date("d-M-Y",strtotime($license->start_date))}}</td>-->
                                <!--<td>{{$license->duration}} months</td>-->
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
                                    <!--{{$datetime->format('d-M-Y')}}-->
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
                                <td>
                                   <?php 
                                        if($license->pid != null && $license->pid != "" && strlen($license->pid) > 4){
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
                                    @if($license->file !='')
                                      <a class="btn" download href="{{asset('/public/license_files')}}/{{$license->file}}">Download</a>
                                    @endif
                                </td>
                            </tr>
                          @endif
                          <?php
                        } catch(Exception $e) {
                        //   print_r($license);
                      }
                      ?>
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
