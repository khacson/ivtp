<style title="" type="text/css">
	table col.c1 { width: 35px; }
	table col.c2 { width: 130px; }
	table col.c3 { width: 150px; }
	table col.c4 { width: 190px; }
	table col.c5 { width: 90px; }
	table col.c6 { width: 100px; }
	table col.c7 { width: 150px; }
	table col.c8 { width: 110px; }
	table col.c9 { width: 110px; }
	table col.c10 { width: 150px; }
	table col.c11 { width: 150px; }
	table col.c12 { width: 150px; }
	table col.c13 { width: 150px; }
	table col.c14 { width: 100px; }
	table col.c15 { width: auto; }
	.btn-title-add {
		float: right;
		font-size: 10px !important;
		font-style: normal;
		margin-right: 20px;
		margin-top: 2px;
	}
	#gridView .btn {
		min-width: 50px;
	}
</style>
<!-- BEGIN PORTLET-->
<form method="post" enctype="multipart/form-data">
<div class="portlet box blue">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-reorder"></i>
			<?=getLanguage('all','Search')?>
		</div>
		<div class="tools">
			<a href="javascript:;" class="collapse">
			</a>
		</div>
	</div>
	<div class="portlet-body">
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label class="control-label col-md-4">Mã kích hoạt</label>
					<div class="col-md-8">
						<input type="text" name="active_code" id="active_code" class="searchs form-control" />
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="control-label col-md-4">Thành viên</label>
					<div class="col-md-8" >
						<select name="member_id" id="member_id" class="combos" >
							<option value=""></option>
							<?php foreach ($memberList as $item) { ?>
								<option value="<?=$item->id;?>"><?=$item->id;?> - <?=$item->fullname?></option>
							<?php } ?>
						</select>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="control-label col-md-4">Thời gian ĐK</label>
					<div class="col-md-8" >
						<select name="time_use" id="time_use" class="combos" >
							<option value=""></option>
							<?php for ($i=1; $i<12; $i++) { ?>
								<option value="<?=$i?>"><?=$i?> tháng</option>
							<?php } ?>
							<option value="12">1 năm</option>
							<option value="24">2 năm</option>
							<option value="36">3 năm</option>
						</select>
					</div>
				</div>
			</div>
		</div>
		<div class="row mtop10">
			<div class="col-md-4">
				<div class="form-group">
					<label class="control-label col-md-4">Kích hoạt</label>
					<div class="col-md-8" >
						<select name="active_status" id="active_status" class="combos" >
							<option value=""></option>
							<option value="1">Rồi</option>
							<option value="0">Chưa</option>
							<option value="2">Hết hạn</option>
						</select>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="control-label col-md-4">Thanh toán</label>
					<div class="col-md-8" >
						<select name="paid_status" id="paid_status" class="combos" >
							<option value=""></option>
							<option value="1">Rồi</option>
							<option value="0">Chưa</option>
						</select>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="control-label col-md-4">Bỏ trùng</label>
					<div class="col-md-8" >
						<select name="no_dup" id="no_dup" class="combos" >
							<option value=""></option>
							<option value="1">Có</option>
							<option value="0">Không</option>
						</select>
					</div>
				</div>
			</div>
		</div>	
		<div class="row mtop10">
			<div class="col-md-4">
				<div class="form-group">
					<label class="control-label col-md-4">Gói dịch vụ</label>
					<div class="col-md-8" >
						<select name="level" id="level" class="combos" >
							<option value=""></option>
							<option value="1">Normal</option>
							<option value="2">VIP</option>
						</select>
					</div>
				</div>
			</div>
		</div>
		<div class="row mtop10">
			<div class="col-md-8">
				<div class="mright10" >
					<input type="hidden" name="id" id="id" />
					<input type="hidden" id="token" name="<?=$csrfName;?>" value="<?=$csrfHash;?>" />
					
				</div>		
			</div>
		</div>
	</div>
