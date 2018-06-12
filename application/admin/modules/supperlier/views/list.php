<?php 
$i= $start;
foreach ($datas as $item) { 
?>

	<tr class="content edit" img = "<?=$item->img;?>" 
	id="<?=$item->id; ?>" 
	supperlier_name="<?=$item->supperlier_name; ?>"
	>
		<td style="text-align: center;">
		<input class="noClick" type="checkbox" name="keys[]" id="<?=$item->id; ?>"></td>
		<td class="center"><?=$i;?></td>
		<td class="supperlier_name">
		<?php if (isset($permission['edit'])) { ?>
			<a href="<?=admin_url();?>/supperlier/edits/<?=$item->id; ?>"><?=$item->supperlier_name;?></a>
		<?php }else{?>
			<?=$item->supperlier_name;?>
		<?php }?>
		</td>
		<td class="description"><?=$item->description;?></td>
        <td class="text-center"><img src="<?php echo base_url().'files/supperlier/'.$item->img?>" alt="img" height="42" width="42"></td>
		<td class="url"  ><?=$item->url;?></td>
		
		<td></td>
	</tr>
<?php	
$i++;
}
?>