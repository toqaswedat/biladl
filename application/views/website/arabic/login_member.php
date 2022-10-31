



      <!-- Page Header Start -->

      <div class="page-header" style="background: url(<?=base_url();?>assets/website/img/banner1.jpg);">

        <div class="container">

          <div class="row">         

            <div class="col-md-12">

              <div class="breadcrumb-wrapper">

                <h2 class="product-title">حسابي</h2>

                <ol class="breadcrumb">

                  <li><a href="#"><i class="ti-home"></i> الصفحة الرئيسية</a></li>

                  <li class="current">حسابي</li>

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

    <h2 class="section-title">سجل دخول</h2>

      <ul class="logins">

        <li>

        <a href="#" class="info" data-toggle="modal" data-target="#member-info"><i class="fa fa-info-circle" aria-hidden="true"></i></a>

        <a class="active" href="<?=base_url('arabic/Login/Login_as_register_member');?>">

            <img src="<?=base_url();?>assets/website/img/icons/user.png" /> عضو

        </a>

        </li>

        <li>

          <a href="#" class="info" data-toggle="modal" data-target="#lawyer-info"><i class="fa fa-info-circle" aria-hidden="true"></i></a>

          <a href="<?=base_url('arabic/Login/Login_as_register_lawyer');?>">

            <img src="<?=base_url();?>assets/website/img/icons/lawyer.png" /> المحامية

          </a>

        </li>

        <li>

          <a href="#" class="info" data-toggle="modal" data-target="#student-info"><i class="fa fa-info-circle" aria-hidden="true"></i></a>

          <a href="<?=base_url('arabic/Login/Login_as_register_trainee');?>">

            <img src="<?=base_url();?>assets/website/img/icons/student.png" /> طالب علم

          </a>

        </li>

      </ul>

<hr>

    <div class="col-md-5 center-div cd-user-modal">

<div class="my-account-form">



<ul class="nav nav-tabs cd-switcher">

  <li class="active"><a data-toggle="tab" href="#home">تسجيل الدخول

</a></li>

  <li><a id="register" data-toggle="tab" href="#menu1">تسجيل</a></li>

</ul>





<!--<ul class="cd-switcher">

<li><a class="selected" href="#0">LOGIN</a></li>

<li><a href="#0">REGITER</a></li>

