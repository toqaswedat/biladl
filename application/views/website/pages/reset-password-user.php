

      <!-- Page Header Start -->
      <div class="page-header" style="background: url('https://mars.lehman.edu:8282/images/banner.jpg');">
        <div class="container">
          <div class="row">         
            <div class="col-md-12">
              <div class="breadcrumb-wrapper">
                <h2 class="product-title">Password reset page</h2>
                <ol class="breadcrumb">
                  <li><a href="#"><i class="ti-home"></i> Home</a></li>
                  <li class="current">Reset my password</li>
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

        <div class="container">
          <div class="row">         
            <div class="col-md-6" style="margin-left: 25%;padding-bottom: 15%;padding-top: 15%;">
               <form role="form" class="login-form" method="POST" action="<?=base_url()?>/Login/reset_password">
                  <div class="form-group">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="input-icon">
                        <input type="hidden" name="params" value="<?=$params;?>">                    
                          <input type="password" id="Text1" class="form-control" name="password" placeholder="Password" value="<?php echo set_value('password'); ?>">
                          <?php echo form_error('password'); ?>
                        </div>                       
                      </div>
                      <div class="col-lg-6">
                        <div class="input-icon">                    
                          <input type="password" id="Text1" class="form-control" name="Cpassword" placeholder="Confirm password" value="<?php echo set_value('Cpassword'); ?>">
                          <?php echo form_error('Cpassword'); ?>
                        </div>                       
                      </div>
                    </div>
                  </div>       
                   <button class="btn btn-common log-btn">Send me This link or sms</button>
              </form>
            </div>
          </div>
        </div>
    </section>  

     