<!-- AngularJS -->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular-sanitize.min.js"></script>

<!-- Firebase -->
<script src="https://www.gstatic.com/firebasejs/3.6.6/firebase.js"></script>

<!-- AngularFire -->
<script src="https://cdn.firebase.com/libs/angularfire/2.3.0/angularfire.min.js"></script>
<link rel="stylesheet" href="<?=url_tmpl();?>css/chaticon.css">
<link rel="stylesheet" href="<?=url_tmpl();?>css/chatstyle.css">
<script>
  // Initialize Firebase
  var config = <?=$configdb?>;
  firebase.initializeApp(config);

</script>
<style>
#input-image {
	display: none;
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
				<span class="fleft">NV - <?=$user_fullname?></span>
			</div>
            
			<div class="chat_log">
				<div class="chat_log_list">
					<div class="log-item {{chatLog.type ? 'fright' : 'fleft'}}" ng-repeat="chatLog in chatLogList" ng-init="$last ? move_to_bottom() : null">
						<div class="customer-avatar" ng-bind-html="chatLog.avatar | unsafe">
							
						</div>
						<div class="log-msg {{chatLog.type ? '' : 'customer-active'}}">
							<div class="msg-content"  ng-bind-html="chatLog.msg | unsafe"></div>
							<span class="log-time">{{chatLog.dateTime}}</span>
						</div>
					</div>
				</div>
				<form class="new-msg-form">
					<span title="Chèn hình ảnh" id="insert-image" class="insert fright">
						<span class="fa fa-camera"></span>
						<input onchange="angular.element(this).scope().uploadImage()" ng-model="image" type="file" id="input-image" value="" accept="image/*" />
					</span>
					<span title="Chèn biểu tượng cảm xúc" id="insert-emotion" class="insert fright">
						<span class="chaticon e1f60a" data="1f60a"></span>
					</span>
					<div id="input-msg" contenteditable="true" class="input-msg" ng-keyup="checkAndSendChat($event)"></div>
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
						<span class="chaticon e1f607" data="1f607"></span>
						<span class="chaticon e1f914" data="1f914"></span>
						<span class="chaticon e1f610" data="1f610"></span>
						<span class="chaticon e1f611" data="1f611"></span>
						<span class="chaticon e1f636" data="1f636"></span>
						<span class="chaticon e1f644" data="1f644"></span>
						<span class="chaticon e1f60f" data="1f60f"></span>
						<span class="chaticon e1f623" data="1f623"></span>
						<span class="chaticon e1f625" data="1f625"></span>
						<span class="chaticon e1f62e" data="1f62e"></span>
						<span class="chaticon e1f910" data="1f910"></span>
						<span class="chaticon e1f62f" data="1f62f"></span>
						<span class="chaticon e1f62a" data="1f62a"></span>
						<span class="chaticon e1f62b" data="1f62b"></span>
						<span class="chaticon e1f634" data="1f634"></span>
						<span class="chaticon e1f60c" data="1f60c"></span>
						<span class="chaticon e1f913" data="1f913"></span>
						<span class="chaticon e1f61b" data="1f61b"></span>
						<span class="chaticon e1f61c" data="1f61c"></span>
						<span class="chaticon e1f61d" data="1f61d"></span>
						<span class="chaticon e1f641" data="1f641"></span>
						<span class="chaticon e1f612" data="1f612"></span>
						<span class="chaticon e1f613" data="1f613"></span>
						<span class="chaticon e1f614" data="1f614"></span>
						<span class="chaticon e1f615" data="1f615"></span>
						<span class="chaticon e1f616" data="1f616"></span>
						<span class="chaticon e1f643" data="1f643"></span>
						<span class="chaticon e1f637" data="1f637"></span>
						<span class="chaticon e1f912" data="1f912"></span>
						<span class="chaticon e1f915" data="1f915"></span>
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
			</div>
        </div>
        
    </div>
	
</div>	
	
<script>
    var controller = '<?= $controller; ?>/';
    var csrfHash = '<?= $csrfHash; ?>';
    var cpage = 0;
    var search;
    var schoolid = 0;
    $(function() {
		
    });
