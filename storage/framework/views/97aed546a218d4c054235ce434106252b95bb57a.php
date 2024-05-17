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
              <a href="<?php echo e(URL::to('/')); ?>">Dashboard</a>
            </li>
            <!-- <li class="breadcrumb-item">SFTP</li> -->
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
                      <th>Sno</th>
                      <th>Url</th>
                      <th>username</th>
                      <th>Password</th>
                      <th>Port</th>
                      <!--<th>Created On</th>-->
                         
                    </tr>
                  </thead>
                  <tbody>
                      <?php $i=1;?>
                     <?php $__currentLoopData = $ftps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ftp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($ftp->status == 1): ?>
                          <tr>
                              <td><?php echo e($i++); ?></td>
                              <td><?php echo e($ftp->ftp_url); ?></td>
                              <td><?php echo e($ftp->ftp_username); ?></td>
                              <td><?php echo e($ftp->ftp_pass); ?></td>
                              <td><?php echo e($ftp->ftp_port); ?></td>
                              <!--<td><?php echo e(date("d-M-Y",strtotime($ftp->created_at))); ?></td>-->
                          </tr>
                        <?php else: ?>
                        <tr class="alert-info">
                            <td><?php echo e($i++); ?></td>
                            <td><?php echo e(__('Request pending')); ?></td>
                            <td><?php echo e($ftp->ftp_username); ?></td>
                            <td><?php echo e($ftp->ftp_pass); ?></td>
                            <td><?php echo e($ftp->ftp_port); ?></td>
                            <!--<td><?php echo e(date("d-M-Y",strtotime($ftp->created_at))); ?></td>-->
                        </tr>
                        <?php endif; ?>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  </tbody>
                </table>
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