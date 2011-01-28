	<div id="PageContent">
<?php if($uri[2] == 'edit') { ?>
		<h4>Editing <?php echo $uri[3]; ?></h4>
		<form method="POST" action="./index.php?p=groups" onsubmit="return activity()" id="Settings">
			<div class="Container">
				<label for="groupName">Group Name</label>
				<input id="groupName" type ="text" value="Settler" name="serverName" style="width: 300px; margin-right: 13px;">
			</div>
  
			<br><br>
  
			<label for="groupPerms">Permissions</label>
			<textarea name="groupPerms" rows="1" cols="1" style="width: 744px; max-width: 744px; height: 100px;">'build' 'time' 'cast' 'magic' 'info'</textarea>
  
			<br>
  
			<label for="groupUsers">Users</label>
			<textarea name="groupUsers" rows="1" cols="1" style="width: 744px; max-width: 744px; height: 100px;">McSpider McYukon MonsiuerApple Plastix</textarea>
  
  	    
			<div id="Toolbar">
				Use '*' as a wildcard
				<input class="Button" id="saveButton" type="submit" value="Save" name="saveGroup">
				<div id="pulse"></div>
			</div>
		</form>
<?php } else { ?>
		<h4>Groups</h4>
		<table width="100%" style="text-align: Left; -webkit-font-smoothing: antialiased;" cellpadding="0" cellspacing="0">
  			<tr>
				<th width="300px">Group Name</th>
				<th width="250px">Permissions</th>
				<th>Inherits</th>
			</tr>
		</table>
		<table class="list groups" width="100%" style="text-align: Left;" cellpadding="0" cellspacing="0">
  
			<tr>
				<td>King<br><i>McSpider McYukon MonsieurApple</i></td>
				<td>'*'</td>
				<td>Knight, Wizard, Settler</td>
				<td class="edit"><a href="<?php echo $rooturl; ?>groups/edit/King">›</a></td>
			</tr>
	
			<tr>
				<td>Knight<br><i>Plastix</i></td>
				<td>'build' 'time'</td>
				<td>Wizard</td>
				<td class="edit"><a href="<?php echo $rooturl; ?>groups/edit/Knight">›</a></td>
			</tr>
	
			<tr>
				<td>Wizard<br><i>10Bit bdog98760</i></td>
				<td>'build' 'time' 'cast' 'magic' 'info'</td>
				<td>Settler</td>
				<td class="edit"><a href="<?php echo $rooturl; ?>groups/edit/Wizard">›</a></td>
			</tr>
  
  			<tr>
				<td width="300px">Settler<br>'*'</td>
				<td width="250px">'build'</td>
				<td></td>
				<td class="edit"><a href="<?php echo $rooturl; ?>groups/edit/Settler">›</a></td>
  			</tr>
		</table>
  
		<form method="POST" action="<?php echo $rooturl; ?>groups/edit/new" id="Settings">
			<div id="Toolbar">
				<input class="Button" type="submit" value="Add Group" name="addGroup">
			</div>
		</form>
<?php } ?>
	</div>
