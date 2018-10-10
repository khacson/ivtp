var prev_key_code = '';
document.execCommand("enableObjectResizing", false, false);
$(document).mouseup(function(e) {
    var container = $("#icon-motion-container");
    if (!container.is(e.target) && container.has(e.target).length === 0) {
        container.hide();
    }
});
$("#input-msg").keyup(function(e){ 
	if (e.keyCode == 8 && prev_key_code == 8) {
		removeBr('#input-msg');
	}
	prev_key_code = e.keyCode;
	if ($(this).html() == '<br>') {
		$(this).html('');
	}
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
$('body').on('click', '#insert-file', function() {
	$('#input-file')[0].click();
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
	var icon_name = e.getAttribute("data") + '.png';
	var icon_link = base_url + 'files/emotion_icon/' + icon_name;
	var input_msg = $('#input-msg');
	var img = '<img class="icon-msg" src="'+ icon_link +'" />';
	
	input_msg.append(img);
	removeBr('#input-msg');
	toggleIconChat();
	placeCaretAtEnd( document.getElementById("input-msg") );
}
/*
function inserticon(e){
	var icon_name = 'emoji_u' + e.getAttribute("data") + '.png';
	var icon_link = '//ssl.gstatic.com/chat/emoji/7/' + icon_name;
	var input_msg = $('#input-msg');
	var img = '<img class="icon-msg" src="'+ icon_link +'" />';
	
	input_msg.append(img);
	removeBr('#input-msg');
	toggleIconChat();
	placeCaretAtEnd( document.getElementById("input-msg") );
}*/
function removeBr(e) {
	//$(e).find('br').remove(); //console.log(111);
}
function toggleIconChat() {
	$('#icon-motion-container').toggle();
}
function addActiveClass(e) {
	$(e).parent().find('li').removeClass('active');
	$(e).addClass('active');
	$('.end-chat').hide();
	$(e).find('.end-chat').show();
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
function placeCaretAtEnd(el) {
    el.focus();
    if (typeof window.getSelection != "undefined"
            && typeof document.createRange != "undefined") {
        var range = document.createRange();
        range.selectNodeContents(el);
        range.collapse(false);
        var sel = window.getSelection();
        sel.removeAllRanges();
        sel.addRange(range);
    } else if (typeof document.body.createTextRange != "undefined") {
        var textRange = document.body.createTextRange();
        textRange.moveToElementText(el);
        textRange.collapse(false);
        textRange.select();
    }
}
function checkEmail(str) {
	var arr = str.split(' ');
	for (var i in arr) {
		if(arr[i].indexOf('@') != -1 && arr[i].length > 5) {
			return true;
		}
	}
	return false;
}
function checkPhone(str) {
	str = str.replace(/\+/g, '');
	str = str.replace(/\-/g, ' ');
	str = str.replace(/\./g, '');
	str = str.replace(/\,/g, '');
	var arr = str.split(' ');
	for (var i in arr) {
		var t = arr[i].replace(/[^0-9\.]+/g, "");
		if(t.length == 10 || t.length == 11) {
			return true;
		}
	}
	for (var i = 0; i < arr.length; i++) {
		if (arr[i].indexOf('0') != -1 || arr[i].indexOf('84') != -1) {
			var t = getNextNumber(i, arr);
			if(t.length == 10 || t.length == 11) {
				return true;
			}
		}
	}
	return false;
}
function getNextNumber(i, arr) {
	var str = arr[i];
	while (i < arr.length - 1 && (arr[i+1] == parseInt(arr[i+1]) || arr[i+1].indexOf('0') != -1)) {
		str += arr[i+1];
		i++;
	}
	return str;
}
function convertLink(str) {
	if (str.indexOf('http') != -1 && str.indexOf('href') == -1 && str.indexOf('<img') == -1) {
		var arr = str.split(' ');
		for (var i in arr) {
			if (arr[i].indexOf('http') != -1) {
				arr[i] = '<a target="_blank" href="'+ arr[i] +'">'+ arr[i] +'</a>';
			}
		}
		return arr.join(' ');
	}
	return str;
}
document.addEventListener('DOMContentLoaded', function () {
  if (!Notification) {
    //alert('Desktop notifications not available in your browser. Try Chromium.'); 
    return;
  }

  if (Notification.permission !== "granted")
    Notification.requestPermission();
});
document.addEventListener('DOMContentLoaded', function () {
  if (!Notification) {
    //alert('Desktop notifications not available in your browser. Try Chromium.'); 
    return;
  }

  if (Notification.permission !== "granted")
    Notification.requestPermission();
});
function notifyMe(title, img_url, msg, open_url, show_time) {
  if (Notification.permission !== "granted")
    Notification.requestPermission();
  else {
    var notification = new Notification(title, {
      icon: img_url,
      body: msg,
    });

    if (open_url != '') {
		notification.onclick = function () {
		  window.open(open_url);      
		};
	}
	
	if (show_time == 0) {
		show_time = 10000;
	}
	notification.onshow = function() { 
		setTimeout(function() { notification.close() }, show_time); 
	}
  }
}
function getImgSrc(img) {
	$('body').append('<div id="temp_img" style="display:none;">'+ img +'</div>');
	var src = $('#temp_img img').attr('src');
	$('#temp_img img').remove();
	return src;
}
function retrieveImageFromClipboardAsBase64(pasteEvent, callback, imageFormat){
	if(pasteEvent.clipboardData == false){
        if(typeof(callback) == "function"){
            callback(undefined);
        }
    };

    var items = pasteEvent.clipboardData.items;

    if(items == undefined){
		return;
        if(typeof(callback) == "function"){
            callback(undefined);
        }
    };

    for (var i = 0; i < items.length; i++) {
        // Skip content if not image
        if (items[i].type.indexOf("image") == -1) continue;
        // Retrieve image on clipboard as blob
        var blob = items[i].getAsFile();

        // Create an abstract canvas and get context
        var mycanvas = document.createElement("canvas");
        var ctx = mycanvas.getContext('2d');
        
        // Create an image
        var img = new Image();

        // Once the image loads, render the img on the canvas
        img.onload = function(){
            // Update dimensions of the canvas with the dimensions of the image
            mycanvas.width = this.width;
            mycanvas.height = this.height;

            // Draw the image
            ctx.drawImage(img, 0, 0);

            // Execute callback with the base64 URI of the image
            if(typeof(callback) == "function"){
                callback(mycanvas.toDataURL(
                    (imageFormat || "image/png")
                ));
            }
        };

        // Crossbrowser support for URL
        var URLObj = window.URL || window.webkitURL;

        // Creates a DOMString containing a URL representing the object given in the parameter
        // namely the original Blob
        img.src = URLObj.createObjectURL(blob);
    }
}
window.addEventListener("paste", function(e){

    // Handle the event
	if (e.target.id == 'input-msg') {
		retrieveImageFromClipboardAsBase64(e, function(imageDataBase64){
			if(imageDataBase64){
				var img = '<img src="'+ imageDataBase64 +'" />';
				$('#input-msg').html(img);
			}
		});	
	}
    
}, false);