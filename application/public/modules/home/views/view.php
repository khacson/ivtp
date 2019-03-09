<div class="swiper-container-wrap">
        <div class="swiper-container swiper-slider" data-height="" data-min-height="300px" data-simulate-touch="false" data-autoplay="5000">
		   <!--S Slide-->
          <div class="swiper-wrapper">
			<?php foreach($slides as $item){?>
            <div class="swiper-slide" data-slide-bg="<?=base_url();?>files/slide/<?=$item->img;?>">
              <div class="swiper-slide-caption">
                <div class="inset-lg-left-35 inset-xl-left-125">
                  <div class="shell-wide shell-wide-custom">
                    <div class="range range-xs-center range-lg-left text-lg-left">
                      <div class="cell-sm-10 cell-lg-7">
                        <div class="text-big-84 text-italic font-monospace text-spacing-inverse-20 text-white"><?=$item->slide_name;?></div>
                        <div class="veil reveal-lg-inline-block offset-top-25 offset-sm-top-30">
                          <!--<hr class="divider divider-mod divider-58 bg-white">-->
                        </div>
                        <div class="reveal-inline-block text-top offset-top-10 offset-sm-top-15 inset-left-10">
                          <h4 class="text-white"><?=$item->description;?></h4>
                        </div>
                        <!--<div class="reveal-inline-block text-top inset-left-10">
                          <h1>70% OFF</h1>
                        </div>-->
						<?php if($item->url != '' && $item->url != '#'){?>
                        <div class="offset-top-20"><a class="btn btn-width-165 btn-primary" href="<?=$item->url;?>">Xem</a></div>
						<?php }?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php }?>
          </div>
		  <!--E Slide-->
          <div class="shell-wide shell-wide-custom">
            <div class="inset-lg-left-45 inset-xl-left-85">
              <div class="swiper-pagination swiper-pagination-bottom"></div>
            </div>
          </div>
        </div>
      </div>
      <main class="page-content">      
		<!--S Tin tuc-->
        <section class="section-80 section-md-20 bg-selago">
          <div class="inset-md-left-35 inset-xl-left-125 inset-md-right-35 inset-xl-right-125">
            <div class="shell-wide shell-wide-custom">
              <hr class="divider bg-bermuda">
              <div class="offset-top-20">
                <h3 class="text-primary">XU HƯỚNG THỊ TRƯỜNG</h3>
              </div>
              <div class="range range-xs-center range-lg-left text-left">
                <!--S Item 1-->
				<?php 
				foreach($markettrends as $item){
					$free = '';
					 if (!empty($item->free)) {
						 if ($memberLevel < 1) {
							 $free = ' <span class="free">Free</span>';
						 }
					 }
				?>
				<div class="cell-sm-10 cell-md-6 cell-lg-4 cell-xl-4">
                  <div class="post-box shadow-drop post-box-max-width-none reveal-block">
                    <div class="post-box-img-wrap"><a class="thumbnail-robben" href="<?=base_url();?>xu-huong-thi-truong/<?=$item->friendlyurl;?>-dt<?=$item->id;?>.html"><span class="thumbnail-robben-img-wrap post-box-top-radius"><img class="img-responsive center-block post-box-top-radius" src="<?=base_url();?>files/markettrend/thumb/<?=$item->thumb;?>" width="320" height="442" alt=""></span></a></div>
                    <div class="post-box-caption post-box-bottom-radius bg-white">
                      <h5 class="offset-top-15"><a href="<?=base_url();?>xu-huong-thi-truong/<?=$item->friendlyurl;?>-dt<?=$item->id;?>.html"><?=$item->title;?> <?=$free;?></a></h5>
                      <p class="offset-top-20">
						<?=strlen($item->description_sort) < 190 ? $item->description_sort : substr($item->description_sort, 0, 190).'...';?>
					  </p>
                      <ul class="list-inline list-inline-20 offset-top-22">
                        <li>
						<i class="fa fa-calendar icon icon-normal icon-sm font14" aria-hidden="true"></i>
						<span class="text-middle inset-left-10 text-italic"><?=date('d/m/Y',strtotime($item->dateupdate));?> </span></li>
                        <li><i class="fa fa-comment-o icon icon-normal icon-sm font14" aria-hidden="true"></i>
<span class="text-middle inset-left-10 text-italic p"><a class="text-gray-light" href="#"><?=$item->comment;?> Comments</a></span></li>
                      </ul>
                    </div>
                  </div>
                </div>
				<!--S Item 2-->
                <?php }?>
              </div><a class="btn btn-width-200 btn-primary offset-top-35 offset-md-top-65" href="<?=base_url();?>xu-huong-thi-truong.html">Xem tất cả</a>
            </div>
          </div>
        </section>
		<!--E Tin tuc-->
		
		<!-- Danh mục khuyến nghị IPro-->
        <section class="section-80 section-md-20 bg-selago" style="padding-top: 0;">
          <div class="inset-md-left-35 inset-xl-left-125 inset-md-right-35 inset-xl-right-125">
            <div class="shell-wide shell-wide-custom">
              <hr class="divider bg-bermuda">
              <div class="offset-top-20">
                <h3 class="text-primary">TRUNG TÂM PHÂN TÍCH</h3>
              </div>
              <div class="range range-xs-center range-lg-left text-left">
                <!--S Item 1-->
				<?php 
				foreach($investment as $item){
					$free = '';
					 if (!empty($item->free)) {
						 if ($memberLevel < 1) {
							 $free = ' <span class="free">Free</span>';
						 }
					 }
					
				?>
				<div class="cell-sm-10 cell-md-6 cell-lg-4 cell-xl-4">
                  <div class="post-box shadow-drop post-box-max-width-none reveal-block">
                    <div class="post-box-img-wrap"><a class="thumbnail-robben" href="<?=base_url();?>danh-muc-dau-tu/<?=$item->friendlyurl;?>-dt<?=$item->id;?>.html"><span class="thumbnail-robben-img-wrap post-box-top-radius"><img class="img-responsive center-block post-box-top-radius" src="<?=base_url();?>files/investment/thumb/<?=$item->thumb;?>" width="320" height="442" alt=""></span></a></div>
                    <div class="post-box-caption post-box-bottom-radius bg-white">
                      <h5 class="offset-top-15"><a href="<?=base_url();?>danh-muc-dau-tu/<?=$item->friendlyurl;?>-dt<?=$item->id;?>.html"><?=$item->title;?> <?=$free;?></a></h5>
                      <p class="offset-top-20">
						<?=strlen($item->description_sort) < 190 ? $item->description_sort : substr($item->description_sort, 0, 190).'...';?>
					  </p>
                      <ul class="list-inline list-inline-20 offset-top-22">
                        <li>
						<i class="fa fa-calendar icon icon-normal icon-sm font14" aria-hidden="true"></i>
						<span class="text-middle inset-left-10 text-italic"><?=date('d/m/Y',strtotime($item->dateupdate));?> </span></li>
                        <li><i class="fa fa-comment-o icon icon-normal icon-sm font14" aria-hidden="true"></i>
<span class="text-middle inset-left-10 text-italic p"><a class="text-gray-light" href="#"><?=$item->comment;?> Comments</a></span></li>
                      </ul>
                    </div>
                  </div>
                </div>
				<!--S Item 2-->
                <?php }?>
              </div><a class="btn btn-width-200 btn-primary offset-top-35 offset-md-top-65" href="<?=base_url();?>danh-muc-dau-tu/danh-muc-khuyen-nghi-ipro.html">Xem tất cả</a>
            </div>
          </div>
        </section>
		
        <section>
          <div class="rd-google-map-wrap">
            <div class="section-60 section-md-0 inset-left-15 inset-right-15 inset-md-left-0 inset-md-right-0">
              <div class="box-lg box-contacts bg-white text-left center-block shadow-drop">
                <hr class="divider hr-left-0 bg-bermuda">
                <div class="offset-top-15">
                  <h5>Liên hệ</h5>
                  <address class="contact-info offset-top-35 p">
                    <div class="unit unit-horizontal unit-spacing-xs">
                      <div class="unit-left ">
					  <i class="fa fa-map-marker icon-normal icon-sm text-primary" aria-hidden="true"></i>

					  </div>
                      <div class="unit-body"><a class="text-dove-gray" href="contacts.html"><?=$finds->address;?></a></div>
                    </div>
					<?php if(!empty($finds->work_time)){?>
                    <div class="unit unit-horizontal unit-spacing-xs offset-top-20">
                      <div class="unit-left">
						  <i class="fa fa-clock-o icon-normal icon-sm text-primary" aria-hidden="true"></i>
					  </div>
                      <div class="unit-body">
                        <p class="text-dove-gray"><?=$finds->work_time;?></p>
                      </div>
                    </div>
					<?php }?>
                    <div class="unit unit-horizontal unit-spacing-xs offset-top-20">
                      <div class="unit-left ">
                        <i class="fa fa-phone icon-normal icon-sm text-primary mtopa3 fleft" aria-hidden="true"></i>
                      </div>
                      <div class="unit-body"><a class="text-dove-gray" href="callto:#"><?=$finds->phone;?></a></div>
                    </div>
                    <div class="unit unit-horizontal unit-spacing-xs offset-top-20">
                      <div class="unit-left">
                          <i class="fa fa-envelope-o icon-normal icon-sm text-primary mtopa3 fleft" aria-hidden="true"></i>
                      </div>
                      <div class="unit-body"><a class="text-dove-gray" href="mailto:#"><?=$finds->email;?></a></div>
                    </div>
                  </address>
                </div>
              </div>
            </div>
			<div class="gmap-div">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5230.904660089!2d106.68667256754902!3d10.830382031137335!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528f783238157%3A0xf7ff9686d87c2f8c!2zMTA2LCAxMCDEkMaw4budbmcgU-G7kSAxNCwgcGjGsOG7nW5nIDUsIEfDsiBW4bqlcCwgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1531930166823&style=feature:all|element:labels|visibility:off" width="100%" height="600" frameborder="0" style="border:0; margin-top: -150px;" allowfullscreen></iframe>
				<div class="map-overplay"></div>
			</div>
          </div>
        </section>
      </main>