<?php
require_once("includes/connection.php");
require_once("includes/Database.php");
$items=Database::excute_select("SELECT * FROM emn_table WHERE status = 'Free' ORDER BY table_name");
print json_encode($items);
?>