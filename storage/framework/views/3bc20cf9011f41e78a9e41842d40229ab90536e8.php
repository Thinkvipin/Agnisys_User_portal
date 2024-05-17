              
<?php $__env->startSection('sContent'); ?>
    

              <!-- Breadcrumbs-->
          <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                          <a href="<?php echo e(URL::to('/')); ?>">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">All users</li>
                      </ol>
            
                      
                      
                      <!-- DataTables Example -->
                      <div class="card mb-3">
                        <div class="card-header">
                            <i class="fas fa-table"></i>
                            All users
                        </div>
                            <div class="card-body">
                              <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                      <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>email</th>
                                            <th>Registered Date</th>
                                            <th>Role</th>
                                            <th>Action</th>
        
                                        </tr>
                                      </thead>
                                      <tbody>
                                          <?php $i=1;?>
                                          <?php $__currentLoopData = $employeesAll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <tr>
                                             
                                             <td><?php echo e(ucwords($employee->name)); ?></td>
                                             <td><?php echo e($employee->email); ?></td>
                                             <td>
                                                <?php
                                                     $created_at = $employee->created_at;
                                                     
                                                     $newDate = date("d-M-Y", strtotime($created_at));
                                                     echo "Start - ".$newDate;
                                                     if($employee->role == 'Registered'){
                                                         $date = strtotime("+30 days",strtotime($newDate));
                                                         echo "<br>End - ".date('d-M-Y', $date);
                                                     }
                                                ?>
                                             </td>
                                             <td><?php echo e($employee->role); ?></td>
                                             <td>
                                                <a class="btn bg-success" href="<?php echo e(URL::to('dashboard/edit-employee')); ?>/<?php echo e($employee->id); ?>"><i class="fas fa-pencil-alt"></i></a>
                                                <a class="btn bg-danger" href="<?php echo e(URL::to('dashboard/delete-employee')); ?>/<?php echo e($employee->id); ?>"><i class="fas fa-trash-alt"></i></a>
                                                <?php if($employee->status == true): ?>
                                                  <a href="<?php echo e(URL::to('dashboard/disable-employee')); ?>/<?php echo e($employee->id); ?>" class="btn btn-success bg-success"><i class="fas fa-user-alt"></i></a></td>
                                                <?php else: ?> 
                                                  <a href="<?php echo e(URL::to('dashboard/enable-employee')); ?>/<?php echo e($employee->id); ?>" class="btn btn-danger bg-danger"><i class="fas fa-user-alt-slash"></i></a></td>
                                                <?php endif; ?>
                                           </tr>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      </tbody>
                                    </table>
                              </div>
                            </div>
                      </div>
            
            
    
<?php $__env->stopSection(); ?>
        
<?php echo $__env->make('layouts.s_admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>