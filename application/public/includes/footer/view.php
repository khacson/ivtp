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
	$uri = $_SERVER['REQUEST_URI'];
	if (strpos($uri, '/tu-van') === false) {
		$login = $this->site->getSession('pblogin');
		if (empty($login)) {
			$user_id = 32;
		}
		else {
			$user_id = 33;
		}
?>
<style>
.framechat {
	position: fixed;
	bottom: 35px;
	right: 5px;
	width: 300px;
	height: 340px;
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
    width: 300px;
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
.chatactionbtn a, .chatactionbtn a:hover {
    color: #fff;
}
</style>
<div class="framechat">
<iframe onload="showChatActionBtn();" scrolling="no" src="<?=base_url()?>helpdeskframe/<?=$user_id?>"></iframe>
<div class="chatactionbtn hide">
	<span><i class="fa fa-window-minimize" onclick="minimize();"></i></span>
	<span><a href="<?=base_url()?>tu-van/dt<?=$user_id?>"><i class="fa fa-clone"></i></a></span>
	<span><i class="fa fa-window-close" onclick="minimize();"></i></span>
</div>
</div>
<div class="supportbar borderradius">
	<i class="fa fa-comments"></i>
	Hỗ trợ tư vấn Online
	<i class="minimize fa fa-angle-down" onclick="toggleClass(this)"></i>
</div>
<?php } ?>