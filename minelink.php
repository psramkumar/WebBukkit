<?php

class MineLink
{
	var $socket;

	function __construct($server = 'localhost', $port = '25566')
	{
		$this->socket = fsockopen($server, $port, $erno, $erst, 5);
		if($this->socket == false)
			die('Error: ' . $erst . ' (' . $erno . ')');
		else
			die('Ok');
	}
	
	function cmd($cmd)
	{
		fwrite($this->socket, $cmd . "\n");
		while (!feof($this->socket)) {
			$return .= fgets($this->socket, 1024);
		}
		return $return;
	}
}

$link = new MineLink();

?>