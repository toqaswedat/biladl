<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name="author" content="Jobboard">
<title><?=$title;?></title>
      <link rel="shortcut icon" href="<?=base_url();?>assets/website/img/favicon.png">
      <link rel="stylesheet" href="<?=base_url();?>assets/website/css/bootstrap.min.css" type="text/css">
      <link rel="stylesheet" href="<?=base_url();?>assets/website/css/jasny-bootstrap.min.css" type="text/css">
      <link rel="stylesheet" href="<?=base_url();?>assets/website/css/bootstrap-select.min.css" type="text/css">

      <link rel="stylesheet" href="<?=base_url();?>assets/website/css/material-kit.css" type="text/css">

      <link rel="stylesheet" href="<?=base_url();?>assets/website/fonts/font-awesome.min.css" type="text/css">
      <link rel="stylesheet" href="<?=base_url();?>assets/website/fonts/themify-icons.css">

      <link rel="stylesheet" href="<?=base_url();?>assets/website/css/color-switcher.css" type="text/css">

      <link rel="stylesheet" href="<?=base_url();?>assets/website/extras/animate.css" type="text/css">

      <link rel="stylesheet" href="<?=base_url();?>assets/website/extras/owl.carousel.css" type="text/css">
      <link rel="stylesheet" href="<?=base_url();?>assets/website/extras/owl.theme.css" type="text/css">

      <link rel="stylesheet" href="<?=base_url();?>assets/website/extras/settings.css" type="text/css">

      <link rel="stylesheet" href="<?=base_url();?>assets/website/css/slicknav.css" type="text/css">

      <link rel="stylesheet" href="<?=base_url();?>assets/website/css/main.css" type="text/css">

      <link href="<?=base_url();?>assets/website/css/colors/red.css" rel="stylesheet" type="text/css" />

      <link rel="stylesheet" href="<?=base_url();?>assets/website/css/responsive.css" type="text/css">
      <link href="<?=base_url();?>assets/website/plugins/slick/slick.css" rel="stylesheet" type="text/css" />
      <link href="<?=base_url();?>assets/website/plugins/slick/slick-theme.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="<?=base_url();?>assets/website/js/jquery-min.js"></script>


        <style type="text/css">

                .slider {
                    width: 50%;
                    margin: 100px auto;
                }


                .slick-slide img {
                  width: 100%;
                }

                .slick-prev:before,
                .slick-next:before {
                  color: black;
                }

                .slick-active {
                  opacity: .5;
                }

                .slick-current {
                  opacity: 1;
                }
        </style>
