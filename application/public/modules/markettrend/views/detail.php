<section class="text-left section-40 section-md-60">
          <div class="inset-lg-left-45 inset-lg-right-45 inset-xl-left-130 inset-xl-right-85">
            <div class="shell-wide shell-wide-custom">
              <div class="range range-xs-center range-lg-right range-xl-justify">
                <div class="cell-sm-10 cell-md-8 cell-xl-7">
                  <div class="inset-md-right-35 inset-xl-right-0">
                    <h3 class="text-primary"><?=$finds->title;?></h3>
                    <ul class="list list-inline list-inline-dashed list-inline-20 text-gray-lighter offset-top-20">
                      <li><i class="fa fa-calendar icon icon-normal icon-sm font14" aria-hidden="true"></i>
						<span class="text-middle inset-left-10 text-italic"><?=date('d/m/Y',strtotime($finds->datecreate));?> </span></li>
               
                      <li><i class="fa fa-comment-o icon icon-normal icon-sm font14" aria-hidden="true"></i><a class="text-gray-lighter" href="#"> 0 Bình luận</a></li>
                    </ul>
                    <div class="offset-top-30"><img class="img-responsive center-block" src="<?=base_url();?>files/markettrend/<?=$finds->image;?>" width="960" height="550" alt=""></div>
                    <div class="offset-top-30">
						<?=$finds->description_long;?>
                    </div>
                    <div class="offset-top-60 offset-md-top-90">
                      <hr class="divider hr-left-0 bg-bermuda">
                      <div class="offset-top-15">
                        <h5>Bình luận</h5>
                      </div>
                    </div>
                    <div class="offset-top-30">
                      <!-- Unit-->
                      <div class="unit unit-horizontal unit-spacing-sm">
                        <div class="unit-left"><img class="img-circle img-responsive center-block" src="<?=url_tmpl();?>images/users/user-ryan-hayes-80x80.jpg" width="80" height="80" alt=""></div>
                        <div class="unit-body">
                          <h6><a href="#">Ryan Hayes</a></h6>
                          <div class="offset-top-10 offset-md-top-15">
                            <p class="text-italic text-gray-lighter">September 21, 2016 at 5:32pm</p>
                          </div>
                          <div class="offset-top-10">
                            <p>Thanks a lot for such an interesting article! I have recently visited your mall. I must say, it was an unforgettable experience.</p>
                          </div>
                          <div class="offset-top-10"><span class="icon icon-sm fa fa-reply text-bermuda text-middle"></span><span class="text-middle text-bermuda inset-left-5"><a class="text-bermuda" href="#">Reply</a></span></div>
                        </div>
                      </div>
                      <div class="offset-top-30 inset-left-35 inset-xs-left-50 inset-lg-left-115" id="comments">
                        <!-- Unit-->
                        <div class="unit unit-horizontal unit-spacing-sm">
                          <div class="unit-left"><img class="img-circle img-responsive center-block" src="<?=url_tmpl();?>images/users/user-diana-hawkins-80x80.jpg" width="80" height="80" alt=""></div>
                          <div class="unit-body">
                            <h6><a href="#">Diana Hawkins</a></h6>
                            <div class="offset-top-10 offset-md-top-15">
                              <p class="text-italic text-gray-lighter">September 21, 2016 at 5:40pm</p>
                            </div>
                            <div class="offset-top-10">
                              <p>Thank you!</p>
                            </div>
                            <div class="offset-top-10"><span class="icon icon-sm fa fa-reply text-bermuda text-middle"></span><span class="text-middle text-bermuda inset-left-5"><a class="text-bermuda" href="#">Reply</a></span></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="offset-top-60 offset-md-top-90">
                      <hr class="divider hr-left-0 bg-bermuda">
                      <div class="offset-top-15">
                        <h5>Gửi bình luận</h5>
                      </div>
                      <div class="offset-top-15">
                        <!-- RD Mailform-->
                        <form class="rd-mailform text-left" data-form-output="form-output-global" data-form-type="contact" method="post" action="bat/rd-mailform.php">
                          <div class="range range-xs-center">
                            <div class="cell-sm-6">
                              <div class="form-group form-group-outside">
                                <label class="form-label form-label-outside" for="contact-first-name">Họ tên</label>
                                <input class="form-control" id="fullname" type="text" name="fullname" >
                              </div>
                            </div>
                            <div class="cell-sm-6">
                              <div class="form-group form-group-outside">
                                <label class="form-label form-label-outside" for="contact-phone">Điện thoại</label>
                                <input class="form-control" id="phone" type="text" name="phone" >
                              </div>
                            </div>
                            <div class="cell-sm-12 offset-top-10">
                              <div class="form-group form-group-outside">
                                <label class="form-label form-label-outside" for="contact-message">Nội dung</label>
                                <textarea class="form-control" id="contact-message" name="message" data-constraints="@Required"></textarea>
                              </div>
                            </div>
                          </div>
                          <div class="text-center text-sm-left offset-top-20">
                            <button class="btn btn-primary" type="submit">Gửi</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="cell-sm-10 cell-md-4 offset-top-90 offset-md-top-0">
                  <div class="inset-md-left-30">
                    <!-- Aside-->
                    <aside class="text-left inset-xl-right-50">  
                      <!-- Categories-->
                      <div class="">
                        <hr class="divider hr-left-0 bg-bermuda">
                        <h5 class="offset-top-15">Danh mục</h5>
                      </div>
                      <div class="offset-top-30">
                        <div class="inset-xs-left-8">
                          <!-- List Marked-->
                          <ul class="list list-marked list-marked-icon">
								<?php foreach($catalogs as $item){?>
								<li><a href="<?=base_url();?>danh-muc-dau-tu/<?=$item->friendlyurl;?>.html"><?=$item->catalog_name;?></a></li>
								<?php }?>
                          </ul>
                        </div>
                      </div>
                      <!-- Recent Posts-->
                      <div class="offset-top-60 offset-md-top-90">
                        <hr class="divider hr-left-0 bg-bermuda">
                        <h5 class="offset-top-15">Bài viết mới</h5>
                      </div>
					  <!----------------------->
					  <?php foreach($listNew as $item){?>
                      <div class="offset-top-20">
                        <!-- Unit-->
                        <div class="unit unit-horizontal">
                          <div class="unit-left"><img class="img-responsive center-block" src="<?=base_url();?>files/markettrend/thumb/<?=$item->thumb;?>" width="100" height="100" alt=""></div>
                          <div class="unit-body">
                            <a href="<?=base_url();?>xu-huong-thi-truong/<?=$item->friendlyurl;?>-dt<?=$item->id;?>.html"><?=$item->title;?></a>
                            <div class="offset-top-10">
                              <!-- List Inline-->
                              <ul class="list-inline list-inline-dashed list-inline-12 text-gray text-italic p">
                                <li><i class="fa fa-calendar icon icon-normal icon-sm font12" aria-hidden="true"></i>
						<span class="text-middle inset-left-10 text-italic font12"><?=date('d/m/Y',strtotime($item->datecreate));?> </span></li>
                            
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
						<?php }?>
                     
                    </aside>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>