</div>
</form>
<div class="portlet box blue">
	<div class="portlet-title">
        <div class="caption" style="margin-top:4px;">
            <i>Có <span class='viewtotal'>0</span> mã kích hoạt</i>
        </div>
        <div class="tools">
           <ul class="button-group pull-right" style="margin-top:-3px; margin-bottom:5px;">
						<li id="search">
							<button type="button" class="button">
								<i class="fa fa-search"></i>
								<?=getLanguage('all','Search')?>
							</button>
						</li>
						<li id="refresh">
							<button type="button" class="button">
								<i class="fa fa-refresh"></i>
								<?=getLanguage('all','Refresh')?>
							</button>
						</li>
					</ul>
        </div>
    </div>
    <div class="portlet-body">
    	<div class="portlet-body">
        	<div id="gridview" >
				<table class="resultset" id="grid"></table>
				<!--header-->
				<div id="cHeader">
					<div id="tHeader">    	
						<table width="100%" cellspacing="0" border="1" id="tbheader" >
							<?php for($i=1; $i< 14; $i++){?>
								<col class="c<?=$i;?>">
							<?php }?>
							<tr>
								<th>STT</th>
								<th>Mã kích hoạt</th>
								<th>Ngày tạo</th>
								<th>Thành viên</th>
								<th>Gói dịch vụ</th>
								<th>Thời gian ĐK</th>
								<th>Tổng tiền</th>
								<th>Thanh toán</th>
								<th>Kích hoạt</th>
								<th>Từ ngày</th>
								<th>Đến ngày</th>
								<th>Người cập nhật</th>
								<th>Ngày cập nhật</th>
								<th></th>
							</tr>
						</table>
					</div>
				</div>
				<!--end header-->
				<!--body-->
				<div id="data">
					<div id="gridView">
						<table  id="tbbody" width="100%" cellspacing="0" border="1">
							<?php for($i=1; $i< 14; $i++){?>
								<col class="c<?=$i;?>">
							<?php }?>
							<tbody id="grid-rows"></tbody>
						</table>
					</div>
				</div>
				<!--end body-->
            </div>
        </div>
        <div class="portlet-body">
			<div class="fleft" id="paging"></div>
        </div>
    </div>
</div>
<!-- END PORTLET-->
<!-- END PORTLET-->
<div class="loading" style="display: none;">
	<div class="blockUI blockOverlay" style="width: 100%;height: 100%;top:0px;left:0px;position: absolute;background-color: rgb(0,0,0);opacity: 0.1;z-index: 1000;">
	</div>
	<div class="blockUI blockMsg blockElement" style="width: 30%;position: absolute;top: 15%;left:35%;text-align: center;">
		<img src="<?=url_tmpl()?>img/ajax_loader.gif" style="z-index: 2;position: absolute;"/>
	</div>
