<div id="content">
<div class="container">
<h2 class="section-title">My Profile <!-- <select class="pull-right language"><option>----Language----</option><option>English</option><option>Arabic</option></select> --><h2>
<div class="dotted-border">
<div class="dotted-line"></div>
<div class="dotted-line"></div>
<div class="dotted-line"></div>
</div>
<div class="user-panel">
<div class="row">
        
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="list-group SIDEBAR">
                <a class="list-group-item" href="<?=base_url();?>Login/call_router/"><i class="fa fa-user-circle-o" aria-hidden="true"></i>  My Profile <span class="pull-right"><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a>
                <a class="list-group-item" href="<?=base_url('Login/user_article_bookmarks/');?>">
                    <i class="fa fa-bookmark" aria-hidden="true"></i> Article Bookmarks</a>
                <a class="list-group-item" href="<?=base_url('Login/user_news_bookmarks/');?>">
                    <i class="fa fa-bookmark" aria-hidden="true"></i> News Bookmarks</a>
                <a class="list-group-item" href="<?=base_url('Login/user_subscription/');?>"><i class="fa fa-bell"></i> Subscriptions </a>
               <!--  <a class="list-group-item" href="#"><i class="fa fa-share-alt" aria-hidden="true"></i> Share</a>
                <a class="list-group-item" href="user-rate.html"><i class="fa fa-star" aria-hidden="true"></i>  Rate Us</a> -->
                <a class="list-group-item" href="<?=base_url('Login/user_contact_us/');?>"><i class="fa fa-phone" aria-hidden="true"></i>  Contact Us</a>
                <a class="list-group-item" href="<?=base_url('Login/user_about_us/');?>"><i class="fa fa-user" aria-hidden="true"></i> About Us</a>
                <a class="list-group-item" href="<?=base_url('Login/is_logged_out_all/');?>"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
            </div>
            
        </div>



    <script type="text/javascript">
$( document ).ready(function() {
    var nowUrl=$(location).attr('href');
  $( ".SIDEBAR a" ).each(function( index ) {    
    var urlval=$(this).attr('href');
    if(nowUrl==urlval){
      $(this).addClass("active");
    }

  });

});


</script>