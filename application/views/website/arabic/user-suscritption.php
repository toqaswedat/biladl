        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">

            <!-- Simple post content example. -->

            <div class="panel panel-default">

                <div class="panel-body">

                    <div class="pull-left">

                        <a href="#">

                            <img class="media-object img-circle" src="<?=base_url().$main_details->profile_pic;?>" width="50px" height="50px" style="margin-right:8px; margin-top:-5px;">

                        </a>

                    </div>

                    <h4><a href="#" style="text-decoration:none;"><strong>Subscrption</strong></a></h4>

                    <hr />

                    <div class="plans user">

                        <?php if(empty((array) $current_details)): ?>

                            <?php foreach ($all_packages as $key => $packVal) :  ?>

                        <div class="col-sm-12">

                            <div class="table">

                                <div class="title">

                                    <h3><?=$packVal->title_arbic?></h3>

                                </div>

                                <div class="pricing-header silver">

                                    <p class="price-value"> <sup>$</sup><?=$packVal->price?></p>

                                    <p class="price-quality text-black">/<?=$packVal->total_days?> أيام</p>

                                </div>

                                 <ul class="description">

                                    <li><b>نوع الحزمة :</b> <?=$packVal->package_type?></li>

                                    <li style="width: 100%;"><b>تفاصيل :</b><pre><?=$packVal->description?></pre></li>

                                </ul>

                                <button class="btn btn-common btn-blue" type="submit">Get Started</button>

                            </div>

                        </div>                

                            <?php endforeach; else :  ?>



                        <div class="col-sm-12">

                            <div class="table selected" id="active-tb">

                                <div class="title">

                                    <h3><?=$current_details->title_arbic?></h3>

                                </div>

                                <div class="pricing-header gold">

                                    <p class="price-value"> <sup>$</sup><?=$current_details->price?></p>

                                    <p class="price-quality text-black">/<?=$current_details->total_days?> أيام</p>

                                </div>

                                <ul class="description">

                                    <li><b>نوع الحزمة :</b> <?=$current_details->package_type_arbic?></li>

                                    <li style="width: 100%;"><b>تفاصيل :</b><pre><?=$current_details->description_arbic?></pre></li>

                                </ul>

                                <button class="btn btn-common gold" type="submit">Your Selected Plan    </button>

                            </div>

                        </div>

                         <?php endif;  ?>

                       

                    </div>

                </div>

            </div>

        </div>



    </div>

    </div>

</div>

</div>