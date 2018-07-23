<style>
table col.c1 { width: 200px; }
table col.c2 { width: 70px; }
table col.c3 { width: 115px; }
table col.c4 { width: 115px; }
table col.c5 { width: 115px; }
table col.c6 { width: 115px; }
table col.c7 { width: 113px; }
table col.c8 { width: 140px; }
table col.c9 { width: 120px; }
table col.c10 { width: 120px; }
table col.c11 { width: auto; }
</style>
<section class="section-10 bg-selago">
<div class="shell">
  <ul class="list-inline list-inline-12 list-inline-icon p tleft breads">
	<li><a href="<?=base_url();?>trang-chu.html"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;Trang chủ </a></li>
	<li><i class="fa fa-angle-right" aria-hidden="true"></i> <a href="<?=base_url();?>tu-van.html">Danh mục tăng trưởng</a></li>
	</li>
	<li><i class="fa fa-angle-right" aria-hidden="true"></i> <a href="<?=base_url();?>tu-van.html">Mã Cổ Phiếu <?=$mcp?></a></li>
	</li>
	<input id="uri" type="hidden" name="uri" value="" />
  </ul>
</div>
</section>
<section class="text-left section-40 section-md-60">
  <div class="inset-lg-left-45 inset-lg-right-45 inset-xl-left-130 inset-xl-right-85">
	<div class="shell-wide shell-wide-custom">
	  <div class="range range-xs-center range-lg-right range-xl-justify">
		<div class="cell-md-12 text-center">
			<h3 class="text-primary"><?=$mcp?> - <?=$cp_name?></h3>
			<ul class="list list-inline list-inline-dashed list-inline-20 text-gray-lighter">
			  <li><?=date('d/m/Y', strtotime($info->datecreate))?></li>
			  <li><span>by <a class="text-bermuda" href="#"><?=$info->usercreate?></a></span></li>
			  <li><a class="text-gray-lighter" href="#comments"><?=$commentCount?> bình luận</a></li>
			</ul>
		</div>
		<div class="offset-top-30 increasecatalog-table-detail">
			<table id="tbheader" width="100%" cellspacing="0" border="1" >
				<?php for ($i = 1; $i < 11; $i++) { ?>
					<col class="c<?= $i; ?>">
				<?php } ?>
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
				<tbody id="grid-rows">
					<?php include 'detail_list_year.php'; ?>
				</tbody>
			</table>
			
			<table id="tbheader" width="100%" cellspacing="0" border="1" >
				<?php for ($i = 1; $i < 11; $i++) { ?>
					<col class="c<?= $i; ?>">
				<?php } ?>
				<tr>
					<?php 
					$n = count($titleQuater);
					for ($i = 0; $i < $n; $i++) { 
						if ($i == $n -1) {
							$colspan = 'colspan="3"';
						} else {
							$colspan = '';
						}
					?>
						<th <?=$colspan?>><?=$titleQuater[$i]?></th>
					<?php } ?>
				</tr>
				<tbody id="grid-rows">
					<?php include 'detail_list_quater.php'; ?>
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
				<!-- Recent Posts-->
				<div class="offset-top-60 offset-md-top-90">
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