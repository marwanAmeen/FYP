<?php

$response=array();
require_once("includes/connection.php");
require_once("includes/Database.php");

$inserted=Database::excute_query("INSERT INTO cron_joba( id)VALUES (1); ");
?>
