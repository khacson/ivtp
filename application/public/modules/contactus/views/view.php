<section class="section-40 section-md-60 text-left">
          <div class="shell-wide">
            <div class="range range-xs-center">
              <div class="cell-sm-10 cell-md-8">
                <div class="inset-md-right-60 inset-xl-left-85 inset-xl-right-120">
                  <hr class="divider hr-left-0 bg-bermuda">
                  <h3 class="offset-top-20">Liên hệ</h3>
                  <!-- RD Mailform-->
                  <form class="rd-mailform text-left offset-top-35" data-form-output="form-output-global" data-form-type="contact" method="post" action="bat/rd-mailform.php">
                    <div class="range range-xs-center">
                      <div class="cell-lg-6">
                        <div class="form-group form-group-outside">
                          <label class="form-label form-label-outside" for="contact-first-name">Họ tên (<span class="red">*</span>)</label>
                          <input class="form-control" type="text" id="fullname" name="fullname">
                        </div>
                      </div>
                      <div class="cell-lg-6 offset-top-10 offset-lg-top-0">
                        <div class="form-group form-group-outside">
                          <label class="form-label form-label-outside" for="contact-last-name">Điện thoại (<span class="red">*</span>)</label>
                          <input class="form-control" type="text" name="phone" id="phone">
                        </div>
                      </div>
                      <div class="cell-lg-6 offset-top-10">
                        <div class="form-group form-group-outside">
                          <label class="form-label form-label-outside" for="contact-email">E-mail</label>
                          <input class="form-control" type="text" name="email" id="email">
                        </div>
                      </div>
                      <div class="cell-lg-6 offset-top-10">
                        <div class="form-group form-group-outside">
                          <label class="form-label form-label-outside" for="contact-phone">Địa chỉ</label>
                          <input class="form-control" type="text" name="address" id="address">
                        </div>
                      </div>
                      <div class="cell-lg-12 offset-top-10">
                        <div class="form-group form-group-outside">
                          <label class="form-label form-label-outside" for="contact-message">Nội dung (<span class="red">*</span>)</label>
                          <textarea class="form-control" id="description" name="description"></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="offset-top-20">
                      <button class="btn btn-primary" id="send" type="button">Gửi</button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="cell-sm-10 cell-md-4 offset-top-90 offset-md-top-0">
                <hr class="divider hr-left-0 bg-bermuda">
                <h5 class="offset-top-15">Lên kết với chúng tôi</h5>
                <ul class="list-inline list-inline-2 list-primary offset-top-20">
                  <li class="inset-left-0"><a target="_blank" class="icon icon-xs icon-circle fa fa-facebook text-gray-lighter" href="<?=$finds->url_facebook;?>"></a></li>
                  <li><a target="_blank" class="icon icon-xs icon-circle fa fa-twitter text-gray-lighter" href="<?=$finds->url_twitter;?>"></a></li>

                  <li><a target="_blank" class="icon icon-xs icon-circle fa fa-youtube text-gray-lighter" href="<?=$finds->url_youtube;?>"></a></li>
                  <li><a target="_blank" class="icon icon-xs icon-circle fa fa-google text-gray-lighter" href="<?=$finds->url_google;?>"></a></li>
                </ul>
                <div class="offset-top-30 offset-md-top-30">
                  <hr class="divider hr-left-0 bg-bermuda">
                  <h5 class="offset-top-15">Điện thoại</h5>
                  <div class="offset-top-20">
                    <!-- Unit-->
                    <div class="unit unit-middle unit-horizontal unit-spacing-xxs">
                      <div class="unit-left">
							 <i class="fa fa-phone icon-normal icon-sm text-primary" aria-hidden="true"></i>
					  </div>
                      <div class="unit-body">
                        <div class="reveal-inline-block">
                          <p><a class="text-gray-light" href="callto:#<?=$finds->phone;?>"><?=$finds->hotline;?></a></p>
                        </div> - 
                        <div class="reveal-inline-block">
                          <p><a class="text-gray-light" href="callto:#<?=$finds->phone;?>"><?=$finds->phone;?></a></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="offset-top-30 offset-md-top-30">
                  <hr class="divider hr-left-0 bg-bermuda">
                  <h5 class="offset-top-15">E-mail</h5>
                  <div class="offset-top-20">
                    <!-- Unit-->
                    <div class="unit unit-middle unit-horizontal unit-spacing-xxs">
                      <div class="unit-left">
						    <i class="fa fa-envelope-o icon-normal icon-sm text-primary" aria-hidden="true"></i>
					  </div>
                      <div class="unit-body">
                        <p><a class="text-gray-light" href="mailto:#<?=$finds->email;?>"><?=$finds->email;?></a></p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="offset-top-30 offset-md-top-30">
                  <hr class="divider hr-left-0 bg-bermuda">
                  <h5 class="offset-top-15">Địa chỉ</h5>
                  <div class="offset-top-20 p">
                    <!-- Unit-->
                    <div class="unit unit-middle unit-md-top unit-xl-middle unit-horizontal unit-spacing-xxs">
                      <div class="unit-left">
							<i class="fa fa-map-marker icon-normal icon-sm text-primary" aria-hidden="true"></i>
					  </div>
                      <div class="unit-body"><a class="text-gray-light" href="<?=base_url();?>lien-he.html"><?=$finds->address;?></a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
  <link rel="stylesheet" href="<?=url_tmpl();?>toast/toastr.min.css">
  <script src="<?=url_tmpl();?>toast/toastr.min.js"></script>
  <script src="<?=url_tmpl();?>toast/notifications.js"></script>
  <script>
		$(function(){ 
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
  