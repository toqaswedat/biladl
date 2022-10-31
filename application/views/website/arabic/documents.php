  <!-- <script src="https://code.jquery.com/jquery-1.10.2.js"></script> -->

<section class="find-job useful-links documents section inner-articles">

	<div class="container">

	<h2 class="section-title">وثائق مفيدة</h2>

		<div class="dotted-border">

		<div class="dotted-line"></div>

		<div class="dotted-line"></div>

		<div class="dotted-line"></div>

		</div>

		<div class="row">

			<div class="col-md-9">

				<?php foreach ($paged_documents as $Doc_key => $Doc_val) : ?>

				<div class="job-list">

					<div class="row">

						<div class="job-list-content col-lg-9">

							<h4><i class="fa fa-file-pdf-o" aria-hidden="true"></i><a target="_next" href="<?=base_url($Doc_val->download_link);?>"><?=$Doc_val->title_arbic?></a></h4>

						</div>

					</div>

				</div>

				<?php endforeach; ?>

			<div class="clearfix"></div>			

				<?php if($total_pages>1): ?>

				<ul class="pagination  pull-left">

					<li >

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

		</div>

	</div>

</section>