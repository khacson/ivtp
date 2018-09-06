<?php if (empty($commentList)) return; ?>
<style>
.comment_bg{
	background-color: #eff1f2;
    border-radius: 5px;
    padding: 10px 15px 2px;
}
.comment_bg .unit-body {
    flex: 1 1 auto;
}
.comment_date{
	font-size: 13px;
}
.comment_id{
	float: right;
	font-size: 14px;
}
</style>
<div class="offset-top-60 offset-md-top-90">
  <hr class="divider hr-left-0 bg-bermuda">
  <div class="offset-top-15">
	<h5>Bình luận</h5>
  </div>
</div>
<div class="offset-top-30">
<?php foreach ($commentList as $item) { ?>
	<?php if ($item->is_admin) {$bg_admin = 'admin_comment';} else {$bg_admin = '';} ?>
	<?php if (!$item->parent_id) { ?>
	  <!-- Unit-->
	  <div class="comment_bg offset-top-20 unit unit-horizontal unit-spacing-sm" id="<?=$item->id?>">
		<div class="unit-body">
		  <a href="javascript:;" class="<?=$bg_admin?>"><?=$item->fullname?></a>
		  <a href="javascript:;" class="comment_id">#<?=$item->id?></a>
		  <div class="offset-top-5 offset-md-top-5">
			<p class="comment_date text-italic text-gray-lighter">
			<?=date('H:i', strtotime($item->datecreate))?>  
			ngày <?=date('d/m/Y', strtotime($item->datecreate))?>
			</p>
		  </div>
		  <div class="offset-top-10">
			<p><?=$item->description?></p>
		  </div>
		  <div class="offset-top-5"><span class="icon icon-sm fa fa-reply text-bermuda text-middle"></span><span class="text-middle text-bermuda inset-left-5"><a class="replybtn text-bermuda" href="javascript:;" level="<?=$item->level?>" parid="<?=$item->id?>">Reply</a></span></div>
		</div>
	  </div>
	<?php } else { ?>
		<?php for ($i = 0; $i < $item->level; $i++) { ?>
		  <div class="offset-top-20 inset-left-35 inset-xs-left-50 inset-lg-left-100">
		<?php } ?> 
			<!-- Unit-->
			<div class="comment_bg unit unit-horizontal unit-spacing-sm" id="<?=$item->id?>">
			  <div class="unit-body">
				<a href="javascript:;" class="<?=$bg_admin?>"><?=$item->fullname?></a>
				<a href="javascript:;"class="comment_id">#<?=$item->id?></a>
				<div class="offset-top-5 offset-md-top-5">
				  <p class="comment_date text-italic text-gray-lighter">
					<?=date('H:i', strtotime($item->datecreate))?>  
					ngày <?=date('d/m/Y', strtotime($item->datecreate))?>
					</p>
				</div>
				<div class="offset-top-10">
				  <p><?=$item->description?></p>
				</div>
				<div class="offset-top-5"><span class="icon icon-sm fa fa-reply text-bermuda text-middle"></span><span class="text-middle text-bermuda inset-left-5"><a class="replybtn text-bermuda" href="javascript:;" level="<?=$item->level?>" parid="<?=$item->id?>">Reply</a></span></div>
			  </div>
			</div>
		<?php for ($i = 0; $i < $item->level; $i++) { ?>	
		  </div>
		<?php } ?>  
	<?php } ?>  
<?php } ?>  
</div>
<script>
$('.replybtn').click(function(){
	var parid = $(this).attr('parid');
	var level = $(this).attr('level');
	$('input[name=parid]').val(parid);
	$('input[name=level]').val(level);
	var comment_form_top = $('#comment_form').offset().top - 200;
	$("html, body").stop().animate({scrollTop:comment_form_top},300, 'easeInOutQuad');
})
</script>