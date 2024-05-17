<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Agnisys - Dashboard</title>
        <link rel="icon" href="{{asset('/images/Favicon-100x100.png')}}" sizes="32x32" />
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
	    <!--Chat Bot styles -->
            </head>
    <body>

  @include('admin.includes.ag-header')

  <style>
      iframe{
          border:none;
          padding:0px 30px;
      }
      #page{
          background:#fff;
          margin:15px;
          margin-top:0px;
      }
      .vc_col-sm-4 {
            width: 33.33333333%;
            float: left;
            padding: 18px;
        }
        .modal-dialog {
            max-width: 600px;
            margin: 30px auto;
        }
        button.close {
            -webkit-appearance: none;
            padding: 0;
            cursor: pointer;
            background: 0 0;
            border: 0;
            position: absolute;
            right: 20px;
        }
        .modal-title{
            font-weight:400;
        }
  </style>
<div id="wrapper">
        @if(Session::get('role') == 'customer' || Session::get('role') == 'Customer' || Session::get('role') == 'Registered' || Session::get('role') == 'registered' )
          @include('admin.includes.sidebar')
        @else
          @include('admin.includes.side')
        @endif
        <div id="content-wrapper">
            <!--<iframe width="100%" height="100%" src="https://www.agnisys.com/new-videos/"></iframe>-->
            <div id="page" class="site site-wrapper wide-layout">
               <div id="wphash">
            
                  <div id="content" class="site-content">
                     <style>
                        html{
                        margin-top:0px;
                        }
                        
                     </style>
                     <div class="page-area ptb-80">
                        <div class="container">
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="vc_row wpb_row vc_row-fluid">
                                    <div class="wpb_column vc_column_container vc_col-sm-12">
                                       <div class="vc_column-inner ">
                                          <div class="wpb_wrapper">
                                             <div class="vc_empty_space" style="height: 32px"><span class="vc_empty_space_inner"></span></div>
                                             <div class="vc_empty_space" style="height: 32px"><span class="vc_empty_space_inner"></span></div>
                                             <div class="vc_row wpb_row vc_inner vc_row-fluid">
                                                <div class="wpb_column vc_column_container vc_col-sm-4">
                                                   <div class="vc_column-inner ">
                                                      <div class="wpb_wrapper">
                                                         <div class="wpb_text_column wpb_content_element ">
                                                            <div class="wpb_wrapper">
                                                               <p style="margin: 0in; margin-bottom: .0001pt; text-align: center;" align="center">AI based sequence detection for verification and validation of IP/SoCs</p>
                                                               <p style="text-align: center;"><a target="_blank"><img class="video-auth-check aligncenter wp-image-14009 size-full" src="{{asset('images/webminar/ai-sequences.png')}}" alt="AI based sequence detection for verification and validation of IP/SoCs" width="500" height="281" data-title="AI based sequence detection for verification and validation of IP/SoCs" data-toggle="modal" data-target="#myModal" data-link="https://www.agnisys.com/events/webinar-on-ai-based-sequence-detection-for-verification-and-validation-of-ipsocs/" data-video="https://www.portal.agnisys.com/images/webminar-videos/11-AI-based-sequence-detection-for-verification-and-validation-of-IP-SoCs.mp4"></a></p>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="wpb_column vc_column_container vc_col-sm-4">
                                                   <div class="vc_column-inner ">
                                                      <div class="wpb_wrapper">
                                                         <div class="wpb_text_column wpb_content_element ">
                                                            <div class="wpb_wrapper">
                                                               <p style="margin: 0in; margin-bottom: .0001pt; text-align: center;" align="center">Understanding clock domain<br>
                                                                  crossings
                                                               </p>
                                                               <p style="text-align: center;"><a target="_blank"><img loading="lazy" class="video-auth-check aligncenter wp-image-14029 size-full" src="{{asset('images/webminar/domain-crossing.png')}}" alt="Understanding clock domain crossings" width="500" height="281" data-title="Understanding clock domain crossings" data-toggle="modal" data-target="#myModal" data-link="https://www.agnisys.com/events/webinar-on-understanding-clock-domain-crossings/" data-video="https://www.portal.agnisys.com/images/webminar-videos/12-Understanding-Clock-Domain-Crossing-.mp4"></a></p>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="wpb_column vc_column_container vc_col-sm-4">
                                                   <div class="vc_column-inner ">
                                                      <div class="wpb_wrapper">
                                                         <div class="wpb_text_column wpb_content_element ">
                                                            <div class="wpb_wrapper">
                                                               <p class="page-title" style="text-align: center;">System Development Using<br>
                                                                  Agnisys<a target="_blank"><img loading="lazy" class="video-auth-check aligncenter wp-image-14029 size-full" src="{{asset('images/webminar/Korea-webinar-blog-compressed.jpeg')}}" alt="System Development Using Agnisys" width="500" height="281" data-title="System Development Using Agnisys" data-toggle="modal" data-target="#myModal" data-link="https://www.agnisys.com/events/webinar-on-system-development-using-agnisys/" data-video="https://www.portal.agnisys.com/images/webminar-videos/Korea-System-Development-Using-Agnisys.mp4"></a>
                                                               </p>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="vc_row wpb_row vc_inner vc_row-fluid">
                                                <div class="wpb_column vc_column_container vc_col-sm-4">
                                                   <div class="vc_column-inner ">
                                                      <div class="wpb_wrapper">
                                                         <div class="wpb_text_column wpb_content_element ">
                                                            <div class="wpb_wrapper">
                                                               <p style="margin: 0in; margin-bottom: .0001pt; text-align: center;" align="center">A flexible and customizable flow for IP connectivity and SoC design assembly</p>
                                                               <p style="text-align: center;"><a target="_blank"><img loading="lazy" class="video-auth-check aligncenter wp-image-13853 size-full" src="{{asset('images/webminar/Slip-g.png')}}" alt="A flexible and customizable flow for IP connectivity and SoC design assembly" width="500" height="281" data-title="A flexible and customizable flow for IP connectivity and SoC design assembly" data-toggle="modal" data-target="#myModal" data-link="https://www.agnisys.com/events/webinar-recording-on-a-flexible-and-customizable-flow-for-ip-connectivity-and-soc-design-assembly/" data-video="https://www.portal.agnisys.com/images/webminar-videos/8-A-flexible-and-customizable-flow-for-IP-connectivity-and-SoC-design-assembly.mp4"></a></p>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="wpb_column vc_column_container vc_col-sm-4">
                                                   <div class="vc_column-inner ">
                                                      <div class="wpb_wrapper">
                                                         <div class="wpb_text_column wpb_content_element ">
                                                            <div class="wpb_wrapper">
                                                               <p style="margin: 0in; margin-bottom: .0001pt; text-align: center;" align="center">Steps to setup RISC-V based SOC Verification Environment</p>
                                                               <p style="text-align: center;"><a target="_blank"><img loading="lazy" class="video-auth-check aligncenter wp-image-13952 size-full" src="{{asset('images/webminar/Soc-verification.png')}}" alt="Steps to setup RISC-V based SOC Verification Environment" width="500" height="281" data-title="Steps to setup RISC-V based SOC Verification Environment" data-toggle="modal" data-target="#myModal" data-link="https://www.agnisys.com/events/webinar-recording-on-steps-to-setup-risc-v-based-soc-verification-environment/" data-video="https://www.portal.agnisys.com/images/webminar-videos/9-Steps-to-set-up-a-RISC-V-based-SOC-verification-enviornment.mp4"></a></p>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="wpb_column vc_column_container vc_col-sm-4">
                                                   <div class="vc_column-inner ">
                                                      <div class="wpb_wrapper">
                                                         <div class="wpb_text_column wpb_content_element ">
                                                            <div class="wpb_wrapper">
                                                               <p style="margin: 0in; margin-bottom: .0001pt; text-align: center;" align="center">Automatic verification using Specta-AV – a boost to verification productivity</p>
                                                               <p style="text-align: center;"><a target="_blank"><img loading="lazy" class="video-auth-check aligncenter wp-image-13989 size-full" src="{{asset('images/webminar/specta-av.png')}}" alt="Automatic verification using Specta-AV - a boost to verification productivity" width="500" height="281" data-title="Automatic verification using Specta-AV - a boost to verification productivity" data-toggle="modal" data-target="#myModal" data-link="https://www.agnisys.com/events/webinar-on-automatic-verification-using-specta-av-a-boost-to-verification-productivity/" data-video="https://www.portal.agnisys.com/images/webminar-videos/10-Automatic-Verification-using-Specta-AV-_-A-boost-to-Verification-productivity.mp4"></a></p>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="vc_row wpb_row vc_inner vc_row-fluid">
                                                <div class="wpb_column vc_column_container vc_col-sm-4">
                                                   <div class="vc_column-inner ">
                                                      <div class="wpb_wrapper">
                                                         <div class="wpb_text_column wpb_content_element ">
                                                            <div class="wpb_wrapper">
                                                               <p style="margin: 0in; margin-bottom: .0001pt; text-align: center;" align="center">Advanced UVM RAL – callbacks, auto-mirroring, coverage model, and more</p>
                                                               <p style="text-align: center;"><a target="_blank"><img loading="lazy" class="video-auth-check aligncenter wp-image-13853 size-full" src="{{asset('images/webminar/Uvmral.png')}}" alt="Advanced UVM RAL – callbacks, auto-mirroring, coverage model, and more" width="500" height="281" data-title="Advanced UVM RAL – callbacks, auto-mirroring, coverage model, and more" data-toggle="modal" data-target="#myModal" data-link="https://www.agnisys.com/events/webinar-recording-on-advanced-uvm-ral-callbacks-auto-mirroring-coverage-model-and-more/" data-video="https://www.portal.agnisys.com/images/webminar-videos/5-Advanced-UVM-RAL-callbacks-auto-mirroring-coverage-model-and-more.mp4"></a></p>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="wpb_column vc_column_container vc_col-sm-4">
                                                   <div class="vc_column-inner ">
                                                      <div class="wpb_wrapper">
                                                         <div class="wpb_text_column wpb_content_element ">
                                                            <div class="wpb_wrapper">
                                                               <p style="margin: 0in; margin-bottom: .0001pt; text-align: center;" align="center">Functional safety and security in embedded systems</p>
                                                               <p style="text-align: center;"><a target="_blank"><img loading="lazy" class="video-auth-check aligncenter wp-image-13867" src="{{asset('images/webminar/functionalsafety.png')}}" alt="Functional safety and security in embedded systems" width="500" height="281" data-title="Functional safety and security in embedded systems" data-toggle="modal" data-target="#myModal" data-link="https://www.agnisys.com/events/functional-safety-and-security-in-embedded-systems/" data-video="https://www.portal.agnisys.com/images/webminar-videos/6-Functional-safety-and-security-in-embedded-systems.mp4"></a></p>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="wpb_column vc_column_container vc_col-sm-4">
                                                   <div class="vc_column-inner ">
                                                      <div class="wpb_wrapper">
                                                         <div class="wpb_text_column wpb_content_element ">
                                                            <div class="wpb_wrapper">
                                                               <p style="margin: 0in; margin-bottom: .0001pt; text-align: center;" align="center">IP generators –<br>
                                                                  the next wave of design creation
                                                               </p>
                                                               <p style="text-align: center;"><a target="_blank"><img loading="lazy" class="video-auth-check aligncenter wp-image-13910" src="{{asset('images/webminar/ip-generators.png')}}" alt="IP generators – the next wave of design creation" width="500" height="281" data-title="IP generators – the next wave of design creation" data-toggle="modal" data-target="#myModal" data-link="https://www.agnisys.com/events/webinar-recording-on-ip-generators-the-next-wave-of-design-creation/" data-video="https://www.portal.agnisys.com/images/webminar-videos/7-IP-generators-the-next-wave-of-design-creation.mp4"></a></p>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="vc_row wpb_row vc_inner vc_row-fluid">
                                                <div class="wpb_column vc_column_container vc_col-sm-4">
                                                   <div class="vc_column-inner ">
                                                      <div class="wpb_wrapper">
                                                         <div class="wpb_text_column wpb_content_element ">
                                                            <div class="wpb_wrapper">
                                                               <p style="margin: 0in; margin-bottom: .0001pt; text-align: center;" align="center">Creating portable UVM sequences with ISequenceSpec</p>
                                                               <p style="text-align: center;"><a target="_blank"><img loading="lazy" class="video-auth-check aligncenter wp-image-13780 size-full" src="{{asset('images/webminar/ISS.png')}}" alt="Creating portable UVM sequences with ISequenceSpec" width="500" height="281" data-title="Creating portable UVM sequences with ISequenceSpec" data-toggle="modal" data-target="#myModal" data-link="https://www.agnisys.com/events/webinar-recording-on-creating-portable-uvm-sequences-with-isequencespec/" data-video="https://www.portal.agnisys.com/images/webminar-videos/2-Creating-portable-UVM-sequences-with-ISequenceSpec.mp4"></a></p>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="wpb_column vc_column_container vc_col-sm-4">
                                                   <div class="vc_column-inner ">
                                                      <div class="wpb_wrapper">
                                                         <div class="wpb_text_column wpb_content_element ">
                                                            <div class="wpb_wrapper">
                                                               <p style="margin: 0in; margin-bottom: .0001pt; text-align: center;" align="center">Register automation from SystemRDL to PSS – Basic to Pro</p>
                                                               <p style="text-align: center;"><a target="_blank"><img loading="lazy" class="video-auth-check aligncenter wp-image-13783" src="{{asset('images/webminar/Specta-AV (1).png')}}" alt="Register automation from SystemRDL to PSS – Basic to Pro" width="500" height="281" data-title="Register automation from SystemRDL to PSS – Basic to Pro" data-toggle="modal" data-target="#myModal" data-link="https://www.agnisys.com/events/webinar-recording-on-register-automation-from-systemrdl-to-pss-basic-to-pro/" data-video="https://www.portal.agnisys.com/images/webminar-videos/3-Register-automation-from-SystemRDL-to-PSS-Basic-to-Pro.mp4"></a></p>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="wpb_column vc_column_container vc_col-sm-4">
                                                   <div class="vc_column-inner ">
                                                      <div class="wpb_wrapper">
                                                         <div class="wpb_text_column wpb_content_element ">
                                                            <div class="wpb_wrapper">
                                                               <p style="margin: 0in; margin-bottom: .0001pt; text-align: center;" align="center">Cross platform specification to code generation for IP/SoC with IDS-NG</p>
                                                               <p style="text-align: center;"><a target="_blank"><img loading="lazy" class="video-auth-check aligncenter wp-image-13799" src="{{asset('images/webminar/IDS-ng.png')}}" alt="Cross platform specification to code generation for IP/SoC with IDS-NG" width="500" height="281" data-title="Cross platform specification to code generation for IP/SoC with IDS-NG" data-toggle="modal" data-target="#myModal" data-link="https://www.agnisys.com/events/webinar-on-cross-platform-specification-to-code-generation-for-ipsoc-with-ids-ng/" data-video="https://www.portal.agnisys.com/images/webminar-videos/4-Cross-platform-specification-to-code-generation-for-IP-SoC-with-IDS-NG.mp4"></a></p>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="vc_row wpb_row vc_inner vc_row-fluid">
                                                <div class="wpb_column vc_column_container vc_col-sm-4">
                                                   <div class="vc_column-inner ">
                                                      <div class="wpb_wrapper">
                                                         <div class="wpb_text_column wpb_content_element ">
                                                            <div class="wpb_wrapper">
                                                               <p style="margin: 0in; margin-bottom: .0001pt; text-align: center;" align="center">Introduction to SystemRDL</p>
                                                               <p style="margin: 0in; margin-bottom: .0001pt; text-align: center;" align="center">(Part 2)</p>
                                                               <p style="text-align: center;"><a target="_blank"><img loading="lazy" class="video-auth-check aligncenter wp-image-13165 size-full" src="{{asset('images/webminar/Systemrdl-part2.png')}}" alt="Recorded Webinar-Introduction to SystemRDL Part-2" width="500" height="281" data-title="Introduction to SystemRDL Part-2" data-toggle="modal" data-target="#myModal" data-link="https://www.agnisys.com/events/webinar-introduction-to-systemrdl-part-2/" data-video="http://www.agnisys.com/wp-content/uploads/2019/11/Agnisys-Recorded-Webinar-Introduction-to-SystemRDL-Part-2.mp4"></a></p>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="wpb_column vc_column_container vc_col-sm-4">
                                                   <div class="vc_column-inner ">
                                                      <div class="wpb_wrapper">
                                                         <div class="wpb_text_column wpb_content_element ">
                                                            <div class="wpb_wrapper">
                                                               <p style="margin: 0in; margin-bottom: .0001pt; text-align: center;" align="center">Introduction to Automatic Register Verification (ARV)</p>
                                                               <p style="text-align: center;"><a target="_blank"><img loading="lazy" class="video-auth-check aligncenter wp-image-13779 size-full" src="{{asset('images/webminar/ARV.png')}}" alt="Introduction to Automatic Register Verification (ARV)" width="500" height="281" data-title="Introduction to Automatic Register Verification (ARV)" data-toggle="modal" data-target="#myModal" data-link="https://www.agnisys.com/events/live-webinar-on-automatic-register-verification-arv/" data-video="https://www.agnisys.com/wp-content/uploads/2020/03/Introduction-to-Automatic-Register-Verification-ARV.mp4"></a></p>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="wpb_column vc_column_container vc_col-sm-4">
                                                   <div class="vc_column-inner ">
                                                      <div class="wpb_wrapper">
                                                         <div class="wpb_text_column wpb_content_element ">
                                                            <div class="wpb_wrapper">
                                                               <p style="margin: 0in; margin-bottom: .0001pt; text-align: center;" align="center">Correct by construction SV UVM code with DVinsight -a smart editor</p>
                                                               <p style="text-align: center;"><a target="_blank"><img loading="lazy" class="video-auth-check aligncenter wp-image-13777 size-full" src="{{asset('images/webminar/Dvinsighr-1.png')}}" alt="Correct by construction SV UVM code with DVinsight - a smart editor" width="500" height="281" data-title="Correct by construction SV UVM code with DVinsight - a smart editor" data-toggle="modal" data-target="#myModal" data-link="https://www.agnisys.com/events/webinar-recording-on-correct-by-construction-sv-uvm-code-with-dvinsight-a-smart-editor/" data-video="https://www.portal.agnisys.com/images/webminar-videos/Correct-by-construction-SV-UVM-code-with-DVinsight-a-smart-editor.mp4"></a></p>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="vc_row wpb_row vc_inner vc_row-fluid">
                                                <div class="wpb_column vc_column_container vc_col-sm-4">
                                                   <div class="vc_column-inner ">
                                                      <div class="wpb_wrapper">
                                                         <div class="wpb_text_column wpb_content_element ">
                                                            <div class="wpb_wrapper">
                                                               <p style="margin: 0in; margin-bottom: .0001pt; text-align: center;" align="center">Introduction to SystemRDL</p>
                                                               <p style="margin: 0in; margin-bottom: .0001pt; text-align: center;" align="center">(Part 1)</p>
                                                               <p style="text-align: center;"><img loading="lazy" class="video-auth-check aligncenter wp-image-13165 size-full" src="{{asset('images/webminar/Recorded-Webinar-Introduction-to-SystemRDL-Part-1-768x432.png')}}" alt="Recorded Webinar-Introduction to SystemRDL Part-1" width="500" height="281" data-title="Introduction to SystemRDL Part-1" data-toggle="modal" data-target="#myModal" data-link="https://www.agnisys.com/events/webinar-introduction-to-systemrdl-part-1/" data-video="https://www.portal.agnisys.com/images/webminar-videos/Agnisys-Recorded-Webinar-Introduction-to-SystemRDL-Part-1.mp4"></p>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="wpb_column vc_column_container vc_col-sm-4">
                                                   <div class="vc_column-inner ">
                                                      <div class="wpb_wrapper">
                                                         <div class="wpb_text_column wpb_content_element ">
                                                            <div class="wpb_wrapper">
                                                               <p style="text-align: center;">Register Verification – Tips and Tricks in IDesignSpec<img loading="lazy" class="video-auth-check aligncenter wp-image-13165 size-full" src="{{asset('images/webminar/Register-Verification-Tips-and-Tricks-in-IDesignSpec-e1570765190539.png')}}" alt="Register Verification Tips and Tricks in IDesignSpec" width="500" height="281" data-title="Register Verification - Tips and Tricks in IDesignSpec" data-toggle="modal" data-target="#myModal" data-link="https://www.agnisys.com/events/webinar-register-verification-tips-and-tricks-in-idesignspec/" data-video="https://www.portal.agnisys.com/images/webminar-videos/Agnisys-Webinar-Register-Verification-Tips-and-Tricks-in-IDesignSpec.mp4" ></p>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="wpb_column vc_column_container vc_col-sm-4">
                                                   <div class="vc_column-inner ">
                                                      <div class="wpb_wrapper">
                                                         <div class="wpb_text_column wpb_content_element ">
                                                            <div class="wpb_wrapper">
                                                               <p style="text-align: center;">Register Design –<br>
                                                                  Tips and Tricks in IDesignSpec<img loading="lazy" class="video-auth-check aligncenter wp-image-13177" src="{{asset('images/webminar/Recorded-Webinar-Register-Design-Tips-Tricks-IDesignSpec-768x432.png')}}" alt="Recorded Webinar Register Design Tips Tricks IDesignSpec" width="500" height="281" data-title="Register Design - Tips and Tricks in IDesignSpec" data-toggle="modal" data-target="#myModal" data-link="http://www.agnisys.com/events/webinar-register-verification-tips-and-tricks-in-idesignspec/" data-video="https://www.portal.agnisys.com/images/webminar-videos/Webinar-Register-Design-Tips-and-Tricks-in-IDesignSpec.mp4" >
                                                               </p>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="vc_row wpb_row vc_inner vc_row-fluid">
                                                <div class="wpb_column vc_column_container vc_col-sm-4">
                                                   <div class="vc_column-inner ">
                                                      <div class="wpb_wrapper">
                                                         <div class="wpb_text_column wpb_content_element ">
                                                            <div class="wpb_wrapper">
                                                               <p class="page-title" style="text-align: center;">Registers and Sequences: Design/Verification Best-Practices for Vertical Reuse<img loading="lazy" class="video-auth-check aligncenter wp-image-13182" src="{{asset('images/webminar//Presented-by_-Amanjyot-Kaur-Agnisys-RD-Engineer-5-768x432.png')}}" alt="Recorded Webinar Registers and Sequences" width="500" height="281" data-title="Registers and Sequences" data-toggle="modal" data-target="#myModal" data-link="https://www.agnisys.com/events/webinar-registers-and-sequences-designverification-best-practices-for-vertical-reuse/" data-video="https://www.portal.agnisys.com/images/webminar-videos/Registers-and-Sequences_-Design-Verification-Best-Practices-for-Vertical-Reuse.mp4" ></p>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="wpb_column vc_column_container vc_col-sm-4">
                                                   <div class="vc_column-inner ">
                                                      <div class="wpb_wrapper">
                                                         <div class="wpb_text_column wpb_content_element ">
                                                            <div class="wpb_wrapper">
                                                               <p style="text-align: center;">Generate Portable Sequences from a Golden Specification<img loading="lazy" class="video-auth-check aligncenter wp-image-14383" src="{{asset('images/webminar/Agnisys-banner-768x432.png')}}" alt="" width="500" height="281" data-title="Generate Portable Sequences from a Golden Specification" data-toggle="modal" data-target="#myModal" data-link="https://www.agnisys.com/events/webinar-generate-portable-sequences-from-a-golden-specification/" data-video="https://www.portal.agnisys.com/images/webminar-videos/Generate-Portable-Sequences-from-a-Golden-Specification.mp4"></p>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="wpb_column vc_column_container vc_col-sm-4">
                                                   <div class="vc_column-inner ">
                                                      <div class="wpb_wrapper">
                                                         <div class="wpb_text_column wpb_content_element ">
                                                            <div class="wpb_wrapper">
                                                               <p style="text-align: center;">5 Special Registers Useful for Today’s SoCs – Use Cases, Examples &amp; UVM Verification<img loading="lazy" class="video-auth-check aligncenter wp-image-13183" src="{{asset('images/webminar/Recorded-Webinar-5-Special-Registers-Useful-for-Todays-SoCs-1-768x432.png')}}" alt="Recorded Webinar 5 Special Registers Useful for Todays SoCs" width="500" height="281" data-title="5 Special Registers Useful for Today’s SoCs" data-toggle="modal" data-target="#myModal" data-link="https://www.agnisys.com/events/webinar-5-special-registers-useful-for-todays-socs-use-cases-examples-and-uvm-verification-best-practices/" data-video="https://www.portal.agnisys.com/images/webminar-videos/5-Special-Registers-Useful-for-Today’s-SoCs-–-Use-Cases-Examples-and-UVM-Verification-Best-Practices.mp4" ></p>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="vc_row wpb_row vc_inner vc_row-fluid">
                                                <div class="wpb_column vc_column_container vc_col-sm-4">
                                                   <div class="vc_column-inner ">
                                                      <div class="wpb_wrapper">
                                                         <div class="wpb_text_column wpb_content_element ">
                                                            <div class="wpb_wrapper">
                                                               <p style="text-align: center;">Hardware/Software Interface<br>
                                                                  (HSI) Specification<img loading="lazy" class="video-auth-check aligncenter wp-image-13178" src="{{asset('images/webminar/Presented-by_-Amanjyot-Kaur-Agnisys-RD-Engineer-3-768x432.png')}}" alt="Recorded Webinar Hardware Software interface HSI" width="500" height="281" data-toggle="modal" data-target="#myModal" data-title="Hardware Software Interface" data-video="https://www.portal.agnisys.com/images/webminar-videos/HSI-Webinar-Recording.mp4" data-link="https://www.agnisys.com/events/hardware-software-interface-hsi-specification-and-productivity-improvement-webinar/" sizes="(max-width: 500px) 100vw, 500px">
                                                               </p>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="wpb_column vc_column_container vc_col-sm-4">
                                                   <div class="vc_column-inner ">
                                                      <div class="wpb_wrapper">
                                                         <div class="wpb_text_column wpb_content_element ">
                                                            <div class="wpb_wrapper">
                                                               <p style="text-align: center;">Anupam Bakshi at DAC 2018<br>
                                                                  EDA Cafe
                                                               </p>
                                                            </div>
                                                         </div>
                                                         <div class="wpb_video_widget wpb_content_element vc_clearfix   vc_custom_1573452161868 vc_video-aspect-ratio-169 vc_video-el-width-70 vc_video-align-center">
                                                            <div class="wpb_wrapper">
                                                               <div class="wpb_video_wrapper"><iframe width="640" height="360" src="https://www.youtube.com/embed/OA26pAPq5tw?start=2&amp;feature=oembed" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe></div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="wpb_column vc_column_container vc_col-sm-4">
                                                   <div class="vc_column-inner ">
                                                      <div class="wpb_wrapper">
                                                         <div class="wpb_text_column wpb_content_element ">
                                                            <div class="wpb_wrapper">
                                                               <p style="text-align: center;">Fish Fry with Amelia Dalton<br>
                                                                  at DAC 2018
                                                               </p>
                                                            </div>
                                                         </div>
                                                         <div class="wpb_video_widget wpb_content_element vc_clearfix   vc_custom_1573452216324 vc_video-aspect-ratio-169 vc_video-el-width-70 vc_video-align-center">
                                                            <div class="wpb_wrapper">
                                                               <div class="wpb_video_wrapper"><iframe width="640" height="480" src="https://www.youtube.com/embed/40XtU4SAH2U?start=151&amp;feature=oembed" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe></div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="vc_row wpb_row vc_inner vc_row-fluid">
                                                <div class="wpb_column vc_column_container vc_col-sm-4">
                                                   <div class="vc_column-inner ">
                                                      <div class="wpb_wrapper">
                                                         <div class="wpb_text_column wpb_content_element ">
                                                            <div class="wpb_wrapper">
                                                               <p style="text-align: center;">Auto-generate Implementation-level Sequences for Portable Stimulus Tools</p>
                                                            </div>
                                                         </div>
                                                         <div class="wpb_video_widget wpb_content_element vc_clearfix   vc_custom_1573452543743 vc_video-aspect-ratio-169 vc_video-el-width-70 vc_video-align-center">
                                                            <div class="wpb_wrapper">
                                                               <div class="wpb_video_wrapper"><iframe width="640" height="360" src="https://www.youtube.com/embed/gyUMU0tyI_k?feature=oembed" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe></div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="wpb_column vc_column_container vc_col-sm-4">
                                                   <div class="vc_column-inner ">
                                                      <div class="wpb_wrapper">
                                                         <div class="wpb_text_column wpb_content_element ">
                                                            <div class="wpb_wrapper">
                                                               <p style="text-align: center;">Agnisys Inc. – Leading Electronic Design Automation (EDA)</p>
                                                            </div>
                                                         </div>
                                                         <div class="wpb_video_widget wpb_content_element vc_clearfix   vc_custom_1573452354922 vc_video-aspect-ratio-169 vc_video-el-width-70 vc_video-align-center">
                                                            <div class="wpb_wrapper">
                                                               <div class="wpb_video_wrapper"><iframe width="640" height="360" src="https://www.youtube.com/embed/RMvynJaMwl0?start=14&amp;feature=oembed" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe></div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="wpb_column vc_column_container vc_col-sm-4">
                                                   <div class="vc_column-inner ">
                                                      <div class="wpb_wrapper">
                                                         <div class="wpb_text_column wpb_content_element ">
                                                            <div class="wpb_wrapper">
                                                               <p class="wpb_heading wpb_video_heading" style="text-align: center;">DVInsight-Pro – Design Verification Editor Checker for SV/UVM</p>
                                                            </div>
                                                         </div>
                                                         <div class="wpb_video_widget wpb_content_element vc_clearfix   vc_custom_1573452367950 vc_video-aspect-ratio-169 vc_video-el-width-70 vc_video-align-center">
                                                            <div class="wpb_wrapper">
                                                               <div class="wpb_video_wrapper"><iframe width="640" height="360" src="https://www.youtube.com/embed/L-sua6Ykvi8?feature=oembed" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe></div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="vc_row wpb_row vc_inner vc_row-fluid">
                                                <div class="wpb_column vc_column_container vc_col-sm-4">
                                                   <div class="vc_column-inner ">
                                                      <div class="wpb_wrapper">
                                                         <div class="wpb_text_column wpb_content_element ">
                                                            <div class="wpb_wrapper">
                                                               <p style="text-align: center;">Verifying Registers using UVM<br>
                                                                  and IDesignSpec
                                                               </p>
                                                            </div>
                                                         </div>
                                                         <div class="wpb_video_widget wpb_content_element vc_clearfix   vc_custom_1573452382040 vc_video-aspect-ratio-169 vc_video-el-width-70 vc_video-align-center">
                                                            <div class="wpb_wrapper">
                                                               <div class="wpb_video_wrapper"><iframe width="640" height="480" src="https://www.youtube.com/embed/eARWRcCOy3k?start=3&amp;feature=oembed" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe></div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="wpb_column vc_column_container vc_col-sm-4">
                                                   <div class="vc_column-inner ">
                                                      <div class="wpb_wrapper">
                                                         <div class="wpb_text_column wpb_content_element ">
                                                            <div class="wpb_wrapper">
                                                               <p style="text-align: center;">How to create parameterized specification for semiconductor IP Design</p>
                                                            </div>
                                                         </div>
                                                         <div class="wpb_video_widget wpb_content_element vc_clearfix   vc_custom_1573452393092 vc_video-aspect-ratio-169 vc_video-el-width-70 vc_video-align-center">
                                                            <div class="wpb_wrapper">
                                                               <div class="wpb_video_wrapper"><iframe width="640" height="360" src="https://www.youtube.com/embed/tabeKddaJTk?start=24&amp;feature=oembed" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe></div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="wpb_column vc_column_container vc_col-sm-4">
                                                   <div class="vc_column-inner ">
                                                      <div class="wpb_wrapper">
                                                         <div class="wpb_text_column wpb_content_element ">
                                                            <div class="wpb_wrapper">
                                                               <div id="related" class="style-scope ytd-watch" style="text-align: center;">
                                                                  <p>&nbsp;<span style="text-align: center;">IDesignSpec<br>
                                                                     Register Generator</span>
                                                                  </p>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="wpb_video_widget wpb_content_element vc_clearfix   vc_custom_1573452436139 vc_video-aspect-ratio-169 vc_video-el-width-70 vc_video-align-center">
                                                            <div class="wpb_wrapper">
                                                               <div class="wpb_video_wrapper"><iframe width="640" height="480" src="https://www.youtube.com/embed/3AJlNgnC1Aw?feature=oembed" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe></div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="vc_row wpb_row vc_inner vc_row-fluid">
                                                <div class="wpb_column vc_column_container vc_col-sm-4">
                                                   <div class="vc_column-inner ">
                                                      <div class="wpb_wrapper">
                                                         <div class="wpb_text_column wpb_content_element ">
                                                            <div class="wpb_wrapper">
                                                               <p style="text-align: center;">Automatically Generate UVM Code From A Specification w/ IDesignSpec</p>
                                                            </div>
                                                         </div>
                                                         <div class="wpb_video_widget wpb_content_element vc_clearfix   vc_custom_1573451965409 vc_video-aspect-ratio-169 vc_video-el-width-70 vc_video-align-center">
                                                            <div class="wpb_wrapper">
                                                               <div class="wpb_video_wrapper"><iframe width="640" height="360" src="https://www.youtube.com/embed/gEgJQoXOsFs?feature=oembed" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe></div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="wpb_column vc_column_container vc_col-sm-4">
                                                   <div class="vc_column-inner ">
                                                      <div class="wpb_wrapper">
                                                         <div class="wpb_text_column wpb_content_element ">
                                                            <div class="wpb_wrapper">
                                                               <p style="text-align: center;">Chalk Talk with EE Journal</p>
                                                            </div>
                                                         </div>
                                                         <div class="wpb_video_widget wpb_content_element vc_clearfix   vc_video-aspect-ratio-169 vc_video-el-width-70 vc_video-align-center">
                                                            <div class="wpb_wrapper">
                                                               <div class="wpb_video_wrapper"><iframe width="640" height="360" src="https://www.youtube.com/embed/_8e163ok2sU?feature=oembed" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe></div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="wpb_column vc_column_container vc_col-sm-4">
                                                   <div class="vc_column-inner ">
                                                      <div class="wpb_wrapper">
                                                         <div class="wpb_text_column wpb_content_element ">
                                                            <div class="wpb_wrapper">
                                                               <p style="text-align: center;">EDA Cafe – DAC 2015</p>
                                                            </div>
                                                         </div>
                                                         <div class="wpb_video_widget wpb_content_element vc_clearfix   vc_video-aspect-ratio-169 vc_video-el-width-70 vc_video-align-center">
                                                            <div class="wpb_wrapper">
                                                               <div class="wpb_video_wrapper"><iframe width="640" height="360" src="https://www.youtube.com/embed/DG9l36w3Xx0?feature=oembed" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe></div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="wpb_column vc_column_container vc_col-sm-12">
                                       <div class="vc_column-inner ">
                                          <div class="wpb_wrapper"></div>
                                       </div>
                                    </div>
                                    <div class="wpb_column vc_column_container vc_col-sm-12">
                                       <div class="vc_column-inner ">
                                          <div class="wpb_wrapper"></div>
                                       </div>
                                    </div>
                                    <div class="wpb_column vc_column_container vc_col-sm-12">
                                       <div class="vc_column-inner ">
                                          <div class="wpb_wrapper"></div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <script>
                        jQuery(document).ready(function(){
                            jQuery('a').attr('target', '_blank');
                            jQuery('.vc_tta-tab a').removeAttr('target');
                        })
                     </script>
                     <!-- Modal -->
                     <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                           <!-- Modal content-->
                           <div class="modal-content">
                              <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal">×</button>
                                 <h4 class="modal-title" style="display: inline-block;"></h4>
                              </div>
                              <div class="modal-body video-source">
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                           </div>
                        </div>
                     </div>
                     
                  </div>
                  <!-- #content -->
                  
               </div>
               <!-- #page -->
            </div>
            </div>
            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
              <div class="modal-dialog">
            
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title" style="display: inline-block;"></h4>
                  </div>
                  <div class="modal-body video-source">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
            
              </div>
            </div>
            <script type="text/javascript">
              jQuery(document).ready(function(){
                jQuery(".video-auth-check").click(function(){
                  var link = jQuery(this).attr('data-link');
                  var video = jQuery(this).attr('data-video');
                  var title = jQuery(this).attr('data-title');
                  
                  var compSrc = "<video width='100%' height='auto' controls><source src='"+video+"' type='video/mp4' class='video-source'></video>";
                  jQuery("#myModal .video-source").html(compSrc);
                  jQuery("#myModal .modal-title").text(title);
                })
            
                jQuery("#myModal button").click(function(){
                  jQuery("#myModal .video-source").html('');
                })
              })
              
            
            
            </script>
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