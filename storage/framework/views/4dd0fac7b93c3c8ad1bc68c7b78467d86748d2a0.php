<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="RoNaDZDCrVO8F1SiIGYIBHpxNj6uVSrCVDLwo9sF">

        <title>Agnisys - Dashboard</title>
        <link rel="icon" href="<?php echo e(asset('/images/Favicon-100x100.png')); ?>" sizes="32x32" />
        <!-- Bootstrap core CSS-->
        <link rel="stylesheet" href="https://www.portal.agnisys.com/css/app.css">
        <!--<link href="https://www.portal.agnisys.com/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">-->

        <!-- Custom fonts for this template-->
        <link href="https://www.portal.agnisys.com/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

        <!-- Page level plugin CSS-->
        <link href="https://www.portal.agnisys.com/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
        <!-- froala-->
        <link href="https://www.portal.agnisys.com/vendor/froala/froala_editor.css" rel="stylesheet">
        <link href="https://www.portal.agnisys.com/vendor/froala/froala_style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://www.portal.agnisys.com/vendor/froala/froala_editor.pkgd.min.css">
        <!-- Include Code Mirror CSS. -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">
        
        <!-- Custom styles for this template-->
        <link href="https://www.portal.agnisys.com/css/sb-admin.css" rel="stylesheet">
        <link href="https://www.portal.agnisys.com/css/simplemde.min.css" rel="stylesheet">
        <link href="https://www.portal.agnisys.com/css/mention.css" rel="stylesheet">
        <link href="https://www.portal.agnisys.com/css/style.css" rel="stylesheet">
        <link href="https://www.portal.agnisys.com/css/jquery-ui.css" rel="stylesheet">
      
        <!--Chat Bot styles -->
        <link href="<?php echo e(asset('css/chatbot/style.css')); ?>" rel="stylesheet" >
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	    <!--Chat Bot styles -->
            </head>
    <body>
    

  <?php echo $__env->make('admin.includes.ag-header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <style>
      iframe{
          border:none;
          padding:0px 30px;
      }
  </style>
  <style>

#content-wrapper{
    background: #fff;
    margin: 30px;
}
.container.ids_videos_cnt{
    width:970px;
}
.ids_videos_cnt h1{
color:#ff6600;
font-style: italic;
font-family Verdana, Geneva, sans-serif;
font-size: 22px;
font-weight: 700;
}
.ids_videos_cnt h4{
    font-weight: 400;
}
.ids_videos_cnt .vc_sep_line{
    border-color: #EBEBEB;
    height: 1px;
    border-top: 1px solid #EBEBEB;
    display: block;
    position: relative;
    top: 1px;
    width: 100%;
    margin: 30px 0px 70px 0px;
}
.ids_videos_cnt::marker {
    unicode-bidi: isolate;
    font-variant-numeric: tabular-nums;
    text-transform: none;
    text-indent: 0px !important;
    text-align: start !important;
    text-align-last: start !important;
}
.ids_videos_cnt ul{
  padding:0px;
}

.ids_videos_cnt li {
    list-style-type: square;
    margin-left: 20px;
  }
.ids_videos_cnt .video-wrapper{
    box-sizing: border-box;
    padding-left: 15px;
    padding-right: 15px;
    width: 100%;
    padding-top: 56.25%;
    position: relative;
    width: 100%;
  }
