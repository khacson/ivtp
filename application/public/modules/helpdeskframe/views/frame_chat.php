
<script src="<?=url_tmpl();?>js/jquery-2.2.3.min.js"></script>
<!-- AngularJS -->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular-sanitize.min.js"></script>

<!-- Firebase -->
<script src="https://www.gstatic.com/firebasejs/3.6.6/firebase.js"></script>

<!-- AngularFire -->
<script src="https://cdn.firebase.com/libs/angularfire/2.3.0/angularfire.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?=url_tmpl();?>font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?=url_tmpl();?>css/style.css">
<link rel="stylesheet" href="<?=url_tmpl();?>css/chaticon.css">
<link rel="stylesheet" href="<?=url_tmpl();?>css/frame_chat.css?ver=1.0">
<script>
  // Initialize Firebase
  var config = <?=$configdb?>;
  firebase.initializeApp(config);

</script>
<style>
#input-image, #input-file {
	display: none;
}
#history a{
	color: #666;
	text-decoration: underline;
}
#history a:Hover{
}
.emotionicon {
    background: rgba(0, 0, 0, 0) url("<?=base_url()?>/files/emotion_icon/1f60a.png") no-repeat scroll center center / cover ;
}
form .framestar {
    margin-left: 5px;
    margin-top: 3px;
}
.framestar .fa-star {
    font-size: 15px;
	cursor: pointer;
}
.orange, .orangeclick {
	color: orange;
}
.customernotearea {
    background-color: #fff;
    height: 100%;
    left: 0;
    padding: 10px;
    position: absolute;
    top: 100%;
    width: 100%;
    transition: all 0.2s ease;
}
.showcustomerarea {
	top: 0 !important;
	transition: all 0.2s ease;
}
.customernotearea .customer_note {
    height: 100px;
    margin-bottom: 15px;
    resize: none;
    width: 100%;
	padding: 10px;
}
.actionbutton .btn {
    margin-right: 6px;
    margin-top: 5px;
    min-width: auto;
    padding: 6px 5px;
    width: 90px;
}
.actionbutton .btn-primary {
    background-color: #e9b51b;
    border-color: #e9b51b;
    transition: all 0.3s ease-out 0s;
}
.actionbutton .btn-primary:hover, .actionbutton .btn-primary:active, .actionbutton .btn-primary:focus {
    background-color: #ffca0b;
    border-color: #ffca0b;
    transition: all 0.3s ease-out 0s;
}
.log-msg img {
    max-width: 220px;
}
.readStatus{
	font-size: 10px;
	color: #733272;
}
.log-msg {
	min-width: 185px;
}
.new-msg-form .typing {
    display: inline-block;
    font-size: 12px;
    margin-top: 5px;
	font-style: italic;
    margin-left: 5px;
}
</style>
<div ng-app="app">
	<div ng-controller="chatCtrl">
        <div id="chatBox">
			<div class="loading-overplay none">
				<div class="spinner">
				  <div class="bounce1"></div>
				  <div class="bounce2"></div>
				  <div class="bounce3"></div>
				</div>
			</div>
			<div class="chat-header">
				<span class="fleft"><?=$userInfo->fullname?> - <?=$status?></span>
				
			</div>
            
			<div class="chat_log">
				<div class="chat_log_list hide">
					<?php if ($showViewOldChat){ ?>
						<p align="center" class="">
							<span class="viewOldChat" id="history" ng-click="get_chat_history()">
								<a data-toggle="modal" href="#myModal">Tin cũ hơn</a>
							</span><br><br>
						</p>
					<?php } else { ?>
						<div class="log-item fright">
							<div class="customer-avatar">
								<img class="avatar" src="<?=base_url()?>files/user/<?=$userInfo->signature?>" />
							</div>
							<div class="log-msg">
								<div class="msg-content"><?=$welcome_msg?></div>
							</div>
						</div>
					<?php } ?>
					
					<div class="log-item {{chatLog.type ? 'fright' : 'fleft'}}" ng-repeat="chatLog in chatLogList" ng-init="$last ? move_to_bottom() : null">
						<div class="customer-avatar" ng-bind-html="chatLog.avatar.replace('http://inv', 'https://inv') | unsafe">
							
						</div>
						<div class="log-msg {{chatLog.type ? '' : 'customer-active'}}">
							<div class="msg-content"  ng-bind-html="chatLog.msg.replace('http://inv', 'https://inv') | unsafe"></div>
							<span class="log-time">
								{{chatLog.dateTime}}
								<span class="readStatus" ng-if="chatLog.type == 0">
								 | {{chatLog.readStatus ? 'Đã xem' : chatLog.readStatus == 0 ? 'Đã gửi' : 'Đã xem'}}
								{{}}
								</span>
							</span>
						</div>
					</div>
				</div>
				<form class="new-msg-form">
					<span class="f-left typing hide"></span>
					<div class="framestar fleft">
						<span> Đánh giá: </span>
						<i id="star1" class="fa fa-star" title="Rất kém"></i> 
						<i id="star2" class="fa fa-star" title="Kém"></i> 
						<i id="star3" class="fa fa-star" title="Bình thường"></i> 
						<i id="star4" class="fa fa-star" title="Tốt"></i> 
						<i id="star5" class="fa fa-star" title="Rất tốt"></i>
					</div>
					<span title="Upload file" id="insert-file" class="insert fright">
						<span class="fa fa-file"></span>
						<input onchange="angular.element(this).scope().uploadFile()" ng-model="file" type="file" id="input-file" value="" accept=".xlsx,.xls,.doc, .docx,.ppt, .pptx,.txt,.pdf" />
					</span>
					<span title="Chèn hình ảnh" id="insert-image" class="insert fright">
						<span class="fa fa-camera"></span>
						<input onchange="angular.element(this).scope().uploadImage()" ng-model="image" type="file" id="input-image" value="" accept="image/*" />
					</span>
					<span title="Chèn biểu tượng cảm xúc" id="insert-emotion" class="insert fright">
						<span class="chaticon 1f60a emotionicon"></span>
					</span>
					<div id="input-msg" contenteditable="true" class="input-msg" ng-keyup="checkAndSendChat($event)" ng-focus="updateReadStatus()"></div>
					<button hidden type="submit" ng-click="sendChat()" data=""></button>
					
					<div id="icon-motion-container" class="icon-motion-container" style="display: none;">
						<span class="chaticon e1f600" data="1f600"></span>
						<span class="chaticon e1f601" data="1f601"></span>
						<span class="chaticon e1f602" data="1f602"></span>
						<span class="chaticon e1f603" data="1f603"></span>
						<span class="chaticon e1f604" data="1f604"></span>
						<span class="chaticon e1f605" data="1f605"></span>
						<span class="chaticon e1f606" data="1f606"></span>
						<span class="chaticon e1f609" data="1f609"></span>
						<span class="chaticon e1f60a" data="1f60a"></span>
						<span class="chaticon e1f60b" data="1f60b"></span>
						<span class="chaticon e1f60e" data="1f60e"></span>
						<span class="chaticon e1f60d" data="1f60d"></span>
						<span class="chaticon e1f618" data="1f618"></span>
						<span class="chaticon e1f617" data="1f617"></span>
						<span class="chaticon e1f619" data="1f619"></span>
						<span class="chaticon e1f61a" data="1f61a"></span>
						<span class="chaticon e263a" data="e263a"></span>
						<span class="chaticon e1f642" data="1f642"></span>
						<span class="chaticon e1f917" data="1f917"></span>
						
						<span class="chaticon e1f62b" data="1f62b"></span>
						<span class="chaticon e1f634" data="1f634"></span>
						
						<span class="chaticon e1f911" data="1f911"></span>
						<span class="chaticon e1f632" data="1f632"></span>
						<span class="chaticon e1f61e" data="1f61e"></span>
						<span class="chaticon e1f61f" data="1f61f"></span>
						<span class="chaticon e1f624" data="1f624"></span>
						<span class="chaticon e1f622" data="1f622"></span>
						<span class="chaticon e1f62d" data="1f62d"></span>
						<span class="chaticon e1f626" data="1f626"></span>
						<span class="chaticon e1f627" data="1f627"></span>
						<span class="chaticon e1f628" data="1f628"></span>
						<span class="chaticon e1f629" data="1f629"></span>
						<span class="chaticon e1f62c" data="1f62c"></span>
						<span class="chaticon e1f630" data="1f630"></span>
						<span class="chaticon e1f631" data="1f631"></span>
						<span class="chaticon e1f633" data="1f633"></span>
						<span class="chaticon e1f635" data="1f635"></span>
						<span class="chaticon e1f621" data="1f621"></span>
						<span class="chaticon e1f620" data="1f620"></span>
						<span class="chaticon e1f608" data="1f608"></span>
					</div>
				</form>
				<div id="customernotearea" class="customernotearea hide">
					<p>Bạn có hài lòng về nhân viên tư vấn không?</p>
					<textarea placeholder="Ý kiến của bạn" class="customer_note"></textarea>
					<div class="actionbutton">
						<a class="btn btn-primary sendcustomernote" href="javascript:;">Gửi</a>
						<a class="btn btn-primary sendcustomernote" href="javascript:;">Đóng</a>
					</div>
				</div>
			</div>
        </div>
        
    </div>
	
