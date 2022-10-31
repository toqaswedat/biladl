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

						<h3 class="post-title"><a href="#"><?=$news_details->title?></a></h3>

						<div class="meta">

							<span class="meta-part"><i class="ti-calendar"></i><a href="#"><?=date('Y-m-d',strtotime($news_details->created_on));?></a></span>

						</div>

						<p><a href="<?=$news_details->description?>" target="_blank" ><?=$news_details->description?></a></p>

						

					</div>

				</div>

			</div>





			<!-- <aside id="sidebar" class="col-md-3 col-sm-3 right-sidebar">

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



			<div class="widget widget-archives">

			<h5 class="widget-title">Previous News</h5>

				<ul class="cat-list">

					<li>

						<a href="#">October 2018 <span class="num-posts">(29)</span></a>

					</li>

					<li>

						<a href="#">September 2018 <span class="num-posts">(34)</span></a>

					</li>

					<li>

						<a href="#">August 2018 <span class="num-posts">(23)</span></a>

					</li>

					<li>

						<a href="#">July 2018 <span class="num-posts">(38)</span></a>

					</li>

					<li>

						<a href="#">June 2018 <span class="num-posts">(16)</span></a>

					</li>

					<li>

						<a href="#">May 2018 <span class="num-posts">(14)</span></a>

					</li>

					<li>

						<a href="#">April 2018 <span class="num-posts">(17)</span></a>

					</li>

				</ul>

			</div>

			</aside> -->



		</div>

	</div>

</div>