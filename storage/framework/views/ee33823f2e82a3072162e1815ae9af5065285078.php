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
            <li class="breadcrumb-item active"><?php echo e(ucwords($data['company'])); ?> - <b>Open cases  </b></li>
            
          </ol>
          
          <?php $CaseCount = 0; 
          
          
          if(isset($obj->data->cases)){
          ?>
                    <?php $__currentLoopData = $obj->data->cases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $case): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $mail = explode('<',$case->sCustomerEmail);
                       
                          $companyName = '';
                              try{
                                $website = explode('@',$mail[1]);
                                $company = explode('.',$website[1]);
                                // echo '<b>'.$company[0].'</b>';
                                $companyName = $company[0];
                                
                              }
                              catch(Exception $e) {
                              }
                              $domainarray = strtolower(Session::get('domain'));
                              $DomainArray = explode(",",$domainarray);
                              
                            if($domainarray != ''){
                              for($i=0;$i < count($DomainArray);$i++){
                              
                          ?>
                                  <?php if(strtolower($companyName) == $DomainArray[$i] && $DomainArray[$i] != strtolower(Session::get('company'))): ?>
                                    <?
                                    //   $CaseCount++;
                                      
                                    ?>
                                  <?php endif; ?>
                                  <?php if(strtolower($companyName) == $DomainArray[$i] && $DomainArray[$i] == strtolower(Session::get('company'))): ?>
                                    <?
                                    //   $CaseCount++;
                                      
                                    ?>
                                  <?php endif; ?>
                          <?
                              }
                            }
                          ?>  
                                  <?php if(strtolower($companyName) == strtolower(Session::get('company'))): ?>
                                    <?
                                      
                                      $CaseCount++;
                                      
                                    ?>
                                  <?php endif; ?>
                              
                          <?      
                          ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php
            }
            
            ?>
          
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
            All Cases ( <?php 
                            if(isset($obj->data->cases)){
                                echo $CaseCount; 
                                
                            }
                        ?> )
            
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>Case ID</th>
                        <!-- <th>Label</th> -->
                        <th>Topic</th>
                        <!-- <th>Priority</th> -->
                        <th>Status</th>
                        <th>Start date</th>
                        <!-- <th>Assigned To</th> -->
                    </tr>
                  </thead>
                  
                  <tbody>
                    <?
                    if(isset($obj->data->cases)){
                    ?>
                           <?php $__currentLoopData = $obj->data->cases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $case): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $mail = explode('<',$case->sCustomerEmail);
                                  $companyName = '';
                                      try{
                                        $website = explode('@',$mail[1]);
                                        $company = explode('.',$website[1]);
                                        // echo '<b>'.$company[0].'</b>';
                                        $companyName = $company[0];
                                      }
                                      catch(Exception $e) {
                                      }
                                    //   echo $companyName;

                                      $domainarray = strtolower(Session::get('domain'));
                                      $DomainArray = explode(",",$domainarray);
                                      //echo Session::get('domain');
                                  ?>
                                 
                                  <?php
                                  if($domainarray != ''){
                                    
                                    for($i=0;$i < count($DomainArray);$i++){  

                                        
                                  ?>

                                          <?php if(strtolower($companyName) == $DomainArray[$i] && $DomainArray[$i] != strtolower(Session::get('company'))): ?>
                                            <tr value="array!=company">
                                              <td><?php echo e($case->ixBug); ?></td>
                                              <!-- <td><?php echo e($case->sCategory); ?> <?php echo e($case->ixCategory); ?></td> -->
                                              <td><a href="https://agnisys.manuscript.com/default.asp?<?php echo e($case->sTicket); ?>" target="_blank"><?php echo e($case->sTitle); ?></a></td>
                                              <!-- <td><?php echo e($case->ixPriority); ?>-<?php echo e($case->sPriority); ?></td> -->
                                              <td><?php echo e($case->sStatus); ?></td>
                                              <td><?php $dt = explode('T',$case->dtOpened);echo $dt[0];?></td>
                                              <!-- <td><?php echo e($case->sPersonAssignedTo); ?></td> -->
                                            </tr>
                                          <?php endif; ?>
                                          <?php if(strtolower($companyName) == $DomainArray[$i] && $DomainArray[$i] == strtolower(Session::get('company'))): ?>
                                            <tr value="array=company">
                                              <td><?php echo e($case->ixBug); ?></td>
                                              <!-- <td><?php echo e($case->sCategory); ?> <?php echo e($case->ixCategory); ?></td> -->
                                              <td><a href="https://agnisys.manuscript.com/default.asp?<?php echo e($case->sTicket); ?>" target="_blank"><?php echo e($case->sTitle); ?></a></td>
                                              <!-- <td><?php echo e($case->ixPriority); ?>-<?php echo e($case->sPriority); ?></td> -->
                                              <td><?php echo e($case->sStatus); ?></td>
                                              <td><?php $dt = explode('T',$case->dtOpened);echo $dt[0];?></td>
                                              <!-- <td><?php echo e($case->sPersonAssignedTo); ?></td> -->
                                            </tr>
                                          <?php endif; ?>
                                  <?
                                    }
                                  }
                                  else{
                                  ?>
                                  
                                        <?php if(strtolower($companyName) == strtolower(Session::get('company'))): ?>
                                            <tr value="company">
                                              <td><?php echo e($case->ixBug); ?></td>
                                              <!-- <td><?php echo e($case->sCategory); ?> <?php echo e($case->ixCategory); ?></td> -->
                                              <td><a href="https://agnisys.manuscript.com/default.asp?<?php echo e($case->sTicket); ?>" target="_blank"><?php echo e($case->sTitle); ?></a></td>
                                              <!-- <td><?php echo e($case->ixPriority); ?>-<?php echo e($case->sPriority); ?></td> -->
                                              <td><?php echo e($case->sStatus); ?> <input type="hidden" value="<?php echo e($case->sCustomerEmail); ?>"> </td>
                                              <td><?php $dt = explode('T',$case->dtOpened);echo $dt[0];?></td>
                                              <!-- <td><?php echo e($case->sPersonAssignedTo); ?></td> -->
                                            </tr>
                                        <?php endif; ?>
                                  <?php
                                  }
                                  ?>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    }
                    else{
                    ?>
                        <tr class="odd"><td valign="top" colspan="4" class="dataTables_empty">Fogbugz Error, Please go to <a href="<?php echo e(URL::to('dashboard')); ?>">Dashboard</a> to get all pages</td></tr>
                     
                    <?php   
                        
                    }
                    ?>
                    
                    
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