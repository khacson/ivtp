<section class="section-10 bg-selago">
<div class="shell">
  <ul class="list-inline list-inline-12 list-inline-icon p tleft breads">
	<li><a href="<?=base_url();?>trang-chu.html"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;Trang chủ </a></li>
	<li><i class="fa fa-angle-right" aria-hidden="true"></i> <a href="<?=base_url();?>danh-muc-tang-truong.html">Danh mục tăng trưởng</a></li>
	</li>
	<input id="uri" type="hidden" name="uri" value="" />
  </ul>
</div>
</section> 
<section class="text-left section-40 section-md-30">
          <div class="inset-lg-left-45 inset-lg-right-45 inset-xl-left-130 inset-xl-right-85">
            <div class="shell-wide shell-wide-custom">
              <div class="range range-xs-center range-lg-right range-xl-justify">
				<div class="cell-md-12 text-center">
					<h3 class="text-primary">Danh Mục Tăng Trưởng</h3>
                    <ul class="list list-inline list-inline-dashed list-inline-20 text-gray-lighter">
                      <li><?=date('d/m/Y', strtotime($info->datecreate))?></li>
                      <li><span>by <a class="text-bermuda" href="#"><?=$info->usercreate?></a></span></li>
					  
                      <li><a class="text-gray-lighter" href="#comments">
						<?=$commentCount?> bình luận
					  </a></li>
                    </ul>
				</div>
				<div class="offset-top-30 increasecatalog-table-detail">
					<table id="tbheader" width="100%" cellspacing="0" border="1" >
						<tr>
							<th>STT</th>
							<?php foreach ($titles as $title) { ?>
							<th><?=$title?></th>
							<?php } ?>
						</tr>
						<tbody id="grid-rows">
							<?php include 'list.php'; ?>
						</tbody>
					</table>
				</div>
				
				<div class="clear"></div>
				
                <div class="cell-sm-10 cell-md-8 cell-xl-7">
                  <div class="inset-md-right-35 inset-xl-right-0">
                    <?=$commentForm?>
					<?=$commentList?>
                  </div>
                </div>
                <div class="cell-sm-10 cell-md-4 offset-top-90">
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
								<li><a href="xuhuong.html">Dự báo xu hướng I-Pro</a></li>
								<li><a href="xuhuong.html">Đánh giá xu hướng CTCK</a></li>
                          </ul>
                        </div>
                      </div>
                      <!-- Recent Posts-->
                      <div class="offset-top-60 offset-md-top-90">
                        <hr class="divider hr-left-0 bg-bermuda">
                        <h5 class="offset-top-15">Recent Posts</h5>
                      </div>
                      <div class="offset-top-30">
                        <!-- Unit-->
                        <div class="unit unit-horizontal">
                          <div class="unit-left"><img class="img-responsive center-block" src="<?=url_tmpl();?>images/blog/post-04-80x80.jpg" width="80" height="80" alt=""></div>
                          <div class="unit-body">
                            <h6><a href="blog-post.html">Top 3 Reasons to Visit Audrey Mall at Any Season</a></h6>
                            <div class="offset-top-10">
                              <!-- List Inline-->
                              <ul class="list-inline list-inline-dashed list-inline-12 text-gray text-italic p">
                                <li>2 days ago</li>
                                <li><a class="text-bermuda" href="#">Articles</a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="offset-top-30">
                        <!-- Unit-->
                        <div class="unit unit-horizontal">
                          <div class="unit-left"><img class="img-responsive center-block" src="<?=url_tmpl();?>images/blog/post-05-80x80.jpg" width="80" height="80" alt=""></div>
                          <div class="unit-body">
                            <h6><a href="blog-post.html">Perfect Clothes to Wear When It’s Hot</a></h6>
                            <div class="offset-top-10">
                              <!-- List Inline-->
                              <ul class="list-inline list-inline-dashed list-inline-12 text-gray text-italic p">
                                <li>2 days ago</li>
                                <li><a class="text-bermuda" href="#">Articles</a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="offset-top-30">
                        <!-- Unit-->
                        <div class="unit unit-horizontal">
                          <div class="unit-left"><img class="img-responsive center-block" src="<?=url_tmpl();?>images/blog/post-06-80x80.jpg" width="80" height="80" alt=""></div>
                          <div class="unit-body">
                            <h6><a href="blog-post.html">Planning Your Weekend? Visit  Audrey Mall!</a></h6>
                            <div class="offset-top-10">
                              <!-- List Inline-->
                              <ul class="list-inline list-inline-dashed list-inline-12 text-gray text-italic p">
                                <li>2 days ago</li>
                                <li><a class="text-bermuda" href="#">Articles</a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                     
                    </aside>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>