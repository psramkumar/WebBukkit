	<div id="PageContent">
		<?php $server = new MineLink(); ?>
		<h4>Dashboard</h4>
		<span>CPU <div class="ui-progress-bar"><div class="ui-progress" style="width: <?php echo $server->cpu_usage();?>%;"></div></div></span>
		<span>RAM <div class="ui-progress-bar"><div class="ui-progress" style="width: <?php echo $server->mem_usage();?>%;"></div></div></span>

		<br>

		<p>Online 123.456.78.90:8080</p><br>
	
		<h4>Server Time</h4>
		<p>8:65PM</p><br>

		<h4>Online Players</h4>
		<p>There are currently <?php echo $server->playercount(); ?>/<?php echo $server->maxplayers(); ?> players online.</p>
		<p><?php foreach($server->players() as $player) $playerlist .= $player . ', '; echo substr($playerlist, 0, -2); ?></p><br>
	
		<div class="Notice">
			<p>Most pages and their content are made up, they have absolutely no function.</p>
			<p>See Page Groups > Add Group > Save, for an activity indicator.</p>
			<p>Site looks the best in Safari or Firefox, Activity indicator only works in Safari.</p>
		</div>
	
		<form method="POST" action="./index.php?p=home" onsubmit="return manageServer()" id="Toolbar">
			<input class="Button" type="submit" value="Restart" name ="RestartButton" style="margin-left: 20px;">
			<input class="Button" type="submit" value="Stop" name ="StopButton">
		</form>
	</div>