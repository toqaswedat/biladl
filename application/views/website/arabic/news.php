<section class="find-job job-browse section inner-articles">

<div class="container">

    <h2 class="section-title">الأخبار القانونية</h2>

    <div class="dotted-border">

        <div class="dotted-line"></div>

        <div class="dotted-line"></div>

        <div class="dotted-line"></div>

    </div>

    <div class="row">

        <div class="col-md-9">

            <?php foreach ($paged_news as $news_key => $news_val) : ?>

            <div class="job-list">

                <div class="row">

                    <div class="thumb col-lg-3 pull-right">

                        <a href="job-details.html"><img src="<?=base_url($news_val->image)?>" alt=""></a>

                    </div>

                    <div class="job-list-content col-lg-9">

                        <h4><a href="<?=base_url('arabic/pages/NewsDetails/').$news_val->id.'/';?>"><?=$news_val->title_arbic?></h4>

                        

                        <div class="job-tag">

                            <div class="pull-left">

                                <div class="meta-tag">

                                    <span class="meta-part"   >

                                        <i class="ti-calendar"></i><a href="#"><?=date('Y-m-d',strtotime($news_val->created_on));?></a>

                                    </span>

                                </div>

                            </div>

                            <div class="pull-right">

                                <div class="icon">

                                <a href="javascript:void(0)" class="bookmark-js" data-newsID="<?=$news_val->id;?>" 

                                    data-bookMtype="<?php echo ($news_val->staus_book)? "REMOVE":"ADD"; ?>">

                                    <i class="<?php echo ($news_val->staus_book)? "fa fa-bookmark":" ti-bookmark"; ?>"

                                    ></i>

                                </a>

                                </div>

                                

                                <a href="<?=$news_val->description?>" target="_blank" class="btn btn-common log-btn center-block">Read More</a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <?php endforeach; ?>



            <div class="showing pull-left">

                <!-- <a href="#">Showing <span>6-10</span> Of 24 Jobs</a> -->

            </div>

            <?php if($total_pages>1): ?>

                <ul class="pagination pull-right">

                    <li >

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

</section>



<script type="text/javascript">

    $( ".redmore-js").click(function() {

        cliker=$(this);

        var desID=cliker.attr("data-desID");

            var Data_in_json={newsID: desID};

            var urls='<?=base_url("arabic/pages/MoreNews");?>';

             $.post(urls,Data_in_json).done(function(response){                               

                 getdata=JSON.parse(response);

                 if(getdata['status']==true)

                 {

                    // cliker.parent('.job-list').children('.desc-js').html(getdata['response'].description);

                 cliker.parent().parent().parent().find('.desc-js').html(getdata['response'].description_arbic);  



                 }

                 

            });

    });

</script>



<script type="text/javascript">

  $( ".bookmark-js").click(function() {

    cliker=$(this);

    var newsID=cliker.attr("data-newsID");

      var bookmarkType=cliker.attr("data-bookMtype");

      var Data_in_json={newsID: newsID,bookmarkType: bookmarkType};

        var urls='<?=base_url("Login/AddBookmarks_news");?>';

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