<?php
$i= $start;
$now = gmdate('Y-m-d H:i:s', time()+ 7*3600);
foreach ($datas as $item) { 	
	$t = strtotime($now) - strtotime($item->last_response); 
	$status = 'Kết thúc';
	if ($t < 1800) {
		$status = 'Đang chat';
	}
	
	$memberName = $item->member_id.' - '. $item->m_fullname;
	if (strpos($item->member_id, '-') !== false) {
		$memberName = 'Guest'.$item->member_id;
	}
?>

	<tr class="content edit">
		<td class="center"><?=$i;?></td>
		<td><?=$item->username;?> - <?=$item->u_fullname;?></td>
		<td><?=$memberName;?></td>
		<td align="center">
			<a class="view_chat_code" chat_code="<?=$item->chat_code;?>" href="javascript:;"><?=$item->chat_code;?></a>
		</td>
		<?php if ($login->groupid == 1) { ?>
			<td align="center">
			<?php if (!empty($item->rating_id)) { ?>
				<a class="view_chat_rating" chat_code="<?=$item->chat_code;?>" href="javascript:;">Xem</a>
			<?php } ?>
			</td>
		<?php } ?>
		<td><?=date('d/m/Y H:i:s', strtotime($item->last_response));?></td>
		<td align="center"><?=$status?></td>
		<td></td>
	</tr>
<?php	
$i++;
}
?>