</head>
<body>
    <div class="header">
      <section id="intro">     
          <div class="logo-menu">
              <nav class="navbar navbar-default pos-relative affix" role="navigation" data-spy="affix" data-offset-top="50">
                <div class="container">
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                      <a class="navbar-brand logo" href="<?=base_url();?>"><img src="<?=base_url();?>assets/website/img/logo.png" alt=""></a>
                  </div>

                  <!--<a class="search-button pull-right" href="javascript:void(0);"><i class="fa fa-search"></i></a>

                  <div class="search-box pull-right">
                    <div class="container pos-relative">
                    <input type="text" class="form-control" placeholder="Search" />
                    <a class="close-search" href="javascript:void(0);"><i class="fa fa-times"></i></a>
                    </div>
                  </div>-->
                      <ul class="pull-right "><li><a href="<?=base_url('arabic')?>" class="language-list"><i class="ti-globle"></i>عربى  </a></li></ul>
                  <div class="collapse navbar-collapse" id="navbar">
                      <ul class="nav navbar-nav pull-right">
                        <li><a class="active" href="<?=base_url();?>">Home</a></li>
                        <!-- <li><a href="<?=base_url('Pages/lawyers');?>">Lawyer</a></li> -->
                        <?php if($this->session->has_userdata('user_logged_in')): ?>
                        <li><a href="<?=base_url('Login/call_router/');?>">My Profile</a></li>
                        <li class="right border"><a href="<?=base_url();?>Login/is_logged_out_all/"><i class="ti-lock"></i> Logout</a></li>
                        <?php else: ?>
                        <!-- <li><a href="<?=base_url('Login/Login_as_register_member');?>">Member</a></li>
                        <li><a href="<?=base_url('Login/Login_as_register_trainee');?>">Paralegal Trainee</a></li> -->

                        <li class="right border"><a href="<?=base_url();?>Login/member_normal_login/"><i class="ti-unlock"></i> Log In / Register</a></li><li class="right border"><a href="<?=base_url();?>Pages/member_plans"> Services</a></li>
                        <?php endif; ?>
                        <li class="right border"><a href="<?=base_url();?>Pages/biladl/"> Biladl</a></li>

                        <li><a href="<?=base_url('Pages/about_us');?>">About Us</a></li>
                        <li><a href="<?=base_url('Pages/contact_us');?>">Contact Us</a></li>

                        
                      </ul>
                  </div>
                </div>



              <ul class="wpb-mobile-menu">
                <li><a class="active" href="<?=base_url();?>">Home</a></li>
                            
                            <!-- <li><a href="<?=base_url('Login/Login_as_register_lawyer');?>">Lawyer</a></li> -->
                           
                            <?php if($this->session->has_userdata('user_logged_in')): ?>
                            <li><a href="<?=base_url('Login/call_router/');?>">My Profile</a></li>
                            <li class="right border"><a href="<?=base_url();?>Login/is_logged_out_all/"><i class="ti-lock"></i> Logout</a></li>
                            <?php else: ?>
                             <!-- <li><a href="<?=base_url('Login/Login_as_register_member');?>">Member</a></li>
                             <li><a href="<?=base_url('Login/Login_as_register_trainee');?>">Paralegal Trainee</a></li> -->
                             <li class="right border"><a href="<?=base_url();?>Login/member_normal_login/"><i class="ti-unlock"></i> Log In / Register</a></li>
                            <?php endif; ?>
                            <li class="right border"><a href="<?=base_url();?>Pages/biladl/"> Biladl</a></li>
                            <li><a href="<?=base_url('Pages/about_us');?>">About Us</a></li>
                             <li><a href="<?=base_url('Pages/contact_us');?>">Contact Us</a></li>

                             
              </ul>
              <!--<ul class="visible-xs mobile-login">
              <li><a href="#"><i class="ti-user"></i></a></li>
              </ul>-->
              </nav>
            </div>
                    <!-- Banner2 -->
            <div class="main-slider">
              <div class="container">
                <div class="row">
                  <div class="center">
                    <div>
                      <img src="<?=base_url();?>assets/website/img/slider/slider2.jpg" onClick="window.location.href='<?=base_url('Login/member_normal_login/');?>'" style="cursor:pointer;" />
                    </div>
                    <div>
                      <img src="<?=base_url();?>assets/website/img/slider/slider3.jpg"  onClick="window.location.href='<?=base_url('Login/member_normal_login/');?>'" style="cursor:pointer;" />
                    </div>
                    <div>
                     <img src="<?=base_url();?>assets/website/img/slider/slider1.jpg" onClick="window.location.href='<?=base_url();?>Pages/member_plans/'" style="cursor:pointer;" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
      </section>
    </div>
  <section class="category">
    <div class="container">
    <!--<h2 class="section-title">Browse Categories</h2>-->
        <div class="row">
            <div class="col-md-12">
              <div class="col-md-2 col-sm-2 col-xs-6 f-category">
                <a href="#" data-toggle="modal" data-target="#call-center">
                  <div class="icon">
                  <!--<i class="ti-world"></i>--><img src="<?=base_url();?>assets/website/img/icons/call-center.png" />
                  </div>
                <h3 style="font-size: 22px; font-weight: 800;">Call Center</h3>
                </a>
              </div>
            <div class="col-md-2 col-sm-2 col-xs-6 f-category">
            <a href="javascript:void(0);" id="addClass">
              <div class="icon">
              <!--<i class="ti-receipt"></i>--><img src="<?=base_url();?>assets/website/img/icons/chat.png" />
              </div>
              <h3 style="font-size: 22px; font-weight: 800;">Chat</h3>
            </a>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-6 f-category">
              <a href="" data-toggle="modal" data-target="#legal-advice">
                <div class="icon">
                <!--<i class="ti-user"></i>--><img src="<?=base_url();?>assets/website/img/icons/faq.png" />
                </div>
                <h3>Legal Advice & FAQ's</h3>
              </a>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-6 f-category">
              <a href="" data-toggle="modal" data-target="#legal-help">
              <div class="icon">
              <!--<i class="ti-clipboard"></i>--><img src="<?=base_url();?>assets/website/img/icons/help.png" />
              </div>
               <h3>Legal Help</h3>
              </a>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-6 f-category">
              <a href="<?=base_url('pages/cyber_defamation');?>">
                <div class="icon">
                <!--<i class="ti-link"></i>--><img src="<?=base_url();?>assets/website/img/icons/defamation.png" />
                </div>
                <h3>Cyber Defamation</h3>
              </a>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-6 f-category">
                <a href="<?=base_url('pages/lawyers')?>">
                  <div class="icon">
                  <!--<i class="ti-help"></i>--><img src="<?=base_url();?>assets/website/img/icons/lawyer.png" />
                  </div>
                <h3>Your Lawyer</h3>
                </a>
            </div>

            </div>
        </div>
    </div>

      <div class="sub-cat">
        <div class="container">
          <div class="row">
            <div class="col-md-12 center-div">
              <div  class="col-lg-12">
              <hr class="new" />
              </div>
              <div class="col-md-4 col-sm-6 col-xs-12 f-category">
                <a class="black" href="#"  data-toggle="modal" data-target="#call-center">
                  <div class="icon">
                  <!--<i class="ti-world"></i>--><img src="<?=base_url();?>assets/website/img/home/call-center.jpg" />
                  </div>
                <div class="text-holder">
                  <h3 class="text-yellow">Call us 24/7</h3>
                  <p class="text-white">We are here to help you<br><br></p>
                  <p class="pull-right" href="#">Call Us</p>
                </div>
                </a>
              </div>
            <div class="col-md-4 col-sm-6 col-xs-12 f-category">
              <a class="blue" href="<?=base_url()?>Pages/about_us">
              <div class="icon">
              <!--<i class="ti-receipt"></i>--><img src="<?=base_url();?>assets/website/img/home/about.jpg" />
              </div>
              <div class="text-holder">
                <h3>About us</h3>
                <p class="text-black">Problems remains Problems until you get connected to Biladl...</p>
                <p class="pull-right text-black" href="<?=base_url()?>Pages/about_us">Know More</p>
              </div>
              </a>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 f-category download-app">
              <a class="black" href="javascript:void(0);">
                <div class="icon">
                <img src="<?=base_url();?>assets/website/img/download/download-app.png" />
                </div>
                <div class="text-holder">
                <h3 class="text-yellow">Biladl Mobile App</h3>
                <p class="text-white">Download the App and have a Live in Lawyer in your Pocket </p>
                <p class="pull-right" href="#">Download Now</p>
                </div>
              </a>
            </div>

            </div>
          </div>
        </div>
      </div>
  </section>

  <section class="find-article section">
      <div class="container">
          <h2 class="section-title">Latest Articles</h2>
          <div class="row">
            <div class="center-div">
              <div class="wrap-slick4 slick-container">
                <div class="slick4">
                  <?php foreach ($paged_articles as $art_key => $art_val) : ?>
                  <div class="item-slick2">
                    <div class="block">
                      <div class="job-list">
                        <div class="thumb" style="background:url('<?=base_url($art_val->image)?>');">
                          <!-- <a href="javascript:void(0);"><img src="<?=base_url($art_val->image)?>" /></a> -->
                          <div class="meta-tag">
                            <span>
                              <a class="save bookmark-js" href="javascript:void(0)" title="Bookmart"
                                   data-artID="<?=$art_val->id;?>" 
                                data-bookMtype="<?php echo ($art_val->staus_book)? "REMOVE":"ADD"; ?>" >
                                <i class="<?php echo ($art_val->staus_book)? "fa fa-bookmark":"fa fa-bookmark-o"; ?>"></i> 
                              </a>
                            </span>
                            <span>
                              <a href="#" title="share" title="Share">
                                <i class="ti-share"></i>
                              </a>
                            </span>
                          <!--<span><a class="saved"><i class="ti-bookmark"></i> Saved</a></span>-->
                          </div>
                        </div>
                        <div class="job-list-content">
                        <h4>
                          <a href="javascript:void(0);"> 
                          <?=$art_val->title?></a>
                        </h4>
                      </div>
                      </div>
                    </div>
                  </div>
                    <?php endforeach; ?>

                </div>
              </div>
              <a href="<?=base_url('pages/articles')?>" class="view-all pull-right btn btn-dark">View All</a>
            </div>
        </div>
      </div>
    </section>


