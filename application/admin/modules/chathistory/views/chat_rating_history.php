<style>

</style>
<div class="chat_rating_log_container">
	<table width="100%" cellspacing="0" border="1">
		<thead>
			<th width="40">STT</th>
			<th width="100">Đánh giá</th>
			<th>Góp ý</th>
			<th width="150">Ngày đánh giá</th>
		</thead>
		<tbody>
		<?php 
			$i = 1;
			foreach ($chatRatingLog as $item) { 
				$rating = '';
				if (isset($arrStar[$item->star])) {
					$rating = $arrStar[$item->star];
				}
		?>
			<tr>
				<td><?=$i++?></td>
				<td><?=$rating?></td>
				<td><?=$item->note?></td>
				<td><?=date('d/m/Y H:i:s', strtotime($item->datecreate))?></td>
			</tr>
		<?php 
			} 
		?>
		</tbody>
	</table>
</div>