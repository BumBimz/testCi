<?php
session_start();
$_SESSION['username'] = $this->session->userdata('username'); // Must be already set
?>
<?php $this->load->view('header'); ?>
<?php
if($msg = $this->session->flashdata('flash_message'))
{
echo $msg;	
}
?>
<h2>Online Users</h2>
<?php
if($_SESSION['username']=='') { ?>
<h3>Please login to chat</h3>
<a href="http://localhost:8000/index.php/users">Login</a><br/>
<?php
} else {  echo 'Hi '.$_SESSION['username'];
?> 
<br />
<a href="http://localhost:8000/index.php/users/logout">Logout</a><br/>
<?php
}
?>               <table width="45%" cellspacing="1" cellpadding="2" class="tableContent" style="margin-left:0px !important;">
<tbody>
<tr style="background-color:#9EB0E9;  font-size:13px; font-weight:bold; color:#fff;">
<th>Online</th>
<th>User Id</th>
<th>User Name</th>
</tr>
<?php
if(isset($listOfUsers))
{
foreach($listOfUsers->result() as $res)
{
if($res->online==1){
?>
<tr style="background-color:#efefef;">
<td><?php if($res->online==1) echo 'Active'; else echo 'Inactive'; ?></td>
<td><?php echo $res->member_id; ?></td>
<td>
<?php if($_SESSION['username']==$res->member_user) { ?>
<a href="#" style="text-decoration:none">
<?php } else { ?>  
<a href="javascript:void(0)" onClick="javascript:chatWith('<?php echo $res->member_user; ?>');">
<?php } ?>      
<?php echo $res->member_user;  ?>
</a>
</td>
</tr>
<?php 	
}
}
}
?>	  	  	
</tbody>
</table>
<?php $this->load->view('footer'); ?>