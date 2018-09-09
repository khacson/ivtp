<link href="<?=url_tmpl()?>colorpickerplus/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">
<link href="<?=url_tmpl()?>colorpickerplus/dist/css/bootstrap-colorpicker-plus.css" rel="stylesheet">
<script src="<?=url_tmpl()?>colorpickerplus/dist/js/bootstrap-colorpicker.min.js"></script>
<script src="<?=url_tmpl()?>colorpickerplus/dist/js/bootstrap-colorpicker-plus.js"></script>

<style title="" type="text/css">
<?php foreach ($colList as $item) { ?>
	table col.c<?=$item->id?> { width: <?=$item->col_width?>px; }
<?php } ?>
	table col.c_checkbox { width: 40px; }
	table col.c_stt { width: 50px; }
	table col.c_username { width: 180px; }
	table col.c_fullname { width: 180px; }
	table col.c_datecreate { width: 150px; }
	table col.c_row_color { width: 65px; }
	table col:last-child() { width: auto; }
	
	.btn-title-add {
		float: right;
		font-size: 10px !important;
		font-style: normal;
		margin-right: 20px;
		margin-top: 2px;
	}
	.actionbtn a {
		color: #3399ff;
	}
	.actionbtn a:hover {
		text-decoration: none;
		color: #0d638f;
	}
	.graybg {
		background: #ccc !important;
	}
	#dialog {
		overflow-x: hidden;
	}
	#dialog input.searchs {
		width: 170px;
		float: left;
	}
	#dialog input.searchs.col_width {
		width: 60px;
		float: left;
	}
	
	.color-fill-icon{display:inline-block;width:16px;height:16px;border:1px solid #000;background-color:#fff;margin: 2px;}
    .dropdown-color-fill-icon{position:relative;float:left;margin-left:0;margin-right: 0}
	.form-control.colorpicker-element, .colorpickerplus-custom-colors, span.input-group-btn button.btn-default {
		display: none;
	}
	colorpicker.dropdown-menu.colorpicker-with-alpha.colorpicker-right.colorpicker-hidden {
		display: none;
	}
	#tbheader th {
		cursor: pointer;
	}
	th i.sort.fa-sort-desc{
		vertical-align: top;
	}
	th i.sort.fa-sort-asc{
		vertical-align: bottom;
	}
	.seachForm label.control-label, .seachForm .col-md-10, .seachForm .col-md-9 {
		padding: 0 !important;
	}
	textarea.searchs {
		padding: 5px;
		border: 1px solid #c3cfd7;
	}
	.ui-dialog {
		z-index: 11;
	}
