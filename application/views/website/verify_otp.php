

      <!-- Page Header Start -->
      <div class="page-header" style="background: url(<?=base_url();?>assets/website/img/banner1.jpg);">
        <div class="container">
          <div class="row">         
            <div class="col-md-12">
              <div class="breadcrumb-wrapper">
                <h2 class="product-title">My Account</h2>
                <ol class="breadcrumb">
                  <li><a href="<?=base_url();?>"><i class="ti-home"></i> Home</a></li>
                  <li class="current">My Account</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Page Header End -->   

      <section class="section text-center category greybg section">
        <div style="width: 80%;margin-left: 10%;">
          <?php if($this->session->flashdata('success') != "") : ?>                
      <div class="alert alert-success" role="alert">
      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <?=$this->session->flashdata('success');?>
      </div>
      <?php endif; ?>
        </div>

      <div class="container greybg">
	<div class="row">      
    <h2 class="section-title">Verify Your otp</h2>
      
<hr>
  <div class="col-md-4 center-div cd-user-modal">
<div class="my-account-form">
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <div class="page-login-form">
        <span id="success"></span>
        <form role="form" class="login-form" method="POST" action="<?=base_url('Login/confirm_otp/');?>">
          <div class="form-group">
            <div class="input-icon">
              <i class="ti-mobile"></i>
              <input type="text" class="form-control" name="mobile" id="mobile" value="<?=$details->mobile;?>" readonly="">
              <?php echo form_error('mobile'); ?>
            </div>
          </div>
          <input type="hidden" id="mob_code" class="form-control" name="mob_code" placeholder="mob_code" value="<?=$details->mob_code;?>">
          <div class="form-group">
            <div class="input-icon">
              <i class="ti-lock"></i>
              <input type="text" name="OTP" class="form-control" placeholder="OTP">
              <?php echo form_error('OTP'); ?>
            </div>
          </div>
                <button class="btn btn-common  btn-sm" >Verify</button>
                <span id="resend"></span>
                
        </form>

      </div>
    </div>

 
  </div>
</div>
</div>     
  </div>
</div>
</section>
<script type="text/javascript">
      var countdownNum = 1;
      incTimer();
      function incTimer(){
      setTimeout (function(){
        if(countdownNum != 0){
        countdownNum--;
        $("#resend").html('resend otp In: ' + countdownNum + ' seconds');
          incTimer();
        } else {
           countdownNum = 1; 
           $("#resend").html('<button type="button" onclick="resend_otp_vender()" class="btn btn-common btn-sm">Resend</button>');
        }
      },1000);
  }
      function resend_otp_vender(){
            var mobileno=$('#mobile').val();
            var con_code=$('#mob_code').val();
           
     var Data_in_json={mobile: mobileno, mob_code:con_code};
                var urls='<?=base_url('Login/resend_otp/');?>';
                 $.post(urls,Data_in_json).done(function(response){                               
                     getdata=JSON.parse(response);
                     if(getdata['status']==true)
                     {
                        $("#success").html("<span style='color:green;'>"+getdata['message']+"</span>");        
                     }
                     else{
                        $("#success").html("<span style='color:red;'>"+getdata['message']+"</span>");
                     }
              
                });
}
</script>
