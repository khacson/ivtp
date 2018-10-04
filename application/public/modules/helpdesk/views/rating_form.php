<style>
#note {
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: none;
    margin-bottom: 5px;
    margin-top: 8px;
    padding: 5px;
    width: 100%;
	resize: none;
}
#note:focus{
	border: 1px solid #79d5ca;
}
#send_rating {
    border: 1px solid #e9b51b;
    border-radius: 4px;
    padding: 5px 8px;
}	
.validation p{
	color: red;
}
.starform {
	padding: 5px 10px;
	border: 1px solid #ccc;
}
.ratinquestion {
	margin-bottom: 10px;
}
.friendlist {
    border: 1px solid #ccc;
    padding: 10px;
}
.friend-item {
	
}
.green {
	color: green;
}
.gray {
	color: #333;
}
.bggreen {
	background-color: green;
}
.bggray {
	background-color: gray;
}
.circle {
	display: inline-block;
	width: 7px;
	height: 7px;
	margin-right: 3px;
	border-radius: 50%;
}
.friendlist .name {
	font-size: 12px;
}
.friendlist .lastmsg {
	font-size: 12px;
	color: #666;
	font-style: italic;
	display: inline-block;
}
.gopy {
    color: #733272;
    font-size: 19px;
    margin-bottom: 15px;
    position: relative;
    text-align: center;
}
.gopy::before {
    border-bottom: 3px solid #ad47ab;
    content: "";
    display: block;
    left: calc(50% - 30px);
    position: absolute;
    top: 106%;
    width: 70px;
}
.ratingform {
	
}
</style>
<?php if (!$isGuest) { ?>
<div>
	<div class="chat-header">Nhân viên đã chat</div>
	<div class="friendlist">
		<div class="friend-item">
			<?php 
				foreach ($friendList as $item) {
					$status = 'green';
					$bgCir = 'bggreen';
					if ($item->online_status == 0) {
						$status = 'gray';
						$bgCir = 'bggray';
					}
					$lastmsg = '';
					if ($item->lastmsg) {
						$msg = strip_tags($item->lastmsg);
						$length = strlen($msg);
						$lastmsg = substr($msg, 0, 20);
						if ($length > 20) {
							$lastmsg .= '...';
						}
						$lastmsg = "($lastmsg)";
					}					
			?>
			<div class="item">
				<span class="circle <?=$bgCir?>"></span>
				<a href="<?=base_url()?>tu-van/dt<?=$item->user_id?>" class="name <?=$status?>"><?=$item->fullname?></a>
				<span class="lastmsg"><?=$lastmsg?></span>
			</div>
			<?php	
				}
			?>
		</div>
	</div>
</div>
<br>
<?php } ?>
<div class="ratingform">
	<p class="gopy">Đánh giá nhân viên</p>
	<p class="ratinquestion">Bạn có hài lòng về nhân viên tư vấn không?</p>
	<ul class="">
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
<link rel="stylesheet" href="<?=url_tmpl();?>toast/toastr.min.css">
<script src="<?=url_tmpl();?>toast/toastr.min.js"></script>
<script src="<?=url_tmpl();?>toast/notifications.js"></script>
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
		warning('Bạn vui lòng đánh giá trước khi gửi');
		running = 0;
		return;
	}
	
	$.ajax({
		type: 'post',
		url: controller + 'save_rating',
		data: {star: star, note: note, chat_code: chat_code},
		success: function(data) {
			$('#send_rating').val('Gửi lại đánh giá');
			success('Cảm ơn bạn đã đánh giá');
			running = 0;
		},
		error: function(){
			running = 0;
		}
	})
})
</script>