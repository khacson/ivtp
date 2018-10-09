<div class="shell-wide">
          <div class="range tleft">
            <div class="cell-md-7">
              <p class="text-small">&#169; <span id="copyright-year"></span> © Copyright investorpro.com.vn. All Rights Reserved</p>
            </div>
			<div class="cell-md-5 tright">
				<div class="right-side">
                  <ul class="list-inline list-primary">
                    <li><a target="_blank" class="icon icon-xs icon-circle fa fa-facebook text-gray-lighter" href="<?=$finds->url_facebook;?>"></a></li>
                    <li><a target="_blank" class="icon icon-xs icon-circle fa fa-twitter text-gray-lighter" href="<?=$finds->url_twitter;?>"></a></li>
    
                    <li><a target="_blank" class="icon icon-xs icon-circle fa fa-youtube text-gray-lighter" href="<?=$finds->url_youtube;?>"></a></li>
                    <li><a target="_blank" class="icon icon-xs icon-circle fa fa-google text-gray-lighter" href="<?=$finds->url_google;?>"></a></li>
                    
                  </ul>
                </div>
			</div>
          </div>
        </div>
<?php 
	if (!empty($_SESSION['expiredDate'])) {
		$t = $_SESSION['expiredDate'];
		if ($t > 0) {
			$msg = "Gói dịch vụ của bạn còn <b>$t ngày</b> nữa sẽ hết hạn.";
		}
		else {
			$msg = "Gói dịch vụ của bạn đã hết hạn.";
		}
?>
<!-- Modal -->
<a id="showModals" class="hide" data-toggle="modal" href="#myModals"> </a>
<div id="myModals" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h6 class="modal-title text-left">Thông báo</h6>
      </div>
      <div id="modal_content" class="modal-body">
        <p><?=$msg?></p>
        <p>Bạn có muốn gia hạn thêm để tiếp tục sử dụng dịch vụ không?</p>
		<div class="actionbutton">
			<a class="btn btn-primary sendcustomernote" href="<?=base_url();?>dich-vu.html">Gia hạn ngay</a>
		</div>
      </div>
    </div>
  </div>
</div>
<script>
$(window).ready(function(){console.log(1);
	setTimeout(function(){
		$('#showModals').get(0).click();
	}, 800);
	
})
</script>
<?php
		unset($_SESSION['expiredDate']);
	}
?>

		
<?php 
	$uri = $_SERVER['REQUEST_URI'];
	if (strpos($uri, '/tu-van') === false && strpos($uri, '/dang-nhap') === false && strpos($uri, '/dang-ky') === false) {
?>
<style>
.framechat {
	position: fixed;
	bottom: 35px;
	right: 5px;
	width: 310px;
	height: 360px;
	z-index: 1000;
	overflow: hidden;
	border-top-left-radius: 5px;
	border-top-right-radius: 5px;
	transition: all 0.2s ease;
}
.framechat iframe{
	width: 100%;
	height: 100%;
	border: none;
}
.supportbar {
    background-color: #ad47ab;
    bottom: 0;
    color: #fff;
    font-weight: bold;
    height: 35px;
    padding-top: 7px;
    position: fixed;
    right: 5px;
    text-align: center;
    width: 310px;
	font-family: arial;
    z-index: 1000;
}
.supportbar .fa-comments {
    font-size: 30px;
    left: 20px;
    position: absolute;
    top: 1px;
}
.supportbar .fa-angle-down {
    font-size: 30px;
    position: absolute;
    right: 20px;
    top: 2px;
	cursor: pointer;
}
.supportbar .fa-angle-up {
    font-size: 30px;
    position: absolute;
    right: 20px;
    top: 0px;
	cursor: pointer;
}
.height0 {
	height: 0 !important;
	transition: all 0.2s ease;
}
.borderradius {
	border-top-left-radius: 5px;
	border-top-right-radius: 5px;
}
.chatactionbtn {
    font-weight: normal;
    position: absolute;
    right: 5px;
    top: 4px;
    width: 70px;
}
.chatactionbtn span {
    color: #fff;
    float: left;
    margin-left: 8px;
	cursor: pointer;
}
.supportbar span.text {
	cursor: pointer;
}
.chatactionbtn a, .chatactionbtn a:hover {
    color: #fff;
}
</style>
<?php 
	$height0 = '';
	$fa_angle = 'fa-angle-down';
	if (!empty($_COOKIE['minimize'])) {
		$height0 = 'height0';
		$fa_angle = 'fa-angle-up';
	}
?>
<div class="framechat <?=$height0?>">
<iframe onload="showChatActionBtn();" scrolling="no" src="<?=base_url()?>helpdeskframe/<?=$user_id?>"></iframe>
<div class="chatactionbtn hide">
	<span><i class="fa fa-window-minimize" onclick="minimize();"></i></span>
	<span><a href="<?=base_url()?>tu-van/dt<?=$user_id?>"><i class="fa fa-clone"></i></a></span>
	<span><i class="fa fa-window-close" onclick="minimize();"></i></span>
</div>
</div>
<div class="supportbar borderradius">
	<i class="fa fa-comments"></i>
	<span class="text" onclick="minimize();">Hỗ trợ tư vấn Online</span>
	<i class="minimize fa <?=$fa_angle?>" onclick="toggleClass(this)"></i>
</div>
<script>
var arrAlert = {};
$(window).ready(function(){
	checkNewAlert();
})
function showNewAlert() {
	var t = setInterval(function(){
		for (var i in arrAlert) {
			var name = arrAlert[i]['name'];
			var avatar = getImgSrc(arrAlert[i]['avatar']);
			var msg = arrAlert[i]['msg'];
			var text = striptags(msg);
			if (text == '' && msg.indexOf('class="img-msg"') != -1) {
				text = 'Đã gửi một ảnh mới';
			}
			else if (msg.indexOf('<span class="fa fa-download"></span>') != -1) {
				text = 'Đã gửi một file mới';
			}
			else if (msg.indexOf('class="icon-msg"') != -1 && text == '') {
				text = 'Đã gửi icon cảm xúc';
			}
			
			notifyMe(name, avatar, text, '', 5000);
			arrAlert.splice(i,1);
			break;
		}
		if (arrAlert.length == 0) {
			clearInterval(t);
		}
	}, 1000);
}
function checkNewAlert() {
	$.ajax({
		type: 'post',
		url: '<?=base_url()?>helpdeskframe/checkNewAlert',
		success: function(data) {
			var obj = JSON.parse(data);
			arrAlert = obj;
			showNewAlert();
		}
	})
}	
function striptags(html) {
	var div = document.createElement("div");
	div.innerHTML = html;
	var text = div.textContent || div.innerText || "";
	return text;
}
</script>
<?php } ?>