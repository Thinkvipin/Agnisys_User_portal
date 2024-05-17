<!-- Sidebar -->
<ul class="sidebar navbar-nav">
        <li class="nav-item @if($page == 1){{__('active show')}}@endif">
          <a class="nav-link" href="{{ URL::to('dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        {{--<li class="nav-item dropdown @if($page == 7){{__('active show')}}@endif">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Users</span>
          </a>
          <div class="dropdown-menu @if($page == 7){{__('active show')}}@endif" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="{{ URL::to('dashboard')}}/all-employees">All Users</a>
            <a class="dropdown-item" href="{{ URL::to('dashboard')}}/add-employee">Add user request </a>
          </div>
        </li> --}}
        {{--<li class="nav-item dropdown @if($page == 3){{__('active show')}}@endif">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Discussions</span>
          </a>
          <div class="dropdown-menu @if($page == 3){{__('active show')}}@endif" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="{{ URL::to('dashboard')}}/all-issues">All discussions<span class="dropdown-pin bg-success" >{{ Session::get('TotalIssues') }}</span></a>
            <a class="dropdown-item" href="{{ URL::to('dashboard')}}/active-issues">Active discussions<span class="dropdown-pin bg-info" >{{ Session::get('TotalActive') }}</span></a>
          </div>
        </li> --}}
        <li class="nav-item @if($page == 4){{__('active show')}}@endif">
                <a class="nav-link" href="{{ URL::to('dashboard')}}/cases">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Fogbugz Cases</span></a>
        </li>
        {{-- <li class="nav-item">
                <a class="nav-link" href="{{ URL::to('dashboard')}}/all-notifications">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Notification</span></a>
        </li> --}}
        <li class="nav-item dropdown @if($page == 8){{__('active show')}}@endif">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>License</span>
                </a>
                <div class="dropdown-menu @if($page == 8){{__('active show')}}@endif" aria-labelledby="pagesDropdown">
                        <a class="dropdown-item" href="{{ URL::to('dashboard')}}/all-licenses">All License</a>
                        <a class="dropdown-item" href="{{ URL::to('dashboard')}}/license-request">Licenses request</a>

                </div>
                
        </li>
        <li class="nav-item dropdown @if($page == 10){{__('active show')}}@endif">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>FTP</span>
                </a>
                <div class="dropdown-menu @if($page == 10){{__('active show')}}@endif" aria-labelledby="pagesDropdown">
                        <a class="dropdown-item" href="{{ URL::to('dashboard')}}/all-ftp">All FTP/SFTP</a>
                        <a class="dropdown-item" href="{{ URL::to('dashboard')}}/ftp-request">FTP/SFTP request</a>
                </div>
                
        </li>
        @if(Session::get('company') == 'agnisys')
        <li class="nav-item">
                        <a class="nav-link " href="javascript:void(0)" onclick="Go_to_Wp_LMS();">
                                <i class="fas fa-fw fa-folder"></i>
                                <span>LMS</span></a>
        </li>
        @endif
        <li class="nav-item @if($page == 15){{__('active show')}}@endif">
                <a class="nav-link" href="{{ URL::to('dashboard')}}/agnisys-tools-family" >
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Agnisys Tools Family</span>
                </a>
                <!--<div class="dropdown-menu @if($page == 15){{__('active show')}}@endif" aria-labelledby="pagesDropdown">-->
                <!--        <a class="dropdown-item" href="{{ URL::to('dashboard')}}/agnisys-family-tool">Agnisys Tools</a>-->
                <!--        <a class="dropdown-item" href="{{ URL::to('dashboard')}}/download-software">Download Software</a>-->
                <!--        <a class="dropdown-item" target="_blank" href="https://www.agnisys.com/release/docs/ids/IDesignSpec%20(c)%202007-2018%20Agnisys,%20Inc..html?Ver6800.html">IDesignSpec Documentation</a>-->
                <!--        <a class="dropdown-item" href="https://www.agnisys.com/release/support_file/idsdocs_enc_6.18.0.0.tar.gz">IDesignSpec Supporting Files</a>-->
                <!--        <a class="dropdown-item" target="_blank" href="https://www.agnisys.com/release/iss/ISequenceSpec_appnote_1.pdf">ISequenceSpec Introduction</a>-->
                <!--        <a class="dropdown-item" target="_blank" href="https://www.agnisys.com/release/docs/ids/IDesignSpec%20(c)%202007-2018%20Agnisys,%20Inc..html?ISequenceSpecISS.html">ISequenceSpec Documentation</a>-->
                <!--        <a class="dropdown-item" target="_blank" href="https://www.agnisys.com/release/docs/ids/IDSNextGenIDSNG.html">IDS NextGen Documentation</a>-->
                <!--        <a class="dropdown-item" href="https://www.agnisys.com/release/support_file/idsdocs_encmay2.9.zip">IDS NextGen Supporting File </a>-->
                <!--        <a class="dropdown-item" target="_blank" href="https://www.agnisys.com/release/dvi/docs/DVinsight.html">DVi Documentation</a>-->
                <!--        <a class="dropdown-item" target="_blank" href="https://www.agnisys.com/release/docs/ids/IDesignSpec%20(c)%202007-2018%20Agnisys,%20Inc..html?ARVSim.html?search=arv">ARV Documentation</a>-->
                <!--        <a class="dropdown-item" href="https://www.agnisys.com/release/support_file/idsdocs_encmay2.9.zip">ARV Supporting Files</a>-->
                <!--        <a class="dropdown-item" target="_blank" href="https://www.agnisys.com/release/docs/ids/IDesignSpec%20(c)%202007-2018%20Agnisys,%20Inc..html?FloatingLicense.html">Agnisys License Manager</a>-->
                <!--        <a class="dropdown-item" target="_blank" href="https://www.agnisys.com/release/idsdocs/Article_on_Automation_of_constraint_Assertion_Coverage.pdf">Article </a>-->
                <!--        <a class="dropdown-item" href="{{ URL::to('dashboard')}}/troubleshooting-tool-installation">Troubleshooting Tool Installation</a>-->
                        
                <!--</div>-->
                
        </li>
        <li class="nav-item @if($page == 17){{__('active show')}}@endif">
                        <a class="nav-link " href="{{ URL::to('dashboard')}}/agnisys-webinar">
                                <i class="fas fa-fw fa-folder"></i>
                                <span>Agnisys Webinar</span></a>
        </li>
        <li class="nav-item @if($page == 16){{__('active show')}}@endif">
                <a class="nav-link " href="{{ URL::to('dashboard')}}/IDesignSpecVideo" >
                        <i class="fas fa-fw fa-folder"></i>
                        <span>IDS Training Videos</span>
                </a>
                <!--<div class="dropdown-menu @if($page == 16){{__('active show')}}@endif" aria-labelledby="pagesDropdown">-->
                        
                        <!--<a class="dropdown-item" target="_blank" href="https://www.agnisys.com/agnisys-webinar-videos/#AgnisysIDesignSpec">Agnisys Webinar</a>-->
                        <!--<a class="dropdown-item" target="_blank" href="https://www.agnisys.com/agnisys-webinar-videos/#HowToAutomatically">How To Automatically Generate UVM Code From A Specification With IDesignSpec</a>-->
                        <!--<a class="dropdown-item" target="_blank" href="https://www.agnisys.com/agnisys-webinar-videos/#Howtocreate">How to create parameterized specification for semiconductor IP Design</a>-->
                        <!-- <a class="dropdown-item" target="_blank" href="https://www.agnisys.com/idesignspec-old-videos/">IDS Old Videos</a> -->
                <!--        <a class="dropdown-item"  target="_blank" href="https://www.agnisys.com/idesignspec-training-videos-old1/#data">Data entry</a>-->
                <!--        <a class="dropdown-item"  target="_blank" href="https://www.agnisys.com/idesignspec-training-videos-old1/#creatinguvm">Creating UVM Models</a>-->
                <!--        <a class="dropdown-item" target="_blank" href="https://www.agnisys.com/idesignspec-training-videos-old1/#creatingrtl">Creating RTL Models</a>-->
                <!--        <a class="dropdown-item" target="_blank" href="https://www.agnisys.com/idesignspec-training-videos-old1/#complexregister">Creating Complex Registers</a>-->
                <!--        <a class="dropdown-item" target="_blank" href="https://www.agnisys.com/idesignspec-training-videos-old1/#advanced">Advanced Topics</a>-->
                <!--</div>-->
                
        </li>
        <li class="nav-item @if($page == 18){{__('active show')}}@endif">
                <a class="nav-link" href="{{ URL::to('dashboard')}}/company-profile">
                        <i class="fas fa-fw fa-users"></i>
                        <span>Company Profile</span></a>
        </li>
        <li class="nav-item @if($page == 12){{__('active show')}}@endif">
                <a class="nav-link" href="{{ URL::to('dashboard')}}/profile">
                        <i class="fas fa-fw fa-user"></i>
                        <span>My Profile</span></a>
        </li>
        <li class="nav-item @if($page == 11){{__('active show')}}@endif">
                <a class="nav-link" href="{{ URL::to('dashboard')}}/feedback">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Send Feedback</span></a>
        </li>
      </ul>
