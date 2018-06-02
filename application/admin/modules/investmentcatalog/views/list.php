<?php 
$i= $start;
foreach ($datas as $item) { 
?>

	<tr class="content edit" id="<?=$item->id; ?>" parentid = "<?=$item->parentid; ?>" >
		<td style="text-align: center;">
		<input class="noClick" type="checkbox" name="keys[]" id="<?=$item->id; ?>" "></td>
		<td class="center"><?=$i;?></td>
		<td class="catalog_name"><?=$item->catalog_name;?></td>
		<td class="text-center">
			<?php if(!empty($item->img)){?>
			<img width="80" height="50" src="<?=base_url();?>files/producttype/<?=$item->img;?>" />
			<?php }?>
		</td>
		<td>
			<input class="ordering search text-center" id="<?=$item->id;?>" type="number" value="<?=$item->ordering;?>" />
		</td>
		<td></td>
	</tr>
<?php	
$i++;
}
?>