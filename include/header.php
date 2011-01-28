<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="<?php echo $rooturl; ?>global/global.css" type="text/css">
	<?php if($p != 'login'){ ?><link rel="stylesheet" href="<?php echo $rooturl; ?>global/forms.css" type="text/css">
    <?php } if(file_exists("global/$p.css")){ ?><link rel="stylesheet" href="<?php echo $rooturl . 'global/' . $p; ?>.css" type="text/css">
    <?php } ?>
	<title>BukkitAdmin</title>
</head>
<body>

<div id="Container">

  <div id="Header">
  		<div id="Logo">BukkitAdmin</div>
  		<ul id="Navigation">
<?php if(!$_SESSION){ ?>			<li<?php if($p == 'login') echo ' class="active"';?>><a href="<?php echo $rooturl; ?>login">Login</a></li>
<?php } else { ?>			<li<?php if($p == 'dashboard') echo ' class="active"';?>><a href="<?php echo $rooturl; ?>">Dashboard</a></li>
<?php if(perms(3,1)){ ?>			<li<?php if($p == 'chat') echo ' class="active"';?>><a href="<?php echo $rooturl; ?>chat">Chat</a></li>
<?php } if(perms(4,1)){ ?>			<li<?php if($p == 'log') echo ' class="active"';?>><a href="<?php echo $rooturl; ?>log">Log</a></li>
<?php } if(perms(7,1)){ ?>			<li<?php if($p == 'players') echo ' class="active"';?>><a href="<?php echo $rooturl; ?>players">Players</a></li>
<?php } if(perms(7,1)){ ?>			<li<?php if($p == 'groups') echo ' class="active"';?>><a href="<?php echo $rooturl; ?>groups">Groups</a></li>
<?php } if(perms(7,1)){ ?>			<li<?php if($p == 'backups') echo ' class="active"';?>><a href="<?php echo $rooturl; ?>backups">Backups</a></li>
<?php } if(perms(8,1)){ ?>			<li<?php if($p == 'admin') echo ' class="active"';?>><a href="<?php echo $rooturl; ?>admin">Admin</a></li>
<?php } ?>			<li><a href="<?php echo $rooturl; ?>logout">Logout</a></li>
<?php } ?>
  		</ul>
  </div>
