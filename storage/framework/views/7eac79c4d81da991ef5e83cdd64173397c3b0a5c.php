              
<?php $__env->startSection('sContent'); ?>
    

              <!-- Breadcrumbs-->
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                                <a href="<?php echo e(URL::to('/')); ?>">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Add user</li>
                      </ol>
            
                      
                      
                      <!-- DataTables Example -->
                      <div class="card mb-3">
                        <div class="card-header">
                          <i class="fas fa-table"></i>
                        Add user</div>
                        <div class="card-body">
                                <div class="table-responsive">
                                  <form action="<?php echo e(URL::to('dashboard/s/add-employee')); ?>" method="post" enctype="multipart/form-data">
                                          <?php echo csrf_field(); ?>
                                          
                                                        <input type="hidden" name="id" value=""/>
                                                          
                                                        <div class="form-group row">
                                                            <label for="inputName3" class="col-sm-2 col-form-label">First name</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" name="fname" id="inputName3"  required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Last name</label>
                                                                <div class="col-sm-10">
                                                                        <input type="text" class="form-control" name="lname" id="inputEmail3"  required>
                                                                </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="inputPassword3" class="col-sm-2 col-form-label">Email</label>
                                                            <div class="col-sm-10">
                                                              <input type="email" class="form-control" name="email" id="inputPassword3"  required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                                <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                                                                <div class="col-sm-10">
                                                                        <input type="password" class="form-control" name="password" id="inputPassword3"  required>
                                                                </div>
                                                        </div>
                                                        <div class="form-group row">
                                                                <label for="inputPassword3" class="col-sm-2 col-form-label">Company</label>
                                                                <div class="col-sm-10">
                                                                        <select class="form-control" name="cid" id="inputPassword3"  required>
                                                                                <option value="0">Select...</option>
                                                                                <?php $__currentLoopData = $company; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                        <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </select>
                                                                </div>
                                                        </div>
                                                        <input type="hidden" name="type" value="e"/>
                                                        <div class="form-group row">
                                                                <label for="inputPassword3" class="col-sm-2 col-form-label">Employee type</label>
                                                                <div class="col-sm-10">
                                                                        <select class="form-control" name="role" id="inputPassword3"  required>
                                                                                <option value="Registered">Registered User</option>
                                                                                <option value="Customer" selected>Customer</option>
                                                                                <option value="Subcriber">Subscriber</option>
                                                                                <option value="Admin">Admin</option>
                                                                                
                                                                        </select>
                                                                </div>
                                                        </div>
                                                                
                                                        <div class="form-group row">
                                                            <div class="col-sm-10">
                                                              <button type="submit" class="btn btn-primary">Add</button>
                                                            </div>
                                                        </div>
                                                        
                                  </form>
                  
                                </div>
                              </div>
                      </div>
            
            
    
<?php $__env->stopSection(); ?>
        
<?php echo $__env->make('layouts.s_admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>