<section class="text-left section-40 section-md-60">
          <div class="inset-lg-left-45 inset-lg-right-45 inset-xl-left-130 inset-xl-right-85">
            <div class="shell-wide shell-wide-custom">
              <div class="range range-xs-center range-lg-right range-xl-justify">
				<div class="cell-md-12 text-center">
					<h3 class="text-primary">Danh Mục Tăng Trưởng</h3>
                    <ul class="list list-inline list-inline-dashed list-inline-20 text-gray-lighter">
                      <li>2 days ago</li>
                      <li><span>by <a class="text-bermuda" href="#">Diana Hawkins</a></span></li>
                      <li><a class="text-gray-lighter" href="#comments">12 Comments</a></li>
                    </ul>
				</div>
				<div class="offset-top-30">
					<table id="tbheader" width="100%" cellspacing="0" border="1" >
						<tr>
							<?php 
							$n = count($titleYear);
							for ($i = 0; $i < $n; $i++) { 
								if ($i == $n -1) {
									$colspan = 'colspan="3"';
								} else {
									$colspan = '';
								}
							?>
								<th <?=$colspan?>><?=$titleYear[$i]?></th>
							<?php } ?>
						</tr>
						
					</table>
				</div>
				
				<div class="clear"></div>
				
                <div class="cell-sm-10 cell-md-8 cell-xl-7">
                  <div class="inset-md-right-35 inset-xl-right-0">
                    <div class="offset-top-60 offset-md-top-90">
                      <hr class="divider hr-xs-left-0 bg-bermuda">
                      <div class="offset-top-15">
                        <h5 class="text-center text-xs-left">Author</h5>
                      </div>
                    </div>
                    <div class="offset-top-30">
                      <!-- Unit-->
                      <div class="unit unit-xs unit-xs-horizontal">
                        <div class="unit-left"><img class="img-circle img-responsive center-block" src="<?=url_tmpl();?>images/users/user-diana-hawkins-160x160.jpg" width="160" height="160" alt=""></div>
                        <div class="unit-body">
                          <h6 class="text-center text-xs-left"><a href="#">Diana Hawkins</a></h6>
                          <div class="offset-top-15">
                            <p>I am a professional blogger interested in everything taking place in cyberspace. I am running this website and try my best to make it a better place to visit. I post only the articles that are related to the topic and thoroughly analyze all visitors’ comments to cater to their needs better.</p>
                            <ul class="list-inline list-inline-2 list-primary offset-top-15">
                              <li><a class="icon icon-xs icon-circle fa fa-facebook text-gray-lighter" href="#"></a></li>
                              <li><a class="icon icon-xs icon-circle fa fa-twitter text-gray-lighter" href="#"></a></li>
                              <li><a class="icon icon-xs icon-circle fa fa-pinterest-p text-gray-lighter" href="#"></a></li>
                              <li><a class="icon icon-xs icon-circle fa fa-vimeo text-gray-lighter" href="#"></a></li>
                              <li><a class="icon icon-xs icon-circle fa fa-google text-gray-lighter" href="#"></a></li>
                              <li><a class="icon icon-xs icon-circle fa fa-rss text-gray-lighter" href="#"></a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="offset-top-60 offset-md-top-90">
                      <hr class="divider hr-left-0 bg-bermuda">
                      <div class="offset-top-15">
                        <h5>Comments</h5>
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
                        <h5>Send a Comment</h5>
                      </div>
                      <div class="offset-top-15">
                        <!-- RD Mailform-->
                        <form class="rd-mailform text-left" data-form-output="form-output-global" data-form-type="contact" method="post" action="bat/rd-mailform.php">
                          <div class="range range-xs-center">
                            <div class="cell-sm-6">
                              <div class="form-group form-group-outside">
                                <label class="form-label form-label-outside" for="contact-first-name">First Name</label>
                                <input class="form-control" id="contact-first-name" type="text" name="firstName" data-constraints="@Required">
                              </div>
                            </div>
                            <div class="cell-sm-6 offset-top-10 offset-sm-top-0">
                              <div class="form-group form-group-outside">
                                <label class="form-label form-label-outside" for="contact-last-name">Last Name</label>
                                <input class="form-control" id="contact-last-name" type="text" name="lastName" data-constraints="@Required">
                              </div>
                            </div>
                            <div class="cell-sm-6 offset-top-10">
                              <div class="form-group form-group-outside">
                                <label class="form-label form-label-outside" for="contact-email">E-mail</label>
                                <input class="form-control" id="contact-email" type="text" name="email" data-constraints="@Email @Required">
                              </div>
                            </div>
                            <div class="cell-sm-6 offset-top-10">
                              <div class="form-group form-group-outside">
                                <label class="form-label form-label-outside" for="contact-phone">Phone</label>
                                <input class="form-control" id="contact-phone" type="text" name="phone" data-constraints="@Numeric @Required">
                              </div>
                            </div>
                            <div class="cell-sm-12 offset-top-10">
                              <div class="form-group form-group-outside">
                                <label class="form-label form-label-outside" for="contact-message">Message</label>
                                <textarea class="form-control" id="contact-message" name="message" data-constraints="@Required"></textarea>
                              </div>
                            </div>
                          </div>
                          <div class="text-center text-sm-left offset-top-20">
                            <button class="btn btn-primary" type="submit">send</button>
                          </div>
                        </form>
                      </div>
                    </div>
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