<link rel="stylesheet" type="text/css" href="<?=url_tmpl();?>login/css/main.css">
<div class="limiter">
	<div class="container-login100" style="background-image: url('<?=url_tmpl();?>login/images/bg-01.jpg');">
		<div class="wrap-login100">
			<form class="login-form ">
				<span class="login-form-title p-b-49">
					Xác nhận email
				</span>

				<div class="wrap-input100 validate-input m-b-23" >
					<span class="label-input100 mbta20"><b>Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></span>
					<div class="ruby">
						<i class="fa fa-envelope-o" aria-hidden="true"></i>
						<input class="input100" type="text" id="username" name="username" placeholder="Nhập tài email" value="">
						<span class="focus-input100"></span>
					</div>
				</div>

				<div class="container-login-form-btn mtop30">
					<div class="wrap-login-form-btn">
						<div class="login-form-bgbtn"></div>
						<button class="login-form-btn">
							Gửi
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
	});
</script>