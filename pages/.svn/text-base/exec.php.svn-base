<?php
if($uri[2] == 'start')
	$title = 'Starting...';
elseif($uri[2] == 'stop')
	$title = 'Stopping...';
else
	$title = 'Invalid';
?>
	<div id="content">
		<h3><?php echo $title; ?></h3>
		<?php
		if($uri[2] == 'start')
		{
			$cmd = '/usr/bin/php '.$wwwdir.'/include/mcserver.php >/dev/null&';
			echo $cmd;
			shell_exec($cmd);
		}
		?>
	</div>