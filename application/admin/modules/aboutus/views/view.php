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
                Giới thiệu công ty
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
                        <label class="control-label col-md-4">Tiêu đề (<span class="red">*</span>)</label>
                    </div>
                </div>
            </div>
            <div class="row">
				<div class="col-md-12" style="padding-left:30px !important; padding-right:30px !important;">
                    <div class="form-group">
						<input type="text" name="about_title" id="about_title" class="searchs form-control" value="<?=$finds->about_title;?>" />
					</div>
				</div>
			</div>
            <div class="row mtop10">
                <div class="col-md-12">
					<div class="form-group">
						<label class="control-label col-md-2">Nội dung ngắn</label>
					</div>
                </div>
            </div>
			<div class="row" >
                <div class="col-md-12" style="padding-left:30px !important; padding-right:30px !important;">
                    <div class="form-group">
						 <textarea class="ckeditor form-control" id="description_short" name="description_short"><?=$finds->description_short;?></textarea>
					</div>
				</div>
			</div>
			<div class="row mtop10">
                <div class="col-md-12">
					<div class="form-group">
						<label class="control-label col-md-2">Nội dung chi tiết</label>
					</div>
                </div>
            </div>
			<div class="row" >
                <div class="col-md-12" style="padding-left:30px !important; padding-right:30px !important;">
                    <div class="form-group">
						 <textarea class="ckeditor form-control" id="description_long" name="description_long"><?=$finds->description_long;?></textarea>
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
	<div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption" style="margin-top:4px;">
                <i class="fa fa-reorder"></i>
                Thẻ meta
            </div>
            <div class="tools"></div>
        </div>
        <div class="portlet-body">
			<div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label col-md-4">Meta title</label>
                    </div>
                </div>
            </div>
            <div class="row">
				<div class="col-md-12" style="padding-left:30px !important; padding-right:30px !important;">
                    <div class="form-group">
						<input type="text" name="meta_title" id="meta_title" class="searchs form-control" value="<?=$finds->meta_title;?>" />
					</div>
				</div>
			</div>
			<div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label col-md-4">Meta keyword</label>
                    </div>
                </div>
            </div>
            <div class="row">
				<div class="col-md-12" style="padding-left:30px !important; padding-right:30px !important;">
                    <div class="form-group">
						<input type="text" name="meta_keyword" id="meta_keyword" class="searchs form-control" value="<?=$finds->meta_keyword;?>" />
					</div>
				</div>
			</div>
			<div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label col-md-4">Meta description</label>
                    </div>
                </div>
            </div>
            <div class="row">
				<div class="col-md-12" style="padding-left:30px !important; padding-right:30px !important;">
                    <div class="form-group">
						<input type="text" name="mete_description" id="mete_description" class="searchs form-control" value="<?=$finds->mete_description;?>" />
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
            CKEDITOR.instances['description_long'].setData("");
            CKEDITOR.instances['description_short'].setData("");
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

        if (obj.about_title == '') {
            error("Tiê đề <?= getLanguage('all', 'empty') ?>");
            return false;
        }
		$('.loading').show();
        var about_title = $('#about_title').val();
		var meta_title = $('#meta_title').val();
		var meta_keyword = $('#meta_keyword').val();
		var mete_description = $('#mete_description').val();
		var description_long = CKEDITOR.instances['description_long'].getData();
		var description_short = CKEDITOR.instances['description_short'].getData();
		//console.log(description_short); return false;
        var data = new FormData();
        data.append('csrf_stock_name', token);
        data.append('about_title', about_title);
		data.append('meta_title', meta_title);
		data.append('meta_keyword', meta_keyword);
		data.append('mete_description', mete_description);
		data.append('description_long', description_long);
		data.append('description_short', description_short);
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
