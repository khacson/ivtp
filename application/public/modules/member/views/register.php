<link rel="stylesheet" type="text/css" href="<?=url_tmpl();?>login/css/main.css">
<div class="limiter">
	<div class="container-login100" style="background-image: url('<?=url_tmpl();?>login/images/bg-01.jpg');">
		<div class="wrap-login100">
			<form class="login-form ">
				<span class="login-form-title p-b-49">
					Đăng ký thành viên
				</span>
				<div class="wrap-input100 validate-input m-b-23" >
					<span class="label-input100 mbta20"><b>Họ tên <span style="font-weight:300;">(<span class="red">*</span>)</span></b></span>
					<div class="ruby">
						<i class="fa fa-user-o " aria-hidden="true"></i>
						<input class="input100" type="text" id="fullname" name="fullname" placeholder="Nhập nhập họ tên" value="">
						<span class="focus-input100"></span>
					</div>
				</div>
				<div class="wrap-input100 validate-input m-b-23 ">
					<span class="label-input100 mbta20"><b>Giới tính <span style="font-weight:300;">(<span class="red">*</span>)</b></span></span>
					<div class="ruby">
						<table class="tbsex">
							<tr>
								
								<td>
									<label> Nam
										 <input type="radio" name="sex" value="1">
									</label>
								</td>
								<td>
									<label> Nữ
										 <input type="radio" name="sex" value="2">
									</label>
								</td>
								<td>
									<label> Giới tính khác
										 <input type="radio" name="sex" value="3">
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
					<span class="label-input100 mbta20"><b>Email <span style="font-weight:300;">(<span class="red">*</span>)</b></span></span>
					<div class="ruby">
						<i class="fa fa-envelope-o" aria-hidden="true"></i>
						<input class="input100" type="text" id="email" name="email" placeholder="Nhập tài email" value="">
						<span class="focus-input100"></span>
					</div>
				</div>
				<div class="wrap-input100 validate-input m-b-23" >
					<span class="label-input100 mbta20"><b>Điện thoại <span style="font-weight:300;">(<span class="red">*</span>)</b></span></span>
					<div class="ruby">
						<i class="fa fa-phone" aria-hidden="true"></i>
						<input class="input100" type="text" id="phone" name="phone" placeholder="Nhập điện thoại" value="">
						<span class="focus-input100"></span>
					</div>
				</div>
				
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
						<input class="input100" type="cfassword" id="cfassword" name="password" placeholder="Nhập mật khẩu">
						<span class="focus-input100"></span>
					</div>
				</div>
				<div class="wrap-input100 validate-input">
					<span class="label-input100 mbta20"><b>Sở thích đầu tư</b></span>
					<div class="ruby">
						<i class="fa fa-lock " aria-hidden="true"></i>
						<input class="input100" type="hobby" id="hobby" name="text" placeholder="Nhập sở thích">
						<span class="focus-input100"></span>
					</div>
				</div>
				<div class="wrap-input100 validate-input">
					<span class="label-input100 mbta20"><b>Công việc</b></span>
					<div class="ruby">
						<i class="fa fa-lock " aria-hidden="true"></i>
						<input class="input100" type="working" id="working" name="text" placeholder="Nhập công việc">
						<span class="focus-input100"></span>
					</div>
				</div>
				<div class="wrap-input100 validate-input">
					<span class="label-input100 mbta20"><b>Địa chỉ liên hệ</b></span>
					<div class="ruby">
						<i class="fa fa-lock " aria-hidden="true"></i>
						<input class="input100" type="address" id="address" name="text" placeholder="Nhập địa chỉ liên hệ">
						<span class="focus-input100"></span>
					</div>
				</div>
				<div class="container-login-form-btn mtop30">
					<div class="wrap-login-form-btn">
						<div class="login-form-bgbtn"></div>
						<button id="clickRegister" class="login-form-btn" type="button">
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
		$('#clickRegister').click(function(){
			var fullname = $('#fullname').val();  
			var phone = $('#phone').val(); 
			var sex = $('input[name="sex"]:checked').val();
			var birthday = $('#birthday').val(); 
			var email = $('#email').val(); 
			var password = $('#password').val(); 
			var cfassword = $('#cfassword').val(); 
			if(fullname == ''){
				warning('Họ tên không được trống.');
				$('#fullname').focus(); return false;
			}
			if (sex == undefined){
				warning('Chọn giới tính.');
				return false;
			}
			if(phone == ''){
				warning('Điện thoại không được trống.');
				$('#phone').focus(); return false;
			}
			if(email == ''){
				warning('Email không được trống.');
				$('#email').focus(); return false;
			}
			if(password == ''){
				warning('Mật khẩu không được trống.');
				$('#password').focus(); return false;
			}
			if(password != cfassword){
				warning('Xác nhận mật khẩu không đúng.');
				$('#cfassword').focus(); return false;
			}
			var address = $('#address').val(); 
			var working = $('#working').val(); 
			var hobby = $('#hobby').val(); 
			$.ajax({
				url : '<?=base_url();?>member/' + 'clickregistor',
				type: 'POST',
				async: false,
				data:{fullname:fullname,phone:phone,email:email,sex:sex,password:password,birthday:birthday,address:address,working:working,hobby:hobby},  
				success:function(datas){
					
				}
			});
		});
	});
</script>