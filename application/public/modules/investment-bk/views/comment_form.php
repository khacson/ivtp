<?php 
$readonly = '';
if (!empty($m_fullname)) {
	$readonly = 'readonly';
}
?>
<div class="offset-top-60 offset-md-top-90">
  <hr class="divider hr-left-0 bg-bermuda">
  <div class="offset-top-15">
	<h5>Gửi bình luận</h5>
  </div>
  <div class="offset-top-15" id="comment_form">
	<!-- RD Mailform-->
	<form class="rd-mailform text-left" data-form-output="form-output-global" data-form-type="contact" novalidate="novalidate" method="post" action="<?=base_url()?>investment/save_comment">
		<input type="hidden" name="pid" value="<?=$postId?>" />
		<input type="hidden" name="parid" value="" />
		<input type="hidden" name="level" value="" />
	  <div class="range range-xs-center">
		<div class="cell-sm-6">
		  <div class="form-group form-group-outside">
			<label class="form-label form-label-outside" for="contact-first-name">Họ tên (<span class="red">*</span>)</label>
			<input value="<?=$m_fullname?>" <?=$readonly?> class="form-control" id="fullname" type="text" name="fullname" >
		  </div>
		</div>
		<div class="cell-sm-6">
		  <div class="form-group form-group-outside">
			<label class="form-label form-label-outside" for="contact-email">Email(
			<span class="red">*</span>)</label>
			<input value="<?=$m_email?>" <?=$readonly?> class="form-control" id="email" type="text" name="email" >
		  </div>
		</div>
		<div class="cell-sm-12 offset-top-10">
		  <div class="form-group form-group-outside">
			<label class="form-label form-label-outside" for="contact-message">Nội dung (<span class="red">*</span>)</label>
			<textarea class="form-control" id="description" id="description" ></textarea>
		  </div>
		</div>
	  </div>
	  <div class="text-center text-sm-left offset-top-20">
		<button class="btn btn-primary" type="button" id="send">Gửi</button>
	  </div>
	</form>
  </div>
</div>

<link rel="stylesheet" href="<?=url_tmpl();?>toast/toastr.min.css">
<script src="<?=url_tmpl();?>toast/toastr.min.js"></script>
<script src="<?=url_tmpl();?>toast/notifications.js"></script>
<script>
$(function(){ 
	$('#send').click(function(){
		 var fullname = $('#fullname').val();  
		 var email = $('#email').val(); 
		 var parid = $('input[name=parid]').val();
		 var level = $('input[name=level]').val();
		 var blogid = $('input[name=pid]').val();
		 if(fullname == ''){
			 warning('Họ tên không được trống.');
			 $('#fullname').focus(); return false;
		 }
		 if(email == ''){
			 warning('Điện thoại không được trống.');
			 $('#email').focus(); return false;
		 }
		 if(!validateEmail(email)){
			 warning('Vui lòng nhập đúng định dạng email.');
			 $('#email').focus(); return false;
		 }
		
		 var description = $('#description').val();
		 if(description == ''){
			 warning('Nội dung không được trống.');
			 $('#description').focus(); return false;
		 }
		 $.ajax({
			url : '<?=base_url()?>investment/save_comment',
			type: 'POST',
			async: false,
			data:{fullname:fullname,email:email,description:description,parid:parid,level:level,blogid:blogid},  
			success:function(datas){
				success('Cảm ơn bạn đã đóng góp ý kiến. Chúng tôi sẽ phản hồi bạn trong vòng 24 giờ.');
				$('#fullname').val('<?=$m_fullname?>');  
				$('#email').val('<?=$m_email?>'); 
				$('#description').val('');
				$('input[name=parid]').val('');
				$('input[name=level]').val('');
			}
		});
	});
});
function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}
</script>