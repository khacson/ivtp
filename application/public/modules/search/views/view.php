<link rel="stylesheet" href="<?=url_tmpl();?>template.css">
<section class="section-10 bg-selago">
        <div class="shell">
          <ul class="list-inline list-inline-12 list-inline-icon p tleft breads">
            <li><a href="<?=base_url();?>trang-chu.html"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;Trang chủ </a></li>
            <li><a href="javascript:;"><i class="fa fa-angle-right" aria-hidden="true"></i> 
				Kết quả tìm kiếm cho từ khóa "<b><?=$searchText?></b>"</a></li>
            </li>
			<input id="uri" type="hidden" name="uri" value="<?=$uri;?>" />
          </ul>
        </div>
      </section>   
	  <section class="text-left section-40">
          <div class="inset-lg-left-45 inset-lg-right-45 inset-xl-left-130 inset-xl-right-85">
            <div class="shell-wide shell-wide-custom">
              <div class="range range-xs-center range-lg-right range-xl-justify">
                <div class="cell-sm-10 cell-md-8 cell-xl-7">
					<!--S Item-->
					<div  id="grid-rows"></div>
					<!--E Item-->
					<div class="cell-sm-10 cell-md-8 cell-xl-7 offset-md-top-20">
						<div class="text-center" id="paging"></div>
					</div>
                </div>
				
                <div class="cell-sm-10 cell-md-4 offset-top-90 offset-md-top-30">
                  <div class="inset-md-left-30">
                    <!-- Aside-->
                    <aside class="text-left inset-xl-right-50">  
                      <!-- Categories-->
                      <div class="">
                        <hr class="divider hr-left-0 bg-bermuda">
                        <h5 class="offset-top-15">Danh mục</h5>
                      </div>
                      <div class="offset-top-30">
                        <div class="inset-xs-left-8">
                          <!-- List Marked-->
                          <ul class="list list-marked list-marked-icon">
								<?php foreach($catalogs as $item){?>
								<li><a href="<?=base_url();?>xu-huong-thi-truong/<?=$item->friendlyurl;?>.html"><?=$item->catalog_name;?></a></li>
								<?php }?>
                          </ul>
                        </div>
                      </div>
                      <!-- Recent Posts-->
                      <div class="offset-top-60 offset-md-top-90">
                        <hr class="divider hr-left-0 bg-bermuda">
                        <h5 class="offset-top-15">Bài viết mới</h5>
                      </div>
                      <?php foreach($listNew as $item){?>
                      <div class="offset-top-20">
                        <!-- Unit-->
                        <div class="unit unit-horizontal">
                          <div class="unit-left"><img class="img-responsive center-block" src="<?=base_url();?>files/markettrend/thumb/<?=$item->thumb;?>" width="100" height="100" alt=""></div>
                          <div class="unit-body">
							<?php 
								$new_icon = '';
								if ((time() - strtotime($item->dateupdate) < 3*86400)
								|| (time() - strtotime($item->datecreate) < 3*86400)) {
									$new_icon = '<img src="'.base_url().'files/icon/new_icon.gif" />';
								}
							?>
                            <a href="<?=base_url();?>xu-huong-thi-truong/<?=$item->friendlyurl;?>-dt<?=$item->id;?>.html"><?=$item->title;?> <?=$new_icon?></a>
                            <div class="offset-top-10">
                              <!-- List Inline-->
                              <ul class="list-inline list-inline-dashed list-inline-12 text-gray text-italic p">
                                <li><i class="fa fa-calendar icon icon-normal icon-sm font12" aria-hidden="true"></i>
						<span class="text-middle inset-left-10 text-italic font12"><?=date('d/m/Y',strtotime($item->dateupdate));?> </span></li>
                            
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
						<?php }?>
                     
                    </aside>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
		<section class="text-left section-40 offset-md-top-50">
		
		</section>
<script>
	var controller = '<?=base_url();?>search/';
    var csrfHash = '';
    var cpage = 0;
    var search;
	var order = '';
	var index = 'asc';
	var action = 'getList';
	$(function(){
		getListMore(cpage,csrfHash,action,'');
	});
	function getListMore(page,csrfHash,action,type){
		loaddingPage = false;
		var search = '<?=$searchText?>';
		$("#token").val('');
		$('.loading').show();
		$('#hideClick').click();
		$('.dropdown-toggle').attr('aria-expanded','false');
		$.ajax({
			  url:controller+action,
			  async: true,
			  type: 'POST',
			  dataType: "json",
			  data:{
				  page:page,search:search,order:order,index:index
			  },
			  success:function(obj){
				 var total = obj.viewtotal;
				 var viewnumrows =  parseInt($('#viewnumrows').val());
				 viewnumrows = viewnumrows + obj.numrows;
				 $('#grid-rows').html(obj.content); 
				 $('#paging').html(obj.paging);
				 paging(obj.csrfHash);
				 $('.loading').hide();
				 $("html, body").stop().animate({scrollTop:0},1000, 'easeInOutQuad');
			  }
		});
	}
	function paging(csrfHash){
		$("#paging a").each(function(){
			$(this).click(function(){
				$('.loadingpage').show();
				cpage = $(this).attr('name');
				getListMore(cpage,csrfHash,action);
				return false;
			});
		});
	}
</script>