<section id="blog" class="section news">
  <div class="container">
    <h2 class="section-title">Latest News</h2>
      <div class="row">
        <div class="wrap-slick5 slick-container">
          <div class="slick5">
            <?php foreach ($paged_news as $news_key => $news_val) : ?>
            <div class="item-slick2">
              <div class="blog-item-wrapper">
                <div class="blog-item-img" style="background: url('<?=base_url($news_val->image)?>');">
                  <!-- <a href="<?=base_url('pages/NewsDetails/').$news_val->id.'/';?>">
                  <img src="<?=base_url($news_val->image)?>" alt="">
                  </a> -->
                </div>
                <div class="blog-item-text">
                  <div class="meta-tags">
                    <span class="date"><i class="ti-calendar"></i><?=date('M-d-y',strtotime($art_val->created_on));?></span>
                    <span class="comments"><a href="#"><i class="ti-comment-alt"></i>Topic</a></span>
                  </div>
                    <a href="<?=base_url('pages/NewsDetails/').$news_val->id.'/';?>">
                      <h3><?=$news_val->title?></h3>
                    </a>
                    <p> <?=$news_val->description?></p>
                    <a href="<?=base_url('pages/NewsDetails/').$news_val->id.'/';?>" class="btn btn-common btn-blue btn-rm">Read More</a>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      <a href="<?=base_url('pages/News')?>" class="view-all pull-right btn btn-dark">View All</a>
  </div>
</section>
<?php if(!$this->session->has_userdata('user_logged_in')): ?>
<section id="pricing-table" class="section plans">
<!--<div class="overlay"></div>-->
<div class="container">
<h2 class="section-title">
    Choose Your Plan
</h2>
<div class="row">
   <?php foreach ($all_packages as $key => $packVal) :  ?>
<div class="col-sm-4">
  <div class="table">
      <div class="title">
        <h3><?=$packVal->title?></h3>
      </div>
      <div class="pricing-header silver">
        <p class="price-value"> <?=$packVal->price?> <sup>SAR</sup></p>
        <p class="price-quality text-black">Per Month</p>
        <!-- <p class="price-quality text-black"><?=$packVal->total_days?> DAYS</p> -->
      </div>
      <ul class="description" style="overflow:auto;">
       <!-- <li><b>package type :</b> <?=$packVal->package_type?></li> -->
       <!-- <li class="hide-desc" style="height:250px; ;width: 100%; display: none;"></li> -->
      </ul>

<br />
<a href="#plan-details-popup" data-toggle="modal" class="plan-readmore" data-contents='<?=trim($packVal->description);?>' data-titles='<?=$packVal->title?>'>Read More</a>
<br />
<a href="<?=base_url();?>Login/member_normal_login/" class="btn btn-common btn-blue" type="submit" style="margin-top:20px;">Get Started</a>
  </div>
