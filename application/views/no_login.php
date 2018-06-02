 <div class="col-md-6">
				<div class="col-md-11">
					<h3 class="h3title">Đăng nhập bằng tài khoản <span class="cblue">&nbsp;&nbsp;Sangiaodichviet</span></h3>
				</div>
				<div class="col-md-11">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-envelope"></i>
						</span>
						<input type="text" id="email" class="form-control" placeholder="Email" onblur="if(this.value=='') this.value='Email'" 
 onfocus="if(this.value =='Email' ) this.value=''" value="Email" autocomplete="off">
					</div>
				</div>
				<div class="col-md-11 mtop15">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-key"></i>
						</span>
						<input type="password" class="form-control" id="password" placeholder="Mật khẩu" onblur="if(this.value=='') this.value='Mật khẩu'" 
 onfocus="if(this.value =='Mật khẩu' ) this.value=''" value="Mật khẩu" autocomplete="off">
					</div>
				</div>
				<div class="col-md-11 mtop15">
					<a class="btn yellow" id="login" href="#">
						Đăng nhập
					</a>
					<div class="pull-right mtop10">
						<a href="#">Quên mật khẩu</a>
					</div>
				</div>
				<div class="col-md-11 error" id="error"></div>
		 </div>
		 <div class="col-md-6">
			  <div class="col-md-11">
					<h3 class="h3title">Đăng nhập bằng tài khoản <span class="cblue">&nbsp;&nbsp;mạng xã hội</span></h3>
				</div>
				<div class="col-md-11 mtop10">
					<a class="btn blue h37 mtop10 rd3" href="#">
					<i class="fa fa-fw fa-facebook"></i>Facebook</a>
					&nbsp;&nbsp;&nbsp;
					<a class="btn red h37 mtop10 rd3" href="#" style="width:109px;">
						<i class="fa fa-fw fa-google-plus"></i>Google
					</a>
				</div>
		 </div>
		 <script type="text/javascript">
			$(function(){
				$("#login").click(function(){
					var email = $("#email").val(); 
					var password = $("#password").val(); 
					var link = '<?=base_url();?>dangnhap/login';
					$.ajax({
						  url:link,
						  async: false,
						  type: 'POST',
						  data:{email:email,password:password},
						  success:function(data) {
							  if(data == 0){ 
									$(".error").html('Đăng nhập không thành công.');
									$("#email").focus();
									return false;
							  }
							  else if(data == 1){ 
								 window.location = '<?=base_url()?>home.html';
							  }
						  }
					});
				});
			});
		</script>