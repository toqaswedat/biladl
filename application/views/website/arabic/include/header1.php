<!DOCTYPE html>

<html lang="ar" dir="">

  <head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">    

    <meta http-equiv="content-type" content="text/html; charset=utf-8">

    <meta name="author" content="Jobboard">

    

    <title><?=$title;?></title>    

      



    <!-- Favicon -->

    <link rel="shortcut icon" href="<?=base_url('assets/website/arabic/');?>img/favicon.png">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="<?=base_url('assets/website/arabic/');?>css/bootstrap.min.css" type="text/css">    

    <link rel="stylesheet" href="<?=base_url('assets/website/arabic/');?>css/jasny-bootstrap.min.css" type="text/css">  

    <!--<link rel="stylesheet" href="<?=base_url('assets/website/arabic/');?>css/bootstrap-select.min.css" type="text/css">  -->

    <link href="<?=base_url('assets/website/arabic/');?>bootstrap-rtl-master/dist/css/bootstrap-rtl.css" rel="stylesheet"

        type="text/css" /> 

    <!-- Material CSS -->

    <link rel="stylesheet" href="<?=base_url('assets/website/arabic/');?>css/material-kit.css" type="text/css">

    <!-- Font Awesome CSS -->

    <link rel="stylesheet" href="<?=base_url('assets/website/arabic/');?>fonts/font-awesome.min.css" type="text/css"> 

    <link rel="stylesheet" href="<?=base_url('assets/website/arabic/');?>fonts/themify-icons.css"> 



    <!-- Animate CSS -->

    <link rel="stylesheet" href="<?=base_url('assets/website/arabic/');?>extras/animate.css" type="text/css">

    <!-- Owl Carousel -->

    <link rel="stylesheet" href="<?=base_url('assets/website/arabic/');?>extras/owl.carousel.css" type="text/css">

    <link rel="stylesheet" href="<?=base_url('assets/website/arabic/');?>extras/owl.theme.css" type="text/css">

    <!-- Rev Slider CSS -->

    <link rel="stylesheet" href="<?=base_url('assets/website/arabic/');?>extras/settings.css" type="text/css">

    <!-- Main Styles -->

    <link rel="stylesheet" href="<?=base_url('assets/website/arabic/');?>css/main.css" type="text/css">

    <!-- Slicknav js -->

    <link rel="stylesheet" href="<?=base_url('assets/website/arabic/');?>css/slicknav.css" type="text/css">

    <!-- Responsive CSS Styles -->

    <link rel="stylesheet" href="<?=base_url('assets/website/arabic/');?>css/responsive.css" type="text/css">



     <link href="<?=base_url();?>assets/website/arabic/css/user-profile.css" rel="stylesheet" type="text/css" />



    <!-- Color CSS Styles  -->

    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/website/arabic/');?>css/colors/red.css" media="screen" />

    <script type="text/javascript" src="<?=base_url();?>assets/website/js/jquery-min.js"></script> 
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style type="text/css">

        .form-error{

            color: red;

        }

    </style>

    

  </head>



  <body>  

<div class="header">

  <section id="intro">  

    <div class="logo-menu">

    <nav class="navbar navbar-default pos-relative affix" role="navigation" data-spy="affix" data-offset-top="50">

    <div class="container">

<div class="row">

<div class="navbar-header">

<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">

<span class="sr-only">Toggle navigation</span>

<span class="icon-bar"></span>

<span class="icon-bar"></span>

<span class="icon-bar"></span>

</button>

<a class="navbar-brand logo" href="<?=base_url('arabic/');?>"><img  src="<?=base_url('assets/website/arabic/');?>img/logo.png" alt=""></a>

</div>

<!-- 

<a class="search-button pull-left

" href="javascript:void(0);"><i class="fa fa-search"></i></a>



<div class="search-box pull-right">

<div class="container pos-relative">

<input type="text" class="form-control" placeholder="Search" />

<a class="close-search" href="javascript:void(0);"><i class="fa fa-times"></i></a>

</div>

</div> -->

 <ul class="pull-left "><li><a href="<?=base_url('');?>" class="language-list"><i class="ti-globle"></i>English</a></li></ul>

<div class="collapse navbar-collapse" id="navbar">



<ul class="nav navbar-nav pull-left">

