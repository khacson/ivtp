<link rel="stylesheet" type="text/css" href="<?=url_tmpl();?>login/css/main.css">
<div class="limiter">
	<div class="container-login100" style="background-image: url('<?=url_tmpl();?>login/images/bg-01.jpg');">
		<div class="wrap-login100">
			<form class="login-form ">
				<span class="login-form-title p-b-49">
					Xác nhận mật khẩu mới
				</span>
				<div class="wrap-input100 validate-input">
					<span class="label-input100"><b>Mật khẩu</b></span>
					<div class="fleft">
						<i class="fa fa-lock" aria-hidden="true"></i>
					</div>
					<div >
						<input class="input100" type="password" id="password" name="password" placeholder="Nhập mật khẩu">
						<span class="focus-input100" ></span>
					</div>
				</div>
				<div class="wrap-input100 validate-input">
					<span class="label-input100"><b>Xác nhận khẩu</b></span>
					<div class="fleft mlefa90">
						<i class="fa fa-lock" aria-hidden="true"></i>
					</div>
					<div >
						<input class="input100" type="password" id="cfpassword" name="cfpassword" placeholder="Nhập xác nhận mật khẩu">
						<span class="focus-input100" ></span>
					</div>
				</div>
				<div class="container-login-form-btn mtop30">
					<div class="wrap-login-form-btn">
						<div class="login-form-bgbtn"></div>
						<button class="login-form-btn">
							Đổi mật khẩu
						</button>
					</div>
				</div>
				
			</form>
		</div>
	</div>
</div>
<Script>
	$(function(){
		$('#username').val('');
		$('#password').val('');
		$('#fullname').val('');
		$('#cfpassword').val('');
	});
</script>