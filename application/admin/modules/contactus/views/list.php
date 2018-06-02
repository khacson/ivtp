<?php 
$i= $start;
foreach ($datas as $item) { 
?>

	<tr class="content edit" id="<?=$item->id; ?>" >
		<td style="text-align: center;">
		<input class="noClick" type="checkbox" name="keys[]" id="<?=$item->id; ?>"></td>
		<td class="center"><?=$i;?></td>
		<td class="phone"><?=$item->phone;?></td>
		<td class="email"><?=$item->email;?></td>
		<td class="url_facebook"><?=$item->url_facebook;?></td>
		<td class="url_google"><?=$item->url_google;?></td>
		<td class="url_twitter"><?=$item->url_twitter;?></td>
		<td class="skype"><?=$item->skype;?></td>
		<td class="postal"><?=$item->postal;?></td>
		<td class="datecreate"><?=$item->datecreate;?></td>
		<td class="usercreate"><?=$item->usercreate;?></td>
		
	</tr>
<?php	
$i++;
}
?>