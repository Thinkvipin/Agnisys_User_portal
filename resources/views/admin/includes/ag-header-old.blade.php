
<style>
    header{
        background: #fff;
        box-shadow: 0 5px 9px 0 rgba(0, 0, 0, 0.1);
        position: relative;
        z-index: 9;
    }
    .primary-nav-wrap ul li a{
        font-weight:normal;
    }
    .fly-right-sub a{
        color: #f26422;
    }
    
    #menu-top-menu li > ul > li.menu-item-has-children:after{
        content: "\f054";
        position: absolute;
        right: 10px;
        top: 10px;
        font-weight: bold;
        display: inline-block;
        font: normal normal normal 14px/1 FontAwesome;
        font-size: 11px;
        text-rendering: auto;
        -webkit-font-smoothing: antialiased;
        
    }
    @media only screen and (max-width: 767px){
        header #search, header .account-tab {
            display: none;
        }
    }
    
    @media only screen and (max-width: 1000px){
        
        .desktop .primary-nav-wrap,.desktop #search,.desktop .account-tab.dropdown{
            display:none;
        }
        .mobile-menu{
            display:block;
        }
        .site-logo {
            padding: 15px 0;
        }
        .site-logo {
            width: 185px;
        }
        a.meanmenu-reveal{
            top: 65px;
            position:absolute;
            right:25px;
        }
        .container{
            max-width:100%;
        }
        .account-tab.mobile{
            display:block;
            text-align:right;
            border-bottom: 1px solid #ddd;
            padding: 8px 10px;
            width:100%;
        }
        .fly-right-sub{
            right:0px;z-index: 9999;
        }
    }
    @media only screen and (min-width: 1001px){
        
        .desktop .primary-nav-wrap,.desktop #search,.desktop .account-tab.dropdown{
            display:block;
        }
        .mobile-menu{
            display:none;
        }
        .account-tab.mobile{
            display:none !important;
        }
        
    }
</style>
<?php

$pageurl = url()->full();
Session(['userlogpageurl' => $pageurl]);
$userid =  Session::get('userlogid');

$pageurl = Session::get('userlogpageurl');

$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => "https://www.portal.agnisys.com/usertrack.php?url=".$pageurl."&id=".$userid,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => array('url'=> $pageurl,'id' => $userid),
));
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

