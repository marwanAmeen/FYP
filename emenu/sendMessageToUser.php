<?php
require_once("includes/connection.php");
require_once("includes/Database.php");
require_once("notify.php");
date_default_timezone_set('Asia/Kuala_Lumpur');
$date1= date('Y-m-d  h:i:s a', time());
//$date = new DateTime($current_date_time);
// this minuse 10 minutes from current time. so if the current time 1:20 modified time will be 
// 1:10, therefore if the reservation time was at 1:20 the user will be notified after 10 
//$date->modify('+10 minute');
//$date1=$date->format('Y-m-d  h:i:s a');


$_is_dead_line=Database::excute_select("SELECT res_time,cust_email FROM emn_reservation  ");

if($_is_dead_line){


 $index=0;

 // this will loop through the reservation date and check if the reservation is less than the current date
 // the reservation will be cancelled if the deadline is execided by 20 min. 
foreach ($_is_dead_line as  $value) {
    # code...
    //$_is_dead_line[$i->res_time->modify('+20 minute');
    if($_is_dead_line[$index]->res_time<$date1){
   
   // this statement will select the register id from the gsm table and assign it 
     $email=$_is_dead_line[$index]->cust_email;// the selected email  
     $_register_id=Database::excute_select("SELECT gcm_regid FROM customer_gcm where email='$email'");

     
// this the registeration id to be notified
    $regId = $_register_id[0]->gcm_regid;
    $message = "Your Reservation Has Been Canclled Due To Late Conformation";
    $gcm_object = new notify();
    $registatoin_ids = array($regId);
    $message = array("Reservation" => $message);
    $result = $gcm_object->notify_user($registatoin_ids, $message);
    $index++;
    echo $result;
}
} 

}
/*$regId = $_GET["regId"];
    $message = $_GET["message"];
    $gcm_object = new notify();
    $registatoin_ids = array($regId);
    $message = array("Reservation" => $message);

    $result = $gcm_object->notify_user($registatoin_ids, $message);
   
    echo $result;*/
?>
