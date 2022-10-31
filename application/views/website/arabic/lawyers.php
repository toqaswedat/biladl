<div id="content">

	<div class="container">

		<h2 class="section-title">محامون بلادل<h2>

		<div class="dotted-border">

		<div class="dotted-line"></div>

		<div class="dotted-line"></div>

		<div class="dotted-line"></div>

		</div>
		<p> - <strong> السيد خالد بغدادي: </strong> المدير التنفيذي والمستشار القانوني. السيد خالد حاصل على درجة الماجستير في القانون التجاري والتحكيم من جامعة الخليج في البحرين. خبرة سابقة في عبداللطيف جميل ومحمد يوسف ناغي.</p>
		<p> - <strong> الأستاذ عبدالله الجوهاني: </strong> حاصل على درجة البكالوريوس في القانون من جامعة الملك عبد العزيز. الممارسات أساسا العمل والقانون المدني. خبرة سابقة في محكمة الاستئناف الإدارية لمدة أربع سنوات. </p>
		<p> - <strong> السيد عبد العزيز بغدادي: </strong> حاصل على درجة البكالوريوس في القانون من جامعة الشارقة. الممارسات أساسا العمل ، والقانون الجنائي والمدني وقانون الأسرة. </p>
		<p> - <strong> السيد أحمد فرج: </strong> حاصل على درجة البكالوريوس في القانون من جامعة أم القرى. الممارسات أساسا العمل والقانون الجنائي. خبرة سابقة في شركة قانونية وعملت لدى شركة الدخيل للحجاج.</p>
		<p> - <strong> الأستاذ حمزة الجهني: </strong> حاصل على درجة البكالوريوس في القانون من جامعة الملك عبد العزيز. الممارسات بشكل رئيسي قانون العمل والأسرة. كان لديه دورات تدريبية في الثقافة القانونية ومهارات التحقيق.</p>
		<p> - <strong> الأستاذ عبدالرحمن الغامدي: </strong>حاصل على درجة البكالوريوس في القانون من جامعة الملك عبد العزيز. الممارسات أساسا المدنية وقانون العمل. كان لديه دورة تدريبية في إدارة الحالات. </p>
		<p> - <strong>السيد ياسر الحلواني: </strong>حاصل على درجة البكالوريوس في القانون من جامعة الملك عبد العزيز. الممارسات بشكل رئيسي في قانون العمل والقانون المدني والأسرة. خبرة سابقة في مجلة المدينة وشركة محمد يوسف الناغي. </p>
		<p> - <strong> السيد عبد الله سقا:</strong> حاصل على درجة البكالوريوس في القانون مع مرتبة الشرف من جامعة سيتي لندن. الممارسات أساسا العمل والقضايا المدنية. مستشار قانوني ومستشار </p>
		<p></p>
	<div class="row">

		<?php foreach ($paged_lawyers as $lawyers_key => $lawyers_val) : ?>

		<div class="col-md-6 col-sm-6 col-xs-12">

			<div class="manager-resumes-item">

				<div class="manager-content">

					<!-- <a href="resume.html"><img class="resume-thumb" src="assets/img/jobs/avatar-1.jpg" alt=""></a> -->

					<div class="manager-info">

						<div class="manager-name">

							<h4><a href="#"><?=$lawyers_val->name?></a></h4>

							<h5><?=$lawyers_val->specialization?></h5>

						</div>	

						<!-- <div class="manager-meta">

						<span class="location"><i class="ti-location-pin"></i> Cupertino, CA, USA</span>

						</div> -->

					</div>

				</div>

			<!-- <div class="item-body">

				<div class="about-me about-me-less">

					<p><strong>Pellentesque habitant morbi tristique</strong> senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. <em>Aenean ultricies mi vitae est.</em> Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, <code>commodo vitae</code>, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. <a href="#">Donec non enim</a> in turpis pulvinar facilisis. Ut felis.</p>



					<blockquote><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue. Ut a est eget ligula molestie gravida. Curabitur massa. Donec eleifend, libero at sagittis mollis, tellus est malesuada tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est.</p></blockquote>

				</div>

				<div class="tag-list">

					<a href="javascript:void(0);" class="read-more show-link"><span>Read More <i class="fa fa-angle-double-down" aria-hidden="true"></i></span></a>

					<a href="javascript:void(0);" class="read-less show-link"><span>Read Less <i class="fa fa-angle-double-up" aria-hidden="true"></i></span></a>

				</div>

			</div> -->

			</div>

		</div>

		<?php endforeach; ?>

	<div class="clearfix"></div>

	</div>

	</div>

</div>



<script>

    $(document).ready(function () {

        $('.item-body .read-less').hide();

        $('.item-body .read-more').click(function () {

            $(this).hide();

            $(this).parent().find('.read-less').show();

            $(this).parent().parent().find('.about-me').addClass('about-me-more');

            $(this).parent().parent().find('.about-me').removeClass('about-me-less');

        });



        $('.item-body .read-less').click(function () {

            $(this).hide();

            $(this).parent().find('.read-more').show();

            $(this).parent().parent().find('.about-me').addClass('about-me-less');

            $(this).parent().parent().find('.about-me').removeClass('about-me-more');

        });

    });

</script>



