              
<?php $__env->startSection('sContent'); ?>
    

              <!-- Breadcrumbs-->
          <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                          <a href="<?php echo e(URL::to('/')); ?>">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Requested Users</li>
                      </ol>
            
                      
                      <div class="alert alert-primary" role="alert">
                            Press user slash button to allow new request user to authenticate 
                          </div>
                      <!-- DataTables Example -->
                      <div class="card mb-3">
                        <div class="card-header">
                          <i class="fas fa-table"></i>
                        Requested Users <button style="margin-bottom: 10px" class="btn btn-primary delete_all" data-url="<?php echo e(url('user-deleteall')); ?>" >Delete All Selected</button></div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                <tr>
                                    <th></th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>email</th>
                                    <th>company</th>
                                    <th>Role</th>
                                    <th>Action</th>

                                </tr>
                              </thead>
                              
                              <tbody>
                                  <?php $i =1; ?>
                                  <?php $__currentLoopData = $employeesAll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <tr>
                                     <td><input type="checkbox" name="ids" class="checkBoxClass sub_chk" value="<?php echo e($employee->id); ?>"></td>
                                     <td><?php echo e($i++); ?></td>
                                     <td><?php echo e(ucwords($employee->name)); ?></td>
                                     <td><?php echo e($employee->email); ?></td>
                                     <td>
                                        <?php $__currentLoopData = $cmps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($c->id == $employee->cid): ?>
                                             <?php echo e(ucwords($c->name)); ?>

                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                     <td><?php echo e($employee->role); ?></td>
                                     <td>
                                        
                                        <a class="btn bg-danger" href="<?php echo e(URL::to('dashboard/delete-employee')); ?>/<?php echo e($employee->id); ?>"><i class="fas fa-trash-alt"></i></a>
                                        <a class="btn bg-danger" href="<?php echo e(URL::to('dashboard/edit-employee')); ?>/<?php echo e($employee->id); ?>"><i class="fas fa-pencil-alt"></i></a>
                                        <?php if($employee->status == true): ?>
                                          <a href="<?php echo e(URL::to('dashboard/disable-employee')); ?>/<?php echo e($employee->id); ?>" class="btn btn-success bg-success"><i class="fas fa-user-alt"></i></a></td>
                                        <?php else: ?> 
                                          <a href="<?php echo e(URL::to('dashboard/enable-employee')); ?>/<?php echo e($employee->id); ?>" class="btn btn-danger bg-danger"><i class="fas fa-user-alt-slash"></i></a></td>
                                        <?php endif; ?>
                                   </tr>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                                
                                
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
<!-- loader style -->
<style>
.main-loader{
position: fixed;
  left: 0px;
  top: 0px;
  width: 100%;
  height: 100%;
  z-index: 9999;
  background:rgb(0 0 0 / 70%);
  display:none;
}
.loader {
  position:absolute;
  left:50%;
  top:50%;
  
  border: 6px solid #f3f3f3;
  border-radius: 50%;
  border-top: 6px solid #ec4d1b;
  width: 50px;
  height:50px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes  spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>        
<div class="main-loader"><div class="loader"></div></div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script>
$(document).ready(function () {
    $('.delete_all').on('click', function(e) {


            var allVals = [];  
            $(".sub_chk:checked").each(function() {  
                allVals.push($(this).val());
            });  


            if(allVals.length <=0)  
            {  
                alert("Please select row.");  
            }  else {  
                
                var check = confirm("Are you sure you want to delete this row?");  
                if(check == true){  

                    $(".main-loader").fadeIn();
                    var join_selected_values = allVals.join(","); 

                    
                    $.ajax({
                       type: "POST",
                       data: {ids:join_selected_values, _token: '<?php echo e(csrf_token()); ?>'},
                       headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
                       url: "https://www.portal.agnisys.com/dashboard/s/user-deleteall",
                       success: function(data){
                          // create an object with the key of the array
                          
                         if(data['success']){
                            $(".main-loader").fadeOut();
                            $(".sub_chk:checked").each(function() {  
                                $(this).parents("tr").remove();
                            });
                            alert(data['success']);
                            
                            if(data['success']){
                               location.reload(); 
                            }
                         }else if (data['error']) {
                            $(".main-loader").fadeOut();
                            alert(data['error']);
                         } else {
                            $(".main-loader").fadeOut();
                            alert(data);
                            alert('Whoops Something went wrong!!');
                         }
                       },
                       error: function (data) {
                            alert(data.responseText);
                        }
                    });
                }  
            }  
    });
});
</script> 
    
<?php $__env->stopSection(); ?>


        
<?php echo $__env->make('layouts.s_admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>