</ul>-->

  <div class="tab-content">

    <div id="home" class="tab-pane fade in active">

      <div class="page-login-form">



        <form role="form" class="login-form" method="POST" action="<?=base_url('arabic/');?>Login/member_normal_login/">

          <div class="form-group">

            <div class="input-icon">

              <i class="ti-mobile"></i>

              <input type="text" id="sender-email" class="form-control" name="Lemail" placeholder="البريد الإلكتروني" value="<?php echo set_value('Lemail'); ?>">

              <?php echo form_error('Lemail'); ?>

            </div>

          </div>

          <div class="form-group">

            <div class="input-icon">

              <i class="ti-lock"></i>

              <input type="password" class="form-control" name="LPassword" placeholder="كلمه السر" value="<?php echo set_value('LPassword'); ?>">

              <?php echo form_error('LPassword'); ?>

            </div>

          </div>

          <button class="btn btn-common log-btn">تسجيل الدخول</button>

          <div class="checkbox-item">

            <div class="checkbox">

              <label for="rememberme" class="rememberme">

              <input name="rememberme" id="rememberme" value="forever" type="checkbox"> تذكرنى</label>

            </div>

              <p class="cd-form-bottom-message"><a href="<?=base_url()?>Login/forget_password">فقدت كلمة المرور الخاصة بك؟</a></p>

          </div>

        </form>



      </div>

    </div>



          <div id="menu1" class="tab-pane fade">

              <div class="page-login-form register">              

                    <?php 

                        $attributes = array('class' => 'login-form', 'form'=>'form');

                        echo form_open_multipart('arabic/Login/member_registration');

                    ?>

                  <div class="form-group">

                    <div class="row">

                      <div class="col-lg-12">

                        <div class="input-icon">

                          <i class="ti-user"></i>

                          <input type="text" id="Text1" class="form-control" name="Name" placeholder="اسم" 

                          value="<?=set_value('Name');?>">

                        </div>                        

                         <?php echo form_error('Name'); ?>

                      </div>

                    </div>

                  </div>



                  <div class="form-group">

                    <div class="input-icon">

                      <i class="ti-id-badge"></i>

                      <input type="text" id="Text3" class="form-control" name="ID_no" placeholder="رقم الهوية" value="<?=set_value('ID_no');?>">

                    </div>

                    <?php echo form_error('ID_no'); ?>

                  </div>



                  <div class="form-group">

                    <div class="input-icon">

                      <i class="ti-email"></i>

                      <input type="text" id="sender-email" class="form-control" name="email" placeholder="البريد الإلكتروني" value="<?=set_value('email');?>">

                    </div>

                    <?php echo form_error('email'); ?>

                  </div>



                  <div class="form-group">

                    <div class="row">

                      <div class="col-lg-6">

                        <div class="input-icon">

                          <i class="ti-lock"></i>

                          <input type="password" class="form-control matches" placeholder="كلمه السر" name="password" id="password"  value="<?=set_value('password');?>">

                        </div>

                         <?php echo form_error('password'); ?>

                      </div>

                      <div class="col-lg-6">

                        <div class="input-icon">

                          <i class="ti-lock"></i>

                          <input type="password" class="form-control matches" placeholder="اعد كلمة السر" 

                          name="Cpassword" id="password-check" value="<?=set_value('Cpassword');?>">

                        </div>

                        <?php echo form_error('Cpassword'); ?>

                      </div>

                    </div>

                  </div>

                   <div class="form-group">

                    <div class="row">

                      <div class="col-lg-6">

                        <div class="input-icon">

                          <!-- <input type="text" class="form-control" placeholder="الرقم الدولي" name="country_code" value="<?=set_value('country_code');?>"> -->

                          <select class="form-control"  name="country_code" required>

                            <option value="" selected>---حدد الدولة---</option>

    <option value="" disabled selected>إختر</option>
  <option value="أفغانستان">أفغانستان</option>
  <option value="ألبانيا">ألبانيا</option>
  <option value="الجزائر">الجزائر</option>
  <option value="أندورا">أندورا</option>
  <option value="أنغولا">أنغولا</option>
  <option value="أنتيغوا وباربودا">أنتيغوا وباربودا</option>
  <option value="الأرجنتين">الأرجنتين</option>
  <option value="أرمينيا">أرمينيا</option>
  <option value="أستراليا">أستراليا</option>
  <option value="النمسا">النمسا</option>
  <option value="أذربيجان">أذربيجان</option>
  <option value="البهاما">البهاما</option>
  <option value="البحرين">البحرين</option>
  <option value="بنغلاديش">بنغلاديش</option>
  <option value="باربادوس">باربادوس</option>
  <option value="بيلاروسيا">بيلاروسيا</option>
  <option value="بلجيكا">بلجيكا</option>
  <option value="بليز">بليز</option>
  <option value="بنين">بنين</option>
  <option value="بوتان">بوتان</option>
  <option value="بوليفيا">بوليفيا</option>
  <option value="البوسنة والهرسك ">البوسنة والهرسك </option>
  <option value="بوتسوانا">بوتسوانا</option>
  <option value="البرازيل">البرازيل</option>
  <option value="بروناي">بروناي</option>
  <option value="بلغاريا">بلغاريا</option>
  <option value="بوركينا فاسو ">بوركينا فاسو </option>
  <option value="بوروندي">بوروندي</option>
  <option value="كمبوديا">كمبوديا</option>
  <option value="الكاميرون">الكاميرون</option>
  <option value="كندا">كندا</option>
  <option value="الرأس الأخضر">الرأس الأخضر</option>
  <option value="جمهورية أفريقيا الوسطى ">جمهورية أفريقيا الوسطى </option>
  <option value="تشاد">تشاد</option>
  <option value="تشيلي">تشيلي</option>
  <option value="الصين">الصين</option>
  <option value="كولومبيا">كولومبيا</option>
  <option value="جزر القمر">جزر القمر</option>
  <option value="كوستاريكا">كوستاريكا</option>
  <option value="ساحل العاج">ساحل العاج</option>
  <option value="كرواتيا">كرواتيا</option>
  <option value="كوبا">كوبا</option>
  <option value="قبرص">قبرص</option>
  <option value="التشيك">التشيك</option>
  <option value="جمهورية الكونغو الديمقراطية">جمهورية الكونغو الديمقراطية</option>
  <option value="الدنمارك">الدنمارك</option>
  <option value="جيبوتي">جيبوتي</option>
  <option value="دومينيكا">دومينيكا</option>
  <option value="جمهورية الدومينيكان">جمهورية الدومينيكان</option>
  <option value="تيمور الشرقية ">تيمور الشرقية </option>
  <option value="الإكوادور">الإكوادور</option>
  <option value="مصر">مصر</option>
  <option value="السلفادور">السلفادور</option>
  <option value="غينيا الاستوائية">غينيا الاستوائية</option>
  <option value="إريتريا">إريتريا</option>
  <option value="إستونيا">إستونيا</option>
  <option value="إثيوبيا">إثيوبيا</option>
  <option value="فيجي">فيجي</option>
  <option value="فنلندا">فنلندا</option>
  <option value="فرنسا">فرنسا</option>
  <option value="الغابون">الغابون</option>
  <option value="غامبيا">غامبيا</option>
  <option value="جورجيا">جورجيا</option>
  <option value="ألمانيا">ألمانيا</option>
  <option value="غانا">غانا</option>
  <option value="اليونان">اليونان</option>
  <option value="جرينادا">جرينادا</option>
  <option value="غواتيمالا">غواتيمالا</option>
  <option value="غينيا">غينيا</option>
  <option value="غينيا بيساو">غينيا بيساو</option>
  <option value="غويانا">غويانا</option>
  <option value="هايتي">هايتي</option>
  <option value="هندوراس">هندوراس</option>
  <option value="المجر">المجر</option>
  <option value="آيسلندا">آيسلندا</option>
  <option value="الهند">الهند</option>
  <option value="إندونيسيا">إندونيسيا</option>
  <option value="إيران">إيران</option>
  <option value="العراق">العراق</option>
  <option value="جمهورية أيرلندا ">جمهورية أيرلندا </option>
  <option value="فلسطين">فلسطين</option>
  <option value="إيطاليا">إيطاليا</option>
  <option value="جامايكا">جامايكا</option>
  <option value="اليابان">اليابان</option>
  <option value="الأردن">الأردن</option>
  <option value="كازاخستان">كازاخستان</option>
  <option value="كينيا">كينيا</option>
  <option value="كيريباتي">كيريباتي</option>
  <option value="الكويت">الكويت</option>
  <option value="قرغيزستان">قرغيزستان</option>
  <option value="لاوس">لاوس</option>
  <option value="لاوس">لاوس</option>
  <option value="لاتفيا">لاتفيا</option>
  <option value="لبنان">لبنان</option>
  <option value="ليسوتو">ليسوتو</option>
  <option value="ليبيريا">ليبيريا</option>
  <option value="ليبيا">ليبيا</option>
  <option value="ليختنشتاين">ليختنشتاين</option>
  <option value="ليتوانيا">ليتوانيا</option>
  <option value="لوكسمبورغ">لوكسمبورغ</option>
  <option value="مدغشقر">مدغشقر</option>
  <option value="مالاوي">مالاوي</option>
  <option value="ماليزيا">ماليزيا</option>
  <option value="جزر المالديف">جزر المالديف</option>
  <option value="مالي">مالي</option>
  <option value="مالطا">مالطا</option>
  <option value="جزر مارشال">جزر مارشال</option>
  <option value="موريتانيا">موريتانيا</option>
  <option value="موريشيوس">موريشيوس</option>
  <option value="المكسيك">المكسيك</option>
  <option value="مايكرونيزيا">مايكرونيزيا</option>
  <option value="مولدوفا">مولدوفا</option>
  <option value="موناكو">موناكو</option>
  <option value="منغوليا">منغوليا</option>
  <option value="الجبل الأسود">الجبل الأسود</option>
  <option value="المغرب">المغرب</option>
  <option value="موزمبيق">موزمبيق</option>
  <option value="بورما">بورما</option>
  <option value="ناميبيا">ناميبيا</option>
  <option value="ناورو">ناورو</option>
  <option value="نيبال">نيبال</option>
  <option value="هولندا">هولندا</option>
  <option value="نيوزيلندا">نيوزيلندا</option>
  <option value="نيكاراجوا">نيكاراجوا</option>
  <option value="النيجر">النيجر</option>
  <option value="نيجيريا">نيجيريا</option>
  <option value="كوريا الشمالية ">كوريا الشمالية </option>
  <option value="النرويج">النرويج</option>
  <option value="سلطنة عمان">سلطنة عمان</option>
  <option value="باكستان">باكستان</option>
  <option value="بالاو">بالاو</option>
  <option value="بنما">بنما</option>
  <option value="بابوا غينيا الجديدة">بابوا غينيا الجديدة</option>
  <option value="باراغواي">باراغواي</option>
  <option value="بيرو">بيرو</option>
  <option value="الفلبين">الفلبين</option>
  <option value="بولندا">بولندا</option>
  <option value="البرتغال">البرتغال</option>
  <option value="قطر">قطر</option>
  <option value="جمهورية الكونغو">جمهورية الكونغو</option>
  <option value="جمهورية مقدونيا">جمهورية مقدونيا</option>
  <option value="رومانيا">رومانيا</option>
  <option value="روسيا">روسيا</option>
  <option value="رواندا">رواندا</option>
  <option value="سانت كيتس ونيفيس">سانت كيتس ونيفيس</option>
  <option value="سانت لوسيا">سانت لوسيا</option>
  <option value="سانت فنسينت والجرينادينز">سانت فنسينت والجرينادينز</option>
  <option value="ساموا">ساموا</option>
  <option value="سان مارينو">سان مارينو</option>
  <option value="ساو تومي وبرينسيب">ساو تومي وبرينسيب</option>
  <option value="السعودية">السعودية</option>
  <option value="السنغال">السنغال</option>
  <option value="صربيا">صربيا</option>
  <option value="سيشيل">سيشيل</option>
  <option value="سيراليون">سيراليون</option>
  <option value="سنغافورة">سنغافورة</option>
  <option value="سلوفاكيا">سلوفاكيا</option>
  <option value="سلوفينيا">سلوفينيا</option>
  <option value="جزر سليمان">جزر سليمان</option>
  <option value="الصومال">الصومال</option>
  <option value="جنوب أفريقيا">جنوب أفريقيا</option>
  <option value="كوريا الجنوبية">كوريا الجنوبية</option>
  <option value="جنوب السودان">جنوب السودان</option>
  <option value="إسبانيا">إسبانيا</option>
  <option value="سريلانكا">سريلانكا</option>
  <option value="السودان">السودان</option>
  <option value="سورينام">سورينام</option>
  <option value="سوازيلاند">سوازيلاند</option>
  <option value="السويد">السويد</option>
  <option value="سويسرا">سويسرا</option>
  <option value="سوريا">سوريا</option>
  <option value="طاجيكستان">طاجيكستان</option>
  <option value="تنزانيا">تنزانيا</option>
  <option value="تايلاند">تايلاند</option>
  <option value="توغو">توغو</option>
  <option value="تونجا">تونجا</option>
  <option value="ترينيداد وتوباغو">ترينيداد وتوباغو</option>
  <option value="تونس">تونس</option>
  <option value="تركيا">تركيا</option>
  <option value="تركمانستان">تركمانستان</option>
  <option value="توفالو">توفالو</option>
  <option value="أوغندا">أوغندا</option>
  <option value="أوكرانيا">أوكرانيا</option>
  <option value="الإمارات العربية المتحدة">الإمارات العربية المتحدة</option>
  <option value="المملكة المتحدة">المملكة المتحدة</option>
  <option value="الولايات المتحدة">الولايات المتحدة</option>
  <option value="أوروغواي">أوروغواي</option>
  <option value="أوزبكستان">أوزبكستان</option>
  <option value="فانواتو">فانواتو</option>
  <option value="فنزويلا">فنزويلا</option>
  <option value="فيتنام">فيتنام</option>
  <option value="اليمن">اليمن</option>
  <option value="زامبيا">زامبيا</option>
  <option value="زيمبابوي">زيمبابوي</option>

