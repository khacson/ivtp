<style title="" type="text/css">
    table col.c1 { width: 45px; }
    table col.c2 { width: 60px; }
    table col.c3 { width: 130px; }
    table col.c4 { width: 160px; }
    table col.c5 { width: 220px; }
    table col.c6 { width: 240px; }
    table col.c7 { width: 190px; }
    table col.c8 { width: 130px; }
    table col.c9 { width: 250px; }
    table col.c10 { width: 150px; }
    table col.c11 { width: 100px; }
    table col.c12 { width: 100px; }
    table col.c13 {  width: auto; }
</style>
<!-- BEGIN PORTLET-->
<form method="post" enctype="multipart/form-data">
	<div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption" style="margin-top:4px;">
                <i class="fa fa-reorder"></i>
                Thông tin chung
            </div>
            <div class="tools">
               <ul class="button-group pull-right" style="margin-top:-3px; margin-bottom:5px;">
					<?php if (isset($permission['edit'])) { ?>
						<li id="edit">
							<button type="button" class="button btnone">
								<i class="fa fa-save"></i>
								<?= getLanguage('all', 'Edit') ?>
							</button>
						</li>
					<?php } ?>
				   
				</ul>
            </div>
        </div>
        <div class="portlet-body">
			<div class="row">
            <div class="row mtop10">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label col-md-4">Facebook</label>
                        <div class="col-md-8">
                            <input type="text" name="url_facebook" id="url_facebook" class="searchs form-control" value="<?=isset($url_facebook)?$url_facebook:""?>"/>
                        </div>
                    </div>
                </div>
				<div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label col-md-4">Google</label>
                        <div class="col-md-8">
                            <input type="text" name="url_google" id="url_google" class="searchs form-control" value="<?=isset($url_google)?$url_google:""?>"/>
                        </div>
                    </div>
                </div>
				<div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label col-md-4">Twitter</label>
                        <div class="col-md-8">
                            <input type="text" name="url_twitter" id="url_twitter" class="searchs form-control" value="<?=isset($url_twitter)?$url_twitter:""?>"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mtop10">
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label col-md-4">Skype</label>
                        <div class="col-md-8">
                            <input type="text" name="skype" id="skype" class="searchs form-control" value="<?=isset($skype)?$skype:""?>"/>
                        </div>
                    </div>
                </div>
				<div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label col-md-4">Google Map</label>
                        <div class="col-md-8">
                            <input type="text" name="google_address" id="google_address" class="searchs form-control" value="<?=isset($google_address)?$google_address:""?>"/>
                        </div>
                    </div>
                </div> 
				<div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label col-md-4">youtube</label>
                        <div class="col-md-8">
                            <input type="text" name="url_youtube" id="url_youtube" class="searchs form-control" value="<?=isset($url_youtube)?$url_youtube:""?>"/>
                        </div>
                    </div>
                </div>
			</div>
            <div class="row mtop10">
				<div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label col-md-4">Sologan</label>
                        <div class="col-md-8">
                            <input type="text" name="slogan" id="slogan" class="searchs form-control" value="<?=isset($slogan)?$slogan:""?>"/>
                        </div>
                    </div>
                </div>
				<!--<div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label col-md-4">Sologan 2</label>
                        <div class="col-md-8">
                            <input type="text" name="slogan2" id="slogan2" class="searchs form-control" value="<?=isset($slogan2)?$slogan2:""?>"/>
                        </div>
                    </div>
                </div>-->
				
                
            </div>
        </div>
    </div>
    
	<!--<div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-reorder"></i>
                Tiếng anh
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
                        <label class="control-label col-md-4">Công ty (<span class="red">*</span>)</label>
                        <div class="col-md-8">
                            <input type="text" name="company_name_2" id="company_name_2" class="searchs form-control" value="<?=isset($company_name_2)?$company_name_2:""?>" />
                        </div>
                    </div>
                </div>
				<div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label col-md-4">Điện thoại (<span class="red">*</span>)</label>
                        <div class="col-md-8">
                            <input type="text" name="phone_2" id="phone_2" class="searchs form-control" value="<?=isset($phone_2)?$phone_2:""?>" />
                        </div>
                    </div>
                </div>
				<div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label col-md-4">Email (<span class="red">*</span>)</label>
                        <div class="col-md-8">
                            <input type="text" name="email_2" id="email_2" class="searchs form-control" value="<?=isset($email_2)?$email_2:""?>"/>
                        </div>
                    </div>
                </div>
                
			</div>
            <div class="row mtop10">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label col-md-4">Địa chỉ</label>
                        <div class="col-md-8">
                            <input type="text" name="address_2" id="address_2" class="searchs form-control" value="<?=isset($address_2)?$address_2:""?>"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-reorder"></i>
                Tiếng trung
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
                        <label class="control-label col-md-4">Công ty (<span class="red">*</span>)</label>
                        <div class="col-md-8">
                            <input type="text" name="company_name_3" id="company_name_3" class="searchs form-control" value="<?=isset($company_name_3)?$company_name_3:""?>" />
                        </div>
                    </div>
                </div>
				<div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label col-md-4">Điện thoại (<span class="red">*</span>)</label>
                        <div class="col-md-8">
                            <input type="text" name="phone_3" id="phone_3" class="searchs form-control" value="<?=isset($phone_3)?$phone_3:""?>" />
                        </div>
                    </div>
                </div>
				<div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label col-md-4">Email (<span class="red">*</span>)</label>
                        <div class="col-md-8">
                            <input type="text" name="email_3" id="email_3" class="searchs form-control" value="<?=isset($email_3)?$email_3:""?>"/>
                        </div>
                    </div>
                </div>
                
			</div>
            <div class="row mtop10">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label col-md-4">Địa chỉ</label>
                        <div class="col-md-8">
                            <input type="text" name="address_3" id="address_3" class="searchs form-control" value="<?=isset($address_3)?$address_3:""?>"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>-->
	<div class="col-md-12">
		<div class="mright10" >
			<input type="hidden" name="id" id="id" value="<?=isset($id)?$id:""?>"/>
			<input type="hidden" id="token" name="<?= $csrfName; ?>" value="<?= $csrfHash; ?>" />
			
		</div>		
	</div>