</div>	
	
<script>
    var controller = '<?= $controller; ?>/';
    var csrfHash = '<?= $csrfHash; ?>';
    var isGuest = '<?= $isGuest; ?>';
    var cpage = 0;
    var search;
    var schoolid = 0;
    $(function() {
		
    });
</script>	
	
	
<script>
var base_url = '<?=base_url();?>';
var token = '<?=$token?>';
var chat_code = '<?=$chat_code?>';
var serviceGroup = '<?=$serviceGroup?>';
var app = angular.module('app', ['firebase']);
app.filter('unsafe', function($sce) { return $sce.trustAsHtml; });
app.controller('chatCtrl', ['$scope', '$firebase', '$firebaseArray', '$firebaseAuth', function($scope, $firebase , $firebaseArray, $firebaseAuth) {
	var user_id = '<?=$user_id?>';
	var username = '<?=$userInfo->fullname?>';
    var customername = '<?=$login->fullname?>';
    var customer_id = '<?=$login->id?>';
	var ref;
	var msg_new = 0;
	var title = $('title').text();
	
	$scope.authObjMsg = $firebaseAuth();
	$scope.authObjMsg.$signInWithCustomToken(token).then(function(firebaseUser) {
		console.log("Signed in as:", firebaseUser.uid);	
		$scope.init();
	}).catch(function(error) {
		console.log("Error:"+ error);	
		warning('Hệ thống phát hiện có lỗi bảo mật xảy ra. Trang web của bạn sẽ tự Refresh sau 5 giây.');	
		setTimeout(function(){
			window.location = '';
		}, 5000);
		//$scope.getNewToken();
	});
	
	$scope.init = function() {
		$scope.rows = 20;
		$scope.viewOldChat = 0;
		db = firebase.database().ref();
		dblog = db.child('log');
		dbping = db.child('ping');
		dbtyping = db.child('typing');
		//show noi dung chat
		current_chat = dblog.child(chat_code).limitToLast($scope.rows);
		$scope.chatLogList = $firebaseArray(current_chat);
		$('.chat_log_list').removeClass('hide');
		$scope.setTitle();
		$scope.checkTyping();
	}
	
	$scope.checkTyping = function() {
		setTimeout(function(){
			if (chat_code) {
				t = dbtyping.child(user_id).child(chat_code);
				$scope.typing = $firebaseArray(t);
				$scope.typing.$loaded().then(function(array) {
					for (var i = 0; i< array.length; i++) {
						if (array[i]['$id'] == user_id) {
							var lastTyping = array[i]['lastTyping'];
							var d1 = new Date();
							var d2 = new Date(lastTyping);
							var diff = Math.abs(d1-d2);
							if (diff < 6000) {
								$('.framestar').addClass('hide');
								$('.typing').removeClass('hide');
								$('.typing').text(username + ' đang soạn tin ...');
							}
							else {
								$('.typing').text('');
								$('.framestar').removeClass('hide');
								$('.typing').addClass('hide');
							}
						}	
					}
					
				})	
			}
			
			$scope.checkTyping();
		}, 2000);
	}
	$scope.setTitle = function() {
		setTimeout(function(){
			$scope.chatLogList.$loaded().then(function(array) {
				//console.log(array.length);
				msg_new = 0;
				for (var i = 0; i< array.length; i++) {
					//console.log(array[i]['ping']);
					msg_new += array[i]['type'];
					if ( (i+1 < array.length) && !array[i+1]['type']) {
						msg_new = 0;
					}
				}
				
				i--;
				if (array[i] && array[i]['type'] == 1) {
					var name = array[i]['name'];
					var msg = array[i]['msg'];
					var avatar = array[i]['avatar'];
					var dateTime = array[i]['dateTime'];
					var img_url = getImgSrc(avatar);
					var text = striptags(msg);
					if (text == '' && msg.indexOf('class="img-msg"') != -1) {
						text = 'Đã gửi một ảnh mới';
					}
					else if (msg.indexOf('<span class="fa fa-download"></span>') != -1) {
						text = 'Đã gửi một file mới';
					}
					var key = (text + dateTime).trim();
					var lastMsg = getCookie('lastMsg' + user_id);//console.log(lastMsg);
					if (key != lastMsg && text != '') {console.log($('#input-msg').is(':focus'));
						if (!$('#input-msg').is(':focus')) {
							notifyMe(name, img_url, text, '', 5000);
						}
						setCookie('lastMsg' + user_id, key, 10);
					}
				}
			});
			if (msg_new > 0) {
				$('title').text(title + ' ('+ msg_new +')');
			}
			else {
				$('title').text(title);
			}
			$scope.setTitle();
		}, 1000);
	}

	$scope.sendChat = function() {
		
		var input_msg = $('#input-msg');
		var dateTimeLog = getDateTime(false);
		
		var html = input_msg.html();
		if (html.substr(0,4) == '<img' && html.indexOf('base64,') != -1) {
			var base64Src = $(html).attr('src');
			$scope.sendPasteImg(base64Src);
			return;
		}
		
		removeBr('#input-msg');
		var msg = input_msg.html();
		msg = convertLink(msg);
		
		$scope.add_to_chat_list(msg);
		
		ref = dblog.child(chat_code);
		var avatar = '<img class="avatar" src="<?=base_url()?>files/user/<?=$login->signature?>">';
		$firebaseArray(ref).$add({
			type : 0,//khach hang gui tin nhan
			msg : msg,
			dateTime : dateTimeLog,
			user_id : customer_id,
			name: customername,
			avatar: avatar,
			readStatus: 0
		});
        input_msg.html('');
		move_to_bottom('.chat_log_list');
		$scope.save_chat_to_db(chat_code, customername, avatar, msg, dateTimeLog);
    }
	
	$scope.sendChatImage = function(img_src) {
		$scope.add_to_chat_list('Đã gửi một ảnh mới');
		
		var input_msg = $('#input-msg');
		var dateTimeLog = getDateTime(false);
		
		removeBr('#input-msg');
		var msg = '<a target="_blank" href="'+img_src+'"><img class="img-msg" src="'+ img_src +'" /></a>';
		
		ref = dblog.child(chat_code);
		var avatar = '<img class="avatar" src="<?=base_url()?>files/user/<?=$login->signature?>">';
		$firebaseArray(ref).$add({
			type : 0,//khach hang gui tin nhan
			msg : msg,
			dateTime : dateTimeLog,
			user_id : customer_id,
			name: customername,
			avatar: avatar,
			readStatus: 0
		});
        input_msg.html('');
		move_to_bottom('.chat_log_list');
		$scope.save_chat_to_db(chat_code, customername, avatar, msg, dateTimeLog);
    }
	$scope.sendPasteImg = function(base64Src) {
		$('.loading-overplay').show();
		var formData = new FormData();
		formData.append('base64Src', base64Src);

		$.ajax({
		   url : controller + '/createImgFromBase64',
		   type : 'POST',
		   data : formData,
		   processData: false,  // tell jQuery not to process the data
		   contentType: false,  // tell jQuery not to set contentType
		   success : function(data) {
			   if (data.substr(0, 9) == '<!DOCTYPE') {
					warning('Bạn đã hết phiên làm việc. Hệ thống cần tải lại trang');
					setTimeout(function(){
					   window.location = '';
					}, 3000);
					return;
			   }
			   if (data.indexOf('upload/chat') != -1) {
				   $scope.sendChatImage(data);
			   }
			   $('.loading-overplay').hide();
		   }
		});
	}
	$scope.sendChatFile = function(file_src, filename) {
		$scope.add_to_chat_list('Đã gửi một file mới');
		
		var input_msg = $('#input-msg');
		var dateTimeLog = getDateTime(false);
		
		removeBr('#input-msg');
		var msg = '<a target="_blank" href="'+file_src+'"><span class="fa fa-download"></span> '+ filename +'</a>';
		
		ref = dblog.child(chat_code);
		var avatar = '<img class="avatar" src="<?=base_url()?>files/user/<?=$login->signature?>">';
		$firebaseArray(ref).$add({
			type : 0,//khach hang gui tin nhan
			msg : msg,
			dateTime : dateTimeLog,
			user_id : customer_id,
			name: customername,
			avatar: avatar,
			readStatus: 0
		});
        input_msg.html('');
		move_to_bottom('.chat_log_list');
		$scope.save_chat_to_db(chat_code, customername, avatar, msg, dateTimeLog);
    }
	
	$scope.checkAndSendChat = function(e) {
		var input_msg = $('#input-msg').html();
		if (input_msg.trim() == '' || input_msg.trim() == '<br>') {
			return;
		}
		
		//update typing status
		var time = getDateTime(true);
		time = time.replace(/-/g, '/'); 
		time = time.replace(/T/g, ' '); 
		dbtyping.child(user_id).child(chat_code).child(customername).set({
			lastTyping: time,
		});
		
		if (e.keyCode == 13) {
			if (serviceGroup == 1) {
				//group cskh thi ko chan email va phone
				$scope.sendChat();
				return;
			}
			else {
				var input_msg = $('#input-msg').text();
				var hasEmail = checkEmail(input_msg);
				var hasPhone = checkPhone(input_msg);
				if (hasEmail) {
					warning('Bạn vui lòng bỏ Email ra khỏi tin nhắn');
					return;
				}
				if (hasPhone) {
					warning('Bạn vui lòng bỏ Số ĐT ra khỏi tin nhắn');
					return;
				}
				$scope.sendChat();
			}
		}
    }
	
	$scope.showLoading = function() {
		$('.loading-overplay').show();
		setTimeout( function(){   
            $('.loading-overplay').hide();
        }, 1000);
    }
	
	$scope.uploadImage = function() {
		$('.loading-overplay').show();
		var formData = new FormData();
		formData.append('image_file', $('#input-image')[0].files[0]);

		$.ajax({
		   url : controller + '/upload_image',
		   type : 'POST',
		   data : formData,
		   processData: false,  // tell jQuery not to process the data
		   contentType: false,  // tell jQuery not to set contentType
		   success : function(data) {
			   if (data.substr(0, 9) == '<!DOCTYPE') {
					warning('Bạn đã hết phiên làm việc. Hệ thống cần tải lại trang');
					setTimeout(function(){
					   window.location = '';
					}, 3000);
					return;
			   }
			   $scope.sendChatImage(data);
			   $('.loading-overplay').hide();
		   }
		});
	}
	$scope.uploadFile = function() {
		$('.loading-overplay').show();
		var formData = new FormData();
		formData.append('my_file', $('#input-file')[0].files[0]);

		$.ajax({
		   url : controller + '/upload_file',
		   type : 'POST',
		   data : formData,
		   processData: false,  // tell jQuery not to process the data
		   contentType: false,  // tell jQuery not to set contentType
		   success : function(data) {
			   if (data.substr(0, 9) == '<!DOCTYPE') {
					warning('Bạn đã hết phiên làm việc. Hệ thống cần tải lại trang');
					setTimeout(function(){
					   window.location = '';
					}, 3000);
					return;
			   }
			   var obj = JSON.parse(data);
			   $scope.sendChatFile(obj.file_src, obj.filename);
			   $('.loading-overplay').hide();
		   }
		});
	}
	$scope.add_to_chat_list = function(msg) {
		msg = striptags(msg);
		if (msg.length > 25) {
			msg = msg.substr(0, 25) + '...';
		}
		dbping.child(user_id).child(chat_code).set({
			chat_code: chat_code,
			name: customername,
			ping: 1,
			msg: msg,
			alertUser: 1,
			alertCustomer: 0,
			avatar: '<img class="avatar" src="<?=base_url()?>files/user/<?=$login->signature?>">'
		});
	}
	$scope.move_to_bottom = function() {
		if ($scope.viewOldChat == 0) {
			move_to_bottom('.chat_log_list');
		}
		else {
			$scope.viewOldChat = 0;
			move_to_top('.chat_log_list');
		}
	}
	$scope.save_chat_to_db = function(chat_code, name, avatar, msg, datecreate) {
		var data = {};
		data['chat_code'] = chat_code;
		data['type'] = 0;
		data['name'] = name;
		data['avatar'] = avatar;
		data['msg'] = msg;
		data['datecreate'] = datecreate;
		$.ajax({
		   url : controller + 'save_chat',
		   type : 'POST',
		   data : data,
		   success : function(data) {
			   if (data.substr(0, 9) == '<!DOCTYPE') {
					warning('Bạn đã hết phiên làm việc. Hệ thống cần tải lại trang');
					setTimeout(function(){
					   window.location = '';
					}, 3000);
					return;
			   }
			   
		   }
		});
	}
	$scope.getNewToken = function() {
		$.ajax({
		   url : controller + 'getNewToken',
		   type : 'POST',
		   data : {},
		   success : function(data) {
			   if (data.substr(0, 9) == '<!DOCTYPE') {
					warning('Bạn đã hết phiên làm việc. Hệ thống cần tải lại trang');
					setTimeout(function(){
					   window.location = '';
					}, 3000);
					return;
			   }
				token = data;
		   }
		});
	}
	$scope.get_chat_history = function() {
		$scope.viewOldChat = 1;
		$scope.rows += 10; 
		current_chat = dblog.child(chat_code).limitToLast($scope.rows);
		$scope.chatLogList = $firebaseArray(current_chat);
		return;
		
		$('.loading-overplay').show();
		var data = {};
		data['member_id'] = customer_id;
		data['user_id'] = user_id;

		$.ajax({
		   url : controller + 'get_chat_history',
		   type : 'POST',
		   data : data,
		   success : function(datas) {
			   if (datas.substr(0, 9) == '<!DOCTYPE') {
					warning('Bạn đã hết phiên làm việc. Hệ thống cần tải lại trang');
					setTimeout(function(){
					   window.location = '';
					}, 3000);
					return;
			   }
				var obj = JSON.parse(datas);
				$('#modal_content').html(obj.content);
				$('.loading-overplay').hide();
		   },
		   error: function() {
			   $('.loading-overplay').hide();
		   }
		});
	}
	$scope.updateReadStatus = function() {
		setTimeout(function(){
			if ($('#input-msg').is(':focus')) {
				$scope.chatLogList.$loaded().then(function(array) {
					for (var i = 0; i< array.length; i++) {
						if (array[i]['type'] == 1 && array[i]['readStatus'] == 0) {
							dblog.child(chat_code).child(array[i]['$id']).set({
								type : 1,//nv gui tin nhan
								msg : array[i]['msg'],
								dateTime : array[i]['dateTime'],
								user_id : array[i]['user_id'],
								name: array[i]['name'],
								avatar: array[i]['avatar'],
								readStatus: 1
							});
						}
					}
				});	
			}
			$scope.updateReadStatus();
		}, 1000)
		
	}
}]);
function striptags(html) {
	var div = document.createElement("div");
	div.innerHTML = html;
	var text = div.textContent || div.innerText || "";
	return text;
}
function move_to_top(e){console.log(33);
	setTimeout(function() {
		$(e).scrollTop(0);
	}, 200);
}
function save_rating() {
	var star_id = $('.framestar').find('.orangeclick').last().attr('id'); console.log(star_id);
	var star = star_id.substr(4, 1);
	var note = $('.customer_note').val().trim();
	$.ajax({
		type: 'post',
		url: controller + 'save_rating',
		data: {star: star, note: note, chat_code: chat_code},
		success: function(data) {
			   if (data.substr(0, 9) == '<!DOCTYPE') {
					warning('Bạn đã hết phiên làm việc. Hệ thống cần tải lại trang');
					setTimeout(function(){
					   window.location = '';
					}, 3000);
					return;
			   }
			
		},
		error: function(){
			
		}
	})
}
function setStar(number) {
	for (var i = 1; i<= number; i++) {
		$('#star'+ i).addClass('orangeclick');
	}
}
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
$(window).ready(function(){
	setStar(<?=$starRate?>);
	$('.framestar .fa-star').hover(
		function(){
			var id = $(this).attr('id');
			var number = id.substr(4, 1);
			for (var i = 1; i<= number; i++) {
				$('#star'+ i).addClass('orange');
			}
		},
		function() {
			$('.framestar .fa-star').removeClass('orange');
		}
	)
	$('.framestar .fa-star').click(function(){
		$('.framestar .fa-star').removeClass('orangeclick');
		var id = $(this).attr('id');
		var number = id.substr(4, 1);
		for (var i = 1; i<= number; i++) {
			$('#star'+ i).addClass('orangeclick');
		}
		$('#customernotearea').addClass('showcustomerarea').removeClass('hide');
		
	})
	$('#customernotearea .sendcustomernote').click(function(){
		save_rating();
		$('#customernotearea').removeClass('showcustomerarea').addClass('hide');
	})
})
</script>	
<script src="<?= url_tmpl(); ?>js/chatfunc.js?v=2.1" type="text/javascript"></script>