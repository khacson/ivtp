<link rel="stylesheet" type="text/css" href="<?=url_tmpl();?>login/css/main.css">
<div class="limiter">
	<div class="container-login100" style="background-image: url('<?=url_tmpl();?>login/images/bg-01.jpg');">
		<div class="wrap-login100">
			<form class="login-form ">
				<span class="login-form-title p-b-49">
					Đăng ký thành viên
				</span>
				<div class="wrap-input100 validate-input m-b-23" >
					<span class="label-input100 mbta20"><b>Họ tên</b></span>
					<div class="ruby">
						<i class="fa fa-user-o " aria-hidden="true"></i>
						<input class="input100" type="text" id="fullname" name="fullname" placeholder="Nhập nhập họ tên" value="">
						<span class="focus-input100"></span>
					</div>
				</div>
				<div class="wrap-input100 validate-input m-b-23 ">
					<span class="label-input100 mbta20"><b>Giới tính</b></span>
					<div class="ruby">
						<table class="tbsex">
							<tr>
								
								<td>
									<label> Nam
										 <input type="radio" name="sex" value="sex" value="1">
									</label>
								</td>
								<td>
									<label> Nữ
										 <input type="radio" name="sex" value="sex" value="2">
									</label>
								</td>
								<td>
									<label> Giới tính khác
										 <input type="radio" name="sex" value="sex" value="3">
									</label>
								</td>
							</tr>
						</table>
					</div>
				</div>
				<div class="wrap-input100 validate-input m-b-23 " >
					<span class="label-input100 mbta20"><b>Ngày sinh</b></span>
					<div class="ruby">
						<i class="fa fa-calendar" aria-hidden="true"></i>
						<input class="input100" type="text" id="birthday" name="birthday" placeholder="dd/mm/yyyy" value="">
						<span class="focus-input100"></span>
					</div>
				</div>
				<div class="wrap-input100 validate-input m-b-23" >
					<span class="label-input100 mbta20"><b>Email</b></span>
					<div class="ruby">
						<i class="fa fa-envelope-o" aria-hidden="true"></i>
						<input class="input100" type="text" id="email" name="email" placeholder="Nhập tài email" value="">
						<span class="focus-input100"></span>
					</div>
				</div>
				<div class="wrap-input100 validate-input m-b-23" >
					<span class="label-input100 mbta20"><b>Điện thoại</b></span>
					<div class="ruby">
						<i class="fa fa-phone" aria-hidden="true"></i>
						<input class="input100" type="text" id="phone" name="phone" placeholder="Nhập điện thoại" value="">
						<span class="focus-input100"></span>
					</div>
				</div>
				
				<div class="wrap-input100 validate-input">
					<span class="label-input100 mbta20"><b>Mật khẩu</b></span>
					<div class="ruby">
						<i class="fa fa-lock" aria-hidden="true"></i>
						<input class="input100" type="password" id="password" name="password" placeholder="Nhập mật khẩu">
						<span class="focus-input100"></span>
					</div>
				</div>
				<div class="wrap-input100 validate-input">
					<span class="label-input100 mbta20"><b>Xác nhận mật khẩu</b></span>
					<div class="ruby">
						<i class="fa fa-lock " aria-hidden="true"></i>
						<input class="input100" type="cpassword" id="cpassword" name="password" placeholder="Nhập mật khẩu">
						<span class="focus-input100"></span>
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

  <link rel="stylesheet" href="<?=url_tmpl();?>toast/toastr.min.css">
  <script src="<?=url_tmpl();?>toast/toastr.min.js"></script>
  <script src="<?=url_tmpl();?>toast/notifications.js"></script>
<Script>
	$(function(){
		$('#fullname').val('');
		$('#birthday').val('');
		$('#email').val('');
		$('#phone').val('');
		$('#password').val('');
		$('#cfpassword').val('');
		$('#send').click(function(){
			var fullname = $('#fullname').val();  
			var phone = $('#phone').val(); 
			if(fullname == ''){
				 warning('Họ tên không được trống.');
				 $('#fullname').focus(); return false;
			 }
			 if(phone == ''){
				 warning('Điện thoại không được trống.');
				 $('#phone').focus(); return false;
			 }
			
			 var email = $('#email').val();
			 var address = $('#address').val();
			 var description = $('#description').val();
			 if(description == ''){
				 warning('Liên hệ không được trống.');
				 $('#description').focus(); return false;
			 }
			$.ajax({
					url : '<?=base_url();?>contactus/' + 'save',
					type: 'POST',
					async: false,
					data:{fullname:fullname,phone:phone,email:email,address:address,description:description},  
					success:function(datas){
						success('Cảm ơn bạn đã liên hệ với công ty chúng tôi. Chúng tôi sẽ phản hồi bạn trong thời gian sớm nhất');
					}
			});
		});
	});
</script>