<style type="text/css">
    
.profile__courses__inner .form-control{
    height: 32px ;
    padding:unset; 
    /*padding: 15px -5px;*/
        /*height: 34px !important;*/
}

</style>

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
                    <form method="POST" action="<?=base_url('Login/update_profile');?>">
                    <div class="post-content">
                        <div class="col-sm-12">
						<div class="all-courses">
							<h3>Personal Details</h3>
							<div class="profile__courses__inner">
                            <table class="profile-table">
                                    <tr><td><i class="fa fa-graduation-cap"></i>Name:</td><td>
                                         <input type="text" class="form-control"  name="name" value="<?=$main_details->name;?>" required>
                                     </td></tr>
                                    <tr><td><i class="fa fa-map-marker"></i>ISO code:</td><td><?=$main_details->mob_code;?></td>
                                    </tr>
                                    <tr><td><i class="fa fa-mobile" style="
    font-size: 20px;
"></i>Phone:</td><td><?=$main_details->mobile;?></td></tr>
                                    <tr><td><i class="fa fa-envelope"></i>Email:</td><td><?=$main_details->email;?></td></tr>
                                    <!-- <tr><td><i class="fa fa-map-marker"></i>ID:</td><td><?=$main_details->id;?></td></tr> -->
                                    <!--<tr><td><i class="fa fa-bookmark"></i>Projects:</td>  <td>Map Creation</td></tr>-->
                              </table>
                            </div>
                            <hr />
                            <h3>Address Details</h3>
							<div class="profile__courses__inner">
                            <table class="profile-table">
                                    
                                    <tr>
                                        <td><i class="fa fa-map-marker"></i>Country:</td>
                                        <?php                                      
                                           array_walk_recursive($countries, function(&$value){
                                                   $value = strtolower($value);
                                                });
                                             ?>
                                             
                                        
                                        <td>
                                        <?php if(sizeof($countries) > 0): ?>
                                    <select class="form-control"  name="country" id="country" required>
                                        <option value="" selected>---Select Country---</option>
                                        <?php 
                                        $acive="";
                                        foreach($countries as $cont_key => $cont_val) : 
                                        if($cont_val['country_name']==$extra_details->country){ $acive="selected";   }
                                        ?>
                                        <option <?=$acive?> data-rowid="<?=$cont_val['id'];?>" data-iso="<?=$cont_val['mob_code'];?>"><?=ucfirst($cont_val['country_name']);?></option>
                                        <?php $acive=""; endforeach?>
                                    </select>
                                            <?php endif; ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fa fa-map-marker"></i>Nationality:
                                        </td>
                                        <td>
                                            <?php
                                             $nationality=array_map('strtolower',array_column($nationality, 'title'));
                                             $nationality=array_combine($nationality, $nationality);
                                             $param=array("class"=>"form-control","required"=>"");
                                            ?>
                                            <?=form_dropdown('nationality',$nationality,strtolower($extra_details->nationality), $param);?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-map-marker"></i>City:</td>
                                        <td>
                                        <select class="form-control"  name="city" id="region" required>
                                            <option value="<?=$extra_details->region;?>" selected><?=ucfirst($extra_details->region);?></option>
                                        </select>
                                        </td>
                                    </tr>
                                     
                                    <tr>
                                        <td><i class="fa fa-birthday-cake"></i>Dob:</td>
                                        <td><input type="date" class="form-control date"  name="Dob" value="<?=date("Y-m-d",strtotime($extra_details->dob));?>" /></td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-user"></i>Gender:</td>
                                        <td><?php
                                            $married = array('' => '--Select--',
                                                                'male' =>'Male',
                                                                'female' => 'Female'
                                                            );
                                                 echo form_dropdown('gender',$married,strtolower($extra_details->gender),$param);  ?>            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-id-card"></i>Identity no:</td>
                                        <td>
                                            <input type="text" class="form-control"  name="identity" value="<?=$extra_details->identity_no;?>" required>
                                        </td>
                                    </tr>                                                   
                              </table>
                            </div>
                                <button type="submit" class="btn btn-common pull-right">Save</button>
						</div>
					</div>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    </div>
</div>
</div>
<script type="text/javascript">


$('#country').on('change', function() {
    // $(this).find(':selected').data('iso');
    // $(this).find(':selected').data('coutCode');
    $("#coutCode").val($(this).find(':selected').data('coutcode'));
    //$("#mob_code").val($(this).find(':selected').data('iso'));
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


