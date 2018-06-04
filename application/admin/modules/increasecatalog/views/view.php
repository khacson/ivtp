<style title="" type="text/css">
	table col.c1 { width: 45px; }
	table col.c2 { width: 80px; }
	table col.c3 { width: 100px; }
	table col.c4 { width: 100px; }
	table col.c5 { width: 60px; }
	table col.c6 { width: 60px; }
	table col.c7 { width: 60px; }
	table col.c8 { width: 60px; }
	table col.c9 { width: 325px; }
	table col.c10 { width: 130px; }
	table col.c11 { width: 100px; }
	table col.c12 { width: 100px; }
	table col.c13 { width: auto; }
	.red {
		color: red;
	}
	.green {
		color: green;
	}	
	#wapper table th{
		background: #79a4ab;
		color: #fff;
	}
</style>
<!-- BEGIN PORTLET-->
<div class="portlet box blue">
    <div class="portlet-title">
        <div class="caption" style="margin-top:4px;">
            <i>Có <span class='viewtotal'>0</span> mã cổ phiếu </i>
        </div>
        <div class="tools">
			<b>Cập nhật ngày <?=$datecreate?> bởi <?=$usercreate?> &nbsp;&nbsp;&nbsp;&nbsp;</b>
            <ul class="button-group pull-right" style="margin-top:-3px; margin-bottom:5px;">
				<?php if (isset($permission['import'])) { ?>
					<li id="import">
						<button type="button" class="button">
							<i class="fa fa-files-o"></i>
							<?= getLanguage('all', 'Import') ?>
						</button>
					</li>
					<input type="file" hidden id="myfile" />
				<?php } ?>
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
							<?php for ($i = 1; $i < 14; $i++) { ?>
                                <col class="c<?= $i; ?>">
                            <?php } ?>
                            <tr>
                                <th>STT</th>
								<?php foreach ($titles as $title) { ?>
								<th><?=$title?></th>
								<?php } ?>
								<th></th>
                            </tr>
                        </table>
                    </div>
                </div>
                <!--end header-->
                <!--body-->
                <div id="data">
                    <div id="gridView">
                        <table id="tbbody" width="100%" cellspacing="0" border="1">
							<?php for ($i = 1; $i < 14; $i++) { ?>
                                <col class="c<?= $i; ?>">
                            <?php } ?>
                            <tbody id="grid-rows"></tbody>
                        </table>
                    </div>
                </div>
                <!--end body-->
            </div>
        </div>
    </div>
</div>
<!-- END PORTLET-->
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
        $('#typeid').multipleSelect({
        	filter: true,
			placeholder:"Chọn loại",
            single: true
        });
        refresh();
        $('#refresh').click(function() {
            $(".loading").show();
           
            refresh();
        });
        $('#search').click(function() {
            $('.loading').show();
            searchList();
        });
        $('#save').click(function() {
            //save('save', '');
			var id = $('#id').val();
            location.href = '<?=base_url()."admin.php/investment/form"?>';
        });
        $('#edit').click(function() {
            var id = $('#id').val();
            if (id == '') {
                error('Please select a item.');
                return false;
            }
            //save('edit', id);			
            location.href = '<?=base_url()."admin.php/investment/edits/"?>'+id;
        });
        $('#delete').click(function() {
			var id = getCheckedId();
			 if (id == '') {
                error('Please select a item.');
                return false;
            }
            $.msgBox({
                title: 'Message',
                type: 'error',
                content: 'Do you want to delete this item?',
                buttons: [{value: 'Yes'}, {value: 'No'}],
                success: function(result) {
                    if (result == 'Yes') {
                        var id = getCheckedId();
                        var token = $('#token').val();
                        $.ajax({
                            url: controller + 'deletes',
                            type: 'POST',
                            async: false,
                            data: {csrf_stock_name: token, id: id},
                            success: function(datas) {
                                var obj = $.evalJSON(datas);
                                $('#token').val(obj.csrfHash);
                                if (obj.status == 0) {
                                    error('<?= getLanguage('all', 'delete_suc') ?>');
                                    return false;
                                }
                                else {
                                    
                                    refresh();
                                }

                            },
                            error: function() {

                            }
                        });
                    }
                }
            });
        });
		
		$('#import').click(function() {
			$('#myfile').trigger('click');
		})
		
		$('#myfile').change(function() {
			$(".loading").show();
			var data = new FormData();
			var objectfile = document.getElementById('myfile').files;
			if(objectfile.length == 0){
				warning('Chọn file import'); $(".loading").hide(); return false;
			}
			data.append('myfile', objectfile[0]);
			$.ajax({
				url : controller + 'readExcel',
				type: 'POST',
				async: false,
				data:data,
				enctype: 'multipart/form-data',
				processData: false,  
				contentType: false,   
				success:function(datas){
					$(".loading").hide();
					var obj = $.evalJSON(datas);
					if (obj.status == 1) {
						if (obj.missing == '') {
							success("Import thành công");
							window.location = '';
						}
						else {
							success("Import thành công. Các mã cổ phiếu sau chưa có thông tin chi tiết: "+ obj.missing);
							window.location = '';
						}
					}
					else {
						error('<?= getLanguage('all', 'Import không thành công') ?>');
						return false;
					}
					
				},
				error : function(){
					$(".loading").hide();
					error("Import không thành công"); return false;	
				}
			});
        });
    });
    function funcList(obj) {
        $('.isshow').each(function(e) {
            $(this).click(function() {
				$('.loading').show();
                var id = $(this).attr('id');
				var value = $(this).attr('value'); 
                $.ajax({ 
					url: controller + 'isshow',
					type: 'POST',
					async: false,
					data: {id:id, value:value},
					success: function(datas) { $('.loading').hide();}
				 });
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
    function getSearch() {
        var str = '';
        $('input.searchs').each(function() {
            str += ',"' + $(this).attr('id') + '":"' + $(this).val().trim() + '"';
        })
        $('select.combos').each(function() {
            str += ',"' + $(this).attr('id') + '":"' + getCombo($(this).attr('id')) + '"';
        })
        
        return '{' + str.substr(1) + '}';
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
</script>
<script src="<?= url_tmpl(); ?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?=url_tmpl();?>ckeditor/ckeditor.js" type="text/javascript"></script>
