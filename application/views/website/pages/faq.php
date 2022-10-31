<div id="content">
	<div class="container">
		<div class="row">
			<h2 class="product-title text-center">FAQs</h2>
			<hr>
			 <div class="col-md-8 center-div">
				<div class="panel-group" id="accordion">
				<?php $act="in"; foreach ($paged_faqs as $faq_key => $faq_val) : ?>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#co<?=$faq_key;?>">
									<?=$faq_val->title?>
								</a>
							</h4>
						</div>
						<div id="co<?=$faq_key;?>" class="panel-collapse collapse <?=$act;?>">
							<div class="panel-body">
								<p>
									<?=$faq_val->description?>
								</p>								
							</div>
						</div>
					</div>
					<?php $act=""; endforeach; ?>			 	
				</div>
				<div class="clearfix"></div>			
				<?php if($total_pages>1): ?>
				<ul class="pagination  pull-right">
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

			<div class="col-md-12 content">
				<h3>Is the Saudi worker holding a fixed-term or indefinite contract and can his fixed-term contract
become an indefinite period?</h3>
<p>The Saudi worker's contract per may be indefinite or fixed by stating that in the contract of
employment. Furthermore, the contract of employment could be fixed and then changed to indefinite
according to the law in the following cases: The first case: if the parties to the contract continued to
perform the contract after the set period. The second case: if the contract is renewed for three
consecutive times or the original contract period with the renewal period is four years whichever is less
and the parties continued to implement it.</p>

 <h3>Can the non-Saudi worker contract be indefinite?</h3>

<p>The contract of employment of the non-Saudi worker cannot be indefinite; in case the contract of
employment does not state the period of contract of employment, the duration of the worker's license
shall be taken for the duration of the employment contract.</p>
<br>
<h4>Termination of employment contract before completing its term.</h4>
<hr>
<p>The fixed term contract terminates when its term expires or by the parties’ consent
provided that the employee gives his consent in writing in accordance with Article 74
of the Labor Law unless the contract is terminated under any of the cases set out in
Article 74 of the Labor Law or by the parties under Article 80 or 81 of the Law as the
case may be.</p>
<p>If termination is not made in accordance with the provisions of any of the above
articles and is made without good reason, compensation shall be given for
terminating the fixed term contract earlier without legal ground as set out in Article
77 of the labor Law unless the contract provides for a specific compensation for
terminating the contract by either party without good reason. The wronged party due
to the contract termination deserves a compensation as follows:</p>
<p>
The pay of remaining period of the contract term, if it is a fixed term contract.
Compensation shall in no case be less than two months’ salary of the employee. In
case that the legality of termination reason is disputed, the labor authorities shall
decide the legality or illegality of the reason​
</p>
<br>
<h4>What are the types of complaints, which could be provided by the staff member to the employer?</h4>
<hr>
<p>some types of complaints:
</p>

<ul class="bil-list">
<li>Delay of salaries (3 months and more)</li>
<li>Assigned to different work on the nature of the work agreed upon in the</li>
contract signed between the two parties</li>
<li>Abuse</li>
<li>Lack of employee housing</li>
<li>Contrary to one of the conditions for the Decade</li>
</ul>

<br>
<h4>Can the employer keep the employee's passport?</h4>
<hr>
<p>​No employer may keep the passport of non-Saudi employee. If the employee requests the employer
to keep his passport, he shall sign a written acknowledgment in Arabic and in the employee's language
in the relevant form set out in the Regulation (Annex 2) to indicate that the employer has received the
employee's passport and the date of receipt.
</p>

<br>
<h4>Can the employer Decrease employee’s salary anytime?</h4>
<hr>
<p>​The employee's salary may not be decreased without his written consent.
</p>

<br>
<h4>Granting annual travel ticket:</h4>
<hr>
<p>Annual travel tickets are governed by the agreement between the employer and the employee and
the employer's approved regulations. If the job contract associates the employee's right to the travel
ticket value with taking the leave, the employee shall travel to deserve the travel ticket compensation
unless his job contract provides otherwise.
</p>

<br>
<h4>Responsibility for Residence, work license and service (sponsorship) transfer fees.</h4>
<hr>
<p>Pursuant to Article 40 of the Labor Law, the employer shall incur the recruitment of expatriate
employee, residence and work licenses and their renewal fees and any associated delay fines. Moreover,
the employer shall incur the employee's service transfer to him. This provision shall supersede any
provision to the contrary in any agreement or contract.
</p>

