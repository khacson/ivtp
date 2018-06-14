<div class="offset-top-60 offset-md-top-90">
  <hr class="divider hr-left-0 bg-bermuda">
  <div class="offset-top-15">
	<h5>Gửi bình luận</h5>
  </div>
  <div class="offset-top-15" id="comment_form">
	<!-- RD Mailform-->
	<form class="rd-mailform text-left" data-form-output="form-output-global" data-form-type="contact" method="post" action="<?=base_url()?>markettrend/save_comment">
		<input type="hidden" name="pid" value="<?=$postId?>" />
		<input type="hidden" name="parid" value="" />
		<input type="hidden" name="level" value="" />
	  <div class="range range-xs-center">
		<div class="cell-sm-6">
		  <div class="form-group form-group-outside">
			<label class="form-label form-label-outside" for="contact-first-name">Họ tên (<span class="red">*</span>)</label>
			<input class="form-control" data-constraints="@Required" id="fullname" type="text" name="fullname" >
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
			<textarea class="form-control" id="contact-message" name="message" data-constraints="@Required"></textarea>
		  </div>
		</div>
	  </div>
	  <div class="text-center text-sm-left offset-top-20">
		<button class="btn btn-primary" type="submit">Gửi</button>
	  </div>
	</form>
  </div>
</div>