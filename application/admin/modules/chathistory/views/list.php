<?php
$i= $start;
$now = gmdate('Y-m-d H:i:s', time()+ 7*3600);
foreach ($datas as $item) { 	
	$t = strtotime($now) - strtotime($item->last_response); 
	$status = 'Kết thúc';
	if ($t < 1800) {
		$status = 'Đang chat';
	}
	$rating = '';
	if (isset($arrStar[$item->star])) {
		$rating = $arrStar[$item->star];
	}
?>

	<tr class="content edit">
		<td class="center"><?=$i;?></td>
		<td><?=$item->username;?> - <?=$item->u_fullname;?></td>
		<td><?=$item->member_id;?> - <?=$item->m_fullname;?></td>
		<td align="center">
			<a class="view_chat_code" chat_code="<?=$item->chat_code;?>" href="javascript:;"><?=$item->chat_code;?></a>
		</td>
		<td align="center"><?=$rating?></td>
		<td><?=$item->note;?></td>
		<td><?=date('d/m/Y H:i:s', strtotime($item->last_response));?></td>
		<td align="center"><?=$status?></td>
		<td></td>
	</tr>
<?php	
$i++;
}
?>