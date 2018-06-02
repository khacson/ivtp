<?php 
$i= $start;
foreach ($datas as $item) { 
?>

	<tr class="content edit" id="<?=$item->id; ?>" >
		<td style="text-align: center;">
		<input class="noClick" type="checkbox" name="keys[]" id="<?=$item->id; ?>"></td>
		<td class="center"><?=$i;?></td>
		<td class="fullname title"><?=$item->fullname;?></td>
		<td class="phone"><?=$item->phone;?></td>
		<td class="email"><?=$item->email;?></td>
		<td class="description"><?=$item->description;?></td>
		<td class="datecreate text-center"><?=date('d M Y H:i:s',strtotime($item->datecreate));?></td>
		<td></td>
	</tr>
<?php	
$i++;
}
?>