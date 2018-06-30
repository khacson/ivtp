<link rel="stylesheet" href="<?=url_tmpl()?>jcrop/jquery.Jcrop.min.css" />
<style title="" type="text/css">
	table col.c1 { width: 45px; }
	table col.c2 { width: 60px; }
	table col.c3 { width: 100px; }
	table col.c4 { width: 180px; }
	table col.c5 { width: 120px; }
	table col.c6 { width: 120px; }
	table col.c7 { width: 220px; }
	table col.c8 { width: 150px; }
	table col.c9 { width: 150px; }
	table col.c10 { width: 300px; }
	table col.c11 { width: 300px; }
	table col.c12 { width: 120px; }
	table col.c13 {  width: 100px; }
	table col.c14 {  width: auto; }
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
					<label class="control-label col-md-4">Điện thoại</label>
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
					<label class="control-label col-md-4">Trình độ</label>
					<div class="col-md-8">
						<input placeholder="Tối đa 50 ký tự" type="text" name="level" id="level" class="searchs form-control" maxlength="50" />
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="control-label col-md-4">Bằng cấp</label>
					<div class="col-md-8">
						<input placeholder="Tối đa 50 ký tự" type="text" name="degree" id="degree" class="searchs form-control" maxlength="50" />
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
						<input placeholder="Tối đa 50 ký tự" type="text" name="experience" id="experience" class="searchs form-control" maxlength="50" />
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="control-label col-md-4">Quan điểm</label>
					<div class="col-md-8">
						<input placeholder="Tối đa 110 ký tự" type="text" name="views" id="views" class="searchs form-control" maxlength="110" />
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
						<div class="pull-left">
							 <span id="show" style="display: inline-block" class="mtop10"></span> 
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="mright10" >
					<input type="hidden" name="id" id="id" />
					<input type="hidden" id="token" name="<?=$csrfName;?>" value="<?=$csrfHash;?>" />
					<input type="hidden" class="searchs" id="x" name="x" />
					<input type="hidden" class="searchs" id="y" name="y" />
					<input type="hidden" class="searchs" id="w" name="w" />
					<input type="hidden" class="searchs" id="h" name="h" />
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
							<?php for($i=1; $i< 15; $i++){?>
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
								<th id="ord_u.level">Trình độ</th>
								<th id="ord_u.degree">Bằng cấp</th>
								<th id="ord_u.experience">Kinh nghiệm</th>
								<th id="ord_u.views">Quan điểm</th>
								<th id="ord_u.firebasedb">Database</th>
								<th id="ord_u.is_full">Full status</th>
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
							<?php for($i=1; $i< 15; $i++){?>
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
    var rate;
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
							$('#show').html('');
                            $('#show').append('<img class="cropimage" src="' + e.target.result + '" style="max-width:100%; float:left; margin-left:5px;" />');
							var src = $('.cropimage').attr("src");
							var img = new Image();//tinh original width
							img.src = src;
							img.onload = function() {
								var curr_with = $('.cropimage').width();//co css
								rate = this.width / curr_with;//ti le thu nho
								//console.log(this.width);console.log(curr_with);
								$('.cropimage').Jcrop({
									aspectRatio: 1,
									setSelect: [0,0,60,60],
									aspectRatio: 100/100,
									allowSelect : false,
									onSelect: updateCoords,
									onRelease: updateCoords
								});
							}
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
			var id = getCheckedId();
			if (id == '') {
				warning('Vui lòng chọn mục để xóa');
				return;
			}
			$.msgBox({
				title: 'Message',
				type: 'error',
				content:'Bạn có chắc muốn xóa người dùng này?',
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
									error('Xóa thành công'); return false;		
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
		$('.change_status').live('click', function(e){
			var id = $(this).parents('tr').attr('id');
			var status = $(this).attr('is_full');
			if (status == 0) {
				var newStatus = 1;
			}
			else {
				var newStatus = 0;
			}
			var token = $('#token').val();
			$('.loading').show();
			$.ajax({
				url : controller + 'changeStatus',
				type: 'POST',
				async: false,
				data: {csrf_stock_name:token,id:id, status: newStatus},
				success:function(datas){
					$('.loading').hide();
					var obj = $.evalJSON(datas); 
					$('#token').val(obj.csrfHash);
					if(obj.status == 0){
						error('Có lỗi xảy ra, chuyển trạng thái thất bại'); return false;		
					}
					else{
						$('.loading').show();
						$('.searchs').val('');
						$('#show').html('');
						$('#schoolid,#groupid').multipleSelect('uncheckAll');
						csrfHash = $('#token').val();
						search = getSearch();//alert(cpage);
						getList(cpage,csrfHash);	
					}
					
				},
				error : function(){
					$('.loading').hide();
					error('Có lỗi xảy ra, chuyển trạng thái thất bại'); return false;
				}
			});
		});
	});
	
	function updateCoords(c){
		//console.log(rate);
		$('#x').val(c.x * rate);
		$('#y').val(c.y * rate);
		$('#w').val(c.w * rate);
		$('#h').val(c.h * rate);
	};
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
		if(obj.groupid == 2 || obj.groupid == 3){
			if(obj.firebasedb == ''){
				error("Database <?=getLanguage('user','empty')?>"); 
				$("#firebasedb").focus();
				return false;		
			}
		}
		if (id == '') {
			if($("#imageEnable").val() == ""){
				error("Vui lòng upload hình đại diện"); 
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
					refresh();
				}
			},
			error : function(){
				
			}
		});
	}
    function funcList(obj){
		$('.edit').each(function(e){
			var _this = $(this);
			$(this).click(function(el){
				if ($(el.target).hasClass('change_status')) {
					return;
				}
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
					var avatar = '<?=base_url()?>files/user/'+$(this).attr('avatar') + '?t=' + new Date().getTime();
					$('#show').html('<img src="' + avatar + '" style="height:60px; border-radius: 50% !important" />');
				}
				else {
					$('#show').html('');
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
<script src="<?= url_tmpl(); ?>jcrop/jquery.Jcrop.min.js" type="text/javascript"></script>