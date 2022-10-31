
<section class="find-job useful-links section inner-articles">
	<div class="container">
		<h2 class="section-title">روابط مفيدة</h2>
			<div class="dotted-border">
			<div class="dotted-line"></div>
			<div class="dotted-line"></div>
			<div class="dotted-line"></div>
			</div>
		<div class="row">
			<div class="col-md-9">
				<?php foreach ($paged_useful_links as $link_key => $link_val) : ?>
				<div class="job-list">
					<div class="row">
						<div class="job-list-content col-lg-9">
						<h4><a href="<?=$link_val->links?>" target="_blank"><?=$link_val->title_arbic?></h4>
						<a href="<?=$link_val->links?>"><i class="ti-world"></i><?=$link_val->links?></a>
						</div>
					</div>
				</div>
				<?php endforeach; ?>			
	
				<?php if($total_pages>1): ?>
				<ul class="pagination  pull-left">
					<li >
						<a href="<?=$prev_url?>" class="btn btn-common"><i class="ti-angle-left"></i> prev</a>
					</li>
					 		<?php  for ($i=1; $i<=$total_pages; $i++) { $class='';
		                                if($C_page==$i){ $class='active'; } ?>
							<li class="<?=$class?>"><a  href="<?=$uri_url;?><?=$i;?>"><?=$i;?></a></li>
							<?php $class=''; } ?>
					
					<li >
						<a href="<?=$next_url?>" class="btn btn-common">	Next <i class="ti-angle-right"></i></a>
					</li>
				</ul>
			  <?php endif; ?>			
			</div>
		</div>
	</div>
</section>