?>
<header> 
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="account-tab dropdown mobile visible-xs">
                             @if (!Auth::user())
                             <a href="{{ url('/') }}"><i class="fa fa-user"></i> Login</a>
                             @endif
                             @if (Auth::user())
                             <i class="fa fa-user"></i> {{Session::get('username')}}                                   
                             <ul class="fly-right-sub">
                                <li>
                                   <a href="{{ url('/') }}/dashboard"><i class="fas fa-fw fa-tachometer-alt"></i>  Dashboard</a>
                                </li>
                                <li>
                                   <a href="https://www.agnisys.com/my-account/" data-toggle="modal" data-target="#logoutModal" >
                                   <i class="fa fa-sign-out-alt"></i>Log Out
                                   </a>
                                </li>
                             </ul>
                             <!--<a href="https://www.agnisys.com/my-account/" data-toggle="modal" data-target="#logoutModal" >-->
                             <!--    <i class="fa fa-user"></i>  Logout</a>                                    -->
                             <!--  custtom code -->
                             @endif
                          </div>
                <div class="header-menu-wrap logo-left desktop">
                    <div class="site-logo">
                         <a href="https://www.agnisys.com/" title="Agnisys" rel="Home Page" >
                         <img src="https://www.agnisys.com/wp-content/uploads/2018/05/Agnisys-logo-RGB.gif" alt="Agnisys">
                         </a>
                      </div>
                    <div class="primary-nav-wrap nav-horizontal uppercase nav-effect-2">
                            <nav>
                                <ul id="menu-top-menu" class="menu">
                                    <li id="menu-item-10351" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-10351">
                                        <a href="https://www.agnisys.com/products/">Products</a>
                                        <ul  class="sub-menu">
                                           <li id="menu-item-9712" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-9712">
                                    			<a href="https://www.agnisys.com/products/idesignspec-uvm-register-generator/">IDesignSpec™</a>
                                    			<ul class="sub-menu">
                                    				<li id="menu-item-9714" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9714"><a href="https://www.agnisys.com/products/ids-nextgen/">IDSNextGen™</a></li>
                                    			</ul>
                                    		</li>
                                    		<li id="menu-item-14556" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-14556">
                                    			<a href="https://www.agnisys.com/products/asvv/">ASVV™</a>
                                    		</li>
                                    		<li id="menu-item-14557" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-14557">
                                    			<a href="https://www.agnisys.com/products/specta-av/">Specta-AV™</a>
                                    			<ul class="sub-menu">
                                    				<li id="menu-item-9711" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9711"><a href="https://www.agnisys.com/products/arv-automatic-register-verification-simulation-formal-verification/">ARV™</a></li>
                                    				<li id="menu-item-10449" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-10449"><a href="https://www.agnisys.com/products/isequencespec-portable-sequence-generator/">ISequenceSpec™</a></li>
                                    			</ul>
                                    		</li>
                                    		<li id="menu-item-14558" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-14558">
                                    			<a href="https://www.agnisys.com/products/slip-g/">SLIP-G™</a>
                                    		</li>
                                    		<li id="menu-item-14559" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-14559">
                                    			<a href="https://www.agnisys.com/products/soc-enterprise/">SoC Enterprise™</a>
                                    		</li>
                                    		<li id="menu-item-9713" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9713">
                                    			<a href="https://www.agnisys.com/products/design-verification-editor-checker-sv-uvm/">DVinsight™</a>
                                    		</li>
                                          <!--<li id="menu-item-9712" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9712">-->
                                          <!--    <a href="https://www.agnisys.com/products/idesignspec-uvm-register-generator/">IDesignSpec™</a>-->
                                          <!--</li>-->
                                          <!--<li id="menu-item-10449" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-10449">-->
                                          <!--    <a href="https://www.agnisys.com/products/isequencespec-portable-sequence-generator/">ISequenceSpec™</a>-->
                                          <!--</li>-->
                                          <!--<li id="menu-item-9714" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9714">-->
                                          <!--    <a href="https://www.agnisys.com/ids-nextgen/">IDS NextGen</a>-->
                                          <!--</li>-->
                                          <!--<li id="menu-item-9711" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9711">-->
                                          <!--    <a href="https://www.agnisys.com/arv-automatic-register-verification-simulation-formal-verification/">ARV™</a>-->
                                          <!--</li>-->
                                          <!--<li id="menu-item-9713" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9713">-->
                                          <!--    <a href="https://www.agnisys.com/design-verification-editor-checker-sv-uvm/">DVInsight-Pro</a>-->
                                          <!--</li>-->
                                        </ul>
                                    </li>
                                    <li id="menu-item-9715" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-9715">
                                       <a href="https://www.agnisys.com/services/">Services</a>
                                       <ul  class="sub-menu">
                                          <li id="menu-item-9716" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9716"><a href="https://www.agnisys.com/services/hardware-design-verification-services/">Hardware Verification</a></li>
                                          <li id="menu-item-9717" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9717"><a href="https://www.agnisys.com/services/semiconductor-design-services-register-management-design/">Register Management &#038; Automation</a></li>
                                          <li id="menu-item-9718" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9718"><a href="https://www.agnisys.com/services/uvm-systemverilog-training-courses/">Training Services</a></li>
                                       </ul>
                                    </li>
                                    <li id="menu-item-10401" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-10401">
                                       <a href="#">Media Room</a>
                                       <ul  class="sub-menu">
                                          <li id="menu-item-10913" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-10913"><a href="https://www.agnisys.com/newsletter/">Newsletter</a></li>
                                          <li id="menu-item-9719" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9719"><a href="https://www.agnisys.com/blog/">Blog</a></li>
                                          <li id="menu-item-10460" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-10460"><a href="https://www.agnisys.com/whitepaper-case-study/">Whitepaper &#038; Case Study</a></li>
                                          <li id="menu-item-10459" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-10459"><a href="https://www.agnisys.com/videos/">Videos</a></li>
                                          <li id="menu-item-10514" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-10514"><a href="https://www.agnisys.com/news-release/">Press Release</a></li>
                                          <li id="menu-item-10461" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-10461"><a href="https://www.agnisys.com/events/">Events</a></li>
                                          <li id="menu-item-14990" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-14990"><a href="https://www.agnisys.com/press-coverage/">Press Coverage</a></li>
                                          <li id="menu-item-14991" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-14991"><a href="https://www.agnisys.com/resources/">Resources</a></li>
                                          <li id="menu-item-10513" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-10513"><a href="https://www.agnisys.com/agnisys-customer/">Our Customers</a></li>
                                          <li id="menu-item-10458" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-10458"><a href="https://www.agnisys.com/testimonials-2/">Testimonials</a></li>
                                       </ul>
                                    </li>
                                    <li id="menu-item-10892" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-10892">
                                       <a href="#">About Us</a>
                                       <ul  class="sub-menu">
                                          <li id="menu-item-9722" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9722"><a href="https://www.agnisys.com/our-company-agnisys/">Company Overview</a></li>
                                          <li id="menu-item-9723" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9723"><a href="https://www.agnisys.com/management/">Management</a></li>
                                          <li id="menu-item-9724" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9724"><a href="https://www.agnisys.com/career-opportunities/">Career</a></li>
                                          <li id="menu-item-9725" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-9725">
                                             <a href="https://www.agnisys.com/agnisys-partner-program/">Partner Program</a>
                                             <ul  class="sub-menu">
                                                <li id="menu-item-9726" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9726"><a href="https://www.agnisys.com/fusion/">Agnisys Fusion Partner Program</a></li>
                                                <li id="menu-item-9727" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9727"><a href="https://www.agnisys.com/spark-higher-education-program/">Spark Higher Education Program</a></li>
                                             </ul>
                                          </li>
                                          <li id="menu-item-9728" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9728"><a href="https://www.agnisys.com/agnisys-frequenty-asked-questions/">FAQs</a></li>
                                       </ul>
                                    </li>
                                    <li id="menu-item-9881" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9881"><a href="https://www.agnisys.com/contact-us/">Contact</a></li>
                                    <!--<li class="menu-item login-link"><a href="#">{{ Session::get('username')}}</a></li></ul>-->
                                    <!-- Session::get('username')						 -->
                                </ul>
                            </nav>
                        </div>
                    <form id="search" action="https://www.agnisys.com" method="GET">
                             <input type="text" name="s" placeholder="Search">
                             <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                        <!-- custom code -->
                    <div class="account-tab dropdown">
                             @if (!Auth::user())
                             <a href="https://www.portal.agnisys.com/"><i class="fa fa-user"></i> Login</a>
                             @endif
                             @if (Auth::user())
                             <i class="fa fa-user"></i> {{Session::get('username')}}                                   
                             <ul class="fly-right-sub">
                                <li>
                                   <a href="https://www.portal.agnisys.com/dashboard"><i class="fas fa-fw fa-tachometer-alt"></i>  Dashboard</a>
                                </li>
                                <li>
                                   <a href="https://www.agnisys.com/my-account/" data-toggle="modal" data-target="#logoutModal" >
                                   <i class="fa fa-sign-out"></i>Log Out
                                   </a>
                                </li>
                             </ul>
                             <!--<a href="https://www.agnisys.com/my-account/" data-toggle="modal" data-target="#logoutModal" >-->
                             <!--    <i class="fa fa-user"></i>  Logout</a>                                    -->
                             <!--  custtom code -->
                             @endif
                          </div>
                </div>
            </div>
        </div>
        <input type="hidden" id="fogbugz_token" value="{{Session::get('key')}}">
        <div class="mobile-menu mean-container">
           <div class="mean-bar">
              <a href="#nav" class="meanmenu-reveal"><i class="fa fa-bars"></i></a>
              <nav class="mean-nav">
                 <ul id="menu-top-menu" class="menu" style="display: none;">
                    <li id="menu-item-10351" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-10351">
                       <a href="https://www.agnisys.com/products/">Products</a>
                       <ul class="sub-menu" style="display: none;">
                          <li id="menu-item-9712" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9712"><a href="https://www.agnisys.com/products/idesignspec-uvm-register-generator/">IDesignSpec™</a></li>
                          <li id="menu-item-10449" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-10449"><a href="https://www.agnisys.com/products/isequencespec-portable-sequence-generator/">ISequenceSpec™</a></li>
                          <li id="menu-item-9714" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9714"><a href="https://www.agnisys.com/ids-nextgen/">IDS NextGen</a></li>
                          <li id="menu-item-9711" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9711"><a href="https://www.agnisys.com/arv-automatic-register-verification-simulation-formal-verification/">ARV™</a></li>
                          <li id="menu-item-9713" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9713"><a href="https://www.agnisys.com/design-verification-editor-checker-sv-uvm/">DVInsight-Pro</a></li>
                       </ul>
                       <a class="mean-expand" href="#" style="font-size: 25px">+</a>
                    </li>
                    <li id="menu-item-9715" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-9715">
                       <a href="https://www.agnisys.com/services/">Services</a>
                       <ul class="sub-menu" style="display: none;">
                          <li id="menu-item-9716" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9716"><a href="https://www.agnisys.com/services/hardware-design-verification-services/">Hardware Verification</a></li>
                          <li id="menu-item-9717" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9717"><a href="https://www.agnisys.com/services/semiconductor-design-services-register-management-design/">Register Management &amp; Automation</a></li>
                          <li id="menu-item-9718" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9718"><a href="https://www.agnisys.com/services/uvm-systemverilog-training-courses/">Training Services</a></li>
                       </ul>
                       <a class="mean-expand" href="#" style="font-size: 25px">+</a>
                    </li>
                    <li id="menu-item-10401" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-10401">
                       <a href="#">Media Room</a>
                       <ul class="sub-menu" style="display: none;">
                          <li id="menu-item-10913" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-10913"><a href="https://www.agnisys.com/newsletter/">Newsletter</a></li>
                          <li id="menu-item-9719" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9719"><a href="https://www.agnisys.com/blog/">Blog | Agnisys</a></li>
                          <li id="menu-item-10460" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-10460"><a href="https://www.agnisys.com/whitepaper-case-study/">Whitepaper &amp; Case Study</a></li>
                          <li id="menu-item-10459" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-10459"><a href="https://www.agnisys.com/videos/">Videos</a></li>
                          <li id="menu-item-10514" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-10514"><a href="https://www.agnisys.com/news-release/">Press Release</a></li>
                          <li id="menu-item-10461" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-10461"><a href="https://www.agnisys.com/events/">Events</a></li>
                          <li id="menu-item-14990" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-14990"><a href="https://www.agnisys.com/press-coverage/">Press Coverage</a></li>
                          <li id="menu-item-14991" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-14991"><a href="https://www.agnisys.com/resources/">Resources</a></li>
                          <li id="menu-item-10513" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-10513"><a href="https://www.agnisys.com/agnisys-customer/">Our Customers</a></li>
                          <li id="menu-item-10458" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-10458"><a href="https://www.agnisys.com/testimonials-2/">Testimonials</a></li>
                       </ul>
                       <a class="mean-expand" href="#" style="font-size: 25px">+</a>
                    </li>
                    <li id="menu-item-10892" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-10892 last-elements">
                       <a href="#">About Us</a>
                       <ul class="sub-menu" style="display: none;">
                          <li id="menu-item-9722" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9722"><a href="https://www.agnisys.com/our-company-agnisys/">Company Overview</a></li>
                          <li id="menu-item-9723" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9723"><a href="https://www.agnisys.com/management/">Management</a></li>
                          <li id="menu-item-9724" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9724"><a href="https://www.agnisys.com/career-opportunities/">Career</a></li>
                          <li id="menu-item-9725" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-9725">
                             <a href="https://www.agnisys.com/agnisys-partner-program/">Partner Program</a>
                             <ul class="sub-menu" style="display: none;">
                                <li id="menu-item-9726" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9726"><a href="https://www.agnisys.com/fusion/">Agnisys Fusion Partner Program</a></li>
                                <li id="menu-item-9727" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9727"><a href="https://www.agnisys.com/spark-higher-education-program/">Spark Higher Education Program</a></li>
                             </ul>
                             <a class="mean-expand" href="#" style="font-size: 25px">+</a>
                          </li>
                       </ul>
                       <a class="mean-expand" href="#" style="font-size: 25px">+</a>
                    </li>
                    <li id="menu-item-9881" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9881 last-elements mean-last"><a href="https://www.agnisys.com/contact-us/">Contact</a></li>
                 </ul>
              </nav>
           </div>
        </div>
    </div>
</header>




            
 
   