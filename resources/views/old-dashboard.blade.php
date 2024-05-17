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
        <link rel="icon" href="{{asset('images/Favicon-100x100.png')}}" sizes="32x32" />
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
        <link href="{{asset('css/chatbot/style.css')}}" rel="stylesheet" >
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	 <!--   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	    <!--Chat Bot styles -->
	    
            </head>
    <body>
      @include('admin.includes.ag-header')  
        
        <style>
  iframe{
      border:none;
      padding:0px 30px;
  }
</style>
<style type="text/css">
.nav-tabs>li>a{
      border-color: #e3e3e3;
      background-color: #EBEBEB;
      color: #666;
          padding: 14px 20px;
      display: block;
      box-sizing: border-box;
      border: solid transparent;
      position: relative;
      text-decoration: none;
      color: inherit;
      transition: background .2s ease-in-out,color .2s ease-in-out,border .2s ease-in-out;
      box-shadow: none;
    }
    .tab-pane{
      border: solid transparent;
    box-sizing: content-box;
    padding: 14px 20px;
    display: none;
    overflow: hidden;
    -webkit-transform: translate3d(0,0,0);
    transform: translate3d(0,0,0);
    transition: padding .2s ease-in-out;
        background: #f6f6f6;
    }
    .fa-circle-info{
      font-size: 30px;
      position: absolute;
    }
    h4{
      text-align: center;
    }
    .nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover,.nav-tabs{
      background: #f6f6f6;
    }
  a{
    color:#f26422;
  }
  h3 {
    font-size: 20px;
}
h1 {
    font-size: 25px;
}
p {
    color: #2f2f2f;
    font-size: 14px;
    line-height: 26px;
}
a:hover, a:active {
    color: #f26422;
    text-decoration: none;
    outline: 0 none;
}
.vc_color-alert-info.vc_message_box-outline, .vc_color-alert-info.vc_message_box-solid-icon{

    color: #31708f;
    border-color: #67CCE0;
    background-color: transparent;
    border-radius: 5px;
    border-width: 2px;
    border: 1px solid transparent;
    display: block;
    overflow: hidden;
    margin: 0 0 21.74px;
    padding: 1em 1em 1em 4em;
    position: relative;
    font-size: 1em;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    color: #31708f;
    border-color: #67CCE0;
}
.vc_message_box-rounded{
  margin-bottom: 50px;
}
#page{
    background: #fff;
    padding: 20px;
    margin: 15px;
    margin-top: 0px;
}
.tab-content>.active{
    opacity:1;
}


