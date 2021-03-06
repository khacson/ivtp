<style>
#modal_content label {
    width: 160px;
}
#modal_content .pull-left {
    margin-left: 20px;
}
#modal_content .select_mon {
   width: 150px;
}
#modal_content .after_discount {
	color: #53338c;
}
#modal_content ul {
    list-style: inside none disc;
    padding-left: 15px;
}
#modal_content .promote {
    color: #53338c;
    font-style: italic;
    font-weight: bold;
    text-decoration: underline;
}
@media screen and (max-width: 380px) {
	#modal_content label {
		width: auto;
	}
	#modal_content .pull-left {
		margin-left: 8px;
	}
	#modal_content .select_mon {
	   width: 100px;
	}
}
</style>
<section class="section-10 bg-selago">
<div class="shell">
  <ul class="list-inline list-inline-12 list-inline-icon p tleft breads">
	<li><a href="<?=base_url();?>trang-chu.html"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;Trang chủ </a></li>
	<li><i class="fa fa-angle-right" aria-hidden="true"></i> <a href="<?=base_url();?>dich-vu.html">Dịch vụ</a></li>
	</li>
	<input id="uri" type="hidden" name="uri" value="" />
  </ul>
</div>
</section> 
<section class="text-left section-40 section-md-30">
	<div class="inset-lg-left-45 inset-lg-right-45 inset-xl-left-130 inset-xl-right-85">
		<div class="cell-md-12">
			<div class="cell-md-12 text-center">
				<h3 class="text-primary">Bảng Giá Dịch Vụ</h3>
			</div>
			<div class="range range-xs-center pricing">
				<div class="cell-sm-12 cell-md-12 cell-lg-9 cell-xl-8 table_service_container">
					<?php include 'table_pricing.php'; ?>
				</div>
				<!--S Item 1-->
			</div>
			<div class="range range-xs-center">
				<div class="cell-md-10 cell-lg-10 text-justify">
					<?=$services->description_long;?>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Modal -->
<a id="showModal" class="hide" data-toggle="modal" href="#myModal"> </a>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h6 class="modal-title text-left">Thông tin đăng ký</h6>
      </div>
      <div id="modal_content" class="modal-body">
        <p></p>
      </div>
    </div>

  </div>
</div>

<div id="infor" class="hide">
	<div class="text-left">
		<div class="row">
			<label class="pull-left">Gói dịch vụ: </label>
			<div class="pull-left">
				<span class="select_service  btn-success">VIP</span>
			</div>
		</div>
		<div class="row">
			<label class="pull-left">Giá: </label>
			<div class="pull-left">
				<span class="service_price"></span> đồng/tháng
			</div>
		</div>
		<div class="row">
			<label class="pull-left">Thời gian sử dụng: </label>
			<select class="pull-left select_mon" onchange="getTotalPrice(this.value)">
			<?php for($i=1; $i<12; $i++){ ?>
				<option value="<?=$i?>"><?=$i?> tháng</option>
			<?php } ?>
				<option value="12">1 năm</option>
				<option value="24">2 năm</option>
				<option value="36">3 năm</option>
			</select>
		</div>
		<div class="row">
			<label class="pull-left">Tổng hóa đơn: </label>
			<div class="pull-left">
				<b><span class="total_price"></span> đồng</b> <i class="after_discount"></i>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<p></p>
				<div class="promote">Ưu đãi:</div>
				<ul>
					<li><i>Giảm <b><?=DISCOUNT_RATE_1 * 100?>%</b> khi đăng ký từ 6 tháng đến 11 tháng.</i></li>
					<li><i>Giảm <b><?=DISCOUNT_RATE_2 * 100?>%</b> khi đăng ký từ 12 tháng trở lên.</i></li>
				</ul>
			</div>
		</div>
		<div class="row-centered offset-top-20">
			<a href="javascript:;" id="reg_service"><button type="button" class="btn btn-primary">Đăng ký</button></a>
		</div>
	</div>
