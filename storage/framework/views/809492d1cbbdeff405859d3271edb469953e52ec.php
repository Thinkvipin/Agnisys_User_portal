<?php $__env->startSection('content'); ?>


<?php echo $__env->make('admin.includes.ag-header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div id="wrapper">


        <?php echo $__env->make('admin.includes.side', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        
        <div id="content-wrapper">

                <div class="container-fluid">

                        

                        <?php echo $__env->yieldContent('sContent'); ?>
                        

                </div>
                <!-- /.container-fluid -->

                <?php echo $__env->make('admin.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        </div>
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
                        <div class="modal-body">Are you Sure?</div>
                        <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-danger" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
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


<?php $__env->startSection('custom_css'); ?>
<style>
        @media (min-width: 768px) {

                .CodeMirror,
                .CodeMirror-scroll {
                        min-height: 150px !important;
                }
        }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom_js'); ?>

        <?php echo $__env->yieldContent('s_js'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>