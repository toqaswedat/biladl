<!-- START BREADCRUMB -->
<ul class="breadcrumb">
  <li><a href="<?=base_url();?>admin/home/index">Home</a></li>
  <li class="active">Cities</li>
</ul>
<!-- END BREADCRUMB -->
<!-- END PAGE TITLE -->
<?php if($this->session->flashdata('success') != "") : ?>                
  <div class="alert alert-success" role="alert">
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <?=$this->session->flashdata('success');?>
  </div>
<?php endif; ?>  
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

  <div class="row">
    <div class="col-md-12">

      <!-- START DATATABLE EXPORT -->
      <div class="panel panel-default">
        <div class="panel-heading">
        <div class="col-md-6 col-xs-6">
          <h2><span></span>Cities</h2>
        </div>
    
        </div>
        <div class="panel-body">
          <div class="table-responsive">
          <div id="wait" style="display:none;width:69px;height:89px;position:absolute;top:50%;left:50%;padding:2px; z-index:99999999"><img src='<?=base_url();?>assets/img/demo_wait.gif' width="64" height="64" /></div>
            <input type="hidden" id="atpagination" value="">
            <input type="hidden" id="paginationlength" value="">
            <table id="users" class="table datatable table-striped">
              <!-------- Search Form ---------->
            <form id="fees_form" name="search_fees" method="post" class="pull-right">
              <div class="col-md-3 col-md-offset-3" style="padding:0">
                  <input type="text" name="search_text_1" id="search_text_1" placeholder="Type keyword to search" class="input-sm form-control custom-input" style="margin-left:5px;">
              </div>  
              <div class="col-md-2">

                  <select name="search_on_1" id="search_on_1" class="form-control input-sm custom-input">

                      <option value="1">City Name</option>

                  </select>

                  <i class="fa fa-angle-down arrow-icon" id="arrow-icon"></i>

              </div>

              <div class="col-md-2">

                  <select name="search_at_1" id="search_at_1" class="input-sm form-control custom-input">

                      <option value="">Contains</option>


                  </select>

                  <i class="fa fa-angle-down arrow-icon" id="arrow-icon"></i>

              </div>               
              <div class="col-md-2">
              <button type="button" id="search_user" class="btn btn-info margin_search" style=""><i class="fa fa-search icon-style"></i></button>
              <a class="btn btn-danger" style="display:none;" id="searchreset" href="<?php echo base_url('admin/register/all_package'); ?>"><li class="fa fa-minus icon-style"></li></a>
              </div>
            </form> 
            <!-------- /Search Form ---------->

            </table>                                            
          </div>
        </div>
      </div>
      <!-- END DATATABLE EXPORT -->
       <?php 
        $attributes = array('class' => 'form-horizontal', 'id' => 'validation');
      echo form_open_multipart('admin/register/Addcity', $attributes); 
      ?>

        <div class="panel panel-default">
          <div class="panel-heading">
            <h2 class="panel-title">Add City</h3>            
          </div>
               
          <div class="panel-body">
            <div class="clearfix"></div>
            <div class="form-group">
              <label for="title" class="col-md-3 col-xs-12 control-label">Country</label>
              <div class="col-md-6 col-xs-12">
                 <select class="input-sm form-control" id="CountryID" name="CountryID">
                    <option value="">Select Country</option>
                    <?php foreach($Country as $key => $value): ?>
                    <option value="<?=$value->id?>"><?=$value->country_name?></option>
                    <?php endforeach; ?>
                </select>              
              </div>
            </div> 
            <div class="clearfix"></div>
            <div class="form-group">
              <label for="title" class="col-md-3 col-xs-12 control-label">Name</label>
              <div class="col-md-6 col-xs-12">
                <div class="">
                  <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                  <input type="text" class="form-control required" name="city_name" value="" placeholder="Berhampur" />
                </div>               
              </div>
            </div>                        
          </div>
          <div class="panel-footer">
            <!-- <button class="btn btn-default">Clear Form</button> -->
            <a href="<?=base_url();?>admin/home/all_package" class="btn btn-primary pull-right" style="margin-left:10px;">Cancel</a>            
            <button type="submit" class="btn btn-primary pull-right" id="btnSubmit">Add City</button>
          </div>
        </div>
        </form>       
    </div>
  </div>
