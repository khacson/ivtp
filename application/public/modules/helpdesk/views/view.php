<style>
.user_info-container {
    background-image: url('<?=base_url()?>files/user/success.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    border-radius: 5px;
	margin-bottom: 30px !important;
	position: relative;
	overflow: hidden;
}
.user_info-container:hover .chatbtn{
	top: calc(50% - 30px);
}
.user_info-container:hover .user_info{
	background: rgba(19, 127, 221, 0.6);
}
.user_info {
    background: rgba(19, 127, 221, 0.85);
    border-radius: 5px;
    color: #f7f8f9;
    overflow: hidden;
    padding: 10px;
	transition: all ease 0.5s;
}
.user_info.offline {
	background: rgba(159, 161, 165, 0.8);
}
.user_info-container:hover .user_info.offline{
	background: rgba(159, 161, 165, 0.8);
}
.user_info-container:hover .user_info.cskh{
	background: rgba(107, 8, 117, 0.65);
}
.user_info.cskh {
    background: rgba(107, 8, 117, 0.8);
}
.user_info .user_img {
    border-radius: 50%;
    display: block;
    height: 80px;
    margin: auto;
    width: 80px;
	border: 2px solid #eee;
}
.user_info p{
	margin: 5px 0;
	font-size: 13px;
	letter-spacing: -0.09px;
}
.user_info p.username{
	font-weight: bold;
	font-size: 14px;
	text-align: center;
}
.chatbtn {
    background-color: #442a74;
    border: 2px solid #fff;
    border-radius: 50%;
    display: block;
    height: 60px;
    position: absolute;
    left: 77%;
    top: -60px;
    width: 60px;
	transition: all ease 0.5s;
}
.chatbtn::before {
    content: "Chat";
    font-size: 18px;
    left: 9px;
    position: absolute;
    top: 13px;
    width: 50px;
	color: #fff;
}
.chatbtn.offline::before {
    content: "Offline";
    font-size: 17px;
    left: 3px;
}
.views{
	min-height: 40px;
}
.sel_user {
    display: block;
    height: 30px;
    margin: 10px auto auto !important;
    max-width: 200px;
    width: 100%;
}
</style>
<section class="section-10 bg-selago">
<div class="shell">
  <ul class="list-inline list-inline-12 list-inline-icon p tleft breads">
	<li><a href="<?=base_url();?>trang-chu.html"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;Trang chủ </a></li>
	<li><i class="fa fa-angle-right" aria-hidden="true"></i> <a href="<?=base_url();?>tu-van.html">Tổ tư vấn độc lập</a></li>
	</li>
	<input id="uri" type="hidden" name="uri" value="" />
  </ul>
</div>
</section> 
<section class="text-left section-40 section-md-30">
  <div class="inset-lg-left-45 inset-lg-right-45 inset-xl-left-130 inset-xl-right-85">
	<div class="shell-wide shell-wide-custom">
	  <div class="range range-xs-center range-lg-right range-xl-justify">
		<div class="cell-sm-12 cell-md-12 cell-xl-12">
		  <div class="inset-md-right-35 inset-xl-right-0">
			<h3 class="text-primary text-center">Chăm Sóc Khách Hàng</h3>
			<div class="offset-top-40 range range-xs-center">
			<?php foreach ($userServiceList as $item) { ?>
				<div class="cell-md-4">
					<a href="<?=base_url()?>tu-van/dt<?=$item->id?>">
						<div class="user_info-container">
							<div class="user_info cskh">
								<img class="user_img" src="<?=base_url()?>files/user/<?=$item->signature?>">
								<p class="username"><?=$item->fullname?></p>
								<p class="views text-center">
									Bạn có thắc mắc về dịch vụ của chúng tôi?
									<br>Bạn có những bức xúc về nhân viên tư vấn?
									<br>Hãy chat với chúng tôi, chúng tôi sẽ cố hết sức để giúp bạn.
								</p>
							</div>
							<span class="chatbtn" href="javascript:;"></span>
						</div>
					</a>
				</div>
			<?php break;} ?>
			</div>
		  </div>
		  <div class="inset-md-right-35 inset-xl-right-0 offset-top-40">
			<h3 class="text-primary text-center">Tổ Tư Vấn Độc Lập</h3>
			<div class="offset-top-20">
				<div class="text-center">Chọn nhanh nhân viên tư vấn</div>
				<div class="text-center">
					<select id="sel_user" class="sel_user">
						<option></option>
						<?php foreach ($userList as $item) {
								$status = 'Online';
								$style = '';
								if (!$item->online_status) {
									$status = 'Offline';
									$style = "style='color: #ccc;'";
								}
						?>
							<option <?=$style?> value="<?=base_url()?>tu-van/dt<?=$item->id?>"><?=$item->fullname?> - <?=$item->username?> - <?=$status?></option>
						<?php } ?>
					</select>
				</div>
				
			</div>
			<div class="offset-top-40 range">
			<?php foreach ($userList as $item) {
					$status = '';
					if (!$item->online_status) {
						$status = 'offline';
					}
			?>
				<div class="cell-md-4">
					<a href="<?=base_url()?>tu-van/dt<?=$item->id?>">
						<div class="user_info-container">
							<div class="user_info <?=$status?>">
								<img class="user_img" src="<?=base_url()?>files/user/<?=$item->signature?>">
								<p class="username"><?=$item->fullname?></p>
								<!--<p>ID: <?=$item->username?></p>-->
								<p>Trình độ: <?=$item->level?></p>
								<p>Bằng cấp: <?=$item->degree?></p>
								<p>Kinh Nghiệm: <?=$item->experience?></p>
								<p class="views">Quan điểm: <?=$item->views?></p>
							</div>
							<span class="chatbtn <?=$status?>" href="javascript:;"></span>
						</div>
					</a>
				</div>
			<?php } ?>
			</div>
		  </div>
		</div>
	  </div>
	</div>
  </div>
</section>
<script>
$('#sel_user').change(function(){
	window.location = this.value;
})
</script>