<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>        
  <!-- META SECTION -->
  <title><?=$title;?></title>            
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="icon" type="image/png" href="<?=base_url('assets/website/img/logo.png');?>">



   <!--  <script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap"
  type="text/javascript"></script> -->
  <!-- END META SECTION -->

  <!-- CSS INCLUDE -->        
  <link rel="stylesheet" type="text/css" id="theme" href="<?=base_url();?>assets/css/theme-default.css"/>
  <script src="<?=base_url();?>assets/js/jquery-3.0.0.min.js"></script>
  <script src="<?=base_url();?>assets/js/jquery.validate.min.js"></script>



  <!-- EOF CSS INCLUDE --> 
  <style type="text/css">
    .alert-error, .error {
      color: #ff0000;
    }
    .alert-success {
      color: #3c763d;
      background-color: #dff0d8;
      border-color: #d6e9c6;
    }
  </style>                     
</head>
<body>
  <!-- START PAGE CONTAINER -->
  <div class="page-container">
    <div class="page-sidebar">
      <ul class="x-navigation">
        <li class="xn-logo hidden-md hidden-sm hidden-lg">
            <a href="index.html">ATLANT</a>
            <a href="#" class="x-navigation-control"></a>
        </li>
        <li class="xn-profile">
          <a href="#" class="profile-mini">
            <img src="<?=base_url();?>assets/images/Icon.png" height="130" width="320" alt="Logo"/></a> 
            <div class="profile">
              <div class="profile-image"><img src="<?=base_url('assets/website/img/logo.png');?>" height="130" width="320" alt="Logo"/>
              </div>
            </div>
          </li>
          <?php $uri = $this->uri->segment(3);?>
              <li class="xn-title">Navigation</li>

              <li <?php if($uri == "index"): echo "class='active'"; endif; ?>><?php echo anchor('admin/home/index', '<span class="fa fa-cog"></span> <span class="xn-text"> Dashboard</span>'); ?></li>

              <!-- <li <?php //if($uri == "WebEnquiry"): echo "class='active'"; endif; ?>><?php //echo anchor('admin/register/WebEnquiry', '<span class="fa fa-tasks"></span> <span class="xn-text"> Enquiry Form website</span>'); ?></li>

              <li <?php //if($uri == "Leads"): echo "class='active'"; endif; ?>><?php //echo anchor('admin/register/Leads', '<span class="fa fa-tasks"></span> <span class="xn-text"> Leads</span>'); ?></li>
              <li <?php //if($uri == "Homebanners"): echo "class='active'"; endif; ?>><?php //echo anchor('admin/register/Homebanners', '<span class="fa fa-image"></span> <span class="xn-text">Home page Banners</span>'); ?></li> -->

             

               <li <?php if($uri == "all_topic_page"): echo "class='active'"; endif; ?>><?php echo anchor('admin/register/all_topic_page', '<span class="fa fa-list-ol"></span> <span class="xn-text">All Topic</span>'); ?></li>

              <li <?php if($uri == "all_package"): echo "class='active'"; endif; ?>><?php echo anchor('admin/register/all_package', '<span class="fa fa-gift"></span> <span class="xn-text">All Packages</span>'); ?></li>

              <li <?php if($uri == "all_faqs"): echo "class='active'"; endif; ?>><?php echo anchor('admin/register/all_faqs', '<span class="fa fa-question"></span> <span class="xn-text">All FAQs</span>'); ?></li>

              <li <?php if($uri == "need_advice"): echo "class='active'"; endif; ?>><?php echo anchor('admin/register/need_advice', '<span class="fa fa-hand-stop-o"></span> <span class="xn-text">All Advice</span>'); ?></li>
              <li <?php if($uri == "list_article"): echo "class='active'"; endif; ?>><?php echo anchor('admin/register/list_article', '<span class="fa fa-newspaper-o"></span> <span class="xn-text">All Article</span>'); ?></li>

              <li <?php if($uri == "list_news"): echo "class='active'"; endif; ?>><?php echo anchor('admin/register/list_news', '<span class="fa fa-newspaper-o"></span> <span class="xn-text">All News</span>'); ?></li>

              <li <?php if($uri == "UsefulLinks"): echo "class='active'"; endif; ?>><?php echo anchor('admin/register/UsefulLinks', '<span class="fa fa-link"></span> <span class="xn-text">All Useful Links</span>'); ?></li>

              <li <?php if($uri == "Documents"): echo "class='active'"; endif; ?>><?php echo anchor('admin/register/Documents', '<span class="fa fa-file-o"></span> <span class="xn-text">Legal documents</span>'); ?></li>
              <li <?php if($uri == "AdminLawyer"): echo "class='active'"; endif; ?>><?php echo anchor('admin/register/AdminLawyer', '<span class="fa fa-gavel"></span> <span class="xn-text">List of Own lawyer</span>'); ?></li>
              <li <?php if($uri == "view_lawyer"): echo "class='active'"; endif; ?>><?php echo anchor('admin/register/view_lawyer', '<span class="fa fa-gavel"></span> <span class="xn-text"> lawyer</span>'); ?></li>
              <li <?php if($uri == "view_lawyer_student"): echo "class='active'"; endif; ?>><?php echo anchor('admin/register/view_lawyer_student', '<span class="fa fa-user"></span> <span class="xn-text"> Trainee</span>'); ?></li>              
              <li <?php if($uri == "Users"): echo "class='active'"; endif; ?>><?php echo anchor('admin/register/Users', '<span class="fa fa-users"></span> <span class="xn-text"> Members</span>'); ?></li>
              <li <?php if($uri == "Notificatons"): echo "class='active'"; endif; ?>><?php echo anchor('admin/register/Notificatons', '<span class="fa fa-bell"></span> <span class="xn-text">Notification</span>'); ?></li>
               <li <?php if($uri == "country_page"): echo "class='active'"; endif; ?>><?php echo anchor('admin/register/country_page', '<span class="fa fa-map-marker"></span> <span class="xn-text">Add country</span>'); ?></li>
               <li <?php if($uri == "citys_page"): echo "class='active'"; endif; ?>><?php echo anchor('admin/register/citys_page', '<span class="fa fa-building"></span> <span class="xn-text">Add City</span>'); ?></li>

              
                                             
        </ul>
      </li>
    </ul>
    <!-- END X-NAVIGATION -->
  </div>
  <!-- END PAGE SIDEBAR -->

  <!-- PAGE CONTENT -->
  <div class="page-content">

    <!-- START X-NAVIGATION VERTICAL -->
    <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
      <!-- TOGGLE NAVIGATION -->
      <li class="xn-icon-button">
        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
      </li>
      <!-- END TOGGLE NAVIGATION -->

      <!-- POWER OFF -->
      <li class="xn-icon-button pull-right last">
        <a href="#"><span class="fa fa-power-off"></span></a>
        <ul class="xn-drop-left animated zoomIn">
        <li><a href="<?=base_url();?>admin/register/ChangePassword"><span class="fa fa-key"></span> Change Password</a></li>
          <li><a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span> Sign Out</a></li>
        </ul>                        
      </li> 
      <!-- END POWER OFF -->  
      <!-- MESSAGES -->
                    <li class="xn-icon-button pull-right">
                        <a href="#"><span class="fa fa-comments"></span></a>
                        <div class="informer informer-danger" id="counterHEAD2"></div>
                        <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                            <div class="panel-heading">
                                <h3 class="panel-title"><span class="fa fa-comments"></span> Messages</h3>                                
                                <div class="pull-right">
                                    <span class="label label-danger" id='counterHEAD'></span>
                                </div>
                            </div>
                            <div class="panel-body list-group list-group-contacts scroll" id="headerNotify">
                            </div>     
                            <div class="panel-footer text-center">
                                <!--<a href="pages-messages.html">Show all messages</a>-->
                            </div>                            
                        </div>                        
                    </li>
                    <!-- END MESSAGES -->                  

    </ul>
    <!-- END X-NAVIGATION VERTICAL --> 