</style>
<div id="wrapper">
        @if(Session::get('role') == 'customer' || Session::get('role') == 'Customer' || Session::get('role') == 'Registered' || Session::get('role') == 'registered' )
          @include('admin.includes.sidebar')
        @else
          @include('admin.includes.side')
        @endif
        <div id="content-wrapper">
            <!--<iframe width="100%" height="100%" src="https://www.old.agnisys.com/new-dashboard/"></iframe>-->
            <div id="page" class="site site-wrapper wide-layout">
              <div class="container">
                <div class="row">
                  <h4 style="color: #000000;text-align: center;width:100%;" class="vc_custom_heading">Agnisys Tools Family available </h4>
                  <div class="vc_message_box vc_message_box-outline vc_message_box-rounded vc_color-alert-info" style="width:100%;">
                    <div class="vc_message_box-icon" style="position: absolute;left:10px;top:10px;"><i class="fa-solid fa-circle-info"></i>
                    </div><p style="text-align: center;margin-bottom: 0px;font-size: 17px;">Visit the <a href="https://www.portal.agnisys.com/dashboard/download-software" target="_blank">Download Software</a> page to get the appropriate software.</p>
                  </div>
                  <h4 style="font-weight: 400;font-size: 15px;text-align: center;width: 100%;">Here are quick links to browse the documentation. Download the entire documentation bundle from the Download Software page.</h4>
                  <div class="nav-wrapper">
                      <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">IDesignSpec™</a></li>
                        <li><a data-toggle="tab" href="#menu1">IDS NextGen™</a></li>
                        <li><a data-toggle="tab" href="#menu2">IDS-Batch CLI™</a></li>
                        <li><a data-toggle="tab" href="#menu3">IDS-IPGen™</a></li>
                        <li><a data-toggle="tab" href="#menu4">IDS-Verify™</a></li>
                        <li><a data-toggle="tab" href="#menu5">IDS-Validate™</a></li>
                        <li><a data-toggle="tab" href="#menu6">IDS-Integrate™</a></li>
                        <li><a data-toggle="tab" href="#menu7">DVinsight™</a></li>
                      </ul>
                
                      <div class="tab-content">
                        <div id="home" class="tab-pane fade active">
                          <p><a href="https://www.portal.agnisys.com/release/docs/ids" target="_blank">• Documentation</a></p>
                          <p><a href="https://www.portal.agnisys.com/release/support_file/idsdocs_enc_7.84.0.0.tar.gz" target="_blank">• Supporting Files</a></p>
                          <p><a href="https://www.portal.agnisys.com/new_pdf_files/IDesignSpec_Mind_Map.pdf" target="_blank">• Mind Map of IDesignSpec<strong>™</strong></a></p>
                        </div>
                        <div id="menu1" class="tab-pane fade">
                          <p><a href="https://www.portal.agnisys.com/release/docs/ids/IDS-NGT.html" target="_blank">• Documentation</a></p>
                          <p><a href="https://www.portal.agnisys.com/release/support_file/idsdocs_enc_7.84.0.0.tar.gz" target="_blank">• Supporting Files</a></p>
                        </div>
                        <div id="menu2" class="tab-pane fade">
                          <p><a href="https://www.portal.agnisys.com/release/docs/idsbatchcli" target="_blank">• Documentation</a></p>
                          <p><a href="https://www.portal.agnisys.com/release/support_file/idsdocs_enc_7.84.0.0.tar.gz" target="_blank">• Supporting Files</a></p>
                        </div>
                        <div id="menu3" class="tab-pane fade">
                          <p><a href="https://www.portal.agnisys.com/release/docs/ipgen" target="_blank">• Documentation</a></p>
                          <p><a href="https://www.portal.agnisys.com/release/support_file/idsdocs_enc_7.84.0.0.tar.gz" target="_blank">• Supporting Files</a></p>
                        </div>
                        <div id="menu4" class="tab-pane fade">
                          <p><a href="https://www.portal.agnisys.com/release/docs/verify" target="_blank">• Documentation</a></p>
                          <p><a href="https://www.portal.agnisys.com/release/support_file/idsdocs_enc_7.84.0.0.tar.gz" target="_blank">• Supporting Files</a></p>
                        </div>
                        <div id="menu5" class="tab-pane fade">
                          <p><a href="https://www.portal.agnisys.com/release/docs/validate" target="_blank">• Documentation</a></p>
                          <p><a href="https://www.portal.agnisys.com/release/support_file/idsdocs_enc_7.84.0.0.tar.gz" target="_blank">• Supporting Files</a></p>
                        </div>
                        <div id="menu6" class="tab-pane fade">
                          <p><a href="https://www.portal.agnisys.com/release/docs/integrate/index.html" target="_blank">• Documentation</a></p>
                          <p><a href="https://www.portal.agnisys.com/release/support_file/idsdocs_enc_7.84.0.0.tar.gz" target="_blank">• Supporting Files</a></p>
                        </div>
                        <div id="menu7" class="tab-pane fade">
                          <p><a href="https://www.portal.agnisys.com/release/dvi/docs/DVinsight.html" target="_blank">• Documentation</a></p>
                        </div>
                    </div>
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
                                       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
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
    <script src="{{asset('js/chatbot/main.js')}}"></script>
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
             <input type="hidden" name="userEmail" class="user_email" value="{{Session::get('userMail')}}">
             <input type="hidden" name="userName" class="user_name" value="{{Session::get('username')}}">
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


