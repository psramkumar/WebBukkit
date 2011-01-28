<?php

require('../config.php');
require('./common.php');
require('./mysql.php');
require('./session.php');
require('./permissions.php');

$descriptors = array(
	0 => array("pipe", "r"),
	1 => array("pipe", "w")
);

$process = proc_open("java", $descriptors, $pipes);

if (is_resource($process))
{
	while($pipes[1])
	{
		$read = array($pipes[1]);
		$write = array();
		$except = array();
		
		while(stream_select($read, $write, $except, 1))
			logResponse(fgets($read[0]));
	}	
	fclose($pipes[1]);
}

function logResponse($data)
{

}
?>