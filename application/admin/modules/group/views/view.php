<style title="" type="text/css">
	table col.c1 { width: 45px; }
	table col.c2 { width: 60px; }
	table col.c3 { width: 250px; }
	table col.c4 { width: 100px; }
	table col.c5 { width: 100px; }
	table col.c6 {width: auto;}
</style>
<!-- BEGIN PORTLET-->
<div class="portlet box blue">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-search" style="margin-top:2px;"></i>
			<?= getLanguage('all', 'Search') ?>
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
						<label class="control-label col-md-4">Tên nhóm</label>
						<div class="col-md-8">
							<input type="text" name="groupname" id="groupname" class="searchs form-control" required />
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label class="control-label col-md-4" style="white-space:nowrap;">Loại nhóm</label>
						<div class="col-md-8">
							<select name="grouptype combo" id="grouptype">
								<option value=""></option>
								<option value="1">Root</option>
								<option value="2">Admin</option>
								<option value="3">Manager</option>
								<option value="4">User</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col-md-5">
					<div class="mright10" >
						<input type="hidden" name="id" id="id" />
						<input style="width:300px;" type="hidden" id="token" name="<?=$csrfName;?>" value="<?=$csrfHash;?>" />
						
					</div>		
				</div>
			</div>
	</div>
</div>