.ids_videos_cnt .video-wrapper iframe {
    width: 100%;
    height: 100%;
    display: block;
    position: absolute;
    margin: 0;
    top: 0;
    left: 0;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.ids_videos_cnt  .main-sec{
  padding-top: 30px;
  padding-bottom: 30px;
}
.ids_videos_cnt .content_sep_line{
  margin: 60px 0px;
}
</style>
<div id="wrapper">

        <?php if(Session::get('role') == 'customer' || Session::get('role') == 'Customer' || Session::get('role') == 'Registered' || Session::get('role') == 'registered' ): ?>
          <?php echo $__env->make('admin.includes.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php else: ?>
          <?php echo $__env->make('admin.includes.side', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>
        <div id="content-wrapper">
            <!--<iframe width="100%" height="100%" src="https://www.old.agnisys.com/ids-training-videos-portal/"></iframe>-->
            <div class="container ids_videos_cnt">
              <h1 class="text-center">Welcome to the IDesignSpec Training Video Page</h1>
              <span class="vc_sep_line"></span>
              
              <div class="row main-sec" id="dataentry">
                <div class="col-sm-3">
                  <div class="content-left">
                    <h4><span style="color: #008000;"><strong><em>IDesignSpec Video #1</em></strong></span></h4>
                    <h4>Data Entry:</h4>
                    <ul>
                      <li><span style="line-height: 1.5em;">Simple Registers</span></li>
                      <li><span style="line-height: 1.5em;">Register Groups @ 3:05</span></li>
                      <li><span style="line-height: 1.5em;">Register Arrays @ 7:15</span></li>
                      <li><span style="line-height: 1.5em;">Memory @ 8:51</span></li>
                      <li><span style="line-height: 1.5em;">Creating Hierarchy @ 9:30</span></li>
                      <li><span style="line-height: 1.5em;">References @ 11:10</span></li>
                    </ul>
                  </div>
                  
                </div>
                <div class="col-sm-9">
                  <div class="video-wrapper">
                    <iframe width="640" height="360" src="https://www.youtube.com/embed/1-g6hy3Rn6w?feature=oembed" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                  </div>
                </div>
              </div>
            
              <span class="vc_sep_line content_sep_line"></span>
            
              <div class="row main-sec" id="creatinguvmmodels">
                <div class="col-sm-3">
                  <div class="content-left">
                    <h4><span style="color: #008000;"><strong><em>IDesignSpec Video #2</em></strong></span></h4>
                    <h4>Creating UVM Models:</h4>
                    <ul>
                      <li>Simple UVM Model</li>
                      <li>Adding Coverage @ 2:00</li>
                      <li>Adding HDL_Paths @ 4:08</li>
                      <li>Adding Constraints @ 6:21</li>
                      <li>Changing Default Classes @ 7:36</li>
                      <li>UVM Custom Code Insertion @ 8:18</li>
                      <li>UVM Properties @ 9:37</li>
                    </ul>
                  </div>
                  
                </div>
                <div class="col-sm-9">
                  <div class="video-wrapper">
                    <iframe width="640" height="360" src="https://www.youtube.com/embed/Pa254NmiH8E?feature=oembed" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                  </div>
                </div>
              </div>
            
              <span class="vc_sep_line content_sep_line"></span>
            
              <div class="row main-sec" id="creatingrtlmodels">
                <div class="col-sm-3">
                  <div class="content-left">
                    <h4><span style="color: #008000;"><strong><em>IDesignSpec Video #3</em></strong></span></h4>
                    <h4>Creating RTL Models:</h4>
                    <ul>
                      <li>Simple RTL Models</li>
                      <li>RTL Properties @ 2:02</li>
                      <li>External Registers @ 2:50</li>
                      <li>Adding Pipeline @ 3:22</li>
                      <li>Special Control Signals @3:53</li>
                      <li>Low Power Output @5:34</li>
                    </ul>
                  </div>
                  
                </div>
                <div class="col-sm-9">
                  <div class="video-wrapper">
                    <iframe width="640" height="360" src="https://www.youtube.com/embed/pKPR-AndvCM?feature=oembed" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                  </div>
                </div>
              </div>
            
              <span class="vc_sep_line content_sep_line"></span>
            
              <div class="row main-sec" id="creatingcomplexregisters">
                <div class="col-sm-3">
                  <div class="content-left">
                    <h4><span style="color: #008000;"><strong><em>IDesignSpec Video #4</em></strong></span></h4>
                    <h4>Creating Complex Registers:</h4>
                    <ul>
                      <li>Interrupt Registers</li>
                      <li>Shadow Registers @ 7:53</li>
                      <li>Alias Registers @ 8:56</li>
                      <li>Indirect Registers @ 11:47</li>
                      <li>Trigger Buffer Registers @ 15:06</li>
                      <li>Lock Registers @ 16:20</li>
                      <li>UART Registers @ 17:44</li>
                      <li>Counters @ 18:53</li>
                    </ul>
                  </div>
                  
                </div>
                <div class="col-sm-9">
                  <div class="video-wrapper">
                    <iframe width="640" height="360" src="https://www.youtube.com/embed/r9n0w7kWtmc?feature=oembed" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                  </div>
                </div>
              </div>
            
              <span class="vc_sep_line content_sep_line"></span>
            
              <div class="row main-sec" id="advancedtopics">
                <div class="col-sm-3">
                  <div class="content-left">
                    <h4><span style="color: #008000;"><strong><em>IDesignSpec Video #5</em></strong></span></h4>
                    <h4>Advanced Topics :</h4>
                    <ul>
                      <li>Multiple Bus Domains</li>
                      <li>Multiple Clocks @ 8:35</li>
                      <li>Clock Domains Crossing @ 11:05</li>
                      <li>Custom connections @ 17:02</li>
                      <li>Signals @ 22:11</li>
                      <li>Variants and RefVariants @ 38:34</li>
                      <li>Enum @ 46:6</li>
                      <li>Defines @ 50:31</li>
                      <li>Parameterization @ 53:59</li>
                    </ul>
                  </div>
                  
                </div>
                <div class="col-sm-9">
                  <div class="video-wrapper">
                    <iframe width="640" height="360" src="https://www.youtube.com/embed/uITawiHM7oI?feature=oembed" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                  </div>
                </div>
              </div>
            </div>
        </div>
        
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
                                        <a class="btn btn-danger" href="https://www.portal.agnisys.com/logout" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                                                Logout
                                        </a>
                                       <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                        <?php echo csrf_field(); ?>
                                        </form>
                                </div>
                        </div>
                </div>
        </div>
</div>

        
        
        
        
            </body>

    <!-- Bootstrap core JavaScript-->
    <script src="https://www.portal.agnisys.com/js/app.js"></script>
    <script src="https://www.portal.agnisys.com/vendor/jquery/jquery.min.js"></script>
    <!--<script src="https://www.portal.agnisys.com/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>-->
        
    <!-- Core plugin JavaScript-->
    <script src="https://www.portal.agnisys.com/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <!--<script src="https://www.portal.agnisys.com/vendor/chart.js/Chart.min.js"></script>-->
    <script src="https://www.portal.agnisys.com/vendor/datatables/jquery.dataTables.js"></script>
    <script src="https://www.portal.agnisys.com/vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="https://www.portal.agnisys.com/js/sb-admin.js"></script>
    
    <!-- Custom scripts for all pages-->
    <script src="https://www.portal.agnisys.com/js/jquery-ui.js"></script>
    
    <!-- Demo scripts for this page-->
    <script src="https://www.portal.agnisys.com/js/demo/datatables-demo.js"></script>
    <!--<script src="https://www.portal.agnisys.com/js/demo/chart-area-demo.js"></script>-->
    <script src="https://www.portal.agnisys.com/js/simplemde.min.js"></script>
    <script src="https://www.portal.agnisys.com/js/bootstrap-typehead.js"></script>
    <script src="https://www.portal.agnisys.com/js/mention.js"></script>
    <!-- froala-->
    <script src="https://www.portal.agnisys.com/vendor/froala/froala_editor.min.js"></script>
    <script type="text/javascript" src="https://www.portal.agnisys.com/vendor/froala/froala_editor.pkgd.min.js"></script>
    <!-- tiny mce -->
    <script src="https://www.portal.agnisys.com/js/tinymce.min.js"></script>

    <!-- Include Code Mirror JS. -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>
    
    <!-- Include PDF export JS lib. -->
    <script type="text/javascript" src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
    
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

    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
          $('.select-multiple').select2();
          // Scroll the page to the element specified in the URL hash
          var urlHash = window.location.href.split("#")[1];
          $(window).on('load', function() {
            $('html, body').animate({
              scrollTop: $('.' + urlHash + ', #' + urlHash + ', [name=' + urlHash + ']').first().offset().top - 100
            }, 1000);
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



