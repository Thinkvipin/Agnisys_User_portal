<?php $__env->startSection('content'); ?>



<?php echo $__env->make('admin.includes.ag-header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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

         <?php if(Session::get('role') == 'customer' || Session::get('role') == 'Customer' || Session::get('role') == 'Registered' || Session::get('role') == 'registered' ): ?>
          <?php echo $__env->make('admin.includes.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php else: ?>
          <?php echo $__env->make('admin.includes.sidebar1', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>
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
              <a href="<?php echo e(URL::to('/')); ?>">Dashboard</a>
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
                     <?php $__currentLoopData = $licenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $license): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                        <?php if($license->status == 1): ?>
                            
                                <?php if($days <= 31 && $days >0): ?>
                                <!--alert-danger-->
                                  <tr class="<?php echo e(__('')); ?>">
                                      
                                          <td><?php echo e($i++); ?></td>
                                          <td><?php echo e($license->license_key); ?></td>
                                          <!--<td><?php echo e(date("d-m-Y",strtotime($license->start_date))); ?></td>-->
                                          <!--<td><?php echo e($license->duration); ?> months</td>-->
                                          <td>
                                              <!--<?php echo e($license->quantity); ?>-->
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
                                              <!--<?php echo e($datetime->format('Y-m-d')); ?>-->
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
                                                  <?php if($license->file !=''): ?>
                                              <a class="btn" download href="<?php echo e(asset('/public/license_files')); ?>/<?php echo e($license->file); ?>">Download</a>
                                              <?php endif; ?>
                                          <!--&nbsp;<br>Expire soon-->
                                          </td>
                                  </tr>
                                <?php elseif($days<0): ?>
                                <!--bg-danger-->
                                  <tr class="<?php echo e(__('')); ?>">
                                      <td><?php echo e($i++); ?></td>
                                      <td><?php echo e($license->license_key); ?></td>
                                      <!--<td><?php echo e(date("d-m-Y",strtotime($license->start_date))); ?></td>-->
                                      <!--<td><?php echo e($license->duration); ?> months</td>-->
                                      <td>
                                          <!--<?php echo e($license->quantity); ?>-->
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
                                          <!--<?php echo e($datetime->format('Y-m-d')); ?>-->
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
                                          <!--<a class="btn" download href="<?php echo e(asset('/public/license_files')); ?>">Expired</a>-->
                                          <?php if($license->file !=''): ?>
                                              <a class="btn" download href="<?php echo e(asset('/public/license_files')); ?>/<?php echo e($license->file); ?>">Download</a>
                                              <?php endif; ?>
                                      </td>
                                  </tr>
                                <?php else: ?>
                                  <tr >
                                      <td><?php echo e($i++); ?></td>
                                      <td><?php echo e($license->license_key); ?></td>
                                      <!--<td><?php echo e(date("d-M-Y",strtotime($license->start_date))); ?></td>-->
                                      <!--<td><?php echo e($license->duration); ?> months</td>-->
                                      <td>
                                          <!--<?php echo e($license->quantity); ?>-->
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
                                          <!--<?php echo e($datetime->format('d-M-Y')); ?>-->
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
                                      <td><?php if($license->file !=''): ?>
                                              <a class="btn" download href="<?php echo e(asset('/public/license_files')); ?>/<?php echo e($license->file); ?>">Download</a>
                                              <?php endif; ?>
                                      </td>
                                  </tr>
                                <?php endif; ?>
                          <?php else: ?>
                          
                            <tr class="alert-info">
                                <td><?php echo e($i++); ?></td>
                                <td><?php echo e(__('Request pending')); ?></td>
                                <!--<td><?php echo e(date("d-M-Y",strtotime($license->start_date))); ?></td>-->
                                <!--<td><?php echo e($license->duration); ?> months</td>-->
                                <td>
                                    <!--<?php echo e($license->quantity); ?>-->
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
                                    <!--<?php echo e($datetime->format('d-M-Y')); ?>-->
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
                                    <?php if($license->file !=''): ?>
                                      <a class="btn" download href="<?php echo e(asset('/public/license_files')); ?>/<?php echo e($license->file); ?>">Download</a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                          <?php endif; ?>
                          <?php
                        } catch(Exception $e) {
                        //   print_r($license);
                      }
                      ?>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

        <?php echo $__env->make('admin.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
            <a class="btn btn-primary" href="<?php echo e(route('logout')); ?>" 
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
                <?php echo e(__('Logout')); ?>

            </a>
            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                <?php echo csrf_field(); ?>
            </form>
          </div>
        </div>
      </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>