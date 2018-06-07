<?php 
$i= $start;
foreach ($datas as $item) { 
?>

	<tr class="content edit" groupid = <?=$item->groupid;?> avatar = "<?=$item->signature;?>" id="<?=$item->id; ?>" >
		<td style="text-align: center;">
		<input class="noClick" type="checkbox" name="keys[]" id="<?=$item->id; ?>"></td>
		<td class="center"><?=$i;?></td>
		<td class="uusername"><?=$item->username;?></td>
		<td class="ufullname"><?=$item->fullname;?></td>
		<td class="ugroupid"  ><?=$item->groupname;?></td>
		<td class="umobile"><?=$item->mobile;?></td>
		<td class="uemail"><?=$item->email;?></td>
		<td></td>
	</tr>
<?php	
$i++;
}
?>