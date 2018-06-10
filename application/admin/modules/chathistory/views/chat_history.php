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
.bg1 {
	background-color: #c2a5ff;
}
.bg2 {
	background-color: #F0F3F6;
}
.log-item {
	margin-bottom: 20px;
}
.avatar {
    border-radius: 50% !important;
    float: left;
    width: 35px;
}
.msg-container {
    border-radius: 5px !important;
    float: left;
    margin-left: 10px;
    max-width: 340px;
    min-width: 250px;
    padding-bottom: 5px;
    padding-left: 5px;
    padding-right: 5px;
}
.timelog {
    float: right;
    font-size: 10px;
}
.name {
    float: left;
    font-size: 10px;
}
.msg {
	clear: both;
    margin-top: 15px;
}
.img-msg {
	max-width: 100%;
}
</style>
<div class="chat_log_container">
<?php 
foreach ($chatLog as $item) { 
	if ($item->type == 0) {
		$float = 'f-left';
		$bg = 'bg1';
		$person = 'Khách: ';
	}
	else {
		$float = 'f-right';
		$bg = 'bg2';
		$person = 'NV: ';
	}
?>
	<div class="log-item <?=$float?>">
		<?=$item->avatar?>
		<div class="msg-container <?=$bg?>">
			<span class="name"><b><?=$person?><?=$item->name?></b></span>
			<span class="timelog"><?=date('d/m/Y H:i', strtotime($item->datecreate))?></span>
			<div class="msg"><?=$item->msg?></div>
		</div>
	</div>
	<div class="clear"></div>
<?php } ?>
</div>