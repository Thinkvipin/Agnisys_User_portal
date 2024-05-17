<!-- Sidebar -->
<ul class="sidebar navbar-nav">
        <li class="nav-item @if($page == 1){{__('active')}}@endif">
          <a class="nav-link" href="{{ URL::to('dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item @if($page == 12){{__('active')}}@endif">
                <a class="nav-link" href="{{ URL::to('dashboard')}}/profile">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Profile</span></a>
        </li>
        <!--<li class="nav-item dropdown @if($page == 15){{__('active')}}@endif">-->
        <!--        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"-->
        <!--                aria-haspopup="true" aria-expanded="false">-->
        <!--                <i class="fas fa-fw fa-folder"></i>-->
        <!--                <span>Docs</span>-->
        <!--        </a>-->
        <!--        <div class="dropdown-menu" aria-labelledby="pagesDropdown">-->
        <!--                <a class="dropdown-item" href="https://www.agnisys.com/my-account/download-software/">Download software</a>-->
        <!--                <a class="dropdown-item" href="https://www.agnisys.com/release/docs/ids/IDesignSpec%20(c)%202007-2018%20Agnisys,%20Inc..html?Ver6800.html">IDesignSpec Documentation</a>-->
        <!--                <a class="dropdown-item" href="https://www.agnisys.com/release/support_file/idsdocs_enc_6.18.0.0.tar.gz">IDesignSpec Supporting files</a>-->
        <!--                <a class="dropdown-item" href="https://www.agnisys.com/release/docs/ids/IDesignSpec%20(c)%202007-2018%20Agnisys,%20Inc..html?ISequenceSpecISS.html">ISS Documentation</a>-->
        <!--                <a class="dropdown-item" href="https://www.agnisys.com/release/docs/ids/IDesignSpec%20(c)%202007-2018%20Agnisys,%20Inc..html?IDSNextGenIDSNG.html">IDS NextGen Documentation</a>-->
        <!--                <a class="dropdown-item" href="https://www.agnisys.com/release/dvi/docs/DVinsight.html">DVi Documentation</a>-->
        <!--                <a class="dropdown-item" href="https://www.agnisys.com/troubleshooting-tool-installation/">Troubleshooting Tool Installation</a>-->
                        
        <!--        </div>-->
                
        <!--</li>-->
        <!--<li class="nav-item dropdown @if($page == 16){{__('active')}}@endif">-->
        <!--        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"-->
        <!--                aria-haspopup="true" aria-expanded="false">-->
        <!--                <i class="fas fa-fw fa-folder"></i>-->
        <!--                <span>IDS Videos</span>-->
        <!--        </a>-->
        <!--        <div class="dropdown-menu" aria-labelledby="pagesDropdown">-->
                        
        <!--                <a class="dropdown-item" href="https://www.agnisys.com/agnisys-webinar-videos/#AgnisysIDesignSpec">Agnisys Webinar</a>-->
        <!--                <a class="dropdown-item" href="https://www.agnisys.com/agnisys-webinar-videos/#HowToAutomatically">How To Automatically Generate UVM Code From A Specification With IDesignSpec</a>-->
        <!--                <a class="dropdown-item" href="https://www.agnisys.com/agnisys-webinar-videos/#Howtocreate">How to create parameterized specification for semiconductor IP Design</a>-->
        <!--                <a class="dropdown-item" href="https://www.agnisys.com/idesignspec-old-videos/">IDS Old Videos</a>-->
        <!--                <a class="dropdown-item" href="https://www.agnisys.com/ids-training-video-request-form/">IDS Training Videos - Data entry</a>-->
        <!--                <a class="dropdown-item" href="https://www.agnisys.com/idesignspec-training-videos-old1/#creatinguvm">IDS Training Videos - Creating UVM Models</a>-->
        <!--                <a class="dropdown-item" href="https://www.agnisys.com/idesignspec-training-videos-old1/#creatingrtl">IDS Training Videos - Creating RTL Models</a>-->
        <!--                <a class="dropdown-item" href="https://www.agnisys.com/idesignspec-training-videos-old1/#complexregister">IDS Training Videos - Creating Complex Registers</a>-->
        <!--                <a class="dropdown-item" href="https://www.agnisys.com/idesignspec-training-videos-old1/#advanced">IDS Training Videos - Advanced Topics</a>-->
                        
                        
        <!--        </div>-->
                
        <!--</li>-->
      </ul>
