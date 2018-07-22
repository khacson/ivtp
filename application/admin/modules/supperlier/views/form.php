<!-- BEGIN PORTLET-->
<form method="post" enctype="multipart/form-data">
    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption" style="margin-top:4px;">
                <i class="fa fa-reorder"></i>
                <?= empty($idaction)?getLanguage('all', 'Add'):getLanguage('all', 'Edit')?>
            </div>
            <div class="tools">
                <ul class="button-group pull-right" style="margin-top:-3px; margin-bottom:5px;">
					<li id="">
						<a href="<?=admin_url();?><?=$routes;?>">
						<button type="button" class="button">
						   <i class="fa fa-arrow-left" aria-hidden="true"></i>
							<?= getLanguage('all', 'Back') ?>
						</button>
						</a>
					</li> 		
					<?php 
					if(empty($idaction)){
						if (isset($permission['add'])) { ?>
						<li id="save">
							<button type="button" class="button">
								<i class="fa fa-plus"></i>
								<?= getLanguage('all', 'Add') ?>
							</button>
						</li>
					<?php } }
					else{
						if (isset($permission['edit'])) { ?>
						<li id="edit">
							<button type="button" class="button">
								<i class="fa fa-save"></i>
								<?= getLanguage('all', 'Edit') ?>
							</button>
						</li>
					<?php } 
					}?>	
					
				</ul>
            </div>
        </div>
        <div class="portlet-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label col-md-4">Tiêu đề (<span class="red">*</span>)</label>
                        <div class="col-md-8">
                            <input type="text" name="supperlier_name" id="supperlier_name" class="searchs form-control" value="<?=$supperlier_name?>"/>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label col-md-5">Link</label>
                        <div class="col-md-7">
                            <input type="text" name="url" id="url" class="searchs form-control" value="<?=$url?>"/>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label col-md-4">Hình ảnh</label>
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
            </div>

            <div class="row mtop10">
                <div class="col-md-12">
                        <div class="form-group">
                                <label class="control-label col-md-1">Nội dung</label>
                                <div class="col-md-11" style="padding-left:44px !important;">
                                    <textarea class="ckeditor form-control" id="description" name="description"><?=$description?></textarea>
                                </div>
                        </div>
                </div>
            </div>
            
            <div class="row mtop10">
                <div class="col-md-3" style="color:red">
                  
                </div>
                <div class="col-md-9">
                    <div class="mright10" >
                        <input type="hidden" name="id" id="id" value="<?=$idaction?>"/>
                        <input type="hidden" id="token" name="<?= $csrfName; ?>" value="<?= $csrfHash; ?>" />
                        
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
<script>
    var controller = '<?= $controller; ?>/';
    var csrfHash = '<?= $csrfHash; ?>';
    var cpage = 0;
    var search;
    var schoolid = 0;
    $(function() {
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
        
        addform();
        $('#refresh').click(function() {
            $(".loading").show();
            CKEDITOR.instances['description'].setData("");
            refresh();
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
        var token = $('#token').val();
        var description = CKEDITOR.instances['description'].getData();
        if ($("#supperlier_name").val() == '') {
            error("supperlier name <?= getLanguage('all', 'empty') ?>");
            $("#supperlier_name").focus();
            return false;
        }
        /*if (description == "") {
            error("Description <?= getLanguage('all', 'empty') ?>");
            return false;
        }
        if ($("#url").val() == "") {
            error("Url <?= getLanguage('all', 'empty') ?>");
            return false;
        }*/
        $('.loading').show();
        var data = new FormData();
        var objectfile = document.getElementById('imageEnable').files;
        data.append('userfile', objectfile[0]);
        data.append('csrf_stock_name', token);
        data.append('search', search);
        data.append('description', description);
        data.append('id', id);
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
				$('.loading').hide();
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
                    error("supperlier <?= getLanguage('all', 'exits') ?>");
                    return false;
                }              
                else {
                    CKEDITOR.instances['description'].setData("");
                    location.href = '<?=base_url()."dttal.php/supperlier"?>';
                }
            },
            error: function() {

            }
        });
    }    
    function refresh() {
        $('.loading').show();
        $('.searchs').val('');
        $('#show').html('');
       // document.getElementById("checkAll").checked=false;
        csrfHash = $('#token').val();
        //search = getSearch();//alert(cpage);        
    }        
    function getSearch() {
        var str = '';
        $('input.searchs').each(function() {
            str += ',"' + $(this).attr('id') + '":"' + $(this).val().trim() + '"';
        })
        $('select.combos').each(function() {
            str += ',"' + $(this).attr('id') + '":"' + getCombo($(this).attr('id')) + '"';
        })
        if ( CKEDITOR.instances && CKEDITOR.instances['description'] ) {
            var html = CKEDITOR.instances['description'].getData();
            html = html.replace(/<p>/g,'');
            html = html.replace(/<\/p>/g,'');
            str += ',"description":"'+addslashes(html.trim())+'"';
        }
        return '{' + str.substr(1) + '}';
    }
    function validateEmail(email) {
        var emailReg = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
        var valid = emailReg.test(email);

        if (!valid) {
            return false;
        } else {
            return true;
        }
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
	function addform(){		
	    var img = '<?= base_url() ?>files/supperlier/' + '<?=$img?>';

		var id = $("#id").val();//alert(id);
		$('#id').val(id);
		if(id!=''){
			$('#show').html('<img src="' + img + '" style="width:100px; height:50px" />');
		}
	    
	}
</script>
<script src="<?= url_tmpl(); ?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?=url_tmpl();?>ckeditor/ckeditor.js" type="text/javascript"></script>
