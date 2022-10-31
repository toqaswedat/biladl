<style class="cp-pen-styles">
#frame {
  width: 95%;
  min-width: 360px;
  max-width: 1000px;
  height: 92vh;
  background: #E6EAEA;
}
@media screen and (max-width: 360px) {
  #frame {
    width: 100%;
    
  }
}
#frame .content {
  float: right;
  width: 100%;
  height: 100%;
  overflow: hidden;
  position: relative;
}
@media screen and (max-width: 735px) {
  #frame .content {
    width: 100%;
    min-width: 300px !important;
  }
}
@media screen and (min-width: 900px) {
  #frame .content {
    width: 100%;
  }
}
#frame .content .contact-profile {
  width: 100%;
  height: 60px;
  line-height: 60px;
  background: #f5f5f5;
}
#frame .content .contact-profile img {
  width: 40px;
  border-radius: 50%;
  float: left;
  margin: 9px 12px 0 9px;
}
#frame .content .contact-profile p {
  float: left;
}
#frame .content .contact-profile .social-media {
  float: right;
}
#frame .content .contact-profile .social-media i {
  margin-left: 14px;
  cursor: pointer;
}
#frame .content .contact-profile .social-media i:nth-last-child(1) {
  margin-right: 20px;
}
#frame .content .contact-profile .social-media i:hover {
  color: #435f7a;
}
#frame .content .messages {
  height: auto;
  min-height: calc(100% - 93px);
  max-height: calc(100% - 93px);
  overflow-y: scroll;
  overflow-x: hidden;
}
@media screen and (max-width: 735px) {
  #frame .content .messages {
    max-height: 100%;
  }
}
#frame .content .messages::-webkit-scrollbar {
  width: 8px;
  background: transparent;
}
#frame .content .messages::-webkit-scrollbar-thumb {
  background-color: rgba(0, 0, 0, 0.3);
}
#frame .content .messages ul li {
  display: inline-block;
  clear: both;
  float: left;
  margin: 15px 15px 5px 15px;
  width: calc(100% - 25px);
  font-size: 0.9em;
}
#frame .content .messages ul li:nth-last-child(1) {
  margin-bottom: 20px;
}
#frame .content .messages ul li.sent img {
  margin: 6px 8px 0 0;
}
#frame .content .messages ul li.sent p {
  background: #435f7a;
  color: #f5f5f5;
}
#frame .content .messages ul li.replies img {
  float: right;
  margin: 6px 0 0 8px;
}
#frame .content .messages ul li.replies p {
  background: #f5f5f5;
  float: right;
}
#frame .content .messages ul li img {
  width: 40px;
  border-radius: 50%;
  float: left;
}
#frame .content .messages ul li p {
  display: inline-block;
  padding: 10px 15px;
  border-radius: 20px;
  max-width: 205px;
  line-height: 130%;
}
#frame .content .messages ul li p {
  font-size: 14px;
  }
@media screen and (min-width: 735px) {
  #frame .content .messages ul li p {
    max-width: 400px;
  }
}
#frame .content .message-input {
  position: absolute;
  bottom: 0;
  width: 100%;
  z-index: 99;
}
#frame .content .message-input .wrap {
  position: relative;
}
#frame .content .message-input .wrap input {
  font-family: "proxima-nova",  "Source Sans Pro", sans-serif;
  float: left;
  border: none;
  width: calc(100% - 90px);
  padding: 11px 32px 10px 8px;
  font-size: 0.8em;
  color: #32465a;
}
@media screen and (max-width: 735px) {
  #frame .content .message-input .wrap input {
    padding: 15px 32px 16px 8px;
  }
}
#frame .content .message-input .wrap input:focus {
  outline: none;
}
#frame .content .message-input .wrap .attachment {
  position: absolute;
  right: 60px;
  z-index: 4;
  margin-top: 10px;
  font-size: 1.1em;
  color: #435f7a;
  opacity: .5;
  cursor: pointer;
}
@media screen and (max-width: 735px) {
  #frame .content .message-input .wrap .attachment {
    margin-top: 17px;
    right: 65px;
  }
}
#frame .content .message-input .wrap .attachment:hover {
  opacity: 1;
}
#frame .content .message-input .wrap button {
  float: right;
  border: none;
  width: 50px;
  padding: 12px 0;
  cursor: pointer;
  background: #32465a;
  color: #f5f5f5;
}
@media screen and (max-width: 735px) {
  #frame .content .message-input .wrap button {
    padding: 16px 0;
  }
}
#frame .content .message-input .wrap button:hover {
  background: #435f7a;
}
#frame .content .message-input .wrap button:focus {
  outline: none;
}
span{
  font-size: 10px;
}
</style></head><body>
<div id="frame">
  <div class="content">
    <div class="contact-profile">
      <img src="<?=base_url();?>assets/images/user.png" alt="" />
      <?php if(!empty($User_Details)){?><p><?=$User_Details->name?> (<?=$User_Details->mobile?>)</p><?php }?>
    </div>
    <div id="chatdiv" class="messages">
      <ul id="chatbox">
        <?php
            foreach ($Total_convertion as $key => $value) {     
                if($value->UserType=='Admin'){
                    ?>
                        <li class="replies li-id" data-rowid="<?=$value->id?>">
                            <img src="<?=base_url();?>assets/images/expert.png" alt="" />
                            <p><?=$value->message?><br><span><?=$value->TIMEONLY?></span></p>
                            
                        </li>
                    <?php
                }
                else
                {
                    ?>
                        <li class="sent li-id" data-rowid="<?=$value->id?>">
                            <img src="<?=base_url();?>assets/images/user.png" alt="" />
                            <p><?=$value->message?><br><span><?=$value->TIMEONLY?></span></p>
                           
                        </li>
                    <?php
                }
            }
        ?>
        <!-- <li class="sent">
          <img src="<?=base_url();?>assets/images/expert.png" alt="" />
          <p>Hi user</p>
        </li>       
        <li class="replies">
            <img src="<?=base_url();?>assets/images/user.png" alt="" />
            <p>Hi admin</p>
        </li> -->
      </ul>
    </div>
    <form action="#">
    <div class="message-input">
      <div class="wrap">
      <input type="text" id="Mymsg" placeholder="Write your message..." />
      <i class="fa fa-paperclip attachment" aria-hidden="true"></i>
      <button type="submit" class="submit" onClick="SendMessage()"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
      </div>
    </div>
    </form>
  </div>
