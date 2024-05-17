              
<?php $__env->startSection('sContent'); ?>
    

              <!-- Breadcrumbs-->
          <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                        <a href="<?php echo e(URL::to('/')); ?>">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">All Cases</li>
                      </ol>
            
                      
                      
                      <!-- DataTables Example -->
                      <div class="card mb-3">
                        <div class="card-header">
                          <i class="fas fa-table"></i>
                        All Cases  <?php
                                    if(isset($obj->data->cases)){    
                                    ?>
                                        (<?php echo e($obj->data->count); ?> )</div>
                                    <?php
                                    }
                                    ?>
                                    
                        
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                <tr>
                                    <th>Case ID</th>
                                    <!--<th>Label</th>-->
                                    <th>Topic</th>
                                    <th>Company</th>
                                    <th>Priority</th>
                                    <th>Status</th>
                                    <th>Start date</th>
                                    <th>Assigned To</th>
                                </tr>
                              </thead>
                              
                              <tbody>
                               <?php
                               if(isset($obj->data->cases)){
                               ?> 
                                       <?php $__currentLoopData = $obj->data->cases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $case): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                              <td><?php echo e($case->ixBug); ?></td>
                                              <!--<td><?php echo e($case->sCategory); ?> <?php echo e($case->ixCategory); ?></td>-->
                                              <td><a href="https://agnisys.manuscript.com/default.asp?<?php echo e($case->sTicket); ?>" target="_blank"><?php echo e($case->sTitle); ?></a></td>
                                              <td>
                                                <?php 
                                                $mail = explode('<',$case->sCustomerEmail);
                                                try{
                                                   $website = explode('@',$mail[1]);
                                                   $company = explode('.',$website[1]);
                                                   echo "<span class='capitalise'> ".$company[0]."</span>";
                                                }
                                                catch(Exception $e) {
                                                  echo 'Message: ' .$e->getMessage();
                                                }
                                               
                                                ?>
                                              </td>
                                              <td><?php echo e($case->ixPriority); ?>-<?php echo e($case->sPriority); ?></td>
                                              <td><?php echo e($case->sStatus); ?></td>
                                              <td><?php $dt = explode('T',$case->dtOpened);echo $dt[0];?></td>
                                              <td><?php echo e($case->sPersonAssignedTo); ?></td>
                                            </tr>
                                           
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                                <?php
                                }
                                else{
                                ?>
                                    <tr class="odd"><td valign="top" colspan="7" class="dataTables_empty">Fogbugz API Logoff, Please go to <a href="<?php echo e(URL::to('dashboard')); ?>"><u>Dashboard</u></a> to get all Cases</td></tr>
                                 
                                <?php   
                                    
                                }
                                ?>
                                
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
            
            
    
<?php $__env->stopSection(); ?>
        
<?php echo $__env->make('layouts.s_admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>