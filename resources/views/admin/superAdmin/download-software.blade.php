
@extends('layouts.base')


@section('content')

    

  @include('admin.includes.ag-header')
  <style>
      iframe{
          border:none;
          padding:0px 30px;
      }
  </style>
<div id="wrapper">
    <ul class="sidebar navbar-nav">
                <li class="nav-item active show">
                <a class="nav-link " href="https://www.portal.agnisys.com/dashboard">
                                <i class="fas fa-fw fa-tachometer-alt"></i>
                                <span>Dashboard</span>
                        </a>
                </li>
                <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle " href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-fw fa-folder"></i>
                                <span>Company</span>
                        </a>
                        <div class="dropdown-menu " aria-labelledby="pagesDropdown">
                                <a class="dropdown-item" href="https://www.portal.agnisys.com/dashboard/s/all-company">All company</a>
                                <a class="dropdown-item" href="https://www.portal.agnisys.com/dashboard/s/add-company">Add company</a>
                                 
                        </div>
                </li>
                <li class="nav-item ">
                        <a class="nav-link " href="https://www.portal.agnisys.com/dashboard/s/all-issues">
                                <i class="fas fa-fw fa-folder"></i>
                                <span>Discussions</span></a>
                </li>
                <li class="nav-item ">
                        <a class="nav-link " href="https://www.portal.agnisys.com/dashboard/s/all-cases">
                                <i class="fas fa-fw fa-folder"></i>
                                <span>Fogbugz Cases</span></a>
                </li>
                <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle " href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-fw fa-folder"></i>
                                <span>Notification</span>
                        </a>
                        <div class="dropdown-menu " aria-labelledby="pagesDropdown">
                                <a class="dropdown-item" href="https://www.portal.agnisys.com/dashboard/s/all-notifications">All notification</a>
                                <a class="dropdown-item" href="https://www.portal.agnisys.com/dashboard/s/create-notification">Create notification</a>
                                
                        </div>
                </li>
                <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle " href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-fw fa-folder"></i>
                                <span>Products</span>
                        </a>
                        <div class="dropdown-menu " aria-labelledby="pagesDropdown">
                                <a class="dropdown-item" href="https://www.portal.agnisys.com/dashboard/s/all-products">All products</a>
                                <a class="dropdown-item" href="https://www.portal.agnisys.com/dashboard/s/add-product">Add product</a>
                        </div>
                </li>
                <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle " href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-fw fa-folder"></i>
                                <span>Users</span>
                        </a>
                        <div class="dropdown-menu " aria-labelledby="pagesDropdown">
                                <a class="dropdown-item" href="https://www.portal.agnisys.com/dashboard/s/request-employee">User requests</a>
                                <a class="dropdown-item" href="https://www.portal.agnisys.com/dashboard/s/all-employees">All users</a>
                                <a class="dropdown-item" href="https://www.portal.agnisys.com/dashboard/s/add-employee">Add user</a>
                        </div>
                        
                </li>
                <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle " href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-fw fa-folder"></i>
                                <span>License</span>
                        </a>
                        <div class="dropdown-menu " aria-labelledby="pagesDropdown">
                                <a class="dropdown-item" href="https://www.portal.agnisys.com/dashboard/s/all-license-request">All requests</a>
                                <a class="dropdown-item" href="https://www.portal.agnisys.com/dashboard/s/all-license">All License</a>
                                <a class="dropdown-item" href="https://www.portal.agnisys.com/dashboard/s/issue-license">Issue License</a>
                        </div>
                </li>
                <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle " href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-fw fa-folder"></i>
                                <span>Company groups</span>
                        </a>
                        <div class="dropdown-menu " aria-labelledby="pagesDropdown">
                                <a class="dropdown-item" href="https://www.portal.agnisys.com/dashboard/s/all-group">All groups</a>
                                <a class="dropdown-item" href="https://www.portal.agnisys.com/dashboard/s/create-group">Create group</a>
                        </div>
                </li>
                <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle " href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-fw fa-folder"></i>
                                <span>FTP</span>
                        </a>
                        <div class="dropdown-menu " aria-labelledby="pagesDropdown">
                                <a class="dropdown-item" href="https://www.portal.agnisys.com/dashboard/s/all-ftp-request">All requests</a>
                                <a class="dropdown-item" href="https://www.portal.agnisys.com/dashboard/s/all-ftp">All FTP/SFTP </a>
                                <a class="dropdown-item" href="https://www.portal.agnisys.com/dashboard/s/create-ftp">Create FTP/SFTP</a>
                        </div>
                        
                </li>
                 <li class="nav-item ">
                        <a class="nav-link " href="https://www.portal.agnisys.com/dashboard/s/all-feedback">
                                <i class="fas fa-fw fa-folder"></i>
                                <span>Feedback</span></a>
                </li> -->
                <li class="nav-item ">
                        <a class="nav-link " href="https://www.portal.agnisys.com/dashboard/s/profile">
                                <i class="fas fa-fw fa-user"></i>
                                <span>Profile</span></a>
                </li>
        <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Docs</span>
                </a>
                <div class="dropdown-menu " aria-labelledby="pagesDropdown">
                        <a class="dropdown-item" href="https://www.old.agnisys.com/my-account/download-software/">Download Software</a>
                        <a class="dropdown-item" href="https://www.portal.agnisys.com/release/docs/ids/IDesignSpec%20(c)%202007-2018%20Agnisys,%20Inc..html?Ver6800.html">IDesignSpec Documentation</a>
                        <a class="dropdown-item" href="https://www.portal.agnisys.com/release/support_file/idsdocs_enc_6.18.0.0.tar.gz">IDesignSpec Supporting files</a>
                        <a class="dropdown-item" href="https://www.portal.agnisys.com/release/docs/ids/IDesignSpec%20(c)%202007-2018%20Agnisys,%20Inc..html?ISequenceSpecISS.html">ISS Documentation</a>
                        <a class="dropdown-item" href="https://www.portal.agnisys.com/release/docs/ids/IDesignSpec%20(c)%202007-2018%20Agnisys,%20Inc..html?IDSNextGenIDSNG.html">IDS NextGen Documentation</a>
                        <a class="dropdown-item" href="https://www.portal.agnisys.com/release/dvi/docs/DVinsight.html">DVi Documentation</a>
                        <a class="dropdown-item" href="https://www.old.agnisys.com/troubleshooting-tool-installation/">Troubleshooting Tool Installation</a>
                        
                </div>
                
        </li>
        <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>IDS Videos</span>
                </a>
                <div class="dropdown-menu " aria-labelledby="pagesDropdown">
                        
                        <a class="dropdown-item" href="https://www.old.agnisys.com/agnisys-webinar-videos/#AgnisysIDesignSpec">Agnisys Webinar</a>
                        <a class="dropdown-item" href="https://www.old.agnisys.com/agnisys-webinar-videos/#HowToAutomatically">How To Automatically Generate UVM Code From A Specification With IDesignSpec</a>
                        <a class="dropdown-item" href="https://www.old.agnisys.com/agnisys-webinar-videos/#Howtocreate">How to create parameterized specification for semiconductor IP Design</a>
                         <a class="dropdown-item" href="https://www.old.agnisys.com/idesignspec-old-videos/">IDS Old Videos</a> 
                        <a class="dropdown-item" href="https://www.old.agnisys.com/ids-training-video-request-form/">IDS Training Videos - Data entry</a>
                        <a class="dropdown-item" href="https://www.old.agnisys.com/idesignspec-training-videos-old1/#creatinguvm">IDS Training Videos - Creating UVM Models</a>
                        <a class="dropdown-item" href="https://www.old.agnisys.com/idesignspec-training-videos-old1/#creatingrtl">IDS Training Videos - Creating RTL Models</a>
                        <a class="dropdown-item" href="https://www.old.agnisys.com/idesignspec-training-videos-old1/#complexregister">IDS Training Videos - Creating Complex Registers</a>
                        <a class="dropdown-item" href="https://www.old.agnisys.com/idesignspec-training-videos-old1/#advanced">IDS Training Videos - Advanced Topics</a>
                        
                        
                </div>
                
        </li>
                
        </ul>
    
        <div id="content-wrapper">
            <iframe width="100%" height="100%" src="https://www.old.agnisys.com/new-software-pages/"></iframe>
        </div>
</div>

