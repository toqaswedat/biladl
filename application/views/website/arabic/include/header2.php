<!DOCTYPE html>

<html lang="ar" dir="">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?=$title;?></title>    

    <!-- Favicon -->

    <link rel="shortcut icon" href="<?=base_url('assets/website/arabic/');?>img/favicon.png">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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
    <link rel="stylesheet" href="<?=base_url('assets/website/arabic/');?>css/customCSS.css" type="text/css">

    <!-- Slicknav js -->

    <link rel="stylesheet" href="<?=base_url('assets/website/arabic/');?>css/slicknav.css" type="text/css">

    <!-- Responsive CSS Styles -->

    <link rel="stylesheet" href="<?=base_url('assets/website/arabic/');?>css/responsive.css" type="text/css">



     <link href="<?=base_url();?>assets/website/arabic/css/user-profile.css" rel="stylesheet" type="text/css" />

  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- Color CSS Styles  -->
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/website/arabic/');?>css/colors/red.css" media="screen" />
    <script type="text/javascript" src="<?=base_url();?>assets/website/js/jquery-min.js"></script> 
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>
<body>  

<nav class="navbar navbar-expand-lg navbar-light bg-dark text-light pr-5 navhomeheder">
  <a class="navbar-brand logo" href="<?=base_url('arabic/');?>"><img  src="<?=base_url('assets/website/arabic/');?>img/logo.png" alt=""></a>
  <div class="collapse navbar-collapse justify-content-between hederHome" id="navbarSupportedContent">
    <ul class="navbar-nav justify-content-around col-6">
      <li>
        <a class=" text-light" href="<?=base_url('arabic/');?>"> <span class="border border-warning p-2">الصفحة الرئيسية</span></a>
      </li>
      <li>
        <a class="text-light" href="<?=base_url('arabic/');?>">عن بالعدل</a>
      </li>
      <li class="">
        <a class="text-light" href="<?=base_url();?>arabic/Pages/member_plans"> خدماتنا </a>
      </li>
      <li>
        <a class=" text-light" href="<?=base_url('arabic/');?>">أخبارنا</a>
      </li>
      <li>
        <a class=" text-light" href="<?=base_url('arabic/');?>">المقالات</a>
      </li>
      <li>
        <a class=" text-light" href="<?=base_url('arabic/Pages/contact_us');?>">اتصل بنا</a>
      </li>
      <li>
        <a class=" text-light" href="<?=base_url('arabic/Pages/contact_us');?>">تطبيق بالعدل </a>
      </li>
    </ul>



    <ul class="collapse navbar-collapse col-6 d-flex justify-content-end " >
      <li class="right col-1">
        <a class="text-light" href="<?=base_url('#');?>"><i class="fa fa-search icon-style"></i></a>
      </li>
      <li class="col-1">
        <a href="<?=base_url('');?>" class="text-light font-weight-light border border-white p-1">EN</a>
      </li>
      <li class="col-4 d-flex justify-content-center">
        <a class=" text-light " href="<?=base_url();?>arabic/Login/member_normal_login/">تسجيل الدخول</a>
      </li>
      <li class="col-4">
        <button type="button" class="navbar-toggle bg-warning font-weight-bold datepicker w-100 my-sm-n3 newUserHome" data-toggle="collapse" data-target="#navbar">
         حساب جديد
        </button>
      </li>
    </ul>


  </div>
</nav>




<header class="header hederMopile row ">
  <div class="col">
  <input class="menu-btn" type="checkbox" id="menu-btn" />
  <label class="menu-icon" for="menu-btn"><span class="navicon text-light"></span></label>
  <ul class="menu ">
      <li>
        <a class=" text-light" href="<?=base_url('arabic/');?>"> <span class="border border-warning p-2">الصفحة الرئيسية</span></a>
      </li>
      <li>
        <a class="text-light" href="<?=base_url('arabic/');?>">عن بالعدل</a>
      </li>
      <li class="">
        <a class="text-light" href="<?=base_url();?>arabic/Pages/member_plans"> خدماتنا </a>
      </li>
      <li>
        <a class=" text-light" href="<?=base_url('arabic/');?>">أخبارنا</a>
      </li>
      <li>
        <a class=" text-light" href="<?=base_url('arabic/');?>">المقالات</a>
      </li>
      <li>
        <a class=" text-light" href="<?=base_url('arabic/Pages/contact_us');?>">اتصل بنا</a>
      </li>
      <li>
        <a class=" text-light" href="<?=base_url('arabic/Pages/contact_us');?>">تطبيق بالعدل </a>
      </li>
      <li >
        <a class=" text-light " href="<?=base_url();?>arabic/Login/member_normal_login/"> تسجيل الدخول</a>
      </li>
  </ul>
  </div>
  <div class="col d-flex justify-content-between">
    <a class="text-light pt-4" href="<?=base_url('#');?>"><i class="fa fa-search icon-style"></i></a>
    <a href="<?=base_url('');?>" class="text-light font-weight-light pt-4">EN</a>
  </div>
  <div class="col">
    <a class="navbar-brand logo" href="<?=base_url('arabic/');?>"><img  src="<?=base_url('assets/website/arabic/');?>img/logo.png" alt=""></a>
  </div>
</header>




 
