<link rel="stylesheet" type="text/css" href="<?=url_tmpl();?>login/css/main.css">
<div class="limiter">
	<div class="container-login100" style="background-image: url('<?=url_tmpl();?>login/images/bg-01.jpg');">
		<div class="wrap-login100">
			<form class="login-form ">
				<span class="login-form-title p-b-49">
					Đăng ký thành viên
				</span>

				<div class="wrap-input100 validate-input m-b-23" >
					<span class="label-input100"><b>Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></span>
					<div class="fleft">
						<i class="fa fa-envelope-o" aria-hidden="true"></i>
					</div>
					<div>
						<input class="input100" type="text" id="username" name="username" placeholder="Nhập tài email" value="">
						<span class="focus-input100"></span>
					</div>
				</div>
				<div class="wrap-input100 validate-input m-b-23" >
					<span class="label-input100"><b>Họ tên&nbsp;&nbsp;&nbsp;</b></span>
					<div class="fleft">
						<i class="fa fa-user-o " aria-hidden="true"></i>
					</div>
					<div>
						<input class="input100" type="text" id="fullname" name="fullname" placeholder="Nhập nhập họ tên" value="">
						<span class="focus-input100"></span>
					</div>
				</div>
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
							Đăng ký
						</button>
					</div>
				</div>
				<div class="flex-col-c mtop20">
					<a href="<?=base_url();?>dang-nhap.html" class="txt2">
						Đăng nhập
					</a>
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