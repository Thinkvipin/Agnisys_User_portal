<?php $__env->startSection('content'); ?>



<?php echo $__env->make('admin.includes.ag-header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
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
              <a href="<?php echo e(URL::to('/')); ?>">Dashboard </a>
            </li>
            <li class="breadcrumb-item active">Company profile</li>
          </ol>

          
          
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Company profile</div>
            <div class="card-body">
              <div class="row">
                  <div class="col-12 col-md-6">
                        <form action="<?php echo e(URL::to('dashboard/s/edit')); ?>" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                
                                        <input type="hidden" name="refId" value="<?php echo e(session::get('refId')); ?>"/>
                                        <input type="hidden" name="id" value="<?php echo e($company[0]->id); ?>"/>
                                        <input type="hidden" name="name" value="<?php echo e($company[0]->name); ?>"/>
                                        <input type="hidden" name="address" value="a"/>
                                        <input type="hidden" name="phone" value="99"/>
                                        <div class="form-group ">
                                                <label for="inputEmail3" class="">Company name</label>
                                                <div class="col-sm-12">
                                                <input type="text" class="form-control" name="" value="<?php echo e($company[0]->name); ?>" id="inputEmail3" style="text-transform: capitalize;" disabled>
                                                </div>
                                        </div>
                                        <div class="form-group ">
                                                <label for="inputEmail3" class="">Finance Contact</label>
                                                <div class="col-sm-12">
                                                <input type="text" class="form-control" name="fContact" value="<?php echo e($company[0]->finance_contact); ?>" id="inputEmail3"  >
                                                </div>
                                        </div>
                                        <div class="form-group ">
                                                <label for="inputPassword3" >Technical Contact</label>
                                                <div class="col-sm-12">
                                                <input type="text" class="form-control" name="techContact" value="<?php echo e($company[0]->technical_contact); ?>" id="inputPassword3" >
                                                </div>
                                        </div>
                                        <div class="form-group ">
                                                <label for="inputPassword3" class="">License SW Contact</label>
                                                <div class="col-sm-12">
                                                <input type="text" class="form-control" name="swContact" value="<?php echo e($company[0]->license_sw_contact); ?>" id="inputPassword3" >
                                                </div>
                                        </div>
                                        <div class="form-group">
                                                <label for="inputPassword3" class="">Current Logo</label>
                                                <div class="col-sm-12">
                                                  <?php if($company[0]->logo != null && $company[0]->logo != ''): ?>
                                                    <img src="<?php echo e(asset('public/logo_files')); ?>/<?php echo e($company[0]->logo); ?>" style="width:auto;height:100px;"/>
                                                  <?php else: ?>
                                                    No logo selected
                                                  <?php endif; ?>
                                                  </div>
                                        </div>
                                        <div class="form-group">
                                                <label for="inputPassword3" class="">Upload Logo</label>
                                                <div class="col-sm-12">
                                                        <input type="file" class="form-control" name="logo" id="inputPassword3"  >
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                                <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                        </div>
                                              
                        </form>
                  </div>
                  <div class="col-12 col-md-6">
                      <h3>Users</h3>
                      <!-- <a class="btn btn-primary" href="<?php echo e(URL::to('dashboard')); ?>/add-employee">Add user request </a> -->
                      <div style="max-height:300px;overflow-y:auto;margin-top:1em;">
                          <ul class="list-group">
                              <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <li class="list-group-item"><?php echo e($user->email); ?></li>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </ul>
                      </div>
                      <h3>Products</h3>
                      <div style="max-height:300px;overflow-y:auto;">
                          <ul class="list-group">
                              <?php $__currentLoopData = $licenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                <li class="list-group-item">
                                    <?php
                                    $pods = unserialize($l->pid);
                                    foreach($pods as $p){
                                        foreach($products as $product){
                                            if($product->id == $p)
                                                echo $product->name.', ';
                                        }
                                        
                                    }
                                    ?>
                                </li>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </ul>
                          
                      </div>
                      <h3>Licenses</h3>
                      <div style="max-height:300px;overflow-y:auto;">
                          <ul class="list-group">
                              <?php $__currentLoopData = $licenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                          <li class="list-group-item">
                              <?php
                              $pods = unserialize($l->pid);
                              $expiryDate = unserialize($l->validity_date);
                              $quantity = unserialize($l->quantity);
                              $i = 0;
                              foreach($pods as $p){
                                    foreach($products as $product){
                                        if($product->id == $p)
                                            echo $product->name.', ';
                                    }
                                    echo " Qty - ".$quantity[$i].", ";
                                    echo " ".$expiryDate[$i]."<br>";
                                   $i++; 
                                }
                              ?>
                              <!--<?php echo e($l->pid.' | '.$l->validity_date.' | Quantity - '.$l->quantity); ?>-->
                              
                          </li>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </ul>
                      </div>
                  </div>
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