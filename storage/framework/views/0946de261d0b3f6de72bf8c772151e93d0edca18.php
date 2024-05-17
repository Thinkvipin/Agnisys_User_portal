

              
<?php $__env->startSection('sContent'); ?>
    

                       <!-- Breadcrumbs-->
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                          <a href="<?php echo e(URL::to('/')); ?>">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">All products</li>
                      </ol>
                      <!-- DataTables Example -->
                      <div class="card mb-3">
                        <div class="card-header">
                          <i class="fas fa-table"></i>
                        All products</div>
                        <div class="card-body">

                        <style>
                        .b1{
                          position:absolute;
                          right:10px;
                          top:5px;
                        }
                        .b2{
                          position:absolute;
                          right:60px;
                          top:5px;
                        }
                        .list-group-item:hover{
                          background:#ccc;
                        }</style>
                        <ul class="list-group">
                        <?php   
                            function display($pods){
                                    // print_r($cats);
                                    foreach ($pods as $pod){
                                            if(isset($pod->name)){
                                                    echo '<li class="list-group-item" style="margin-left:';
                                                            //for($i=0;$i<$pod->indent;$i++){
                                                                    echo $pod->indent;
                                                            //}
                                                          
                                                    echo 'em;">'.$pod->name;
                                                    echo '<a class="btn bg-success b2" href="'.url('dashboard/s/edit-product').'/'.$pod->id.'"><i class="fas fa-pencil-alt"></i></a>
                                                    <a class="btn bg-danger b1" href="'.url('dashboard/s/delete-product').'/'.$pod->id.'"><i class="fas fa-trash-alt"></i></a>';
                                                    echo '</li>';
                                            }
                                            display($pod->childs);
                                    }
                            }
                            display(json_decode($pods));
                          ?>
                          </ul>

                          <!-- <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>parent</th>
                                    <th>Action</th>
                                </tr>
                              </thead>
                              <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>parent</th>
                                    <th>Action</th>
                                </tr>
                              </tfoot>
                              <tbody>
                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($product->id); ?></td>
                                            <td><?php echo e($product->name); ?></td>
                                            <td><?php echo e($product->parent); ?></td>
                                            <td>
                                                <a class="btn bg-success" href="<?php echo e(URL::to('dashboard/s/edit-product')); ?>/<?php echo e($product->id); ?>"><i class="fas fa-pencil-alt"></i></a>
                                                <a class="btn bg-danger" href="<?php echo e(URL::to('dashboard/s/delete-product')); ?>/<?php echo e($product->id); ?>"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </tbody>
                            </table>
                          </div> -->
                        </div>
                      </div>
            
            
    
<?php $__env->stopSection(); ?>
        
<?php echo $__env->make('layouts.s_admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>