</div>
<?php endforeach; ?>

</div>
</div>
</section>

 <?php endif;  ?>

<div id="plan-details-popup" class="modal fade in" role="dialog">
  <div class="modal-dialog large-modal">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">PLAN Details</h4>
       <!--  <p>Submit Your Query & Get an Immediate Response</p> -->
      </div>
      <div class="modal-body">
       <p>Plan details text here....</p>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  
$(".plan-readmore").click(function(){
   // alert($(this).attr("data-contents"));
    $('#plan-details-popup').find("h4").html($(this).attr("data-titles")+' PLAN Details');
    $('#plan-details-popup').find("p:nth-child(1)").html($(this).attr("data-contents"));
    
});

</script>


<!--<section class="section purchase" data-stellar-background-ratio="0.5">
<div class="container">
<div class="row">
<div class="section-content text-center">
<h1 class="title-text">
Looking for a Job
</h1>
<p>Join thousand of employers and earn what you deserve!</p>
<a href="my-account.html" class="btn btn-common">Get Started Now</a>
</div>
</div>
</div>
</section>-->



 <!-- Testimonial Section Start -->
      <section id="testimonial" class="section">
        <div class="container">
          <div class="row">
            <div class="touch-slider" class="owl-carousel owl-theme">
              <div class="item active text-center">  
                <img class="img-member" src="<?=base_url();?>assets/website/img/testimonial/img1.jpg" alt=""> 
                <div class="client-info">
                 <h2 class="client-name">"John Smith  <span>(Project Menager)</span></h2>
                </div>
                <p><i class="fa fa-quote-left quote-left"></i> The team that was assigned to our project... were extremely professional <i class="fa fa-quote-right quote-right"></i><br> throughout the project and assured that the owner expectations were met and <br> often exceeded. </p>
              </div>
              <div class="item text-center">
                <img class="img-member" src="<?=base_url();?>assets/website/img/testimonial/img2.jpg" alt=""> 
                <div class="client-info">
                 <h2 class="client-name">"John Smith  <span>(Project Menager)</span></h2>
                </div>
                <p><i class="fa fa-quote-left quote-left"></i> The team that was assigned to our project... were extremely professional <i class="fa fa-quote-right quote-right"></i><br> throughout the project and assured that the owner expectations were met and <br> often exceeded. </p>
              </div>
              <div class="item text-center">
                <img class="img-member" src="<?=base_url();?>assets/website/img/testimonial/img3.jpg" alt=""> 
                <div class="client-info">
                  <h2 class="client-name">" Quan Ngyen <span>(Electricity Engineer)</span></h2>
                </div>
                <p><i class="fa fa-quote-left quote-left"></i> The team that was assigned to our project... were extremely professional <i class="fa fa-quote-right quote-right"></i><br> throughout the project and assured that the owner expectations were met and <br> often exceeded. </p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Testimonial Section End -->

<div class="app-download-section style-2">
   <!-- app-download-section-wrapper -->
   <div class="app-download-section-wrapper">
      <!-- app-download-section-container -->
      <div class="app-download-section-container">
         <!-- container -->
         <div class="container">
            <!-- row -->
            <div class="row">
               <div class="col-md-6 col-sm-12 col-xs-12">
                  <div class="mobile-image-content"> <img src="<?=base_url();?>assets/website/img/download/hand.png" alt=""> </div>
               </div>
               <div class="col-md-6 col-sm-12 col-xs-12">
                  <div class="app-text-section">
                
                     <h3>Download our app</h3>
                     <ul>
                        <li>Login to Biladl</li>
                        <li>Find any service you want</li>
                        <li>Ask any Query </li>
                        <li>Be Updated with News</li>
                     </ul>
                     <div class="app-download-btn">
                        <div class="row">
                           <div class="col-md-5 col-sm-12 col-xs-12">
                              <!-- Windows Store -->
                              <a href="Javascript:void(0);" title="Play Store" class="btn app-download-button">
                                 <span class="app-store-btn">
                                    <i class="fa fa-android"></i>
                                    <span>
                                       <span>Download From</span>
                                       <span>Play Store</span>
                                    </span>
                                 </span>
                              </a>
                              <!-- /Windows Store -->
                           </div>
                           <div class="col-md-5 col-sm-12  col-xs-12">
                              <!-- Windows Store -->
                              <a href="Javascript:void(0);" title="App Store" class="btn app-download-button"> <span class="app-store-btn">
                                 <i class="fa fa-apple"></i>
                                 <span>
                                    <span>Download From</span> <span>App Store </span> </span>
                                 </span>
                              </a>
                              <!-- /Windows Store -->
                           </div>
                           <!-- Windows Store -->
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- /row -->
         </div>
         <!-- /container -->
      </div>
      <!-- /app-download-section-container -->
   </div>
</div>

