
<section class="section-10 bg-selago">
<div class="shell">
  <ul class="list-inline list-inline-12 list-inline-icon p tleft breads">
	<li><a href="<?=base_url();?>trang-chu.html"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;Trang chủ </a></li>
	<li><i class="fa fa-angle-right" aria-hidden="true"></i> <a href="<?=base_url();?>tu-van.html">Danh mục tăng trưởng</a></li>
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
		  <div class="inset-md-right-35 inset-xl-right-0">
			<p><?=$msg?></p>
		  </div>
		</div>
		<div class="cell-sm-10 cell-md-4">
		  <div class="inset-md-left-30">
			<!-- Aside-->
			<aside class="text-left inset-xl-right-50"> 
			  <div class="">
				<hr class="divider hr-left-0 bg-bermuda">
				<h5 class="offset-top-15">Bài viết mới</h5>
				</div>
			  <?php include 'new_post.php' ?>
			</aside>
		  </div>
		</div>
		
	  </div>
	</div>
  </div>
</section>