<br>
<h4>Is the breaks counted in the actual working hours?</h4>
<hr>
<p>According to Article 101 of the Labor Law, breaks taken for rest, prayer and lunch breaks are not
counted in the actual working hours. Working hours and breaks are organized during the day such that
no employee works more than five consecutive hours without a break not less than half an hour once
during the total working hours for rest, prayer and having food and such that the employee does not
stay at the workplace more than 12 hours per day.
</p>


<br>
<h4>Maximum hours of overtime:</h4>
<hr>
<p>Employee may be employed overtime according to the work requirements but within the limits
provided for by the Law for the maximum working hours of overtime hours by 720 hours a year.
Pursuant to Article 107 of the Law, the employer must pay for overtime at the hourly rate (based on the
total pay per working hour) plus %50 of basic salary.
</p>

<br>
<h4>What is the legal period in which the worker is entitled to claim their legal rights from their
employer?</h4>
<hr>
<p>No lawsuit may be brought before the labor authorities concerning a claim by one of the parties to
the labor relationship, to one of the rights provided for in this Law or arising from the contract of
employment after 12 months from the date of termination of the employment relationship.
</p>


<!-- 
<div class="row m-b-20">
<div class="col-md-6">
<h4>Family matters</h4>
<p>Do you have any disagreements between members of your family? </p>
</div>

<div class="col-md-6">
<h4>Evictions</h4>
<p>Are you being forced out of the place where you live?  Even after you have fulfilled all your obligations namely not in arrears of rent </p>
</div>
</div>

<div class="row m-b-20">
<div class="col-md-6">
<h4>Employment issues</h4>
<p>Are there issues between you and co-workers or management at work?  </p>


<p>We  can assist you in streamlining all your employment matters especially in your relationships with your employer and employees </p>

<code>Making the Workplace full of peace and harmony </code>
</div>



<div class="col-md-6">
<h4>Contract matters</h4>

<p>Do you feel you have been treated unfairly by somebody that has sold you something?  Find out more by sending us your specific issues </p>
</div>
</div>

<div class="row m-b-20">
<div class="col-md-6">
<h4>Buying a car need not be a nightmare anymore </h4>

<p>Many an unsuspecting buyer is sold a car with a preexisting problem which surfaces after a few months and due to high legal costs they are forced to Repair the Car themselves whilst BILADL can and will get the Seller to Honor the sale </p>


<h4>Impact Litigation</h4>
<p>Do you have a legal case that could affect the lives of many In your country and in your environment . Can you get all the proof so we can assess the situation to ensure there is no prejudice or damage to country and community 
</p>
<br><br>
<code>Let's make Happy communities </code>
</div>
<div class="col-md-6">
<h4>Criminal cases</h4>
<p>Have you been wrongfully accused of a crime and need the services of a lawyer?  Biladl is committed to be Your Guardian Angel </p>
</div>
</div>
<div class="m-b-20">
<h4>How do I get In Touch in time of Problem There are many ways to get in touch …</h4>

<p> Biladl tries to make it easy for you to get help with your legal problems. You can contact us by HOTLINE  or through the App / website or come visit us at a branch if you fail to make contact online </p>
<br>
<h4>Evictions</h4>

<p>We provide LegalAdvizor if you have been illegally forced out of your property or rented accommodation. We also help with other cases related to the ownership of property.
For example:</p>

<ul class="bil-list">
<li>You have been evicted without a court order or notice.</li>
<li>You have cancelled your lease agreement and your landlord refuses to pay back your deposit.</li>
<li>The title deed for your property is transferred to someone else.</li>
<li>The owner of your property has sold the property to you and someone else too</li>
</ul>

<code>We want to make you feel Peace in your Mind </code>

<h4 class="m-t-20">Employment issues</h4>

<p>Conflicts at work can take many forms. It might be another person with a grievance against you, a problem between you and a manager or a conflict between you and another co-worker.</p>

<strong>For example:</strong>

<ul class="bil-list">
<li>You have been fired from your work without any procedure or notice.</li>
<li>You have applied for your end of leave pay or pension from your employer but nothing has happened.</li>
<li>Your employer didn't register you for social services from your salary but wasn’t paying it to the Department of Labour.</li>
<li>Your employer hasn’t paid you your salary.</li>
<li>You have been retrenched and promised benefits within 3 months but nothing has happened.</li>
 </li>
</ul>
<h3>BILADL SA grants</h3>
<h4>LEGAL AID ASSISTANCE</h4>

