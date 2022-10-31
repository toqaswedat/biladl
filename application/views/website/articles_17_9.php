<section class="find-job job-browse section inner-articles">
<div class="container">
<h2 class="section-title">Latest Articles</h2>

	<div class="dotted-border">
		<div class="dotted-line"></div>
		<div class="dotted-line"></div>
		<div class="dotted-line"></div>
	</div>

<div class="row">

	<div class="col-md-8">
	<?php foreach ($paged_articles as $art_key => $art_val) : ?>
		<div class="blog-post">
			<div class="post-thumb" style="background:url('<?=base_url($art_val->image)?>');">
			<!-- <a href="#"><img src="<?=base_url($art_val->image)?>" alt=""></a> -->
			</div>
			<!-- <div class="blog-author">
			<img src="assets/img/blog/author.jpg" alt="">
			</div> -->
			<div class="post-content">
				<h3 class="post-title"><a href="#"><?=$art_val->title?></a></h3>
				<div class="meta">
				<span class="meta-part"><i class="ti-calendar"></i><a href="#"><?=date('Y-m-d',strtotime($art_val->created_on));?></a></span>
	 			<span >
                  <a class="save bookmark-js" href="javascript:void(0)" title="Bookmark"
                       data-artID="<?=$art_val->id;?>" style="font-size: 22px;"
                    data-bookMtype="<?php echo ($art_val->staus_book)? "REMOVE":"ADD"; ?>" >
                    <i class="<?php echo ($art_val->staus_book)? "fa fa-bookmark":"fa fa-bookmark-o"; ?>"></i> 
                  </a>
                </span>

				</div>
				<p class="desc-js"><?=$art_val->description?></p>
				<a href="javascript:void(0)" data-desID="<?=$art_val->id?>" class="btn btn-common redmore-js">Read More</a>
			</div>
		</div>
	<?php endforeach; ?>

	  <?php if($total_pages>1): ?>
		<ul class="pagination">
			<li>
				<a href="<?=$prev_url?>" class="btn btn-common"><i class="ti-angle-left"></i> prev</a>
			</li>
			 		<?php  for ($i=1; $i<=$total_pages; $i++) { $class='';
                                if($C_page==$i){ $class='active'; } ?>
					<li class="<?=$class?>"><a  href="<?=$uri_url;?><?=$i;?>"><?=$i;?></a></li>
					<?php $class=''; } ?>
			
			<li>
				<a href="<?=$next_url?>" class="btn btn-common">	Next <i class="ti-angle-right"></i></a>
			</li>
		</ul>
		  <?php endif; ?>
</div>


<!--<aside id="sidebar" class="col-md-4 right-sidebar">
    <div class="widget widget-popular-posts">
	<h5 class="widget-title">Recent News</h5>
	<ul class="posts-list">
	<li>
		<div class="widget-content">
			<a href="#">Tips to write an impressive resume online for beginner</a>
			<span><i class="icon-calendar"></i> 25 March, 2018</span>
		</div>
		<div class="clearfix"></div>
	</li>
	<li>
		<div class="widget-content">
			<a href="#">The sceret to pitching for new business</a>
			<span><i class="icon-calendar"></i> 25 March, 2018</span>
		</div>
	<div class="clearfix"></div>
	</li>
	<li>
		<div class="widget-content">
			<a href="#">7 things you should never say to your boss</a>
			<span><i class="icon-calendar"></i> 25 March, 2018</span>
		</div>
		<div class="clearfix"></div>
	</li>
	</ul>
</div>
</aside>-->

</div>
</div>
</section>
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
		         	cliker.closest('.post-content').children('.desc-js').html(getdata['response'].description);	
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