</select>

                        </div>

                        <?php echo form_error('country_code'); ?>

                      </div>

                      <div class="col-lg-6">

                        <div class="input-icon">

                          <input class="form-control" placeholder="رقم الهاتف" 
                          oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="15"    type="number"
                          name="phone" value="<?=set_value('phone');?>">

                        </div>

                        <?php echo form_error('phone'); ?>

                      </div>

                    </div>

                  </div>

                  <div class="form-group">

                    <div class="row">

                      <div class="col-lg-6">

                        <div class="input-icon">

                          <input type="text" class="form-control" placeholder="جنسية" name="Nationlity" 

                          value="<?=set_value('Nationlity');?>">

                        </div>

                        <?php echo form_error('Nationlity'); ?>

                      </div>

                      <div class="col-lg-6">

                        <div class="input-icon">

                          <input type="text" class="form-control"  placeholder="بلد" name="country"

                         value="<?=set_value('country');?>">

                        </div>

                        <?php echo form_error('country'); ?>

                      </div>

                    </div>

                  </div>

                  <div class="form-group">

                    <div class="row">

                      <div class="col-lg-6">

                        <div class="input-icon">

                          <input type="text" class="form-control" placeholder="منطقة" name="region" value="<?=set_value('region');?>">

                        </div>

                        <?php echo form_error('region'); ?>

                      </div>

                      <div class="col-lg-6">

                        <div class="input-icon">

                          <input type="text" class="form-control"  placeholder="جنس" name="gender"

                          value="<?=set_value('gender');?>">

                        </div>

                         <?php echo form_error('gender'); ?>

                      </div>

                    </div>

                  </div>

                  <div class="form-group">

                    <div class="input-icon">

                      <i class="ti-id-badge"></i>               

                        <input type="date" class="form-control date"  name="Dob" value="<?=set_value('Dob');?>" id="Date_access"/>

                    </div>

                    <?php echo form_error('Dob'); ?>

                  </div>

                   <div class="form-group">

                    <div class="input-icon">

                      <i class="ti-id-badge"></i>               

                        <input type="file" class="form-control" multiple=""  name="documents[]" />

                    </div>               

                  </div>

                   <button class="btn btn-common log-btn">Register</button>

                <?php echo form_close(); ?>

              </div>

          </div>

  <div class="page-login-form" id="cd-reset-password"> 

  <p class="cd-form-message">فقدت كلمة المرور الخاصة بك؟ الرجاء إدخال عنوان البريد الإلكتروني الخاص بك. ستتلقى رابطًا لإنشاء كلمة مرور جديدة.</p>

  <form class="cd-form">

  <div class="form-group">

  <div class="input-icon">

  <i class="ti-email"></i>

  <input type="text" id="sender-email" class="form-control" name="email" placeholder="Email">

  </div>

  </div>

  <p class="fieldset">

  <button class="btn btn-common log-btn" type="submit">إعادة تعيين كلمة المرور</button>

  </p>

  </form>

  <p class="cd-form-bottom-message"><a href="#0">العودة إلى تسجيل الدخول</a></p>

  </div> 

  </div>

</div>

</div>

        <!--<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 bhoechie-tab-container">

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">

              <div class="list-group">

                <a href="#" class="list-group-item active text-center">

                  <img src="<?=base_url();?>assets/website/img/icons/user.png" /><br/>Member

                </a>

                <a href="#" class="list-group-item text-center">

                 <img src="<?=base_url();?>assets/website/img/icons/lawyer.png" /><br/>Lawyer

                </a>

                <a href="#" class="list-group-item text-center">

              <img src="<?=base_url();?>assets/website/img/icons/student.png" /><br/>Law Student

                </a>

              </div>

            </div>

            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">

                <div class="bhoechie-tab-content active">

                 



                </div>

            </div>

        </div>-->

  </div>

</div>

    </section>

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

