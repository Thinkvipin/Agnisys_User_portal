    
<?php 
function abc($pid,$used){
  $product = \App\product::select('*')->where('id',$pid)->get()->first();

  echo $product->name;
  // echo '<'.$pid.'>';
  $used .= $product->name.',';
  if($product->parent !=0){
    echo '< ';
  }
  else{
    
  }
  if($product->parent != 0){
    abc($product->parent,$used);
  }
  
  // return $used;
}?>
<?php $__env->startSection('sContent'); ?>
    
<style type="text/css">
	.licence-valid.bg-danger{
		background-color: transparent!important;
		color:#e3342f!important;
	}
	.licence-valid.alert-danger{
		background-color: transparent!important;
		color:#761b18!important;
	}
	.wd-118{
	    width:118px !important;
	}
</style>
              <!-- Breadcrumbs-->
          <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                          <a href="<?php echo e(URL::to('/')); ?>">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">All Licenses</li>
                      </ol>
                      <!-- DataTables Example -->
                      <div class="row">
                            <div class="col-md-3">
                                    <div class="alert-danger" style="margin-top:8px;height:10px;width:10px;float:left;background-color: #079c46;border-color: #079c46;"></div> 
                                    <p style="float:left;">&nbsp;&nbsp;Working</p>
                                    <div class="alert-danger" style="margin-top:8px;height:10px;width:10px;float:left;background-color: #ff9800;border-color: #ff9800;margin-left: 15px;"></div> 
                                    <p style="float:left;">&nbsp;&nbsp;Expire soon</p>
                                    <div class="bg-danger" style="margin-top:8px;height:10px;width:10px;float:left;background-color: #e0241f;border-color: #e0241f;margin-left: 15px;"></div> 
                                    <p style="float:left;">&nbsp;&nbsp;Expired&nbsp;&nbsp;</p>
                                    
                                 
                            </div>
                            <div class="col-sm-10">
                            </div>
                      </div>
                      <div class="card mb-3">
                        <div class="card-header">
                          <i class="fas fa-table"></i>
                        All licenses</div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                <tr>
                                    <th>Company</th>
                                    
                                    <th>Product</th>
                                    <th>Type</th>
                                    <!--<th>duration</th>-->
                                    <th>Quantity</th>
                                    <th>Expire</th>
                                    <th class="wd-118">action</th>
                                </tr>
                              </thead>
                              
                              <tbody>
                                
                                        <?php $__currentLoopData = $licensesAll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $license): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php 
                                            $datetime = new DateTime($license->start_date);
                                            
                                            // $datetime->add(new DateInterval('P'.$license->duration.'W'));//M,W,D,Y
                                            // echo $datetime->format('Y-m-d');
                                            $days =  strtotime($datetime->format('Y-m-d')) - strtotime(date("Y-m-d"));
                                            $days = round($days / 86400);
                                             ?>
                                             
                                             <tr  class="">
                                                  <td>
                                                    <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                      <?php if($company->id == $license->cid): ?>
                                                        <?php echo e(ucwords($company->name)); ?>

                                                      <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                  </td>
                                                  
                                                  <td> 
                                                    <?php 
                                                      if($license->pid != 0){
	                                                        $pods = abc($license->pid,' ');
	                                                      	echo $pods;
	                                                    }
                                                    ?>
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
                                                  <td class="text-capitalize"><?php echo e($license->type); ?>, <?php echo e($license->type1); ?></td>
                                                  <!--<td><?php echo e($license->duration); ?> weeks</td>-->
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

                                                  <td class="licence-valid <?php if($days <= 31 && $days >0): ?>
													<?php echo e(__('alert-danger')); ?>

													<?php elseif($days < 0): ?>
													<?php echo e(__('bg-danger')); ?>

													<?php endif; ?>">
                                                      <!--<?php echo e($license->validity_date); ?>-->
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
                                                                
                                                                
                                                            }
                                                        }
                                                    ?>
                                                      
                                                  </td>

                                                  <td>
                                                      <a class="btn bg-success" href="<?php echo e(URL::to('dashboard/s/license-edit/'.$license->id)); ?>"><i class="fas fa-eye"></i></a>
                                                      <a class="btn bg-danger" href="<?php echo e(URL::to('dashboard/s/license-delete/'.$license->id)); ?>"><i class="fas fa-trash-alt"></i></a>
                                                      
                                                      <?php if($license->file !=''): ?>
                                                        <a class="btn " download target="_blank" href="<?php echo e(asset('public/license_files')); ?>/<?php echo e($license->file); ?>"><i class="fas fa-download"></i></a>
                                                      <?php endif; ?>
                                                  </td>
                                              </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                                
                                
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
            
            
    
<?php $__env->stopSection(); ?>
        
<?php echo $__env->make('layouts.s_admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>