</div>
<div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-reorder"></i>
                Công ty
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse">
                </a>
            </div>
        </div>
        <div class="portlet-body">
			<div class="row">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label col-md-4">Công ty (<span class="red">*</span>)</label>
							<div class="col-md-8">
								<input type="text" name="company_name" id="company_name" class="searchs form-control" value="<?=isset($company_name)?$company_name:""?>" />
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label col-md-4">Điện thoại</label>
							<div class="col-md-8">
								<input type="text" name="phone" id="phone" class="searchs form-control" value="<?=isset($phone)?$phone:""?>" />
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label col-md-4">Fax</label>
							<div class="col-md-8">
								<input type="text" name="fax" id="fax" class="searchs form-control" value="<?=isset($fax)?$fax:""?>" />
							</div>
						</div>
					</div>
				</div>
				<div class="row mtop10">
					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label col-md-4">Địa chỉ</label>
							<div class="col-md-8">
								<input type="text" name="address" id="address" class="searchs form-control" value="<?=isset($address)?$address:""?>"/>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label col-md-4">Email </label>
							<div class="col-md-8">
								<input type="text" name="email" id="email" class="searchs form-control" value="<?=isset($email)?$email:""?>"/>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label col-md-4">Hotline </label>
							<div class="col-md-8">
								<input type="text" name="hotline" id="hotline" class="searchs form-control" value="<?=isset($hotline)?$hotline:""?>"/>
							</div>
						</div>
					</div>
				</div>
				<div class="row mtop10">
					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label col-md-4">Tìm kiếm </label>
							<div class="col-md-8">
								<input type="text" name="searchkey" id="searchkey" class="searchs form-control" value="<?=isset($searchkey)?$searchkey:""?>"/>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label col-md-4">Logo</label>
							<div class="col-md-8">
								<div class="col-md-6" style="padding:0px !important;" >
									<ul style="margin:0px;" class="button-group">
										<li class="" onclick ="javascript:document.getElementById('imageEnable').click();"><button type="button" class="btnone">Chọn hình</button></li>
									</ul>
									<input style='display:none;' accept="image/*" id ="imageEnable" type="file" name="userfile">
								</div>
								<div class="col-md-6" >
									 <span id="show">
										<img style="width:60px; height:40px" src="<?=base_url();?>files/logo/<?=isset($logo)?$logo:""?>"/>
									 </span> 
								</div>
							</div>
						</div>
					</div>
					
				</div>
				<div class="row mtop10">
					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label col-md-4">ĐT tư vấn</label>
							<div class="col-md-8">
								<input type="text" name="phone_contact" id="phone_contact" class="searchs form-control" value="<?=isset($phone_contact)?$phone_contact:""?>"/>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label col-md-4">ĐT góp ý</label>
							<div class="col-md-8">
								<input type="text" name="phone_help" id="phone_help" class="searchs form-control" value="<?=isset($phone_help)?$phone_help:""?>"/>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label col-md-4">Giờ làm việc</label>
							<div class="col-md-8">
								<input type="text" name="work_time" id="work_time" class="searchs form-control" value="<?=isset($work_time)?$work_time:""?>"/>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
	<div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption"  style="margin-top:4px;">
                Thẻ meta
            </div>
            <div class="tools">
			
			</div>
		</div>
		 <div class="portlet-body">
			<div class="row">
				<div class="row mtop10">
					<div class="col-md-12">
						<div class="form-group">
							<label class="control-label col-md-1">Meta title</label>
							<div class="col-md-11">
								<input style="margin-left:28px; width:97.5%" type="text" name="meta_title" id="meta_title" value="<?=$meta_title;?>" class="searchs form-control" />
							</div>
						</div>
					</div>  
				</div>
				<div class="row mtop10">
					<div class="col-md-12">
						<div class="form-group">
							<label class="control-label col-md-1">Meta keyword</label>
							<div class="col-md-11">
								<input style="margin-left:28px; width:97.5%" type="text" name="meta_keyword" id="meta_keyword" value="<?=$meta_keyword;?>" class="searchs form-control" />
							</div>
						</div>
					</div>  
				</div>
				<div class="row mtop10">
					<div class="col-md-12">
						<div class="form-group">
							<label class="control-label col-md-1">Meta description</label>
							<div class="col-md-11">
								<input style="margin-left:28px; width:97.5%" type="text" name="mete_description" id="mete_description" value="<?=$mete_description;?>" class="searchs form-control" />
							</div>
						</div>
					</div>  
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
        <img src="<?= url_tmpl() ?>img/ajax_loader.gif" style="z-index: 2;position: absolute;"/>
    </div>
