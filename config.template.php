<?php

$rooturl = 'http://example.com/bukkitadmin/';

$wwwdir = dirname(realpath($_SERVER['SCRIPT_FILENAME']));

$include = $wwwdir . '/include/';

$minecraft['bin'] = 'bin';

$minecraft['name'] = "Example Server";

$minelink['server'] = 'localhost';

$minelink['port'] = '6790';

$minelink['pass'] = '';

$mysql['server'] = 'localhost';

$mysql['user'] = 'root';

$mysql['pass'] = '';

$mysql['db'] = 'bukkitadmin';

?>