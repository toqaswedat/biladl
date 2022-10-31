<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="Biladl">
    <meta name="description" content="BILADL consists of a Saudi-based group of eminent experienced lawyers whose job is to provide lawyers and legal advice to all the citizens and residents of the Kingdom of Saudi Arabia at nominal rates for membership.">
    
    <title>Biladl - Legal App Website</title>    

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?=base_url();?>assets/website/img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?=base_url();?>assets/website/css/bootstrap.min.css" type="text/css">    
    <link rel="stylesheet" href="<?=base_url();?>assets/website/css/jasny-bootstrap.min.css" type="text/css">  
    <link rel="stylesheet" href="<?=base_url();?>assets/website/css/bootstrap-select.min.css" type="text/css"> 
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="<?=base_url();?>assets/website/fonts/font-awesome.min.css" type="text/css"> 
    <link rel="stylesheet" href="<?=base_url();?>assets/website/fonts/themify-icons.css"> 

    <!-- Animate CSS -->
    <link rel="stylesheet" href="<?=base_url();?>assets/website/extras/animate.css" type="text/css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="<?=base_url();?>assets/website/extras/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="<?=base_url();?>assets/website/extras/owl.theme.css" type="text/css">
    <!-- Rev Slider CSS -->
    <link rel="stylesheet" href="<?=base_url();?>assets/website/extras/settings.css" type="text/css"> 
    <!-- Slicknav js -->
    <link rel="stylesheet" href="<?=base_url();?>assets/website/css/slicknav.css" type="text/css">
    <!-- Main Styles -->
    <link rel="stylesheet" href="<?=base_url();?>assets/website/css/main.css" type="text/css">
    <!-- Responsive CSS Styles -->
    <link rel="stylesheet" href="<?=base_url();?>assets/website/css/responsive.css" type="text/css">

    <!-- Color CSS Styles  -->
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/website/css/colors/red.css" media="screen" />
    <link href="<?=base_url();?>assets/website/css/user-profile.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="<?=base_url();?>assets/website/js/jquery-min.js"></script> 
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style type="text/css">
        .form-error{
            color: red;
        }
    </style>

  </head>

  <body>  
      <!-- Header Section Start -->
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
                        <a class="navbar-brand logo" href="<?=base_url();?>">
                            <img src="<?=base_url();?>assets/website/img/logo.png" alt="">
                        </a>
                    </div>
                        <!--<a class="search-button pull-right" href="javascript:void(0);">
                            <i class="fa fa-search"></i>
                        </a>-->
                        <div class="search-box pull-right">
                            <div class="container pos-relative">
                                <input type="text" class="form-control" placeholder="Search" />
                                    <a class="close-search" href="javascript:void(0);">
                                        <i class="fa fa-times"></i>
                                    </a>
                            </div>
                        </div>
                        <?php /*?><ul class="pull-right "><li><a href="<?=base_url('arabic')?>" class="language-list"><i class="ti-globle"></i>عربى  </a></li></ul><?php */?>
                        <div class="collapse navbar-collapse" id="navbar">
                        <ul class="nav navbar-nav pull-right">
                             <li><a class="active" href="<?=base_url();?>">Home</a></li>
                            
                            <!-- <li><a href="<?=base_url('Login/Login_as_register_lawyer');?>">Lawyer</a></li> -->
                           
                            <?php if($this->session->has_userdata('user_logged_in')): ?>
                            <li><a href="<?=base_url('Login/call_router/');?>">My Profile</a></li>
                            <li class="right border"><a href="<?=base_url();?>Login/is_logged_out_all/"><i class="ti-lock"></i> Logout</a></li>
                            <?php else: ?>
                             <!-- <li><a href="<?=base_url('Login/Login_as_register_member');?>">Member</a></li>
                             <li><a href="<?=base_url('Login/Login_as_register_trainee');?>">Paralegal Trainee</a></li> -->
                             <li class="right border"><a href="<?=base_url();?>Login/member_normal_login/"><i class="ti-unlock"></i> Log In / Register</a></li>
                            <li class="right border"><a href="<?=base_url();?>Pages/member_plans"> Services</a></li>
                            <?php endif; ?>
                            <li class="right border"><a href="<?=base_url();?>Pages/biladl/"> Biladl</a></li>
                            <li><a href="<?=base_url('Pages/about_us');?>">About Us</a></li>
                             <li><a href="<?=base_url('pages/contacts');?>">Contact Us</a></li>

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
                             <li><a href="<?=base_url('pages/contacts');?>">Contact Us</a></li>
                          
                    </ul>
            </nav>
        </div>
          <div class="clearfix"></div>
    </section>
    </div>

      <!-- Header Section End -->  
      <style type="text/css">
         

      .error {
          color :red;
          -webkit-animation: seconds 1.0s forwards;
          -webkit-animation-iteration-count: 1;
          -webkit-animation-delay: 2s;
          animation: seconds 1.0s forwards;
          animation-iteration-count: 1;
          animation-delay: 2s;
          position: relative;
        }

        @-webkit-keyframes seconds {
          0% {
            opacity: 1;
          }
          100% {
            opacity: 0;
            left: -9999px; 
            position: absolute;   
          }
        }
        @keyframes seconds {
          0% {
            opacity: 1;
          }
          100% {
            opacity: 0;
            left: -9999px;
            position: absolute;     
          }
        }


      .form-error {
            color :red;
          -webkit-animation: seconds 1.0s forwards;
          -webkit-animation-iteration-count: 1;
          -webkit-animation-delay: 20s;
          animation: seconds 1.0s forwards;
          animation-iteration-count: 1;
          animation-delay: 20s;
          position: relative;
        }

       .alert {
           color :black;
          -webkit-animation: seconds 1.0s forwards;
          -webkit-animation-iteration-count: 1;
          -webkit-animation-delay: 10s;
          animation: seconds 1.0s forwards;
          animation-iteration-count: 1;
          animation-delay: 5s;
          position: relative;
      }


        .pagination li{
          cursor: pointer;
        }
      </style>
   