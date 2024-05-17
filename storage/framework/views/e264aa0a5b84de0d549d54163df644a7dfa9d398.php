              
<?php $__env->startSection('sContent'); ?>
    

              <!-- Breadcrumbs-->
          <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="<?php echo e(URL::to('/')); ?>">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">All Discussions</li>
            </ol>

          
          <!-- <div class="card mb-3">
            <div class="card-header">
                <div class="row">
                  <div class="col-md-4">
                      
                  </div>
                </div>
                
            </div>
          </div> -->
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              All Discussion
              <select id="cmp">
                  <option vlaue="0">Select Company...</option>
                  <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option vlaue="<?php echo e($c->id); ?>"><?php echo e($c->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>Topic</th>
                        <th>Company</th>
                        <th>Label</th>
                        <th>Priority</th>
                        <th>Status</th>
                        <th>Start date</th>
                        <th>Assigned To</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    <?php $__currentLoopData = $issues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $issue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><a href="<?php echo e(URL::to('dashboard/s/single-issue/'.$issue->id.'/'.$issue->cid)); ?>" target="_blank" ><?php echo e($issue->topic); ?></a></td>
                            <td>
                              <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($c->id == $issue->cid): ?>
                                  <?php echo e(ucwords($c->name)); ?>

                                <?php endif; ?>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                            <td><?php echo e($issue->label); ?></td>
                            <td><?php echo e($issue->priority); ?></td>
                            <td><?php echo e($issue->status); ?></td>
                            <td><?php echo e(date("d-M-Y",strtotime($issue->created_at))); ?></td>
                            <td>
                              <?php if( $issue->assigns != null && $issue->assigns !=  'N;'): ?>
                                  <?php $assgning = unserialize($issue->assigns);?>
                                  <?php $__currentLoopData = $assgning; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <?php if($u->id == $item): ?>
                                            <?php echo e($u->username.', '); ?>

                                          <?php endif; ?>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <?php endif; ?>
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

    $("#cmp").on("change",function(){
        var cid = $(this).val();
        console.log(cid);
        var url= "<?php echo e(URL::to('dashboard')); ?>/s/cmp-issues/"+cid; 
        window.location = url;
    });
    

$("#med").mention({
				users: <?php echo json_encode($users); ?>//[{
				// 	name: 'Lindsay Made',
				// 	username: 'LindsayM'
				// }, {
				// 	name: 'Rob Dyrdek',
				// 	username: 'robdyrdek'
				// }, {
				// 	name: 'Rick Bahner',
				// 	username: 'RickyBahner'
				// }, {
				// 	name: 'Jacob Kelley',
				// 	username: 'jakiestfu'
				// }, {
				// 	name: 'John Doe',
				// 	username: 'HackMurphy'
				// }, {
				// 	name: 'Charlie Edmiston',
				// 	username: 'charlie'
				// }, {
				// 	name: 'Andrea Montoya',
				// 	username: 'andream'
				// }, {
				// 	name: 'Jenna Talbert',
				// 	username: 'calisunshine'
				// }, {
				// 	name: 'Street League',
				// 	username: 'streetleague'
				// }, {
				// 	name: 'Loud Mouth Burrito',
				// 	username: 'Loudmouthfoods'
				// }]
			});

      
</script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.s_admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>