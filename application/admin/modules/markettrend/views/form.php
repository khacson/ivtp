<link rel="stylesheet" href="<?=url_tmpl()?>jcrop/jquery.Jcrop.min.css" />
<form method="post" enctype="multipart/form-data">
    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption"  style="margin-top:4px;">
                <i class="fa fa-reorder"></i>
				<?php
				if(empty($finds->id)){
					echo getLanguage('all', 'Add');
				}
				else{
					echo getLanguage('all', 'Edit');
				}
				?>
            </div>
            <div class="tools">
				<ul class="button-group pull-right" style="margin-top:-3px; margin-bottom:5px;">   
							<li id="">
							   <a href="<?=admin_url();?>markettrend">
                                <button type="button" class="button">
                                    <i class="fa fa-step-backward"></i>
                                    <?= getLanguage('all', 'Back') ?>
                                </button>
								</a>
                            </li>
                            <li id="refresh">
                                <button type="button" class="button">
                                    <i class="fa fa-refresh"></i>
                                    <?= getLanguage('all', 'Refresh') ?>
                                </button>
                            </li>
                            <?php 
							if(empty($finds->id)){
								if (isset($permission['add'])) { ?>
                                <li id="save">
                                    <button type="button" class="button">
                                        <i class="fa fa-plus"></i>
                                        Lưu
                                    </button>
                                </li>
							    <li id="saves">
                                    <button type="button" class="button">
                                        <i class="fa fa-plus"></i>
                                        Lưu và đóng
                                    </button>
                                </li>
							<?php } }
							else{
								if (isset($permission['edit'])) { ?>
                                <li id="edit">
                                    <button type="button" class="button">
                                        <i class="fa fa-save"></i>
                                       Sửa
                                    </button>
                                </li>
								<li id="edits">
                                    <button type="button" class="button">
                                        <i class="fa fa-save"></i>
                                       Sửa và đóng
                                    </button>
                                </li>
                            <?php } 
							}?>						
                            
                        </ul>
            </div>
        </div>
        <div class="portlet-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label col-md-1">Tiêu đề (<span class="red">*</span>)</label>
                        <div class="col-md-11">
                            <input style="margin-left:28px; width:97.5%" type="text" name="title" id="title" value="<?=$finds->title;?>" class="searchs form-control" />
                        </div>
                    </div>
                </div>  
            </div>
			<div class="row mtop10"> 
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label col-md-4">Loại danh mục </label>
						<div class="col-md-8" >
							<select name="typeid" id="typeid" class="combos" >
								<option value=""></option>
								<?php foreach ($markettrendTypes as $item) { ?>
									<option value="<?=$item->id;?>"><?=$item->catalog_name?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
            </div>
			
            <div class="row mtop10">
				<div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label col-md-4">Hình ảnh</label>
                        <div class="col-md-8">
                            <div class="col-md-6" style="padding:0px !important;" >
                                <ul style="margin:0px;" class="button-group">
                                    <li class="" onclick ="javascript:document.getElementById('imageEnable').click();"><button type="button" class="btnone">Chọn hình</button></li>
                                </ul>
								<br><a class="removeImage" href="javascript:;">Xóa</a>
                                <input style='display:none;' accept="image/*" id ="imageEnable" type="file" name="userfile">
                            </div>
                            <div class="col-md-6" >
                                <span id="show"></span> 
                            </div>
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
                                    <li class="" onclick ="javascript:document.getElementById('imageEnableThumb').click();"><button type="button" class="btnone">Chọn hình</button></li>
                                </ul>
                                <input style='display:none;' accept="image/*" id ="imageEnableThumb" type="file" name="userfile2">
                            </div>
                        </div>
                    </div>
                </div>
				<div class="col-md-5" style="display: block; margin-left: -147px;">
					<span id="show2" ></span> 
				</div>
			</div>
			
            <div class="row mtop10">
                <div class="col-md-12">
                        <div class="form-group">
                                <label class="control-label col-md-1">Nội dung ngắn</label>
                                <div class="col-md-11" style="padding-left:44px !important;">
                                    <textarea rows="5" class="form-control" id="description_sort" name="description_sort"><?=$finds->description_sort;?></textarea>
                                </div>
                        </div>
                </div>
            </div>
            <div class="row mtop10">
                <div class="col-md-12">
                        <div class="form-group">
                                <label class="control-label col-md-1">Nội dung chi tiết</label>
                                <div class="col-md-11" style="padding-left:44px !important;">
                                    <textarea class="ckeditor form-control" id="description_long" name="description_long"><?=$finds->description_long;?></textarea>
                                </div>
                        </div>
                </div>
            </div>
            <div class="row mtop10">
                <div class="col-md-12">
                    <div class="mright10" >
                        <input type="hidden" name="id" id="id" value="<?=$finds->id;?>"/>
                        <input type="hidden" id="token" name="<?= $csrfName; ?>" value="<?= $csrfHash; ?>" />
						<input type="hidden" class="searchs" id="x" name="x" />
						<input type="hidden" class="searchs" id="y" name="y" />
						<input type="hidden" class="searchs" id="w" name="w" />
						<input type="hidden" class="searchs" id="h" name="h" />
                        
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
            <div class="row mtop10">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label col-md-1">Meta title</label>
                        <div class="col-md-11">
                            <input style="margin-left:28px; width:97.5%" type="text" name="meta_title" id="meta_title" value="<?=$finds->meta_title;?>" class="searchs form-control" />
                        </div>
                    </div>
                </div>  
            </div>
			<div class="row mtop10">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label col-md-1">Meta keyword</label>
                        <div class="col-md-11">
                            <input style="margin-left:28px; width:97.5%" type="text" name="meta_keyword" id="meta_keyword" value="<?=$finds->meta_keyword;?>" class="searchs form-control" />
                        </div>
                    </div>
                </div>  
            </div>
			<div class="row mtop10">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label col-md-1">Meta description</label>
                        <div class="col-md-11">
                            <input style="margin-left:28px; width:97.5%" type="text" name="mete_description" id="mete_description" value="<?=$finds->mete_description;?>" class="searchs form-control" />
                        </div>
                    </div>
                </div>  
            </div>
		</div>
	</div>
</form>
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
		$('#description_sort').on('keypress', function(){
			if($(this).val().length > 190) {
				warning('Tối đa 190 ký tự.');
				return false;
			}
		})
		var e = CKEDITOR.replace('description_long', {toolbarCanCollapse: true});  
		e.on( 'key', function(e) {
			if(e.data.keyCode == '113'){
				$('#edit').trigger('click');
			}
		});
		$('body').on( 'keyup', function(e) {
			if(e.keyCode == '113'){
				$('#edit').trigger('click');
			}
		});
		
		$('#imageEnableThumb').change(function(evt) {
            var files = evt.target.files;
            for (var i = 0, f; f = files[i]; i++) {
                var size = f.size;
                //if (size < 2048000){
                if (!f.type.match('image.*'))
                {
                    continue;
                }
                var reader = new FileReader();
                reader.onload = (function(theFile) {
                    return function(e) { //size e = e.tatal
						$('#show2').html('');
						$('#show2').append('<img class="cropimage" src="' + e.target.result + '" style="max-width:100%; float:left;" />');
						var src = $('.cropimage').attr("src");
						var img = new Image();//tinh original width
						img.src = src;
						img.onload = function() {
							var curr_with = $('.cropimage').width();//co css
							rate = this.width / curr_with;//ti le thu nho
							//console.log(this.width);console.log(curr_with);
							$('.cropimage').Jcrop({
								aspectRatio: 1,
								setSelect: [0,0,400,230],
								aspectRatio: 400/230,
								allowSelect : false,
								onSelect: updateCoords,
								onRelease: updateCoords
							});
						}
                    };
                })(f);
                reader.readAsDataURL(f);
            }
        });
        $('#imageEnable').change(function(evt) {
            var files = evt.target.files;
            for (var i = 0, f; f = files[i]; i++) {
                var size = f.size;
                //if (size < 2048000){
                if (!f.type.match('image.*'))
                {
                    continue;
                }
                var reader = new FileReader();
                reader.onload = (function(theFile) {
                    return function(e) { //size e = e.tatal
                        $('#show').html('<img src="' + e.target.result + '" style="width:60px;" />');
                        //$("#img1").val(e.target.result);
                    };
                })(f);
                reader.readAsDataURL(f);
            }
			
        });        
		$('#typeid').multipleSelect({
        	filter: true,
			placeholder:"Chọn loại",
            single: true
        });
        refresh();addform();
		//CKEDITOR.instances['description'].setData("111");
        $('#refresh').click(function() {
            $(".loading").show();
            CKEDITOR.instances['description'].setData("");
            refresh();
        });       
        $('#save').click(function() {
            save('save', '','');
        });
		$('#saves').click(function() {
            save('save', '','1');
        });
        $('#edit').click(function() {
            var id = $('#id').val();
            if (id == '') {
                error('Please select a item.');
                return false;
            }
            save('edit', id,'');
        });
		 $('#edits').click(function() {
             var id = $('#id').val();
            if (id == '') {
                error('Please select a item.');
                return false;
            }
            save('edit', id,'1');
        });
		$('.removeImage').click(function() {
			$('#imageEnable').val('');
			$('#show').html('');
            var id = $('#id').val();
            if (id == '') {
                return false;
            }
            removeImage(id);
        });
		$('.loading').hide();        
	});
    function save(func, id, type) {
        search = getSearch();
        var token = $('#token').val();
        //var description_sort = CKEDITOR.instances['description_sort'].getData();
		var description_sort = $('#description_sort').val();
		description_sort = description_sort.substr(0, 190);
		var description_long = CKEDITOR.instances['description_long'].getData();
        if ($("#title").val() == '') {
            error("Tiêu đề <?= getLanguage('all', 'empty') ?>");
            $("#title").focus();
            return false;
        }
    
		$('.loading').show();
        var data = new FormData();
        var objectfile = document.getElementById('imageEnable').files;
		var objectfile2 = document.getElementById('imageEnableThumb').files;
        data.append('userfile', objectfile[0]);
		data.append('userfile2', objectfile2[0]);
        data.append('csrf_stock_name', token);
        data.append('search', search);
        data.append('description_sort', description_sort); 
        data.append('description_long', description_long);
		data.append('id', id);
        $.ajax({
            url: controller + func,
            type: 'POST',
            data: data,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            success: function(datas) {
				$('.loading').hide();
                var obj = $.evalJSON(datas);
                $("#token").val(obj.csrfHash);
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
                    error("markettrend <?= getLanguage('all', 'exits') ?>");
                    return false;
                }
                else {
                   var id = '<?=$finds->id;?>';	
				   if(id == ''){
					   success('Thêm mới thành công');
				   }
				   else{
					   success('Sửa thành công');
				   }
                }
				if(type != ''){
					window.location = "<?=admin_url();?>markettrend";
				}
            },
            error: function() {
				$('.loading').hide();
            }
        });
    }
    function refresh() {
        $('.loading').show();
        $('.searchs').val('');       
       // document.getElementById("checkAll").checked=false;
        csrfHash = $('#token').val();
        search = getSearch();//alert(cpage);      
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
    function addslashes(string) {
        return string.replace(/\\/g, '\\\\').
            replace(/\u0008/g, '\\b').
            replace(/\t/g, '\\t').
            replace(/\n/g, '\\n').
            replace(/\f/g, '\\f').
            replace(/\r/g, '\\r').
            replace(/'/g, '\\\'').
            replace(/"/g, '\\"');
    }
	function removeImage(id) {
		$('.loading').show();
		$.ajax({
            url: controller + 'removeImage',
            type: 'POST',
            data: {id: id},
            success: function(datas) {
				$('.loading').hide();
				$('#show').html('');
            },
            error: function() {
				$('.loading').hide();
            }
        });
		
	}
	function addform(){
	    $("#title").val("<?=$finds->title;?>");
	    var img = '<?=$finds->image;?>';
		var imgUrl = '<?= base_url() ?>files/markettrend/' + '<?=$finds->image;?>';
		var thumb = '<?=$finds->thumb;?>';
		var thumbUrl  = '<?= base_url() ?>files/markettrend/thumb/' + '<?=$finds->thumb;?>';
		var id = '<?=$finds->id;?>';		
		//$('#id').val(id);
		$('#title').val('<?=$finds->title;?>');//console.log(CKEDITOR.instances);
		$('#meta_title').val('<?=$finds->meta_title;?>');
		$('#meta_keyword').val('<?=$finds->meta_keyword;?>');
		$('#mete_description').val('<?=$finds->mete_description;?>');
		var typeid = '<?=$finds->typeid;?>';
		$('#typeid').multipleSelect('setSelects', typeid.split(','));
		if(id!=''){
			if(img) {
				$('#show').html('<img src="' + imgUrl + '" style="width:100px;" />');
			}
			if(thumb) {
				$('#show2').html('<img src="' + thumbUrl + '" style="width:100px;" />');
			}
		}
		
	}
	function updateCoords(c){
		//console.log(rate);
		$('#x').val(c.x * rate);
		$('#y').val(c.y * rate);
		$('#w').val(c.w * rate);
		$('#h').val(c.h * rate);
	};
</script>
<script src="<?= url_tmpl(); ?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?=url_tmpl();?>ckeditor/ckeditor.js" type="text/javascript"></script>
<script src="<?= url_tmpl(); ?>jcrop/jquery.Jcrop.min.js" type="text/javascript"></script>
