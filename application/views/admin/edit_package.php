<!-- START BREADCRUMB -->
<ul class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li class="active">Edit Package</li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
  <div class="row">
    <div class="col-md-12">
      <?php 
      $attributes = array('class' => 'form-horizontal', 'id' => 'validation');
      echo form_open_multipart('admin/register/Edit_packages', $attributes); 
      ?>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h2 class="panel-title">Edit Package</h2>         
          </div>
          <?php if($this->session->flashdata('success') != "") : ?>                
            <div class="alert alert-success" role="alert">
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <?=$this->session->flashdata('success');?>
            </div>
          <?php endif; ?>          
          <div class="panel-body">       
            <input type="hidden" name="pakid" value="<?=$package_details->id; ?>" />
            <div class="clearfix"></div>
            <div class="form-group">
              <label for="title" class="col-md-3 col-xs-12 control-label">Title</label>
              <div class="col-md-6 col-xs-12">
                <div class="">
                  <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                  <input type="text" class="form-control required" name="package_title" value="<?=$package_details->title; ?>"  />
                </div>               
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="form-group">
              <label for="title" class="col-md-3 col-xs-12 control-label">Title arbic</label>
              <div class="col-md-6 col-xs-12">
                <div class="">
                  <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                  <input type="text" class="form-control required" name="package_title_arbic" value="<?=$package_details->title_arbic; ?>"  />
                </div>               
              </div>
            </div> 
            <div class="clearfix"></div>
            <div class="form-group">
              <label for="title" class="col-md-3 col-xs-12 control-label">package type</label>
              <div class="col-md-6 col-xs-12">
                <div class="">
                  <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                  <input type="text" class="form-control required" name="package_type" value="<?=$package_details->package_type; ?>" placeholder="Ex:- Monthly"  />
                </div>               
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="form-group">
              <label for="title" class="col-md-3 col-xs-12 control-label">package type arbic</label>
              <div class="col-md-6 col-xs-12">
                <div class="">
                  <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                  <input type="text" class="form-control required" name="package_type_arbic" value="<?=$package_details->package_type_arbic; ?>"  />
                </div>               
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="form-group">
              <label for="title" class="col-md-3 col-xs-12 control-label">No. of day of package</label>
              <div class="col-md-6 col-xs-12">
                <div class="">
                  <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                  <input type="number" class="form-control number required" name="package_days" value="<?=$package_details->total_days; ?>" min="1" />
                </div>               
              </div>
            </div>
            <div class="form-group">
             <label for="title" class="col-md-3 col-xs-12 control-label">Description</label>
                <div class="col-md-6 col-xs-12">
                <div class="nopadding">                  
                  <textarea class="form-control summernote" id="txtEditor" name="Description" /><?=$package_details->description; ?></textarea>
                </div>               
              </div>
            </div>
            <div class="clearfix"></div>                        
            <div class="form-group">
              <label for="title" class="col-md-3 col-xs-12 control-label">Description arbic</label>
                <div class="col-md-6 col-xs-12">
                  <div class="nopadding">                  
                    <textarea class="form-control summernote" id="txtEditor" name="Description_arbic" /><?=$package_details->description_arbic; ?></textarea>
                  </div>               
              </div>
            </div>
          </div>
          

      <!-- END Google Map latitude & longitude-->
          </div>
          <div class="panel-footer">
            <!-- <button class="btn btn-default">Clear Form</button> -->
            <a href="<?= base_url();?>admin/register/listoffers" class="btn btn-primary pull-right" style="margin-left:10px;">Cancel</a>            
            <button type="submit" class="btn btn-primary pull-right">Upadate</button>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>
<!-- END PAGE CONTENT WRAPPER -->
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-validate-additional-methods.js"></script>

