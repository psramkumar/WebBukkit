<?php

$_SESSION = NULL;
session_destroy();
header("Location: $rooturl");

?>