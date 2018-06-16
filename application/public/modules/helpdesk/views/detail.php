<section class="section-10 bg-selago">
<div class="shell">
  <ul class="list-inline list-inline-12 list-inline-icon p tleft breads">
	<li><a href="<?=base_url();?>trang-chu.html"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;Trang chủ </a></li>
	<li><i class="fa fa-angle-right" aria-hidden="true"></i> <a href="<?=base_url();?>tu-van.html">Chat với nhân viên</a></li>
	</li>
	<input id="uri" type="hidden" name="uri" value="" />
  </ul>
</div>
</section> 
<section class="text-left section-40 section-md-60">
          <div class="inset-lg-left-45 inset-lg-right-45 inset-xl-left-130 inset-xl-right-85">
            <div class="shell-wide shell-wide-custom">
              <div class="range range-xs-center range-lg-right range-xl-justify">
                <div class="cell-sm-10 cell-md-8 cell-xl-7">
                  <div class="inset-xl-right-0"> 
                    <div class="range">
						<div  class="cell-md-7 inset-md-right-30">
							<?php include 'kh_chat.php'; ?>
						</div>
						<div  class="cell-md-5">
							<?php include 'rating_form.php'; ?>
						</div>
                    </div>
                  </div>
                </div>
                <div class="cell-sm-10 cell-md-4 offset-top-0 offset-md-top-0">
                  <div class="inset-md-left-30">
                    <!-- Aside-->
                    <aside class="text-left inset-xl-right-50">  
					  <!-- Recent Posts-->
						<div class="offset-top-60 offset-md-top-0">
						<hr class="divider hr-left-0 bg-bermuda">
						<h5 class="offset-top-15">Bài viết mới</h5>
						</div>
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