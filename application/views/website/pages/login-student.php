
      <!-- Page Header Start -->
      <div class="page-header" style="background: url(<?=base_url();?>assets/website/img/banner1.jpg);">
        <div class="container">
          <div class="row">         
            <div class="col-md-12">
              <div class="breadcrumb-wrapper">
                <h2 class="product-title">My Account</h2>
                <ol class="breadcrumb">
                  <li><a href="#"><i class="ti-home"></i> Home</a></li>
                  <li class="current">My Account</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Page Header End -->   

      <section class="section text-center category section">
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
     <h2 class="section-title">Login As</h2>

      <ul class="logins">
        <li>
             <a href="#" class="info" data-toggle="modal" data-target="#member-info"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
          <a  href="<?=base_url('Login/Login_as_register_member');?>">
            <img src="<?=base_url();?>assets/website/img/icons/user.png" /> Member
          </a>
        </li>
        <li>
             <a href="#" class="info" data-toggle="modal" data-target="#lawyer-info"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
          <a href="<?=base_url('Login/Login_as_register_lawyer');?>">
            <img src="<?=base_url();?>assets/website/img/icons/lawyer.png" /> Lawyer
          </a>
        </li>
        <li>
            <a href="#" class="info" data-toggle="modal" data-target="#student-info"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
          <a class="active" href="<?=base_url('Login/Login_as_register_trainee');?>">
            <img src="<?=base_url();?>assets/website/img/icons/student.png" /> Trainee
          </a>
        </li>
      </ul>
<hr>
    <div class="col-md-5 center-div cd-user-modal">
      <div class="my-account-form">
        <ul class="nav nav-tabs cd-switcher">
          <li class="active"><a data-toggle="tab" href="#home">Login</a></li>
          <li><a id="register" data-toggle="tab" href="#menu1">Register</a></li>
        </ul>


