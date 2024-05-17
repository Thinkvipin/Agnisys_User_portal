              
<?php $__env->startSection('sContent'); ?>
    

              <!-- Breadcrumbs-->
          <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                          <a href="<?php echo e(URL::to('/')); ?>">Dashboard</a>
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
                              
                              <tbody>
                                  <?php $i=1;?>
                                        <?php $__currentLoopData = $licensesAll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $license): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                        <td><?php echo e($i++); ?></td>
                                                        <td>
                                                            <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if($license->cid == $p->id): ?>
                                                                  <?php echo e(ucwords($p->name)); ?>

                                                                <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                                            <!--<?php echo e($license->validity_date); ?>-->
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
                                                <td><a class="btn " href="<?php echo e(URL::to('dashboard/s/license-request/'.$license->id)); ?>">view</a>
                                                    <a class="btn bg-danger" href="<?php echo e(URL::to('dashboard/s/license-delete/'.$license->id)); ?>"><i class="fas fa-trash-alt"></i></a>
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