<!--<section class="infobox section">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="info-text">
<h2>Don't Want To Miss a Thing?</h2>
<p>Just go to <a href="#">Google Play</a> to download JobBoard Mini</p>
</div>
<a href="#" class="btn btn-border">Google Play</a>
</div>
</div>
</div>
</section>-->
<div class="popup-box chat-popup" id="qnimate">
      <div class="popup-head">
        <div class="popup-head-left pull-left">
          <img src="https://lut.im/7JCpw12uUT/mY0Mb78SvSIcjvkf.png" alt="iamgurdeeposahan"> Member Support
        </div>
        <div class="popup-head-right pull-right">
            <button data-widget="remove" id="removeClass" class="chat-header-button pull-right" type="button">
              <i class="fa fa-close" aria-hidden="true"></i>
            </button>
        </div>
      </div>
		
   <?php if(!$this->session->has_userdata('user_logged_in')): ?>
    <div class="popup-messages">
    <div class="direct-chat-messages">          
        <div class="direct-chat-msg doted-border">
            <button class="btn btn-common log-btn center-block" style="margin-top: 50%;">login to chat</button>
        </div>
    </div>
  </div>
    <?php else:?>
    <div class="popup-messages" id="chatdiv">
   <div class="direct-chat-messages">          
        <div class="direct-chat-msg doted-border " id="ChatInndiv"> 
           
    </div>
  </div>
  <div class="popup-messages-footer">
  <form action="#" onsubmit="return false;">
  <div class="btn-footer row">
    <div class="col-md-10">
      <div class="form-group" style="margin-left: -3%">
        <input type="text" id="Mymsg" class="form-control" autocomplete="off" placeholder="Appropirate Heading">
    </div>
    </div>
    <div class="col-md-1">
      <button type="submit" class="bg_none pull-right form-control" onclick="SendMessage()"><i class="fa fa-paper-plane" style="width: 47px;"></i> 
    </div>
    </div>
  </form>

      </div>
   </div>

    <?php endif;?>
	  </div>

<footer>

<section class="footer-Content">
<div class="container">
<div class="row">
<div class="col-md-5 col-sm-5 col-xs-12">
<div class="widget">
<h3 class="block-title text-center">Quick Links</h3>
<ul class="menu text-center">
<li><a href="<?=base_url('Pages/about_us');?>">About Us</a></li>
<li><a href="#">Terms & Conditions</a></li>
<li><a href="<?=base_url('Pages/privacy_policy');?>">Privacy Policy</a></li>
<li><a href="<?=base_url('Pages/contact_us');?>">Contact Us</a></li>
</ul>
</div>
</div>
 <div class="col-md-2 col-sm-2 col-xs-12">
                <div class="widget">
                 <h3 class="block-title"><img src="<?=base_url();?>assets/website/img/logo.png" class="img-responsive" alt="Footer Logo"></h3>
                 
                </div>
              </div>
<div class="col-md-5 col-sm-5 col-xs-12 text-center">
<div class="widget">
<h3 class="block-title text-center">Connect with Us</h3>
<div class="bottom-social-icons social-icon">
<a class="twitter" href="#"><i class="ti-twitter-alt"></i></a>
<a class="facebook" href="#"><i class="ti-facebook"></i></a>
<a class="youtube" href="#"><i class="ti-youtube"></i></a>
<a class="dribble" href="#"><i class="ti-dribbble"></i></a>
<a class="linkedin" href="#"><i class="ti-linkedin"></i></a>
</div>
<!--<p>Join our mailing list to stay up to date and get notices about our new releases!</p>
<form class="subscribe-box">
<input type="text" placeholder="Your email">
<input type="submit" class="btn-system" value="Send">
</form>-->
</div>
</div>
</div>
</div>
</section>


<div id="copyright">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="site-info text-center">
<p>All Rights reserved &copy; 2017 - Designed & Developed by <a rel="nofollow" target="_blank" href="http://techtinderbox.com">Tech Tinderbox</a></p>
</div>
</div>
</div>
</div>
<hr />
<div class="container">
<div class="row">
<div class="span4 collapse-group site-info disclaimer">
          <p><strong>Disclaimer : </strong>All materials and information contained in this website is for general purpose only. Whilst we endeavour to keep the information up to date and correct, Biladl makes no representations or warranties of any kind, express or implied about the completeness, accuracy, reliability, suitability or availability with respect to the website or the information, services, documents or related graphics contained in on the website for any purpose. Any reliance you place on such material is therefore strictly at your own risk.</p>
           <div class="collapse" id="viewdetails"> <p> Although every effort is made to keep the website up and running smoothly, due to the nature of the internet and technology involved, Biladl takes no responsibility for and will not be liable for the website being temporarily unavailable due to technical issues or otherwise beyond its control for any loss or damage suffered as a result of the use of or access to, or inability to use or access this website whatsoever. </p>  
                <p>Certain links in this website will lead to websites which not under the control of Biladl. When you activate these, you will leave Biladl’s Website. Biladl has no control over and accepts no liability in respect of materials, products or services available on any website which is not under the control of Biladl. </p>
                <p>Whilst the legal team of Biladl will endeavour to deliver its best services, the outcomes always will depend on the understanding of the courts. We seek to achieve Client’s expectations, but in no circumstances, we promise to conclude their exact expectations. Thus, clients cannot claim for any compensation for any loss they suffer. Any hidden state of fact from Biladl team might render the quality of our service given, and such hidden information will only affect the client’s situation to reach their aims. Such negligence cannot hold Biladl liable. </p>
                <p>To the extent not prohibited by law, in no circumstances shall Biladl be liable to you or any other third parties for any loss or damage (including, without limitation, damage for loss of business or loss of profits) arising directly or indirectly from your use of inability to use this site or any of the materials contained in it.</p>
           </div><a class="" href="javascript:void(0);" data-toggle="collapse" data-target="#viewdetails">Read More &raquo;</a>
          
        </div>
