<?php

class MineLink
{
	var $socket;

	function __construct($server = 'localhost:6790')
	{
		$this->socket = stream_socket_client($server, $erno, $erst, 5);
		if(!$this->socket)
			die('Error: ' . $erst . ' (' . $erno . ')');
		else
		{
			$this->cmd('pass pass');
		}
	}
	
	function cmd($cmd)
	{
		fwrite($this->socket, $cmd . "\n");
		$read = array($this->socket);
		$write = array();
		$except = array();
		while(stream_select($read, $write, $except, 0, 100000))
			$return .= fgets($read[0]);
		return $return;
	}
	
	function playercount()
	{
		$data = self::cmd('playercount');
		$return = explode("\n", $data);
		return trim($return[0]);
	}
	
	function maxplayers()
	{
		$data = self::cmd('maxplayers');
		$return = explode("\n", $data);
		return trim($return[0]);
	}
	
	function players()
	{
		$data = self::cmd('getplayers');
		return trim($data);
	}
	
	function __destruct()
	{
		socket_close($this->socket);
	}
}

?>