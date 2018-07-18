<link rel="stylesheet" type="text/css" href="<?=url_tmpl();?>login/css/main.css">
<div class="limiter">
	<div class="container-login100" style="background-image: url('<?=url_tmpl();?>login/images/bg-01.jpg');">
		<div class="wrap-login100">
			<form class="login-form ">
				<span class="login-form-title p-b-49">
					Xác nhận email
				</span>

				<div class="wrap-input100 validate-input m-b-23" >
					<span class="label-input100 mbta20"><b>Email <span style="font-weight:300;">(<span class="red">*</span>)</b></span></b></span>
					<div class="ruby">
						<i class="fa fa-envelope-o" aria-hidden="true"></i>
						<input class="input100" type="text" id="email" name="email" placeholder="Nhập email" value="">
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
			var email = $('#email').val();  
			var password = $('#password').val(); 
			if(email == ''){
				warning('Email không được trống');
				$('#email').focus(); return false;
			}
			$('.loading').show();
			$.ajax({
				url : '<?=base_url();?>member/' + 'clickForgetpassword',
				type: 'POST',
				async: false,
				data:{email:email},  
				success:function(datas){
					$('.loading').hide();
					if(datas == 1){
						success("Email xác nhận đổi mật khẩu đã được gửi đến bạn. Bạn vui lòng kiểm tra email.");
					}
					else if(datas == -1){
						warning("Email không tồn tại."); return false;
					}
					else{
						error("Gửi email xác nhận không thành công."); return false;
					}
				}
			});
		});
	});
</script>