</div> 
<!-- ui-dialog -->
<div id="dialog" title="Lịch sử chat"></div>
<script>
	var controller = '<?=$controller;?>/';
	var csrfHash = '<?=$csrfHash;?>';
	var cpage = 0;
	var search;
	var schoolid = 0;
	var curr_chat_code;
	$(function(){
		$('#member_id').multipleSelect({
        	filter: true,
			placeholder:"Chọn thành viên",
            single: true
        });
		$('#time_use').multipleSelect({
        	filter: true,
			placeholder:"Chọn thời gian",
            single: true
        });
		$('#paid_status').multipleSelect({
        	filter: true,
			placeholder:"Chọn trạng thái",
            single: true
        });
		$('#active_status').multipleSelect({
        	filter: true,
			placeholder:"Chọn trạng thái",
            single: true
        });
		$('#no_dup').multipleSelect({
        	filter: true,
			placeholder:"Chọn trạng thái",
            single: true
        });
		$('#level').multipleSelect({
        	filter: true,
			placeholder:"Chọn gói dịch vụ",
            single: true
        });
		refresh();
		$('#refresh').click(function(){
			$(".loading").show();
			refresh();
		});
		$('#search').click(function(){
			$('.loading').show();
			searchList();	
		});
		$('#save').click(function(){
			save('save','');
		});
		$('#edit').click(function(){
			var id = $('#id').val();
			if(id == ''){
				error('Chọn một tài khoản'); 
				return false;		
			}
			save('edit',id);
		});
		$('#refreshchatlog').live('click', function(){
			get_chat_history();
		});
		$('.paid_status .btn').live('click', function(){ 
			var status = $(this).parent().attr('paid_status');
			var idR = $(this).parent().attr('idR');
			if (status == 0) {
				var new_status = 1;
				var msg = 'Bạn có chắc tài khoản này <b>ĐÃ ĐƯỢC</b> thanh toán?';
			}
			else {
				var new_status = 0;
				var msg = 'Bạn có chắc tài khoản này <b>CHƯA ĐƯỢC</b> thanh toán?';
			}
			$.msgBox({
				title: 'Thông báo',
				type: 'warning',
				content: msg,
				buttons: [{value: 'Yes'},{ value: 'No'}],
				success: function(result) { 
					if (result == 'Yes') {
						changeStatus('paid_status', new_status,idR );
					}
				}
			});
		});
		$('.active_status .btn').live('click', function(){ 
			var status = $(this).parent().attr('active_status');
			var idR = $(this).parent().attr('idR');
			if (status == 0) {
				var new_status = 1;
				var msg = 'Bạn có chắc muốn <b>KÍCH HOẠT</b> tài khoản này?';
			}
			else {
				var new_status = 0;
				var msg = 'Bạn có chắc muốn <b>HỦY</b> kích hoạt tài khoản này?';
			}
			$.msgBox({
				title: 'Thông báo',
				type: 'warning',
				content: msg,
				buttons: [{value: 'Yes'},{ value: 'No'}],
				success: function(result) { 
					if (result == 'Yes') {
						changeStatus('active_status', new_status, idR);
					}
				}
			});
		});
		$('#delete').click(function(){ 
			$.msgBox({
				title: 'Message',
				type: 'error',
				content:'Do you want to delete this item?',
				buttons: [{value: 'Yes'},{ value: 'No'}],
				success: function(result) { 
					if (result == 'Yes') {
						var id = getCheckedId();
						var token = $('#token').val();
						$.ajax({
							url : controller + 'deletes',
							type: 'POST',
							async: false,
							data: {csrf_stock_name:token,id:id},
							success:function(datas){
								var obj = $.evalJSON(datas); 
								$('#token').val(obj.csrfHash);
								if(obj.status == 0){
									error('<?=getLanguage('all','delete_suc')?>'); return false;		
								}
								else{
									refresh();	
								}
								
							},
							error : function(){
								
							}
						});
					}
				}
			});
		});
		$( "#dialog" ).dialog({
			autoOpen: false,
			width: 500,
			height:460,
			modal:false,
			dialogClass: 'dialog-title-add'
		});
		
		$(".dialog-title-add").children(".ui-dialog-titlebar").append("<button id='refreshchatlog' class='btn-title-add'>Refresh</button>");
	});
	function changeStatus(type, new_status, idR) {
		$('.loading').show();
		var token = $("#token").val();
		$.ajax({
			url : controller + 'changeStatus',
			type: 'POST',
			async: false,
			data: {csrf_stock_name:token, type:type, new_status:new_status, idR:idR},
			success:function(datas){
				var obj = $.evalJSON(datas); 
				$("#token").val(obj.csrfHash); 
				$('.loading').hide();
				searchList();
			},
			error : function(){
				$('.loading').hide();
			}
		});
	}
	function save(func,id){
		search = getSearch();
		var obj = $.evalJSON(search); 
		var token = $('#token').val();
		
		if(obj.username == ''){
			error("Tài khoản <?=getLanguage('all','empty')?>"); 
			$("#username").focus();
			return false;		
		}
		if(obj.fullname==""){
			error("Họ tên <?=getLanguage('all','empty')?>");
			return false;
		}
		if(!validateEmail(obj.email) && obj.email != ""){
			error('Email không đúng định dạng'); 
			$("#email").focus();
			return false;	
		}
		if(!$.isNumeric(obj.mobile) && obj.mobile != ""){
			error('Điện thoại không đúng định dạng'); 
			$("#mobile").focus();
			return false;	
		}			
		if(obj.groupid == ""){
			error("Nhóm quyền <?=getLanguage('user','empty')?>"); 
			$("#username").focus();
			return false;		
		}
		
		var data = new FormData();
		var objectfile = document.getElementById('imageEnable').files;
		data.append('userfile', objectfile[0]);
		data.append('csrf_stock_name', token);
		data.append('search', search);
		data.append('id',id);
		$.ajax({
			url : controller + func,
			type: 'POST',
			async: false,
			data:data,
			enctype: 'multipart/form-data',
			processData: false,  
			contentType: false,   
			success:function(datas){
				var obj = $.evalJSON(datas); 
				$("#token").val(obj.csrfHash);
				if(obj.status == 0){
					if(id != ''){
						error('<?=getLanguage('all','edit-fail')?>'); return false;		
					}
					else{
						error('<?=getLanguage('all','add-fail')?>'); return false;		
					}
				}
				else if(obj.status == -1){
					error("Username <?=getLanguage('all','exits')?>"); return false;		
				}
				else{
					refresh();
				}
			},
			error : function(){
				
			}
		});
	}
    function funcList(obj){
		$(".view_chat_code").each(function(e){
			$(this).click(function(event){
				$('#dialog').html('');				
				$( "#dialog" ).dialog( "open" );
				event.preventDefault();
				var chat_code = $(this).attr('chat_code');
				curr_chat_code = chat_code;
				var title = 'Lịch sử chat: ' + curr_chat_code;
				$('.ui-dialog-title').text(title);
				get_chat_history();
				return false;
			});
		});
	}
	function get_chat_history() {
		var token = $("#token").val();
		$.ajax({
			url : controller + 'get_chat_history',
			type: 'POST',
			async: false,
			data: {csrf_stock_name:token, chat_code:curr_chat_code},
			success:function(datas){
				var obj = $.evalJSON(datas); 
				$("#token").val(obj.csrfHash); 
				$('#dialog').html(obj.content);
			},
			error : function(){
				
			}
		});
	}
	function refresh(){
		$('.loading').show();
		$('.searchs').val('');
		$('select.combos').multipleSelect('uncheckAll');
		
		csrfHash = $('#token').val();
		setSearch();
		search = getSearch();
		getList(cpage,csrfHash);	
	}
	function getCheckedId(){
		var del_list = '';
		$('#grid-rows input.noClick:checked').each(function(){
			var id = $(this).attr('id');
			del_list += ','+id;
		});
		del_list = del_list.substr(1);
		return del_list;
	}
	function searchList(){
		search = getSearch();//alert(cpage);exit;
		csrfHash = $('#token').val();
		getList(0,csrfHash);	
	}
	function getSearch(){
		var str = '';
		$('input.searchs').each(function(){
			str += ',"'+ $(this).attr('id') +'":"'+ $(this).val().trim() +'"';
		})
		$('select.combos').each(function(){
			str += ',"'+ $(this).attr('id') +'":"'+ getCombo($(this).attr('id')) +'"';
		})
		return '{'+ str.substr(1) +'}';
	}
	function setSearch() {
		<?php if (!empty($_GET['m'])) { ?>
		var m = '<?=$_GET['m']?>';
		$('#member_id').multipleSelect('setSelects', m.split(','));
		<?php } ?>
		
		<?php if (!empty($_GET['u'])) { ?>
		var u = '<?=$_GET['u']?>';
		$('#user_id').multipleSelect('setSelects', u.split(','));
		<?php } ?>
	}
	function validateEmail(email){
		var emailReg = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
		var valid = emailReg.test(email);

		if(!valid) {
			return false;
		} else {
			return true;
		}
	}
</script>
<script src="<?=url_tmpl();?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