</div>
<script type="text/javascript">
  //$('#chatdiv').scrollTop($('#chatdiv')[0].scrollHeight);
// jQuery(function($) {
//     $('#chatdiv').on('scroll', function() {
//         if($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) {
//             alert('end reached');
//         }
//     })
// });
var lastChatID='';
var UserID='<?=$UserID?>';
var  Premsg='';
var  Postmsg='';
$('#chatdiv').scroll(function() {
   if($('#chatdiv').scrollTop() + $('#chatdiv').height() <= $('#chatdiv').height()) {
          //alert("bottom!");
         var lastChatID = $(".li-id")[0].getAttribute('data-rowid');
          GetchatHistory(UserID,lastChatID);
   }
});
function GetchatHistory(UserID,lastChatID)
    {
      $.ajax({
        type:'post',
        url : '<?php echo base_url(); ?>admin/register/GetMoreChat',
        data : {lastChatID:lastChatID,UserID:UserID},
        beforeSend: function( xhr ) {
          xhr.overrideMimeType( "text/plain; charset=x-user-defined" );
          //$("#wait").css("display", "block");
        },
          success : function(data) { //alert(data);
            
             var getMsg = JSON.parse(data);            
                if(getMsg['error']>0){
                   //alert(getMsg['json_msg']);
                   return true;
              }
             else
             {                
                  $.each(getMsg['history_convertion'], function(key,value) {
                             
                    if(value['UserType']=='Admin')
                    {
                       Premsg +='<li class="replies li-id" data-rowid="'+value['id']+'"><img src="<?=base_url();?>assets/images/expert.png" alt="" /><p>'+value['message']+'<br><span>'+value['TIMEONLY']+'</span></p></li>';
                    }
                    else
                    {
                      Premsg +='<li class="sent li-id" data-rowid="'+value['id']+'"><img src="<?=base_url();?>assets/images/expert.png" alt="" /><p>'+value['message']+'<br><span>'+value['TIMEONLY']+'</span></p></li>';
                    }
                });
                $("#chatbox").html(Premsg+ $("#chatbox").html());
                Premsg='';
               
             }             
              return false;
          }
        });
    }
</script>
<script type="text/javascript">
  function GetchatFuture(UserID,ENDChatID)
    {
      $.ajax({
        type:'post',
        url : '<?php echo base_url(); ?>admin/register/GetFetureChat',
        data : {ENDChatID:ENDChatID,UserID:UserID},
        beforeSend: function( xhr ) {
          xhr.overrideMimeType( "text/plain; charset=x-user-defined" );
          //$("#wait").css("display", "block");
        },
          success : function(data) { //alert(data);
            
             var getMsg = JSON.parse(data);            
                if(getMsg['error']>0){
                   //alert(getMsg['json_msg']);
                   return true;
              }
             else
             {                        
                  $.each(getMsg['history_convertion'], function(key,value) {
                             
                    if(value['UserType']=='Admin')
                    {
                       Postmsg +='<li class="replies li-id" data-rowid="'+value['id']+'"><img src="<?=base_url();?>assets/images/expert.png" alt="" /><p>'+value['message']+'<br><span>'+value['TIMEONLY']+'</span></p></li>';
                    }
                    else
                    {
                      Postmsg +='<li class="sent li-id" data-rowid="'+value['id']+'"><img src="<?=base_url();?>assets/images/user.png" alt="" /><p>'+value['message']+'<br><span>'+value['TIMEONLY']+'</span></p></li>';
                    }
                });                
                $("#chatbox").append(Postmsg);
                Postmsg='';
                 $('#chatdiv').animate({
                        scrollTop: $('#chatdiv')[0].scrollHeight}, 1000);
               
             }             
              return false;
          }
        });
    }
window.setInterval(function(){ 
    var lengthli =$( ".li-id" ).length-1;
    var ENDChatID =  $(".li-id")[lengthli].getAttribute('data-rowid');    
      GetchatFuture(UserID,ENDChatID);
}, 3000);
</script>
<script type="text/javascript">
  
function SendMessage()
    {
      
      var Mymsg= $("#Mymsg").val();
      if(Mymsg=='')
      {
        return false;
      }  
      $.ajax({
        type:'post',
        url : '<?php echo base_url(); ?>admin/register/SendMessage',
        data : {Mymsg:Mymsg,UserID:UserID},
        beforeSend: function( xhr ) {
          xhr.overrideMimeType( "text/plain; charset=x-user-defined" );
          //$("#wait").css("display", "block");
        },
          success : function(data) { //alert(data);
             document.getElementById("audio-alert").play();
             var getMsg = JSON.parse(data);            
                if(getMsg['error']>0){
                   //alert(getMsg['json_msg']);
                   return true;
              }
              $("#Mymsg").val('');
                         
              return false;
          }
        });
      
    }
</script>