<!--   <li><a class="active" href="<?=base_url('arabic/');?>">صفحة الرئيسية</a></li>

  <li><a href="about.html">الأعضاء</a></li>

  <li><a href="lawyers.html">محام</a></li>

  <li><a href="#">متدرب</a></li>

  <li><a href="about.html">عن الموقع</a></li>

  <li><a href="#">الاتصال بنا</a></li>

  <li class="right border"><a href="login.html"><i class="ti-lock"></i> تسجيل الدخول</a></li> -->



                        <li><a class="active" href="<?=base_url('arabic/');?>">الصفحة

                        الرئيسية</a></li> <!-- <li>

                          <a href="<?=base_url('arabic/Pages/lawyers');?>">المحامية</a>

                          </li> --> <?php

                        if($this->session->has_userdata('user_logged_in')): ?>

                        <li><a

                        href="<?=base_url('arabic/Login/call_router/');?>">لوحة

                        القيادة</a></li> <li class="right border"><a

                        href="<?=base_url();?>arabic/Login/is_logged_out_all/"><i

                        class="ti-lock"></i> الخروج</a></li> <?php else: ?>

                        <!-- <li><a href="<?=base_url('arabic/Login/Login_as_register_memb

                        er');?>">عضو</a></li> <li><a href="<?=base_url('Log

                        in/Login_as_register_trainee');?>">المتدرب شبه القانوني</a></li> --> <li class="right border"><a

                        href="<?=base_url();?>arabic/Login/member_normal_login/"><i

                        class="ti-unlock"></i> تسجيل الدخول / تسجيل</a></li>

                        <li class="right border"><a href="<?=base_url();?>arabic/Pages/member_plans"> خدمات </a></li>

                        <?php endif; ?>

                        <li><a

                        href="<?=base_url('arabic/Pages/biladl');?>"> بلادل  </a></li>

                         <li><a

                        href="<?=base_url('arabic/Pages/about_us');?>">معلومات عنا</a></li> <li><a href="<?=base_url('arabic/Pages/contact_us');?>">اتصل بنا</a></li>





</ul>

</div>

</div>

</div>







    <ul class="wpb-mobile-menu">

                       <li><a class="active" href="<?=base_url('arabic/');?>">الصفحة

                        الرئيسية</a></li> <!-- <li>

                          <a href="<?=base_url('araabic/Pages/lawyers');?>">المحامية</a>

                          </li> --> <?php

                        if($this->session->has_userdata('user_logged_in')): ?>

                        <li><a

                        href="<?=base_url('arabic/Login/call_router/');?>">لوحة

                        القيادة</a></li> <li class="right border"><a

                        href="<?=base_url();?>arabic/Login/is_logged_out_all/"><i

                        class="ti-lock"></i> الخروج</a></li> <?php else: ?>

                        <!-- <li><a href="<?=base_url('arabic/Login/Login_as_register_memb

                        er');?>">عضو</a></li> <li><a href="<?=base_url('Log

                        in/Login_as_register_trainee');?>">المتدرب شبه القانوني</a></li> --> <li class="right border"><a

                        href="<?=base_url();?>arabic/Login/member_normal_login/"><i

                        class="ti-unlock"></i> تسجيل الدخول / تسجيل</a></li>

                        <?php endif; ?>

                        <li><a

                        href="<?=base_url('arabic/Pages/biladl');?>"> بلادل  </a></li>

                         <li><a

                        href="<?=base_url('arabic/Pages/about_us');?>">معلومات عنا</a></li> <li><a id="Contact" 

                        href="#">اتصل بنا</a></li>

    </ul>

    <!--<ul class="visible-xs mobile-login">

    <li><a href="#"><i class="ti-user"></i></a></li>

    </ul>-->

    </nav>

    </div>

    <div class="clearfix"></div>

  </section>

</div>





      <!-- Header Section End -->  

      <style type="text/css">

          /*.error

          {

            color :red;



          }*/



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

          -webkit-animation-delay: 10s;

          animation: seconds 1.0s forwards;

          animation-iteration-count: 1;

          animation-delay: 5s;

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
 
<script>
  
  $("#Contact").click(function() {
    
         var id = this.id;
     $.ajax({
            url: '<?=base_url('arabic/pages/contact');?>', //This is the current doc
            type: "POST",
            data: ({ }),
            success: function(data){
            getdata=JSON.parse(data);
                     if(getdata['status']==false)
                     {
                      
                       swal("", "يرجى تسجيل الدخول للاتصال بنا!", "");

                       setTimeout(function(){ 
            window.location.replace("<?=base_url('arabic/login/member_normal_login');?>");
                         }, 2000);
                     }
            
           
          else if(getdata['status']==true)
                     {
                       window.location.replace("<?=base_url('arabic/pages/contact_us');?>");
              
                     }
                     else
                     {
                      swal("أوه!",getdata['responce'], "error");
            setTimeout(function(){ 
            window.location.replace("<?=base_url('arabic/login/member_normal_login');?>");
                         }, 2000);
                     }
              
              

            },
            error: function (e) {
                console.log("ERROR : ", e);
              

            }
            });
        }); 
    
    


</script>