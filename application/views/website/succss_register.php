

      <!-- Page Header Start -->
      <div class="page-header" style="background: #ffffff;">
        <div class="container">
          <div class="row">         
            <div class="col-md-12">
              <div class="breadcrumb-wrapper">
                <h2 class="product-title" style="color: #e6bf02;">You application has been Received </h2>
                <ol class="breadcrumb">
                  <li class="current">We will review and assess your application and revert to you soonest.</li>
                </ol>
                <a href="<?=base_url();?>Login/member_normal_login/" class="btn btn-common log-btn">Login</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Page Header End -->   
<div style="width: 80%;margin-left: 10%;">
          <?php if($this->session->flashdata('success') != "") : ?>                
      <div class="alert alert-success" role="alert">
      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <?=$this->session->flashdata('success');?>
      </div>
      <?php endif; ?>
 </div>

     
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
