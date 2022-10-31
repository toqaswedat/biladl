<div id="content">

<div class="container">
<h2 class="section-title">ملفي
    
<h2>


<div class="dotted-border">

<div class="dotted-line"></div>

<div class="dotted-line"></div>

<div class="dotted-line"></div>

</div>

<div class="user-panel">

<div class="row">

        

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

            <div class="list-group SIDEBAR">

                <a class="list-group-item" href="<?=base_url('arabic/Login/call_router/');?>"><i class="fa fa-user-circle-o" aria-hidden="true"></i> الملف الشخصي الخاص بي</a>

                <a class="list-group-item" href="<?=base_url('arabic/Login/user_article_bookmarks/');?>">

                    <i class="fa fa-bookmark" aria-hidden="true"></i>المادة المفضلة</a>

                <a class="list-group-item" href="<?=base_url('arabic/Login/user_news_bookmarks/');?>">

                    <i class="fa fa-bookmark" aria-hidden="true"></i> أخبار المرجعية</a>

                <a class="list-group-item" href="<?=base_url('arabic/Login/user_subscription/');?>"><i class="fa fa-bell"></i> اشتراكات </a>

               <!--  <a class="list-group-item" href="#"><i class="fa fa-share-alt" aria-hidden="true"></i> Share</a>

                <a class="list-group-item" href="user-rate.html"><i class="fa fa-star" aria-hidden="true"></i>  Rate Us</a> -->

                <a class="list-group-item" href="<?=base_url('arabic/Login/user_contact_us/');?>"><i class="fa fa-phone" aria-hidden="true"></i>  اتصل بنا</a>

                <a class="list-group-item" href="<?=base_url('arabic/Login/user_about_us/');?>"><i class="fa fa-user" aria-hidden="true"></i> من نحن</a>

                <a class="list-group-item" href="<?=base_url('arabic/Login/is_logged_out_all/');?>"><i class="fa fa-sign-out" aria-hidden="true"></i>الخروج</a>

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





$('#language').on('change', function() {



  if(this.value=="arb")

  {

    window.location.href = '<?=base_url('/arabic/');?>';

  }

  else if(this.value=="eng")

  {

    window.location.href = '<?=base_url();?>';

  }

 

});



</script>