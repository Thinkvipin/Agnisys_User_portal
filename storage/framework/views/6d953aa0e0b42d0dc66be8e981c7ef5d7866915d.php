<!-- Sidebar -->
<ul class="sidebar navbar-nav">
                <li class="nav-item <?php if($page == 1): ?><?php echo e(__('active show')); ?><?php endif; ?>">
                <a class="nav-link " href="<?php echo e(URL::to('dashboard')); ?>">
                                <i class="fas fa-fw fa-tachometer-alt"></i>
                                <span>Dashboard</span>
                        </a>
                </li>
                <li class="nav-item <?php if($page == 18): ?><?php echo e(__('active show')); ?><?php endif; ?>">
                        <a class="nav-link " href="<?php echo e(URL::to('dashboard')); ?>/s/userlogs">
                                <i class="fas fa-fw fa-folder"></i>
                                <span>User Logs</span></a>
                </li>
                <li class="nav-item dropdown <?php if($page == 2): ?><?php echo e(__('active show')); ?><?php endif; ?>">
                        <a class="nav-link dropdown-toggle " href="#" id="pagesDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-fw fa-folder"></i>
                                <span>Company</span>
                        </a>
                        <div class="dropdown-menu <?php if($page == 2): ?><?php echo e(__('active show')); ?><?php endif; ?>" aria-labelledby="pagesDropdown">
                                <a class="dropdown-item" href="<?php echo e(URL::to('dashboard')); ?>/s/all-company">All company</a>
                                <a class="dropdown-item" href="<?php echo e(URL::to('dashboard')); ?>/s/add-company">Add company</a>
                                 
                        </div>
                </li>
                <li class="nav-item <?php if($page == 3): ?><?php echo e(__('active show')); ?><?php endif; ?>">
                        <a class="nav-link " href="<?php echo e(URL::to('dashboard')); ?>/s/all-issues">
                                <i class="fas fa-fw fa-folder"></i>
                                <span>Discussions</span></a>
                </li>
                <li class="nav-item <?php if($page == 4): ?><?php echo e(__('active show')); ?><?php endif; ?>">
                        <a class="nav-link " href="<?php echo e(URL::to('dashboard')); ?>/s/all-cases">
                                <i class="fas fa-fw fa-folder"></i>
                                <span>Fogbugz Cases</span></a>
                </li>
                <li class="nav-item dropdown <?php if($page == 5): ?><?php echo e(__('active show')); ?><?php endif; ?>">
                        <a class="nav-link dropdown-toggle " href="#" id="pagesDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-fw fa-folder"></i>
                                <span>Notification</span>
                        </a>
                        <div class="dropdown-menu <?php if($page == 5): ?><?php echo e(__('active show')); ?><?php endif; ?>" aria-labelledby="pagesDropdown">
                                <a class="dropdown-item" href="<?php echo e(URL::to('dashboard')); ?>/s/all-notifications">All notification</a>
                                <a class="dropdown-item" href="<?php echo e(URL::to('dashboard')); ?>/s/create-notification">Create notification</a>
                                
                        </div>
                </li>
                <li class="nav-item dropdown <?php if($page == 6): ?><?php echo e(__('active show')); ?><?php endif; ?>">
                        <a class="nav-link dropdown-toggle " href="#" id="pagesDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-fw fa-folder"></i>
                                <span>Products</span>
                        </a>
                        <div class="dropdown-menu <?php if($page == 6): ?><?php echo e(__('active show')); ?><?php endif; ?>" aria-labelledby="pagesDropdown">
                                <a class="dropdown-item" href="<?php echo e(URL::to('dashboard')); ?>/s/all-products">All products</a>
                                <a class="dropdown-item" href="<?php echo e(URL::to('dashboard')); ?>/s/add-product">Add product</a>
                        </div>
                </li>
                <li class="nav-item dropdown <?php if($page == 7): ?><?php echo e(__('active show')); ?><?php endif; ?>">
                        <a class="nav-link dropdown-toggle " href="#" id="pagesDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-fw fa-folder"></i>
                                <span>Users</span>
                        </a>
                        <div class="dropdown-menu <?php if($page == 7): ?><?php echo e(__('active show')); ?><?php endif; ?>" aria-labelledby="pagesDropdown">
                                <a class="dropdown-item" href="<?php echo e(URL::to('dashboard')); ?>/s/request-employee">User requests</a>
                                <a class="dropdown-item" href="<?php echo e(URL::to('dashboard')); ?>/s/all-employees">All users</a>
                                <a class="dropdown-item" href="<?php echo e(URL::to('dashboard')); ?>/s/add-employee">Add user</a>
                        </div>
                        
                </li>
                <li class="nav-item dropdown <?php if($page == 8): ?><?php echo e(__('active show')); ?><?php endif; ?>">
                        <a class="nav-link dropdown-toggle " href="#" id="pagesDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-fw fa-folder"></i>
                                <span>License</span>
                        </a>
                        <div class="dropdown-menu <?php if($page == 8): ?><?php echo e(__('active show')); ?><?php endif; ?>" aria-labelledby="pagesDropdown">
                                <a class="dropdown-item" href="<?php echo e(URL::to('dashboard')); ?>/s/all-license-request">All requests</a>
                                <a class="dropdown-item" href="<?php echo e(URL::to('dashboard')); ?>/s/all-license">All License</a>
                                <a class="dropdown-item" href="<?php echo e(URL::to('dashboard')); ?>/s/issue-license">Issue License</a>
                        </div>
                </li>
                <li class="nav-item dropdown <?php if($page == 9): ?><?php echo e(__('active show')); ?><?php endif; ?>">
                        <a class="nav-link dropdown-toggle " href="#" id="pagesDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-fw fa-folder"></i>
                                <span>Company Groups</span>
                        </a>
                        <div class="dropdown-menu <?php if($page == 9): ?><?php echo e(__('active show')); ?><?php endif; ?>" aria-labelledby="pagesDropdown">
                                <a class="dropdown-item" href="<?php echo e(URL::to('dashboard')); ?>/s/all-group">All groups</a>
                                <a class="dropdown-item" href="<?php echo e(URL::to('dashboard')); ?>/s/create-group">Create group</a>
                        </div>
                </li>
                <li class="nav-item dropdown <?php if($page == 10): ?><?php echo e(__('active show')); ?><?php endif; ?>">
                        <a class="nav-link dropdown-toggle " href="#" id="pagesDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-fw fa-folder"></i>
                                <span>FTP</span>
                        </a>
                        <div class="dropdown-menu <?php if($page == 10): ?><?php echo e(__('active show')); ?><?php endif; ?>" aria-labelledby="pagesDropdown">
                                <a class="dropdown-item" href="<?php echo e(URL::to('dashboard')); ?>/s/all-ftp-request">All requests</a>
                                <a class="dropdown-item" href="<?php echo e(URL::to('dashboard')); ?>/s/all-ftp">All FTP/SFTP </a>
                                <a class="dropdown-item" href="<?php echo e(URL::to('dashboard')); ?>/s/create-ftp">Create FTP/SFTP</a>
                        </div>
                        
                </li>
                <li class="nav-item <?php if($page == 11): ?><?php echo e(__('active show')); ?><?php endif; ?>">
                        <a class="nav-link " href="<?php echo e(URL::to('dashboard')); ?>/s/all-feedback">
                                <i class="fas fa-fw fa-folder"></i>
                                <span>Feedback</span></a>
                </li>
                <li class="nav-item">
                        <a class="nav-link " href="javascript:void(0)" onclick="Go_to_Wp_LMS();">
                                <i class="fas fa-fw fa-folder"></i>
                                <span>LMS</span></a>
                </li>
                <li class="nav-item <?php if($page == 12): ?><?php echo e(__('active show')); ?><?php endif; ?>">
                        <a class="nav-link " href="<?php echo e(URL::to('dashboard')); ?>/s/profile">
                                <i class="fas fa-fw fa-user"></i>
                                <span>Profile</span></a>
                </li>
        <li class="nav-item <?php if($page == 15): ?><?php echo e(__('active show')); ?><?php endif; ?>">
                <a class="nav-link " href="<?php echo e(URL::to('dashboard')); ?>/s/agnisys-tools-family">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Agnisys Tools Family</span>
                </a>
                <!--<div class="dropdown-menu <?php if($page == 15): ?><?php echo e(__('active show')); ?><?php endif; ?>" aria-labelledby="pagesDropdown">-->
                <!--        <a class="dropdown-item" href="<?php echo e(URL::to('dashboard')); ?>/s/agnisys-family-tool">Agnisys Tools</a>-->
                <!--        <a class="dropdown-item" href="<?php echo e(URL::to('dashboard')); ?>/s/download-software">Download Software</a>-->
                <!--        <a class="dropdown-item" href="https://www.agnisys.com/release/docs/ids/IDesignSpec%20(c)%202007-2018%20Agnisys,%20Inc..html?Ver6800.html" target="_blank">IDesignSpec Documentation</a>-->
                <!--        <a class="dropdown-item" href="https://www.agnisys.com/release/support_file/idsdocs_enc_6.18.0.0.tar.gz" >IDesignSpec Supporting Files</a>-->
                <!--        <a class="dropdown-item" href="https://www.agnisys.com/release/iss/ISequenceSpec_appnote_1.pdf"  target="_blank">ISequenceSpec Introduction</a>-->
                <!--        <a class="dropdown-item" href="https://www.agnisys.com/release/docs/ids/IDesignSpec%20(c)%202007-2018%20Agnisys,%20Inc..html?ISequenceSpecISS.html"  target="_blank">ISequenceSpec Documentation</a>-->
                <!--        <a class="dropdown-item" href="https://www.agnisys.com/release/docs/ids/IDSNextGenIDSNG.html"  target="_blank">IDS NextGen Documentation</a>-->
                <!--        <a class="dropdown-item" href="https://www.agnisys.com/release/support_file/idsdocs_encmay2.9.zip">IDS NextGen Supporting File </a>-->
                <!--        <a class="dropdown-item" href="https://www.agnisys.com/release/dvi/docs/DVinsight.html"  target="_blank">DVi Documentation</a>-->
                <!--        <a class="dropdown-item" href="https://www.agnisys.com/release/docs/ids/IDesignSpec%20(c)%202007-2018%20Agnisys,%20Inc..html?ARVSim.html?search=arv"  target="_blank">ARV Documentation</a>-->
                <!--        <a class="dropdown-item" href="https://www.agnisys.com/release/support_file/idsdocs_encmay2.9.zip">ARV Supporting Files</a>-->
                <!--        <a class="dropdown-item" href="https://www.agnisys.com/release/docs/ids/IDesignSpec%20(c)%202007-2018%20Agnisys,%20Inc..html?FloatingLicense.html"  target="_blank">Agnisys License Manager</a>-->
                <!--        <a class="dropdown-item" href="https://www.agnisys.com/release/idsdocs/Article_on_Automation_of_constraint_Assertion_Coverage.pdf"  target="_blank">Article </a>-->
                <!--        <a class="dropdown-item" href="<?php echo e(URL::to('dashboard')); ?>/s/troubleshooting-tool-installation">Troubleshooting Tool Installation</a>-->
                        
                <!--</div>-->
                
        </li>
        <li class="nav-item <?php if($page == 17): ?><?php echo e(__('active show')); ?><?php endif; ?>">
                        <a class="nav-link " href="<?php echo e(URL::to('dashboard')); ?>/s/agnisys-webinar">
                                <i class="fas fa-fw fa-folder"></i>
                                <span>Agnisys Webinar</span></a>
        </li>
        <li class="nav-item <?php if($page == 16): ?><?php echo e(__('active show')); ?><?php endif; ?>">
                <a class="nav-link" href="<?php echo e(URL::to('dashboard')); ?>/s/IDesignSpecVideo" >
                        <i class="fas fa-fw fa-folder"></i>
                        <span>IDS Training Videos</span>
                </a>
                <!--<div class="dropdown-menu <?php if($page == 16): ?><?php echo e(__('active show')); ?><?php endif; ?>" aria-labelledby="pagesDropdown">-->
                        
                        <!--<a class="dropdown-item" href="https://www.agnisys.com/agnisys-webinar-videos/#AgnisysIDesignSpec">Agnisys Webinar</a>-->
                        <!--<a class="dropdown-item" href="https://www.agnisys.com/agnisys-webinar-videos/#HowToAutomatically">How To Automatically Generate UVM Code From A Specification With IDesignSpec</a>-->
                        <!--<a class="dropdown-item" href="https://www.agnisys.com/agnisys-webinar-videos/#Howtocreate">How to create parameterized specification for semiconductor IP Design</a>-->
                        <!-- <a class="dropdown-item" href="https://www.agnisys.com/idesignspec-old-videos/">IDS Old Videos</a> -->
                <!--        <a class="dropdown-item"  target="_blank" href="https://www.agnisys.com/idesignspec-training-videos-old1/#data">Data entry</a>-->
                <!--        <a class="dropdown-item"  target="_blank" href="https://www.agnisys.com/idesignspec-training-videos-old1/#creatinguvm">Creating UVM Models</a>-->
                <!--        <a class="dropdown-item"  target="_blank" href="https://www.agnisys.com/idesignspec-training-videos-old1/#creatingrtl">Creating RTL Models</a>-->
                <!--        <a class="dropdown-item"  target="_blank" href="https://www.agnisys.com/idesignspec-training-videos-old1/#complexregister">Creating Complex Registers</a>-->
                <!--        <a class="dropdown-item"  target="_blank" href="https://www.agnisys.com/idesignspec-training-videos-old1/#advanced">Advanced Topics</a>-->
                        
                <!--</div>-->
                
        </li>
                
        
        </ul>
        
