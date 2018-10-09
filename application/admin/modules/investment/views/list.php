<?php 
$i= $start;
foreach ($datas as $item) { 
?>

	<tr class="content edit" img = "<?=$item->img;?>" id="<?=$item->id; ?>" >
		<td style="text-align: center;">
		<input class="noClick" type="checkbox" name="keys[]" id="<?=$item->id;?>"></td>
		<td class="center"><?=$i;?></td>
		<td class="title">
		 <?php if (isset($permission['edit'])) { ?>
		   <a href="<?=admin_url();?>investment/form/<?=$item->id;?>"><?=$item->title;?></a>
		 <?php }else{?>
			<?=$item->title;?>
		 <?php }?>
		</td>
		
        <td class="text-center"><img src="<?php echo base_url().'files/investment/thumb/'.$item->thumb?>" alt="img" width="100"></td>	
		<td class="text-center"><input value="<?=$item->show_home;?>" class="show_home" id="<?=$item->id;?>" <?php if($item->show_home == 1){?> checked <?php }?> type="checkbox" /></td>
		<td class="datecreate"><?=$item->datecreate;?></td>
		<td class="usercreate"><?=$item->usercreate;?></td>
		<td></td>
	</tr>
<?php	
$i++;
}
?>