<?php

if($_SESSION['id'])
{
	$userdata = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE `id`='".$_SESSION['id']."'"));	 
	$perm = str_split($userdata['permissions']);
	if(!$perm[1])
	{
		$_SESSION = array();
		session_destroy();
		header("Location: $rooturl" . 'login');
	}
	else
	{
		$i = 0;
		while($i < count($perm))
		{
			$_SESSION['perm'][$i] = $perm[$i];
			$i++;
		}
		$i = 0;
	}
}

?>