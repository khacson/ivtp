<style title="" type="text/css">
	.button-group li:last-child .button {
		border-radius: 0 !important;
		margin-right: 10px;
	}
</style>
<!-- BEGIN PORTLET-->
<form method="post" enctype="multipart/form-data">
<div class="portlet box blue">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-reorder"></i>
			<?=getLanguage('all','Thông tin cá nhân')?>
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
						<input disabled type="text" name="username" id="username" class="searchs form-control" value="<?=$userInfo->username?>" />
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
						<input type="text" name="fullname" id="fullname" class="searchs form-control" value="<?=$userInfo->fullname?>" />
					</div>
				</div>
			</div>
		</div>
		<div class="row mtop10">
			<div class="col-md-4">
				<div class="form-group">
					<label class="control-label col-md-4">Email</label>
					<div class="col-md-8">
						<input type="text" name="email" id="email" class="searchs form-control" value="<?=$userInfo->email?>" />
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="control-label col-md-4">Điện thoại</label>
					<div class="col-md-8">
						<input type="text" name="mobile" id="mobile" class="searchs form-control" value="<?=$userInfo->mobile?>" />
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
					<label class="control-label col-md-4">Trình độ</label>
					<div class="col-md-8">
						<input placeholder="Tối đa 50 ký tự" type="text" name="level" id="level" class="searchs form-control" maxlength="50" value="<?=$userInfo->level?>" />
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="control-label col-md-4">Bằng cấp</label>
					<div class="col-md-8">
						<input placeholder="Tối đa 50 ký tự" type="text" name="degree" id="degree" class="searchs form-control" maxlength="50" value="<?=$userInfo->degree?>" />
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="control-label col-md-5">Database (<span class="red">*</span>)</label>
					<div class="col-md-7" >
						<select name="firebasedb" id="firebasedb" class="combos" >
							<option value=""></option>
							<?php foreach ($firebasedb as $item) { ?>
								<option value="<?=$item->id;?>"><?=$item->name?></option>
							<?php } ?>
						</select>
					</div>
				</div>
			</div>
		</div>
		<div class="row mtop10">
			<div class="col-md-4">
				<div class="form-group">
					<label class="control-label col-md-4">Kinh nghiệm</label>
					<div class="col-md-8">
						<input placeholder="Tối đa 50 ký tự" type="text" name="experience" id="experience" class="searchs form-control" maxlength="50" value="<?=$userInfo->experience?>" />
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="control-label col-md-4">Quan điểm</label>
					<div class="col-md-8">
						<input placeholder="Tối đa 110 ký tự" type="text" name="views" id="views" class="searchs form-control" maxlength="110" value="<?=$userInfo->views?>" />
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
					<input type="hidden" name="id" id="id" value="<?=$userInfo->id?>" />
					<input type="hidden" id="token" name="<?=$csrfName;?>" value="<?=$csrfHash;?>" />
					
				</div>		
			</div>
		</div>
		<div class="row mtop10">
			<div class="tools">
			   <ul class="button-group pull-right" style="margin-top:-3px; margin-bottom:5px; margin-right:5px;">
					<li id="edit">
						<button type="button" class="button">
							<i class="fa fa-save"></i>
							<?=getLanguage('all','Edit')?>
						</button>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
</form>
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
		$('#firebasedb').multipleSelect({
        	filter: true,
			placeholder:"Chọn database",
            single: true
        });
		
		var groupid = '<?=$userInfo->groupid?>';
		var firebasedb = '<?=$userInfo->firebasedb?>';
		$('#groupid').multipleSelect('setSelects', groupid.split(','));
		$('#firebasedb').multipleSelect('setSelects', firebasedb.split(','));
		
		var avatar = '<?=$userInfo->signature?>';
		if (avatar != '') {
			var avatar = '<?=base_url()?>files/user/'+avatar;
			$('#show').html('<img src="' + avatar + '" style="height:40px; border-radius: 50% !important" />');
		}
		
		
		//refresh();
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
			$("#groupid").focus();
			return false;		
		}		
		if(obj.groupid == 2){
			if(obj.firebasedb == ''){
				error("Database <?=getLanguage('user','empty')?>"); 
				$("#firebasedb").focus();
				return false;		
			}
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
					window.location = '';
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
				var firebasedb = $(this).attr('firebasedb');
				var fullname = $('.ufullname').eq(e).html().trim();
				var email = $('.uemail').eq(e).html().trim();
				var mobile = $('.umobile').eq(e).html().trim();
				var level = $('.ulevel').eq(e).html().trim();
				var degree = $('.udegree').eq(e).html().trim();
				var experience = $('.uexperience').eq(e).html().trim();
				var views = $('.uviews').eq(e).html().trim(); 
				
				var id = $(this).attr('id');
				$('#id').val(id);	
				$('#username').val(username);	
				$('#fullname').val(fullname);	
				$('#email').val(email);
				$('#mobile').val(mobile);
				$('#level').val(level);
				$('#degree').val(degree);
				$('#experience').val(experience);
				$('#views').val(views);
				 
				$('#firebasedb').multipleSelect('setSelects', firebasedb.split(','));
				$('#groupid').multipleSelect('setSelects', groupid.split(','));
				
				if ($(this).attr('avatar') != '') {
					var avatar = '<?=base_url()?>files/user/'+$(this).attr('avatar');
					$('#show').html('<img src="' + avatar + '" style="height:40px; border-radius: 50% !important" />');
				}
			});	
		});	
	}
	function refresh(){
		$('.loading').show();
		$('.searchs').val('');
		$('#show').html('');
		$('#schoolid,#groupid,#firebasedb').multipleSelect('uncheckAll');
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