<ul class="bil-list">
<li>Legal representation in Labour and Labour Appeal Courts.</li>
<li>Assistance workers in finalising their rights under the Labour Relations Conditions and legislative efforts </li>
<li>Assistance to BILADL clients to enforce Commission for Conciliation, Mediation and Arbitration (CCMA) awards except where there is no prospect of recovery.</li>
</ul>
<p>Biladl is also to further provide for legal assistance and advice in non-litigious forms of dispute resolution. When arrangements are made to implement this provision, stakeholders will be advised by an Biladl SA Notice </p>




 
<h4>What you can do⁉️</h4>
<p>If you have an employment or labor issue, we suggest that you contact your nearest labor office office of the region and register your complaint so we can monitor the response to ensure it's solvable If this process fails and the Labor Ministry  recommends assistance or representation we will assist with the case to resolve
</p>

<h4>Contract issues</h4>
<p>We may provide legal aid if you are experiencing problems relating to a contract or an agreement between you and another person.</p>
<p>You enter into a contract whenever you buy something, or order or pay for a service. When you have entered into a contract, you and the person or business you’ve contracted must follow the terms that are in it. You are also protected from unfair terms in contracts or terms that try to take away your legal rights.
</p>
<strong>Examples of issues arising out of contracts:</strong>

<ul class="bil-list">
<li>You want to sue someone for not doing their job properly</li>
<li>You bought something from someone but find out later it was stolen item </li>
<li>You bought something from someone who has been liquidated and now the liquidator wants the goods back</li>
<li>Something you bought or are renting is damaged or doesn’t work like it should so you seem a refund </li>
</ul>

<strong>Some of the common law offences covered by Biladl by discretion include :</strong>
<ul class="bil-list">
<li>Abduction</li>
<li>Arson</li>
<li>Bigamy</li>
<li>Fraud</li>
<li>Incest</li>
<li>Housebreaking</li>
<li>Indecent assault</li>
<li>Public Violence</li>
<li>Murder</li>
<li>Rape</li>
<li>Robbery</li>
<li>Sedition</li>
<li>Treason</li>
</ul>

<strong>Some of the statutory offences covered by BILADL include cases relating to:</strong>

<ul class="bil-list">
<li>Administration of justice</li>
<li>Animal and nature conservation</li>
<li>Children</li>
<li><li>Corruption</li>
<li>Counterfeiting currency</li>
<li>Dealing in unwrought precious metals and uncut gemstones</li>
<li>Escaping from custody and/or obstructing the policev</li>
<li>Vehicle theft</li>
<li>Witchcraft</li>
<li>And any attempt to commit the above.</li>
<li>Administering poison or other noxious substances</li></li></li>
<li>Assault (including common assault)</li></li>
<li>Bribery</li>
<li>Compounding</li>
<li>Defeating and/or obstructing the ends of justice</li>
<li>Extortion</li>
<li>Forgery and/or uttering</li>
<li>Kidnapping</li>
<li>Malicious injury to property</li>
<li>Receiving stolen property</li>
<li>Theft (including shoplifting)</li>
<li>Trespass</li>
<li>Unnatural sexual offences (including bestiality)</li>
<li>Persons with mental disabilities</li>
</ul>

<p>Any attempt to commit any of these listed statutory offences
Legal aid is not necessarily available for criminal defamation, public indecency and contempt of court. JCEs have a general discretion to grant legal aid in these cases where resources permit and where the Heads of Offices is convinced that the accused will experience substantial injustice if not legally represented.
</p>

<strong>Some examples of cases we assist with:</strong>

<ul class="bil-list">
<li>You want to appeal a conviction or sentence</li>
<li>You are being abused by other inmates in prison</li>
<li>You have been wrongfully arrested or assaulted by the police</li>
<li>Legal representation to section 204 witnesses</li>
<li>Legal representation in extradition cases</li>
</ul>

<p>All Matters not listed as included are excluded from legal aid subject to the Heads of Offices discretion.</p>



<strong>Matters not covered include but are not limited to:</strong>

<ul class="bil-list">
<li>Criminal defamation</li>
<li>Public indecency</li>
<li>Contempt of court</li>
<li>Traffic Offences</li>
<li>Failure to render tax returns</li>
<li>Inquest matters</li>
</ul>
<strong>Heads of Offices discretion: Where an offence is not listed as INCLUDED, discretion to provide legal aid  where substantial injustice would otherwise result taking into account the following factors:</strong>

<p>The Simplicity or complexity of the case in law and in fact, including imposition of sentence
The gravity of the case, which depends on the nature of the charge against accused and possible consequences of conviction</p>
</div> -->
			</div>
		</div>
	</div>
</div>
