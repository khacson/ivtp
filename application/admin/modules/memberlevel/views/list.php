<?php
$i= $start;
$now = gmdate('Y-m-d H:i:s', time()+ 7*3600);
foreach ($datas as $item) { 
	if ($item->time_use < 12 ) {
		$time_use = $item->time_use.' tháng';
	}
	elseif ($item->time_use >= 12 ) {
		$time_use = $item->time_use/12 .' năm';
	}
	$paid_status = '<button class="btn-warning btn btn-sm">Chưa</button>';
	if ($item->paid_status == 1) {
		$paid_status = '<button class="btn-success btn btn-sm">Rồi</button>';
	}
	$active_status = '<button class="btn-warning btn btn-sm">Chưa</button>';
	if ($item->active_status == 1) {
		$active_status = '<button class="btn-success btn btn-sm">Rồi</button>';
	}
	else if ($item->active_status == 2) {
		$active_status = '<button class="btn-danger btn btn-sm">Hết hạn</button>';
	}
	$from_date = $to_date = '';
	if (!empty($item->from_date)) {
		$from_date = date('d/m/Y H:i:s', strtotime($item->from_date));
	}
	if (!empty($item->to_date)) {
		$to_date = date('d/m/Y H:i:s', strtotime($item->to_date));
	}
	$dateupdate = '';
	if (!empty($item->dateupdate)) {
		$dateupdate = date('d/m/Y H:i:s', strtotime($item->dateupdate));
	}
?>

	<tr class="content edit"  >
		<td class="center"><?=$i;?></td>
		<td><?=$item->active_code;?></td>
		<td align="center"><?=date('d/m/Y H:i:s', strtotime($item->datecreate));?></td>
		<td><?=$item->member_id;?> - <?=$item->fullname;?></td>
		<td align="center"><?=$item->name;?></td>
		<td align="center"><?=$time_use;?></td>
		<td align="center"><?=number_format($item->total_paid);?> đồng</td>
		<td class="center paid_status" paid_status="<?=$item->paid_status?>" idR="<?=$item->id?>">
			<?=$paid_status?>
		</td>
		<td class="center active_status" active_status="<?=$item->active_status?>" idR="<?=$item->id?>">
			<?=$active_status?>
		</td>
		<td align="center"><?=$from_date?></td>
		<td align="center"><?=$to_date?></td>
		<td align="center"><?=$item->userupdate;?></td>
		<td align="center"><?=$dateupdate;?></td>
		<td></td>
	</tr>
<?php	
$i++;
}
?>