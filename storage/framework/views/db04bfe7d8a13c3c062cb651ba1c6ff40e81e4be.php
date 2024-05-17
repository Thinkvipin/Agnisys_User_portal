              
<?php $__env->startSection('sContent'); ?>
    
            
              <!-- Breadcrumbs-->
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                          <a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Add</li>
                      </ol>
                      
                      <!-- DataTables Example -->
                        <div class="card mb-3">
                        <div class="card-header">
                          <i class="fas fa-table"></i>
                            Profile</div>
                        <div class="card-body">
                          <div class="table-responsive">
                                    <form action="<?php echo e(URL::to('dashboard')); ?>/profile" method="post" enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                                    
                                                    <input type="hidden" name="refId" value="<?php echo e(session::get('refId')); ?>"/>
                                                    <input type="hidden" name="uid" value="<?php echo e(session::get('uid')); ?>"/>
                                                    
                                                    <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-2 col-form-label">First name</label>
                                                            <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="fname" value="<?php echo e($refData[0]->first_name); ?>" id="inputEmail3"  required>
                                                            </div>
                                                    </div>
                                                    <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Last name</label>
                                                            <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="lname" value="<?php echo e($refData[0]->last_name); ?>" id="inputEmail3"  required>
                                                            </div>
                                                    </div>
                                                    <div class="form-group row" style="display:none;>
                                                            <label for="inputPassword3" class="col-sm-2 col-form-label">Username</label>
                                                            <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="username" value="<?php echo e($user[0]->username); ?>" id="inputPassword3" required>
                                                            </div>
                                                    </div>
                                                    <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                                            <div class="col-sm-10">
                                                            <input type="email" class="form-control" name="email" value="<?php echo e($user[0]->email); ?>" id="inputEmail3" required>
                                                            </div>
                                                    </div>
                                                    <div class="form-group row">
                                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Password</label>
                                                                <div class="col-sm-10">
                                                                <input type="password" class="form-control" name="password" id="inputEmail3">
                                                                <span>Entring new will override current</span>
                                                                </div>
                                                        </div>
                                                    <div class="form-group row">
                                                            <div class="col-sm-10">
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                            </div>
                                                    </div>
                                                          
                                    </form>
                          </div>
                        </div>
                      </div>
            
            
    
<?php $__env->stopSection(); ?>
        
<?php echo $__env->make('layouts.s_admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>