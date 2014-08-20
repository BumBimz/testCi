<div class="useLogin">
	<h1>Users Login</h1>
	<?php
		if($msg = $this->session->flashdata('flash_message')){?>
            <div id="message-red">
				<table width="96%" cellspacing="0" cellpadding="0" border="0">
					<tbody><tr><td class="red-left"><?php  echo $msg;?></td></tr></tbody>
				</table>
			</div>   
	<?php } ?>
	<form method="post" action="" id="customForm">
		<p><input type="text" name="username" class="clsText inputT" id="UN"/></p>
		<p><input type="password" name="pwd" class="clsText inputT" id="PW"/></p>
		<p><input type="submit" style="width:auto;" id="send" name="usersLogin" value="Login" /></p>
	<p style="clear:both;">
	</form>
</div>