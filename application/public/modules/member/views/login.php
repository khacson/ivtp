<link rel="stylesheet" type="text/css" href="<?=url_tmpl();?>login/css/main.css">
<style>
.login-form .ruby {
	display: block !important;
}
.login-form .label-input100 {
	float: none;
}
.login-form .input100 {
	margin-top: 0px !important;
}
.login-form .ruby i {
    left: 5px;
    position: absolute;
    top: 39px;
}
.login-form .tbsex {
    margin-top: 20px !important;
}
</style>
<div class="limiter">
	<div class="container-login100" style="background-image: url('<?=url_tmpl();?>login/images/bg-01.jpg');">
		<div class="wrap-login100">
			<form class="login-form ">
				<span class="login-form-title p-b-49">
					Đăng nhập
				</span>

				<div class="wrap-input100 validate-input m-b-23" >
					<span class="label-input100 mbta20"><b>Email</b></span>
					<div class="ruby">
						<i class="fa fa-envelope-o" aria-hidden="true"></i>
						<input onkeyup="clickLogin(event.keyCode)" class="input100" type="text" id="email" name="email" placeholder="Nhập email" value="<?=$pbemail?>">
						<span class="focus-input100"></span>
					</div>
				</div>

				<div class="wrap-input100 validate-input">
					<span class="label-input100 mbta20"><b>Mật khẩu</b></span>
					<div class="ruby">
						<i class="fa fa-lock" aria-hidden="true"></i>
						<input value="<?=$pbpass?>" onkeyup="clickLogin(event.keyCode)" class="input100" type="password" id="password" name="password" placeholder="Nhập mật khẩu">
						<span class="focus-input100" ></span>
					</div>
				</div>
				<div class="mtop30">
					<div class="rememberlogin">
						<label>
							<input type="checkbox" value="" id="remember" />
							Ghi nhớ
						</label>
					</div>
					<div class="forgetpass">
						<a href="<?=base_url();?>quen-mat-khau.html">
							Quên mật khẩu?
						</a>
					</div>
				</div>
				<div class="container-login-form-btn mtop20 clear">
					<div class="wrap-login-form-btn">
						<div class="login-form-bgbtn"></div>
						<button id="clicklogin" type="button" class="login-form-btn">
							Đăng nhập
						</button>
					</div>
				</div>

				<div class="txt1 text-center mtop20 hide">
					<span>
						Đăng nhập bằng mạng xã hội
					</span>
				</div>
				<div class="flex-c-m mtop10 hide">
					<a href="#" class="login100-social-item bg1">
						<i class="fa fa-facebook"></i>
					</a>
					<a href="#" class="login100-social-item bg3">
						<i class="fa fa-google"></i>
					</a>
				</div>
				<div class="flex-col-c mtop20">
					<a href="<?=base_url();?>dang-ky.html" class="txt2">
						Đăng ký
					</a>
				</div>
			</form>
		</div>
	</div>
</div>
  <link rel="stylesheet" href="<?=url_tmpl();?>toast/toastr.min.css">
  <script src="<?=url_tmpl();?>toast/toastr.min.js"></script>
  <script src="<?=url_tmpl();?>toast/notifications.js"></script>
<Script>
	$(function(){
		//$('#email').val('');
		//$('#password').val('');
		$('#clicklogin').click(function(){
			var email = $('#email').val();  
			var password = $('#password').val(); 
			var remember = $('#remember').is(':checked'); 
			if(email == ''){
				warning('Email không được trống');
				$('#email').focus(); return false;
			}
			if(password == ''){
				warning('Mật khẩu không được trống.');
				$('#password').focus(); return false;
			}
			$.ajax({
				url : '<?=base_url();?>member/' + 'clicklogin',
				type: 'POST',
				async: false,
				data:{email:email, password:password, remember:remember},  
				success:function(datas){
					if(datas == 1){
						success("Đăng nhập thành công.");
						setTimeout(function(){
							window.location.href = '<?=base_url();?>trang-chu.html';
						}, 500)
						
					}
					else if(datas == -1){
						warning("Tài khoản chưa kích hoạt."); return false;
					}
					else{
						error("Đăng nhập không thành công. Vui lòng kiểm tra lại email và mật khẩu."); return false;
					}
				}
			});
		});
	});
	function clickLogin(keyCode) {
		if (keyCode == 13) {
			$('#clicklogin').trigger('click');
		}
	}
</script>