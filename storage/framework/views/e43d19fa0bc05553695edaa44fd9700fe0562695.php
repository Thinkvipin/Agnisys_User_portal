

              
<?php $__env->startSection('sContent'); ?>
    

              <!-- Breadcrumbs-->
          <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                          <a href="<?php echo e(URL::to('/')); ?>">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">All Notifications</li>
                      </ol>
            
                      
                      
                      <!-- DataTables Example -->
                      <div class="card mb-3">
                        <div class="card-header">
                          <i class="fas fa-table"></i>
                        All Notifications</div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                                        <tr>
                                                            <th>SNo</th>
                                                            <th>Topic</th>
                                                            <th>Type</th>
                                                            <th>date</th>
                                                            <th>Action</th>
                                                            
                                                        </tr>
                                                      </thead>
                                                      
                                                      <tbody>
                                                        <?php $i = 0;?>
                                                        <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                          
                                                         
                                                                <tr >
                                                                    <td><?php echo e(++$i); ?></td>
                                                                    
                                                                    <td><a href="<?php echo e(URL::to('dashboard/notification/'.$notification->id)); ?>">
                                                                      
                                                                        <?php echo e($notification->title); ?>

                                                                      
                                                                      </a>
                                                                    </td>
                                                                    <td>
                                                                      <?php if($notification->type == 'danger'): ?>
                                                                        <?php echo e(__('Global')); ?>

                                                                      <?php else: ?>
                                                                        
                                                                        <?php if(isset($notification->companies) && $notification->companies != null): ?> 
                                                                            <?php $clist = unserialize($notification->companies);
                                                                              $cmps = \App\company::select('name')->whereIn('id',$clist)->get();
                                                                              foreach($cmps as $c)
                                                                              {
                                                                                echo $c->name.'<br>';
                                                                              }
                                                                            ?> 
                                                                        <?php endif; ?>

                                                                      <?php endif; ?>
                                                                    </td>
                                                                  
                                                                    <td><?php echo e(date("d-M-Y",strtotime($notification->created_at))); ?></td>
                                                                    <td>
                                                                        <a class="btn bg-success" href="<?php echo e(URL::to('dashboard/s/edit-notification')); ?>/<?php echo e($notification->id); ?>"><i class="fas fa-pencil-alt"></i></a>
                                                                        <a class="btn bg-danger" href="<?php echo e(URL::to('dashboard/s/delete-notification')); ?>/<?php echo e($notification->id); ?>"><i class="fas fa-trash-alt"></i></a>
                                                                        <a class="btn" href="<?php echo e(URL::to('dashboard/s/notification/'.$notification->id)); ?>"><i class="far fa-eye"></i></a>
                                                                    </td>
                                                                </tr>
                                                             
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        
                                                        
                                                        
                                                      </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
            
            
    
<?php $__env->stopSection(); ?>
        

<?php $__env->startSection('custom_js'); ?>
<script>
 
 function cmp(){
    
    
      $("[class=clist]").each(function(){

        var clist = $(this).html();
        var ele = $(this);

        $.get( "<?php echo e(URL::to('api/company-list')); ?>?cmps="+clist, function( data ) {
          console.log("<?php echo e(URL::to('api/company-list')); ?>?cmps="+clist);
          ele.html(data);
        });

      });
 
  
 }
 cmp();

</script>

                     

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.s_admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>