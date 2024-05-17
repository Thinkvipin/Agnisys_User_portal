    

<?php $__env->startSection('sContent'); ?>


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-VEZ8CTXCHW"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-VEZ8CTXCHW');
</script>
           
              <div class="container">
                <div class="row">
                    <div class="col-md-12" style="padding:0px;"> 
                      <h3><?php echo e(ucwords($data['company'])); ?></h3>
                      <?php if(isset($data['logo']) ): ?>
                        <img src="<?php echo e(asset('public/logo_files')); ?>/<?php echo e(Session::get('logo')); ?>"  style="
                        position: absolute;
                        right: 0px;
                        top: 19px;
                        height: 50px;" />
                      <?php endif; ?>
                    </div> 
                </div>
                
                <script src="<?php echo e(asset('js/showdown.min.js')); ?>"></script>
                <?php if(isset($globalNoti[0])): ?>
                <div class="row">
                  <div class="col-md-12 paper-1" style="min-height:70px;">
                      <div class="notification">
                        <div class="notification-header">
                          
                          
                        </div>
                        <div class="notification-body" >
                        <h3 class="black"><?php echo e(@$globalNoti[0]->title); ?></h3>
                        
                        <p class="white">
                            <?php if(isset($globalNoti[0])): ?>
                              <?php echo $globalNoti[0]->text;?>
                            <?php endif; ?>
                            <!-- <script>
                              var converter = new showdown.Converter();
                              var md = ``;
                                var html = converter.makeHtml(md);
                                document.write(html);
                            </script> -->
                          </p>
                        </div>
                        <div class="notification-footer"></div>
                      </div>
                  </div>
                </div>
                <?php endif; ?>
                <br>
                
               
                  <br>
                  
                  <div class="row justify-content-center">
                      <div class="col-md-12 paper-1" style="margin-left:0em;">
                      <h4>Open Cases</h4><a href="<?php echo e(URL::to('dashboard/cases')); ?>" class="btn-round" style="position:absolute;top:25px;right:10px;">View More</a>
                          <ul class="list-group list-group-flush" style="height:300px;overflow-y:auto;">
                            

                              <?php 
                                
                                if(isset($fb_cases->data->cases)){
                                  $reversed = $fb_cases->data->cases;
                                  if($reversed != ""){
                                     
                                   
                                      
                                   ?>
                                   
                                   
                                            <?php $__currentLoopData = $fb_cases->data->cases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $case): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <a href="https://agnisys.manuscript.com/default.asp?<?php echo e($case->sTicket); ?>" target="_blank">
                                              <li class="list-group-item" style="font-size:12px;" >
                                                <span class="circle text-center" style="color:azure;">
                                                  <i class="fas fa-envelope "></i>
                                                </span>&nbsp;
                                              <b><?php echo e($case->sTitle); ?></b>
                                                <br>
                                              <span style="font-size:10px;margin-left:1em;"><?php echo date_format( date_create($case->dtOpened), 'M-d-Y h:i A' ); ?> | <?php 
                                                $mail = explode('<',$case->sCustomerEmail);
                                                try{
                                                   $website = explode('@',$mail[1]);
                                                   $company = explode('.',$website[1]);
                                                   echo '<b>'.$company[0].'</b>';
                                                }
                                                catch(Exception $e) {
                                                }
                                                ?></span>
                                              <span class="badge badge-primary badge-pill badge-point">
                                                <?php if($case->ixCategory == 1): ?>
                                                <i class="fas fa-bug"></i>
                                                <?php else: ?>
                                                    <?php if($case->ixCategory == 2): ?>
                                                    <i class="fas fa-lightbulb"></i>
                                                    <?php else: ?>
                                                    <i class="fas fa-envelope "></i>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                              </span>
                                              <span class="badge badge-primary badge-pill badge-point1"><?php echo e($case->ixPriority); ?></span>
                                              </li>
                                            </a>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          
                                          
                                   <?
                                  }
                                }
                                else{
                                    Session([
                                        'key' => '',
                                        'fogbugz' => ''
                                        ]);
                                   echo "Fogbugz API error. Refresh the page to get the Fogbugz cases";
                                }
                              
                              ?>


                              
                              
                            </ul>
                      </div>
                      
                  </div>
                  <br>
                  
                  
                  <br>
                 
                  <br>
    
              </div><!--container-->
            
    
<?php $__env->stopSection(); ?>
        
<?php $__env->startSection('s_js'); ?>

