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
			<input class="form-control" id="fullname" type="text" name="fullname" >
		  </div>
		</div>
		<div class="cell-sm-6">
		  <div class="form-group form-group-outside">
			<label class="form-label form-label-outside" for="contact-phone">Điện thoại</label>
			<input class="form-control" id="phone" type="text" name="phone" >
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
		 var phone = $('#phone').val(); 
		 var parid = $('input[name=parid]').val();
		 var level = $('input[name=level]').val();
		 var blogid = $('input[name=pid]').val();
		 if(fullname == ''){
			 warning('Họ tên không được trống.');
			 $('#fullname').focus(); return false;
		 }
		 if(phone == ''){
			 //warning('Điện thoại không được trống.');
			 //$('#phone').focus(); return false;
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
			data:{fullname:fullname,phone:phone,description:description,parid:parid,level:level,blogid:blogid},  
			success:function(datas){
				success('Cảm ơn bạn đã đóng góp ý kiến. Chúng tôi sẽ phản hồi bạn trong vòng 24 giờ.');
				$('#fullname').val('');  
				$('#phone').val(''); 
				$('#description').val('');
				$('input[name=parid]').val('');
				$('input[name=level]').val('');
			}
		});
	});
});

</script>