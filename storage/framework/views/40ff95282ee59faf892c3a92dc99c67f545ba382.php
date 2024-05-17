<?php $__env->startSection('content'); ?>



<?php echo $__env->make('admin.includes.ag-header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
    <div id="wrapper">

        
         <?php if(Session::get('role') == 'customer' || Session::get('role') == 'Customer' || Session::get('role') == 'Registered' || Session::get('role') == 'registered' ): ?>
          <?php echo $__env->make('admin.includes.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php else: ?>
          <?php echo $__env->make('admin.includes.sidebar1', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>
        <?php
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
              <a href="<?php echo e(URL::to('/')); ?>">Dashboard</a>
            </li>
            <!-- <li class="breadcrumb-item">SFTP</li> -->
            <li class="breadcrumb-item active">FTP/SFTP Request</li>
          </ol>

          
          
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
                 If you want an SFTP account please send the request by click on the Send Request button
            </div>
            <div class="card-body">
              <div class="table-responsive">
                        <form action="<?php echo e(URL::to('dashboard')); ?>/ftp-request" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                
                                        <input type="hidden" name="cid" value="<?php echo e(session::get('cid')); ?>"/>
                                        <input type="hidden" name="uid" value="<?php echo e(session::get('uid')); ?>"/>
                                        
                                        <div class="form-group row">
                                                <div class="col-sm-10">
                                                        <button type="submit" class="btn btn-primary">Send Request</button>
                                                </div>
                                        </div>
                                              
                        </form>
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