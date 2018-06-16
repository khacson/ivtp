function error(text){
	toastr.error(text,'Lỗi', 
	{
	   closeButton: false,
	   //debug: true,
	   newestOnTop: false,
	   progressBar: true,
	   positionClass: "toast-top-center",
	   preventDuplicates: true,
	   onclick: null,
	   showDuration: "300",
	   hideDuration: 5000,
	   timeOut: 5000,
	   extendedTimeOut: 5000,
	   showEasing: "swing",
	   hideEasing: "linear",
	   showMethod: "fadeIn",
	   hideMethod: "fadeOut"
	}); 
}
function warning(text){
	 toastr.warning(text,'Thông báo', {
	   closeButton: false,
	   //debug: true,
	   newestOnTop: false,
	   progressBar: true,
	   positionClass: "toast-top-center",
	   preventDuplicates: true,
	   onclick: null,
	   showDuration: 500,
	   hideDuration: 500,
	   timeOut: 4000,
	   extendedTimeOut: 4000,
	   showEasing: "swing",
	   hideEasing: "linear",
	   showMethod: "slideDown",
	   hideMethod: "slideUp"
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
	   showDuration: 500,
	   hideDuration: 500,
	   timeOut: 4000,
	   extendedTimeOut: 4000,
	   showEasing: "swing",
	   hideEasing: "linear",
	   showMethod: "slideDown",
	   hideMethod: "slideUp"
	});
}
var ids = '';
function confirmDelete(id) { 
        toastr.options = {
            "closeButton": false,
            "debug": true,
            "newestOnTop": true,
            "progressBar": false,
            "positionClass": "toast-top-center",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "0",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
		ids = id;
		var cf = cfDelete;
        toastr.warning('<div class="txtconfirmDelete">'+cf+'</div><div class="text-center"><button type="button" onclick="okDelete();" id="okdelete" class="btn btn-danger">'+deletes+'</button><button type="button" id="surpriseBtn" class="btn" style="margin: 0 8px 0 8px">'+cancel+'</button></div>')
    }
function okDelete(){
	$.ajax({
		url : controller + 'deletes',
		type: 'POST',
		async: false,
		data: {id:ids},
		success:function(datas){
			var obj = $.evalJSON(datas); 
			$("#token").val(obj.csrfHash);
			if(obj.status == 0){
				error(deleteFailed); return false;		
			}
			else if(obj.status == -1){
				error(deleteFailedExist); return false;		
			}
			else{
				success(deletePassed);
				refresh();	return false;		
			}
		},
		error : function(){
			error(deleteFailed); return false;		
		}
	});
}