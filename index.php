<?php

require('./config.php');

require($include . 'session.php');
require($include . 'mysql.php');
require($include . 'common.php');
require($include . 'sanitize.php');
require($include . 'permissions.php');

$uri = findURI();
$p = $uri[1];

if(!file_exists("pages/$p.php"))
	$p = 'dashboard';
if(!$_SESSION['user'])
	$p = 'login';
if(!file_exists("config.php"))
	$p = 'install';

require($include . 'header.php');
require("pages/$p.php");
require($include . 'footer.php');

?>