<script>
$(function() {
        // $('#add-notification').froalaEditor({
        //         toolbarInline: false,
        //         charCounterCount: true,
        //         toolbarButtons: ['bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', '|', 
        //                         'fontFamily', 'fontSize', 'color', 'inlineStyle', 'inlineClass', 'clearFormatting', '|', 
        //                         'fontAwesome', '-', 'paragraphFormat', 'lineHeight', 'paragraphStyle', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', 'quote', '|', 
        //                         'insertLink', 'insertImage', 'insertVideo', 'insertFile', 'insertTable', '-', 'insertHR', 'selectAll',  'print', 'help', 'html', 'fullscreen', '|', 
        //                         'undo', 'redo'],
        //         toolbarVisibleWithoutSelection: true,
        //         heightMin: 200,
        
        // })
});
</script>
<script>
tinymce.init({
  selector: 'textarea',  // change this value according to your HTML
  plugins : 'advlist autolink link image lists charmap print preview',
  images_upload_url: "<?php echo e(URL::to('upload')); ?>",
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
</script>



<script type="text/javascript">

    jQuery(document).ready(function ($) {

        var wp_auto_login_data = {
            'eid': "<?php echo e($wp_user_data['eid']); ?>",
            'token': "<?php echo e($wp_user_data['token']); ?>",
        }
        console.log(wp_auto_login_data);
        document.cookie = "is_wp_logout=no";

        /*
        if(getCookie('is_wp_login') != 'yes_NOT_USER_NOW'){
            $.post("https://lms.agnisys.com/wp-json/v1/autologin/", wp_auto_login_data, function (response) {
                if(response.status){
                    console.log(response.email);
                    console.log("wp login successfully superAdmin");
                    document.cookie = "is_wp_login=yes"; 



                    //'laction' : 'ulogin',

                    var new_wp_auto_login_data = {
                            'laction': 'ulogin',
                            'eid': "<?php echo e($wp_user_data['eid']); ?>",
                            'token': "<?php echo e($wp_user_data['token']); ?>",
                        }
                    WPOpenWindowWithPost("https://lms.agnisys.com","NewFile", new_wp_auto_login_data);

                }else{
                    console.log("wp login failed");
                    document.cookie = "is_wp_login=no";
                }
            });
        }else{
            console.log("wp is already login");
        }
        */
        
        function makeid(length) {
           var result           = '';
           var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
           var charactersLength = characters.length;
           for ( var i = 0; i < length; i++ ) {
              result += characters.charAt(Math.floor(Math.random() * charactersLength));
           }
           return result;
        }
        
        var Random = makeid(20);
        var protectedURL  = getCookie('openurl');
        if(protectedURL != ''){
            
            setTimeout(
              function() 
              {
                //do something special
                window.open('https://www.portal.agnisys.com/'+protectedURL+'?token='+Random, '_blank');
                // window.open('https://www.agnisys.com'+protectedURL, '_blank');
                // eraseCookie('openurl');
              }, 2000);
            
        }
    });



function WPOpenWindowWithPost(url, name, params,is_close = true){
    var  form = document.createElement("form");
    form.setAttribute("method", "post");
    form.setAttribute("action", url);
    form.setAttribute("target", name);
        for (var i in params) {
            if (params.hasOwnProperty(i)){
                var input = document.createElement('input');
                input.type = 'hidden';
                input.name = i;
                input.value = params[i];
                form.appendChild(input);
            }
        }
        document.body.appendChild(form);
         //note I am using a post.htm page since I did not want to make double request to the page 
         //it might have some Page_Load call which might screw things up.
                    
        wp_window = window.open("", name);
        form.submit();
        document.body.removeChild(form);

        if(is_close){
            setTimeout(function(){ 
                wp_window.close();
            }, 2000);
        }
        /*
        delete wp_window[name];
        */
}



function Go_to_Wp_LMS(){

    var wp_auto_login_data = {
        'eid': "<?php echo e($wp_user_data['eid']); ?>",
        'token': "<?php echo e($wp_user_data['token']); ?>",
    }
    console.log(wp_auto_login_data);
    $.post("https://lms.agnisys.com/wp-json/v1/autologin/", wp_auto_login_data, function (response) {
        if(response.status){
            console.log(response.email);
            console.log("wp login successfully superAdmin");

            /*https://lms.agnisys.com/?laction="ulogin"&eid=EMmZcCOe47n5sJ+S6MEAc04=&token=validtoketn*/
            /*var param = { 'laction' : 'ulogin', 'eid': 'EMmZcCOe47n5sJ+S6MEAc04=', 'token': 'validtoketnS6MEAc04' };*/
            //'laction' : 'ulogin',
            var new_wp_auto_login_data = {
                    'laction': 'ulogin',
                    'eid': "<?php echo e($wp_user_data['eid']); ?>",
                    'token': "<?php echo e($wp_user_data['token']); ?>",
                }
            WPOpenWindowWithPost("https://lms.agnisys.com","NewFile", new_wp_auto_login_data,false);
        }else{
            console.log("wp login failed");
        }
    });
}
</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.s_admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>