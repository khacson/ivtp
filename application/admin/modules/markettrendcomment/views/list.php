<?php 
$i= $start;
foreach ($datas as $item) { 
?>
	<tr class="content edit" img = "<?=$item->img;?>" id="<?=$item->id; ?>" >
		<td style="text-align: center;">
		<input class="noClick" type="checkbox" name="keys[]" id="<?=$item->id;?>"></td>
		<td class="center"><?=$i;?></td>
		<td class="fullname"><?=$item->fullname;?></td>
		<td class="phone"><?=$item->phone;?></td>
		<td class="description"><?=$item->description;?></td>
		<td class="title"><?=$item->title;?></td>
		<td class="usercreate"><?=date('d/m/Y H:i:s',strtotime($item->datecreate));?></td>
		<td></td>
	</tr>
<?php	
$i++;
}
?>