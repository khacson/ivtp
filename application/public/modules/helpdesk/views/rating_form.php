<style>
#note {
    border: 1px solid #999;
    border-radius: 5px;
    box-shadow: none;
    margin-bottom: 5px;
    margin-top: 8px;
    padding: 5px;
    width: 100%;
}
#send_rating {
    border: 1px solid #764ebe;
    border-radius: 4px;
    padding: 5px 8px;
}	
.validation p{
	color: red;
}
</style>
<div>
	<p>Bạn có hài lòng về nhân viên tư vấn không?</p>
	<ul>
	<?php foreach ($starList as $item){ ?>
		<li>
			<label>
				<input name="rating" type="radio" value="<?=$item->id?>" /> <?=$item->name?>
			</label>
		</li>
	<?php } ?>
		<li>
			<textarea id="note" name="note" rows="4" placeholder="Ý kiến của bạn"></textarea>
		</li>
		<li>
			<input class="btn-primary" type="button" id="send_rating" value="Gửi đánh giá" />
		</li>
		<li class="validation" style="display: none;">
			<p>Bạn vui lòng đánh giá trước khi gửi</p>
		</li>
		<li>
			<p id="thank_rating" style="display: none;">Cám ơn bạn đã đánh giá</p>
		</li>
	</ul>
</div>
<script>
var running = 0;
$('#send_rating').click(function(){
	if (running == 0) {
		running = 1;
	}
	else {
		return;
	}
	var star = $('input[name=rating]:checked').val();
	var note = $('textarea[name=note]').val().trim();
	
	if (star == undefined) {
		$('.validation').show();
		running = 0;
		return;
	}
	else {
		$('.validation').hide();
	}
	
	$.ajax({
		type: 'post',
		url: controller + 'save_rating',
		data: {star: star, note: note, chat_code: chat_code},
		success: function(data) {
			$('#send_rating').val('Gửi lại đánh giá');
			$('#thank_rating').show();
			running = 0;
		}
	})
})
</script>