</script>	
	
	
<script>
var token = '<?=$token?>';
var chat_code = '<?=$chat_code?>';
var app = angular.module('app', ['firebase']);
app.filter('unsafe', function($sce) { return $sce.trustAsHtml; });
app.controller('chatCtrl', ['$scope', '$firebase', '$firebaseArray', '$firebaseAuth', function($scope, $firebase , $firebaseArray, $firebaseAuth) {
	var user_id = '<?=$user_id?>';
    var customername = '<?=$login->fullname?>';
    var customer_id = '<?=$login->id?>';
	var ref;
	
	$scope.authObjMsg = $firebaseAuth();
	$scope.authObjMsg.$signInWithCustomToken(token).then(function(firebaseUser) {
		console.log("Signed in as:", firebaseUser.uid);	
		$scope.init();
	}).catch(function(error) {
		console.log("Error:", error);	
	});
	
	$scope.init = function() {
		db = firebase.database().ref();
		dblog = db.child('log');
		dbping = db.child('ping');
		//show noi dung chat
		current_chat = dblog.child(chat_code);
		$scope.chatLogList = $firebaseArray(current_chat);
	}

	$scope.sendChat = function() {
		$scope.add_to_chat_list();
		
		var input_msg = $('#input-msg');
		var dateTimeLog = getDateTime(false);
		
		removeBr('#input-msg');
		var msg = input_msg.html();
		
		ref = dblog.child(chat_code);
		var avatar = '<img class="avatar" src="<?=base_url()?>files/user/<?=$login->signature?>">';
		$firebaseArray(ref).$add({
			type : 0,//khach hang gui tin nhan
			msg : msg,
			dateTime : dateTimeLog,
			user_id : customer_id,
			name: customername,
			avatar: avatar
		});
        input_msg.html('');
		move_to_bottom('.chat_log_list');
		$scope.save_chat_to_db(chat_code, customername, avatar, msg, dateTimeLog);
    }
	
	$scope.sendChatImage = function(img_src) {
		$scope.add_to_chat_list();
		
		var input_msg = $('#input-msg');
		var dateTimeLog = getDateTime(false);
		
		removeBr('#input-msg');
		var msg = '<img class="img-msg" src="'+ img_src +'" />';
		
		ref = dblog.child(chat_code);
		var avatar = '<img class="avatar" src="<?=base_url()?>files/user/<?=$login->signature?>">';
		$firebaseArray(ref).$add({
			type : 0,//khach hang gui tin nhan
			msg : msg,
			dateTime : dateTimeLog,
			user_id : customer_id,
			name: customername,
			avatar: avatar
		});
        input_msg.html('');
		move_to_bottom('.chat_log_list');
		$scope.save_chat_to_db(chat_code, customername, avatar, msg, dateTimeLog);
    }
	
	$scope.checkAndSendChat = function(e) {
		if (e.keyCode == 13) {
			$scope.sendChat();
		}
    }
	
	$scope.showLoading = function() {
		$('.loading-overplay').show();
		setTimeout( function(){   
            $('.loading-overplay').hide();
        }, 1000);
    }
	
	$scope.uploadImage = function() {
		var formData = new FormData();
		formData.append('image_file', $('#input-image')[0].files[0]);

		$.ajax({
		   url : controller + '/upload_image',
		   type : 'POST',
		   data : formData,
		   processData: false,  // tell jQuery not to process the data
		   contentType: false,  // tell jQuery not to set contentType
		   success : function(data) {
			   $scope.sendChatImage(data);
		   }
		});
	}
	$scope.add_to_chat_list = function() {
		dbping.child(user_id).child(chat_code).set({
			chat_code: chat_code,
			name: customername,
			ping: 1,
			avatar: '<img class="avatar" src="<?=base_url()?>files/user/<?=$login->signature?>">'
		});
	}
	$scope.move_to_bottom = function() {
		move_to_bottom('.chat_log_list');
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
			   
		   }
		});
	}
}]);

</script>	
<script src="<?= url_tmpl(); ?>js/chatfunc.js" type="text/javascript"></script>