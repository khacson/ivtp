<style>
.f-left{
	float: left;
}
.f-right{
	float: right;
}
.clear{
	clear: both;
}
#modal_content {
	background-color: #eee;
}
.chat_log_container .bg1 {
	background-color: #fff;
}
.chat_log_container .bg2 {
	background-color: #D0E4F2;
}
.chat_log_container .log-item {
	margin-bottom: 20px;
	display: block
}
.chat_log_container .avatar {
    border-radius: 50% !important;
    float: left;
    width: 35px;
}
.chat_log_container .msg-container {
    border-radius: 5px !important;
    float: left;
    margin-left: 10px;
    max-width: 340px;
    min-width: 250px;
    padding-bottom: 5px;
    padding-left: 5px;
    padding-right: 5px;
}
.chat_log_container .timelog {
    float: right;
    font-size: 11px;
}
.chat_log_container .name {
    float: left;
    font-size: 10px;
}
.chat_log_container .msg {
	clear: both;
    margin-top: 15px;
}
.chat_log_container .img-msg {
	max-width: 100%;
}
</style>
<div class="chat_log_container">
<?php 
foreach ($chatLog as $item) { 
	if ($item->type == 0) {
		$float = 'f-left';
		$bg = 'bg1';
	}
	else {
		$float = 'f-right';
		$bg = 'bg2';
	}
?>
	<div class="log-item <?=$float?>">
		<?=$item->avatar?>
		<div class="msg-container <?=$bg?>">
			<span class="name"><?=$item->name?></span>
			<span class="timelog"><?=date('d/m/Y H:i', strtotime($item->datecreate))?></span>
			<div class="msg"><?=$item->msg?></div>
		</div>
	</div>
	<div class="clear"></div>
<?php } ?>
</div>