</div>            
<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
<!-- MESSAGE BOX-->
<div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
  <div class="mb-container">
    <div class="mb-middle">
      <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
      <div class="mb-content">
        <p>Are you sure you want to log out?</p>                    
        <p>Press No if you want to continue work. Press Yes to logout.</p>
      </div>
      <div class="mb-footer">
        <div class="pull-right">
          <a href="<?=base_url();?>admin/home/is_logged_out" class="btn btn-success btn-lg">Yes</a>
          <button class="btn btn-default btn-lg mb-control-close">No</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END MESSAGE BOX-->

<!-- START PRELOADS -->
<audio id="audio-alert" src="<?=base_url();?>assets/audio/alert.mp3" preload="auto"></audio>
<audio id="audio-fail" src="<?=base_url();?>assets/audio/fail.mp3" preload="auto"></audio>
<!-- END PRELOADS -->                  



<!-- START SCRIPTS -->
<!-- START PLUGINS -->
<!--<script type="text/javascript" src="<?=base_url();?>assets/js/plugins/jquery/jquery.min.js"></script>-->
<script type="text/javascript" src="<?=base_url();?>assets/js/plugins/jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/plugins/bootstrap/bootstrap.min.js"></script>        
<!-- END PLUGINS -->

<!-- START THIS PAGE PLUGINS-->        
<script type='text/javascript' src='<?=base_url();?>assets/js/plugins/icheck/icheck.min.js'></script>        
<script type="text/javascript" src="<?=base_url();?>assets/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>

<?php
$uri = $this->uri->segment(3);
if($uri == "index")
{
  ?>
  <script type="text/javascript" src="<?=base_url();?>assets/js/plugins/scrolltotop/scrolltopcontrol.js"></script>

  <script type="text/javascript" src="<?=base_url();?>assets/js/plugins/morris/raphael-min.js"></script>
  <script type="text/javascript" src="<?=base_url();?>assets/js/plugins/morris/morris.min.js"></script>       
  <script type="text/javascript" src="<?=base_url();?>assets/js/plugins/rickshaw/d3.v3.js"></script>
  <script type="text/javascript" src="<?=base_url();?>assets/js/plugins/rickshaw/rickshaw.min.js"></script>
  <script type='text/javascript' src='<?=base_url();?>assets/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
  <script type='text/javascript' src='<?=base_url();?>assets/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>                  
  <script type="text/javascript" src="<?=base_url();?>assets/js/plugins/owl/owl.carousel.min.js"></script>
  <?php
}
else
{
  ?>                
  <script type="text/javascript" src="<?=base_url();?>assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="<?=base_url();?>assets/js/plugins/tableexport/tableExport.js"></script>
  <script type="text/javascript" src="<?=base_url();?>assets/js/plugins/tableexport/jquery.base64.js"></script>
  <script type="text/javascript" src="<?=base_url();?>assets/js/plugins/tableexport/html2canvas.js"></script>
  <script type="text/javascript" src="<?=base_url();?>assets/js/plugins/tableexport/jspdf/libs/sprintf.js"></script>
  <script type="text/javascript" src="<?=base_url();?>assets/js/plugins/tableexport/jspdf/jspdf.js"></script>
  <script type="text/javascript" src="<?=base_url();?>assets/js/plugins/tableexport/jspdf/libs/base64.js"></script>
  <script type="text/javascript" src="<?=base_url();?>assets/js/plugins/bootstrap/bootstrap-file-input.js"></script>
  <script type="text/javascript" src="<?=base_url();?>assets/js/plugins/bootstrap/bootstrap-select.js"></script>
  <script type="text/javascript" src="<?=base_url();?>assets/js/plugins/tagsinput/jquery.tagsinput.min.js"></script>
  <script type="text/javascript" src="<?= base_url();?>assets/js/plugins/summernote/summernote.js"></script>
  <!-- <script src="<?=base_url();?>assets/js/editor.js"></script> -->

  <?php
}
?>
<script type='text/javascript' src='<?=base_url();?>assets/js/plugins/bootstrap/bootstrap-datepicker.js'></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/plugins/moment.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/plugins/daterangepicker/daterangepicker.js"></script>

<!-- END THIS PAGE PLUGINS-->        

<!-- START TEMPLATE -->
<!-- <script type="text/javascript" src="<?=base_url();?>assets/js/settings.js"></script> -->

<script type="text/javascript" src="<?=base_url();?>assets/js/plugins.js"></script>        
<script type="text/javascript" src="<?=base_url();?>assets/js/actions.js"></script>

<script type="text/javascript" src="<?=base_url();?>assets/js/demo_dashboard.js"></script>
<script type="text/javascript">
  window.setInterval(function(){ 
          Chat_Notification();
}, 6000);


function Chat_Notification()
{
  
  var Notication_msg='';
  $.ajax({
        type:'post',
        url : '<?php echo base_url(); ?>admin/register/Chat_Notification',
        data : {},
        beforeSend: function( xhr ) {
          xhr.overrideMimeType( "text/plain; charset=x-user-defined" );
          //$("#wait").css("display", "block");
        },
          success : function(data) { 
            
             var getMsg = JSON.parse(data);            
                if(getMsg['error']>0){                   
                   return true;
                   $("#headerNotify").html(Notication_msg);
              }
              else{  

                $.each(getMsg['history_convertion'], function(key,value) {
                    
                       Notication_msg +='<a href="<?=base_url();?>admin/register/ViewConvertion/'+value['sender_id']+'" class="list-group-item"><div class="list-group-status status-online"></div><img src="<?=base_url();?>assets/images/expert.png" class="pull-left" alt="Taparanjan sahu"/><span class="contacts-title">'+value['name']+'</span><p>'+value['message']+'</p></a>';
                                  

                });

                  Prevlength = $( ".status-online" ).length;
                 $("#headerNotify").html(Notication_msg);
                  afterLength = $( ".status-online" ).length;
                 $("#counterHEAD").html($( ".status-online" ).length+' new');
                 $("#counterHEAD2").html(afterLength);
                  if(afterLength>Prevlength)
                  {
                    document.getElementById("audio-alert").play();

                  }
                 //$("#audio-alert").play();



              }

              return false;
          }
        });
}



</script>



<!-- END TEMPLATE -->
<!-- END SCRIPTS -->
</body>
</html>

