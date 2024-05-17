              
<?php $__env->startSection('sContent'); ?>
    

              <!-- Breadcrumbs-->
          <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                          <a href="<?php echo e(URL::to('/')); ?>">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">All FTP Request</li>
                      </ol>
            
                      
                      
                      <!-- DataTables Example -->
                      <div class="card mb-3">
                        <div class="card-header">
                          <i class="fas fa-table"></i>
                        All FTP Request</div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                <tr>
                                
                                        <th>Id</th>
                                        <th>Company</th>
                                        <th>user</th>
                                        <th>action</th>

                                </tr>
                              </thead>
                              
                              <tbody>
                                <?php $i=1;?>
                                        <?php $__currentLoopData = $ftpAll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ftp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                        <td><?php echo e($i++); ?></td>
                                                        <td>
                                                            <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                              <?php if($c->id == $ftp->cid): ?>
                                                                <?php echo e(ucwords($c->name)); ?>

                                                              <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </td>
                                                        <td>
                                                            <?php if($ftp->uid != ""): ?>
                                                              <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if($u->id == $ftp->uid): ?>
                                                                  <?php echo e(ucwords($u->name)); ?>

                                                                <?php endif; ?>
                                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php else: ?> 
                                                              <?php echo e(__('All users')); ?>

                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <a class="btn bg-success" href="<?php echo e(URL::to('dashboard/s/ftp-request/'.$ftp->id)); ?>"><i class="fas fa-pencil-alt"></i></a>
                                                            <a class="btn bg-danger" href="<?php echo e(URL::to('dashboard/s/ftp-delete/'.$ftp->id)); ?>"><i class="fas fa-trash-alt"></i></a>
                                                            <a class="btn" href="<?php echo e(URL::to('dashboard/s/ftp-request/'.$ftp->id)); ?>"><i class="fas fa-eye"></i></a>
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