var prev_key_code = '';
document.execCommand("enableObjectResizing", false, false);
$("#input-msg").keyup(function(e){ 
	if (e.keyCode == 8 && prev_key_code == 8) {
		removeBr('#input-msg');
	}
	prev_key_code = e.keyCode;
})
$("#input-msg").keypress(function(e){
	if (e.keyCode === 13) {
        e.preventDefault();
	} 
})
$('body').on('click', '#insert-emotion', function() {
	toggleIconChat();
})
$('body').on('click', '#icon-motion-container .chaticon', function() {
	inserticon(this);
})
$('body').on('click', '#insert-image', function() {
	$('#input-image')[0].click();
})
function input_focus() {
	$('#input-msg').focus();
}
function uploadImage() {
	var formData = new FormData();
	formData.append('image_file', $('#input-image')[0].files[0]);

	$.ajax({
	   url : 'upload.php',
	   type : 'POST',
	   data : formData,
	   processData: false,  // tell jQuery not to process the data
	   contentType: false,  // tell jQuery not to set contentType
	   success : function(data) {
		   console.log(data);
	   }
	});
}
function inserticon(e){
	var icon_name = 'emoji_u' + e.getAttribute("data") + '.png';
	var icon_link = '//ssl.gstatic.com/chat/emoji/7/' + icon_name;
	var input_msg = $('#input-msg');
	var img = '<img class="icon-msg" src="'+ icon_link +'" />';
	
	input_msg.append(img);
	removeBr('#input-msg');
	toggleIconChat();
}
function removeBr(e) {
	$(e).find('br').remove(); //console.log(111);
}
function toggleIconChat() {
	$('#icon-motion-container').toggle();
}
function addActiveClass(e) {
	$(e).parent().find('li').removeClass('active');
	$(e).addClass('active');
}
function showInputMsg() {
	$('.new-msg-form').show();
}
function move_to_bottom(e){
	setTimeout(function() {
		$(e).scrollTop($(e)[0].scrollHeight);
	}, 200);
}
function getDateTime(key) {
    var now     = new Date(); 
    var year    = now.getFullYear();
    var month   = now.getMonth()+1; 
    var day     = now.getDate();
    var hour    = now.getHours();
    var minute  = now.getMinutes();
    var second  = now.getSeconds(); 
    if(month.toString().length == 1) {
        var month = '0'+month;
    }
    if(day.toString().length == 1) {
        var day = '0'+day;
    }   
    if(hour.toString().length == 1) {
        var hour = '0'+hour;
    }
    if(minute.toString().length == 1) {
        var minute = '0'+minute;
    }
    if(second.toString().length == 1) {
        var second = '0'+second;
    }   
	if (key == true) {
		return year+'-'+month+'-'+day+'T'+hour+':'+minute+':'+second;   
	}
    else {
		return day+'/'+month+'/'+year+' '+hour+':'+minute;   
	}
}