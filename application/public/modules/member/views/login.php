<link rel="stylesheet" type="text/css" href="<?=url_tmpl();?>login/css/main.css">
<div class="limiter">
	<div class="container-login100" style="background-image: url('<?=url_tmpl();?>login/images/bg-01.jpg');">
		<div class="wrap-login100">
			<form class="login-form ">
				<span class="login-form-title p-b-49">
					Đăng nhập
				</span>

				<div class="wrap-input100 validate-input m-b-23" >
					<span class="label-input100 mbta20"><b>Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></span>
					<div class="ruby">
						<i class="fa fa-envelope-o" aria-hidden="true"></i>
						<input class="input100" type="text" id="username" name="username" placeholder="Nhập tài email" value="">
						<span class="focus-input100"></span>
					</div>
				</div>

				<div class="wrap-input100 validate-input">
					<span class="label-input100 mbta20"><b>Mật khẩu</b></span>
					<div class="ruby">
						<i class="fa fa-lock" aria-hidden="true"></i>
						<input class="input100" type="password" id="password" name="password" placeholder="Nhập mật khẩu">
						<span class="focus-input100" ></span>
					</div>
				</div>
				<div class="text-right mtop30">
					<a href="<?=base_url();?>quen-mat-khau.html">
						Quên mật khẩu?
					</a>
				</div>
				<div class="container-login-form-btn mtop20">
					<div class="wrap-login-form-btn">
						<div class="login-form-bgbtn"></div>
						<button id="clicklogin" class="login-form-btn">
							Đăng nhập
						</button>
					</div>
				</div>

				<div class="txt1 text-center mtop20">
					<span>
						Đăng nhập bằng mạng xã hội
					</span>
				</div>
				<div class="flex-c-m mtop10">
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
<Script>
	$(function(){
		$('#username').val('');
		$('#password').val('');
		$('#clicklogin').click(function(){
			
		});
	});
</script>