<!--<ul class="cd-switcher">
<li><a class="selected" href="#0">LOGIN</a></li>
<li><a href="#0">REGITER</a></li>
</ul>-->
    <div class="tab-content">
      <div id="home" class="tab-pane fade in active">
        <div class="page-login-form">
            <form role="form" class="login-form" method="POST" action="<?=base_url();?>Login/trainee_normal_login/">
              <div class="form-group">
                <div class="input-icon">
                  <i class="ti-email"></i>
                  <input type="text" id="sender-email" class="form-control" name="Lemail" placeholder="Email" value="<?php echo set_value('Lemail'); ?>">
                  <?php echo form_error('Lemail'); ?>
                </div>
              </div>
              <div class="form-group">
                <div class="input-icon">
                  <i class="ti-lock"></i>
                  <input type="password" class="form-control" name="LPassword" placeholder="Password" value="<?php echo set_value('LPassword'); ?>">
                  <?php echo form_error('LPassword'); ?>
                </div>
              </div>
              <button class="btn btn-common log-btn">Login</button>
              
              <div class="checkbox-item">
                <div class="checkbox">
                  <label for="rememberme" class="rememberme">
                  <input name="rememberme" id="rememberme" value="forever" type="checkbox"> Remember Me</label>
                </div>
                  <p class="cd-form-bottom-message"><a href="<?=base_url()?>Login/forget_password">Lost your password?</a></p>
              </div>
            </form>
        </div>
      </div>

    <div id="menu1" class="tab-pane fade">
      <div class="page-login-form register">
        <?php  $attributes = array('class' => 'login-form', 'form'=>'form');
              echo form_open_multipart('Login/trainee_registration');?>
            <div class="form-group">           
              <div class="input-icon">
                  <i class="ti-user"></i>
                  <input type="text" id="Text1" class="form-control" name="Name" placeholder="Name" 
                        value="<?=set_value('Name');?>">
              </div>
              <?php echo form_error('Name'); ?>              
            </div>

           <div class="form-group">
              <div class="input-icon">
                    <i class="ti-id-badge"></i>
                    <input type="text" id="Text3" class="form-control" name="ID_no" placeholder="identity Number" value="<?=set_value('ID_no');?>">
              </div>
            <?php echo form_error('ID_no'); ?>
          </div>        

        <div class="form-group">
          <div class="row">
            <div class="col-lg-12">
                <div class="input-icon">                  
                 <select class="form-control"  name="country" id="country" required>
                    <option value="" selected>---Select Country---</option>
                    <?php foreach($countries as $cont_key => $cont_val) : ?>
                      <option data-coutcode="<?=$cont_val->country_code;?>" data-rowid="<?=$cont_val->id;?>" data-iso="<?=$cont_val->mob_code;?>"  value="<?=$cont_val->country_name;?>"><?=$cont_val->country_name;?></option>
                    <?php endforeach?>
                  </select>
                </div>
                <?php echo form_error('country'); ?>
              </div>
     <!--        <div class="col-lg-6">
              <div class="input-icon">
                <i class="ti-mobile"></i>
                <input class="form-control" placeholder="enter your no" onkeypress="return isNumberKey(event)"   type="text" name="phone" value="<?=set_value('phone');?>">
                  <input type="hidden" name="mob_code" value='' id="mob_code">
              </div>
              <?php echo form_error('phone'); ?>
            </div> -->
          </div>
        </div>

        <div class="form-group">
          <div class="row">            
              <div class="col-lg-12">
                <div class="input-icon">                        
                 <select class="form-control"  name="region" id="region" required>
                    <option value="" selected>---Select city---</option>
                  </select>
                </div>
                <?php echo form_error('region'); ?>
            </div>
          </div>
        </div>
         <div class="form-group">

                          <div class="row">
                            <div class="col-md-3 col-xs-3">
                          <input type="text" name="mob_code" class="form-control" id="mob_code" readonly>
                        </div>
                        <div class="col-md-9 col-xs-9">
                           <div class="input-icon">
                          <i class="ti-mobile"></i>
                          <input class="form-control" placeholder="Enter your Mobile no" onkeypress="return isNumberKey(event)"   type="text" name="phone" value="<?=set_value('phone');?>">
                        </div> 
                        </div>
                      </div>
                        <?php echo form_error('phone'); ?>
                   
                  </div>
        <div class="form-group">
          <div class="input-icon">
            <i class="ti-email"></i>
            <input type="text" id="sender-email" class="form-control" name="email" placeholder="Email" value="<?=set_value('email');?>">
          </div>
          <?php echo form_error('email'); ?>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-lg-6">
              <div class="input-icon">
                <i class="ti-lock"></i>
                <input type="password" class="form-control matches" placeholder="Password" name="password" id="password"  value="<?=set_value('password');?>">
              </div>
               <?php echo form_error('password'); ?>
            </div>
            <div class="col-lg-6">
              <div class="input-icon">
                <i class="ti-lock"></i>
                <input type="password" class="form-control matches" placeholder="Confirm Password" 
                name="Cpassword" id="password-check" value="<?=set_value('Cpassword');?>">
              </div>
              <?php echo form_error('Cpassword'); ?>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
             <div class="col-lg-12">
                <div class="input-icon">                        
                 <select class="form-control"  name="Nationlity" id="Nationlity" required>
                    <option value="" selected>---Select Nationlity---</option>
                    <?php foreach($nationality as $cont_key => $cont_val) : ?>
                      <option value="<?=$cont_val->title;?>"><?=$cont_val->title;?></option>
                    <?php endforeach?>
                  </select>
                </div>
                <?php echo form_error('Nationlity'); ?>
            </div>
            <!-- 
            <div class="col-lg-6">
                <div class="input-icon">
                    <input type="text" class="form-control" id="coutCode" placeholder="Country" name="country_code"
                    value="<?=set_value('country_code');?>" readonly>
                </div>
                <?php echo form_error('country_code'); ?>
            </div> -->
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-lg-6">
              <div class="input-icon">
                <input type="date" class="form-control" placeholder="Date of birth" name="Dob" 
                value="<?=set_value('Dob');?>">
              </div>
              <?php echo form_error('Dob'); ?>
            </div>
           <!--  <div class="col-lg-6">
              <div class="input-icon">
                <input type="text" class="form-control"  placeholder="Gender" name="gender"
               value="<?=set_value('gender');?>">
              </div>
              <?php echo form_error('gender'); ?>
            </div> -->

                <div class="col-lg-6">
                        <div class="input-icon">
                          <!-- <input type="text" class="form-control"  placeholder="Gender" name="gender"
                         value="<?=set_value('gender');?>"> -->
                         <select class="form-control" name="gender">
                          <option >---Select Gender---</option>
                           <option value="male">Male</option>
                           <option value="female">Female</option>
                         </select>
                        </div>
                        <?php echo form_error('gender'); ?>
                </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">            
           
            <div class="col-lg-12">
              <div class="input-icon">
                <i class="ti-world" aria-hidden="true"></i>
                <input type="text" class="form-control" name="current_institute" placeholder="Current Institute Name" value="<?=set_value('current_institute');?>" >
              </div>
               <?php echo form_error('current_institute'); ?>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-lg-6">
              <div class="input-icon">
                <i class="fa fa-building-o" aria-hidden="true"></i>
                <input type="text" class="form-control" name="course_name" placeholder="Course name" 
                 value="<?=set_value('course_name');?>" >
              </div>
               <?php echo form_error('course_name'); ?>
            </div>
            <div class="col-lg-6">
              <div class="input-icon">
                <i class="fa fa-road" aria-hidden="true"></i>
                <input type="text" class="form-control" name="spacialization" placeholder="Specialization" value="<?=set_value('spacialization');?>" >
              </div>
               <?php echo form_error('spacialization'); ?>
            </div>
          </div>
        </div>
         <div class="form-group">
            <div class="input-icon">
              <i class="ti-id-badge"></i>    
              
                <input type="file" required="" class="form-control" multiple=""  name="documents[]" />
            </div>               
         </div>    
         <div class="form-group text-left">
                    <div class="input-icon">
                     <input type="checkbox" required /> By Submitting this form, you agree to the <a  class="hyperlink" href="<?=base_url('Pages/terms');?>">Terms & Condtions</a> and <a class="hyperlink" href="<?=base_url('Pages/privacy_policy');?>"> Privacy Policy </a> of Biladl
                      </div>               
                   </div>    
        <button class="btn btn-common log-btn">Register</button>

        <?php echo form_close(); ?>
      </div>
    </div>
      <div class="page-login-form" id="cd-reset-password"> 
        <p class="cd-form-message">Lost your password? Please enter your email address. You will receive a link to create a new password.</p>
        <form class="cd-form">
          <div class="form-group">
            <div class="input-icon">
              <i class="ti-email"></i>
            <input type="text" id="sender-email" class="form-control" name="email" placeholder="Email">
            </div>
          </div>
          <p class="fieldset">
          <button class="btn btn-common log-btn" type="submit">Reset password</button>
          </p>
        </form>
          <p class="cd-form-bottom-message"><a href="#0">Back to log-in</a></p>
      </div> 
    </div>
