<style title="" type="text/css">
	table col.c1 { width: 45px; }
	table col.c2 { width: 45px; }
	table col.c3 { width: 250px; }
	table col.c4 { width: 250px; }
	table col.c5 { width: 100px; }
	table col.c6 { width: auto;}
</style>
<link href="<?=url_tmpl();?>css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<div class="box">
	
	<div class="box-body">
	    <div class="row mtop10">
			<div class="col-md-4">
				<div class="form-group">
					<label class="control-label col-md-4"><?=getLanguage('chi-nhanh');?> (<span class="red">*</span>)</label>
					<div class="col-md-8" >
						<select name="branchid" id="branchid" class="combos tab-event" >
							<option value=""></option>
							<?php foreach ($branchs as $item) { ?>
								<option value="<?=$item->id;?>"><?=$item->branch_name?></option>
							<?php } ?>
						</select>
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="col-md-4">
					<div class="box-tools pull-right">
					   <ul class="button-group pull-right btnpermission">
							<li id="import">
								<button type="button" class="button">
									<i class="fa fa-files-o" aria-hidden="true"></i> Import
								</button>
								
							</li>
							<a href="#" id="clickimport" data-toggle="modal" data-target="#myModal"></a>
						</ul>	
					</div>
				 </div>
			</div>
		</div>
		<div class="row mtop10">
			<div class="col-md-12">
				<div class="col-md-12" style="color:#f69;">
					*** Ghi chú:<br> 
					- Dữ liệu import phải nằm ở sheet đầu tiên của file Excel.<br>
					- Import một lần tối đa 500 dòng.<br>
					- Các file import phải cùng một định dạng, thứ tự các cột phải giống nhau.<br>
					- Dữ liệu import bắt đầu từ dòng số 3
				</div>
			</div>
		</div>
		<div class="row mtop10"></div>
	</div>
</div>
<!-- END grid-->
<div class="loading" style="display: none;">
	<div class="blockUI blockOverlay" style="width: 100%;height: 100%;top:0px;left:0px;position: absolute;background-color: rgb(0,0,0);opacity: 0.1;z-index: 1000;">
	</div>
	<div class="blockUI blockMsg blockElement" style="width: 30%;position: absolute;top: 20%;left:35%;text-align: center;">
		<img src="<?=url_tmpl()?>img/preloader.gif" style="z-index: 200000;position: absolute;"/>
	</div>
</div> 
<!-- ui-dialog -->
<!--S Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog w500">
    <!-- Modal content-->
    <div class="modal-content" style="width:500px;">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Chọn file import</h4>
		</div>
		<div id="loadContent" class="modal-body" style="width:800px;">
			<input name="myfile" id="myfile" type="file"/>
		</div>
		<div class="modal-footer">		
			<button id="readexcel" style="padding:2px 10px 5px !important;" type="button" class="btn btn-info" ><i class="fa fa-save"></i> <?=getLanguage('save');?></button>		
			<button id="clickclose" type="button" style="padding:2px 10px 5px !important;" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> <?=getLanguage('close');?></button>
		</div>
    </div>
  </div>
</div>
<!--E Modal -->
<input type="hidden" name="id" id="id" />
<script>
	var controller = '<?=base_url().$routes;?>/';
	var table;
	var cpage = 0;
	var search;
	var routes = '<?=$routes;?>';
	$(function(){	
		init();
		//refresh();
		//searchList();	
		$("#search").click(function(){
			$(".loading").show();
			searchList();	
		});
		$("#refresh").click(function(){
			$(".loading").show();
			refresh();
		});
		$("#import").click(function(){
			var branchid = getCombo('branchid'); //alert(branchid); return;
			if(branchid == ''){
				warning('Chọn chi nhánh'); return false;
			}
			$('#clickimport').click();
		});
		$('#save').click(function(){
			$('#id').val('');
			loadForm();
		});
		$('#edit').click(function(){
			var id = $('#id').val();
			if(id == ''){
				warning('<?=getLanguage('chon-nhom-quyen');?>');
				return false;
			} 
			loadForm(id);
		});
		$("#delete").click(function(){
			var id = getCheckedId();
			if(id == ''){ return false;}
			confirmDelete(id);
			return false
		});
		$(document).keypress(function(e) {
			 var id = $("#id").val();
			 if (e.which == 13) {
				 searchList();	
			 }
		});
		$('#actionSave').click(function(){
			save();
		});
		$('#readexcel').click(function() {
			var branchid = getCombo('branchid'); //alert(branchid); return;
			if(branchid == ''){
				warning('Chọn chi nhánh'); return false;
			}
			$(".loading").show();
			var data = new FormData();
			var objectfile = document.getElementById('myfile').files;
			if(objectfile.length == 0){
				warning('Chọn file import'); $(".loading").hide(); return false;
			}
			data.append('myfile', objectfile[0]);
			data.append('branchid', branchid);
			$.ajax({
				url : controller + 'readexcel',
				type: 'POST',
				async: false,
				data:data,
				enctype: 'multipart/form-data',
				processData: false,  
				contentType: false,   
				success:function(datas){
					$(".loading").hide();
					var obj = $.evalJSON(datas); 
					var row = obj.row;
					if(obj.status == 0){
						error("Import tối đa 500 dòng"); return false;	
					}
					else{
						success("Import thành công "+row + ' dòng.');
						$('#clickclose').click();
					}
				},
				error : function(){
					$(".loading").hide();
					error("Import không thành công"); return false;	
				}
			});
        });
	});
	function loadForm(id){
		$.ajax({
			url : controller + 'form',
			type: 'POST',
			async: false,
			data:{id:id},  
			success:function(datas){
				var obj = $.evalJSON(datas); 
				$('#loadContentFrom').html(obj.content);
				$('#modalTitleFrom').html(obj.title);
				$('#id').html(obj.id);
			}
		});
	}
	function init(){
		$('#branchid').multipleSelect({
			filter: true,
			placeholder:'<?=getLanguage('chon-chi-nhanh');?>',
			single: true
		});
	}
	function funcList(obj){
		$(".edit").each(function(e){
			$(this).click(function(){ 
				var catalog_service_name = $(".catalog_service_name").eq(e).text().trim();
				var description = $(".description").eq(e).text().trim();
				var id = $(this).attr('id');
				$("#id").val(id);	
				$("#catalog_service_name").val(catalog_service_name);	
				$("#description").val(description);	
			});
		});	
		$('.edititem').each(function(e){
			$(this).click(function(){
				var id = $(this).attr('id');
				loadForm(id);
			});
		});
		$('.deleteitem').each(function(e){
			$(this).click(function(){
				var id = $(this).attr('id');
				confirmDelete(id);
				return false
			});
		});
	}
	function refresh(){
		$(".loading").show();
		$(".searchs").val("");
		//$('#activate,#processid,#groupid').multipleSelect('uncheckAll');
		csrfHash = $('#token').val();
		search = getSearch();
		getList(cpage,csrfHash);	
	}
	function searchList(){
		$(".loading").show();
		search = getSearch();
		csrfHash = $('#token').val();
		getList(cpage,csrfHash);	
	}
</script>
