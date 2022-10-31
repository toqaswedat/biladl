<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">

    <!-- Simple post content example. -->

    <div class="panel panel-default">

        <div class="panel-body">

            <div class="pull-left">

                <a href="#">

                    <img class="media-object img-circle" src="https://lut.im/7JCpw12uUT/mY0Mb78SvSIcjvkf.png" width="50px" height="50px" style="margin-right:8px; margin-top:-5px;">

                </a>

            </div>

            <h4><a href="#" style="text-decoration:none;"><strong>بلدي المواقع الاخباريه</strong></a></h4>

            

            

            <div class="inner-articles">

    <?php foreach ($paged_news as $news_key => $news_val) : ?>

        <div class="job-list">

            <div class="row">

                <div class="thumb col-lg-3">

                <a href="job-details.html"><img src="<?=base_url($news_val->image)?>" alt=""></a>

                </div>

                <div class="job-list-content col-lg-9">

                <h4><a href="<?=base_url('arabic/pages/NewsDetails/').$news_val->id.'/';?>" ><?=$news_val->title_arbic?></h4>

                <p class="desc-js"><?=$news_val->description?></p>

                <div class="job-tag">

                    <div class="pull-left">

                        <div class="meta-tag">

                        <span class="meta-part"><i class="ti-calendar"></i>

                            <a href="#"><?=date('Y-m-d',strtotime($news_val->created_on));?></a></span>

                        </div>

                    </div>

                    <div class="pull-right">

                        <div class="icon">

                        <a class="bookmark-js" href="javascript:void(0)" style="font-size: 22px;"

                                data-newsID="<?=$news_val->id;?>" 

                                data-bookMtype="<?php echo ($news_val->staus_book)? "REMOVE":"ADD"; ?>" ><i class="<?php echo ($news_val->staus_book)? "fa fa-bookmark":" ti-bookmark"; ?>"></i></a>

                        </div>

                        <div class="icon">

                            <a href=""><i class="fa fa-share"></i></a>

                        </div>

                        <div  data-desID="<?=$news_val->id?>" class="btn btn-common btn-rm redmore-js"><a href="<?=base_url('arabic/pages/NewsDetails/').$news_val->id.'/';?>">View details</a></div>

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

  $( ".bookmark-js").click(function() {

    cliker=$(this);

    var newsID=cliker.attr("data-newsID");

      var bookmarkType=cliker.attr("data-bookMtype");

      var Data_in_json={newsID: newsID,bookmarkType: bookmarkType};

        var urls='<?=base_url("arabic/Login/AddBookmarks_news");?>';

         $.post(urls,Data_in_json).done(function(response){                               

             getdata=JSON.parse(response);

             if(getdata['status']==true && getdata['error_code']==200)

             {

              cliker.attr('data-bookMtype', 'REMOVE');

              cliker.find('i').removeClass( "fa ti-bookmark" );

              cliker.find('i').addClass( "fa fa-bookmark" );              

                //alert("Bookmark created");

             }

             else if(getdata['status']==true && getdata['error_code']==201)

             {

              cliker.find('i').removeClass( "fa fa-bookmark" ); 

              cliker.find('i').addClass( "fa ti-bookmark" );

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