<div class="portlet box blue">
	<div class="portlet-title">
        <div class="caption" style="margin-top:4px;">
            <i>Có <span class='viewtotal'>0</span> nhóm quyền</i>
        </div>
        <div class="tools">
            <ul class="button-group pull-right" style="margin-top:-3px; margin-bottom:5px;">
				<li id="search">
					<button class="button">
						<i class="fa fa-search"></i>
						<?=getLanguage('all','Search');?>
					</button>
				</li>
				<li id="refresh" >
					<button class="button">
						<i class="fa fa-refresh"></i>
						<?=getLanguage('all','Refresh');?>
					</button>
				</li>
				<?php if(isset($permission['add'])){?>
				<li id="save"><button class="button">
					<i class="fa fa-plus"></i>
					<?=getLanguage('all','Add');?>
					</button>
				</li>
				<?php }?>
				<?php if(isset($permission['edit'])){?>
				<li id="edit">
					<button class="button">
						<i class="fa fa-save"></i>
						<?=getLanguage('all','Edit');?>
					</button>
				</li>
				<?php }?>
				<?php if(isset($permission['delete'])){?>
				<li id="delete">
					<button type="button" class="button">
						<i class="fa fa-times"></i>
						<?=getLanguage('all','Delete');?>
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
						<table id="tbheader" width="100%" cellspacing="0" border="1" >
							<?php for($i=1; $i< 5; $i++){?>
								<col class="c<?=$i;?>">
							<?php }?>
							<tr>
								<th><input type="checkbox" id="checkAll" autocomplete="off" /></th>
								<th>STT</th>
								<th>Tên nhóm</th>
								<th>Phân quyền</th>
								<th></th>
							</tr>
						</table>
					</div>
				</div>
				<!--end header-->
				<!--body-->
				<div id="data">
					<div id="gridView">
						<table id="tbbody"  width="100%" cellspacing="0" border="1">
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
<div class="loading" style="display: none;">
	<div class="blockUI blockOverlay" style="width: 100%;height: 100%;top:0px;left:0px;position: absolute;background-color: rgb(0,0,0);opacity: 0.1;z-index: 1000;">
	</div>
	<div class="blockUI blockMsg blockElement" style="width: 30%;position: absolute;top: 15%;left:35%;text-align: center;">
		<img src="<?=url_tmpl()?>img/ajax_loader.gif" style="z-index: 2;position: absolute;"/>
	</div>
</div> 
<!-- ui-dialog -->
<div id="dialog" title="Right"></div>
<script>
	var controller = '<?=$controller;?>/';
	var csrfHash = '<?=$csrfHash;?>';
	var table;
	var cpage = 0;
	var search;
	var routes = '<?=$routes;?>';
	$(function(){	
		$("#grouptype").multipleSelect({
			filter: true,
			placeholder:'Chọn nhóm',
			single: true
		});
		refresh();
		$("#search").click(function(){
			$(".loading").show();
			searchList();	
		});
		$("#refresh").click(function(){
			$(".loading").show();
			refresh();
		});
		$("#save").click(function(){
			search = getSearch();
			var obj = $.evalJSON(search); 
			if(obj.groupname == ""){
				error("Group name <?=getLanguage('all','empty');?>");
				$("#groupname").focus();
				return false;		
			}
			var token = $("#token").val();
			$.ajax({
				url : controller + 'save',
				type: 'POST',
				async: false,
				data: {csrf_stock_name:token,search:search , id:""},
				success:function(datas){
					var obj = $.evalJSON(datas); 
					$("#token").val(obj.csrfHash);
					if(obj.status == 0){
						error("<?=getLanguage('all','add_failed')?>"); return false;	
					}
					else if(obj.status == -1){
						error("Group name <?=getLanguage('all','exits')?>"); return false;	
					}
					else{
						refresh();
					}
				},
				error : function(){
					
				}
			});
		});
		$("#edit").click(function(){
			search = getSearch();
			var obj = $.evalJSON(search); 
			if(obj.groupname == ""){
				error("Group name <?=getLanguage('all','empty');?>");
				$("#groupname").focus();
				return false;		
			}
			var token = $("#token").val();
			var id = $("#id").val();
			$.ajax({
				url : controller + 'edit',
				type: 'POST',
				async: false,
				data: {csrf_stock_name:token,search:search , id:id},
				success:function(datas){
					var obj = $.evalJSON(datas); 
					$("#token").val(obj.csrfHash);
					if(obj.status == 0){
						error("<?=getLanguage('all','edit_failed')?>"); return false;		
					}
					else if(obj.status == -1){
						error("Group name <?=getLanguage('all','exits')?>"); return false;		
					}
					else{
						refresh();
					}
				},
				error : function(){
					
				}
			});
		});
		$("#delete").click(function(){ 
			var id = getCheckedId();
			if(id == ''){ return false;}
			$.msgBox({
				title: "Message",
				type: "error",
				content:'Do you want to delete this item?',
				buttons: [{value: 'Yes'},{ value: 'No'}],
				success: function(result) { 
					if (result == 'Yes') {
						var token = $("#token").val();
						$.ajax({
							url : controller + 'deletes',
							type: 'POST',
							async: false,
							data: {csrf_stock_name:token,id:id},
							success:function(datas){
								var obj = $.evalJSON(datas); 
								$("#token").val(obj.csrfHash);
								if(obj.status == 0){
									error("<?=getLanguage('all','delete-faile')?>"); return false;		
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
			width: 400,
			height:460,
			modal:false
		});
	});
	function getCheckedId(){
		var strId = '';
		$('#group').find('input:checked').each(function(){
			var id = $(this).attr('id');
			if(id != 'checkAll'){
				strId += ',' + $(this).attr('id') ;
			}
		})
		return strId.substring(1);
	}
    function funcList(obj){
		$(".edit").each(function(e){
			$(this).click(function(){ 
				 var groupname = $(".groupname").eq(e).html().trim();
				 var grouptype = $(this).attr('grouptype');
				 var id = $(this).attr('id');
				 $("#id").val(id);	
				 $("#groupname").val(groupname);	
				 $("#grouptype").multipleSelect('setSelects', grouptype.split(','));
			});
			function getIDChecked(){
				return 1;	
			} 
		});	
		$(".permission").each(function(e){
			$(this).click(function(event){ 
				$( "#dialog" ).dialog( "open" );
				event.preventDefault();
				var id = $(this).attr('id');
				var token = $("#token").val();
				$.ajax({
					url : controller + 'getRight',
					type: 'POST',
					async: false,
					data: {csrf_stock_name:token, id:id},
					success:function(datas){
						var obj = $.evalJSON(datas); 
						$("#token").val(obj.csrfHash); 
						$('#dialog').html(obj.content);
						$("#saveright").click(function(){
							var right = getRight();
							token = $("#token").val();
							$.ajax({
								url : controller + 'setRight',
								type: 'POST',
								async: false,
								data: {csrf_stock_name:token, id:id, right:right},
								success:function(datas){
									var obj2 = $.evalJSON(datas);
									$("#token").val(obj2.csrfHash);
								}
							});
							$("#dialog").dialog( "close" );	
						});	
					},
					error : function(){
						
					}
				});
				return false;
			});
		});
	}
	function refresh(){
		$(".loading").show();
		$(".searchs").val("");
		$('#grouptype,#schoolid').multipleSelect('uncheckAll');
		csrfHash = $('#token').val();
		search = getSearch();
		getList(cpage,csrfHash);	
	}
	function searchList(){
		search = getSearch();
		csrfHash = $('#token').val();
		getList(cpage,csrfHash);	
	}
	function getSearch(){
		var grouptype = getCombo('grouptype');
		var schoolid = getCombo('schoolid');
		var obj = '';
		$('.searchs').each(function(i){
			var id = $(this).attr('id');
			var val = $(this).val();
			obj +=',"'+id+'":"'+val+'"';		
		});
		return '{"grouptype":"'+grouptype+'"'+obj+'}';
	}
</script>
<script src="<?=url_tmpl();?>js/right.js" type="text/javascript"></script>
<script src="<?=url_tmpl();?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