</div>
</div>
</div>

</footer>



<!-- Modal Online Advice -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Online Advice</h4>
        <p>Submit Your Query & Get an Immediate Response</p>
      </div>
      <div class="modal-body">
        <div class="page-login-form">
<form role="form" class="login-form">
<div class="form-group">
<div class="input-icon">
<i class="ti-pencil-alt"></i>
<!--<input type="text" id="sender-email" class="form-control" name="email" placeholder="Email">-->
<textarea class="form-control" placeholder="Your Query..."></textarea>
</div>
</div>
<div class="form-group">
<div class="input-icon">
<i class="ti-info"></i>
<input type="text" class="form-control" placeholder="Appropirate Heading">
</div>
</div>

<div class="form-group">
<div class="input-icon">
<div class="row">
<div class="col-sm-6 col-xs-12">
<label for="sel1">Choose Topic</label>
  <select class="form-control" id="sel1">
    <option></option>
    <option>Lorem ipsum dolor sit amet</option>
    <option>Lorem ipsum dolor sit amet</option>
    <option>Lorem ipsum dolor sit amet</option>
    <option>Lorem ipsum dolor sit amet  </option>
  </select>
</div>

<div class="col-sm-6 col-xs-12">
<label for="sel1">Choose City</label>
  <select class="form-control" id="Select1">
    <option></option>
    <option>Hyderbad</option>
    <option>Mumbai</option>
    <option>Banglore</option>
    <option>Chennai</option>
    <option>Panjab</option>
    <option>Sikkim</option>
    <option>Kashmir</option>
    <option>Manipal</option>
    <option>Aurangabad</option>
    <option>Nasik</option>
    <option>Faridabad</option>
  </select>
</div>
</div>
</div>
</div>

<div class="form-group">
 <label for="sel1">Attach Document if any</label>
<div class="input-group">
  
    <input type="text" class="form-control" id="upload-file-info" readonly>
     <label class="input-group-btn">
        <span class="btn btn-file">
           <i class="ti-clip"></i> Browse&hellip; <input id="my-file-selector" type="file" style="display:none;" onchange="$('#upload-file-info').val($(this).val());">
        </span>
    </label>
</div>
</div>

<div class="form-group">
<div class="input-icon">
<div class="row">
<div class="col-sm-6 col-xs-12">
<div class="input-icon">
<i class="ti-email"></i>
<input type="text" class="form-control" placeholder="Email ID">
</div>
</div>
<div class="col-sm-6 col-xs-12">
<div class="input-icon">
<i class="ti-mobile"></i>
<input type="text" class="form-control" placeholder="Mobile No">
</div>
</div>
</div>
</div>
</div>
<hr />
<div class="col-lg-6 center-div"><button class="btn btn-common log-btn">Submit Query</button></div>

</form>
</div>
      </div>
    </div>

  </div>
</div>


<div id="call-center" class="modal no-bg fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
    
      <div class="modal-body">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h2 class="call-heading"> 1800-000-000</h2>
          <img class="call-img" src="<?=base_url();?>assets/website/img/home/call-us.png" />
      </div>
    </div>

  </div>
</div>

<!-- Modal Online Advice -->
<div id="legal-help" class="modal fade" role="dialog">
  <div class="modal-dialog medium-modal">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Legal Help</h4>
       <!-- <p>Submit Your Query & Get an Immediate Response</p>-->
      </div>
      <div class="modal-body">
       <ul class="legal-points">
       <li><a href="<?=base_url('pages/News')?>">Legal News <i class="ti-angle-right"></i></a></li>
       <li><a href="<?=base_url('pages/Useful_links')?>">Usefull Links <i class="ti-angle-right"></i></a></li>
       <li><a href="<?=base_url('pages/Useful_document')?>">Documents <i class="ti-angle-right"></i></a></li>
       </ul>
      </div>
    </div>

  </div>
</div>

<!-- Modal Online Advice -->
<div id="legal-advice" class="modal fade" role="dialog">
  <div class="modal-dialog medium-modal">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Legal Advice</h4>
       <!-- <p>Submit Your Query & Get an Immediate Response</p>-->
      </div>
      <div class="modal-body">
       <ul class="legal-points">
       <li><a href="<?=base_url('pages/articles')?>">Articles <i class="ti-angle-right"></i></a></li>
       <li><a href="<?=base_url('pages/faqs')?>">FAQ's <i class="ti-angle-right"></i></a></li>
       <li><a href="<?=base_url('pages/online_advice')?>">Advice <i class="ti-angle-right"></i></a></li>
       </ul>
      </div>
    </div>

  </div>
</div>


<a href="#" class="back-to-top">
<i class="ti-arrow-up"></i>
</a>
<div id="loading">
<div id="loading-center">
<div id="loading-center-absolute">
<div class="object" id="object_one"></div>
<div class="object" id="object_two"></div>
<div class="object" id="object_three"></div>
<div class="object" id="object_four"></div>
<div class="object" id="object_five"></div>
<div class="object" id="object_six"></div>
<div class="object" id="object_seven"></div>
<div class="object" id="object_eight"></div>
</div>
</div>
</div>


