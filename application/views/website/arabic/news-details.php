<div id="content">

    <div class="container">

        <div class="row">

            <div class="col-md-9">

                <div class="blog-post">

                    <div class="post-thumb">

                        <a href="#"><img src="<?=base_url($news_details->image)?>"" alt=""></a>

                        <div class="hover-wrap">

                        </div>

                    </div>

                    <div class="post-content">

                        <h3 class="post-title"><a href="#"><?=$news_details->title_arbic?></a></h3>

                        <div class="meta">

                            <span class="meta-part"><i class="ti-calendar"></i><a href="#"><?=date('Y-m-d',strtotime($news_details->created_on));?></a></span>

                        </div>

                        <p><a href="<?=$news_details->description_arbic?>" target="_blank" ><?=$news_details->description_arbic?></a></p>

                        

                    </div>

                </div>

            </div>





            



        </div>

    </div>

</div>