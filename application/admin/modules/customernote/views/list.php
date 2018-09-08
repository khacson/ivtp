<?php
$i= $start;
foreach ($datas as $item) { 	
	$rows = json_decode($item->rows, true);
	$row_color = empty($item->row_color) ? '' : $item->row_color;
?>
	<tr style="background-color: <?=$row_color?> !important" class="content edit r<?=$item->id;?>" id="<?=$item->id;?>" user_id="<?=$item->user_id;?>" member_id="<?=$item->member_id;?>">
		<td class="center">
			<div class="btn-group btn-group-sm">
		      <button type="button" row_id="<?=$item->id?>" class="btn btn-default row_color">
				<span class="color-fill-icon dropdown-color-fill-icon" style="background-color:<?=$row_color?>;"></span>&nbsp;<b class="caret"></b>
			  </button>
		    </div>
		</td>
		<td style="text-align: center;">
			<input class="noClick" type="checkbox" name="keys[]" id="<?=$item->id; ?>">
			<textarea hidden class="json"><?=$item->rows?></textarea>
		</td>
		<td class="center"><?=$i;?></td>
		<td class=""><?=$item->fullname?></td>
		<td><?=date('d/m/Y H:i:s', strtotime($item->datecreate));?></td>
		<?php 
			foreach ($colList as $col) { 
				$col_id = $col->id;
				$col_color = empty($col->col_color) ? '' : $col->col_color;
				if (!isset($rows[$col_id])) { $rows[$col_id] = ''; };
		?>	
					<td style="background-color: <?=$col_color?> !important"><?=$rows[$col_id]?></td>
		<?php } ?>
		<td></td>
	</tr>
<?php	
$i++;
}
?>
<script>
$(function(){
  var row_color = $('.row_color');
	row_color.colorpickerplus();
	row_color.on('changeColor', function(e,color){
		var row_id = $(this).attr('row_id');
		if(color==null) {
		  //when select transparent color
		  $('.color-fill-icon', $(this)).addClass('colorpicker-color');
		  changeRowColor(row_id, '');
		} else {
		  $('.color-fill-icon', $(this)).removeClass('colorpicker-color');
		  $('.color-fill-icon', $(this)).css('background-color', color);
		  changeRowColor(row_id, color);
		}
	});
});
</script>