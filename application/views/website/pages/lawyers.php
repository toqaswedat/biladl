<div id="content">
	<div class="container">
		<h2 class="section-title">Biladl Lawyers<h2>
		<div class="dotted-border">
    		<div class="dotted-line"></div>
    		<div class="dotted-line"></div>
    		<div class="dotted-line"></div>
		</div>
		<p> - Mr. Khalid Baghdadi: The Executive director and legal advisor. Mr. Khalid holds a master’s degree in commercial law and Arbitration from Gulf University n Bahrain. Previous  experience in Abdulateef Jameel and Mohammed Yousef Naghi.</p>
		<p> - Mr. Abdullah Al-Johani: Holds a bachelor degree of laws from King Abdulaziz University. Practices mainly labour and civil law. Previous experience at the administrative court of  appeal for a period of four years. </p>
		<p> - Mr. Abdulaziz Baghdadi: holds a bachelor degree of laws from Al-Sharjah University. Practices mainly labour, criminal, civil and family law. </p>
		<p> - Mr. Ahmed Faraj: Holds a bachelor degree of laws from Um Al-Qura University. Practices mainly labour and Criminal law. Previous experience at a legal firm and worked for     Al-Dakhel Pilgrim Company.</p>
		<p> - Mr. Hamza Al-Johani: holds a bachelor degree of laws from King Abdulaziz University. Practices mainly labour and family law. Had Training courses in legal culture and investigation  skills.</p>
		<p> - Mr. Abdulrahman S. Al-Ghamdi: Holds a bachelor degree of laws form King Abdulaziz University. Practices mainly civil and labour law. Had a training course in Case Management. </p>
		<p> - Mr. Yasser Halawani: Holds a bachelor degree of law from King Abdulaziz University. Practices mainly in labour, civil and family law. Previous experience at Al-Madinah journal and  Mohammed Yousef Al-Naghi Company. </p>
		<p> - Mr. Abdullah Saqa: Holds a bachelor degree of laws with Honors from City University London. Practices mainly labour and civil cases. Contract and Legal Advisor. </p>
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
							<p><?=$lawyers_val->specialization?></p>
						</div>	
						<!-- <div class="manager-meta">
						<span class="location"><i class="ti-location-pin"></i> Cupertino, CA, USA</span>
						</div> -->
					</div>
				</div>
			
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

