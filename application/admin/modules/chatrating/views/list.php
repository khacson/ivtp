<?php
$i= $start;
foreach ($datas as $item) { 	
?>
	<tr class="content edit">
		<td class="center"><?=$i;?></td>
		<td><?=$item->username;?> - <?=$item->fullname;?></td>
		<td align="center"><?=$item->point;?></td>
		<td align="center"><?=$item->rank;?></td>
		<td align="center"><a target="_blank" href="<?=admin_url()?>chathistory?u=<?=$item->user_id;?>">Xem</a></td>
		<td></td>
	</tr>
<?php	
$i++;
}
?>