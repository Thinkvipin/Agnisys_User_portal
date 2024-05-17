<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <!-- <meta http-equiv="Content-Security-Policy" content="default-src 'self' http://3.88.136.222"> -->
    	


        <title><?php echo e(config('app.name')); ?> - Dashboard</title>
        <link rel="icon" href="<?php echo e(asset('/images/Favicon-100x100.png')); ?>" sizes="32x32" />
        <!-- Bootstrap core CSS-->
        <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
        <!--<link href="<?php echo e(asset('vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">-->

        <!-- Custom fonts for this template-->
        <link href="<?php echo e(asset('vendor/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet" type="text/css">

        <!-- Page level plugin CSS-->
        <link href="<?php echo e(asset('vendor/datatables/dataTables.bootstrap4.css')); ?>" rel="stylesheet">
        <!-- froala-->
        <link href="<?php echo e(asset('vendor/froala/froala_editor.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('vendor/froala/froala_style.css')); ?>" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo e(asset('vendor/froala/froala_editor.pkgd.min.css')); ?>">
        <!-- Include Code Mirror CSS. -->
        <link rel="stylesheet" href="<?php echo e(asset('css/codemirror.min.css')); ?>">
        
        <!-- Custom styles for this template-->
        <link href="<?php echo e(asset('css/sb-admin.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/simplemde.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/mention.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/jquery-ui.css')); ?>" rel="stylesheet">
        <!--Chat Bot styles -->
        <link href="<?php echo e(asset('css/chatbot/style.css')); ?>" rel="stylesheet" >
	    <link rel="stylesheet" href="<?php echo e(asset('css/font-awesome.min.css')); ?>">
	    <!--Chat Bot styles -->
        <?php echo $__env->yieldContent('custom_css'); ?> 
    </head>
    <body>
        <?php echo $__env->yieldContent('content'); ?>
    </body>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/jquery/jquery.min.js')); ?>"></script>
    <!--<script src="<?php echo e(asset('vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>-->
        
    <!-- Core plugin JavaScript-->
    <script src="<?php echo e(asset('vendor/jquery-easing/jquery.easing.min.js')); ?>"></script>

    <!-- Page level plugin JavaScript-->
    <!--<script src="<?php echo e(asset('vendor/chart.js/Chart.min.js')); ?>"></script>-->
    <script src="<?php echo e(asset('vendor/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/datatables/dataTables.bootstrap4.js')); ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo e(asset('js/sb-admin.js')); ?>"></script>
    
    <!-- Custom scripts for all pages-->
    <script src="<?php echo e(asset('js/jquery-ui.js')); ?>"></script>
    
    <!-- Demo scripts for this page-->
    <script src="<?php echo e(asset('js/demo/datatables-demo.js')); ?>"></script>
    <!--<script src="<?php echo e(asset('js/demo/chart-area-demo.js')); ?>"></script>-->
    <script src="<?php echo e(asset('js/simplemde.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap-typehead.js')); ?>"></script>
    <script src="<?php echo e(asset('js/mention.js')); ?>"></script>
    <!-- froala-->
    <script src="<?php echo e(asset('vendor/froala/froala_editor.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('vendor/froala/froala_editor.pkgd.min.js')); ?>"></script>
    <!-- tiny mce -->
    <script src="<?php echo e(asset('js/tinymce.min.js')); ?>"></script>

    <!-- Include Code Mirror JS. -->
    <script type="text/javascript" src="<?php echo e(asset('js/codemirror/codemirror.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/codemirror/mode/xml/xml.min.js')); ?>"></script>
    
    <!-- Include PDF export JS lib. -->
    <!--<script type="text/javascript" src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>-->
    
    <script>
        $('.flash-message').delay(10000).fadeOut('slow');
        
        
        /*handle change in from date*/
	$( "#from" ).datepicker({
			changeMonth: true,
			changeYear: true,
		  	numberOfMonths: 1,
		   	minDate:0,
		   	dateFormat: 'dd/mm/yy'
		}).on( "change", function() {
		
			var from = $( "#from" ).val().split("-");
			var fdate = new Date(from[2], from[1] - 1, from[0]);
			fdate.setDate(fdate.getDate()+1);
			var to = $( "#to" );
				to.datepicker( "option", "minDate", fdate );
			var act_val = $.datepicker.formatDate( "dd/mm/yy", fdate);  
				$( "#to" ).val(act_val);
			
			 //total(); 
	});
	
	/*handle change in the to date*/
	$( "#to" ).datepicker({
			changeMonth: true,
			changeYear: true,
		  	numberOfMonths: 1,
		   	minDate:0,
		  	dateFormat: 'yy-mm-dd'
		}).on("change",function(){});

 
        </script>

    <?php echo $__env->yieldContent('custom_js'); ?>

    <link href="<?php echo e(asset('css/select2/select2.min.css')); ?>" rel="stylesheet" />
    <script src="<?php echo e(asset('js/select2/select2.min.js')); ?>"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.select-multiple').select2();

            // table checkbox delete multiple
            $("#checkBoxAll").click(function(){
              $(".checkBoxClass").prop('checked',$(this).prop('checked'));
            });
        });
    
        
    </script>
    <script type="text/javascript">
        $('body').on('focus',".expiryDate", function(){
            $(this).datepicker({
    			changeMonth: true,
    			changeYear: true,
    		  	numberOfMonths: 1,
    		   	minDate:0,
    		  	dateFormat: 'yy-mm-dd'
    		});
        });



    function getCookie(cname) {
	    var name = cname + "=";
	    var decodedCookie = decodeURIComponent(document.cookie);
	    var ca = decodedCookie.split(';');
	    for(var i = 0; i <ca.length; i++) {
		    var c = ca[i];
		    while (c.charAt(0) == ' ') {
			    c = c.substring(1);
		    }
		    if (c.indexOf(name) == 0) {
			    return c.substring(name.length, c.length);
		    }
	    }
	    return "";
    }
    </script>
    <!--Chat Bot Script -->
    <script src="<?php echo e(asset('js/chatbot/main.js')); ?>"></script>
    <button id="open-button" onclick="openForm()">AgniGPT</button>
     <div class="chat_window" id="chatWindow">
         <div class="top_menu">
             <div class="buttons">
                 <div class="button close" onclick="closeForm()">x</div>
                 <!--<div class="button minimize"></div>-->
                 <!--<div class="button maximize"></div>-->
             </div>
             <div class="title">AgniGPT</div>
         </div>
         <ul class="messages"></ul>
         <div class="bottom_wrapper clearfix">
             <input type="hidden" name="userEmail" class="user_email" value="<?php echo e(Session::get('userMail')); ?>">
             <input type="hidden" name="userName" class="user_name" value="<?php echo e(Session::get('username')); ?>">
             <div class="message_input_wrapper">
                 <input class="message_input" placeholder="Type your message here..." />
             </div>
             <div class="send_message">
                 <div class="icon"></div>
                 <div class="text"><i class="fa fa-paper-plane" aria-hidden="true"></i></div>
             </div>
         </div>
     </div>
     <div class="message_template"><li class="message"><div class="avatar"></div><div class="text_wrapper"><div class="text"></div></div></li></div>
   <!--end Chat Bot Script -->
  </body>

</html>