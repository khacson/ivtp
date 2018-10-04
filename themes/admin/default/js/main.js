$(function(){
//S Sorting
	$("[id^='ord_']").each(function(){
		$(this).click(function(){
			order =  $(this).attr('id');
			if(index == 'DESC'){
				index = 'ASC';
			}
			else{
				index = 'DESC';
			}
			$(".loading").show();
			searchList();
		});
	});
	//E Sorting
});
var getList = function (page,csrfHash){	
	$("#token").val('');
	$.ajax({
		  url:controller+'getList',
		  async: false,
		  type: 'POST',
		  data:{csrf_stock_name:csrfHash,page:page,search:search,order:order,index:index},
		  success:function(datas) {
			 var obj = $.evalJSON(datas);  
			 $('#paging').html(obj.paging);
			 $('#grid-rows').html(obj.content);
			 $("#token").val(obj.csrfHash);
			 var total = obj.viewtotal;
			 $(".viewtotal").html(total);
			 $(".loading").hide();
			 paging(obj.csrfHash);
			 if(typeof(func_get)=='function'){
				func_get(obj);
			 }
			  if(typeof(funcList)=='function'){
				  funcList(obj);
			  }
		  }
	});
}
function func_get(obj){
	$('.edit').each(function(e){
		 $(this).click(function(){
			  var id = $(this).attr('id');
			  var groupname = $(".groupname").eq(e).html();
			  $("#id").val(id);
			  $("#groupname").val(groupname);
		 }); 
		 $(this).click(function () { 
			//con tro toi tr
			var _this = $(this);
			//con tro toi check box
			var _checkbox = _this.find(":checkbox[name='keys[]']");
			//click hang nao thi check vao hang do
			var check = _checkbox.is(':checked');
			if(check == true){
				_checkbox.removeAttr('checked');
			}
			else{
				_checkbox.attr('checked',true);
			}
			//kiem tra xem co check all chua
			var len = $(":checkbox[name='keys[]']:checked").length;
			var len2 = $(":checkbox[name='keys[]']").length;
			$ch = (len==len2)?true:false;
			$("#checkAll").attr('checked',$ch);
		});
	});
}
function paging(csrfHash){
	$("#paging a").each(function(){
		$(this).click(function(){
			cpage = $(this).attr('name');
			getList(cpage,csrfHash);
			return false;
		});
	});
}
function getCombo(id){
	var val = $('#'+id).multipleSelect('getSelects');
	if(typeof val === 'object'){
		val = "";
	}
	return val;
}
$(function(){
	$("#checkAll").click(function() {
		$(":checkbox[name='keys[]']").attr('checked', $('#checkAll').is(':checked'));
	});
});
function error(text){
	 toastr.error(text,'Lỗi', {
	   closeButton: false,
	   //debug: true,
	   newestOnTop: false,
	   progressBar: true,
	   positionClass: "toast-top-center",
	   preventDuplicates: true,
	   onclick: null,
	   showDuration: "300",
	   hideDuration: 3000,
	   timeOut: 3000,
	   extendedTimeOut: 3000,
	   showEasing: "swing",
	   hideEasing: "linear",
	   showMethod: "fadeIn",
	   hideMethod: "fadeOut"
	});
}
function warning(text){
	 toastr.warning(text,'Lỗi', {
	   closeButton: false,
	   //debug: true,
	   newestOnTop: false,
	   progressBar: true,
	   positionClass: "toast-top-center",
	   preventDuplicates: true,
	   onclick: null,
	   showDuration: "300",
	   hideDuration: 3000,
	   timeOut: 3000,
	   extendedTimeOut: 3000,
	   showEasing: "swing",
	   hideEasing: "linear",
	   showMethod: "fadeIn",
	   hideMethod: "fadeOut"
	});
}
function success(text){
	toastr.success(text,'Thông báo', 
	{
	   closeButton: false,
	   //debug: true,
	   newestOnTop: false,
	   progressBar: true,
	   positionClass: "toast-top-center",
	   preventDuplicates: true,
	   onclick: null,
	   showDuration: "300",
	   hideDuration: 1000,
	   timeOut: 1000,
	   extendedTimeOut: 1000,
	   showEasing: "swing",
	   hideEasing: "linear",
	   showMethod: "fadeIn",
	   hideMethod: "fadeOut"
	});
}
function error_focus(text, idForcus){
	$.msgBox({
		title: "Message",
		type: "error",
		content:text,
		buttons: [{value: 'Close'}],
		afterClose: function(result) { 
			$('#'+ idForcus).focus();
		}
	});
}
function getSearch() {
	var objReq = {};
	$("input.searchs").each(function(i) {
		var id = $(this).attr('id');
		var val = $(this).val();
		val = val.replace(/['"]/g, '');
		if(id != undefined){ // neu co dinh nghia id la gi
			objReq[id] = val;
		}
	});
	$("select.combos").each(function(i) {
		var id = $(this).attr('id');
		var val = getCombo(id);
		objReq[id] = val;
	});
	return JSON.stringify(objReq);
}
function sortTable(n, tableid) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById(tableid);
  switching = true;
  // Set the sorting direction to ascending:
  dir = "asc";
  /* Make a loop that will continue until
  no switching has been done: */
  while (switching) {
    // Start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /* Loop through all table rows (except the
    first, which contains table headers): */
    for (i = 0; i < (rows.length - 1); i++) {
      // Start by saying there should be no switching:
      shouldSwitch = false;
      /* Get the two elements you want to compare,
      one from current row and one from the next: */
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /* Check if the two rows should switch place,
      based on the direction, asc or desc: */
      if (dir == "asc") {
        if (x.innerText.toLowerCase() > y.innerText.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerText.toLowerCase() < y.innerText.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /* If a switch has been marked, make the switch
      and mark that a switch has been done: */
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      // Each time a switch is done, increase this count by 1:
      switchcount ++;
    } else {
      /* If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again. */
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
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