</div>

<div id="login-needed" class="hide">
	<div class="text-center">
		<p>Bạn vui lòng đăng ký thành viên trước khi đăng ký dịch vụ.</p>
		<div class="row-centered">
			<div class="col-md-4 col-centered">
				<a href="<?=base_url()?>dang-nhap.html"><button type="button" class="btn btn-primary">Đăng nhập</button></a>
			</div>
			<div class="col-md-4 col-centered">
				<a href="<?=base_url()?>dang-ky.html"><button type="button" class="btn btn-primary">Đăng ký</button></a>
			</div>
		</div>
	</div>
</div>

<div id="reg-success" class="hide">
	<div class="text-center">
		<p class="btn-success"><b>Đăng ký thành công</b></p>
		<p>Email hướng dẫn đã được gửi đến bạn, bạn vui lòng làm theo hướng dẫn trong email để kích hoạt gói dịch vụ.</p>
	</div>
</div>




<script>
var login = <?=empty($login) ? 0 : 1?>;
var n = <?=$normal_price?>;
var v = <?=$vip_price?>;
var price_per_mon;
var type;
var discount_rate_1 = '<?=DISCOUNT_RATE_1?>';
var discount_rate_2 = '<?=DISCOUNT_RATE_2?>';
$('body').on('click', '#reg_service', function() {
	$('#myModal').modal('toggle');
	var level = type;
	var select_mon = $('#modal_content .select_mon').val();
	$('.loading').show();
	$.ajax({
		url : '<?=base_url();?>member/' + 'regservice',
		type: 'POST',
		async: true,
		data:{level: level,select_mon:select_mon},  
		success:function(datas){
			if (datas == 1) {
				$('.loading').hide();
				$('.modal-title').text('Thông báo');
				var content = $('#reg-success').html();
				$('#modal_content').html(content);
				$('#showModal').get(0).click();
				return;
			}
			else {
				$('.loading').hide();
				warning('Có lỗi xảy ra vui lòng thử lại.');
			}
		},
		error: function() {
			$('.loading').hide();
			warning('Có lỗi xảy ra vui lòng thử lại.');
		}
	});
})
$('.btn-reg').click(function(){	
	if (login == 0) {
		$('.modal-title').text('Thông báo');
		var content = $('#login-needed').html();
		$('#modal_content').html(content);
		$('#showModal').get(0).click();
		return;
	}
	
	$('.modal-title').text('Thông tin đăng ký');
	$('.after_discount').text('');
	type = $(this).attr('type');
	if (type == 1) {
		price_per_mon = n;
		setContent('Normal');
		return;
	}
	else {
		price_per_mon = v;
		setContent('VIP');
		return;
	}
})
function setContent(service_name) {
	$('.select_service').text(service_name);
	$('.service_price').text(price_per_mon.toLocaleString('en'));
	$('.total_price').text(price_per_mon.toLocaleString('en'));
	var content = $('#infor').html();
	$('#modal_content').html(content);
	$('#showModal').get(0).click();
}
function getTotalPrice(mon) {
	if (mon < 6) {
		var total = price_per_mon * mon;
		$('.after_discount').text('');
	}
	else if (mon >= 6 && mon < 12) {
		var total = price_per_mon * mon * (1 - discount_rate_1);
		$('.after_discount').text('(đã giảm '+ discount_rate_1 * 100 +'%)');
	}
	else if (mon >= 12) {
		var total = price_per_mon * mon * (1 - discount_rate_2);
		$('.after_discount').text('(đã giảm '+ discount_rate_2 * 100 +'%)');
	}
	$('.total_price').text(total.toLocaleString('en'));
}





</script>
  <link rel="stylesheet" href="<?=url_tmpl();?>toast/toastr.min.css">
  <script src="<?=url_tmpl();?>toast/toastr.min.js"></script>
  <script src="<?=url_tmpl();?>toast/notifications.js"></script>