<!-- <div class="modal fade bd-example-modal-sm" id="language" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title pull-left">Select Language</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <ul class="language">
        <li><a href="#" data-dismiss="modal" aria-label="Close"><i class="">E</i>English</a></li>
        <li><a href="<?=base_url('arabic')?>"><i class="">ع</i> عربى </a></li>
       </ul>
      </div>
    </div>
  </div>
</div> -->


<script type="text/javascript" src="<?=base_url();?>assets/website/js/bootstrap.min.js"></script>

<script type="text/javascript" src="<?=base_url();?>assets/website/js/material.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/website/js/material-kit.js"></script>
<!--<script type="text/javascript" src="<?=base_url();?>assets/website/js/color-switcher.js"></script>-->
<script type="text/javascript" src="<?=base_url();?>assets/website/js/jquery.parallax.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/website/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/website/js/jquery.slicknav.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/website/js/main.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/website/js/jquery.counterup.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/website/js/waypoints.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/website/js/jasny-bootstrap.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/website/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/website/js/form-validator.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/website/js/contact-form-script.js"></script>
  <script src="<?=base_url();?>assets/website/plugins/slick/slick.js" type="text/javascript"></script>
    <script src="<?=base_url();?>assets/website/plugins/slick/slick-custom.js" type="text/javascript"></script>
    <audio id="audio-alert" src="<?=base_url();?>assets/audio/alert.mp3" preload="auto"></audio>
<audio id="audio-fail" src="<?=base_url();?>assets/audio/fail.mp3" preload="auto"></audio>

    <script>

      $(window).on('load',function(){
        $('#language').modal('show');
    });
        $(window).resize(function () {

            $(function () {
                $("#addClass").click(function () {
                    $('#qnimate').addClass('popup-box-on');
                     $('#chatdiv').animate({
                        scrollTop: $('#chatdiv')[0].scrollHeight}, 1000);
                });

                $("#removeClass").click(function () {
                    $('#qnimate').removeClass('popup-box-on');
                });
            })

                    
            $('.search-box').hide();
            $('.search-button').click(function () {
                $('.search-box').toggle("slide");
            });
            $('.close-search').click(function () {
                $('.search-box').toggle("slide");
            });

            if ($(window).width() <= 1024) {
                //$('.navbar .nav').addClass('wpb-mobile-menu');
                //$('.navbar .nav').removeClass('nav navbar-nav navbar-right float-right');
                //alert();
                // if larger or equal
                // $('.main-category-list ul').attr('id', 'category-slider');
                // $('.category-section-home ul').attr('class', 'sub-category-slider');
                //                $('.navbar .nav').addClass('wpb-mobile-menu');
                //                $('.navbar .nav').removeClass('nav navbar-nav navbar-right float-right');
            } else {
                // if smaller
                // $('.main-category-list ul').removeAttr('id', 'category-slider');
                // $('.main-category-list ul').attr('id', 'category-mobile-slider');
            }
        }).resize();
    </script>

</body>
</html>
<script type="text/javascript">
  $( ".bookmark-js").click(function() {
      cliker=$(this);

      var artID=cliker.attr("data-artID");
      var bookmarkType=cliker.attr("data-bookMtype");
      var Data_in_json={artID: artID,bookmarkType: bookmarkType};
        var urls='<?=base_url("Login/AddBookmarks_article");?>';
         $.post(urls,Data_in_json).done(function(response){                               
             getdata=JSON.parse(response);
             if(getdata['status']==true && getdata['error_code']==200)
             {
              cliker.attr('data-bookMtype', 'REMOVE');
              cliker.find('i').removeClass( "fa fa-bookmark-o" );
              cliker.find('i').addClass( "fa fa-bookmark" );              
                //alert("Bookmark created");
             }
             else if(getdata['status']==true && getdata['error_code']==201)
             {
              cliker.find('i').removeClass( "fa fa-bookmark" ); 
              cliker.find('i').addClass( "fa fa-bookmark-o" );
                cliker.attr('data-bookMtype', 'ADD');
                // alert("Removed");
             }             
             else if(getdata['status']==false && getdata['error_code']==401)
             { 
                 window.location="<?=base_url('Login/Login_as_register_member')?>";
             }
             
        });
  });
</script>

<script type="text/javascript">

var  Premsg='';
var  Postmsg='';
$('#chatdiv').scroll(function() {
   if($('#chatdiv').scrollTop() + $('#chatdiv').height() <= $('#chatdiv').height()) {
        
         var lastChatID = $(".li-id")[0].getAttribute('data-rowid');
          GetchatHistory(lastChatID);
   }
});


