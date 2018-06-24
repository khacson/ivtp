<?php 
$i= $start;
foreach ($datas as $item) { 
$sex = '';
if($item->sex == 1){
	$sex = 'Nam';
}
elseif($item->sex == 2){
	$sex = 'Nữ';
}
if($item->sex == 3){
	$sex = 'Không xác định';
}
$birthday = '';
if(!empty($item->birthday)){
	$birthday = date('d/m/Y',strtotime($item->birthday));
}
?>

	<tr class="content edit" id="<?=$item->id; ?>" parentid = "<?=$item->parentid; ?>" >
		<td style="text-align: center;">
		<input class="noClick" type="checkbox" name="keys[]" id="<?=$item->id; ?>" ></td>
		<td class="center"><?=$i;?></td>
		<td class="fullname"><?=$item->id;?> - <?=$item->fullname;?></td>
		<td><?=$sex;?></td>
		<td class="text-center"><?=$birthday;?></td>
		<td><?=$item->phone;?></td>
		<td><?=$item->email;?></td>
		<td><?=$item->hobby;?></td>
		<td><?=$item->working;?></td>
		<td><?=$item->address;?></td>
		<td class="text-center avatar">
			<?php if(!empty($item->avatar)){?>
			<img width="60" height="60" src="<?=base_url();?>files/user/<?=$item->avatar;?>" />
			<?php }?>
		</td>
		<td><?=date('d/m/Y H:i:s',strtotime($item->datecreate));?></td>
		<td></td>
	</tr>
<?php	
$i++;
}
?>