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
<style>
header.header {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  background-color: #fff;
  z-index: 1000;
  box-shadow: 0px 0px 16px rgb(0 0 0 / 4%);
  transition: .4s ease;
}

.header__upper {
  background-color: #0C72ED;
  background: linear-gradient(270deg, #797EF6 0%, #0567D5 100%);
  font-size: 13px;
  color: #fff;
}

.header__upper p {
  font-size: 13px;
  margin: 0;
}

.header__upper__section {
  padding: 10px 0;
}

.header__upper__left {
  /* padding-right: 15px; */
}
.header__upper .btn {
  padding: 5px 10px;
  font-size: 12px;
  font-weight: 400;
}
.header__upper .header__util-cont a {
  color: #ffffff;
  weight: 800;
  transition: ease 300ms all;
}
.header__upper .header__util-cont a:hover {
  opacity: .5;
  transition: ease 300ms all;
}
.header__close {
  display: block;
  /* margin-left: 30px; */
  transition: ease 300ms all;
}
.header__close:hover {
  opacity: .5;
  transition: ease 300ms all;
  cursor: pointer;
}
.header__close svg {
  height: 15px;
  width: 15px;
}
.hs-menu-flow-horizontal ul {
  margin: 0;
  padding: 0;
  list-style: none;
}

.hs-menu-flow-horizontal > ul {
  display: flex;
  align-items: center;
}

.header__lower .flyouts .hs-menu-children-wrapper {
  position: absolute;
  visibility: hidden;
  opacity: 0;
  transition: .4s ease;
  background-color: #ffffff;
  padding: 25px 30px 10px;
  left: 20px;
  top: 38px;
  z-index: 1;
}

.header__lower .flyouts .hs-menu-children-wrapper:before {

}

.header__lower,
.header__lower--lp {
  padding: 45px 0 30px;
  transition: .4s ease;
}

.header-logo {
  width: 310px;
  transition: .4s ease;
}

.header-logo-mobile img {
  width: 125px;
}
.header__lower, .header__lower--lp {
  padding: 15px 0;
  transition: .4s ease;
}

.header-search form {
  width: 0px;
  transition: .4s ease;
  overflow: hidden;
}

.header-search svg {
  margin: 0 15px;
  cursor: pointer;
}

.header-search form.open {
  width: 250px;
}

@media screen and (max-width: 767px) {
  .header__lower--lp {
    background-color: #FFFFFF;
    box-shadow: 0px 0px 16px rgb(0 0 0 / 4%);
  }
}

.header__lower .header__logo svg,
.header__lower--lp .header__logo svg {
  width: 100%;
}

.header__lower a, 
.header__lower--lp a {
  font-weight: 400;
}
.header__lower a.btn,
.header__lower--lp a.btn {
  font-size: 11px; 
  font-weight: bold;
  margin-left: 15px;
  position: relative;
}

.header__lower a.btn.has-svg {
  padding-left: 40px;
}
.header__lower a.btn svg {
  position: absolute;
  left: 15px;
}

.header__lower .hs-menu-flow-horizontal>ul {
  justify-content: end;
  padding-top: 20px;
}

.header__lower li.hs-menu-item.hs-menu-depth-1  {
  padding: 0 20px;
}

.header__lower li.hs-menu-item.hs-menu-depth-1:last-child {
  padding-right: 0px;
}

.header__lower li.hs-menu-item.hs-menu-depth-1 > a {
color: #000000;
font-size: 18px;
text-transform: uppercase;
}


.header__lower li.hs-menu-item.hs-menu-depth-1 a {
  position: relative;
}
.header__lower li.hs-menu-item.hs-menu-depth-1:hover > a:after {
  content: '';
  width: 100%;
  background-color: #FE6601;
  position: absolute;
  top: 36px;
  left: 0;
  height: 3px;
}

.header__lower li.hs-menu-item.hs-menu-depth-1:hover > a:before {
  content: '';
  width: 0;
  height: 0;
  border-style: solid;
  border-width: 0 5px 5px 5px;
  border-color: transparent transparent #FE6601 transparent;
  position: absolute;
  left: 50%;
  margin-left: -5px;
  top: 30px;
}


.flyouts li.hs-menu-item:hover .hs-menu-children-wrapper {
  visibility: visible;
  opacity: 1;
}

.header__lower li.hs-menu-item .hs-menu-children-wrapper li {
  margin-bottom: 16px;
}

.header__lower li.hs-menu-item .hs-menu-children-wrapper li a {
  color: inherit;
  font-weight: 600;
  white-space: nowrap;
}

.header__lower li.hs-menu-item .hs-menu-children-wrapper li a:hover {
  color: #FE6601;
}




.header__lower li.hs-menu-item.hs-menu-depth-1.hs-item-has-children {
  position: relative;
}



.header__lower li.hs-menu-item.hs-menu-depth-1.hs-item-has-children:hover:before {
  content: '';
  width: calc(100% + 20px);
  left: -10px;
  height: 36px;
  top: 20px;
  position: absolute;
}

.child-trigger {
  display: none;
}

.header button.hamburger {
  display: none;
  padding: 0;
  background-color: transparent!important;
}

.header button.hamburger:hover, 
.header button.hamburger:focus {
  background-color: transparent; 
  border: none;
  color: transparent;
  outline: none;
}

.header .hamburger-inner, 
.header .hamburger-inner:after, 
.header .hamburger-inner:before {
  background-color: #000000!important;

}

@media (max-width: 1200px) {
  .header__lower li.hs-menu-item.hs-menu-depth-1, .header__lower .cta-group .text-link {
    padding: 0 15px;
  } 
}

@media (max-width: 1100px) and (min-width: 992px) {
  .header__lower li.hs-menu-item.hs-menu-depth-1 > a {
    font-size: 18px;
  }
}

@media (max-width: 991px) {

  .header button.hamburger {
    display: block; 
    margin-top: 10px;
}

.header-logo {
  max-width: 200px;
}


  .header__upper__left {
    text-align: center;
  }
  .header__upper__right {
    display: none;
  }
  .header-search {
    padding: 20px 15px 0;
  }
  .header-search form {
    width: 100%;
  }
  .header-search svg {
    display: none;
  }

  .nav-holder {
    position: absolute;
    width: 100%;
    top: 100%;
    background-color: #fff;
    left: 0;
    border-top: 1px solid rgba(0,0,0,.1);
    display: none;
    max-height: calc(100vh - 88px);
    overflow-y: auto;
  }

  .nav-holder .custom-menu-primary {
    background-color: #fff;
  }


  .nav-holder .hs-menu-flow-horizontal>ul {
    display: block;
    padding-top: 0;
  }



  .header__lower .nav-holder li.hs-menu-item.hs-menu-depth-1 {
    position: relative;
    border-bottom: 1px solid rgba(0,0,0,.1);
    padding-top: 15px;
    padding-bottom: 15px;
  }

  .header__lower .nav-holder li.hs-menu-item.hs-menu-depth-1 > a {
    display: block;
    padding: 10px 0;
  }
  .header__lower li.hs-menu-item.hs-menu-depth-1.hs-item-has-children > a:after {
    display: none;
  }

  .nav-holder .cta-group {
    text-align: center;
    padding: 10px 0;
    margin: 0;
  }

  .header__lower .nav-holder .cta-group a {
    display: block;
    text-align: center;
    margin: 15px 15px;
  }

  .header__lower .nav-holder .cta-group a.btn {
    border-radius: 5px;
  }

  .header__lower .flyouts .hs-menu-children-wrapper {
    position: relative;
    visibility: visible;
    opacity: 1;
    top: auto;
    box-shadow: none;
    display: none;
  }

  .child-trigger {
    position: relative;
    width: 60px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    position: absolute;
    top: 10px;
    right: 0;
    z-index: 10;
  }
  .child-trigger:before {
    content: '';
    background-image: url(https://13583.fs1.hubspotusercontent-na1.net/hubfs/13583/22_theme-lifescape/icons/menu-arrow.svg);
    width: 16px;
    height: 8px;
    background-size: contain;
    background-repeat: no-repeat;
    display: inline-block;
    transform: rotate(-90deg);
}

}
.module_wrapper section .container--xl, .module_wrapper section .container--lg, .module_wrapper section .container--md, .module_wrapper section .container--sm, .module_wrapper section .container--fluid {
    z-index:10;
}
.container--xl {
      width: 100%;
      padding-right: 20px;
      padding-left: 20px;
      margin-right: auto;
      margin-left: auto;
}
@media (min-width: 1200px) {
      .container, .container--sm, .container--md, .container--lg, .container--xl {
        max-width: 1340px;
      }
    }

    @media (max-width: 1400px) {
      .container--xl {
        max-width: 1200px;
      }
    }
.listing-banner .container--xl {
  position: relative;
}


    .header-search{
        margin: 0px;
    }
.col-form-label{
	font-size: 16px !important;
}
.text-md-right{
	text-align: left!important;
}

#remember{
    margin-left: -25px !important;
    margin: 0px 0px;
    width: 18px!important;
    height: 18px!important;
}

input:not([type=checkbox]):not([type=radio]):not([type=submit]), .hs-input, .hs-search-field__input{
	border: 1px solid #ddd !important;
}

.nav-holder .cta-group.d-lg-flex{
    position:relative;
}

.fly-right-sub{
    top: 30px;
    left: 17px;
}

.fly-right-sub .has-svg{
    display:none;
}

</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    
    $(document).ready(function () {
        $(document).on('mouseenter', '.user-cta', function () {
            $(".fly-right-sub").show();
        }).on('mouseleave', '.user-cta', function () {
            $(".fly-right-sub").hide();
        });
    });
</script>
<link rel="shortcut icon" href="images/Favicon-100x100.png">

<!--<link rel="stylesheet" href="https://cdn2.hubspot.net/hub/22081774/hub_generated/template_assets/93547389331/1673817896840/theme-agnisys/css/main.css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hamburgers/1.1.3/hamburgers.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.0.0/magnific-popup.min.css">


    <div data-global-resource-path="theme-agnisys/templates/partials/header.html">
      <div id="hs_cos_wrapper_global_header_mm" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">

<header id="js-primaryNav" class="header">

  <div class="header__lower">
    <div class="container--xl">
      <div class="row no-gutters align-items-center justify-content-lg-center justify-content-between">
        
        <div class="d-flex align-items-center justify-content-md-center flex-grow-1">
          <div class="header-logo">
            <a href="https://www.agnisys.com">
                  <img src="https://www.agnisys.com/hubfs/agnisys-logo.svg" alt="agnisys-logo" width="300" height="69" style="max-width:
              100%; height: auto;">
            </a>
          </div>
          <div class="flex-grow-1 nav-holder">
            <div class="d-md-flex align-items-center justify-content-end">
            <div class="header-search d-flex align-items-center">
              <form action="/hs-search-results" data-hs-cf-bound="true">
                <input name="term" type="text" placeholder="Search">
              </form>
              <svg id="icon" xmlns="http://www.w3.org/2000/svg" width="17.051" height="17.051" viewBox="0 0 17.051 17.051">
                <path id="Composite_Path" data-name="Composite Path" d="M1175.358,39.1a5.253,5.253,0,0,1,3.729,1.556,5.344,5.344,0,0,1,0,7.516,5.246,5.246,0,0,1-7.459,0,5.344,5.344,0,0,1,0-7.516,5.252,5.252,0,0,1,3.729-1.557m0-2.1a7.33,7.33,0,0,0-4.658,1.678,7.442,7.442,0,0,0,1.794,12.574,7.31,7.31,0,0,0,5.6-.009,7.39,7.39,0,0,0,3.974-3.97,7.474,7.474,0,0,0,.056-5.639,7.394,7.394,0,0,0-3.895-4.05,7.276,7.276,0,0,0-2.867-.584Z" transform="translate(-1168 -37)" fill="#f16623"></path>
                <path id="Path" d="M1183.382,52.4l.028-.028a1.094,1.094,0,0,1,1.448,0l3.794,3.823a1.038,1.038,0,0,1,0,1.46l-.027.028a1.094,1.094,0,0,1-1.448,0l-3.794-3.823A1.038,1.038,0,0,1,1183.382,52.4Z" transform="translate(-1171.901 -40.904)" fill="#f16623"></path>
              </svg>
            </div>
              <div class=" cta-group d-lg-flex align-items-center justify-content-">
                
                    
                    @if (!Auth::user())
                     
                        <a class="has-svg  btn btn--blue mr-2 " href="https://portal.agnisys.com">
                          <span class="d-flex align-items-center justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15.42" height="16.037" viewBox="0 0 15.42 16.037">
                              <g id="icon" transform="translate(-1241 -35)">
                                <path id="Path" d="M1248.716,55.6h-4.905a2.974,2.974,0,0,1-1.812-.561,2.349,2.349,0,0,1-.981-1.876,9.584,9.584,0,0,1,.552-3.829,3.827,3.827,0,0,1,1.346-1.87,3.113,3.113,0,0,1,1.806-.54.832.832,0,0,1,.389.138c.337.2.673.426,1.022.614a5.161,5.161,0,0,0,5.294-.079,6.9,6.9,0,0,0,.739-.457,1.248,1.248,0,0,1,.986-.191,3.126,3.126,0,0,1,2.341,1.618h0a6.649,6.649,0,0,1,.769,2.28,10.1,10.1,0,0,1,.141,2.406,2.393,2.393,0,0,1-.654,1.5,2.608,2.608,0,0,1-1.493.781,4.836,4.836,0,0,1-.762.064q-2.388,0-4.776,0Z" transform="translate(0 -4.569)" fill="#fff"></path>
                                <path id="Path-2" data-name="Path" d="M1255.1,39.019a4.128,4.128,0,0,1-4.267,4.009,4.337,4.337,0,0,1-2.941-1.214,3.937,3.937,0,0,1-1.205-2.83,4.212,4.212,0,0,1,8.414.035Z" transform="translate(-2.18)" fill="#fff"></path>
                              </g>
                            </svg>
                           Login
                         </a>
                    @endif
                    @if (Auth::user())
                         
                         <span class="user-cta has-svg  btn btn--blue mr-2">
                             <span class="d-flex align-items-center justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15.42" height="16.037" viewBox="0 0 15.42 16.037">
                                  <g id="icon" transform="translate(-1241 -35)">
                                    <path id="Path" d="M1248.716,55.6h-4.905a2.974,2.974,0,0,1-1.812-.561,2.349,2.349,0,0,1-.981-1.876,9.584,9.584,0,0,1,.552-3.829,3.827,3.827,0,0,1,1.346-1.87,3.113,3.113,0,0,1,1.806-.54.832.832,0,0,1,.389.138c.337.2.673.426,1.022.614a5.161,5.161,0,0,0,5.294-.079,6.9,6.9,0,0,0,.739-.457,1.248,1.248,0,0,1,.986-.191,3.126,3.126,0,0,1,2.341,1.618h0a6.649,6.649,0,0,1,.769,2.28,10.1,10.1,0,0,1,.141,2.406,2.393,2.393,0,0,1-.654,1.5,2.608,2.608,0,0,1-1.493.781,4.836,4.836,0,0,1-.762.064q-2.388,0-4.776,0Z" transform="translate(0 -4.569)" fill="#fff"></path>
                                    <path id="Path-2" data-name="Path" d="M1255.1,39.019a4.128,4.128,0,0,1-4.267,4.009,4.337,4.337,0,0,1-2.941-1.214,3.937,3.937,0,0,1-1.205-2.83,4.212,4.212,0,0,1,8.414.035Z" transform="translate(-2.18)" fill="#fff"></path>
                                  </g>
                                </svg>
                         {{Session::get('username')}} 
                         </span>
                         <ul class="fly-right-sub">
                            <li>
                               <a href="{{ url('/') }}/dashboard"><i class="fas fa-fw fa-tachometer-alt"></i>  Dashboard</a>
                            </li>
                            <li>
                               <a href="https://www.portal.agnisys.com/my-account/" data-toggle="modal" data-target="#logoutModal" >
                               <i class="fa fa-sign-out"></i>Log Out
                               </a>
                            </li>
                         </ul>
                         
                    @endif
                  </span>
                
                
                
                
                
                
                

                <a class="  btn btn--orange " href="https://www.agnisys.com/offers/request-a-call-about-the-agnisys-products-and-solutions">
                  <span class="d-flex align-items-center justify-content-center">
                    
                    
                    Get Started
                  </span>
                </a>
                
                
                
              </div>
              
            </div>
              <div class="custom-menu-primary menu-right">
                <span id="hs_cos_wrapper_global_header_mm_" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_menu" style="" data-hs-cos-general-type="widget" data-hs-cos-type="menu"><div id="hs_menu_wrapper_global_header_mm_" class="hs-menu-wrapper active-branch flyouts hs-menu-flow-horizontal" role="navigation" data-sitemap-name="default" data-menu-id="93465550948" aria-label="Navigation Menu">
 <ul role="menu">
  <li class="hs-menu-item hs-menu-depth-1 hs-item-has-children products" role="none"><a href="https://www.agnisys.com/products" aria-haspopup="true" aria-expanded="false" role="menuitem">Products</a><div class="child-trigger"></div>
   <ul role="menu" class="hs-menu-children-wrapper">
    <li class="hs-menu-item hs-menu-depth-2" role="none"><a href="https://www.agnisys.com/products/idesignspec-gdi" role="menuitem">IDesignSpec GDI</a></li>
    <li class="hs-menu-item hs-menu-depth-2" role="none"><a href="https://www.agnisys.com/products/ids-batch-cli" role="menuitem">IDS-Batch CLI</a></li>
    <li class="hs-menu-item hs-menu-depth-2" role="none"><a href="https://www.agnisys.com/products/ids-verify" role="menuitem">IDS-Verify</a></li>
    <li class="hs-menu-item hs-menu-depth-2" role="none"><a href="https://www.agnisys.com/products/ids-validate" role="menuitem">IDS-Validate</a></li>
    <li class="hs-menu-item hs-menu-depth-2" role="none"><a href="https://www.agnisys.com/products/ids-integrate" role="menuitem">IDS-Integrate</a></li>
    <li class="hs-menu-item hs-menu-depth-2" role="none"><a href="https://www.agnisys.com/products/ids-ipgen" role="menuitem">IDS-IPGen</a></li>
   </ul></li>
  <li class="hs-menu-item hs-menu-depth-1 hs-item-has-children solutions" role="none"><a href="https://www.agnisys.com/solutions" aria-haspopup="true" aria-expanded="false" role="menuitem">Solutions</a><div class="child-trigger"></div>
   <ul role="menu" class="hs-menu-children-wrapper">
    <li class="hs-menu-item hs-menu-depth-2" role="none"><a href="https://www.agnisys.com/solutions/functional-safety" role="menuitem">Functional Safety</a></li>
    <li class="hs-menu-item hs-menu-depth-2" role="none"><a href="https://www.agnisys.com/solutions/fpga-development" role="menuitem">FPGA</a></li>
    <li class="hs-menu-item hs-menu-depth-2" role="none"><a href="javascript:;" role="menuitem"></a></li>
   </ul></li>
  <li class="hs-menu-item hs-menu-depth-1 hs-item-has-children about" role="none"><a href="https://www.agnisys.com/about-agnisys" aria-haspopup="true" aria-expanded="false" role="menuitem">About</a><div class="child-trigger"></div>
   <ul role="menu" class="hs-menu-children-wrapper">
    <li class="hs-menu-item hs-menu-depth-2" role="none"><a href="https://www.agnisys.com/events" role="menuitem">Events</a></li>
    <li class="hs-menu-item hs-menu-depth-2" role="none"><a href="https://www.agnisys.com/news" role="menuitem">News</a></li>
    <li class="hs-menu-item hs-menu-depth-2" role="none"><a href="https://www.agnisys.com/newsletter" role="menuitem">Newsletters</a></li>
    <li class="hs-menu-item hs-menu-depth-2" role="none"><a href="https://www.agnisys.com/career-opportunities" role="menuitem">Careers</a></li>
    <li class="hs-menu-item hs-menu-depth-2" role="none"><a href="https://www.agnisys.com/agnisys-partner-program" role="menuitem">Partners</a></li>
   </ul></li>
  <li class="hs-menu-item hs-menu-depth-1 hs-item-has-children resources" role="none"><a href="https://www.agnisys.com/resources" aria-haspopup="true" aria-expanded="false" role="menuitem">Resources</a><div class="child-trigger"></div>
   <ul role="menu" class="hs-menu-children-wrapper">
    <li class="hs-menu-item hs-menu-depth-2" role="none"><a href="https://www.agnisys.com/resources#casestudy" role="menuitem">Case Studies</a></li>
    <li class="hs-menu-item hs-menu-depth-2" role="none"><a href="javascript:;" role="menuitem">eBooks</a></li>
    <li class="hs-menu-item hs-menu-depth-2" role="none"><a href="https://www.agnisys.com/resources#interview" role="menuitem">Interviews</a></li>
    <li class="hs-menu-item hs-menu-depth-2" role="none"><a href="https://www.agnisys.com/resources#podcast" role="menuitem">Podcasts</a></li>
    <li class="hs-menu-item hs-menu-depth-2" role="none"><a href="https://www.agnisys.com/resources#video" role="menuitem">Video</a></li>
    <li class="hs-menu-item hs-menu-depth-2" role="none"><a href="https://www.agnisys.com/resources#webinar" role="menuitem">Webinars</a></li>
    <li class="hs-menu-item hs-menu-depth-2" role="none"><a href="https://www.agnisys.com/resources#whitepaper" role="menuitem">Whitepapers</a></li>
   </ul></li>
  <li class="hs-menu-item hs-menu-depth-1 blog" role="none"><a href="https://www.agnisys.com/blog" role="menuitem">Blog</a></li>
  <li class="hs-menu-item hs-menu-depth-1 contact" role="none"><a href="https://www.agnisys.com/contact-us" role="menuitem">Contact</a></li>
 </ul>
</div></span>
              </div>
            </div>
          </div>

      </div>
      </div>
    </div>
</header>
<div class="header-spacer" style="height: 126.062px;"></div>

</div>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn2.hubspot.net/hub/22081774/hub_generated/template_assets/93551140619/1673817787893/theme-agnisys/js/main.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.0.0/jquery.magnific-popup.min.js"></script>
<script src="https://unpkg.com/scrollreveal"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.2/jquery.matchHeight-min.js"></script>
<script src="https://static.hsappstatic.net/cos-i18n/static-1.53/bundles/project.js"></script>
<script src="https://cdn2.hubspot.net/hub/22081774/hub_generated/module_assets/93554168594/1670537077189/module_93554168594_GLOBAL-header.min.js"></script>
<script src="https://static.hsappstatic.net/keyboard-accessible-menu-flyouts/static-1.17/bundles/project.js"></script>
<!-- <header> 
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
                                </ul>
                            </nav>
                        </div>
                    <form id="search" action="https://www.agnisys.com" method="GET">
                             <input type="text" name="s" placeholder="Search">
                             <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
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
</header> -->




            
 


            
 
   