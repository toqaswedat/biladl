      <!-- Page Header Start -->
      <div class="page-header" style="background: url(<?=base_url();?>assets/website/img/banner4.jpg);">
        <div class="container">
          <div class="row">         
            <div class="col-md-12">
              <div class="breadcrumb-wrapper">
                <h2 class="product-title">Membership Plans</h2>
                <ol class="breadcrumb">
                  <li><a href="<?=base_url();?>"><i class="ti-home"></i> Home</a></li>
                  <li class="current">Membership Plans</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Page Header End -->        

      <!-- Main container Start -->  
      <div class="about section">
        <div class="container">
          <div class="row"> 
            <div class="col-md-12">
                <h4>Your BILADL Membership provides you with many benefits to live life to the fullest with Peace of Mind </h4>
                <p>Membership plans include</p>
                <p>Legal Counseling and Assistance for </p>
                <ul class="bil-list">
                    <li>Civil matters</li>
                    <li>Criminal matters </li>
                    <li>Labour related </li>
                    <li>Family matters </li>
                    <li>Counseling on court procedure </li>
                    <li>Debt relief like settlement negotiations etc</li>
                    <li>Financial advice and Consults</li>
                    <li>Negotiations with third parties in any agreement and contracts </li>
                </ul>
                <br />
                <p>Your Membership gives you the Freedom to live Life Peacefully as Our LegalAdvizors advise and guide you in all your daily legal transaction matters .</p>
                <hr>

                
          </div>
        </div>
      </div>

</div>
<?php if(!$this->session->has_userdata('user_logged_in')): ?>
<section id="pricing-table" class="section plans">
<!--<div class="overlay"></div>-->
<div class="container">
<h2 class="section-title">
    Choose Your Membership
</h2>
<div class="row">
   <?php foreach ($all_packages as $key => $packVal) : ?>
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
        <li><b>package type :</b> <?=substr($packVal->description,0,220)?></li> 
       <li class="hide-desc" style="height:250px; ;width: 100%; display: none;"></li> 
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
      <!-- Main container End -->  