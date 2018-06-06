<?php 
$i = 1;
$k = 1;
foreach ($dataYear as $item) { 
	if ($i <= 6 || $i == 9 || $i == 10) {
		$year1 = number_format($item->year1);
		$year2 = number_format($item->year2);
		$year3 = number_format($item->year3);
		$year4 = number_format($item->year4);
	}
	elseif ($i == 21 || $i == 22) {
		$year1 = round($item->year1, 2);
		$year2 = round($item->year2, 2);
		$year3 = round($item->year3, 2);
		$year4 = round($item->year4, 2);
	}
	else {
		$year1 = round($item->year1 * 100).'%';
		$year2 = round($item->year2 * 100).'%';
		$year3 = round($item->year3 * 100).'%';
		$year4 = round($item->year4 * 100).'%';
	}
	
	if ($i == 17) {
		$finish = 'Hoàn thành';
	}
	elseif (!empty($item->finish)) {
		$finish = round($item->finish * 100).'%';
	}
	else {
		$finish = '';
	}
	
	if ($i == 21) {
		$curr_year = round($item->curr_year * 100).'%';
	} elseif (!empty($item->curr_year)) {
		$curr_year = number_format($item->curr_year);
	} else {
		$curr_year = '';
	}
		
	if ($year1 == 0 || $year1 == '0%') $year1 = '';
	if ($year2 == 0 || $year2 == '0%') $year2 = '';
	if ($year3 == 0 || $year3 == '0%') $year3 = '';
	if ($year4 == 0 || $year4 == '0%') $year4 = '';
	
	$bg = '';
	$color2 = '';
	$color3 = '';
	$color4 = '';
	if ($i >= 12 && $i <= 14){
		$bg = 'bgcolor="yellow"';
		$color2 = 'style="color: green"';
		$color3 = 'style="color: green"';
		$color4 = 'style="color: green"';
		if ($item->year2 < 0) $color2 = 'style="color: red"';
		if ($item->year3 < 0) $color3 = 'style="color: red"';
		if ($item->year4 < 0) $color4 = 'style="color: red"';
	}
?>
	<tr class="content edit" id="<?=$item->id; ?>" >
		<td align="left"><?=$item->title?></td>
		<td align="center"><?=$item->unit?></td>
		<td align="right"><?=$year1?></td>
		<td align="right" <?=$bg?> <?=$color2?> ><?=$year2?></td>
		<td align="right" <?=$bg?> <?=$color3?> ><?=$year3?></td>
		<td align="right" <?=$bg?> <?=$color4?> ><?=$year4?></td>
		<td></td>
		
		<?php 
		if ($i< 16) {
			if ($k == 1) {
				$k = 2;
				echo '<td align="center" colspan="3" rowspan="15">
				<img class="cotuc" src="'.base_url().'upload/'.$image.'" />
				</td>';
			}
		} elseif ($i == 16) {
			echo '<td align="center" colspan="3">'.$item->spend.'</td>';
		} else {
		?>
			<td><?=$item->spend?></td>
			<td align="center"><?=$curr_year?></td>
			<td align="center"><?=$finish?></td>
		<?php } ?>
		<td></td>
	</tr>
<?php	
$i++;
}
?>