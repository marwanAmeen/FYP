<?php
require_once("includes/connection.php");
require_once("includes/Database.php");
function _is_curl_installed() {
    if  (in_array  ('curl', get_loaded_extensions())) {
        return true;
    }
    else {
        return false;
    }
}
$date1 = date('Y-m-d  h:i:s a', time());

// Ouput text to user based on test
if (_is_curl_installed()) {
$_is_dead_line=Database::excute_select("SELECT res_time FROM emn_reservation  ");
if($_is_dead_line){
date_default_timezone_set('Asia/Kuala_Lumpur');
 $i=0;
 //$date1->modify('-20 minute');
foreach ($_is_dead_line as  $value) {
	# code...
	//$_is_dead_line[$i->res_time->modify('+20 minute');
	if($_is_dead_line[$i]->res_time<$date1){
	echo "The date is less <br /> ";
	 echo "<br />\n";
    echo $_is_dead_line[$i]->res_time. "\n" . "\n";
    	 echo "<br />\n";

    $i++;
}
}

 	echo "now ";

 echo $date1 ;
}else{
    echo "The dealine is not selected";
     echo $date1 ;

}
} else {
  echo "cURL is NOT installed on this server";
}
$version = curl_version();
?>
