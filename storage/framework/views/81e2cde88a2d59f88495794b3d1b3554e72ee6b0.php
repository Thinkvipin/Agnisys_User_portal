

<?php $__env->startSection('sContent'); ?>


<!-- Breadcrumbs-->
<ol class="breadcrumb">
        <li class="breadcrumb-item">
                <a href="<?php echo e(URL::to('/')); ?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Create</li>
</ol>



<!-- DataTables Example -->
<div class="card mb-3">
        <div class="card-header">
                <i class="fas fa-table"></i>
                Create Notifications</div>
        <div class="card-body">

                <form method="post" action="<?php echo e(URL::to('dashboard/s/add-notification')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-group row">
                                <label for="fname" class="col-md-2 col-form-label text-md-right"><?php echo e(__('Title')); ?></label>

                                <div class="col-md-6">
                                        <input id="title" type="text" class="form-control<?php echo e($errors->has('fname') ? ' is-invalid' : ''); ?>"
                                                name="title" required autofocus>
                                </div>
                        </div>
                        <div class="form-group row">
                                <label for="text" class="col-md-2 col-form-label text-md-right"><?php echo e(__('Content')); ?></label>

                                <div class="col-md-6">
                                        <textarea id="add-notification" name="text" type="text" class="form-control"></textarea>
                                </div>
                        </div>
                        <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Select company</label>
                                <div class="col-sm-10">
                                        
                                    <ul class="list-group" style="width:50%;overflow-y:scroll;height:200px;">
                                        
                                        <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <li class="list-group-item d-flex justify-content-between align-items-center">
                                              
                                            <?php echo e(strtoupper($c['name'])); ?>

                                                
                                          <input class="" type="checkbox" name="companies[]" value="<?php echo e($c->id); ?>" />
                                          </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        
                                      </ul>
                                        
                                </div>
                        </div>
                        <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Select Groups</label>
                                <div class="col-sm-10">
                                        
                                    <ul class="list-group" style="width:50%;overflow-y:auto;height:100px;">
                                        
                                        <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <li class="list-group-item d-flex justify-content-between align-items-center">
                                              
                                            <?php echo e($c['name']); ?>

                                                
                                          <input class="" type="checkbox" name="groups[]" value="<?php echo e($c->id); ?>" />
                                          </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        
                                      </ul>
                                        
                                </div>
                        </div>
                        <div class="form-group row">
                                <label for="fname" class="col-md-2 col-form-label text-md-right"><?php echo e(__('Global')); ?></label>

                                <div class="col-md-6">
                                        <input type="checkbox" class="form-control<?php echo e($errors->has('fname') ? ' is-invalid' : ''); ?>"
                                                name="global"  >
                                </div>
                        </div>
                        <div class="form-group row">
                                <label for="fname" class="col-md-2 col-form-label text-md-right"><?php echo e(__(' ')); ?></label>
                                <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                        </div>
                </form>

        </div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('s_js'); ?>
<script>

tinymce.init({
  selector: 'textarea',  // change this value according to your HTML
  plugins : 'advlist autolink link image lists charmap print preview',
  images_upload_url: "<?php echo e(URL::to('upload')); ?>",
  height : "400",
//   images_upload_base_path: '/some/basepath',
//   images_upload_credentials: true,
  images_upload_handler: function (blobInfo, success, failure) {
      var xhr, formData;
      xhr = new XMLHttpRequest();
      xhr.withCredentials = false;
      xhr.open('POST', "<?php echo e(URL::to('upload')); ?>");
      xhr.onload = function() {
        var json;

        if (xhr.status != 200) {
          failure('HTTP Error: ' + xhr.status);
          return;
        }
        json = JSON.parse(xhr.responseText);

        if (!json || typeof json.location != 'string') {
          failure('Invalid JSON: ' + xhr.responseText);
          return;
        }
        success(json.location);
      };
      formData = new FormData();
      formData.append('_token', "<?php echo e(csrf_token()); ?>");
      formData.append('file', blobInfo.blob(), blobInfo.filename());
      xhr.send(formData);
      }
});

                // $(function() {
                //         $('#add-notification').froalaEditor({
                //                 toolbarInline: false,
                //                 charCounterCount: true,
                //                 toolbarButtons: ['bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', '|', 
                //                                 'fontFamily', 'fontSize', 'color', 'inlineStyle', 'inlineClass', 'clearFormatting', '|', 
                //                                 'fontAwesome', '-', 'paragraphFormat', 'lineHeight', 'paragraphStyle', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', 'quote', '|', 
                //                                 'insertLink', 'insertImage', 'insertVideo', 'insertFile', 'insertTable', '-', 'insertHR', 'selectAll',  'print', 'help', 'html', 'fullscreen', '|', 
                //                                 'undo', 'redo'],
                //                 toolbarVisibleWithoutSelection: true,
                //                 heightMin: 200,
                        
                //         })
                // });

                
        
        </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.s_admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>