</style>
<!-- BEGIN PORTLET-->
<form method="post" enctype="multipart/form-data">
<div class="portlet box blue">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-reorder"></i>
			<?=getLanguage('all','Search')?><?=$view_user_name?>
		</div>
		<div class="tools">
			<a href="javascript:;" class="collapse">
			</a>
		</div>
	</div>
	<div class="portlet-body seachForm">
		<div class="row">
			<div class="col-md-4 mtop10">
				<div class="form-group">
					<label class="control-label col-md-3">Thành viên (<span class="red">*</span>)</label>
					<div class="col-md-9" >
						<select name="member_id" id="member_id" class="combos" >
							<option value=""></option>
							<?php foreach ($memberList as $item) { ?>
								<option value="<?=$item->id;?>"><?=$item->id;?> - <?=$item->fullname?></option>
							<?php } ?>
						</select>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<?php foreach ($colList as $item) { ?>
			<div class="col-md-4 mtop10">
				<div class="form-group">
					<label class="control-label col-md-3"><?=$item->col_name?></label>
					<div class="col-md-9" style="z-index: 10">
						<textarea rows="3" name="<?=$item->id?>" id="<?=$item->id?>" class="searchs form-control"></textarea>
					</div>
				</div>
			</div>
			<?php } ?>
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
            <i>Có <span class='viewtotal'>0</span> dòng</i>
        </div>
        <div class="tools">
           <ul class="button-group pull-right" style="margin-top:-3px; margin-bottom:5px;">
						<li id="search">
							<button type="button" class="button">
								<i class="fa fa-search"></i>
								<?=getLanguage('all','Tìm kiếm')?>
							</button>
						</li>
						<li id="refresh">
							<button type="button" class="button">
								<i class="fa fa-refresh"></i>
								<?=getLanguage('all','Làm mới')?>
							</button>
						</li>
						<li id="colsetting">
							<button type="button" class="button">
								<i class="fa fa-columns"></i>
								<?=getLanguage('all','Quản lý cột')?>
							</button>
						</li>
						<?php if(isset($permission['add'])){?>
						<li id="save">
							<button type="button" class="button">
								<i class="fa fa-plus"></i>
								<?=getLanguage('all','Thêm')?>
							</button>
						</li>
						<?php }?>
						<?php if(isset($permission['edit'])){?>
						<li id="edit">
							<button type="button" class="button">
								<i class="fa fa-save"></i>
								<?=getLanguage('all','Sửa')?>
							</button>
						</li>
						<?php }?>
						<?php if(isset($permission['delete'])){?>
						<li id="delete">
							<button type="button" class="button">
								<i class="fa fa-times"></i>
								<?=getLanguage('all','Xóa')?>
							</button>
						</li>
						<?php }?>
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
							<col class="c_row_color">
							<col class="c_checkbox">
							<col class="c_stt">
							<col class="c_fullname">
							<col class="c_datecreate">
							<?php foreach ($colList as $item) { ?>
								<col class="c<?=$item->id?>">
							<?php }?>
							<tr>
								<th>Màu nền</th>
								<th class="text-center"><input type="checkbox" name="checkAll" id="checkAll" /></th>
								<th>STT <i class="fa fa-sort-desc sort"></i></th>
								<th>Thành viên <i class="fa fa-sort-desc sort"></i></th>
								<th>Ngày tạo <i class="fa fa-sort-desc sort"></i></th>
								<?php foreach ($colList as $item) { ?>
								<th><?=$item->col_name?>  <i class="fa fa-sort-desc sort"></i></th>
								<?php }?>
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
							<col class="c_row_color">
							<col class="c_checkbox">
							<col class="c_stt">
							<col class="c_fullname">
							<col class="c_datecreate">
							<?php foreach ($colList as $item) { ?>
								<col class="c<?=$item->id?>">
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
<div id="dialog" title="Quản lý cột">
	
</div>

<script>
	var controller = '<?=$controller;?>/';
	var csrfHash = '<?=$csrfHash;?>';
	var cpage = 0;
	var search;
	var schoolid = 0;
	var isedit = 0;
	$(function(){
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
				error('Chọn dòng để sửa'); 
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
				content:'Bạn có chắc muốn xóa dòng này?',
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
			width: 600,
			height:460,
			modal:false,
			dialogClass: 'dialog-title-add'
		});
		
		$('#colsetting').click(function(event){		
			getAllCol();
			$( "#dialog" ).dialog( "open" );
			return false;
		});
		
		$('.actionbtn a, .actionbtn button.col_color, .saveAllCol').live('click', function(){
			isedit = 1;
		})
		
		$('.ui-dialog-titlebar-close').live('click', function(){
			if (isedit == 1) {
				window.location = '';
			}
		})
		
		$('#tHeader th').live('click', function(){
			if ($(this).text().trim() != '') {
				var index = $(this).index();
				sortTable(index, 'tbbody');
				var iTag = $(this).find('i.sort');
				if (iTag.hasClass('fa-sort-desc')) {
					iTag.removeClass('fa-sort-desc');
					iTag.addClass('fa-sort-asc');
				}
				else {
					iTag.removeClass('fa-sort-asc');
					iTag.addClass('fa-sort-desc');
				}
			}
			
		})
	});
	function save(func,id){
		search = getSearch();
		var obj = $.evalJSON(search); 
		var token = $('#token').val();
		
		if(obj.member_id == ''){
			error("Thành viên không được trống"); 
			$("#username").focus();
			return false;		
		}
		var data = new FormData();
		data.append('csrf_stock_name', token);
		data.append('search', search);
		data.append('member_id', obj.member_id);
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
				else{
					refresh();
				}
			},
			error : function(){
				
			}
		});
	}
    function funcList(obj){
		$('.edit').each(function(e) {
            $(this).click(function() {
				var json = $(this).find('.json').text();
				var obj = JSON.parse(json);
				for (var col_id in obj) {
					$('#'+ col_id).val(obj[col_id]);
				}
               
				var id = $(this).attr('id');
				var user_id = $(this).attr('user_id');
				var member_id = $(this).attr('member_id');
				
                $('#id').val(id);
				$('#user_id').multipleSelect('setSelects', user_id.split(','));
				$('#member_id').multipleSelect('setSelects', member_id.split(','));
            });
        });
	}
	function getAllCol() {
		var token = $("#token").val();
		$.ajax({
			url : controller + 'getAllCol',
			type: 'POST',
			async: false,
			data: {csrf_stock_name:token},
			success:function(datas){
				var obj = $.evalJSON(datas); 
				$("#token").val(obj.csrfHash); 
				$('#dialog').html(obj.content);
				$('.loading').hide();
			},
			error : function(){
				$('.loading').hide();
				
			}
		});
	}
	function addCol() {
		$('.loading').show();
		var token = $("#token").val();
		$.ajax({
			url : controller + 'addCol',
			type: 'POST',
			async: false,
			data: {csrf_stock_name:token},
			success:function(datas){
				var obj = $.evalJSON(datas); 
				$("#token").val(obj.csrfHash); 
				getAllCol();
				$('.loading').hide();
			},
			error : function(){
				$('.loading').hide();
				
			}
		});
	}
	function editCol(col_id) {
		$('.loading').show();
		var token = $("#token").val();
		var col_name = $("#col_name" + col_id).val().trim();
		var col_width = $("#col_width" + col_id).val().trim();
		if (col_name == '') {
			$('.loading').hide();
			error("Tên cột không được trống"); 
			return;
		}
		if (col_width == '') {
			$('.loading').hide();
			error("Độ rộng cột không được trống"); 
			return;
		}
		$.ajax({
			url : controller + 'editCol',
			type: 'POST',
			async: false,
			data: {csrf_stock_name:token, col_name: col_name, col_width: col_width, col_id: col_id},
			success:function(datas){
				var obj = $.evalJSON(datas); 
				$("#token").val(obj.csrfHash); 
				getAllCol();
				$('.loading').hide();
			},
			error : function(){
				$('.loading').hide();
				
			}
		});
	}
	function saveAllCol() {
		$('.loading').show();
		var token = $("#token").val();
		var check = 1;
		var objColName = {};
		var objColWidth = {};
		$('#dialog .searchs.col_name').each(function(){
			var col_id = $(this).attr('id').replace(/col_name/g, '');
			var col_name = $(this).val().trim();
			if (col_name == '') {
				check = 0;
				return;
			}
			objColName[col_id] = col_name;
		})
		
		if (check == 0) {
			$('.loading').hide();
			error("Tên cột không được trống"); 
			return;
		}
		
		check = 1;
		$('#dialog .searchs.col_width').each(function(){
			var col_id = $(this).attr('id').replace(/col_width/g, '');
			var col_width = $(this).val().trim();
			if (col_width == '') {
				check = 0;
				return;
			}
			objColWidth[col_id] = col_width;
		})
		
		if (check == 0) {
			$('.loading').hide();
			error("Độ rộng cột không được trống"); 
			return;
		}
		
		var jsonColWidth = JSON.stringify(objColWidth);
		var jsonColName = JSON.stringify(objColName);
		$.ajax({
			url : controller + 'saveAllCol',
			type: 'POST',
			async: false,
			data: {csrf_stock_name:token, jsonColName: jsonColName, jsonColWidth: jsonColWidth},
			success:function(datas){
				var obj = $.evalJSON(datas); 
				$("#token").val(obj.csrfHash); 
				getAllCol();
				$('.loading').hide();
			},
			error : function(){
				$('.loading').hide();
				
			}
		});
	}
	function hideCol(col_id) {
		$('.loading').show();
		var token = $("#token").val();
		$.ajax({
			url : controller + 'editCol',
			type: 'POST',
			async: false,
			data: {csrf_stock_name:token, isshow: 0, col_id: col_id},
			success:function(datas){
				var obj = $.evalJSON(datas); 
				$("#token").val(obj.csrfHash); 
				getAllCol();
				$('.loading').hide();
			},
			error : function(){
				$('.loading').hide();
				
			}
		});
	}
	function showCol(col_id) {
		$('.loading').show();
		var token = $("#token").val();
		$.ajax({
			url : controller + 'editCol',
			type: 'POST',
			async: false,
			data: {csrf_stock_name:token, isshow: 1, col_id: col_id},
			success:function(datas){
				var obj = $.evalJSON(datas); 
				$("#token").val(obj.csrfHash); 
				getAllCol();
				$('.loading').hide();
			},
			error : function(){
				$('.loading').hide();
				
			}
		});
	}
	function delCol(col_id) {
		$('.loading').show();
		var token = $("#token").val();
		$.ajax({
			url : controller + 'editCol',
			type: 'POST',
			async: false,
			data: {csrf_stock_name:token, isdelete: 1, col_id: col_id},
			success:function(datas){
				var obj = $.evalJSON(datas); 
				$("#token").val(obj.csrfHash); 
				getAllCol();
				$('.loading').hide();
			},
			error : function(){
				$('.loading').hide();
				
			}
		});
	}
	function move(col_id, type) {
		$('.loading').show();
		var token = $("#token").val();
		$.ajax({
			url : controller + 'move',
			type: 'POST',
			async: false,
			data: {csrf_stock_name:token, type: type, col_id: col_id},
			success:function(datas){
				var obj = $.evalJSON(datas); 
				$("#token").val(obj.csrfHash); 
				getAllCol();
				$('.loading').hide();
			},
			error : function(){
				$('.loading').hide();
			}
		});
	}
	function changeColColor(col_id, col_color) {
		$('.loading').show();
		var token = $("#token").val();
		$.ajax({
			url : controller + 'editCol',
			type: 'POST',
			async: false,
			data: {csrf_stock_name:token, col_color: col_color, col_id: col_id},
			success:function(datas){
				var obj = $.evalJSON(datas); 
				$("#token").val(obj.csrfHash); 
				getAllCol();
				$('.loading').hide();
			},
			error : function(){
				$('.loading').hide();
			}
		});
	}
	function changeRowColor(row_id, row_color) {
		$('.loading').show();
		var token = $("#token").val();
		$.ajax({
			url : controller + 'changeRowColor',
			type: 'POST',
			async: false,
			data: {csrf_stock_name:token, row_color: row_color, row_id: row_id},
			success:function(datas){
				var obj = $.evalJSON(datas); 
				$("#token").val(obj.csrfHash); 
				$('tr.r'+ row_id).css('backgroundColor', row_color + ' !important');
				$('.loading').hide();
			},
			error : function(){
				$('.loading').hide();
			}
		});
	}
	function refresh(){
		$('.loading').show();
		$('.searchs').val('');
		$('select.combos').multipleSelect('uncheckAll');
		$('#id').val('');
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
		var obj = {};
		$('.seachForm input.searchs, .seachForm textarea.searchs').each(function(){
			obj[$(this).attr('id')] = $(this).val().trim();
		})
		$('.seachForm select.combos').each(function(){
			obj[$(this).attr('id')] = getCombo($(this).attr('id'));
		})
		return JSON.stringify(obj);
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
