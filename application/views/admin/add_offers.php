<!-- START BREADCRUMB -->
<ul class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="#">All Offer</a></li>
  <li class="active">Add Offer</li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
  <div class="row">
    <div class="col-md-12">
      <?php 
      $attributes = array('class' => 'form-horizontal', 'id' => 'validation');
      echo form_open_multipart('admin/register/set_offers', $attributes); 
      ?>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h2 class="panel-title">Add Offers</h3>            
          </div>
          <?php if($this->session->flashdata('success') != "") : ?>                
            <div class="alert alert-success" role="alert">
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <?=$this->session->flashdata('success');?>
            </div>
          <?php endif; ?>          
          <div class="panel-body">


          <div class="form-group">
              <label for="cat_id" class="col-md-3 col-xs-12 control-label">Select category</label>
              <div class="col-md-6 col-xs-12">
                <div class="">
                 <select class="input-sm form-control custom-input" name="cat_id" required="">
                  <?php                 
                  if(isset($cats))
                  foreach ($cats as $key => $value) {
                   
                   echo "<option value='".$value['id']."'>".$value['title']."</option>";
                  }

                   ?>
                  </select>
                </div>               
              </div>
            </div>
            

            <div class="form-group">
              <label for="title" class="col-md-3 col-xs-12 control-label">Title</label>
              <div class="col-md-6 col-xs-12">
                <div class="">
                  <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                  <input type="text" class="form-control" name="title" id="title" value="" required="" />
                </div>               
              </div>
            </div>

            <div class="form-group">
              <label for="ImageName" class="col-md-3 col-xs-12 control-label">Select Image</label>
              <div class="col-md-6 col-xs-12">
                <div class="">
                  <input type="file" class="form-control-file" name="ImageName" id="ImageName" />
                </div>               
              </div>
            </div>           

            <div class="form-group">
              <label for="exp_date" class="col-md-3 col-xs-12 control-label">Expire date</label>
              <div class="col-md-6 col-xs-12">
                <div class="">
                  <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                  <input type="text" class="form-control datepicker" name="exp_date" id="exp_date" required=""/>
                </div>               
              </div>
            </div>

            <div class="form-group">
              <label for="Descriptions" class="col-md-3 col-xs-12 control-label">Description</label>
              <div class="col-md-6 col-xs-12">
                <div class="">
                  <textarea class="form-control" name="Descriptions" id="Descriptions" /></textarea>
                </div>               
              </div>
            </div>

            <div class="form-group">
              <label for="offerName" class="col-md-3 col-xs-12 control-label">Offer Name</label>
              <div class="col-md-6 col-xs-12">
                <div class="">
                  <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                  <input type="text" class="form-control" name="offerName" id="offerName" value="" required=""/>
                </div>               
              </div>
            </div> 
            <div class="form-group">
              <label for="latitude" class="col-md-3 col-xs-6 control-label">Latitude</label>
              <div class="col-md-3 col-xs-6">
                <div class="">
                  <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                  <input type="text" class="form-control MapLat" name="latitude" id="latitude" value="17.3850" readonly="" required="" />
                </div>               
              </div>
            </div> 
            <div class="form-group">
              <label for="longitude" class="col-md-3 col-xs-6 control-label">Longitude</label>
              <div class="col-md-3 col-xs-6">
                <div class="">
                  <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                  <input type="text" class="form-control MapLon" name="longitude" id="longitude" value="78.4867" readonly="" required="" />
                </div>               
              </div>
            </div>
          <!-- Google Map latitude & longitude   -->          

      Address:
      <input id="searchTextField" type="text" size="50" style="text-align: left;width:357px;direction: ltr;">
      <br>
            latitude:<input  class="MapLat" value="" type="text" placeholder="Latitude" style="width: 161px;" disabled>
            longitude:<input class="MapLon" value="" type="text" placeholder="Longitude" style="width: 161px;" disabled>

<div id="map_canvas" style="height: 350px;width: 500px;margin: 0.6em;"></div>


      <!-- END Google Map latitude & longitude-->
          </div>
          <div class="panel-footer">
            <button class="btn btn-default">Clear Form</button>
            <a href="<?= base_url();?>admin/home/index" class="btn btn-primary pull-right" style="margin-left:10px;">Cancel</a>            
            <button type="submit" class="btn btn-primary pull-right">Submit</button>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>
<!-- END PAGE CONTENT WRAPPER -->
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-validate-additional-methods.js"></script>
<script>
    $(document).ready(function() { //alert();
        $("#validation").validate({
            rules: {
              // simple rule, converted to {required:true}
              Password: {
                  required : true,
                  minlength:6
              }            
            },
            messages: {
                Password: {
                    required : "Please Enter Password"
                }              
              }
          });
    });
</script>
<script>
     $(function () {
         var lat = 17.3850,
             lng = 78.4867,
             latlng = new google.maps.LatLng(lat, lng),
             image = 'http://www.google.com/intl/en_us/mapfiles/ms/micons/blue-dot.png';
         //zoomControl: true,
         //zoomControlOptions: google.maps.ZoomControlStyle.LARGE,
         var mapOptions = {
             center: new google.maps.LatLng(lat, lng),
             zoom: 13,
             mapTypeId: google.maps.MapTypeId.ROADMAP,
             panControl: true,
             panControlOptions: {
                 position: google.maps.ControlPosition.TOP_RIGHT
             },
             zoomControl: true,
             zoomControlOptions: {
                 style: google.maps.ZoomControlStyle.LARGE,
                 position: google.maps.ControlPosition.TOP_left
             }
         },
         map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions),
             marker = new google.maps.Marker({
                 position: latlng,
                 map: map,
                 icon: image
             });
         var input = document.getElementById('searchTextField');
         var autocomplete = new google.maps.places.Autocomplete(input, {
             types: ["geocode"]
         });
         autocomplete.bindTo('bounds', map);
         var infowindow = new google.maps.InfoWindow();
         google.maps.event.addListener(autocomplete, 'place_changed', function (event) {
             infowindow.close();
             var place = autocomplete.getPlace();
             if (place.geometry.viewport) {
                 map.fitBounds(place.geometry.viewport);
             } else {
                 map.setCenter(place.geometry.location);
                 map.setZoom(17);
             }
             moveMarker(place.name, place.geometry.location);
             $('.MapLat').val(place.geometry.location.lat());
             $('.MapLon').val(place.geometry.location.lng());
         });
         google.maps.event.addListener(map, 'click', function (event) {
             $('.MapLat').val(event.latLng.lat());
             $('.MapLon').val(event.latLng.lng());
             infowindow.close();
                     var geocoder = new google.maps.Geocoder();
                     geocoder.geocode({
                         "latLng":event.latLng
                     }, function (results, status) {
                         console.log(results, status);
                         if (status == google.maps.GeocoderStatus.OK) {
                             console.log(results);
                             var lat = results[0].geometry.location.lat(),
                                 lng = results[0].geometry.location.lng(),
                                 placeName = results[0].address_components[0].long_name,
                                 latlng = new google.maps.LatLng(lat, lng);
                             moveMarker(placeName, latlng);
                             $("#searchTextField").val(results[0].formatted_address);
                         }
                     });
         });
        
         function moveMarker(placeName, latlng) {
             marker.setIcon(image);
             marker.setPosition(latlng);
             infowindow.setContent(placeName);
             //infowindow.open(map, marker);
         }
     });
</script>
