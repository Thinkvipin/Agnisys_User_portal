              
<?php $__env->startSection('sContent'); ?>
    

              <!-- Breadcrumbs-->
          <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                          <a href="<?php echo e(URL::to('/')); ?>">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">All FTP/SFTP</li>
                      </ol>
            
                      
                      
                      <!-- DataTables Example -->
                      <div class="card mb-3">
                        <div class="card-header">
                          <i class="fas fa-table"></i>
                        All FTP/SFTP</div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                <tr>
                                
                                        <th>Id</th>
                                        <th>Company</th>
                                        <th>Username</th>
                                        <th>password</th>
                                        <th>port</th>
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
                                                        <td><?php echo e($ftp->ftp_username); ?></td>
                                                        <td><?php echo e($ftp->ftp_pass); ?></td>
                                                        <td><?php echo e($ftp->ftp_port); ?></td>
                                                        <td>
                                                            <a class="btn bg-success" href="<?php echo e(URL::to('dashboard/s/ftp-view/'.$ftp->id)); ?>"><i class="fas fa-pencil-alt"></i></a>
                                                            <a class="btn bg-danger" href="<?php echo e(URL::to('dashboard/s/ftp-delete/'.$ftp->id)); ?>"><i class="fas fa-trash-alt"></i></a>
                                                            
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