function GetchatHistory(lastChatID)
    {
      $.ajax({
        type:'post',
        url : '<?php echo base_url('Login/GetMoreChat'); ?>',
        data : {lastChatID:lastChatID},
        beforeSend: function( xhr ) {
          xhr.overrideMimeType( "text/plain; charset=x-user-defined" );
          //$("#wait").css("display", "block");
        },
          success : function(data) { //alert(data);
            
             var getMsg = JSON.parse(data);            
                if(getMsg['error']>0){
                   //alert(getMsg['json_msg']);
                   return true;
              }
             else
             {                
                  if(getMsg['status']==true && getMsg['error_code']==200){
                   $.each(getMsg['response'], function(key,value) { 
                    if(value['UserType']!='Admin')
                    {
                       Premsg +='<div  class="li-id"  data-rowid="'+value['id']+'" ><div class="direct-chat-info clearfix" > <span class="direct-chat-name pull-left">You</span> </div> <img alt="message user image" src="<?=base_url();?>assets/images/user.png" class="direct-chat-img"> <div class="direct-chat-text">'+value['message']+'</div> <div class="direct-chat-info clearfix"> <span class="direct-chat-timestamp pull-right">'+value['TIMEONLY']+'</span> </div> </div>';
                    }
                    else
                    {

                      Premsg +='<div class="direct-chat-info clearfix right-user li-id" data-rowid="'+value['id']+'"> <span class="direct-chat-img-reply-small pull-right"><img alt="message user image" src="<?=base_url();?>assets/images/expert.png" class="direct-chat-img"></span> <span class="direct-chat-reply-name">ADMIN</span> <div class="direct-chat-text">'+value['message']+'</div> <div class="direct-chat-info clearfix">  <span class="direct-chat-timestamp pull-left">'+value['TIMEONLY']+'</span> </div> </div>';
                    }

                });
              var Oldheightdiv=$('#chatdiv')[0].scrollHeight
                $("#ChatInndiv").html(Premsg+ $("#ChatInndiv").html());
                Premsg='';
              var Nowheightdiv=$('#chatdiv')[0].scrollHeight
                $('#chatdiv').animate({
                        scrollTop: Nowheightdiv-Oldheightdiv-10}, 1000);
               }
             }             
              return false;
          }
        });
    }

</script>









<script type="text/javascript">

var  Postmsg='';
  function GetchatFuture(ENDChatID)
    {
      $.ajax({
        type:'post',
        url : '<?php echo base_url('Login/GetFetureChat'); ?>',
        data : {ENDChatID:ENDChatID},
        beforeSend: function( xhr ) {
          xhr.overrideMimeType( "text/plain; charset=x-user-defined" );
          //$("#wait").css("display", "block");
        },
          success : function(data) {     
             var getMsg = JSON.parse(data);

             if(getMsg['status']==true && getMsg['error_code']==200){

              var tempID=0;
                   $.each(getMsg['response'], function(key,value) {            
                     tempID=value['id'];
                     if(value['UserType']!='Admin')
                    {
                       Postmsg +='<div  class="li-id"  data-rowid="'+value['id']+'" ><div class="direct-chat-info clearfix" > <span class="direct-chat-name pull-left">You</span> </div> <img alt="message user image" src="<?=base_url();?>assets/images/user.png" class="direct-chat-img"> <div class="direct-chat-text">'+value['message']+'</div> <div class="direct-chat-info clearfix"> <span class="direct-chat-timestamp pull-right">'+value['TIMEONLY']+'</span> </div> </div>';

                    }
                    else
                    {
            
                       Postmsg +='<div class="direct-chat-info clearfix right-user li-id" data-rowid="'+value['id']+'"> <span class="direct-chat-img-reply-small pull-right"><img alt="message user image" src="<?=base_url();?>assets/images/expert.png" class="direct-chat-img"></span> <span class="direct-chat-reply-name">ADMIN</span> <div class="direct-chat-text">'+value['message']+'</div> <div class="direct-chat-info clearfix">  <span class="direct-chat-timestamp pull-left">'+value['TIMEONLY']+'</span> </div> </div>';
                    }
                    

                });
                    // alert(ENDChatID);
                if(tempID!=ENDChatID){

                  $("#ChatInndiv").append(Postmsg);
               }
                Postmsg='';
                 $('#chatdiv').animate({
                        scrollTop: $('#chatdiv')[0].scrollHeight}, 1000);
              }

              return false;
          }
        });
    }
</script>


<script type="text/javascript">
  
function SendMessage()
    {
      var Mymsg= $("#Mymsg").val();
      if(Mymsg=='')
      {
        return false;
      } 
      $.ajax({
        type:'post',
        url : '<?php echo base_url('Login/SendMessage'); ?>',
        data : {Mymsg:Mymsg},
        beforeSend: function( xhr ) {
          xhr.overrideMimeType( "text/plain; charset=x-user-defined" );
          //$("#wait").css("display", "block");
        },
          success : function(data) {
              try {
               document.getElementById("audio-alert").play();
              }
              catch(err) {    
              }
             var getMsg = JSON.parse(data);
                if(getMsg['status']==true && getMsg['error_code']==200){
                   $("#Mymsg").val('');
                   call_function();
                  return true;
              }
              $("#Mymsg").val('');
                         
              return false;
          }
        });
      
    }

</script>

<script type="text/javascript">
function call_function()
{      
  try {
       var lengthli =$( ".li-id" ).length-1;
       var ENDChatID =  $(".li-id")[lengthli].getAttribute('data-rowid');    
      }
      catch(err) {  
        ENDChatID=0;
      }
    
      GetchatFuture(ENDChatID);
}

  window.setInterval(function(){ 
      call_function();
}, 6000);


$( document ).ready(function() {
    GetchatFuture(0);

});

</script>


