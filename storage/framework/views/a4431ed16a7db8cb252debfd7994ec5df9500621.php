              
<?php $__env->startSection('sContent'); ?>
    
          <style type="text/css">
            input[type="checkbox"], input[type="radio"]{
              width: 19px;
            }
          </style>
              <!-- Breadcrumbs-->
          <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                          <a href="<?php echo e(URL::to('/')); ?>">Dashboard</a>
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
                              
                              <tbody>
                                <?php $i = 1;?>
                                 <?php $__currentLoopData = $company; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(isset($item->finance_contact) || isset($item->technical_contact) || isset($item->finance_contact)): ?>  
                                    <tr>
                                      <!-- <td><?php echo e($i++); ?></td> -->
                                      <td><input type="checkbox" name="ids" class="checkBoxClass" value="<?php echo e($item->id); ?>"></td>
                                      <td><?php echo e(ucwords($item->name)); ?></td>
                                      <td><?php echo e(ucwords($item->domain)); ?></td>
                                       <!--<td><?php echo e($item->address); ?></td> -->
                                      <td><?php $fcs = explode(',',$item->technical_contact);?>
                                          <?php $__currentLoopData = $fcs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo e($fc); ?>

                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      </td>
                                      <td><?php $fcs = explode(',',$item->license_sw_contact);?>
                                          <?php $__currentLoopData = $fcs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo e($fc); ?> 
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      </td>
                                      <td>
                                        <?php $fcs = explode(',',$item->finance_contact);?>
                                          <?php $__currentLoopData = $fcs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo e($fc); ?>

                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      </td>
                                      <td>
                                        <a class="btn bg-success" href="<?php echo e(URL::to('dashboard/s/edit')); ?>/<?php echo e($item->id); ?>"><i class="fas fa-pencil-alt"></i></a>
                                        <?php if($item->id != 2204): ?><a class="btn bg-danger" href="<?php echo e(URL::to('dashboard/s/delete')); ?>/<?php echo e($item->id); ?>"><i class="fas fa-trash-alt"></i></a><?php endif; ?>
                                        
                                      </td>
                                    </tr>
                                   <?php else: ?>
                                   <tr>
                                      <!-- <td><?php echo e($i++); ?></td> -->
                                      <td><input type="checkbox" name="ids" class="checkBoxClass" value="<?php echo e($item->id); ?>"></td>
                                      <td><?php echo e(ucwords($item->name)); ?></td>
                                      <td><?php echo e(ucwords($item->domain)); ?></td>
                                       <!--<td><?php echo e($item->address); ?></td> -->
                                      <td><?php echo e($item->technical_contact); ?>

                                         
                                      </td>
                                      <td><?php echo e($item->license_sw_contact); ?>

                                          
                                      </td>
                                      <td>
                                        <?php echo e($item->finance_contact); ?>

                                          
                                      </td>
                                      <td>
                                        <a class="btn bg-success" href="<?php echo e(URL::to('dashboard/s/edit')); ?>/<?php echo e($item->id); ?>"><i class="fas fa-pencil-alt"></i></a>
                                        <?php if($item->id != 2204): ?><a class="btn bg-danger" href="<?php echo e(URL::to('dashboard/s/delete')); ?>/<?php echo e($item->id); ?>"><i class="fas fa-trash-alt"></i></a><?php endif; ?>
                                        
                                      </td>
                                    </tr>
                                   <?php endif; ?>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                                
                                
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
            
            
                      
<?php $__env->stopSection(); ?>

        
<?php echo $__env->make('layouts.s_admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>