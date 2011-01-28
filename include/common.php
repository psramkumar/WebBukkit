<?php

function findURI()
{
	$getkey = key($_GET);

	if (isset($_GET[$getkey]) && $_GET[$getkey] === '' && substr($_SERVER['QUERY_STRING'], strlen($getkey), 1) !== '=')
	{
		$uri = $getkey;
		unset($_GET[$uri]);
		$_SERVER['QUERY_STRING'] = ltrim(substr($_SERVER['QUERY_STRING'], strlen($getkey)), '&');
	}
	else if (isset($_SERVER['PATH_INFO']))
	{
		$uri = $_SERVER['PATH_INFO'];
	}
	else if (isset($_SERVER['ORIG_PATH_INFO']))
	{
		$uri = $_SERVER['ORIG_PATH_INFO'];
	}
	else $uri = '';

	$uri = explode('/', $uri);
	
	return $uri;
}

function svn_rev()
{
	if (file_exists('.svn/entries'))
	{
		$handle = fopen('.svn/entries', 'rb');
		$counter = 1;
		while ($rev = fscanf($handle, "%[a-zA-Z0-9,. ]%[dir]\n%[a-zA-Z0-9,.]"))
		{
			$counter++;
			
			if ($counter > 4)
			{
				list($svn_rev) = $rev;
				return $svn_rev;
			}
		}
		fclose($handle);
		unset($counter);
	}
}

function perms($id, $str)
{
	// $str is either 0 (no access) 1 (view) 2 (edit)
	// $id is the id of the permission to check
	if($_SESSION['perm'][$id] >= $str)
		return true;
	else
		return false;
}

?>