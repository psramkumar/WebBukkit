<?php

class MineLink
{
	var $socket;
	var $stopped;
	var $pid;

	public function __construct()
	{
		require('../config.php');

		$this->socket = stream_socket_client($minelink['server'] . ':' . $minelink['port'], $erno, $erst, 5);

		if(!$this->socket)
			$this->stopped = true;
		else
		{
			$this->cmd('pass ' . $minelink['pass']);
			$this->pid = $this->pid();
		}
	}
	
	private function cmd($cmd)
	{
		fwrite($this->socket, $cmd . "\n");
		$read = array($this->socket);
		$write = array();
		$except = array();
		while(stream_select($read, $write, $except, 0, 100000))
			$return .= fgets($read[0]);
		return json_decode($return, true);
	}

	public function playercount()
	{
		$data = $this->cmd('playercount');
		return $data['message'];
	}

	public function maxplayers()
	{
		$data = $this->cmd('maxplayers');
		return $data['message'];
	}

	public function players()
	{
		$data = $this->cmd('getplayers');
		return $data['message'];
	}
	
	public function server_status()
	{
		return $this->stopped;
	}
	
	public function pid()
	{
		$pid = $this->cmd('pid');
		return $pid['message'];
	}
	
	public function cpu_usage()
	{
		$return = explode("\n", shell_exec('ps -p'. $this->pid .' -o %cpu'));
		if(!$return[1])
			$return[1] = '0';
		return $return[1];
	}

	public function mem_usage()
	{
		require('../config.php');
		$return = explode("\n", shell_exec('ps -p'. $this->pid .' -o rss'));
		return ($return[1] / 1024) / $minecraft['memorylimit'] * 100;
	}

	private function __destruct()
	{
		socket_close($this->socket);
	}
}

?>