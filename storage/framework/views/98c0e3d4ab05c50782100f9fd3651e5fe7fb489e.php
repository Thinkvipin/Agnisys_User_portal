

              
<?php $__env->startSection('sContent'); ?>
    

              <!-- Breadcrumbs-->
          <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                          <a href="<?php echo e(URL::to('/')); ?>">Dashboard</a>
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
                              
                              <tbody>
                                        <?php $i=1;?>
                                        <?php $__currentLoopData = $feeds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                        <td><?php echo e($i++); ?></td>
                                                        <td><?php echo e($f->topic); ?></td>
                                                        <td><?php echo e($f->type); ?></td>
                                                        <td><?php echo e($f->message); ?></td>
                                                        <td>
                                                          <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($company->id == $f->cid): ?>
                                                              <?php echo e(ucwords($company->name)); ?>

                                                            <?php endif; ?>
                                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </td>
                                                        <td>
                                                          <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($u->id == $f->uid): ?>
                                                              <?php echo e(ucwords($u->name)); ?>

                                                            <?php endif; ?>
                                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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