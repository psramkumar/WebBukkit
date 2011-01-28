	<div id="PageContent">
	<fieldset>
		<legend><a href="<?php echo $rooturl; ?>admin/server">Server</a></legend>
<?php if($uri[2] == 'server'){ ?>
		<fieldset>
			<legend>General Settings</legend>
			<form method="POST" action="./index.php?p=settings" onsubmit="return saveSettings()" id="Settings">	
			<div class="Container">
				<label for="serverName">Server Name</label>
				<input id="serverName" type ="text" value="My Awesome Server" name="serverName" style="width: 300px; margin-right: 13px;">
			</div>
			<div class="Container">
				<label for="maxPlayers">Max Players</label>
				<input id="maxPlayers" type ="text" value="10" name="maxPlayers" style="width: 100px; margin-right: 13px;">
			</div>
			<div class="Container">
				<label class="Label" for="serverPort">Port</label>
				<input id="serverPort" type ="text" value="25565" name="serverPort" id="serverPort" style="width: 100px;">
			</div>
		</fieldset>
		<fieldset>
			<legend>World Settings</legend>
			<div class="Container">
				<label for="checkPvP">PvP</label>
				<input id="checkPvP" type="text" value="Yes" name="pvp" style="width: 100px; margin-right: 13px;">
			</div>
			<div class="Container">
				<label for="onlineMode">Online Mode</label>
				<input id="onlineMode" type="text" value="Yes" name="onlineMode" style="width: 100px;">
			</div>
			<br><br>
			<div class="Container">
				<label for="monsters">Monsters</label>
				<input id="monsters" type="text" value="No" name="monsters" style="width: 100px; margin-right: 13px;">
			</div>
			<div class="Container">
				<label for="animals">Animals</label>
				<input id="animals" type="text" value="Yes" name="animals" style="width: 100px;">
			</div>
			<br><br>
			<label for="netherWorld" class="inline">Nether World</label><br>
			<input id="netherWorld" style="width: 100px;" type="text" value="No" name="netherWorld">
		</fieldset>
		<input class="Button" type="submit" value="Save" name="saveSettings">
		</form>
<?php } else { ?>		<p>Click "Server" to configure your minecraft server</p>
<?php } ?>	</fieldset>
	<fieldset>
		<legend><a href="<?php echo $rooturl; ?>admin/users">Users</a></legend>
<?php if($uri[2] == 'users'){ ?>
		<fieldset>
			<legend><a href="<?php echo $rooturl; ?>admin/users/manage">Manage</a></legend>
<?php
if($uri[2] == 'edit' && ($_POST['edituser'] || $_POST['saveedit']))
{
	$user = mysql_fetch_assoc(mysql_query("SELECT * FROM users WHERE `id`='$pc[uid]'"));
?>
	<h4>Users - Manage - <?php echo $user['user']; ?></h4>
		<form method="post" action="<?php echo $rooturl; ?>admin/edit">
			<p>Username: <input type="text" name="user" value="<?php echo $user['user']; ?>"></p>
			<p>Password: <input type="password" name="pass"></p>
			<p>Password Again: <input type="password" name="pass"></p>
			<p>Permissions:</p>
			<ul class="permissions">
				<li>Login: <input type="checkbox" name="perm_1"></li>
				<li>Start/Stop Server: <input type="checkbox" name="perm_2"></li>
				<li>Server Settings: <select name="perm_9"><option>None</option><option>View</option><option>Edit</option></select></li>
				<li>Groups: <select name="perm_3"><option>None</option><option>View</option><option>Edit</option></select></li>
				<li>Users: <select name="perm_4"><option>None</option><option>View</option><option>Edit</option></select></li>
				<li>Waps: <select name="perm_5"><option>None</option><option>View</option><option>Edit</option></select></li>
				<li>Kits: <select name="perm_6"><option>None</option><option>View</option><option>Edit</option></select></li>
				<li>Backups: <select name="perm_7"><option>None</option><option>View</option><option>Edit</option></select></li>
				<li>Administrator: <select name="perm_8"><option>None</option><option>View</option><option>Edit</option></select></li>
			</ul>
			<p><input type="hidden" name="uid" value="<?php echo $user['id']; ?>"><input type="submit" name="saveedit" value="Save & Edit">&nbsp;<span class="right">or</span>&nbsp;<input type="submit" name="saveclose" value="Save & Close"></p>
		</form>
<?php
}
?>			<table class="list">
			<tr>
				<th>User</th>
				<th>Manage</th>
				<th>Last Login</th>
				<th>Delete</th>
			</tr>
<?php
		$userdata = mysql_query("SELECT * FROM users");
		while($user = mysql_fetch_assoc($userdata))
		{
			echo '			<tr>' . "\n";
			echo '				<td>'.$user['user'].'</td>' . "\n";
			echo '				<td><form method="post" action="'.$rooturl.'admin/edit"><input type="hidden" name="uid" value="'.$user['id'].'"><input type="submit" name="edituser" value="Edit"></form></td>' . "\n";
			echo '				<td>'.$user['lastlogin'].'</td>' . "\n";
			echo '				<td><form method="post"><input type="hidden" name="user" value="'.$user['id'].'"><input type="submit" name="delete" value="Delete"></form></td>' . "\n";
			echo '			</tr>' . "\n";
		}
		?>
			</table>
		</fieldset>
		<fieldset>
			<legend><a href="<?php echo $rooturl; ?>admin/users/new">New</a></legend>
			<form method="post">
				<p>
					<label>Username</label>
					<input type="text" name="user">
				</p>
				<p>
					<label>Password</label>
					<input type="password" name="pass">
				</p>
				<p id="Toolbar">
					<small class="left">Note: This user will not be able to login untill you set their permissions</small>
					<input type="submit" name="create" value="Create">
				</p>
			</form>
		<?php } else { ?>
		<p>Click "Users" to manage BukkitAdmin's users</p>
		<?php } ?>
		</fieldset>
	</div>