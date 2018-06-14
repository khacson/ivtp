 <?php if(count($datas) == 0){?>
	<h6 class="center offset-md-top-30">Chuyên mục chưa có bài viết</h6>
 <?php }?>
 <?php foreach($datas as $item){?>
	  <div class="offset-top-30">
		<!-- Unit-->
		<div class="unit unit-horizontal">
		  <div class="unit-left"><img class="img-responsive center-block" src="<?=base_url();?>files/investment/thumb/<?=$item->thumb;?>" width="300" height="200" alt=""></div>
		  <div class="unit-body">
			<a href="<?=base_url();?>danh-muc-dau-tu/<?=$item->friendlyurl;?>-dt<?=$item->id;?>.html"><?=$item->title;?></a>
			<div class="offset-top-10">
			   <?=$item->description_sort;?>
			  <!-- List Inline-->
			  <ul class="list-inline list-inline-dashed list-inline-12 text-gray text-italic p">
				<li><a href="<?=base_url();?>danh-muc-dau-tu/<?=$item->friendlyurl;?>-dt<?=$item->id;?>.html"><i class="fa fa-angle-right" aria-hidden="true"></i> Xem chi tiết</a></li>
			  </ul>
			</div>
		  </div>
		</div>
	  </div>
<?php }?>