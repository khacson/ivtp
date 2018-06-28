<style>
.table_service_container {
	overflow: auto;
}
.table_service {
	min-width: 465px;
}
.table_service i.fa {
	font-size: 18px;
}
.table_service i.fa-check {
	color: green;
}
.table_service i.fa-times {
	color: red;
}
.service_price_info {
    color: #733272;
    font-size: 15px;
    font-weight: bold;
}
.service_name {
	width: 150px;
}
.regtd td{
	border: none;
}
.regtd .btn {
    margin-top: 5px;
    padding: 6px 5px;
	width: 100%;
	min-width: auto;
}
@media (max-width: 760px) { 
	.service_name {
		width: auto;
	}
}
</style>
<table class="table_service" width="100%">
<thead>
	<th>STT</th>
	<th>Dịch vụ</th>
	<th class="service_name"><b>FREE</b></th>
	<th class="service_name"><b>NORMAL</b></th>
	<th class="service_name"><b>VIP</b></th>
</thead>
<tbody>
<?php 
$i = 1; 
foreach ($serviceInfo as $item) { 
	$checkFree = '<i class="fa fa-times"></i>';
	$checkNormal = '<i class="fa fa-check"></i>';
	if ($item->normal == 0) {
		$checkNormal = '<i class="fa fa-times"></i>';
	}
	$checkVIP = '<i class="fa fa-check"></i>';
	if ($item->vip == 0) {
		$checkVIP = '<i class="fa fa-times"></i>';
	}
?>
	<tr>
		<td align="center"><?=$i?></td>
		<td><?=$item->support_service?></td>
		<td align="center"><?=$checkFree?></td>
		<td align="center"><?=$checkNormal?></td>
		<td align="center"><?=$checkVIP?></td>
	</tr>
<?php $i++;} ?>
	<tr>
		<td colspan="2" align="center"><b style="font-size: 15px;">Giá</b></td>
		<td align="center">
			<span class="service_price_info">Dùng thử VIP<br>10 ngày</span>
		</td>
		<td align="center">
			<span class="service_price_info"><?=number_format($normal_price)?></span> 
			<br>VNĐ/tháng
		</td>
		<td align="center">
			<span class="service_price_info"><?=number_format($vip_price)?></span> 
			<br>VNĐ/tháng
		</td>
	</tr>
	<tr class="regtd">
		<td colspan="2" align="center"></td>
		<td align="center">
			<a href="<?=base_url()?>dang-ky.html"
				class="btn btn-primary">Đăng ký</a>
		</td>
		<td align="center">
			<a href="javascript:;" type="1"
				class="btn btn-primary btn-reg">Đăng ký</a>
		</td>
		<td align="center">
			<a href="javascript:;" type="2"
				class="btn btn-primary btn-reg">Đăng ký</a>
		</td>
	</tr>
</tbody>
</table>