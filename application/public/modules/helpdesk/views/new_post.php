<!-- Recent Posts-->
<div class="offset-top-60 offset-md-top-90">
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