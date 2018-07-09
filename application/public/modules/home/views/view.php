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
        <div class="swiper-aside-right hide">
          <ul class="list list-background-minsk list-0 text-center section-xs-top-60 section-sm-top-0">
            <?php foreach($cpTangs as $item){
				$des = $item->inc_des;
				$inc_des = round($des * 100,2);
				?>
			<li class="inset-xs-left-85 inset-xs-right-85 inset-sm-left-0 inset-sm-right-0">
				<a class="box-sm bg-primary reveal-block" href="<?=base_url();?>danh-muc-tang-truong/<?=$item->mcp;?>-dt<?=$item->id;?>.html">
					<span class="text-bold"><?=$item->mcp;?></span>
					<span class="text-white reveal-block"><?=$inc_des;?>%</span></a>
				</li>
			<?php }?>
          </ul>
        </div>
      </div>
      <main class="page-content">
	  
		<!-- S Nhung co phieu tang truong tot nhat-->
        <section class="section-20 hide">
          <div class="range range-condensed range-xs-middle range-xs-center range-md-justify list-inline-dashed-lg">
			<?php foreach($supperliers as $item){?>	
				<div class="cell-xs-5 cell-md-4 cell-lg-2"><a target="_blank" class="reveal-inline-block" href="<?=$item->url;?>"><img class="img-responsive center-block img-semi-transparent" src="<?=base_url();?>files/supperlier/<?=$item->img;?>" width="127" height="69" alt=""></a></div>
            <?php }?>
          </div>
        </section>
		<!-- E Nhung co phieu tang truong tot nhat-->
        <section class="section-80 bg-selago">
			<div class="shell-wide shell-wide-custom">
			  <hr class="divider bg-bermuda">
			  <div class="offset-top-20">
				<h3>Cổ phiếu tiềm năng</h3>
			  </div>
		  </div>
          <div class="range range-condensed range-xs-center bg-shark">
		    <?php if(isset($cps[0]->id)){?>
            <div class="cell-xs-6 cell-sm-6 cell-lg-3 inset-left-15 inset-right-15 inset-md-left-0 inset-md-right-0">
              <figure class="thumbnail-terry thumbnail-terry-modern"><a href="sale-single.html"><img width="480" height="360" src="<?=url_tmpl();?>images/pages/sales-01-480x360.jpg" alt=""></a>
                <figcaption class="text-left">
                  <div class="figcaption-caption">
                    <h4 class="thumbnail-terry-title text-spacing-40"><?=$cps[0]->mcp;?></h4>
                    <p class="thumbnail-terry-desc text-white-07 offset-top-5">Giá hiện tại: <?=number_format($cps[0]->curr_price);?></p>
					<p class="thumbnail-terry-desc text-white-07 offset-top-2">Giá mở cửa: <?=number_format($cps[0]->open_price);?></p>
					<?php 
						$des = $cps[0]->inc_des;
						$inc_des = round($des * 100,2);
						if($inc_des > 0){
							$inc_dess = "<span class='green'>".$inc_des."</span>";
						}
						else{
							$inc_dess = "<span class='red'>".$inc_des."</span>";
						}
					?>
					<p class="thumbnail-terry-desc text-white-07 offset-top-2">%Tăng/Giảm: <b><?=$inc_dess;?></b></p>
                  </div>
                  <div class="thumbnail-terry-btn-wrap text-md-right offset-top-10 offset-md-top-0"><a class="btn btn-thumbnail-terry btn-rect btn-icon btn-icon-right btn-primary" href="<?=base_url();?>danh-muc-tang-truong/<?=$cps[0]->mcp;?>-dt<?=$cps[0]->id;?>.html"><i class="icon icon-xs fa fa-angle-double-right" aria-hidden="true"></i>
 </span>Xem chi tiết</a></div>
                </figcaption>
              </figure>
            </div>
			<?php }?>
			<?php if(isset($cps[1]->id)){?>
            <div class="cell-xs-6 cell-sm-6 cell-lg-3 offset-top-40 offset-xs-top-0 inset-left-15 inset-right-15 inset-md-left-0 inset-md-right-0">
              <figure class="thumbnail-terry thumbnail-terry-modern"><a href="sale-single.html"><img width="480" height="360" src="<?=url_tmpl();?>images/pages/sales-02-480x360.jpg" alt=""></a>
                <figcaption class="text-left">
                  <div class="figcaption-caption">
                    <h4 class="thumbnail-terry-title text-spacing-40"><?=$cps[1]->mcp;?></h4>
                    <p class="thumbnail-terry-desc text-white-07 offset-top-5">Giá hiện tại: <?=number_format($cps[1]->curr_price);?></p>
					<p class="thumbnail-terry-desc text-white-07 offset-top-2">Giá mở cửa: <?=number_format($cps[1]->open_price);?></p>
					<?php 
						$des = $cps[1]->inc_des;
						$inc_des = round($des * 100,2);
						if($inc_des > 0){
							$inc_dess = "<span class='green'>".$inc_des."</span>";
						}
						else{
							$inc_dess = "<span class='red'>".$inc_des."</span>";
						}
					?>
					<p class="thumbnail-terry-desc text-white-07 offset-top-2">%Tăng/Giảm: <b><?=$inc_dess;?></b></p>
                  </div>
                  <div class="thumbnail-terry-btn-wrap text-md-right offset-top-10 offset-md-top-0"><a class="btn btn-thumbnail-terry btn-rect btn-icon btn-icon-right btn-primary" href="<?=base_url();?>danh-muc-tang-truong/<?=$cps[1]->mcp;?>-dt<?=$cps[1]->id;?>.html"><i class="icon icon-xs fa fa-angle-double-right" aria-hidden="true"></i>
 </span>Xem chi tiết</a></div>
                </figcaption>
              </figure>
            </div>
			<?php }?>
			<?php if(isset($cps[2]->id)){?>
            <div class="cell-xs-6 cell-sm-6 cell-lg-3 offset-top-40 offset-md-top-0 inset-left-15 inset-right-15 inset-md-left-0 inset-md-right-0">
              <figure class="thumbnail-terry thumbnail-terry-modern"><a href="sale-single.html"><img width="480" height="360" src="<?=url_tmpl();?>images/pages/sales-03-480x360.jpg" alt=""></a>
                <figcaption class="text-left">
                  <div class="figcaption-caption">
                    <h4 class="thumbnail-terry-title text-spacing-40"><?=$cps[2]->mcp;?></h4>
                    <p class="thumbnail-terry-desc text-white-07 offset-top-5">Giá hiện tại: <?=number_format($cps[2]->curr_price);?></p>
					<p class="thumbnail-terry-desc text-white-07 offset-top-2">Giá mở cửa: <?=number_format($cps[2]->open_price);?></p>
					<?php 
						$des = $cps[2]->inc_des;
						$inc_des = round($des * 100,2);
						if($inc_des > 0){
							$inc_dess = "<span class='green'>".$inc_des."</span>";
						}
						else{
							$inc_dess = "<span class='red'>".$inc_des."</span>";
						}
					?>
					<p class="thumbnail-terry-desc text-white-07 offset-top-2">%Tăng/Giảm: <b><?=$inc_dess;?></b></p>
                  </div>
                  <div class="thumbnail-terry-btn-wrap text-md-right offset-top-10 offset-md-top-0"><a class="btn btn-thumbnail-terry btn-rect btn-icon btn-icon-right btn-primary" href="<?=base_url();?>danh-muc-tang-truong/<?=$cps[2]->mcp;?>-dt<?=$cps[2]->id;?>.html"><i class="icon icon-xs fa fa-angle-double-right" aria-hidden="true"></i>
 </span>Xem chi tiết</a></div>
                </figcaption>
            </div>
			<?php }?>
			<?php if(isset($cps[3]->id)){?>
            <div class="cell-xs-6 cell-sm-6 cell-lg-3 offset-top-40 offset-md-top-0 inset-left-15 inset-right-15 inset-md-left-0 inset-md-right-0">
              <figure class="thumbnail-terry thumbnail-terry-modern"><a href="sale-single.html"><img width="480" height="360" src="<?=url_tmpl();?>images/pages/sales-04-480x360.jpg" alt=""></a>
                <figcaption class="text-left">
                  <div class="figcaption-caption">
                    <h4 class="thumbnail-terry-title text-spacing-40"><?=$cps[3]->mcp;?></h4>
                    <p class="thumbnail-terry-desc text-white-07 offset-top-5">Giá hiện tại: <?=number_format($cps[3]->curr_price);?></p>
					<p class="thumbnail-terry-desc text-white-07 offset-top-2">Giá mở cửa: <?=number_format($cps[3]->open_price);?></p>
					<?php 
						$des = $cps[3]->inc_des;
						$inc_des = round($des * 100,2);
						if($inc_des > 0){
							$inc_dess = "<span class='green'>".$inc_des."</span>";
						}
						else{
							$inc_dess = "<span class='red'>".$inc_des."</span>";
						}
					?>
					<p class="thumbnail-terry-desc text-white-07 offset-top-2">%Tăng/Giảm: <b><?=$inc_dess;?></b></p>
                  </div>
                  <div class="thumbnail-terry-btn-wrap text-md-right offset-top-10 offset-md-top-0"><a class="btn btn-thumbnail-terry btn-rect btn-icon btn-icon-right btn-primary" href="<?=base_url();?>danh-muc-tang-truong/<?=$cps[3]->mcp;?>-dt<?=$cps[3]->id;?>.html"><i class="icon icon-xs fa fa-angle-double-right" aria-hidden="true"></i>
 </span>Xem chi tiết</a></div>
                </figcaption>
              </figure>
            </div>
			<?php }?>
          </div>
        </section>
        
		<!--S Tin tuc-->
        <section class="section-80 section-md-20 bg-selago">
          <div class="inset-md-left-35 inset-xl-left-125 inset-md-right-35 inset-xl-right-125">
            <div class="shell-wide shell-wide-custom">
              <hr class="divider bg-bermuda">
              <div class="offset-top-20">
                <h3>Xu hướng thị trường</h3>
              </div>
              <div class="range range-xs-center range-lg-left text-left">
                <!--S Item 1-->
				<?php foreach($markettrends as $item){?>
				<div class="cell-sm-10 cell-md-6 cell-lg-4 cell-xl-5">
                  <div class="post-box shadow-drop post-box-max-width-none reveal-block">
                    <div class="post-box-img-wrap"><a class="thumbnail-robben" href="<?=base_url();?>xu-huong-thi-truong/<?=$item->friendlyurl;?>-dt<?=$item->id;?>.html"><span class="thumbnail-robben-img-wrap post-box-top-radius"><img class="img-responsive center-block post-box-top-radius" src="<?=base_url();?>files/markettrend/thumb/<?=$item->thumb;?>" width="320" height="442" alt=""></span></a></div>
                    <div class="post-box-caption post-box-bottom-radius bg-white">
                      <h5 class="offset-top-15"><a href="<?=base_url();?>xu-huong-thi-truong/<?=$item->friendlyurl;?>-dt<?=$item->id;?>.html"><?=$item->title;?></a></h5>
                      <p class="offset-top-20"><?=$item->description_sort;?></p>
                      <ul class="list-inline list-inline-20 offset-top-22">
                        <li>
						<i class="fa fa-calendar icon icon-normal icon-sm font14" aria-hidden="true"></i>
						<span class="text-middle inset-left-10 text-italic"><?=date('d/m/Y',strtotime($item->datecreate));?> </span></li>
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
            <div class="google-map-container" data-zoom="15" data-center="<?=$finds->address;?>, Việt nam" data-styles="[{&quot;featureType&quot;:&quot;landscape.natural&quot;,&quot;elementType&quot;:&quot;geometry.fill&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;on&quot;},{&quot;color&quot;:&quot;#e0efef&quot;}]},{&quot;featureType&quot;:&quot;poi&quot;,&quot;elementType&quot;:&quot;geometry.fill&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;on&quot;},{&quot;hue&quot;:&quot;#1900ff&quot;},{&quot;color&quot;:&quot;#c0e8e8&quot;}]},{&quot;featureType&quot;:&quot;road&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;lightness&quot;:100},{&quot;visibility&quot;:&quot;simplified&quot;}]},{&quot;featureType&quot;:&quot;road&quot;,&quot;elementType&quot;:&quot;labels&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;transit.line&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;on&quot;},{&quot;lightness&quot;:700}]},{&quot;featureType&quot;:&quot;water&quot;,&quot;elementType&quot;:&quot;all&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#7dcdcd&quot;}]}]">
              <div class="google-map"></div>
              <ul class="google-map-markers">
                <li data-location="<?=$finds->address;?>, Việt nam" data-description="<?=$finds->address;?>, Việt nam" data-icon="<?=url_tmpl();?>images/gmap_marker.png" data-icon-active="<?=url_tmpl();?>images/gmap_marker_active.png"></li>
              </ul>
            </div>
          </div>
        </section>
      </main>