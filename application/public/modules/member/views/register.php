<style>
.avatar-container #userfile {
    height: 35px;
    margin-bottom: 5px;
    padding-left: 0;
}
.avatar-container {
    overflow: hidden;
    padding-bottom: 5px;
}
</style>
<link rel="stylesheet" href="<?=url_tmpl()?>jcrop/jquery.Jcrop.min.css" />
<link rel="stylesheet" type="text/css" href="<?=url_tmpl();?>login/css/main.css">
<div class="limiter">
	<div class="container-login100" style="background-image: url('<?=url_tmpl();?>login/images/bg-01.jpg');">
		<div class="wrap-login100">
			<form class="login-form ">
				<input type="hidden" class="searchs" id="x" name="x" />
				<input type="hidden" class="searchs" id="y" name="y" />
				<input type="hidden" class="searchs" id="w" name="w" />
				<input type="hidden" class="searchs" id="h" name="h" />
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
									<label>
										 <input type="radio" name="sex" value="1">  Nam
									</label>
								</td>
								<td>
									<label>
										 <input type="radio" name="sex" value="2">  Nữ
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
						<input class="input100" type="text" id="eemail" name="eemail" placeholder="Nhập email" value="">
						<span class="focus-input100"></span>
					</div>
				</div>
				<div class="wrap-input100 validate-input m-b-23" >
					<span class="label-input100 mbta20"><b>Điện thoại </b></span>
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
						<input class="input100" type="password" id="cfassword" name="cfassword" placeholder="Nhập mật khẩu">
						<span class="focus-input100"></span>
					</div>
				</div>
				<div class="wrap-input100 validate-input m-b-23 avatar-container" >
					<span class="label-input100 mbta20"><b>Avatar </b></span><br>
					<div class="ruby">
						<input class="input100" type="file" id="userfile" name="userfile" value="">
					</div>
					<div id="show"></div>
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
<script>
	
    var rate;
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
			var email = $('#eemail').val(); 
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
			if(email == ''){
				warning('Email không được trống.');
				$('#eemail').focus(); return false;
			}
			if(!validateEmail(email) && email != ""){
				warning('Email không đúng định dạng'); 
				$("#eemail").focus();
				return false;	
			}
			if(password == ''){
				warning('Mật khẩu không được trống.');
				$('#password').focus(); return false;
			}
			if(password.length < 8){
				warning('Mật khẩu tối thiểu 8 ký tự.');
				$('#password').focus(); return false;
			}
			if(password != cfassword){
				warning('Xác nhận mật khẩu không đúng.');
				$('#cfassword').focus(); return false;
			}
			var address = $('#address').val(); 
			var working = $('#working').val(); 
			var hobby = $('#hobby').val(); 
			
			var data = new FormData();
			var objectfile = document.getElementById('userfile').files;
			data.append('userfile', objectfile[0]);
			data.append('fullname', fullname);
			data.append('phone',phone);
			data.append('email',email);
			data.append('sex',sex);
			data.append('password',password);
			data.append('birthday',birthday);
			data.append('address', '');
			data.append('working', '');
			data.append('hobby', '');
			data.append('x', $('#x').val());
			data.append('y', $('#y').val());
			data.append('w', $('#w').val());
			data.append('h', $('#h').val());
			
			$('.loading').show();
			$.ajax({
				url : '<?=base_url();?>member/' + 'clickregistor',
				type: 'POST',
				async: false,
				data:data,
				enctype: 'multipart/form-data',
				processData: false,  
				contentType: false, 
				success:function(datas){
					$('.loading').hide();
					if(datas == 1){
						success("Đăng ký tài khoản thành công. <br>Vui lòng xác nhận email để kích hoạt tài khoản.<br>Bạn sẽ được chuyển đến trang đăng nhập sau 5 giây."); 
						setTimeout(function(){
							window.location = '<?=base_url()?>dang-nhap.html';
						}, 6000);
						
						return false;
					}
					else if(datas == -1){
						warning('Tài khoản đã tồn tại.'); return false;
					}
					else if(datas == -2){
						warning('Vui lòng chỉ upload file hình.'); return false;
					}
					else if(datas == 0){
						error("Email đã tồn tại. Vui lòng nhập email khác.");
					}
					else{
						error("Có lỗi xảy ra. Vui lòng thử lại hoặc liên hệ với chúng tôi");
					}
				}
			});
		});
		
		$('#userfile').change(function(evt) {
            var files = evt.target.files;
            for (var i = 0, f; f = files[i]; i++){
                var size = f.size;
                if (size < 2048000){
                    if (!f.type.match('image.*'))
                    {
						error("Vui lòng chỉ upload file hình");
                        return false;
                    }
                    var reader = new FileReader();
                    reader.onload = (function(theFile) {
                        return function(e) {
							$('#show').html('');
                            $('#show').append('<img class="cropimage" src="' + e.target.result + '" style="max-width:100%; float:left; margin-left:5px;" />');
							var src = $('.cropimage').attr("src");
							var img = new Image();//tinh original width
							img.src = src;
							img.onload = function() {
								var curr_with = $('.cropimage').width();//co css
								rate = this.width / curr_with;//ti le thu nho
								//console.log(this.width);console.log(curr_with);
								$('.cropimage').Jcrop({
									aspectRatio: 1,
									setSelect: [0,0,60,60],
									aspectRatio: 100/100,
									allowSelect : false,
									onSelect: updateCoords,
									onRelease: updateCoords
								});
							}
                        };
                    })(f);
                    reader.readAsDataURL(f);
                }
                else{
                    $('#userfile').val('');
                    error("Dung lượng file phải nhỏ hơn 2Mb.");
					return false;
                }
            }
        });
	});
	function updateCoords(c){
		//console.log(rate);
		$('#x').val(c.x * rate);
		$('#y').val(c.y * rate);
		$('#w').val(c.w * rate);
		$('#h').val(c.h * rate);
	};
	function validateEmail(email){
		var emailReg = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
		var valid = emailReg.test(email);

		if(!valid) {
			return false;
		} else {
			return true;
		}
	}
</script>
<script src="<?= url_tmpl(); ?>jcrop/jquery.Jcrop.min.js" type="text/javascript"></script>