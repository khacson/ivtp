<style>
.user_info-container {
    background-image: url('<?=base_url()?>files/user/success.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    border-radius: 5px;
	margin-bottom: 30px !important;
	position: relative;
	overflow: hidden;
}
.user_info-container:hover .chatbtn{
	top: calc(50% - 30px);
}
.user_info-container:hover .user_info{
	background: rgba(19, 127, 221, 0.6);
}
.user_info {
    background: rgba(19, 127, 221, 0.85);
    border-radius: 5px;
    color: #f7f8f9;
    overflow: hidden;
    padding: 10px;
	transition: all ease 0.5s;
}
.user_info .user_img {
    border-radius: 50%;
    display: block;
    height: 80px;
    margin: auto;
    width: 80px;
	border: 2px solid #ccc;
}
.user_info p{
	margin: 5px 0;
	font-size: 13px;
}
.user_info p.username{
	font-weight: bold;
	font-size: 14px;
	text-align: center;
}
.chatbtn {
    background-color: #442a74;
    border: 2px solid #fff;
    border-radius: 50%;
    display: block;
    height: 60px;
    position: absolute;
    left: 77%;
    top: -60px;
    width: 60px;
	transition: all ease 0.5s;
}
.chatbtn::before {
    content: "Chat";
    font-size: 18px;
    left: 10px;
    position: absolute;
    top: 16px;
    width: 50px;
	color: #fff;
}
.views{
	min-height: 40px;
}
</style>
<section class="text-left section-40 section-md-60">
          <div class="inset-lg-left-45 inset-lg-right-45 inset-xl-left-130 inset-xl-right-85">
            <div class="shell-wide shell-wide-custom">
              <div class="range range-xs-center range-lg-right range-xl-justify">
                <div class="cell-sm-10 cell-md-8 cell-xl-7">
                  <div class="inset-md-right-35 inset-xl-right-0">
                    <h3 class="text-primary text-center">Tổ Tư Vấn Độc Lập</h3>
                    <div class="offset-top-40 range">
					<?php foreach ($userList as $item) { ?>
						<div class="cell-md-6">
							<a href="<?=base_url()?>tu-van/dt<?=$item->id?>">
								<div class="user_info-container">
									<div class="user_info">
										<img class="user_img" src="<?=base_url()?>files/user/<?=$item->signature?>">
										<p class="username"><?=$item->fullname?></p>
										<!--<p>ID: <?=$item->username?></p>-->
										<p>Trình độ: <?=$item->level?></p>
										<p>Bằng cấp: <?=$item->degree?></p>
										<p>Kinh Nghiệm: <?=$item->experience?></p>
										<p class="views">Quan điểm: <?=$item->views?></p>
									</div>
									<span class="chatbtn" href="javascript:;"></span>
								</div>
							</a>
						</div>
					<?php } ?>
                    </div>
                  </div>
                </div>
                <div class="cell-sm-10 cell-md-4 offset-top-90 offset-md-top-0">
                  <div class="inset-md-left-30">
                    <!-- Aside-->
                    <aside class="text-left inset-xl-right-50">
                      <!-- Recent Posts-->
                      <div class="">
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