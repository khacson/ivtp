<style title="" type="text/css">
	table col.c1 { width: 45px; }
	table col.c2 { width: 45px; }
	table col.c3 { width: 150px; }
	table col.c4 { width: 180px; }
	table col.c5 { width: 250px; }
	table col.c6 { width: 230px; }
	table col.c7 { width:150px; }
	table col.c8 { width:80px; }
	table col.c9 { width: 100px; }
	table col.c10 { width: 230px; }
	table col.c11 { width: auto; }
</style>
<!-- BEGIN PORTLET-->
<form method="post" enctype="multipart/form-data">
    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-reorder"></i>
                <?= getLanguage('all', 'Search') ?>
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
                        <label class="control-label col-md-3">Họ tên</label>
                        <div class="col-md-9">
                            <input type="text" name="fullname" id="fullname" class="searchs form-control" />
                        </div>
                    </div>
                </div>  
				 <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label col-md-3">Email</label>
                        <div class="col-md-9">
                            <input type="text" name="email" id="email" class="searchs form-control" />
                        </div>
                    </div>
                </div> 
                <div class="col-md-4">
                     <div class="form-group">
                        <label class="control-label col-md-3">Bài viết</label>
                        <div class="col-md-9">
                            <input type="text" name="description" id="description" class="searchs form-control" />
                        </div>
                    </div>
                </div>
            </div>
			<div class="row mtop10">
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label col-md-3">Duyệt</label>
						<div class="col-md-9" >
							<select name="accept" id="accept" class="combos" >
								<option value=""></option>
								<option value="0">Chưa</option>
								<option value="1">Rồi</option>
							</select>
						</div>
					</div>
				</div>
                <div class="col-md-4">
                     <div class="form-group">
                        <label class="control-label col-md-3">Trả lời</label>
                        <div class="col-md-9">
                            <textarea rows="1" name="reply_msg" id="reply_msg" class="searchs form-control">
							</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
 <input type="hidden" name="id" id="id" />
 <input type="hidden" name="blogid" id="blogid" />
 <input type="hidden" name="level" id="level" />
<div class="portlet box blue">
    <div class="portlet-title">
        <div class="caption" style="margin-top:4px;">
            <i>Có <span class='viewtotal'>0</span> bình luận</i>
        </div>
        <div class="tools">
            <ul class="button-group pull-right" style="margin-top:-3px; margin-bottom:5px;">
                            <li id="search">
                                <button type="button" class="button">
                                    <i class="fa fa-search"></i>
                                    <?= getLanguage('all', 'Search') ?>
                                </button>
                            </li>
                            <li id="refresh">
                                <button type="button" class="button">
                                    <i class="fa fa-refresh"></i>
                                    <?= getLanguage('all', 'Refresh') ?>
                                </button>
                            </li>
                            <?php if (isset($permission['edit'])) { ?>
                                <li id="edit">
                                    <button type="button" class="button">
                                        <i class="fa fa-save"></i>
                                        <?= getLanguage('all', 'Edit') ?>
                                    </button>
                                </li>
                            <?php } ?>
                            <?php if (isset($permission['delete'])) { ?>
                                <li id="delete">
                                    <button type="button" class="button">
                                        <i class="fa fa-times"></i>
                                        <?= getLanguage('all', 'Delete') ?>
                                    </button>
                                </li>
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
                            <?php for ($i = 1; $i < 11; $i++) { ?>
                                <col class="c<?= $i; ?>">
                            <?php } ?>
                            <tr>
                                <th class="text-center"><input type="checkbox" name="checkAll" id="checkAll" /></th>
                                <th>STT</th>
                                <th id="ord_fullname">Họ tên</th>
                                <th id="ord_phone">Email</th>
								<th id="">Nội dung bình luận</th>
                                <th id="ord_blogid">Bài viết</th>
                                <th id="ord_datecreate">Ngày bình luận</th>
                                <th id="ord_accept">Duyệt</th>
                                <th id="ord_parent">Bình luận cha</th>
                                <th id="ord_parent">Trả lời</th>
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
                            <?php for ($i = 1; $i < 11; $i++) { ?>
                                <col class="c<?= $i; ?>">
                            <?php } ?>
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
        $('#accept').multipleSelect({
        	filter: true,
			placeholder:"Chọn trạng thái duyệt",
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
            location.href = '<?=base_url()."admin.php/markettrend/form"?>';
        });
        $('#edit').click(function() {
            var id = $('#id').val();
            if (id == '') {
                error('Vui lòng chọn bình luận cần sửa');
                return false;
            }
            save('edit', id);			
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
    });
	function save(func,id){
		search = getSearch();
		var obj = $.evalJSON(search); 
		var token = $('#token').val();
		var blogid = $('#blogid').val();
		var level = $('#level').val();
		
		if(obj.accept == ''){
			error("Vui lòng chọn trạng thái duyệt"); 
			$("#accept").focus();
			return false;		
		}
		
		$.ajax({
			url : controller + func,
			type: 'POST',
			async: false,
			data:{search: search, id: id, blogid: blogid, level: level}, 
			success:function(datas){
				var obj = $.evalJSON(datas); 
				$("#token").val(obj.csrfHash);
				if(obj.status == 0){
					if(id != ''){
						error('Cập nhật không thành công'); return false;		
					}
					else{
						error('Cập nhật không thành công'); return false;		
					}
				}
				else if(obj.status == -1){
					error("Cập nhật không thành công"); return false;		
				}
				else{
					refresh();
				}
			},
			error : function(){
				
			}
		});
	}
    function funcList(obj) {
        $('.edit').each(function(e){ 
			$(this).click(function(){ 
				var id = $(this).attr('id');
				var fullname = $(this).attr('fullname');
				var phone = $(this).attr('phone');
				var email = $(this).attr('email');
				var accept = $(this).attr('accept');
				var reply_id = $(this).attr('reply_id');
				var blogid = $(this).attr('blogid');
				var level = $(this).attr('level');
				var reply_msg = $('.reply_msg').eq(e).html().trim();
				var title = $('.title').eq(e).html().trim();
				
				$('#id').val(id);		
				$('#blogid').val(blogid);		
				$('#level').val(level);		
				$('#fullname').val(fullname);
				$('#phone').val(phone);	
				$('#email').val(email);	
				$('#reply_msg').val(reply_msg);	
				$('#title').val(title);	
				$('#accept').multipleSelect('setSelects', accept.split(','));
				
				$('#fullname').attr('disabled', true);
				$('#phone').attr('disabled', true);	
				$('#title').attr('disabled', true);
			})
		})
    }
    function refresh() {
        $('.loading').show();
        $('.searchs').val('');
        $('#show').html('');
		$('#blogid').val('');
        $('#level').val('');
        $('#id').val('');
        $('#accept').multipleSelect('uncheckAll');
        document.getElementById("checkAll").checked=false;
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
        $('textarea.searchs').each(function() {
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
