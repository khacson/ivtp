<style title="" type="text/css">
    table col.c1 { width: 45px; }
    table col.c2 { width: 60px; }
    table col.c3 { width: 180px; }
    table col.c4 { width: 180px; }
    table col.c5 { width: 150px; }
    table col.c6 { width: 150px; }
    table col.c7 { width: 150px; }
    table col.c8 {  width: auto; }
</style>
<!-- BEGIN PORTLET-->
<form method="post" enctype="multipart/form-data">
    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption" style="margin-top:4px;">
                <i class="fa fa-reorder"></i>
                Nội dung gửi mail
            </div>
            <div class="tools">
                <ul class="button-group pull-right" style="margin-top:-3px; margin-bottom:5px;">
                            <li id="refresh">
                                <button type="button" class="button">
                                    <i class="fa fa-refresh"></i>
                                    <?= getLanguage('all', 'Refresh') ?>
                                </button>
                            </li>
                            <?php if (isset($permission['add'])) { ?>
                                <li id="save">
                                    <button type="button" class="button">
                                        <i class="fa fa-plus"></i>
                                        Lưu
                                    </button>
                                </li>
                            <?php } ?>

                        </ul>
            </div>
        </div>
        <div class="portlet-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label col-md-12">Tiêu đề đăng ký thành viên(<span class="red">*</span>)</label>
                    </div>
                </div>
            </div>
            <div class="row">
				<div class="col-md-12" style="padding-left:30px !important; padding-right:30px !important;">
                    <div class="form-group">
						<input type="text" name="title_register" id="title_register" class="searchs form-control" value="<?=$finds->title_register;?>" />
					</div>
				</div>
			</div>
            <div class="row mtop10">
                <div class="col-md-12">
					<div class="form-group">
						<label class="control-label col-md-12">Nội dung đăng ký thành viên</label>
					</div>
                </div>
            </div>
			<div class="row " >
                <div class="col-md-12" style="padding-left:30px !important; padding-right:30px !important;">
                    <div class="form-group">
						 <textarea class="ckeditor form-control" id="send_register" name="send_register"><?=$finds->send_register;?></textarea>
					</div>
				</div>
			</div>
			 <div class="row mtop10">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label col-md-12">Tiêu đề quên mật khẩu</label>
                    </div>
                </div>
            </div>
			<div class="row ">
				<div class="col-md-12" style="padding-left:30px !important; padding-right:30px !important;">
                    <div class="form-group">
						<input type="text" name="title_forgot" id="title_forgot" class="searchs form-control" value="<?=$finds->title_forgot;?>" />
					</div>
				</div>
			</div>
			<div class="row mtop10">
                <div class="col-md-12">
					<div class="form-group">
						<label class="control-label col-md-12">Nội dung quên mật khẩu</label>
					</div>
                </div>
            </div>
			<div class="row" >
                <div class="col-md-12" style="padding-left:30px !important; padding-right:30px !important;">
                    <div class="form-group">
						 <textarea class="ckeditor form-control" id="send_forgot" name="send_forgot"><?=$finds->send_forgot;?></textarea>
					</div>
				</div>
			</div>
            <div class="row mtop10">
                <div class="col-md-12">
                    <div class="mright10" >
                        <input type="hidden" name="id" id="id" />
                        <input type="hidden" id="token" name="<?= $csrfName; ?>" value="<?= $csrfHash; ?>" />
                        
                    </div>		
                </div>
            </div>
        </div>
    </div>
</form>
<!-- END PORTLET-->
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
        
        //refresh();
        $('#refresh').click(function() {
            $(".loading").show();
            CKEDITOR.instances['send_register'].setData("");
            CKEDITOR.instances['send_forgot'].setData("");
            refresh();
        });
        $('#search').click(function() {
            $('.loading').show();
            searchList();
        });
        $('#save').click(function() {
            save('save', '');
        });
    });
    function save(func, id) {
        search = getSearch();
        var obj = $.evalJSON(search);
        var token = $('#token').val();

        if (obj.title_register == '') {
            error("Tiêu đề không được truống");
            return false;
        }
		$('.loading').show();
        var title_register = $('#title_register').val();
		var title_forgot = $('#title_forgot').val();
		var meta_keyword = $('#meta_keyword').val();
		var mete_description = $('#mete_description').val();
		var send_register = CKEDITOR.instances['send_register'].getData();
		var send_forgot = CKEDITOR.instances['send_forgot'].getData();
		//console.log(description_short); return false;
        var data = new FormData();
        data.append('title_forgot', title_forgot);
		data.append('title_register', title_register);

		data.append('send_register', send_register);
		data.append('send_forgot', send_forgot);
        data.append('id', id);
        $.ajax({
            url: controller + 'save',
            type: 'POST',
            async: false,
            data: data,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            success: function(datas) {
                var obj = $.evalJSON(datas);
				$('.loading').hide();
                $("#token").val(obj.csrfHash);
                if (obj.status == 0) {
                     error('Lưu không thành công');
                     return false;
                }
                else {
					success('Lưu thành công');
                }
            },
            error: function() {

            }
        });
    }
</script>
<script src="<?= url_tmpl(); ?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?=url_tmpl();?>ckeditor/ckeditor.js" type="text/javascript"></script>
