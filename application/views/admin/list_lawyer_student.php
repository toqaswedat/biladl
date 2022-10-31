<!-- START BREADCRUMB -->

<ul class="breadcrumb">

  <li><a href="<?=base_url();?>admin/home/index">Home</a></li>

  <li class="active">Trainee</li>

</ul>

<!-- END BREADCRUMB -->

<!-- END PAGE TITLE -->

<?php if($this->session->flashdata('success') != "") : ?>                

  <div class="alert alert-success" role="alert">

    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

    <?=$this->session->flashdata('success');?>

  </div>

<?php endif; ?>

<?php if($this->session->flashdata('Fails') != "") : ?>                

  <div class="alert alert-danger" role="alert">

    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

    <?=$this->session->flashdata('Fails');?>

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

          <h2><span class="fa fa-user"></span> Trainee</h2>

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

              <button type="button" id="search_user" class="btn btn-info margin_search" style=""><i class="fa fa-search icon-style"></i></button>

              <a class="btn btn-danger" style="display:none;" id="searchreset" href="<?php echo base_url('admin/register/view_lawyer_student'); ?>"><li class="fa fa-minus icon-style"></li></a>

              </div>

            </form> 

            <!-------- /Search Form ---------->



            </table>                                            

          </div>

        </div>

      </div>

      <!-- END DATATABLE EXPORT -->      

    </div>

  </div>

</div>         

<!-- END PAGE CONTENT WRAPPER -->

<script src="<?php echo base_url();?>assets/datatables/jquery.dataTables.js" type="text/javascript"></script>

<script src="<?php echo base_url();?>assets/datatables/dataTables_custom.js" type="text/javascript"></script>

<!--Load JQuery-->

<script src="<?php echo base_url();?>assets/datatables/jquery.dataTables.min.js"></script>

<script src="<?php echo base_url();?>assets/datatables/dataTables.bootstrap.min.js"></script>







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

            "url": "<?php echo base_url('admin/register/All_lawyer_student'); ?>",

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

            { "title": "name", "Name":"Topic_name","orderable": false, "data":"name", "width":"0%" },

            { "title": "email", "name":"Type","Description": false, "data":"email", "width":"0%" },

            { "title": "mobile", "name":"Type","Description": false, "data":"mobile", "width":"0%" },     

            { "title": "Actions", "name":"Type","Description": false, "data":"mobile", "width":"0%" },     

            { "title": "Other Details", "name":"Type","Description": false, "data":"nationality", "width":"0%" },

            { "title": "Created Date", "name":"created_on","orderable": false, "data":"created_at", "width":"0%" },



            

        ],

        "fnCreatedRow": function( nRow, aData, iDataIndex) 

        {

          var  act="return confirm('Are you sure you want to suspend/Active the account?')";

        

           var action ='<div class="btn-group dropup" style="width:300px; height:90px;overflow-y:scroll; ">';

           action +='<p><b>Gender : </b>'+aData['gender']+'</p>';

           action +='<p><b>instiutute name : </b>'+aData['instiutute_name']+'</p>';

           action +='<p><b>nationality : </b>'+aData['nationality']+'</p>';

           action +='<p><b>dob : </b>'+aData['dob']+'</p>';

           action +='<p><b>course name : </b>'+aData['course_name']+'</p>';

           action +='<p><b>region : </b>'+aData['region']+'</p>';

           action +='<p><b>licence no : </b>'+aData['licence_no']+'</p>';

           action +='<p><b>Identity  : </b>'+aData['identity_no']+'</p>';

           action +='<p><b>county code : </b>'+aData['county_code']+'</p>';

           action +='<p><b>specialzation : </b>'+aData['specialzation']+'</p>';

           action +='</div>';

   

           $(nRow).find('td:eq(5)').html(action);

          var action= '<div class="btn-group" role="group" aria-label="Basic example" style="width:150px;">'

           action +='<a class="btn btn-success "  href="'+url+'admin/register/ViewConvertion/'+aData['id']+'" >&nbsp;Chat</a>';           

          //$(nRow).find('td:eq(1)').html(action);

           

           if(aData['status']!=9)

          {

            action +='<div class="btn-group dropup"><button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">Actions <span class="caret"></span></button>';

          }else

          {

            action +='<div class="btn-group dropup"><button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">Actions <span class="caret"></span></button>';

          }

          action+='<ul class="dropdown-menu pull-right" style="text-align:left;">';



          action+='<li><a id="enroll" href="'+url+'admin/register/view_user_document/'+aData['student_id']+'" ><i class="icon-edit"></i>&nbsp;View Uploaded document</a></li>';

          if(aData['status']!=9)

          {

            action+='<li><a id="enroll" onclick="'+act+'" href="'+url+'admin/register/User_Active_Deactive/'+aData['student_id']+'/Suspend" ><i class="icon-trash"></i>&nbsp;Suspend</a></li></ul>';

          }else

          {

            action+='<li><a id="enroll" onclick="'+act+'" href="'+url+'admin/register/User_Active_Deactive/'+aData['student_id']+'/active" ><i class="icon-trash"></i>&nbsp;Active</a></li></ul>';

          }

          



          action+= '</div>';

          action+= '</div>';

          $(nRow).find('td:eq(4)').html(action);

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