</div> 
<style>
	.control-label {
		margin-top: 2px;
		white-space: nowrap;
	}
</style>
<script>
    var controller = '<?= $controller; ?>/';
    var csrfHash = '<?= $csrfHash; ?>';
    var cpage = 0;
    var search;
    var schoolid = 0;
    $(function() {
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
                        return function(e) { //size e = e.tatal
                            $('#show').html('<img src="' + e.target.result + '" style="width:60px; height:40px" />');
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
        //refresh();
        $('#refresh').click(function() {
            $(".loading").show();
            refresh();
        });
        $('#search').click(function() {
            $('.loading').show();
            searchList();
        });
        $('#save').click(function() {
            save('save', '');
        });
        $('#edit').click(function() {
            var id = $('#id').val();
            if (id == '') {
                error('Please select a item.');
                return false;
            }
            save('edit', id);
        });
    });
    function save(func, id) {
        search = getSearch();
        var obj = $.evalJSON(search);
		//console.log(obj); return false;
        var token = $('#token').val();

        if (obj.phone == '') {
            error("Phone <?= getLanguage('all', 'empty') ?>");
            return false;
        }
        if (obj.email == '') {
            error("Email <?= getLanguage('all', 'empty') ?>");
            return false;
        }
        
        var data = new FormData();
		var objectfile = document.getElementById('imageEnable').files;
        data.append('csrf_stock_name', token);
		data.append('userfile', objectfile[0]);
        data.append('search', search);
        data.append('id', id);
		$(".loading").show();
        $.ajax({
            url: controller + func,
            type: 'POST',
            async: false,
            data: data,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            success: function(datas) {
                var obj = $.evalJSON(datas);
                $("#token").val(obj.csrfHash);
				$(".loading").hide();
                if (obj.status == 0) {
                    if (id != '') {
                        error('<?= getLanguage('all', 'edit-fail') ?>');
                        return false;
                    }
                    else {
                        error('<?= getLanguage('all', 'add-fail') ?>');
                        return false;
                    }
                }
                else if (obj.status == -1) {
                    error("Phone <?= getLanguage('all', 'exits') ?>");
                    return false;
                }
                else {
					success("Sửa thành công"); 
                }
            },
            error: function() {
				$(".loading").hide();
            }
        });
    }
    function funcList(obj) {
        $('.edit').each(function(e) {
            $(this).click(function() {
                var phone = $('.phone').eq(e).html().trim();
                var email = $('.email').eq(e).html().trim();
                var url_facebook = $('.url_facebook').eq(e).html().trim();
                var url_google = $('.url_google').eq(e).html().trim();
                var url_twitter = $('.url_twitter').eq(e).html().trim();
                var skype = $('.skype').eq(e).html().trim();
                var postal = $('.postal').eq(e).html().trim();
				var google_address = $('.google_address').eq(e).html().trim();
                var id = $(this).attr('id');
                $('#id').val(id);
                $('#phone').val(phone);
                $('#email').val(email);
                $('#url_facebook').val(url_facebook);
                $('#url_google').val(url_google);
                $('#url_twitter').val(url_twitter);
                $('#skype').val(skype);
                $('#postal').val(postal);
            });
        });
    }
    function refresh() {
        $('.loading').show();
        $('.searchs').val('');
        $('#show').html('');
        
        csrfHash = $('#token').val();
        search = getSearch();//alert(cpage);
        getList(cpage, csrfHash);
    }
    function getCheckedId() {
        var del_list = '';
        $('#grid-rows input.noClick:checked').each(function() {
            var id = $(this).attr('id');
            del_list += ',' + id;
        });
        del_list = del_list.substr(1);
        return del_list;
    }
    function searchList() {
        search = getSearch();//alert(cpage);exit;
        csrfHash = $('#token').val();
        getList(0, csrfHash);
    }
    /*function getSearch() {
        var str = '';
        $('input.searchs').each(function() {
            str += ',"' + $(this).attr('id') + '":"' + $(this).val().trim() + '"';
        })
        $('select.combos').each(function() {
            str += ',"' + $(this).attr('id') + '":"' + getCombo($(this).attr('id')) + '"';
        })
        return '{' + str.substr(1) + '}';
    }*/
    function validateEmail(email) {
        var emailReg = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
        var valid = emailReg.test(email);

        if (!valid) {
            return false;
        } else {
            return true;
        }
    }
</script>
<script src="<?= url_tmpl(); ?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
