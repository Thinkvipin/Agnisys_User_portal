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
        <link rel="icon" href="<?php echo e(asset('images/Favicon-100x100.png')); ?>" sizes="32x32" />
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
      #page.site-wrapper{
          
        background: #fff;
        margin: 15px;
        margin-top: 0px;

      }
      #page a{
          color:#f26422;
      }
  </style>
  
<div id="wrapper">

        <?php if(Session::get('role') == 'customer' || Session::get('role') == 'Customer' || Session::get('role') == 'Registered' || Session::get('role') == 'registered' ): ?>
          <?php echo $__env->make('admin.includes.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php else: ?>
          <?php echo $__env->make('admin.includes.side', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>
        <div id="content-wrapper">
            <!--<iframe width="100%" height="100%" src="https://www.old.agnisys.com/new-software-pages/"></iframe>-->
            <div id="page" class="site site-wrapper wide-layout">
                <div id="wphash">
                   <div id="content" class="site-content">
                      <style>
                         
                         
                      </style>
                      <div class="page-area ptb-80">
                         <div class="container">
                            <div class="row">
                               <div class="col-md-12">
                                  <div class="vc_row wpb_row vc_row-fluid inner-pages">
                                     <div class="user-content-box wpb_column vc_column_container vc_col-sm-12">
                                        <div class="vc_column-inner ">
                                           <div class="wpb_wrapper">
                                              <div class="wpb_text_column wpb_content_element ">
                                                 <div class="wpb_wrapper">
                                                    <h1>DOWNLOAD SOFTWARE</h1>
                                                    <p><em>Please download the software below and request a license at <em><a href="mailto:support@agnisys.com" target="_blank">support@agnisys.com</a></em>. If you have any issues contact support at <a href="mailto:support@agnisys.com" target="_blank">support@agnisys.com</a></em><a href="mailto:%20%3Cscript%20language=%27JavaScript%27%20type=%27text/javascript%27%3E%20%3C%21--%20var%20prefix%20=%20%27mailto:%27;%20var%20suffix%20=%20%27%27;%20var%20attribs%20=%20%27%27;%20var%20path%20=%20%27hr%27%20+%20%27ef%27%20+%20%27=%27;%20var%20addy82718%20=%20%27support%27%20+%20%27@%27;%20addy82718%20=%20addy82718%20+%20%27agnisys%27%20+%20%27.%27%20+%20%27com%27;%20document.write%28%20%27%3Ca%20%27%20+%20path%20+%20%27%5C%27%27%20+%20prefix%20+%20addy82718%20+%20suffix%20+%20%27%5C%27%27%20+%20attribs%20+%20%27%3E%27%20%29;%20document.write%28%20addy82718%20%29;%20document.write%28%20%27%3C%5C/a%3E%27%20%29;%20//--%3E%20%3C/script%3E%3Cscript%20language=%27JavaScript%27%20type=%27text/javascript%27%3E%20%3C%21--%20document.write%28%20%27%3Cspan%20style=%5C%27display:%20none;%5C%27%3E%27%20%29;%20//--%3E%20%3C/script%3EThis%20e-mail%20address%20is%20being%20protected%20from%20spambots.%20You%20need%20JavaScript%20enabled%20to%20view%20it%20%3Cscript%20language=%27JavaScript%27%20type=%27text/javascript%27%3E%20%3C%21--%20document.write%28%20%27%3C/%27%20%29;%20document.write%28%20%27span%3E%27%20%29;%20//--%3E%20%3C/script%3E" target="_blank">.</a></p>
                                                    <p>Please download the software that you have purchased or are currently evaluating.</p>
                                                    <hr>
                                                    <h1><strong>IDesignSpec : Executable Design Specification Tool</strong></h1>
                                                    <p>IDesignSpec (IDS) suite of tools are available for download below. They are available in GUI and batch versions.</p>
                                                    <h2>IDS-Word™</h2>
                                                    <h3>Release 7.86.0.0 for Word 2007/2010/2013/2016/</h3>
                                                    <p><a title="download IDesignSpec word version 7.86.0.0" href="https://www.portal.agnisys.com/release/idsword/IDesignSpecWord-7.86.0.0-Setup.exe" target="_blank">IDS-Word Plugin</a>&nbsp;| <a title="read install instruction" href="https://www.portal.agnisys.com/release/docs/ids/IDS-WordandIDS-Excel2.html" target="_blank"> Install instructions</a>&nbsp;| <a href="https://www.portal.agnisys.com/release/docs/ids/IDS-WordandIDS-Excel2.html" target="_blank"> Upgrade instructions</a>&nbsp;| <a href="https://www.portal.agnisys.com/release/docs/ids/Ver7200.html" target="_blank">Release notes</a> | <a target="_blank"> bc281b40d270a9c6f64b4acbab4284389dfb9175 </a></p>
                                                       <h2>IDS-Excel™</h2>
                                                    <h3>Release 7.86.0.0 for Excel 2007/2010/2013/2016</h3>
                                                    <p><a title="download IDesignSpec Excel version 7.86.0.0" href="https://www.portal.agnisys.com/release/idsexcel/IDesignSpecExcel-7.86.0.0-Setup.exe" target="_blank" rel="noopener">IDS-Excel Plugin</a>&nbsp;| <a title="read install instruction" href="https://portal.agnisys.com/release/docs/ids/IDSWordandIDSExcel.html" target="_blank">Install instructions</a><a title="read install instruction" target="_blank">&nbsp; | </a><a href="https://www.portal.agnisys.com/release/docs/ids/IDS-WordandIDS-Excel2.html" target="_blank">Upgrade instructions</a>&nbsp;|&nbsp;<a href="https://portal.agnisys.com/release/docs/ids/Ver7200.html" target="_blank">Release notes</a> | <a target="_blank"> 1cb80e75a300c707238408a96ae07c9fbbf26187    </a></p>
                                                    <h2>IDS-Batch™</h2>
                                                    <h3>Release 7.86.0.0 for Windows</h3>
                                                    <p><a title="download IDesignSpec Batch Windows version 7.86.0.0" href="https://www.portal.agnisys.com/release/idsbatch/windows/idsbatch_win_7.86.0.0.zip" target="_blank" rel="noopener">IDS-Batch</a>&nbsp;| <a title="read install instruction" href="https://www.portal.agnisys.com/release/docs/ids/IDS-BatchCLI1.html" target="_blank">Install instructions</a>&nbsp;|&nbsp;<a href="https://www.portal.agnisys.com/release/docs/ids/Ver7200.html" target="_blank">Release notes</a> | <a target="_blank"> 687925865ff9167037519a53672f818fe686e184 </a></p>
                                                    <h3>Release 7.86.0.0 for Linux</h3>
                                                    <p><a title="download IDesignSpec Batch linux version 7.86.0.0" href="https://www.portal.agnisys.com/release/idsbatch/linux/idsbatch_lin_7.86.0.0.tgz" target="_blank" rel="noopener">IDS-Batch</a>&nbsp;| <a title="read install instruction" href="https://www.portal.agnisys.com/release/docs/ids/IDS-BatchCLI1.html" target="_blank">Install instructions</a>&nbsp;|&nbsp;<a href="https://www.portal.agnisys.com/release/docs/ids/Ver7200.html" target="_blank">Release notes</a> | <a target="_blank"> 027492111dd13852e14bd02bf1eb04dd6c4c3cff   </a></p>
                                                    <h3>Release 7.86.0.0 for MAC</h3>
                                                    <p><a title="download IDesignSpec Batch mac version 7.86.0.0" href="https://www.portal.agnisys.com/release/idsbatch/mac/idsbatch_mac_7.86.0.0.tgz" target="_blank" rel="noopener">IDS-Batch</a>&nbsp;|&nbsp;<a title="read install instruction" href="https://www.portal.agnisys.com/release/docs/ids/IDS-BatchCLI1.html" target="_blank">Install&nbsp;instructions</a>&nbsp;|&nbsp;<a href="https://www.portal.agnisys.com/release/docs/ids/Ver7200.html" target="_blank">Release notes </a> | <a target="_blank"> fa0506eae566257ac06e9d37ec3237ec53b97548   </a></p>
                                                    <h2>OpenOffice/LibreOffice IDSCalc</h2>
                                                    <h3>IDS-Calc 7.12.0.0</h3>
                                                    <p><a title="IDSCalc 7.12.0.0" href="https://www.portal.agnisys.com/release/idscalc/IDSCal7.12.0.0.tar.gz" target="_blank">IDS-Calc&nbsp;</a>|&nbsp;<a href="http://www.portal.agnisys.com/release/idscalc/IDSCalc_quick_start_guide.pdf" target="_blank">Quick Start Guide</a> | <a target="_blank"> f2c71c839771586607900c2e606061a3c797e110 </a></p>
                                                    <p><span style="line-height: 1.5em;">&nbsp;</span></p>
                                                    <p>——————- IDS Supporting Files &nbsp;————————–</p>
                                                    <p>The documentation for the complete family of IDS products is available as a separate download at the bottom.</p>
                                                    <p><strong><a name="IDSDocs" target="_blank"></a>IDS_Supporting_Files:&nbsp;</strong>Contains Examples, sample scripts, default templates, and RTL Widgets files.</p>
                                                    <h2><strong>Latest Supporting Files : </strong></h2>
                                                    <h2><a title="IDS_Supporting_Files" href="https://www.portal.agnisys.com/release/support_file/idsdocs_enc_7.86.0.0.tar.gz" target="_blank">Mar_2024</a></h2>
                                                    <h3><strong><a name="IDS-Verify_Excemple" target="_blank"></a>&nbsp;IDS-Verify Example</strong> : <a title="IDS-Verify" href="https://www.portal.agnisys.com/release/idsdocs/examples/ARV/arv_example.zip" target="_blank">IDS-Verify_example.zip</a>&nbsp;: Contains Example for Automatic Register Verification</h3>
                                                 </div>
                                              </div>
                                                    <hr style="padding-left: 30px;">
                                                    <h1></h1>
                                                    <h1>IDS-NG™</h1>
                                                    <h3>Release 7.86.0.0 for Windows</h3>
                                                    <p style="padding-left: 30px;"><a title="IDSNG Win 7.86.0.0" href="https://www.portal.agnisys.com/release/idsnextgen/windows/IDSNextGen-7.86.0.0.exe" target="_blank">IDS-NG for Windows</a> | <a target="_blank"> 7da63185404c6a241a9cc38172caced9715ecb1c    </a></p>
                                                    <h3>Release 7.86.0.0 for Linux</h3>
                                                    <p style="padding-left: 30px;"><a title="IDSNG Linux 7.86.0.0" href="https://www.portal.agnisys.com/release/idsnextgen/linux/IDSNextGen-linux-7.86.0.0.zip" target="_blank">IDS-NG for Linux</a> | <a target="_blank"> 0e1587222d966b07df60ec5ee78ce6d919577d20   </a></p>
                                                    <h3>for Linux (.rpm)</h3>
                                                    <p style="padding-left: 30px;"><a title="IDSNG Linux 1.5.9 .rpm" href="http://portal.agnisys.com/release/idsnextgen/linux/IDSNextGen-1.6.2.0-0.x86_64.rpm" target="_blank">IDS-NG for Linux (.rpm)</a></p>
                                                    <hr style="padding-left: 30px;">
                                                    <h1><strong>ADS: Agnisys Documentation Server</strong></h1>
                                                    <h3 style="padding-left: 30px;">Release 1.3.0.0 | <a href="https://www.portal.agnisys.com/release/ads/ADS_1.3.0.0.zip" target="_blank">ADS</a> | <a target="_blank"> d0f9e6abc191148c1e4a57e575efbcbd7111a15b </a></h3>
                                                    <hr style="padding-left: 30px;">
                                                    <h1><strong>ALM: Agnisys License manager</strong></h1>
                                                    <h3 style="padding-left: 30px;">Release 2.9.0.0 | <a href="https://www.portal.agnisys.com/release/alm/ALM_2.9.0.0.zip" target="_blank">ALM_Server</a> | <a target="_blank"> 92b105920d88b750eac827863085b94c908c6f53 </a></h3>
                                                    <h3 style="padding-left: 30px;">Release 2.8.0.0 | <a href="https://www.portal.agnisys.com/release/alm/ALM_2.8.0.0.zip" target="_blank">ALM_Server</a> | <a target="_blank"> 8911476de690ba091ed8a594c6f09c048cd6e6bf </a></h3>
                                                    <h3 style="padding-left: 30px;">Release 2.7.1.0 | <a href="http://www.portal.agnisys.com/release/alm/ALM_2.7.1.0.zip" target="_blank">ALM_Server</a> | <a target="_blank"> 7a04ef540def274650865631e48f848bac3dc639 </a></h3>
                                                    <p style="padding-left: 30px;">Agnisys License Manager (ALM) is a web based license server that enables users to use floating licenses only. The node locked licenses and site licenses are still served by the old file based licenses.</p>
                                                    <h3 style="padding-left: 30px;"><a href="https://www.portal.agnisys.com/release/docs/ids/FloatingLicense1.html" target="_blank">Latest ALM Documentation</a></h3>
                                                    <hr style="padding-left: 30px;">
                                                    <h1><strong>A<b data-stringify-type="bold">gnisys Flex Licensing</b></strong></h1>
                                                    <p style="padding-left: 30px;">Agnisys Flex Licensing is based on FlexNet Publisher 11.17.1. There are two packages available for different version of RHEL as mentioned below:</p>
                                                    <h3 style="padding-left: 30px;">For Red Hat Linux 6 – Release 1.1 | <a href="https://www.portal.agnisys.com/release/agniflex/AgniFlex_11_17_1_RHEL6.tar.gz" target="_blank">AgniFlex RHEL6</a> | <a target="_blank"> c952b84a5a78bf85fb664a322146f79e5e64125f </a></h3>
                                                    <h3 style="padding-left: 30px;">For Red Hat Linux 7 – Release 1.1 | <a href="https://www.portal.agnisys.com/release/agniflex/AgniFlex_11_17_1_RHEL7.tar.gz" target="_blank">AgniFlex RHEL7</a> | <a target="_blank"> d57b4de19c26c3cf1b9b6e51ee258bd6b51f4463 </a></h3>
                                                    <h3 style="padding-left: 30px;">For Rocky Linux 9 – Release 1.1 | <a href="https://www.portal.agnisys.com/release/agniflex/AgniFlex_11_19_5_RHEL9.tar.gz" target="_blank">AgniFlex Rocky Linux 9</a> | <a target="_blank"> 764814cc87404f2f86e8109a9ec076c9ada285f0 </a></h3>
                                              <div class="wpb_text_column wpb_content_element ">
                                                 <div class="wpb_wrapper">
                                                    <h1></h1>
                                                    <h1>&nbsp;DVinsight</h1>
                                                    <h3>for Windows</h3><br>
                                                       <a title="DVinsight Win 3.4.2" href="https://www.portal.agnisys.com/release/dvi/windows/DVinsight-3.4.2.zip" target="_blank">DVi Windows</a> | <a target="_blank"> 10de065cb6af1862d79080f6eee5c73a86e82e41 </a><br>
                                                       <h2>for Linux</h2>
                                                    
                                                    <p><a title="DVinsight RHEL7" href="http://www.portal.agnisys.com/release/dvi/linux/rhel_7/DVinsight-3.4.0.tar.gz" target="_blank">RHEL7</a>&nbsp;| <a title="Ubuntu" href="http://www.portal.agnisys.com/release/dvi/linux/rhel_7/DVinsight-3.4.0.tar.gz" target="_blank">DVinsight Ubuntu</a> | <a target="_blank"> 1a5b533633710ac198eed61f89fb6a4b8869ff37 </a><br>
                                                       <a title="DVinsight RHEL6" href="http://www.portal.agnisys.com/release/dvi/linux/rhel_6/DVinsight-3.4.2.tar.gz" target="_blank">RHEL6</a> | <a target="_blank"> 5897c0dd7662151320e2287a240efc0b8ea829cd </a>
                                                    </p>
                                                    
                                                 </div>
                                              </div>
                                           </div>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                   <!-- #content -->
                </div>
                <!-- #page -->
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




