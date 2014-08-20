
<table  border="1" cellpadding="5" cellspacing="0" width="1215">
<tr>
		<td>ID</td>
		<td>User</td>
		<td>Password</td>
		<td>ชื่อ - นามสกุล</td>
		<td>ตำแหน่ง</td>
		<td>สาขา</td>
		<td>บริษัท</td>
		<td>Edit</td>
		<td>Delete</td>
	</tr>
<?php	
session_start();
	$sizeData = sizeof($member);
	$_SESSION['username']='admin';
	$_SESSION['member_id']='1';
	/*
	for($i=0;$i<$sizeData;$i++){
		echo 'ชื่อ : '.$member[$i]->member_first_name.' '.$member[$i]->member_last_name.'<br>';
		echo 'บริษัท : '.$member[$i]->company_name.'<br>';
		echo 'ตำแหน่ง : '.$member[$i]->position.'<br>';
		echo 'สาขา : '.$member[$i]->branch_name.'('.$member[$i]->branch_code.')<br>';
		echo '<br>';
	}
	*/
	foreach($member as $result){
	$memberName = $result->member_first_name.' '.$result->member_last_name;
	?>
	<tr>
		<td><?php echo $result->member_id; ?></td>
		<td><?php echo $result->member_user; ?></td>
		<td><?php echo $result->member_password; ?></td>
		<td><?php echo $memberName ?></td>
		<td><?php echo $result->position; ?></td>
		<td><?php echo $result->company_name; ?></td>
		<td><?php echo $result->branch_name.'('.$result->branch_code.')';?></td>
		<td><?php echo "<button onclick='editSaleDetail($result->member_id)'>Edit</button>"; ?></td>
		<td><?php echo "<button onclick='deleteSaleDetail($result->member_id)'>Delete</button><input type='hidden' id='hiddenName".$result->member_id."' value='$memberName'>"; ?></td>
		
	</tr>
<?php	}
?></table>