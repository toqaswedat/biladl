        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">

            <!-- Simple post content example. -->

            <div class="panel panel-default">

                <div class="panel-body">

                    <div class="pull-left">

                        <a href="#">

                            <img class="media-object img-circle" src="<?=base_url().$main_details->profile_pic;?>" width="50px" height="50px" style="margin-right:8px; margin-top:-5px;">

                        </a>

                    </div>

                    <h4><a href="#" style="text-decoration:none;"><strong>المحامي الشخصي</strong></a></h4>

                    <div class="post-content">

                        <div class="col-sm-12">

						<div class="all-courses">

							<h3>تفاصيل الشخصية</h3>

							<div class="profile__courses__inner">

                            <table class="profile-table">

                                    <tr><td><i class="fa fa-graduation-cap"></i>اسم:</td><td><?=$main_details->name;?></td></tr>

                                    <tr><td><i class="fa fa-star"></i>هاتف:</td><td><?=$main_details->mobile;?></td></tr>

                                    <tr><td><i class="fa fa-envelope"></i>البريد الإلكتروني:</td><td><?=$main_details->email;?></td></tr>

                                    <tr><td><i class="fa fa-map-marker"></i>الهوية:</td><td><?=$main_details->id;?></td></tr>

                                    <!--<tr><td><i class="fa fa-bookmark"></i>Projects:</td>  <td>Map Creation</td></tr>-->

                              </table>

                            </div>

                            <hr />

                            <h3>تفاصيل عنوان</h3>

							<div class="profile__courses__inner">

                            <table class="profile-table">

                                    <tr>

                                        <td><i class="fa fa-map-marker"></i>بلد:</td>

                                        <td><?=$extra_details->country;?></td>

                                    </tr>

                                    <tr>

                                        <td><i class="fa fa-map-marker"></i>كود البلد:</td>

                                        <td><?=$extra_details->county_code;?></td>

                                    </tr>

                                    <tr>

                                        <td><i class="fa fa-map-marker"></i>جنسية:</td>

                                        <td><?=$extra_details->nationality;?></td>

                                    </tr>

                                    <tr>

                                        <td><i class="fa fa-map-marker"></i>منطقة:</td>

                                        <td><?=$extra_details->gender;?></td>

                                    </tr>

                                    <tr>

                                        <td><i class="fa fa-birthday-cake"></i>تاريخ الميلاد:</td>

                                        <td><?php echo date("d-M-Y",strtotime($extra_details->dob));?></td>

                                    </tr>

                                    <tr>

                                        <td><i class="fa fa-user"></i>جنس:</td>

                                        <td><?=$extra_details->gender;?></td>

                                    </tr>

                                    <tr>

                                        <td><i class="fa fa-id-card"></i>بلا هوية:</td>

                                        <td><?=$extra_details->identity_no;?></td>

                                    </tr>                                                   

                              </table>

                            </div>

                            <hr />

                            <h3>تفاصيل أخرى</h3>

                            <div class="profile__courses__inner">

                            <table class="profile-table">

                                    <tr>

                                        <td><i class="fa fa-map-marker"></i>تخصص:</td>

                                        <td><?=$extra_details->specialization;?></td>

                                    </tr>

                                    <tr>

                                        <td><i class="fa fa-map-marker"></i>لغة:</td>

                                        <td><?=$extra_details->county_code;?></td>

                                    </tr>

                                    <tr>

                                        <td><i class="fa fa-map-marker"></i>لا بناء:</td>

                                        <td><?=$extra_details->building_no;?></td>

                                    </tr>

                                    <tr>

                                        <td><i class="fa fa-map-marker"></i>اسم الحي:</td>

                                        <td><?=$extra_details->district_name;?></td>

                                    </tr>

                                    <tr>

                                        <td><i class="fa fa-map-marker"></i>اسم الشارع:</td>

                                        <td><?php echo $extra_details->street_name;?></td>

                                    </tr>

                                    <tr>

                                        <td><i class="fa fa-user"></i>الرمز البريدي:</td>

                                        <td><?=$extra_details->gender;?></td>

                                    </tr>

                                    <tr>

                                        <td><i class="fa fa-id-card"></i>بالتناوب، لا:</td>

                                        <td><?=$extra_details->alternet_no;?></td>

                                    </tr>                                                   

                              </table>

                            </div>

                            <!-- <a href="#" class="btn btn-common pull-right">Edit</a> -->

						</div>

					</div>

                    </div>

                </div>

            </div>

        </div>



    </div>

    </div>

</div>

</div>



