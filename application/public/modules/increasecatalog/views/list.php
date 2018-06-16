<?php 
$i= 1;
foreach ($datas as $item) { 
	$bg1 = '';
	$bg2 = '';
	$bg3 = '';
	$bg4 = '';
	if ($item->t1 == 'x') $bg1 = 'bgcolor="#f9e8f9"';
	if ($item->t2 == 'x') $bg2 = 'bgcolor="#f9e8f9"';
	if ($item->t3 == 'x') $bg3 = 'bgcolor="#f9e8f9"';
	if ($item->t4 == 'x') $bg4 = 'bgcolor="#f9e8f9"';
?>
	<tr class="content edit">
		<td align="center"><?=$i;?></td>
		
		<td align="center">
			<a href="<?=base_url();?>danh-muc-tang-truong/<?=strtolower($item->mcp)?>-dt<?=$item->id?>.html"><?=$item->mcp?></a>
		</td>
		<td align="right"><?=number_format($item->curr_price)?></td>
		<td align="right"><?=round($item->pe, 2)?></td>
		<td align="center" <?=$bg1?> ><?=$item->t1?></td>
		<td align="center" <?=$bg2?> ><?=$item->t2?></td>
		<td align="center" <?=$bg3?> ><?=$item->t3?></td>
		<td align="center" <?=$bg4?> ><?=$item->t4?></td>
		<td><?=$item->note?></td>
		<td align="right"><?=number_format($item->open_price)?></td>
		<td align="right" class="<?=$item->inc_des < 0 ? 'red' : 'green'?>"><?=round($item->inc_des * 100,2).'%'?></td>
		<td><?=$item->trend?></td>
	</tr>
<?php	
$i++;
}
?>
<tr>
	<td colspan="10" align="center"><b>TĂNG GIẢM TRUNG BÌNH</b></td>
	<td align="right" class="<?=$inc_des_avg < 0 ? 'red' : 'green'?>"><?=round($inc_des_avg * 100,2).'%'?></td>
	<td colspan="4"></td>
</tr>