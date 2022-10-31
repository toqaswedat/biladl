<!-- START BREADCRUMB -->
<ul class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li class="active">Edit Article</li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
  <div class="row">
    <div class="col-md-12">
      <?php 
      $attributes = array('class' => 'form-horizontal', 'id' => 'validation');
      echo form_open_multipart('admin/register/UpdateArticle', $attributes); 
      ?>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h2 class="panel-title">Edit Article</h2>         
          </div>
          <?php if($this->session->flashdata('success') != "") : ?>                
            <div class="alert alert-success" role="alert">
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <?=$this->session->flashdata('success');?>
            </div>
          <?php endif; ?>          
          <div class="panel-body">       
            <input type="hidden" name="rowid" value="<?=$Article_Details->id; ?>" />
            <div class="clearfix"></div>
            <div class="form-group">
              <label for="title" class="col-md-3 col-xs-12 control-label">Title</label>
              <div class="col-md-6 col-xs-12">
                <div class="">
                  <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                  <input type="text" class="form-control required" name="title" value="<?=$Article_Details->title; ?>"  />
                </div>               
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="form-group">
              <label for="title" class="col-md-3 col-xs-12 control-label">Title arbic</label>
              <div class="col-md-6 col-xs-12">
                <div class="">
                  <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                  <input type="text" class="form-control required" name="title_arbic" value="<?=$Article_Details->title_arbic; ?>"  />
                </div>               
              </div>
            </div>        
                                
            <div class="form-group">
                <label for="title" class="col-md-3 col-xs-12 control-label">Description</label>
                  <div class="col-md-6 col-xs-12">
                    <div class="nopadding">                  
                      <textarea class="form-control summernote" id="txtEditor" name="Description" /><?=$Article_Details->description; ?></textarea>
                    </div>               
                  </div>
            </div>
            <div class="clearfix"></div>                        
            <div class="form-group">
              <label for="title" class="col-md-3 col-xs-12 control-label">Description arbic</label>
                <div class="col-md-6 col-xs-12">
                  <div class="nopadding">                  
                    <textarea class="form-control summernote" id="txtEditor" name="Description_arbic" /><?=$Article_Details->description_arbic; ?></textarea>
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

