<div class="row">
	<div class="col-md-12">
		<div class="form-group">
			<label class="control-label col-md-4"><?=getLanguage('loai-dich-vu');?> (<span class="red">*</span>)</label>
			<div class="col-md-8">
				<input type="text" name="input_catalog_service_name" placeholder="<?=getLanguage('nhap-loai-dich-vu');?>" id="input_catalog_service_name" class="form-input form-control tab-event" />
			</div>
		</div>
	</div>
	<div class="col-md-12 mtop10">
		<div class="form-group">
			<label class="control-label col-md-4"><?=getLanguage('ghi-chu');?></label>
			<div class="col-md-8">
				<input type="text" name="input_description" placeholder="<?=getLanguage('nhap-ghi-chu');?>" id="input_description" class="form-input form-control tab-event" />
			</div>
		</div>
	</div>
</div>
<script>
	$(function(){
		initForm();
	});
	function initForm(){
		$('#input_catalog_service_name').val('<?=$finds->catalog_service_name;?>');
		$('#input_description').val('<?=$finds->description;?>');
	}
</script>