</div>
</div>
        
  </div>
</div>
    </section> 
    <script type="text/javascript">
      function isNumberKey(evt)
      {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode != 46 && charCode > 31 
        && (charCode < 48 || charCode > 57))
        return false;
        return true;
      } 
    </script> 
     <?php if(isset($error_model) && $error_model=='Registration_user') : ?>  
      <script type="text/javascript"> 
       
    window.addEventListener('load', function () {
         $(document).ready(function() {
          $('#register').trigger('click');

        });

    })


      </script>
       <?php endif;?>

  <script type="text/javascript">



    window.addEventListener('load', function () {         
                jQuery(function(){
                    $(".matches").keyup(function(){
                    $(".error").hide();
                    var hasError = false;
                    var passwordVal = $("#password").val();
                    var checkVal = $("#password-check").val();
                    if (passwordVal == '') {
                       // $("#password").after('<span class="error">Please enter a password.</span>');
                        hasError = true;
                    } else if (checkVal == '') {
                        //$("#password-check").after('<span class="error">Please re-enter your password.</span>');
                        hasError = true;
                    } else if (passwordVal != checkVal ) {
                        $("#password-check").after('<span class="error">Passwords do not match.</span>');
                        hasError = true;
                    }
                    if(!hasError) {return false;}
                });
            });

    })



</script>

<script type="text/javascript">


$('#country').on('change', function() {
    // $(this).find(':selected').data('iso');
    // $(this).find(':selected').data('coutCode');
    $("#coutCode").val($(this).find(':selected').data('coutcode'));
    $("#mob_code").val($(this).find(':selected').data('iso'));  
    getCity();

    
});



function getCity(){
        var rowID=$('#country').find(':selected').data('rowid');
        var Data_in_json={countryID: rowID};
        var urls='<?=base_url('Login/get_city_list');?>';
         $.post(urls,Data_in_json).done(function(response){
             getdata=JSON.parse(response);
             if(getdata['status']==true)
             {
                htmdata =' <option value="" selected>---Select city---</option>';
                console.log(getdata['Citys']);
                $.each( getdata['Citys'], function( key, city_data ) {

                   htmdata +='<option value="'+city_data.name+'">'+city_data.name+'</option>';

                });
                 $("#region").html(htmdata);
            }
             else{
                //alert("select country");
             }
      
        });
    }





</script>