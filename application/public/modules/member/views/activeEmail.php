<link rel="stylesheet" type="text/css" href="<?=url_tmpl();?>login/css/main.css">
<div class="limiter">
	<div class="container-login100" style="background-image: url('<?=url_tmpl();?>login/images/bg-01.jpg');">
		<div class="wrap-login100">
			<form class="login-form ">
				<span class="login-form-title p-b-49">
					Nhập mật khẩu mới
				</span>

				<div class="wrap-input100 validate-input">
					<span class="label-input100 mbta20"><b>Mật khẩu <span style="font-weight:300;">(<span class="red">*</span>)</b></span></span>
					<div class="ruby">
						<i class="fa fa-lock" aria-hidden="true"></i>
						<input class="input100" type="password" id="password" name="password" placeholder="Nhập mật khẩu">
						<span class="focus-input100"></span>
					</div>
				</div>
				<div class="wrap-input100 validate-input">
					<span class="label-input100 mbta20"><b>Xác nhận mật khẩu <span style="font-weight:300;">(<span class="red">*</span>)</b></span></span>
					<div class="ruby">
						<i class="fa fa-lock " aria-hidden="true"></i>
						<input class="input100" type="password" id="cfassword" name="cfassword" placeholder="Nhập mật khẩu">
						<span class="focus-input100"></span>
					</div>
				</div>

				<div class="container-login-form-btn mtop30">
					<div class="wrap-login-form-btn">
						<div class="login-form-bgbtn"></div>
						<button class="login-form-btn" id="clickforgetpassword" type="button">
							Gửi
						</button>
					</div>
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
		$('#email').val('');
		$('#clickforgetpassword').click(function(){
			var password = $('#password').val(); 
			var cfassword = $('#cfassword').val(); 
			var id = '<?=$id;?>';
			if(password == ''){
				warning('Mật khẩu không được trống');
				$('#password').focus(); return false;
			}
			if(password != cfassword){
				warning('Xác nhận mật khẩu không đúng.');
				$('#cfassword').focus(); return false;
			}
			$.ajax({
				url : '<?=base_url();?>member/' + 'transPassword',
				type: 'POST',
				async: false,
				data:{id:id,password:password},  
				success:function(datas){
					if(datas == 1){
						success("Đổi mật khẩu thành công.");
					}
					else{
						error("Đổi mật khẩu không thành công."); return false;
					}
				}
			});
		});
	});
</script>