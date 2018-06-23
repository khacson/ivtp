<script src="<?=url_tmpl()?>assets\plugins\bootstrap-datepicker\js\bootstrap-datepicker.js" type="text/javascript"></script>
<link href="<?=url_tmpl()?>assets\plugins\bootstrap-datepicker\css\datepicker.css" rel="stylesheet"/>
<style title="" type="text/css">
	table col.c1 { width: 45px; }
	table col.c2 { width: 200px; }
	table col.c3 { width: 180px; }
	table col.c4 { width: 130px; }
	table col.c5 { width: auto; }
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
					<label class="control-label col-md-4">Nhân viên</label>
					<div class="col-md-8" >
						<select name="user_id" id="user_id" class="combos" >
							<option value=""></option>
							<?php foreach ($userList as $item) { ?>
								<option value="<?=$item->id;?>"><?=$item->username?> - <?=$item->fullname?></option>
							<?php } ?>
						</select>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="control-label col-md-4">Từ ngày</label>
					<div class="col-md-8" >
						<input id="from_date" class="datepicker searchs form-control"" data-date-format="mm/dd/yyyy">
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="control-label col-md-4">Đến ngày</label>
					<div class="col-md-8" >
						<input id="to_date" class="datepicker searchs form-control"" data-date-format="mm/dd/yyyy">
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
            <i>Có <span class='viewtotal'>0</span> nhân viên</i>
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
							<?php for($i=1; $i< 5; $i++){?>
								<col class="c<?=$i;?>">
							<?php }?>
							<tr>
								<th>STT</th>
								<th id="ord_c.user_id">Nhân viên</th>
								<th id="ord_c.member_id">Tổng điểm</th>
								<th id="ord_c.chat_code">Chi tiết</th>
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
							<?php for($i=1; $i< 5; $i++){?>
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
		$('.datepicker').datepicker();
		$('#user_id').multipleSelect({
        	filter: true,
			placeholder:"Chọn nhân viên",
            single: true
        });
		$('#member_id').multipleSelect({
        	filter: true,
			placeholder:"Chọn thành viên",
            single: true
        });
		$('#star').multipleSelect({
        	filter: true,
			placeholder:"Chọn đánh giá",
            single: true
        });
		$('#status').multipleSelect({
        	filter: true,
			placeholder:"Chọn trạng thái",
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
