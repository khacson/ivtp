<?php 
$i= $start;
foreach ($datas as $item) { 
?>
	<tr class="content edit" id="<?=$item->id?>" blogid="<?=$item->blogid?>" fullname="<?=$item->fullname?>" email="<?=$item->email?>" phone="<?=$item->phone?>" accept="<?=$item->accept?>" reply_id="<?=$item->reply_id?>" level="<?=$item->level?>">
		<td style="text-align: center;">
		<input class="noClick" type="checkbox" name="keys[]" id="<?=$item->id;?>"></td>
		<td class="center"><?=$i;?></td>
		<td class="fullname"><?=$item->fullname;?></td>
		<td class="email"><?=$item->email;?></td>
		<td class="description"><?=$item->description;?></td>
		<td class="title"><?=$item->title;?></td>
		<td class="usercreate"><?=date('d/m/Y H:i:s',strtotime($item->datecreate));?></td>
		<td class="accept center"><?=$item->accept == 1? 'Rồi':'Chưa'?></td>
		<td class="parent_id center">
		<?php if ($item->parent_id) { ?>
			<a href="<?=base_url()?>xu-huong-thi-truong/<?=$item->friendlyurl?>-dt<?=$item->blogid?>.html#<?=$item->parent_id?>" target="_blank">#<?=$item->parent_id?></a>
		<?php } ?>
		</td>
		<td class="reply_msg"><?=$item->reply_msg;?></td>
		<td></td>
	</tr>
<?php	
$i++;
}
?>