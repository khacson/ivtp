<style title="" type="text/css">
	table col.c1 { width: 45px; }
	table col.c2 { width: 60px; }
	table col.c3 { width: 180px; }
	table col.c4 { width: 180px; }
	table col.c5 { width: 150px; }
	table col.c6 { width: 150px; }
	table col.c7 { width: 250px; }
	table col.c8 {  width: auto; }
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
					<label class="control-label col-md-4">Tài khoản (<span class="red">*</span>)</label>
					<div class="col-md-8">
						<input type="text" name="username" id="username" class="searchs form-control" />
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="control-label col-md-4">Mật khẩu (<span class="red">*</span>)</label>
					<div class="col-md-8">
						<input type="password" name="password" id="password" class="searchs form-control" />
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="control-label col-md-5">Họ tên (<span class="red">*</span>)</label>
					<div class="col-md-7">
						<input type="text" name="fullname" id="fullname" class="searchs form-control" />
					</div>
				</div>
			</div>
		</div>
		<div class="row mtop10">
			<div class="col-md-4">
				<div class="form-group">
					<label class="control-label col-md-4">Email</label>
					<div class="col-md-8">
						<input type="text" name="email" id="email" class="searchs form-control" />
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="control-label col-md-4">Điện thoái</label>
					<div class="col-md-8">
						<input type="text" name="mobile" id="mobile" class="searchs form-control" />
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="control-label col-md-5">Nhóm quyền (<span class="red">*</span>)</label>
					<div class="col-md-7" >
						<select name="groupid" id="groupid" class="combos" >
							<option value=""></option>
							<?php foreach ($groups as $item) { ?>
								<option value="<?=$item->id;?>"><?=$item->groupname?></option>
							<?php } ?>
						</select>
					</div>
				</div>
			</div>
		</div>	
		<div class="row mtop10">
			<div class="col-md-4">
				<div class="form-group">
					<label class="control-label col-md-4">Hình đại diện</label>
					<div class="col-md-8">
						<div class="col-md-6" style="padding:0px !important;" >
							<ul style="margin:0px;" class="button-group">
								<li class="" onclick ="javascript:document.getElementById('imageEnable').click();"><button type="button" class="btnone">Chọn hình</button></li>
							</ul>
							<input style='display:none;' accept="image/*" id ="imageEnable" type="file" name="userfile">
						</div>
						<div class="col-md-6" >
							 <span id="show"></span> 
						</div>
					</div>
				</div>
			</div>
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
            <i>Có <span class='viewtotal'>0</span> tài khoản</i>
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
						<?php if(isset($permission['add'])){?>
						<li id="save">
							<button type="button" class="button">
								<i class="fa fa-plus"></i>
								<?=getLanguage('all','Add')?>
							</button>
						</li>
						<?php }?>
						<?php if(isset($permission['edit'])){?>
						<li id="edit">
							<button type="button" class="button">
								<i class="fa fa-save"></i>
								<?=getLanguage('all','Edit')?>
							</button>
						</li>
						<?php }?>
						<?php if(isset($permission['delete'])){?>
						<li id="delete">
							<button type="button" class="button">
								<i class="fa fa-times"></i>
								<?=getLanguage('all','Delete')?>
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
							<?php for($i=1; $i< 9; $i++){?>
								<col class="c<?=$i;?>">
							<?php }?>
							<tr>
								<th width="40px" class="text-center"><input type="checkbox" name="checkAll" id="checkAll" /></th>
								<th>STT</th>
								<th id="ord_u.username">Tài khoản</th>
								<th id="ord_u.fullname">Họ tên</th>
								<th id="ord_g.groupname">Nhóm quyền</th>
								<th id="ord_u.mobile">Điện thoại</th>
								<th id="ord_u.email">Email</th>
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
							<?php for($i=1; $i< 9; $i++){?>
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
<script>
	var controller = '<?=$controller;?>/';
	var csrfHash = '<?=$csrfHash;?>';
	var cpage = 0;
	var search;
	var schoolid = 0;
	$(function(){
		$('#imageEnable').change(function(evt) {
            var files = evt.target.files;
            for (var i = 0, f; f = files[i]; i++){
                var size = f.size;
                //if (size < 2048000){
                    if (!f.type.match('image.*'))
                    {
                        continue;
                    }
                    var reader = new FileReader();
                    reader.onload = (function(theFile) {
                        return function(e) {
                            $('#show').html('<img src="' + e.target.result + '" style="height:40px; border-radius: 50% !important;" />');
                            $("#img1").val(e.target.result);
                        };
                    })(f);
                    reader.readAsDataURL(f);
                /*}
                else{
                    $('#fileupload').val(');
                    $('.showImages').attr('src', ');
                    alert("File size can't over 2Mb.");
                }*/
            }
        });
		$('#groupid').multipleSelect({
        	filter: true,
			placeholder:"Chọn nhóm quyền",
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
		$('.edit').each(function(e){ 
			$(this).click(function(){ 
				var username = $('.uusername').eq(e).html().trim();
				var groupid = $(this).attr('groupid');
				var fullname = $('.ufullname').eq(e).html().trim();
				var email = $('.uemail').eq(e).html().trim();
				var mobile = $('.umobile').eq(e).html().trim();
				var avatar = '<?=base_url()?>files/user/'+$(this).attr('avatar'); 
				
				var id = $(this).attr('id');
				$('#id').val(id);	
				$('#username').val(username);	
				$('#fullname').val(fullname);	
				$('#email').val(email);
				$('#mobile').val(mobile);
				 
				$('#groupid').multipleSelect('setSelects', groupid.split(','));
				$('#show').html('<img src="' + avatar + '" style="height:40px; border-radius: 50% !important" />');
			});	
		});	
	}
	function refresh(){
		$('.loading').show();
		$('.searchs').val('');
		$('#show').html('');
		$('#schoolid,#groupid').multipleSelect('uncheckAll');
		if(schoolid != 0 && schoolid != ''){
			$('#activate').multipleSelect('setSelects', schoolid.split(',')); 
		}
		csrfHash = $('#token').val();
		search = getSearch();//alert(cpage);
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