</div>         
<!-- END PAGE CONTENT WRAPPER -->
<script src="<?php echo base_url();?>assets/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/datatables/dataTables_custom.js" type="text/javascript"></script>
<!--Load JQuery-->
<script src="<?php echo base_url();?>assets/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/datatables/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">

// function transforeVal()
// {
//    var learners_story = $('#txtEditor').code();            
//            $('#txtEditor').val(learners_story);
//            return true;
// }

</script>


<script>
    var dtabel;
    var search_text_1;
    var search_on_1;
    var search_at_1;
    var ispage;
    var url = '<?php echo base_url();?>';
    $(document).ready(function () {
        dtabel = $('#users').DataTable({
            "processing": true,
            "serverSide": true,
            "bStateSave": true,
            "language": {
            "emptyTable": "No Records Found!",
        },
        dom: '<"html5buttons" B>lTgtp',
        buttons: [],
        "aLengthMenu": [10, 20, 50, 100],
        "destroy": true,
        "ajax": {
            "url": "<?php echo base_url('admin/register/AllCity'); ?>",
            "type":"POST",
            beforeSend: function() {
              $("#wait").css("display", "block");
            },
            "data":function (d){
                d.search_text_1 = search_text_1;
                d.search_on_1 = search_on_1;
                d.search_at_1 = search_at_1;
            },
            "dataSrc": function ( jsondata ) {
                $("#wait").css("display", "none");
                return jsondata['data'];
            }
        },
        "columns": [
            { "title": "S.No", "name":"sno", "orderable": false, "data":"sno", "width":"0%" },            
            { "title": "country name", "name":"Topic_name","orderable": false, "data":"country_name", "width":"0%" },     
            { "title": "city name", "name":"Days","orderable": false, "data":"name", "width":"0%" },
     
             { "title": "Action", "name":"Action","orderable": false, "data":"id", "width":"0%" },
            
        ],
        "fnCreatedRow": function( nRow, aData, iDataIndex) 
        {
           //   var Image = aData['image'];
           // var imgTag = '<img src="' +url+ Image + '"style="height:100px;width:100px;"/>';          
           // $(nRow).find('td:eq(2)').html(imgTag);     

          var action ='<div class="btn-group dropup"><button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">Delete <span class="caret"></span></button>';

          action+='<ul class="dropdown-menu pull-right" style="text-align:left;">';

          action+='<li><a id="enroll" href="'+url+'admin/register/DeleteCity/'+aData['id']+'" ><i class="icon-trash"></i>&nbsp;Delete</a></li></ul>';
          $(nRow).find('td:eq(3)').html(action);
        },
        "fnDrawCallback": function( oSettings ) {            
            var info = this.fnPagingInfo().iPage;
            $("#atpagination").val(info+1);
            $("td:empty").html("&nbsp;");
        },
    });
    $("#search_user").click(function(){
        if($("#search_text_1").val()!=""){
            $("#search_text_1").css('background', '#ffffff');
            setallvalues();
            dtabel.draw();
        }else{
         $("#search_text_1").css('background', '#ffb3b3');
         $("#search_text_1").focus();
         return false;
        }
    });
});

function setallvalues(){
    search_text_1 = $("#search_text_1").val();
    search_on_1 = $("#search_on_1").val();
    search_at_1 = $("#search_at_1").val();
    var table = $('#users').DataTable();
    var info = table.page.info();
    $("#atpagination").val((info.page+1));
    if(search_text_1!=""){
        $("#searchreset").show();            
    }
    searchAstr = '';
}

function getpagenumber()
{
    return $("#atpagination").val() / $("#paginationlength").val();
}
</script>
