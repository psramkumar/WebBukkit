<?php
if($_POST)
{
	if($_POST['user'])
	{
		if($_POST['pass'])
		{
			$md5 = md5($_POST['user'] . $_POST['pass']);
			$userdata = mysql_fetch_assoc(mysql_query("SELECT * FROM users WHERE `pass`='$md5' AND `user`='$pc[user]'"));
			if($userdata)
			{
				$_SESSION = $userdata;
				header("Location: $rooturl");
				die();
			}
			else
				$err = 'Incorrect username / password';
		}
		else
			$err = 'Please enter a password';
	}
	else
		$err = 'Please enter a username';
} 
?>	<div id="PageContent">
<?php if($err){ ?>	<div class="Notice"><?php echo $err; ?></div>
<?php } ?>
		<form method="post" style="margin-top: 20px;">
			<div class="Container">
				<label for="user">Username</label>
				<input type="text" name="user">
				<br><br>
				<label for="password">Password</label>
				<input type="password" name="pass">
			</div>
						
			<div class="Container" id="Toolbar">
				<input class="right" type="submit" name="login" value="Login">
			</div>
		</form>
	</div>