<?php 
$i = 1;
$k = 1;
foreach ($dataQuater as $item) { 	
	if ($i <= 6 || $i == 9 || $i == 10 || $i == 27 || $i == 28) {
		$t1 = number_format($item->t1);
		$t2 = number_format($item->t2);
		$t3 = number_format($item->t3);
		$t4 = number_format($item->t4);
		$t5 = number_format($item->t5);
		$t6 = number_format($item->t6);
		$t7 = number_format($item->t7);
		$t8 = number_format($item->t8);
	}
	elseif ($i == 24 || $i == 25 || $i == 29 || $i == 30) {
		$t1 = round($item->t1, 2);
		$t2 = round($item->t2, 2);
		$t3 = round($item->t3, 2);
		$t4 = round($item->t4, 2);
		$t5 = round($item->t5, 2);
		$t6 = round($item->t6, 2);
		$t7 = round($item->t7, 2);
		$t8 = round($item->t8, 2);
	}
	else {
		$t1 = round($item->t1 * 100).'%';
		$t2 = round($item->t2 * 100).'%';
		$t3 = round($item->t3 * 100).'%';
		$t4 = round($item->t4 * 100).'%';
		$t5 = round($item->t5 * 100).'%';
		$t6 = round($item->t6 * 100).'%';
		$t7 = round($item->t7 * 100).'%';
		$t8 = round($item->t8 * 100).'%';
	}
	
	if ($t1 == 0 || $t1 == '0%') $t1 = '';
	if ($t2 == 0 || $t2 == '0%') $t2 = '';
	if ($t3 == 0 || $t3 == '0%') $t3 = '';
	if ($t4 == 0 || $t4 == '0%') $t4 = '';
	if ($t5 == 0 || $t5 == '0%') $t5 = '';
	if ($t6 == 0 || $t6 == '0%') $t6 = '';
	if ($t7 == 0 || $t7 == '0%') $t7 = '';
	if ($t8 == 0 || $t8 == '0%') $t8 = '';
	
	$bg = '';
	$color5 = '';
	$color6 = '';
	$color7 = '';
	$color8 = '';
	if ($i == 12 || $i == 14 || $i == 16){
		$bg = 'bgcolor="yellow"';
		$color5 = 'style="color: green"';
		$color6 = 'style="color: green"';
		$color7 = 'style="color: green"';
		$color8 = 'style="color: green"';
		if ($item->t5 < 0) $color5 = 'style="color: red"';
		if ($item->t6 < 0) $color6 = 'style="color: red"';
		if ($item->t7 < 0) $color7 = 'style="color: red"';
		if ($item->t8 < 0) $color8 = 'style="color: red"';
	}
?>
	<tr class="content edit" id="<?=$item->id; ?>" >
		<td align="left"><?=$item->title?></td>
		<td align="center"><?=$item->unit?></td>
		<td align="right"><?=$t1?></td>
		<td align="right"><?=$t2?></td>
		<td align="right"><?=$t3?></td>
		<td align="right"><?=$t4?></td>
		<td align="right" <?=$bg?> <?=$color5?> ><?=$t5?></td>
		<td align="right" <?=$bg?> <?=$color6?> ><?=$t6?></td>
		<td align="right" <?=$bg?> <?=$color7?> ><?=$t7?></td>
		
		<?php if ($i == 29) $bg = 'bgcolor="yellow"'; ?>
		<td align="right" <?=$bg?> <?=$color8?> ><?=$t8?></td>
	</tr>
<?php	
$i++;
}
?>