<div>
	<p>Bạn có hài lòng về nhân viên tư vấn không?</p>
	<ul>
		<li>
			<label>
				<input name="rating" type="radio" value="5" />
				Rất tốt
			</label>
		</li>
		<li>
			<label>
				<input name="rating" type="radio" value="4" />
				Tốt
			</label>
		</li>
		<li>
			<label>
				<input name="rating" type="radio" value="3" />
				Bình thường
			</label>
		</li>
		<li>
			<label>
				<input name="rating" type="radio" value="2" />
				Kém
			</label>
		</li>
		<li>
			<textarea name="note" rows="4" placeholder="Ý kiến của bạn"></textarea>
		</li>
		<li>
			<input type="button" id="send_rating" value="Gửi đánh giá" />
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
	
	$.ajax({
		type: 'post',
		url: controller + 'save_rating',
		data: {star: star, note: note, chat_code: chat_code},
		success: function(data) {
			$('#send_rating').val('Gửi lại đánh giá');
			$('#thank_rating').show().fadeOut(10000);
		}
	})
})
</script>