        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <!-- Simple post content example. -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="pull-left">
                        <a href="#">
                            <img class="media-object img-circle" src="<?=base_url().$main_details->profile_pic;?>" width="50px" height="50px" style="margin-right:8px; margin-top:-5px;">
                        </a>
                    </div>
                    <h4><a href="#" style="text-decoration:none;"><strong>My Profile</strong></a></h4>
                    <div class="post-content">
                        <div class="col-sm-12">
						<div class="all-courses">
							<h3>Personal Details</h3>
							<div class="profile__courses__inner">
                            <table class="profile-table">
                                    <tr><td><i class="fa fa-graduation-cap"></i>Name:</td><td><?=$main_details->name;?></td></tr>
                                    <tr><td><i class="fa fa-star"></i>Phone:</td><td><?=$main_details->mobile;?></td></tr>
                                    <tr><td><i class="fa fa-envelope"></i>Email:</td><td><?=$main_details->email;?></td></tr>
                                    <tr><td><i class="fa fa-map-marker"></i>ID:</td><td><?=$main_details->id;?></td></tr>
                                    <!--<tr><td><i class="fa fa-bookmark"></i>Projects:</td>  <td>Map Creation</td></tr>-->
                              </table>
                            </div>
                            <hr />
                            <h3>Address Details</h3>
							<div class="profile__courses__inner">
                            <table class="profile-table">
                                    <tr>
                                        <td><i class="fa fa-map-marker"></i>Country:</td>
                                        <td><?=$extra_details->country;?></td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-map-marker"></i>Country code:</td>
                                        <td><?=$extra_details->county_code;?></td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-map-marker"></i>Nationality:</td>
                                        <td><?=$extra_details->nationality;?></td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-map-marker"></i>Region:</td>
                                        <td><?=$extra_details->gender;?></td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-birthday-cake"></i>Dob:</td>
                                        <td><?php echo date("d-M-Y",strtotime($extra_details->dob));?></td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-user"></i>Gender:</td>
                                        <td><?=$extra_details->gender;?></td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-id-card"></i>Identity no:</td>
                                        <td><?=$extra_details->identity_no;?></td>
                                    </tr>                                                   
                              </table>
                            </div>
                            <hr />
                            <h3>Other Details</h3>
                            <div class="profile__courses__inner">
                            <table class="profile-table">
                                    <tr>
                                        <td><i class="fa fa-map-marker"></i>Specialization:</td>
                                        <td><?=$extra_details->specialization;?></td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-map-marker"></i>language:</td>
                                        <td><?=$extra_details->county_code;?></td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-map-marker"></i>Building no:</td>
                                        <td><?=$extra_details->building_no;?></td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-map-marker"></i>District name:</td>
                                        <td><?=$extra_details->district_name;?></td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-map-marker"></i>Street Name:</td>
                                        <td><?php echo $extra_details->street_name;?></td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-user"></i>Zip code:</td>
                                        <td><?=$extra_details->gender;?></td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-id-card"></i>Alternet no:</td>
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

