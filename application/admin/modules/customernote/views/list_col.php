
<div class="row">
	<button onclick="addCol()" type="button" class="button pull-right" style="font-weight: 300">
		<i class="fa fa-plus"></i>
		<?=getLanguage('all','Thêm cột')?>
	</button>
</div>
<?php 
	foreach ($datas as $item) {
		$graybg = $item->isshow == 0 ? 'graybg' : '';
		$color = empty($item->col_color) ? '#fff' : $item->col_color;
?>
<div class="row mtop10">
	<div class="col-md-6">
		<div class="form-group">
			<div class="col-md-12">
				<input type="text" name="col<?=$item->id?>" id="col<?=$item->id?>" class="searchs form-control <?=$graybg?>" value="<?=$item->col_name?>" />
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group actionbtn">
			<a onclick="editCol(<?=$item->id?>)" href="javascript:;">Sửa</a> | 
			<a onclick="hideCol(<?=$item->id?>)" href="javascript:;">Ẩn</a> | 
			<a onclick="showCol(<?=$item->id?>)" href="javascript:;">Hiện</a> | 
			<a onclick="delCol(<?=$item->id?>)" href="javascript:;">Xóa</a>&nbsp;&nbsp;&nbsp;
			<a onclick="move(<?=$item->id?>, 'moveUp')" href="javascript:;"><i class="fa fa-arrow-up"></i></a> | 
			<a onclick="move(<?=$item->id?>, 'moveDown')" href="javascript:;"><i class="fa fa-arrow-down"></i></a>&nbsp;&nbsp;
			<div class="btn-group btn-group-sm">
		      <button type="button" col_id="<?=$item->id?>" class="btn btn-default col_color">
				<span class="color-fill-icon dropdown-color-fill-icon" style="background-color:<?=$color?>;"></span>&nbsp;<b class="caret"></b>
			  </button>
		    </div>
		</div>
	</div>
</div>
<?php }?>
<br>
<br>

<script>
$(function(){
  var col_color = $('.col_color');
	col_color.colorpickerplus();
	col_color.on('changeColor', function(e,color){
		var col_id = $(this).attr('col_id');
		if(color==null) {
		  //when select transparent color
		  $('.color-fill-icon', $(this)).addClass('colorpicker-color');
		  changeColColor(col_id, '');
		} else {
		  $('.color-fill-icon', $(this)).removeClass('colorpicker-color');
		  $('.color-fill-icon', $(this)).css('background-color', color);
		  changeColColor(col_id, color);
		}
	});
});
</script>