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
<div class="loading" style="display: none;">
	<div class="blockUI blockOverlay" style="width: 100%;height: 100%;top:0px;left:0px;position: absolute;background-color: rgb(0,0,0);opacity: 0.1;z-index: 999999999999;">
	</div>
	<div class="blockUI blockMsg blockElement" style="width: 30%;position: absolute;top: 0%;left:35%;text-align: center; z-index: 999999999999;">
		<img src="<?=url_tmpl()?>images/loading2.gif" style="z-index: 999999999999;position: absolute;"/>
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
						success("Xác nhận email thành công. Vui lòng kiểm tra email để xác nhận tài khoản.");
					}
					else if(datas == -1){
						warning("Email không tồn tại."); return false;
					}
					else{
						error("Xác nhận email không thành công."); return false;
					}
				}
			});
		});
	});
</script>