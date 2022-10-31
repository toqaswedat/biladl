<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
    <!-- Simple post content example. -->
    <div class="panel panel-default">
        <div class="panel-body">
            <!-- <div class="pull-left">
                <a href="#">
                    <img class="media-object img-circle" src="https://lut.im/7JCpw12uUT/mY0Mb78SvSIcjvkf.png" width="50px" height="50px" style="margin-right:8px; margin-top:-5px;">
                </a>
            </div> -->
            <h4><a href="#" style="text-decoration:none;"><strong>Article bookmarks</strong></a></h4>
            
            
            <div class="inner-articles">
    <?php foreach ($paged_articles as $art_key => $art_val) : ?>
        <div class="job-list">
            <div class="row">
                <div class="thumb col-lg-3">
                <a href="job-details.html"><img src="<?=base_url($art_val->image)?>" alt=""></a>
                </div>
                <div class="job-list-content col-lg-9">
                <h4><a href="job-details.html" ><?=$art_val->title?></h4>
                <p class="desc-js"><?=$art_val->description?></p>
                <div class="job-tag">
                    <div class="pull-left">
                        <div class="meta-tag">
                        <span class="meta-part"><i class="ti-calendar"></i>
                            <a href="#"><?=date('Y-m-d',strtotime($art_val->created_on));?></a></span>
                        </div>
                    </div>
                    <div class="pull-right">
                        <div class="icon">
                        <a class="bookmark-js" href="javascript:void(0)" data-artID="<?=$art_val->id;?>" style="font-size: 22px;"
                        data-bookMtype="<?php echo ($art_val->staus_book)? "REMOVE":"ADD"; ?>" ><i class="<?php echo ($art_val->staus_book)? "fa fa-bookmark":"fa fa-bookmark-o"; ?>"></i></a>
                        </div>
                        <div class="icon">
                            <a href=""><i class="fa fa-share"></i></a>
                        </div>
                        <div  data-desID="<?=$art_val->id?>" class="btn btn-common btn-rm redmore-js">Read More</div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
 <?php if($total_pages>1): ?>
    <ul class="pagination pull-right">
        <li>
            <a href="<?=$prev_url?>" class="btn btn-common"><i class="ti-angle-left"></i> prev</a>
        </li>
                <?php  for ($i=1; $i<=$total_pages; $i++) { $class='';
                            if($C_page==$i){ $class='active'; } ?>
                <li class="<?=$class?>"><a  href="<?=$uri_url;?><?=$i;?>"><?=$i;?></a></li>
                <?php $class=''; } ?>
        
        <li>
            <a href="<?=$next_url?>" class="btn btn-common">    Next <i class="ti-angle-right"></i></a>
        </li>
    </ul>
          <?php endif; ?>

</div>
                </div>
            </div>
        </div>

    </div>
    </div>
</div>
</div>
<script type="text/javascript">
    $( ".redmore-js").click(function() {
        cliker=$(this);        
        var desID=cliker.attr("data-desID");        
            var Data_in_json={artID: desID};           
            var urls='<?=base_url("pages/MoreArticles");?>';
             $.post(urls,Data_in_json).done(function(response){                               
                 getdata=JSON.parse(response);
                 if(getdata['status']==true)
                 {
                    cliker.closest('.job-list').find('.desc-js').html(getdata['response'].description); 
                    // alert(cliker.closest('.job-list').find('.desc-js').attr("class"));

                 }
                 
            });
    });
</script>

<script type="text/javascript">
  $( ".bookmark-js").click(function() {
      cliker=$(this);

      var artID=cliker.attr("data-artID");
      var bookmarkType=cliker.attr("data-bookMtype");
      var Data_in_json={artID: artID,bookmarkType: bookmarkType};
        var urls='<?=base_url("Login/AddBookmarks_article");?>';
         $.post(urls,Data_in_json).done(function(response){                               
             getdata=JSON.parse(response);
             if(getdata['status']==true && getdata['error_code']==200)
             {
              cliker.attr('data-bookMtype', 'REMOVE');
              cliker.find('i').removeClass( "fa fa-bookmark-o" );
              cliker.find('i').addClass( "fa fa-bookmark" );              
                //alert("Bookmark created");
             }
             else if(getdata['status']==true && getdata['error_code']==201)
             {
              cliker.find('i').removeClass( "fa fa-bookmark" ); 
              cliker.find('i').addClass( "fa fa-bookmark-o" );
                cliker.attr('data-bookMtype', 'ADD');
                // alert("Removed");
             }             
             else if(getdata['status']==false && getdata['error_code']==401)
             { 
                 window.location="<?=base_url('Login/Login_as_register_member')?>";
             }
             
        });
  });
</script>