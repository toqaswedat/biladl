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
                        <div class="col-sm-4">
                            <div class="table">
                                <div class="title">
                                    <h3><?=$packVal->title?></h3>
                                </div>
                                <div class="pricing-header silver">
                                    <p class="price-value"> <sup>$</sup><?=$packVal->price?></p>
                                    <p class="price-quality text-black">/<?=$packVal->total_days?> DAYS</p>
                                </div>
                                 <ul class="description">
                                    <li><b>package type :</b> <?=$packVal->package_type?></li>
                                    <li style="">
                                        <a href="" class="btn  btn-default border" style="background:#f5f5f5"  data-toggle="modal" data-target="#<?=$packVal->price?>" >Details</a>
                                    </li>
                                </ul>
                                <a href="" class="btn btn-common btn-blue" >Get Started</a>
                            </div>
                        </div> 
                    <div id="<?=$packVal->price?>" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><?=$packVal->title?></h4>
                          </div>
                          <div class="modal-body">
                            <?=$packVal->description?>
                          </div>
                        </div>

                      </div>
                    </div>               
                            <?php endforeach; else :  ?>

                        <div class="col-sm-4">
                            <div class="table selected" id="active-tb">
                                <div class="title">
                                    <h3><?=$current_details->title?></h3>
                                </div>
                                <div class="pricing-header gold">
                                    <p class="price-value"> <sup>$</sup><?=$current_details->price?></p>
                                    <p class="price-quality text-black">/<?=$current_details->total_days?> DAYS</p>
                                </div>
                                <ul class="description">
                                    <li><b>package type :</b> <?=$current_details->package_type?></li>
                                    <li style="height:250px; ;width: 100%;"><b>Details :</b>
                                        <pre><?=$current_details->description?></pre>
                                    </li>
                                </ul>
                                <button class="btn btn-common gold"  data-toggle="modal" data-target="<?=$current_details->price?>" type="submit">Your Selected Plan    </button>
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