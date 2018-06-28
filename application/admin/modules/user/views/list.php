<?php 
$i= $start;
foreach ($datas as $item) { 
	$fullStatus = '';
	if ($item->groupid == 2 || $item->groupid == 3) {
		if ($item->is_full == 1) {
			$fullStatus = '<button is_full="1" class="btn-danger btn btn-sm change_status">Full</button>';
		}
		else {
			$fullStatus = '<button is_full="0" class="btn-success btn btn-sm change_status">Free</button>';
		}
	}
?>

	<tr class="content edit" groupid="<?=$item->groupid;?>" level="<?=$item->level;?>" degree="<?=$item->degree;?>" experience="<?=$item->experience;?>" views="<?=$item->views;?>" firebasedb="<?=$item->firebasedb;?>" avatar="<?=$item->signature;?>" id="<?=$item->id;?>" >
		<td style="text-align: center;">
		<input class="noClick" type="checkbox" name="keys[]" id="<?=$item->id; ?>"></td>
		<td class="center"><?=$i;?></td>
		<td class="uusername"><?=$item->username;?></td>
		<td class="ufullname"><?=$item->fullname;?></td>
		<td class="ugroupid"  ><?=$item->groupname;?></td>
		<td class="umobile"><?=$item->mobile;?></td>
		<td class="uemail"><?=$item->email;?></td>
		<td class="ulevel"><?=$item->level;?></td>
		<td class="udegree"><?=$item->degree;?></td>
		<td class="uexperience"><?=$item->experience;?></td>
		<td class="uviews"><?=$item->views;?></td>
		<td align="center" class="udb_name"><?=$item->db_name;?></td>
		<td align="center" class="uis_full"><?=$fullStatus;?></td>
		<td></td>
	</tr>
<?php	
$i++;
}
?>